<?php

namespace App\Http\Controllers;

use Validator, Input, Redirect ,View ,Session,Activation,Sentinel;

use Illuminate\Http\Request;

use App\Http\Requests;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

class AuthController extends Controller
{
    /**
     * show the Login Form if not Logged in
     *
     * @return View
     * @author
     **/
    public function login()
    {
        if (Sentinel::check()){
            return redirect('/');
        }else{
            return View::make('auth.login');
        }

    }

    /**
     * Handle posting of the form for logging the user in.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processLogin()
    {
        try
        {
            $input = Input::all();

            $rules = [
                'username'    => 'required',
                'password' => 'required',
            ];

            $validator = Validator::make($input, $rules);

            if ($validator->fails())
            {
                return Redirect::back()
                    ->withInput()
                    ->withErrors($validator);
            }

            $remember = (bool) Input::get('remember', false);

            if (Sentinel::authenticate(Input::all(), $remember))
            {
                return Redirect::intended('/');
            }

            $errors = 'Invalid login or password.';
        }
        catch (NotActivatedException $e)
        {
            $errors = 'Account is not activated!';
            Session::flash('user',$e->getUser());
            return Redirect::to('reactivate');
        }
        catch (ThrottlingException $e)
        {
            $delay = $e->getDelay();

            $errors = "Your account is blocked for {$delay} second(s).";
        }
        Session::flash('error',$errors);
        return Redirect::back()->withInput();
    }

    /**
     * Loging Out Function
     *
     * @return void
     * @author
     **/
    public function logout()
    {
        $log = Sentinel::logout();
        if($log == TRUE){
            Session::flash('message','Logged Out Successful');
            return redirect('login');
        }
    }
    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function activate($user,$code)
    {
        return View::make('auth.emails.activate', compact('user', 'code'));
    }
    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function complete($activation_code)
    {
        $user = Sentinel::findById(1);

        if (Activation::complete($user,$activation_code))
        {
            echo "successful Activated";
        }
        else
        {
            echo "Failed Activating";
        }
    }


}

