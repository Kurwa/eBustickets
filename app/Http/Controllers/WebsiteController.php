<?php

namespace App\Http\Controllers;

use App\Model\Buse;
use App\Model\Companies;
use App\Model\Route;
use App\Model\Routespoint;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class WebsiteController extends Controller
{
    public function index($bus)
    {
        $route_id = Input::get('route');
        $date = Input::get('dateoftravel');

        if(!is_null($route_id)){
            $id = Companies::whereSlug($bus)->first()->id;
            $buses = Buse::whereCompaniesId($id)->get();
            $route = Route::whereId($route_id)->first();
            $routs = Routespoint::whereRoutesId($route_id)->get();
            $pays = DB::table('payments')->lists('name','id');
            return view('website.schedule',compact('date','route','pays','routs','route_id','buses'));
        }else{
            $id = Companies::whereSlug($bus)->first()->id;
            $buses = Buse::whereCompaniesId($id)->get();
            $routes = Route::whereCompaniesId($id)->get();
            return view('website.home',compact('buses','routes'));
        }

    }
//
//    public function schedule()
//    {
//        return view('website.schedule');
//    }
}
