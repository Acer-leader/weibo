<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class UsersController extends Controller
{
    //注册页面
    public function create()
    {
        return view('users.create');
    }

    //个人用户展示

    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    public function store(Request $request)
    {
        //用户提交后处理
        $this->validate($request,[
            'name' => 'required|max:50',
            'email'=> 'required|email|unique:users|max:255',
            'password'=>'required|confirmed|min:6'
        ]);
        return;
    }
}
