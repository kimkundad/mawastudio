<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\evnet;
use App\Models\seast_group;
use App\Models\seast;
use App\Models\order;

class DashboardController extends Controller
{
    //

    public function index(){

        $objA = seast::where('group_id', 1)->get();
        $data['objA'] = $objA;
        $objB = seast::where('group_id', 2)->get();
        $data['objB'] = $objB;
        $objC = seast::where('group_id', 3)->get();
        $data['objC'] = $objC;
        $objD = seast::where('group_id', 4)->get();
        $data['objD'] = $objD;
   
        return view('admin.dashboard.index', $data);
    }

    public function edit_seasts($id){
        $data['url'] = url('admin/postSeasts/'.$id);
        $data['method'] = "post";
        $objs = seast::find($id);

        $order = order::where('id', $objs->user_id)->first();
        $data['order'] = $order;
        $data['objs'] = $objs;
        return view('admin.dashboard.edit-seasts', $data);
    }

    public function test(){
        $pizza  = "A13";
        $pieces = explode(",", $pizza);

        dd(count($pieces));
    }

    public function api_post_status_user(Request $request){
        //$request['user_id']

        $count = seast::where('seats_name', $request['user_id'])->where('status_checkin', 0)->count();

        if($count > 0){

            DB::table('seasts')
          ->where('seats_name', $request['user_id'])
          ->where('status_checkin', 0)
          ->update(
            [
              'status_checkin' => 1,
            ]
          );

          return response()->json([ 
            'data' => [
            'success' => 'success',
            'date_time' => date("Y-m-d H:i:s")
          ] ], 200);

        }else{
            return response()->json([ 
                'data' => [
                'success' => 'Not success',
                'date_time' => date("Y-m-d H:i:s")
              ] ], 201);

        }
        


    }

    public function verify_checkin(Request $request){

        // $request['orderid']
        // $request['seasts']
        $order = order::where('order_id', $request['orderid'])->first();
        $data['order'] = $order;
        $data['seasts'] = $request['seasts'];
        $myseasts = order::whereIn('my_seasts', [$request['seasts']])->count();
        $data['myseasts'] = $myseasts;

        $count = seast::where('seats_name', $request['seasts'])->where('status_checkin', 0)->count();
        $data['count'] = $count;
        return view('admin.dashboard.verify', $data);

    }  


    public function add_order_by_seasts(Request $request, $id){
        
        // dd($request['status']);

        $mystatus = $request['status'];

        $this->validate($request, [
            'email' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'price' => 'required',
        ]);

        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 15; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        if($request['status'] == 2){
            $remark = 'ชำระเงินสำเร็จ';
        }else{
            $remark = 'รอการตรวจสอบ';
        }

           $objs = new order();
           $objs->email = $request['email'];
           $objs->username = $request['username'];
           $objs->phone = $request['phone'];
           $objs->line = $request['line'];
           $objs->status = $request['status'];
           $objs->order_id = $randomString;
           $objs->my_seasts = $request['my_seasts'];
           $objs->order_event_id = $request['order_event_id'];
           $objs->price = $request['price'];
           $objs->remark = $remark;
           $objs->save();


           $pieces = explode(",", $request['my_seasts']);
           $the_id = $objs->id;

        for($i = 0; $i < count($pieces); $i++){

          DB::table('seasts')
          ->where('seats_name', $pieces[$i])
          ->where('event_id', $request['order_event_id'])
          ->update(
            [
              'status' => 1,
              'status_order' => $request['status'],
              'user_id' => $the_id
            ]
          );

        }


        $message = "เจ้าหน้าที่ทำการเพิ่มผู้งทะเบียนใหม่ #: ". $randomString ." ชื่อผู้ : ".$request['username'].", ".$request['email'].", ".$request['phone'].", ที่นั่ง :".$request['my_seasts'];
                $lineapi = env('line_token');
        
                $mms =  trim($message);
                $chOne = curl_init();
                curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
                curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($chOne, CURLOPT_POST, 1);
                curl_setopt($chOne, CURLOPT_POSTFIELDS, "message=$mms");
                curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
                $headers = array('Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'',);
                curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($chOne);
                if(curl_error($chOne)){
                echo 'error:' . curl_error($chOne);
                }else{
                $result_ = json_decode($result, true);
                }
                curl_close($chOne);

        if($mystatus == 1){


            $details = [
                'title' => 'คุณทำการลงทะเบียนผ่านเว็บ khunsukto.com สำเร็จแล้ว',
                'name' => $request['username'],
                'price' => $request['price'],
                'order_id' => $randomString,
                ];
        
              \Mail::to($request['email'])->send(new \App\Mail\HelloEmail($details));

        }
        
        if($mystatus == 2){

          for($j = 0; $j < count($pieces); $j++){

            $details = [
                'title' => 'คุณทำการลงทะเบียนผ่านเว็บ khunsukto.com สำเร็จแล้ว',
                'name' => $request['username'],
                'seasts' => $pieces[$j],
                'order_id' => $randomString,
                ];
        
              \Mail::to($request['email'])->send(new \App\Mail\SuccessEmail($details));

          }

        }

        return redirect(url('admin/edit_seasts/'.$id))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');


    }

    public function edit_order_by_seasts(Request $request, $id){
        //email_status
       // dd($request['email_status']);

        $this->validate($request, [
            'email' => 'required',
            'username' => 'required',
            'phone' => 'required'
        ]);

 

        $order = order::find($id);

        $pieces = explode(",", $order->my_seasts);

        for($i = 0; $i < count($pieces); $i++){

          DB::table('seasts')
          ->where('seats_name', $pieces[$i])
          ->update(
            [
              'status_order' => $request['status']
            ]
          );
        }

        if($request['status'] == 0){
          $remark = 'รอชำระเงิน';
          }
        if($request['status'] == 2){
          $remark = 'ชำระเงินสำเร็จ';
          }
        if($request['status'] == 1){
              $remark = 'รอการตรวจสอบ';
          }

           $objs = order::find($id);
           $objs->email = $request['email'];
           $objs->username = $request['username'];
           $objs->phone = $request['phone'];
           $objs->line = $request['line'];
           $objs->status = $request['status'];
           $objs->remark = $remark;
           $objs->save();

           if($request['email_status'] == 1){

            if($request['status'] == 2){

              for($j = 0; $j < count($pieces); $j++){

            $details = [
                'title' => 'คุณทำการลงทะเบียนผ่านเว็บ khunsukto.com สำเร็จแล้ว',
                'name' => $request['username'],
                'seasts' => $pieces[$j],
                'order_id' => $order->order_id,
                ];
        
              \Mail::to($request['email'])->send(new \App\Mail\SuccessEmail($details));
            }

          }

           }

           
           return redirect(url('admin/edit_seasts/'.$request['seasts_id']))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    public function postSeasts(Request $request, $id){

        $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

            $objs = seast::find($id);
            $objs->status = $status;
           $objs->save();

           return redirect(url('admin/edit_seasts/'.$id))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }


}
