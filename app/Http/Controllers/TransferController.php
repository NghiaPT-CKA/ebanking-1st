<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferRequest;
use App\Mail\MailNotify;
use App\Mail\otp;
use App\Model\Account;
use App\Model\Bank;
use App\Model\ReceiverAccount;
use App\Model\Transaction;
use App\Model\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect,Response,Config;
use Mail;
use RealRashid\SweetAlert\Facades\Alert;

class TransferController extends Controller
{
    protected $bank;
    protected $user;
    protected $receiver_account;
    protected $account;
    function __construct(Bank $bank, User $user,ReceiverAccount $receiver_account, Account $account)
    {
        $this->middleware('user');
        $this->middleware('alert');
        $this->bank = $bank;
        $this->user =  $user;
        $this->receiver_account =  $receiver_account;
        $this->account =  $account;

    }
    function showTransfer()
    {
        return view('transfer.index');
    }
    function showExTransfer($id)
    {
        $user = $this->user->where('id', $id)->first();
        $bank = DB::table('banks')->get();
        $data['user'] = $user;
        $data['bank'] = $bank;
        $data['account'] = $user->account()->get();
        return view('transfer.external', $data);

    }
    function showInTransfer($id)
    {
        $user = $this->user->where('id', $id)->first();
        $data['user'] = $user;
        $data['account'] = $user->account()->get();
        return view('transfer.internal', $data);
    }
    function showStatistic($id){
        $user = $this->user->where('id', $id)->first();
        $data['account'] = $user->account()->get();
        return view('transfer.statistic', $data);
    }
    function getStatistic(Request $request){
        $input = $request->all();
        $data = DB::table('transactions')->where('account_id' , $input['id_account'])
                                                ->whereBetween('transaction_date',[$input['start_date'],$input['end_date']])
                                                ->orderBy('transaction_date')->get();
        $data = $data->all();
        foreach ($data as $k => $v){
            if($v->type == 1){
                $name = $this->receiver_account->where('id', $v->account2_id)->first();
                $v->name = $name['name'];
            }else{
                $name = $this->account->where('id', $v->account3_id)->first();
                $name = $this->user->find($name['user_id']);
                $v->name = $name['name'];
            }
        }
        return view('transfer.list', ['data' => $data]);
    }
    function seachName(Request $request)
    {
        $bank_id = $request->bank_id;
        $account_id = $request->account_id;
        $account_list = $this->receiver_account->where('bank_id', $bank_id)->get();
        $hole_account = $this->account->find($account_id);
        if($hole_account){
            $hole_account = $hole_account->user()->first();
            $data['hole_account'] = $hole_account;
        }
        $account = $account_list->where('id', $account_id)->first();
        $data['account'] = $account;
        return response()->json($data);
    }
    function seachBallacne(Request $request)
    {
        $account_id = $request->id_account;
        $ballance = DB::table('accounts')->where('id', $account_id)->first();
        $data['ballance'] = $ballance;
        return response()->json($data);
    }
    function dataExTransfer(TransferRequest $request)
    {
        $data = $request->all();
        if (empty($data['bank_id'])){
            return back()->with('alert','error,Please select bank')->withInput($data);
        }else{
            $bank = $this->bank->find($data['bank_id']);
            $data['bank_name']=$bank->name;
            $hole_account = $this->receiver_account->find($data['account_id']);
            $data['name_hole']=$hole_account->name;
        }
        if(empty($hole_account)){
            return back()->with('alert','error,Please check hole account')->withInput($data);
        }
        $data = $this->otpTransfer($data);
        return view('transfer.otp', ['data' => $data]);
    }
    function dataInTransfer(TransferRequest $request)
    {
        $data = $request->all();
            $hole_account = $this->account->find($data['account_id']);
            $data['name_hole']=$hole_account->user->name;
        if(empty($hole_account)){
            return back()->with('alert','error,Please check hole account')->withInput($data);
        }
        $data = $this->otpTransfer($data);
        return view('transfer.otp', ['data' => $data]);
    }
    function otpTransfer($data)
    {
        $user = $this->user->find($data['user_id']);
        $account = $this->account->find($data['id_account']);
        if($data['amount'] > $account->ballance){
            return back()->with('alert','error,Availble ballance no enought');
        }
        $data['name']=$user->name;
        $email['email'] = $user->email;
        $email['otp'] = mt_rand(1000,9999);

        $this->sendOtp($email);
        if (empty($user->check()->first()->otp)){
            $user->check()->create(['otp' => $email['otp']]);
        }else{
            $otp = DB::table('checks')->where('user_id', $data['user_id'])->update(['otp'=> $email['otp']]);
        }
        Session()->put('transfer', $data);
        return $data;
    }
    function sendOtp($email)
    {
        $data = $email;
        Mail::to($data['email'])->send(new otp($data));
    }
    function checkOtp(Request $request)
    {
            $data = session()->get('transfer');
            Session()->put('account_id' , $data['account_id']);
            $otp = DB::table('checks')->where('user_id', $data['user_id'])->first()->otp;
            $otp_check = $request->otp;
            if ($otp == $otp_check)
            {
                $user_account = $this->account->find($data['id_account']);
                if(!empty($data['bank_id'])){
                    $hole_account = $this->receiver_account->find($data['account_id']);
                }else{
                    $hole_account = $this->account->find($data['account_id']);
                }
                $user_account->ballance -= $data['amount'];
                $check_transfer = $user_account->save();
                if ($check_transfer) {
                    $hole_account->ballance += $data['amount'];
                    $hole_account->save();
                    $transaction = new Transaction;
                    $transaction->account_id = $data['id_account'];
                    if(!empty($data['bank_id'])){
                        $transaction->type = 1;
                        $transaction->account2_id = $data['account_id'];
                    }else{
                        $transaction->type = 2;
                        $transaction->account3_id = $data['account_id'];
                    }
                    $transaction->amount = $data['amount'];
                    $transaction->transaction_date = $data['transfer_date'];
                    $check = $transaction->save();
                    return redirect(route('show_report'))->with('alert' , 'success,Transaction is success');
                } else {
                    return redirect(route('show_transfer_external',session('user')['id']))->with('alert' , 'error,Transaction is fail');
                }

            }
        return redirect(route('show_transfer_external',session('user')['id']))->with('alert' , 'error,Otp does not match');
    }
    function showReport()
    {
        $this->middleware('alert');
        return view('report.index');
    }
    function printReport()
    {
        $data = session()->pull('transfer');
        if(empty($data)){
            return redirect(route('show_transfer'));
        }
        $pdf = PDF::loadView('report.report',['data' => $data])->setPaper('a4','portrait');
        $random = mt_rand(100,999);
        return $pdf->stream('transaction'.$random.'.pdf');
    }
    function back()
    {
        $data = session()->pull('transfer');
        return redirect(route('show_transfer'));
    }
}
