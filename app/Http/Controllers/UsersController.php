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
}
