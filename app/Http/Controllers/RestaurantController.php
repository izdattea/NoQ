<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserModel;

class RestaurantController extends Controller
{
    function update()
    {
        return view('rest.update');
    }
}
