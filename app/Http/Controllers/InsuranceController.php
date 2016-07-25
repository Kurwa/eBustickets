<?php

namespace App\Http\Controllers;

use App\Model\Businsurance;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = DB::table('buses')->whereCompaniesId(Sentinel::getUser()->companies_id)->lists('bus_number','id');
        $insurances = Businsurance::with(['insurance','buses'])->whereCompaniesId(Sentinel::getUser()->companies_id)->get();
        $particular = DB::table('insurances')->lists('name','id');
//        return $insurances;
        return view('buses.insurances', compact('particular','buses','insurances'));
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
        $input = [
            'insurances_id' => Input::get('particular'),
            'buses_id' => Input::get('buses'),
            'start_date' => Input::get('start'),
            'end_date' => Input::get('expire'),
            'cost' => str_replace(",","",Input::get('cost')),
            'companies_id' => Sentinel::getUser()->companies_id,
            'descriptions' =>  Input::get('descriptions'),
        ];
        $rules = [
            'insurances_id' => 'required',
            'buses_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'cost' => 'required',
            'companies_id' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::to('buses/buses-insurances')
                ->withErrors($validator)
                ->withInput();
        }else{
//            return $input;
            Businsurance::create($input);
            Session::flash('success','Successful Created');
            return Redirect::to('buses/buses-insurances');
        }

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
