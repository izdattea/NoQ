<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function redirectFx(){

        if(Auth::user()->usertype == "admin")
        {
            return redirect('dashboard');
        }
        elseif(Auth::user()->usertype=="0")
        {
            return redirect('profile');
        }
        else
        {
            return redirect('message');
        }

    }
}
