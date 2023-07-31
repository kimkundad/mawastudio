<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Response;
use Illuminate\Support\Facades\Storage;
use App\Models\donate;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sum = DB::table('donates')->sum('money');
        $count = DB::table('donates')->count();
        $objs = DB::table('donates')
            ->orderby('id', 'desc')
            ->paginate(15);

            $objs->setPath('');
          
        $data['objs'] = $objs;
        $data['sum'] = $sum;
        return view('admin.donate.index', compact('objs', 'count', 'sum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['method'] = "post";
        $data['url'] = url('admin/donate');
        return view('admin.donate.create', $data);
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
      //  dd($request->all());
        $this->validate($request, [
            'file' => 'required',
            'user_name' => 'required',
            'money' => 'required',
        ]);

      $image = $request->file('file');
      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $img = Image::make($image->getRealPath());
          $img->resize(500, 500, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('do_spaces')->put('mawastudio/donate/'.$image->hashName(), $img, 'public');

        $package = new donate();
        $package->user_name = $request['user_name'];
        $package->money = $request['money'];
        $package->email = $request['email'];
        $package->slip = $image->hashName();
        $package->save();

        $details = [
            'title' => 'คุณทำการลงทะเบียนผ่านเว็บ khunsukto.com สำเร็จแล้ว',
            'name' => $request['user_name'],
        ];
  
        if($request['email']){
          \Mail::to($request['email'])->send(new \App\Mail\DonateEmail($details));
        }
  
        $message = "แอดมินเพิ่มการร่วมบริจาค : ชื่อผู้บริจาค : ".$request->user_name.", ยอด : ".$request->money;
        $lineapi = env('line_token');
  
                  $image_thumbnail_url = url('images/mawastudio/donate/'.$package->slip);  // max size 240x240px JPEG
                  $image_fullsize_url = url('images/mawastudio/donate/'.$package->slip); //max size 1024x1024px JPEG
                  $imageFile = 'copy/240.jpg';
                  $sticker_package_id = '';  // Package ID sticker
                  $sticker_id = '';    // ID sticker
                  
  
                  $message_data = array(
                  'imageThumbnail' => $image_thumbnail_url,
                  'imageFullsize' => $image_fullsize_url,
                  'message' => $message,
                  'imageFile' => $image_fullsize_url,
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

                  return redirect(url('admin/donate'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
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
        $objs = donate::find($id);
        $data['url'] = url('admin/donate/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        $data['pro_id'] = $id;
        return view('admin.donate.edit', $data);
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
            'user_name' => 'required',
            'money' => 'required',
        ]);

        $image = $request->file('file');

        if($image == NULL){

            $objs = donate::find($id);
            $objs->user_name = $request['user_name'];
            $objs->money = $request['money'];
            $objs->email = $request['email'];
            $objs->save();

        }else{

            $img = DB::table('donates')
            ->where('id', $id)
            ->first();
  
            $storage = Storage::disk('do_spaces');
            $storage->delete('mawastudio/donate/' . $img->slip, 'public');


            $image = $request->file('file');
      $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

      $img = Image::make($image->getRealPath());
          $img->resize(500, 500, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('do_spaces')->put('mawastudio/donate/'.$image->hashName(), $img, 'public');

        $package = donate::find($id);
        $package->user_name = $request['user_name'];
        $package->money = $request['money'];
        $package->email = $request['email'];
        $package->slip = $image->hashName();
        $package->save();

        }

        return redirect(url('admin/donate/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_donate($id)
    {
        //

        $objs = DB::table('donates')
        ->where('id', $id)
        ->first();

        if(isset($objs->slip)){
            $storage = Storage::disk('do_spaces');
            $storage->delete('mawastudio/donate/' . $objs->slip, 'public');
        }

    $obj = donate::find($id);
    $obj->delete();

    return redirect(url('admin/donate/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
