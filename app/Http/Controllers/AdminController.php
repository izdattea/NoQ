<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserModel;

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
        // $user = UserModel::find($id);
        $user = UserModel::where('id', $id)->limit(1)->update(array('usertype'=>'0'));
        return redirect('users');
    }
}
