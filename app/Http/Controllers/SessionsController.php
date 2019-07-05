<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    //登录后用户限制访问注册页面
    public function __construct()
    {
        $this->middleware('guest',[
            'only' => ['create']
        ]);
    }

    //创建create动作展示登录视图
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request,[
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials,$request->has('remember'))){
           //登录校对
            if (Auth::user()->activated){
                session()->flash('success','欢迎回来');
                $fallback = route('users.show',Auth::user());
                return redirect()->intended($fallback);
            } else {
                Auth::logout();
                session()->flash('warning','您的账号未激活，请检查邮件进行激活');
                return redirect('/');
            }
        }else{
            //登录失败后的相关操作
            session()->flash('danger','您的邮箱或者密码不匹配');
            return redirect()->back()->withInput();
        }
    }
    //退出请求处理
    public function destroy()
    {
        Auth::logout();
        session()->flash('success','您已经成功退出');
        return redirect('login');
    }
}
