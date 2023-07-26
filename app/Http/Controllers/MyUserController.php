<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\role_user;
use Illuminate\Support\Facades\Hash;

class MyUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $objs = DB::table('users')->select(
            'users.*',
            'users.id as id_q',
            'users.name as names',
            'users.status as status1',
            'role_user.*',
            'roles.*',
            'roles.name as name1',
            )
            ->leftjoin('role_user', 'role_user.user_id',  'users.id')
            ->leftjoin('roles', 'roles.id',  'role_user.role_id')
            ->orderby('role_user.id', 'asc')
            ->paginate(15);

            $objs->setPath('');

        return view('admin.MyUser.index', compact('objs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Role = Role::all();
        $data['Role'] = $Role;
        $data['method'] = "post";
        $data['url'] = url('admin/MyUser');
        return view('admin.MyUser.create', $data);
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
            'option2' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => 'required'
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'avatar' => $request['option2'],
            'code_user' => $request['password'],
            'provider' => 'email',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'is_admin' => 0,
            'password' => Hash::make($request['password']),
        ]);

        $objs = Role::where('id', $request['role'])->first();

        $user
        ->roles()
        ->attach(Role::where('name', $objs->name)->first());

        return redirect(url('admin/MyUser'))->with('add_success','เพิ่ม เสร็จเรียบร้อยแล้ว');
        
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
        $get_role = DB::table('role_user')->where('user_id',$id)->first();
        
        $data['get_role'] = $get_role;
        $objs = User::find($id);
        $data['url'] = url('admin/MyUser/'.$id);
        $data['method'] = "put";
        $data['objs'] = $objs;
        $Role = Role::all();
        $data['Role'] = $Role;
        return view('admin.MyUser.edit', $data);
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
        

            if($request['password'] == null){

                $this->validate($request, [
                    'option2' => 'required',
                    'name' => 'required',
                    'email' => 'required'
                ]);

                $objs = User::find($id);
                $objs->name = $request['name'];
                $objs->email = $request['email'];
                $objs->phone = $request['phone'];
                $objs->avatar = $request['option2'];
                $objs->save();

            }else{

                $this->validate($request, [
                    'option2' => 'required',
                    'name' => 'required',
                    'email' => 'required',
                    'password' => ['required', 'string', 'min:8', 'confirmed'],
                    'role' => 'required'
                ]);

                $objs = User::find($id);
                $objs->name = $request['name'];
                $objs->email = $request['email'];
                $objs->phone = $request['phone'];
                $objs->avatar = $request['option2'];
                $objs->code_user = $request['password'];
                $objs->password = Hash::make($request['password']);
                $objs->save();

            }

           
            // dd($request['role']);

            $get_role = DB::table('role_user')->where('user_id',$id)->first();
            if($get_role){
                DB::table('role_user')
                ->where('user_id', $id)
                ->update(['role_id' => $request['role']]);
            }else{

                $obj = Role::where('id', $request['role'])->first();

                $objs
                ->roles()
                ->attach(Role::where('name', $obj->name)->first());
                
            }
           

              return redirect(url('admin/MyUser/'.$id.'/edit'))->with('edit_success','คุณทำการเพิ่มอสังหา สำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function del_MyUser($id)
    {
        //
        $obj = User::find($id);
        $obj->delete();

        DB::table('role_user')
            ->where('user_id', $id)
            ->delete();

        return redirect(url('admin/MyUser/'))->with('del_success','คุณทำการลบอสังหา สำเร็จ');
    }
}
