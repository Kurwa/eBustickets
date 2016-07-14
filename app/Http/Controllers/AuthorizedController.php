<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Sentinel;
class AuthorizedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Sentinel::getUser();
    }


}
trait Permissions{
    /*
     * Function for Accessing
     * */
    public function hasPermission($variable)
    {
        $user = Sentinel::findById(Sentinel::getUser()->id);
        if ($user->hasAccess($variable.'.view'))
        {
            return true;
        }
        return false;
    }
}
