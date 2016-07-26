<?php

namespace App\Http\Controllers;

use App\Model\Booking;
use App\Model\Buse;
use App\Model\Companies;
use App\Model\Route;
use App\Model\Routesbuses;
use App\Model\Routespoint;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{

    /**
     * undocumented function
     * @return void
     * @author
     */

    public function index($bus)
    {
        $route_id = Input::get('route');
        $date = Input::get('dateoftravel');
        view()->share('slug',$bus);
        if(!is_null($route_id)){
            $id = Companies::whereSlug($bus)->first()->id;
            $buses = Routesbuses::with(['routes','buses'])->get();
            foreach($buses as $bus){
                $bus->taken = Booking::whereCompaniesId($id)->whereDateoftravel($date)->whereRoutesId($route_id)->whereBusesId($bus->id)->get()->count();
                $bus->remain = $bus->buses->noofseats - $bus->taken;
            }
            $route = Route::whereId($route_id)->first();
            $routs = Routespoint::whereRoutesId($route_id)->get();
            $pays = DB::table('payments')->lists('name','id');
            return view('website.schedule',compact('date','route','pays','routs','route_id','buses','id'));
        }else{
            $id = Companies::whereSlug($bus)->first()->id;
            $buses = Buse::whereCompaniesId($id)->get();
            $routes = Route::whereCompaniesId($id)->get();
            return view('website.home',compact('buses','routes'));
        }
    }

    public function aboutus($bus)
    {
        view()->share('slug',$bus);
        return view('website.aboutus');
    }
    public function contacts($bus)
    {
        view()->share('slug',$bus);
        return view('website.contacts');
    }

    public   function complete($bus)
    {
        view()->share('slug',$bus);
        return view('website.complete');
    }

    public function post($bus)
    {

        $input = [
            'firstname' => Input::get('first_name'),
            'lastname' => Input::get('last_name'),
            'phonenumber' => Input::get('phone_number'),
            'routes_id' => Input::get('routes'),
            'initial' => Input::get('location'),
            'final' => Input::get('destination'),
            'buses_id' => Input::get('buses'),
            'seat_number' => Input::get('seatno'),
            'payments_id' => Input::get('payments'),
            'amount' => str_replace(",","",Input::get('amount')),
            'dateoftravel' => Input::get('travelday'),
            'routes_id' =>  Input::get('routes_id'),
            'companies_id' => Input::get('company'),
        ];
        $rules = [
            'routes_id' => 'required',
            'initial' => 'required',
            'final' => 'required',
            'buses_id' => 'required',
            'seat_number' => 'required',
            'dateoftravel' => 'required'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::to('tickets/bookings')
                ->withErrors($validator)
                ->withInput();
        }else{
            Booking::FirstOrCreate($input);
            Session::flash('success','Successful Added');
            return Redirect::to('booking/'.$bus.'/complete');
        }
    }
}