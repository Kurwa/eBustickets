<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','DashboardController@index');

    /*
     * Logins Forms and Logout
     * */

Route::get('login','AuthController@login');
Route::post('login', 'AuthController@processLogin');
Route::get('logout','AuthController@logout');

Route::get('reactivate', function()
{
    // if (Session::has('user')) {
    $user = Session::get('user');
    // }
    if ( ! $user)
    {
        $errors = 'Account is not activated!';
        Session::flash('error',$errors);
        return Redirect::to('login');
    }
    $activation = Activation::exists($user) ?: Activation::create($user);

    // Usually you would want
    // to activate the account through the link you
    // receive in the activation email
    Activation::complete($user, $activation->code);

    // $code = $activation->code;

    // $sent = Mail::send('sentinel.emails.activate', compact('user', 'code'), function($m) use ($user)
    // {
    // 	$m->to($user->email)->subject('Activate Your Account');
    // });

    // if ($sent === 0)
    // {
    // 	return Redirect::to('register')
    // 		->withErrors('Failed to send activation email.');
    // }
    Session::flash('message','Account activated.');
    return Redirect::to('login');
})->where('id', '\d+');

             /**
             *  CUSTOMERS MODULE
             * */

Route::group(['middleware' => 'auth'], function () {
    Route::get('customers-lists','CustomerController@index');
});
            /**
             *  Configuration MODULE
             * */
Route::group(['middleware' => 'auth'], function () {
    Route::get('system-configuration','ConfigurationController@system_index');
});

Route::group(['middleware' => 'auth','prefix'=>'configurations'], function () {

    Route::get('users','ConfigurationController@index');
    Route::post('users','ConfigurationController@store');

    Route::get('roles','ConfigurationController@role_index');
    Route::post('roles','ConfigurationController@role_post');
});
