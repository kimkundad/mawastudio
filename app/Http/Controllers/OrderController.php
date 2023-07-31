<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Response;
use Illuminate\Support\Facades\Storage;
use App\Models\order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $count = DB::table('orders')->count();
        $objs = DB::table('orders')
            ->orderby('id', 'desc')
            ->paginate(15);

            $objs->setPath('');
        $data['objs'] = $objs;

        return view('admin.order.index', compact('objs', 'count'));
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

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
        $objs = order::find($id);
        $data['url'] = url('admin/order/'.$id);
        $data['method'] = "put";
        $data['order'] = $objs;
        $data['pro_id'] = $id;
        return view('admin.order.edit', $data);
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
              'user_id' => 0,
              'status' => 0,
              'status_order' => 0,
              'status_checkin' => 0
            ]
          );
        }

        $pieces2 = explode(",", $request->my_seasts);
        for($i = 0; $i < count($pieces2); $i++){

            DB::table('seasts')
            ->where('seats_name', $pieces2[$i])
            ->update(
              [
                'user_id' => $order->id,
                'status' => 1,
                'status_order' => $request['status'],
                'status_checkin' => 0
              ]
            );
          }

          if($request['status'] == 0){
            $my_status = 'รอชำระเงิน';
          }
          if($request['status'] == 1){
            $my_status = 'รอการตรวจสอบ';
          }
          if($request['status'] == 2){
            $my_status = 'ชำระเงินสำเร็จ';
          }


           $objs = order::find($id);
           $objs->email = $request['email'];
           $objs->username = $request['username'];
           $objs->phone = $request['phone'];
           $objs->line = $request['line'];
           $objs->status = $request['status'];
           $objs->my_seasts = $request['my_seasts'];
           $objs->price = $request['price'];
           $objs->remark = $my_status;
           $objs->save();

           if($request['email_status'] == 1){

            if($request['status'] == 2){

            $details = [
                'title' => 'คุณทำการลงทะเบียนผ่านเว็บ khunsukto.com สำเร็จแล้ว',
                'name' => $request['username'],
                'seasts' => $pieces,
                'order_id' => $order->order_id,
                ];
        
              \Mail::to($request['email'])->send(new \App\Mail\SuccessEmail($details));
            }

           }
           
           return redirect(url('admin/order/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_order($id)
    {
        //
        $order = order::find($id);

        $pieces = explode(",", $order->my_seasts);

        for($i = 0; $i < count($pieces); $i++){

          DB::table('seasts')
          ->where('seats_name', $pieces[$i])
          ->update(
            [
              'user_id' => 0,
              'status' => 0,
              'status_order' => 0,
              'status_checkin' => 0
            ]
          );
        }

        if(isset($order->image_order)){
            $storage = Storage::disk('do_spaces');
            $storage->delete('mawastudio/slip/' . $objs->image_order, 'public');
        }
        if(isset($order->image_order_small)){
            $storage = Storage::disk('do_spaces');
            $storage->delete('mawastudio/slip2/' . $objs->image_order_small, 'public');
        }

        $obj = order::find($id);
        $obj->delete();
    
        return redirect(url('admin/order/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');


    }
}
