<?php

namespace App\Http\Controllers;

use App\Model\Booking;
use App\Model\Buse;
use App\Model\Companies;
use App\Model\Route;
use App\Model\Routesbuses;
use App\Model\Routespoint;
use App\Model\Seatplan;
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
        $location = Input::get('location');
        $destiny = Input::get('destination');
        $route_id = Input::get('routes');
        $date = Input::get('dateoftravel');
        $company = Companies::whereSlug($bus)->first();
        view()->share('company',$company);
        view()->share('slug',$bus);
        if($route_id != ""  && $date != "" && $destiny != ""  && $location != "" ){
            $id = Companies::whereSlug($bus)->first()->id;
            $buses = Routesbuses::with(['routes','buses'])->whereRoutesId($route_id)->whereStatus(1)->get();
//        return $buses;
            foreach($buses as $bus){
                $bus->taken = Booking::whereCompaniesId($id)
                            ->whereDateoftravel($date)
                            ->whereRoutesId($route_id)
                            ->whereBusesId($bus->id)->get()->count();
                            $bus->remain = $bus->buses->noofseats - $bus->taken;
                }

            $route = Route::whereId($route_id)->first();
            $routs = Routespoint::whereRoutesId($route_id)->get();
            $pays = DB::table('payments')->lists('name','id');
            $initial = Routespoint::whereRoutesId($route_id)->whereId($location)->first()->name;
            $destination = Routespoint::whereRoutesId($route_id)->whereId($destiny)->first()->name;
            $init_value = Routespoint::whereRoutesId($route_id)->whereId($location)->first()->fares;
            $dest_value = Routespoint::whereRoutesId($route_id)->whereId($destiny)->first()->fares;
            if($destiny > $location){
                if(($destiny - $location) == 1) {
                    $money = Routespoint::whereRoutesId($route_id)
                        ->whereBetween('id', [$location, $destiny])
                        ->sum('fares');
                    $dest_money = $money - $init_value;
                }
                $money = Routespoint::whereRoutesId($route_id)
                    ->whereBetween('id', [$location, $destiny])
                    ->sum('fares');
                $dest_money = $money - $init_value;
            }else{
                if(($destiny - $location) == 1){
                    $money = Routespoint::whereRoutesId($route_id)
                        ->whereBetween('id', [$destiny,$location])
                        ->sum('fares');
                    $dest_money = $money - $dest_value;
                }
                $money = Routespoint::whereRoutesId($route_id)
                    ->whereBetween('id', [$destiny,$location])
                    ->sum('fares');
                $dest_money = $money - $dest_value;

            }

            return view('website.schedule',compact('date','route','pays','routs','route_id','buses','id','initial','destination','dest_money'));
        }else{
            $id = Companies::whereSlug($bus)->first()->id;
            $buses = Buse::whereCompaniesId($id)->get();
            $routes = Route::whereCompaniesId($id)->get();
            $routs = Routespoint::whereRoutesId($route_id)->get();
            return view('website.home',compact('buses','routes','routs'));
        }
    }

    public function aboutus($bus)
    {
        $company = Companies::whereSlug($bus)->first();
        view()->share('company',$company);
        view()->share('slug',$bus);
        return view('website.aboutus');
    }
    public function contacts($bus)
    {
        $company = Companies::whereSlug($bus)->first();
        view()->share('company',$company);
        view()->share('slug',$bus);
        return view('website.contacts');
    }

    public   function complete($bus)
    {
        $company = Companies::whereSlug($bus)->first();
        view()->share('company',$company);
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
            'insert_by' => 2,
            'companies_id' => Input::get('company'),
        ];
        $rules = [
            'firstname' => 'required',
            'phonenumber' => 'required',
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

    /**
     *    AJAX FUNCTIONS IN ROUTES AND INITIAL AND DESTINATIONS
     */
    public function routes_taking()
    {
        $id = Input::get('routes_id');
        $routes = Routespoint::whereRoutesId($id)->get();
        $output = "<option value=''>--Select--</option>";
        foreach($routes as $route){
            $output .= "<option value='".$route->id."'>".$route->name."</option>";
        }
        return $output;
    }

    public function routes_location()
    {
        $id = Input::get('data');
        $location = Input::get('location');
        $routes = Routespoint::whereRoutesId($id)->whereNotIn('Id',[$location])->get();
        $output = "<option value=''>--Select--</option>";
        foreach($routes as $route){
            $output .= "<option value='".$route->id."'>".$route->name."</option>";
        }
        return $output;
    }

    public function seats($bus , $id)
    {
        $routes = Input::get('route');
        $date = Input::get('dateoftravel');
        $seating = Booking::whereBusesId($id)
                            ->whereDateoftravel($date)
                            ->whereRoutesId($routes)
                            ->pluck('seat_number')
                            ->toArray();
        $company = Companies::whereSlug($bus)->first();
        view()->share('company',$company);
        view()->share('slug','ems_buses');
        $seat = Seatplan::whereBusesId($id)->first();
        $right = range($seat->firstletter, $seat->lastletter);
       return view('website.seats',compact('right','seat','seating'));
    }

    /**
     *    Bus Checking
     */
    public function SeatCheking()
    {
        $id = Input::get('buses');
        $date = Input::get('date');
        $routes = Input::get('routes');
        $seating = Booking::whereBusesId($id)
            ->whereDateoftravel($date)
            ->whereRoutesId($routes)
            ->pluck('seat_number')
            ->toArray();
        $seat = Seatplan::whereBusesId($id)->first();
        $right = range($seat->firstletter, $seat->lastletter);
        $output = view('website.seating-plan',compact('seat','right','seating'));
        return $output;
    }

}