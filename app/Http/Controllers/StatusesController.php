<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Auth;
class StatusesController extends Controller
{
    //中间件管理用户登录情况
    public function __construct()
    {
        $this->middleware('auth');
    }

    //创建weibo
    public function store(Request $request)
    {
        $this->validate($request,[
            'content'=>'required|max:140'
        ]);
        Auth::user()->statuses()->create([
            'content'=>$request['content']
        ]);
        session()->flash('success','发布成功');
        return redirect()->back();
    }
    public function destroy(Status $status)
    {
        //做授权检测
        $this->authorize('destroy',$status);
        $status->delete();
        session()->flash('success','微博已经删除!');
        return redirect()->back();
    }
}
