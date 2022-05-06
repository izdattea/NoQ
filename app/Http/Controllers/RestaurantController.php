<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserModel;
use App\Models\RestaurantModel;
use App\Models\CustomerModel;
use DateInterval;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RestaurantController extends Controller
{
    function profile()
    {
        $user = RestaurantModel::where('id', Auth::user()->id)->get();

        return view('rest.profile', ['user' => $user]);
    }

    function update($id)
    {
        $user = RestaurantModel::find($id);

        return view('rest.update', ['user'=>$user]);
        // return RestaurantModel::find($id);
    }

    function save(Request $req)
    {
        $user = RestaurantModel::find(Auth::user()->id);
        
        $user->address = $req->address;
        $user->description = $req->description;
        $user->i2 = $req->pax2; //will not touch
        $user->i4 = $req->pax4; //will not touch
        $user->i8 = $req->pax8; //will not touch
        $user->pax2 = $req->pax2;
        $user->pax4 = $req->pax4;
        $user->pax8 = $req->pax8;
        $user->time2 = $req->time2;
        $user->time4 = $req->time4;
        $user->time8 = $req->time8;

        $user->save();

        return redirect('/profile');
    }

    function worker()
    {
        $rest = UserModel::find(Auth::user()->id);
        $worker = RestaurantModel::find(Auth::user()->id);
        $user = str_replace(array('[', ']', '"','"', ' '), '', Auth::user()->name);
        $cust = DB::table($user)->get()->all();

        return view('rest.worker', ['data'=>$worker, 'cust'=>$cust, 'user'=>$user, 'rest'=>$rest]);
    }

    function call($id)
    {
        $user = str_replace(array('[', ']', '"','"', ' '), '', Auth::user()->name);
        date_default_timezone_set('Asia/Kuala_Lumpur'); //set timezone
        $time = now(); //set time format

        $rest = RestaurantModel::find(Auth::user()->id);
        $cust = DB::table($user)->where('id', $id)->first();

        if ($cust->pax >= '1' && $cust->pax <= '2') {
            if ($rest->pax2=='0'){ //no table
                Alert::toast('No available table', 'warning');

            } else { //available table
                RestaurantModel::find(Auth::user()->id)->update(['current_queue'=>$id]); //enter current queue number of the restaurant
                $exit = now();
                $exit->add(new DateInterval('PT' . $rest->time2 . 'M'))->format("H:i:s"); //getting the estimated exit time
                DB::table($user)->where('id', $id)->update(array(
                    'in_queue' => '00:00:00',
                    'est_enter' => null,
                    'enter' =>  $time,
                    'out_system' => $exit,
                    'status' => $rest->time2,
                ));
                RestaurantModel::find(Auth::user()->id)->update(['pax2'=> $rest->pax2-1]);
            }
        } 

        if ($cust->pax >= '3' && $cust->pax <= '4') {
            if ($rest->pax4=='0'){ //no table
                Alert::toast('No available table', 'warning');
            } else {
                RestaurantModel::find(Auth::user()->id)->update(['current_queue'=>$id]);
                $exit = now();
                $exit->add(new DateInterval('PT' . $rest->time4 . 'M'))->format("H:i:s"); //getting the estimated exit time
                DB::table($user)->where('id', $id)->update(array(
                    'in_queue' => '00:00:00',
                    'est_enter' => null,
                    'enter' =>  $time,
                    'out_system' => $exit,
                    'status' => $rest->time4,
                ));
                RestaurantModel::find(Auth::user()->id)->update(['pax4'=> $rest->pax4-1]);
            }
        } 

        if ($cust->pax >= '5' && $cust->pax <= '8') {
            if ($rest->pax8=='0'){ //no table
                Alert::toast('No available table', 'warning');
            } else {
                RestaurantModel::find(Auth::user()->id)->update(['current_queue'=>$id]);
                $exit = now();
                $exit->add(new DateInterval('PT' . $rest->time8 . 'M'))->format("H:i:s"); //getting the estimated exit time
                DB::table($user)->where('id', $id)->update(array(
                    'in_queue' => '00:00:00',
                    'est_enter' => null,
                    'enter' =>  $time,
                    'out_system' => $exit,
                    'status' => $rest->time8,
                ));
                RestaurantModel::find(Auth::user()->id)->update(['pax8'=> $rest->pax8-1]);
            }
        }
        
        //send $user->id to restaurant->current_queue (update table)
        //add end of timestamp? 
        //if pax ==  1/2 then add time for 2 pax and update to estimate end?

        //when call:
        //1. send the user id (queue no) to current_queue in restaurants table
        //2. update time = 00:00:00
        //3. update in_system = time for pax ////serving
        //4. out of system = timestamp when called + time for pax
        //5. update availability for pax -1
        //6. calculate next wait? //not sure how T-T

        return redirect('/worker');
    }

    function remove($id)
    {
        //remove cust data from database of restaurant (remove)
        //update availability for pax +1
        $rest = RestaurantModel::find(Auth::user()->id); //get no. of table available 
        $user = str_replace(array('[', ']', '"','"', ' '), '', Auth::user()->name); //change name to find db
        $cust = DB::table($user)->where('id', $id)->first(); //get data of customer

        if ($cust->pax >= '1' && $cust->pax <= '2') {
            Alert::toast('Removed', 'success');
            RestaurantModel::find(Auth::user()->id)->update(['pax2'=> $rest->pax2+1]);
        } elseif ($cust->pax >= '3' && $cust->pax <= '4') {
            Alert::toast('Removed', 'success');
            RestaurantModel::find(Auth::user()->id)->update(['pax4'=> $rest->pax4+1]);
        } elseif ($cust->pax >= '5' && $cust->pax <= '8') {
            Alert::toast('Removed', 'success');
            RestaurantModel::find(Auth::user()->id)->update(['pax8'=> $rest->pax8+1]);
        }

        DB::table($user)->where('id', $id)->limit(1)->delete();
        return redirect('/worker');
    }
}