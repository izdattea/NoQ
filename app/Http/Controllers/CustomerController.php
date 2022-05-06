<?php

namespace App\Http\Controllers;

use App\Models\CustomerModel;
use App\Models\UserModel;
use App\Models\RestaurantModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use DateTime;
use mysqli;

class CustomerController extends Controller
{
    public function queueID($id)
    {
        $rest = UserModel::find($id);
        $current = RestaurantModel::find($id);
        $user = str_replace(array('[', ']', '"','"', ' '), '', $rest->name);
        $last = DB::table($user)->latest('id')->first();

        if ($last ==  NULL){
            $last = 'null';
        } else {
            $last = $last;
        }

        return view('cust.queue', ['rest'=>$rest, 'current'=>$current, 'last'=>$last]);
        // return view('cust.queue', ['rest'=>$rest, 'current'=>$current]);
    }

    public function queueForm($id)
    {
        $rest = UserModel::find($id);

        return view('cust.form', ['rest'=>$rest]);
    }

    public function save(Request $req, $id)
    {
        $rest = UserModel::find($id); //pass restaurant name
        $user = str_replace(array('[', ']', '"','"', ' '), '', $rest->name); //remove whitespace of restaurant to find the database
        $data = RestaurantModel::find($id);
        date_default_timezone_set('Asia/Kuala_Lumpur'); //set timezone
        $time = date("H:i:s"); //set time format
        // $arr[] = DB::table($user)->where('time', $time)->first();

        //insert the form
       DB::table($user)->insert(array(
            'rest_id' => $rest->id,
            'rest_name' => $rest->name,
            'name' =>  $req->name,
            'pax' => $req->pax,
            'in_queue' => $time, 
        ));

        $cust = DB::table($user)->where('in_queue', $time)->first(); //sending customer data

        if ($req->pax >= '1' && $req->pax <= '2'){
            if ($data->pax2 != '0'){ //available table 
                DB::table($user)->where('in_queue', $time)->update([
                    'est_enter' => $time,
                ]);
            }   if ($data->pax2 == '0') { //if no available table 
                $result = DB::table($user)->select('id', 'out_system')->where([['status', '!=', NULL], ['pax', '2']])->get();
                foreach($result as $row){
                    $id = $row->id;
                    $exit = $row->out_system;
                    $serving2[] = array('id' => $id,'exit' => $exit); //supposedly should have the number of initial table value in here
                }

                $queue = DB::table($user)->select('id')->where('status', NULL)->get();
                foreach($queue as $queue){
                    $id = $queue->id;
                    $queue2[] = array('id' => $id); //supposedly should have the number of initial table value in here
                }

                $key =  array_search($cust->id, $queue2); //get index of cust in queue
                if ($key>='0' && $key<$data->i2){ //$key index 0-3 take same index of serving[]
                    DB::table($user)->where('in_queue', $time)->update([
                        'est_enter' => $serving2[$key]['exit'],
                    ]); 
                }
                if ($key>=$data->i2) { //more than pax
                    $est = DB::table($user)->where('id', $queue2[$key-$data->i2])->get('est_enter'); //not 4, should minus the initial amount of table
                    DB::table($user)->where('in_queue', $time)->update([
                        'est_enter' => $est, //getting the cust' id
                    ]);
                }
            } 
        } elseif ($req->pax >= '3' && $req->pax <= '4'){
            if ($data->pax4 != '0'){ //available table 
                DB::table($user)->where('in_queue', $time)->update([
                    'est_enter' => $time,
                ]);
            } elseif ($data->pax4 == '0') { //if no available table 
                $result = DB::table($user)->select('id', 'out_system')->where('wait_time', '0')->get();
                foreach($result as $row){
                    $id = $row->id;
                    $exit = $row->out_system;

                    $serving4[] = array('id' => $id,'exit' => $exit); //supposedly should have the number of initial table value in here
                }

                $queue = DB::table($user)->select('id')->where('status', NULL)->get();
                foreach($queue as $queue){
                    $id = $queue->id;
                    $queue4[] = array('id' => $id); //supposedly should have the number of initial table value in here
                }

                $key =  array_search($cust->id, $queue4); //get index of cust in queue 

                if ($key>='0' && $key<$data->i4){ 
                   DB::table($user)->where('in_queue', $time)->update([
                        'est_enter' => $serving4[$key]['exit'],
                    ]);  
                }

                if ($key>=$data->i4) { 
                    $est = DB::table($user)->where('id', $queue4[$key-$data->i4])->get('est_enter'); //not 4, should minus the initial amount of table
                    DB::table($user)->where('in_queue', $time)->update([
                        'est_enter' => $est, 
                    ]);
                }
            }
        } elseif ($req->pax >= '5' && $req->pax <= '8'){
            if ($data->pax8 != '0'){ //available table 
                DB::table($user)->where('in_queue', $time)->update([
                    'est_enter' => $time,
                ]);
            } elseif ($data->pax8 == '0') { //if no available table 
                $result = DB::table($user)->select('id', 'out_system')->where('wait_time', '0')->get();
                
                foreach($result as $row){
                    $id = $row->id;
                    $exit = $row->out_system;

                    $serving8[] = array('id' => $id,'exit' => $exit); //supposedly should have the number of initial table value in here
                }

                $queue = DB::table($user)->select('id')->where('status', NULL)->get();
                foreach($queue as $queue){
                    $id = $queue->id;
                    $queue8[] = array('id' => $id); //supposedly should have the number of initial table value in here
                }
                $key =  array_search($cust->id, $queue8); //get index of cust in queue

                if ($key>='0' && $key<$data->i8){ 
                   DB::table($user)->where('in_queue', $time)->update([
                        'est_enter' => $serving8[$key]['exit'],
                    ]);  
                }

                if ($key>=$data->i8) { 
                    $est = DB::table($user)->where('id', $queue8[$key-$data->i4])->get('est_enter'); //not 4, should minus the initial amount of table
                    DB::table($user)->where('in_queue', $time)->update([
                        'est_enter' => $est, 
                    ]);
                }
            }
        }

        Session::put('cust_id', $cust->id); //find how to create session without loggin in (once cust submit form, session start so display their queue number)
        
        return redirect()->route('cust.queue', ['id'=>$req->id, 'custid'=>Session::get('cust_id')]);

        //check if table is available?
        //if yes, estimate enter = current time, wait time = 0
        //if not, estimate enter = 1st entered?,  wait time = estimate exit of 1st customer - current time //not sure how to get the data lmao
        //
    }

    public function queueCust($id, $custid)
    {
        $rest = UserModel::find($id);
        $current = RestaurantModel::find($id);
        $user = str_replace(array('[', ']', '"','"', ' '), '', $rest->name);
        $cust =  DB::table($user)->find($custid);
        
        return view('cust.queueID',  ['rest'=>$rest, 'cust'=>$cust, 'current'=>$current]);
    }
}
