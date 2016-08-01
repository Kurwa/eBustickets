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
     * Login Forms and Logout
     * */

//Route::get('register','ConfigurationController@registersuper');
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
     Route::post('customers-lists','CustomerController@store');
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

        /**
         *  ROUTES MODULE
         * */

Route::group(['middleware' => 'auth','prefix'=>'routes'], function () {
    Route::get('routes-lists','RouteController@index');
    Route::post('routes-lists','RouteController@store');

    Route::get('routes-assign','RouteController@views');
    Route::post('routes-assign','RouteController@post');
});


        /**
         *  BUSES MODULE
         * */

Route::group(['middleware' => 'auth','prefix'=>'buses'], function () {
    /*
     *  Lists of Buses
     * */
    Route::get('buses-lists','BusesController@index');
    Route::post('buses-lists','BusesController@store');
    Route::get('{id}/bus-profile','BusesController@profile');

    Route::get('{id}/bus-documents','BusesController@documents');
    Route::post('{id}/bus-documents','BusesController@documents_post');
    Route::get('doc_preview','BusesController@doc_preview');

    Route::get('{id}/bus-tickets','BusesController@tickets');
    Route::get('{id}/bus-inspections','BusesController@inspections');
    Route::get('{id}/bus-maintenance','BusesController@maintenance');
    Route::get('{id}/bus-insurances','BusesController@insurances');

    /*INSPECTIONS*/
    Route::get('buses-inspections','InspectionsController@index');
    Route::post('buses-inspections','InspectionsController@store');
    /*MAINTENANCE*/
    Route::get('buses-maintenance','MaintenanceController@index');

    /*INSURANCE*/
    Route::get('buses-insurances','InsuranceController@index');
    Route::post('buses-insurances','InsuranceController@store');

});
Route::group(['middleware' => 'auth','prefix'=>'tickets'], function () {
    /*
     *  Lists of Tickets & Bookings
     * */
    Route::get('/','TicketsController@index');
    Route::get('bookings','TicketsController@booking');
    Route::post('bookings','TicketsController@booking_post');

    Route::get('templates','TicketsController@templates');
    Route::post('templates','TicketsController@store');

    Route::get('seats-plan','TicketsController@SeatCheking');

    /**
     *  AJAX FUNCTIONS
     */
    Route::get('routes-taking','TicketsController@routes_taking');
    Route::get('routes-location','TicketsController@routes_location');
    Route::get('template_view','TicketsController@template_view');

});
    /*
     *  BUS WEBSITE BOOKING
     * */
Route::group(['prefix'=>'booking'], function () {
    Route::get('{slug}','WebsiteController@index');
    Route::post('{slug}','WebsiteController@post');
    Route::get('{slug}/complete','WebsiteController@complete');

    Route::get('{slug}',[
        'as' => 'home',
        'uses' => 'WebsiteController@index'
    ]);
    Route::get('{slug}/aboutus',[
        'as' => 'about',
        'uses' => 'WebsiteController@aboutus'
    ]);
    Route::get('{slug}/contacts',[
        'as' => 'contacts',
        'uses' => 'WebsiteController@contacts'
    ]);


    /**
     *  AJAX FUNCTIONS
     */
});
Route::get('{slug}/{id}/seating-plan','WebsiteController@seats');

Route::get('routes-taking','WebsiteController@routes_taking');
Route::get('routes-location','WebsiteController@routes_location');


/**
 *  Checking Plans
 */
Route::get('seating-plan','WebsiteController@SeatCheking');


    /**
     *  BUS WEBSITE BOOKING
     * */
Route::group(['middleware'=>'auth'], function () {
    Route::get('passengers','TicketsController@passengers');
    Route::get('agents','ConfigurationController@agents');
});
