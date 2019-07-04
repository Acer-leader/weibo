<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        Auth::login($user);
        session()->flash('success','欢迎 你将开始一段新的旅程');
        return redirect()->route('users.show',[$user]);
    }
    //用户修改展示页面
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    //更新页面动作

    public function update(User $user,Request $request)
    {
        //规则
        $this->validate($request,[
           'name'=>'required|max:50',
           'password'=> 'nullable|confirmed|min:6',
        ]);
        $data = [];
        $data['name'] = $request->name;
        if ($request->password){
            $data['password'] = bcrypt($request->password);
        }
        //处理动作
       $user->update($data);
        session()->flash('success','个人资料更新成功');
        return redirect()->route('users.show',$user);
    }
}
