<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', 'UserController@index')->name('show_login');
    Route::get('/regiter', 'UserController@showRegister')->name('show_register');
    Route::post('/register', 'UserController@store')->name('check_register');
    Route::post('/login', 'UserController@login')->name('check_login')->middleware('verify');
    Route::get('/send', 'EmailController@sendEmail');
    Route::get('/logout', 'UserController@logout')->name('logout');
    Route::get('/id/{id}/code/{verifi}', 'UserController@verifiMail')->name('verifi_mail');
    Route::get('/test', function () {
        return redirect()->route('show_login')->with('comment', ['type' => 'success', 'comment' => 'login sussec']);
    });

//home
    Route::get('/home', 'HomeController@index')->name('home')->middleware('user');
    Route::get('/admin', function () {
        return view('admin.index')->name('admin');
    });

//profile
    Route::get('/profile/{id}', 'ProfileController@showProfile')->name('show_profile');

//transfer
    Route::get('/transfer', function () {
        return view('transfer.index');
    })->name('show_transfer');
    Route::get('/tranfer/external/{id}', 'TransferController@showExTransfer')->name('show_transfer_external');
    Route::get('/tranfer/internal/{id}', 'TransferController@showInTransfer')->name('show_transfer_internal');
    Route::get('/tranfer/external/', 'TransferController@seachName')->name('seach_account_name');
    Route::get('/transfer/external/ballance', 'TransferController@seachBallacne')->name('seach_ballance');
    Route::post('/transfer/external/otp', 'TransferController@dataExTransfer')->name('otp_transfer_ex');
    Route::post('/transfer/internal/otp', 'TransferController@dataInTransfer')->name('otp_transfer_in');
    Route::get('/transfer/external/otp', function(){
        return redirect(route('show_transfer_external', session('user')['id']));
    });
    Route::post('/transfer/external/check', 'TransferController@checkOtp')->name('check_otp');
    Route::get('/tranfer/statistic/{id}', 'TransferController@showStatistic')->name('show_statistic');
    Route::post('/tranfer/statistic/{id}', 'TransferController@getStatistic')->name('get_statistic');


//setting
    Route::get('/setting', function () {
        return view('setting.index');
    })->name('show_setting');
    Route::get('/setting/change_password', 'SettingController@showChangePassword')->name('show_change_password');
    Route::post('/change_password/{id}', 'SettingController@changePassword')->name('change_password');

//account
    Route::get('/account/{id}', 'AccountController@index')->name('account_index');
    Route::post('/account/{id}', 'AccountController@store')->name('account_create');


