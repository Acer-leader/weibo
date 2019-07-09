<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Auth;
class StaticPagesController extends Controller
{
    //主页 展示微博
    public function home()
    {
        $feed_items = [];
        if (Auth::check()) {
            $feed_items = Auth::user()->feed()->paginate(30);
        }
        return view('static_page/home', compact('feed_items'));
    }
    //shanchuweibo

    //帮助页
    public function help()
    {
        return view('static_page/help');
    }
    //关于页
    public function about()
    {
        return view("static_page/about");
    }
}
