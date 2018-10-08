<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Photo;
use App\User;
//use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Sentinel;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminUsersController extends Controller
{
//    private $sentinel;
//    private $user;
//
//
//    function __construct(User $user, Sentinel $sentinel)
//    {
//        $this->sentinel = $sentinel;
//        $this->user = $user;
//    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();


        return view('admin.users.index',compact('users'));
//        dd($user);
//        dd($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles =Sentinel::getRoleRepository()->get();
        return view('admin.users.create',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        if($file = $request->file('user_img')){

            $name =time(). $file->getClientOriginalName();
            $file->move('images/users',$name);
            $photo=Photo::create(['path'=>$name]);
            $data['photo_id'] = $photo->id;

        }

        $user = Sentinel::registerAndActivate($data);
        $role=Sentinel::findRoleBySlug($data['role']);
        $role->users()->attach($user);

        return $this->index();





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
        $user = Sentinel::findUserById($id);
        $roles =Sentinel::getRoleRepository()->get();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        if(trim($request->password )==''){

            $data = $request->except('password');
        }else{
            $data = $request->all();
        }

        if($file = $request->file('user_img')){

            $name =time(). $file->getClientOriginalName();
            $file->move('images/users',$name);
            $photo=Photo::create(['path'=>$name]);
            $data['photo_id'] = $photo->id;

        }


        $user = Sentinel::findUserById($id);
        $role=Sentinel::findRoleBySlug($data['role']);
        if(!$user->inRole($role)){
            $role->users()->attach($user);
        }

        $user = Sentinel::update($user, $data);


        return redirect('admin/users')->withSuccess('user Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Sentinel::findUserById($id);
        $user->delete();
        return redirect('admin/users')->withSuccess('user Deleted Successfully');
    }

    public function roleIndex(){
        $roles =Sentinel::getRoleRepository()->get();
        return view('admin.users.index-role', compact('roles'));
    }
    public function roleCreate(){
        return view('admin.users.create-role');
    }
    public function roleStore(Request $request){
        $data = $request->all();
        $role = Sentinel::getRoleRepository()->createModel()->create($data);

//            return view('admin.users.index-role');
       return $this->roleIndex();

    }
}
