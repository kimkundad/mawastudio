<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\evnet;
use App\Models\seast_group;
use App\Models\seast;
use App\Models\order;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function email(){
      $id = 1;
      $order = order::find($id);
      return view('admin.dashboard.verify');
    }

    public function create_roomsA(){
      for($i = 1; $i <= 125; $i++){
        seast::create([
          'event_id' => 1,
          'group_id' => 1,
          'seats_name' => 'A'.$i,
          'user_id' => 0,
          'status' => 0,
          'status_order' => 0
      ]);
      }
      return response()->json([
        'data' => 'success'
      ]);
    }

    public function create_roomsB(){
      for($i = 1; $i <= 125; $i++){
        seast::create([
          'event_id' => 1,
          'group_id' => 2,
          'seats_name' => 'B'.$i,
          'user_id' => 0,
          'status' => 0,
          'status_order' => 0
      ]);
      }
      return response()->json([
        'data' => 'success'
      ]);
    }

    public function create_roomsC(){
      for($i = 1; $i <= 125; $i++){
        seast::create([
          'event_id' => 1,
          'group_id' => 3,
          'seats_name' => 'C'.$i,
          'user_id' => 0,
          'status' => 0,
          'status_order' => 0
      ]);
      }
      return response()->json([
        'data' => 'success'
      ]);
    }

    public function create_roomsD(){
      for($i = 1; $i <= 50; $i++){
        seast::create([
          'event_id' => 1,
          'group_id' => 4,
          'seats_name' => 'D'.$i,
          'user_id' => 0,
          'status' => 0,
          'status_order' => 0
      ]);
      }
      return response()->json([
        'data' => 'success'
      ]);
    }

    public function get_event($id){

      $evnet = evnet::where('id', $id)->first();

      return response()->json([ 'data' => $evnet ], 200);

    }

    public function addPayment(Request $request){

      $objs = order::where('order_id', $request->orderNo)->first();
      
      $image = $request->file('file');
      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $img = Image::make($image->getRealPath());
          $img->resize(500, 500, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('do_spaces')->put('mawastudio/slip/'.$image->hashName(), $img, 'public');

        $image2 = $request->file('file');
      $input['imagename'] = time().'.'.$image2->getClientOriginalExtension();

        $img2 = Image::make($image2->getRealPath());
          $img2->resize(235, 235, function ($constraint2) {
          $constraint2->aspectRatio();
        });
        $img2->stream();
        Storage::disk('do_spaces')->put('mawastudio/slip2/'.$image2->hashName(), $img2, 'public');
  
      if($objs){

        $pieces = explode(",", $objs->my_seasts);

        for($i = 0; $i < count($pieces); $i++){

          DB::table('seasts')
          ->where('seats_name', $pieces[$i])
          ->update(
            [
              'status_order' => 1
            ]
          );

        }

        DB::table('orders')
      ->where('order_id', $request->orderNo)
      ->update(
        [
          'status' => 1,
          'image_order' => $image->hashName(),
          'image_order_small' => $image2->hashName(),
          'remark' => 'รอการตรวจสอบ'
        ]
      );

      $new = order::where('order_id', $request->orderNo)->first();

      $message = "ข้อความแจ้งการชำระเงิน # : ". $request->orderN ." ชื่อผู้ติดต่อ : ".$objs->username.", ".$objs->phone.", ".$objs->email.", ยอดชำระ : ".$objs->price;
      $lineapi = env('line_token');

                $image_thumbnail_url = url('images/mawastudio/slip2/'.$new->image_order_small);  // max size 240x240px JPEG
                $image_fullsize_url = url('images/mawastudio/slip/'.$new->image_order); //max size 1024x1024px JPEG
                $imageFile = 'copy/240.jpg';
                $sticker_package_id = '';  // Package ID sticker
                $sticker_id = '';    // ID sticker

                $message_data = array(
                'imageThumbnail' => $image_thumbnail_url,
                'imageFile' => $image_fullsize_url,
                'message' => $message,
                'stickerPackageId' => $sticker_package_id,
                'stickerId' => $sticker_id
                );

                $headers = array('Method: POST', 'Content-type: multipart/form-data', 'Authorization: Bearer '.$lineapi );
                $mms =  trim($message);
                $chOne = curl_init();
                curl_setopt($chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
                curl_setopt($chOne, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($chOne, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($chOne, CURLOPT_POST, 1);
                curl_setopt($chOne, CURLOPT_POSTFIELDS, $message_data);
                curl_setopt($chOne, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($chOne, CURLOPT_RETURNTRANSFER, 1);
                $result = curl_exec($chOne);
                if(curl_error($chOne)){
                echo 'error:' . curl_error($chOne);
                }else{
                $result_ = json_decode($result, true);
                echo "status : ".$result_['status'];
                echo "message : ". $result_['message'];
                }
                curl_close($chOne);

        return response()->json([ 'data' => 'เจอหมายเลขสั่งจอง', 'order' => $objs ], 200);

      }else{
        return response()->json([ 'data' => 'กดข้อผิดพลาด! เราไม่เจอหมายเลขสั่งจองของคุณ', 'order' => $request->orderNo ], 201);
      }

    }

    public function addOrder(Request $request){

      // $seatDetails = $request->seatDetails;
   
      $check = count(collect($request->user['seatDetails']));

      if($check > 1){

        $count = seast::select('status')
                ->whereIn('seats_name', $request->user['seatDetails'])
                ->where('event_id', $request->user['movieId'])
                ->where('status', 0)
                ->where('user_id', 0)
                ->count();

      }else{

        $count = seast::select('status')
                ->where('seats_name', $request->user['seatDetails'])
                ->where('event_id', $request->user['movieId'])
                ->where('status', 0)
                ->where('user_id', 0)
                ->count();

      }

      

      if($count === count(collect($request->user['seatDetails']))){

        $characters = '0123456789';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < 15; $i++) {
          $randomString .= $characters[random_int(0, $charactersLength - 1)];
      }

      seast::create([
        'event_id' => 1,
        'group_id' => 4,
        'seats_name' => 'D'.$i,
        'user_id' => 0,
        'status' => 0
    ]);

    if($check > 1){

      $package = new order();
      $package->order_id = $randomString;
      $package->email = $request->user['email'];
      $package->username = $request->user['userName'];
      $package->phone = $request->user['phone'];
      $package->line = $request->user['line'];
      $package->my_seasts = rtrim(implode(',', $request->user['seatDetails']), ',');
      $package->order_event_id = $request->user['movieId'];
      $package->price = $request->user['usetotal'];
      $package->remark = 'รอชำระเงิน';
      $package->save();

      $the_id = $package->id;

      DB::table('seasts')
      ->whereIn('seats_name', $request->user['seatDetails'])
      ->where('event_id', $request->user['movieId'])
      ->where('status', 0)
      ->where('user_id', 0)
      ->update(
        [
          'status' => 1,
          'user_id' => $the_id
        ]
      );

      $message = "มีผู้งทะเบียนใหม่ #: ". $randomString ." ชื่อผู้ : ".$request->user['userName'].", ".$request->user['email'].", ".$request->user['phone'].", ที่นั่ง :".rtrim(implode(',', $request->user['seatDetails']), ',');

    }else{

      $package = new order();
      $package->order_id = $randomString;
      $package->email = $request->user['email'];
      $package->username = $request->user['userName'];
      $package->phone = $request->user['phone'];
      $package->line = $request->user['line'];
      $package->my_seasts = $request->user['seatDetails'];
      $package->order_event_id = $request->user['movieId'];
      $package->price = $request->user['usetotal'];
      $package->remark = 'รอชำระเงิน';
      $package->save();

      $the_id = $package->id;

      DB::table('seasts')
      ->where('seats_name', $request->user['seatDetails'])
      ->where('event_id', $request->user['movieId'])
      ->where('status', 0)
      ->where('user_id', 0)
      ->update(
        [
          'status' => 1,
          'user_id' => $the_id
        ]
      );

      $message = "มีผู้งทะเบียนใหม่ #: ". $randomString ." ชื่อผู้ : ".$request->user['userName'].", ".$request->user['email'].", ".$request->user['phone'].", ที่นั่ง :".$request->user['seatDetails'];

    }
       

      

      $details = [
        'title' => 'คุณทำการลงทะเบียนผ่านเว็บ khunsukto.com สำเร็จแล้ว',
        'name' => $request->user['userName'],
        'price' => $request->user['usetotal'],
        'seatDetails' => $request->user['seatDetails'],
        'order_id' => $randomString,
    ];
      $myemail = 'kim.kundad@gmail.com';

      \Mail::to($request->user['email'])->send(new \App\Mail\HelloEmail($details));

      
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
    //    echo "status : ".$result_['status'];
    //    echo "message : ". $result_['message'];
        }
        curl_close($chOne);


      return response()->json([ 'data' => 'คุณสามารถจองได้', 'order_id' => $randomString, 'count' => $count ], 200);

      }else{

        return response()->json([ 'data' => 'เสียใจด้วย ที่นั่งของคุณได้ถูกจองไปแล้ว' ], 201);

      }

    }

    public function getDataOrder($id){

      $objs = order::where('order_id', $id)->first();

      if($objs){

        $evnet = evnet::where('id', $objs->order_event_id)->first();

        return response()->json([ 'data_order' => $objs, 'event' => $evnet], 200);

      }else{

        return response()->json([ 'data_order' => null], 204);

      }

      

    }

    public function useCheckSeasts(Request $request, $id){

      $selectedSeats = $request->selectedSeats;

      $count = seast::select('status')
                ->whereIn('seats_name', $request->selectedSeats)
                ->where('event_id', $id)
                ->where('status', 0)
                ->count();

      if($count == count($selectedSeats)){

        return response()->json([ 'data' => 'คุณสามารถจองได้', 'sum' => count($selectedSeats) ], 200);
      }else{
        return response()->json([ 'data' => 'มีการกดจองที่นั่งของคุณก่อนหน้านี้แล้ว กรุณาเลือกที่นั่งใหม่', 'sum' => count($selectedSeats) ], 204);
      }

    }

    public function get_seats($id){

      $event = evnet::find($id);

      $group = seast_group::select('group_name', 'id')->where('event_id', $id)->get();

      $arr = [];

      if($group){
        foreach($group as $key=>$u){
          $arr[$u->group_name] = seast::select('status')->where('group_id', $u->id)->pluck('status')->toArray();
        }
      }


      $seast = seast::select('status')->where('event_id', $id)->get();

        return response()->json([
                'id' => $event->id,
                'name' => $event->name,
                'language' => $event->language,
                'ticketCost' => $event->ticketCost,
                'event' => $event,
                'group' => $arr,
                'rows' => 20,
                'cols' => 6,
                'seats' => [
                    'A' => [
                        0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                      ],
                      'B' => [
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                      ],
                      'C' => [
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                      ],
                      'D' => [
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 
                        0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,
                      ],
                ]
          
        ], 200);

    }
}

