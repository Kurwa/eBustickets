<?php

namespace App\Http\Controllers;

use App\Model\Route;
use App\Model\Routesbuses;
use App\Model\Routespoint;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::whereCompaniesId(Sentinel::getUser()->companies_id )->get();
        return view('routes.index',compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $key = Input::get('status');
        $input = [
            'initial' => Input::get('initial'),
            'destination' => Input::get('destination'),
            'status' => isset($key) ? $key : 0 ,
            'companies_id' => Sentinel::getUser()->companies_id
        ];

        $rules = [
            'initial'        => 'required',
            'destination'    => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails())
        {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        $route = Route::firstOrCreate($input);
        $id = $route->id;
        $put1 = [
                'routes_id'=>$id,
                'name'=>Input::get('initial'),
                'fares' => 0
        ];
        Routespoint::firstOrCreate($put1);
        $value = Input::get('points');
        if(isset($value)){
            foreach($value as $i =>  $item){
                $put = [
                    'routes_id'=>$id,
                    'name'=>$item,
                    'fares' => str_replace(',','',Input::get('fares')[$i])
                ];
                Routespoint::firstOrCreate($put);
            }
        }
        $put2 = [
            'routes_id'=>$id,
            'name'=>Input::get('destination'),
            'fares' =>  str_replace(',','',Input::get('destination_fare'))
        ];
        Routespoint::firstOrCreate($put2);
        Session::flash('success','Route successfully added');
        return Redirect::to('routes/routes-lists');
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

    public function views()
    {
        $bus = DB::table('buses')->whereCompaniesId(Sentinel::getUser()->companies_id)->lists('bus_number','id');
        $rout = Route::whereCompaniesId(Sentinel::getUser()->companies_id)->get();
        $routes = Routesbuses::with(['routes','buses'])->get();
        return view('routes.routes-buses',compact('routes','bus','rout'));
    }

    public function post()
    {
        $id = Input::get('buses');
        $input = [
            'routes_id' => Input::get('routes'),
            'buses_id' => Input::get('buses'),
            'status' => 1
        ];
        $routes = Routesbuses::whereBusesId($id)->whereStatus(1)->first();
        if($routes == ""){
            Routesbuses::FirstOrCreate($input);
        }else{
            $routes->status = 0;
            $routes->save();
            Routesbuses::FirstOrCreate($input);
        }
        Session::flash('success','Successful Assigned');
        return Redirect::to('routes/routes-assign');
    }
}
