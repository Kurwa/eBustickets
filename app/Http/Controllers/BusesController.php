<?php

namespace App\Http\Controllers;

use App\Model\Busdocument;
use App\Model\Buse;
use App\Model\Seatplan;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BusesController extends AuthorizedController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $buses = Buse::with('type')->get();
        $buses = Buse::with('type')->whereCompaniesId(Sentinel::getUser()->companies_id)->get();
        $types  =  DB::table('types')->lists('name', 'id');
        return view('buses.index',compact('buses','types'));
    }

    /**
     * Show the Profile of the Bus.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        if(Sentinel::inRole('super')){
            $bus = Buse::with('type')->whereId($id)->first();
            return view('buses.tabs.general-view',compact('bus','id'));
        }elseif(Sentinel::inRole('admin')){
            $bus = Buse::with('type')->whereId($id)->whereCompaniesId(Sentinel::getUser()->companies_id)->first();
            return view('buses.tabs.general-view',compact('bus','id'));
        }
       return view('permission-denied');
    }
    public function documents($id)
    {
        $docs = DB::table('documents')->lists('name','id');
        $documents = Busdocument::with(['document'])->whereBusesId($id)->get();
        return view('buses.tabs.documentations',compact('id','documents','docs'));
    }

    public function documents_post($id)
    {
        $image = Input::file('image');
        $location = 'uploads';
        $filename = isset($image) ? $image->getClientOriginalName() : null ;
        $input = [
            'buses_id' => $id,
            'documents_id' => Input::get('documents_id'),
            'images' => $filename,
            'companies_id' => Sentinel::getUser()->companies_id
        ];
        $rules = [
            'image' => 'mimes:jpg,jpeg,pdf,docs,png,jpeg|max:12000',
            'documents_id' => 'required'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails())
        {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        if($image){
            $image->move($location,$filename);
            Busdocument::FirstOrCreate($input);
            Session::flash('success','Bus Document successfully Added');
            return Redirect::to('buses/'.$id.'/bus-documents');
        }
    }
    /*Doc Preview*/
    public function doc_preview()
    {
        $input = Input::get('document_id');
        $output = Busdocument::whereId($input)->first();
        $view = $output->images;
//        $view = "<img src=\"\">";
        return $view;
    }
    public function inspections($id)
    {
        return view('buses.tabs.inspections',compact('id'));
    }
    public function insurances($id)
    {
        return view('buses.tabs.permits',compact('id'));
    }
    public function maintenance($id)
    {
        return view('buses.tabs.maintainance',compact('id'));
    }
    public function tickets($id)
    {
        return view('buses.tabs.tickets',compact('id'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $location = 'uploads';
        $filename = isset($image) ? $image->getClientOriginalName() : null ;
        $input = [
            'bus_number' => Input::get('bus_number'),
            'model' => Input::get('model'),
            'manufacture' => Input::get('manufacture'),
            'countrymanufacture' => Input::get('country_manufactured'),
            'yearmanufacture' => Input::get('year'),
            'types_id' => Input::get('type'),
            'noofseats' => Input::get('noofseats'),
            'companies_id' => Sentinel::getUser()->companies_id,
            'insert_by' => Sentinel::getUser()->id,
            'bus_image' => $filename
        ];
        $input2 = [
            'firstletter' => Input::get('bus_number'),
            'lastletter' => Input::get('model'),
            'leftseatrow' => Input::get('manufacture'),
            'rightseatrow' => Input::get('country_manufactured'),
        ];
        $rule = ['firstletter' => 'required',
            'lastletter' => 'required',
            'leftseatrow' => 'required',
            'rightseatrow' => 'required'];
        $rules = [
            'image' => 'mimes:jpg,jpeg|max:12000',
            'bus_number' => 'required|unique:buses',
            'types_id' => 'required',
            'bus_number' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        $validator2 = Validator::make($input2, $rule);
        if ($validator->fails() || $validator2->fails())
        {
            return Redirect::back()
                    ->withInput()
                    ->withErrors($validator);
        }
        if($image){
            $image->move($location,$filename);
            $data = Buse::FirstOrCreate($input);
            $input3 = [
                'firstletter' => Input::get('firstletter'),
                'lastletter' => Input::get('lastletter'),
                'leftseatrow' => Input::get('leftseatrow'),
                'rightseatrow' => Input::get('rightseatrow'),
                'buses_id' => $data->id,
            ];
            Seatplan::FirstOrCreate($input3);
            Session::flash('success','Bus successfully Added');
            return Redirect::to('buses/buses-lists');
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
