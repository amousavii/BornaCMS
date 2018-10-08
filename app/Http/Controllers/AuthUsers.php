<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AuthUsers extends Controller
{
    //
    public function login(Request $request){

        $data = $request->all();

        if($auth = Sentinel::authenticate($data)){
            session(['user' => Sentinel::getUSer()]);
            return redirect('/admin/users')->withSuccess('You have entered Successfully');
        } else{
            return back()->withSuccess('Login Failed');
        }


    }
}
