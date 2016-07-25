<?php

namespace App\Http\Controllers;

use App\Model\Buspart;
use App\Model\Inspection;
use App\Model\Inspectionspart;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class InspectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Buspart::all();
        $buses = DB::table('buses')->whereCompaniesId(Sentinel::getUser()->companies_id)->lists('bus_number','id');
        $inspections = Inspection::with(['inspection.parts','buses'])->whereCompaniesId(Sentinel::getUser()->companies_id)->get();
        return view('buses.inspections',compact('parts','buses','inspections'));
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
            'inspectionsdate'=> Input::get('date'),
            'buses_id'=> Input::get('buses'),
            'kilometer_run'=> 12,
            'companies_id'=> Sentinel::getUser()->companies_id
            ];
        $data = Inspection::FirstOrCreate($input);
        $checkbox = Input::get('checkbox');
        foreach($checkbox as $index => $item){
            $values = array(
                'parts_id' =>  $item,
                'results_id' =>  1,
                'inspections_id' => $data->id,
                'remarks' =>  Input::get('remarks')[$index],
                'inspected_by'=> Input::get('inspector')[$index],
            );
            Inspectionspart::create($values);
        }
        Session::flash('success','Successfully Saved');
        return Redirect::to('buses/buses-inspections');
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
