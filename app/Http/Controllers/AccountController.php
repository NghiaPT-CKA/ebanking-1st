<?php

namespace App\Http\Controllers;

use App\Model\Account;
use App\Model\Category;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    protected $account;
    protected $user;
    protected $category;
    function __construct(Account $account, User $user, Category $category)
    {
        $this->account = $account;
        $this->user = $user;
        $this->category = $category;
        $this->middleware('alert');
        $this->middleware('user');
    }
    public function index($id)
    {
        $data['categories'] = $this->category->get();
        $data['account'] = $this->account->where('user_id',$id)->get();
        return view('account.index' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $insertdata = array();
        $insertdata['category_id'] = $request->category_id;
        $insertdata['id'] = mt_rand(1000000000 , 1999999999);
        $insertdata['ballance'] = 0;
        $user = $this->user->find($id);
        $check = $user->account()->create($insertdata);
        return redirect(route('account_index', session('user')['id']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
