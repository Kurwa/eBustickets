<?php

namespace App\Http\Controllers;

use App\Model\Location;
use App\Model\Role;
use App\Model\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;

use Illuminate\Database\QueryException;
use App\Http\Requests;
use DB;
use Validator, Input, Redirect ,View ,Session,Activation;



class ConfigurationController extends AuthorizedController
{
    /**
     * Holds the Sentinel Roles repository.
     *
     * @var \Cartalyst\Sentinel\Roles\EloquentRole
     */
    protected $roles;

    public function __construct()
    {
        parent::__construct();
        $this->roles = Sentinel::getRoleRepository()->createModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Sentinel::getUser()->inRole('admin'))
        {
            $roles =  DB::table('roles')->whereNotIn('id',[1,2])->lists('name', 'id');
            $company =  DB::table('companies')->whereId(Sentinel::getUser()->companies_id)->lists('name', 'id');
            $users = User::whereNotIn('username',['super'])
                            ->whereCompaniesId(Sentinel::getUser()->companies_id)
                            ->with(['company','roles.role'])
                            ->get();
//            return $users;
            return view('configurations.users.index',compact('roles','company','users'));
        }
        elseif(Sentinel::getUser()->inRole('agents')){
            return view('permission-denied');
        }
        $roles =  DB::table('roles')->whereNotIn('id',[1])->lists('name', 'id');
        $company =  DB::table('companies')->lists('name', 'id');
        $users = User::whereNotIn('username',['super'])
                        ->with(['company','roles.role'])
                        ->get();
        return view('configurations.users.index',compact('roles','company','users'));
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
            '_token' => Input::get('_token'),
            'email' => Input::get('email'),
            'username' => Input::get('username'),
            'password' => Input::get('password'),
            'first_name' => Input::get('firstname'),
            'last_name' => Input::get('lastname'),
            'phone_number' => Input::get('phone_number'),
            'companies_id' => Input::get('company'),
        ];
        $rules = [
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        if ($user = Sentinel::registerAndActivate($input)) {
            $role_id = Input::get('role');
            $role = Sentinel::findRoleById($role_id);
            $role->users()->attach($user);
            if (Sentinel::inRole('admin')) {
                $location = [
                    'users_id' => $user->id,
                    'locations' => Input::get('location')
                ];
                Location::FirstOrCreate($location);
            }
            Session::flash('success', 'Account successfully created');
            return Redirect::to('configurations/users');
        }
    }
//        return Redirect::to('configurations/register')
//            ->withInput()
//            ->withErrors('Failed to register.');

//                foreach ($inpper as $permision) {
//                    $create = Input::get("$permision".'create');
//                    $delete = Input::get("$permision".'delete');
//                    $update = Input::get("$permision".'update');
//                    $view = Input::get("$permision".'view');
//                    $permissions = [
//                        strtolower("$permision.".'create') => isset($create) ? TRUE : FALSE,
//                        strtolower("$permision.".'delete') => isset($delete) ? TRUE : FALSE,
//                        strtolower("$permision.".'update') => isset($update) ? TRUE : FALSE,
//                        strtolower("$permision.".'view') => isset($view) ? TRUE : FALSE,
//                    ];
//                    $result = array_merge($result, $permissions);
//                    $key++;
//                }
//                $user->permissions = $result;
//                $user->save();
//                Session::flash('success','Account successfully created');
//                return Redirect::to('configurations/users');
//            }


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

    /**
     *  ROLES ADMINISTERING
     */
    public function role_index()
    {
        if (Sentinel::getUser()->inRole('admin'))
        {
            $roles = Role::whereNotIn('slug',['super'])->get();
            return view('configurations.roles.index',compact('roles'));
        }
        elseif(Sentinel::getUser()->inRole('agents')){
            return view('permission-denied');
        }
        $roles = Role::all();
        return view('configurations.roles.index',compact('roles'));
    }

    public function role_post()
    {
        $input = array(
//            '_token' => Input::get('_token'),
            'name' => Input::get('name'),
            'slug' => Input::get('slug')
        );
//        return $input;
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:roles'
        ];
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::to('configurations/roles')
                ->withErrors($validator)
                ->withInput();
            }else{
            $role = $this->roles->create($input);
            $role->save();
            Session::flash('success','Successful Created');
            return Redirect::to('configurations/roles');
        }

    }

    /**
     *  SYSTEM  CONFIGURATIONS
     */
    public function system_index()
    {
        return view('configurations.system-configuration');
    }

    /*
     *   Self Registration
     * */
    public function registersuper()
    {
        $input = [
            'email'          => 'admin@admin.com',
            'username'       => "super",
            'password'       => "super",
            'first_name'      => "Admin",
            'last_name'       => 'Insta',
            'companies_id' => 0,
        ];
        $user = Sentinel::registerAndActivate($input);
        $role_id = 1;
        $role = Sentinel::findRoleById($role_id);
        $role->users()->attach($user);
    }
    /**
     *  AGENTS
     */
    public function agents()
    {
        $agents = Location::with('agents')
            ->whereHas('agents', function ($query) {
                $query->whereCompaniesId(Sentinel::getUser()->companies_id);
            })->orderBy('created_at', 'DESC')
            ->get();
        return view('tickets.agents',compact('agents'));
    }
}
