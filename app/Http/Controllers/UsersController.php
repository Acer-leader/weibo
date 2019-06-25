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
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6',
        ]);
        //保存用户数据
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        session()->flash('success','欢迎 你将开始一段新的旅程');
        return redirect()->route('users.show',[$user]);
    }
}
