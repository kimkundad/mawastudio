<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;
use Response;
use Illuminate\Support\Facades\Storage;
use App\Models\evnet;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $count = DB::table('evnets')->count();
        $objs = DB::table('evnets')
            ->orderby('id', 'desc')
            ->paginate(15);

            $objs->setPath('');
        $data['objs'] = $objs;

        
        return view('admin.events.index', compact('objs', 'count'));
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
        $data['url'] = url('admin/events');
        return view('admin.events.create', $data);
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

        $this->validate($request, [
            'name' => 'required',
            'image_pro' => 'required'
        ]);

          $image = $request->file('image_pro');
          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(800, 800, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->stream();
        Storage::disk('do_spaces')->put('mawastudio/img/'.$image->hashName(), $img, 'public');

        $status = 0;
        if(isset($request['status'])){
            if($request['status'] == 1){
                $status = 1;
            }
        }

        $objs = new evnet();
           $objs->name = $request['name'];
           $objs->image = $image->hashName();
           $objs->language = 'THAI';
           $objs->date_event = $request['date_event'];
           $objs->location_event = $request['location_event'];
           $objs->total = $request['total'];
           $objs->ticketCost = $request['ticketCost'];
           $objs->rows = 6;
           $objs->cols = 6;
           $objs->e_status = $status;
           $objs->detail = $request['kt_docs_ckeditor_classic'];
           $objs->save();

           return redirect(url('admin/events'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');

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
        $objs = evnet::find($id);
        $data['url'] = url('admin/events/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        $data['pro_id'] = $id;
        return view('admin.events.edit', $data);
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
            'name' => 'required',
        ]);

        $image = $request->file('image_pro');

        $status = 0;
            if(isset($request['status'])){
                if($request['status'] == 1){
                    $status = 1;
                }
            }

        if($image == NULL){

            $objs = evnet::find($id);
            $objs->name = $request['name'];
            $objs->language = 'THAI';
            $objs->date_event = $request['date_event'];
            $objs->location_event = $request['location_event'];
            $objs->total = $request['total'];
            $objs->ticketCost = $request['ticketCost'];
            $objs->rows = 6;
            $objs->cols = 6;
            $objs->e_status = $status;
            $objs->detail = $request['kt_docs_ckeditor_classic'];
           $objs->save();

        }else{

            $img = DB::table('evnets')
          ->where('id', $id)
          ->first();

          $storage = Storage::disk('do_spaces');
          $storage->delete('mawastudio/img/' . $img->image, 'public');

          $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

          $img = Image::make($image->getRealPath());
          $img->resize(800, 800, function ($constraint) {
          $constraint->aspectRatio();
            });
            $img->stream();
            Storage::disk('do_spaces')->put('mawastudio/img/'.$image->hashName(), $img, 'public');


            $objs = evnet::find($id);
            $objs->name = $request['name'];
            $objs->language = 'THAI';
            $objs->date_event = $request['date_event'];
            $objs->location_event = $request['location_event'];
            $objs->total = $request['total'];
            $objs->ticketCost = $request['ticketCost'];
            $objs->rows = 6;
            $objs->cols = 6;
            $objs->image = $image->hashName();
            $objs->e_status = $status;
            $objs->detail = $request['kt_docs_ckeditor_classic'];
           $objs->save();

        }

        return redirect(url('admin/events/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_events($id)
    {
        //
        $objs = DB::table('evnets')
        ->where('id', $id)
        ->first();

        if(isset($objs->image)){
            $storage = Storage::disk('do_spaces');
            $storage->delete('mawastudio/img/' . $objs->image, 'public');
        }

    $obj = evnet::find($id);
    $obj->delete();

    return redirect(url('admin/events/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
