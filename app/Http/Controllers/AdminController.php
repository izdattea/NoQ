<?php

namespace App\Http\Controllers;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserModel;
use App\Models\RestaurantModel;

class AdminController extends Controller
{
    function dashboard()
    {
        $user = UserModel::all();
        $num = UserModel::where('usertype', '1')->count();
        return view('admin.dashboard', ['users'=>$user, 'num'=>$num]);
    }

    function pending()
    {
        $user = UserModel::all()->where('usertype', '1');
        return view('admin.pending', ['users'=>$user]);
    }

    function profile($id) //id->rest id
    {
        $user = UserModel::find($id);
        $rest = RestaurantModel::find($id);

        return view('admin.profile', ['user'=>$user, 'rest'=>$rest]);
    }

    function list()
    {
        $user = UserModel::all()->where('usertype', '0');
        return view('admin.users', ['users'=>$user]);
    }

    function delete($id)
    {
        $user = UserModel::where('id', $id)->firstorfail()->delete();
        // $user->delete;
        return redirect('users');
    }

    function accept($id)
    {
        //updating the usertype to 0 (checked for authenticity of restaurant)
        $user = UserModel::where('id', $id)->limit(1)->update(array('usertype'=>'0'));
        $rest = UserModel::where('id', $id)->limit(1)->pluck('name');

        //sending id to restaurants table in database
        $update = UserModel::where('id', $id)->select('id')->get()->toArray();
        foreach ($update as $data)
        {
            RestaurantModel::insert($data);
        }

        //creating database
        $rest = str_replace(array('[', ']', '"','"', ' '), '', $rest);
        Schema::create($rest, function (Blueprint $table) {
            $table->id();
            $table->integer('rest_id');
            $table->string('rest_name');
            $table->string('name');
            $table->integer('pax');
            $table->time('in_queue'); //time -> the time when customer submit form
            $table->time('est_enter')->nullable(); //time estimated to enter
            $table->time('enter')->nullable(); //the called time when they enter
            $table->time('out_system')->nullable(); //estimated exit time enter + duration for no. of pax
            $table->integer('status')->nullable(); //duration for the no. of pax
            // $table->time('out_system')->nullable();
            // $table->integer('in_system')->nullable();
            // $table->string('wait_time')->nullable();
        });

        //update database everytime new customer enter?
        //DB::Table($rest)->update(array('rest_id'=>$rest->id, 'rest_name'=>$rest->name));

        return redirect('users');
    }

    // return profile with the restaurant id selected; have to change Auth::user() to user()
    // function profile($id)
    // {
    //     $user = UserModel::all()->where('id', '$id');
    // }
}
