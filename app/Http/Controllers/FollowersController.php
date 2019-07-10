<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class FollowersController extends Controller
{
    //授权
    public function __construct()
    {
        $this->middleware('auth');
    }
    //guanzhu
    public function store(User $user)
    {
        $this->authorize('follow', $user);
        if ( ! Auth::user()->isFollowing($user->id)) {
            Auth::user()->follow($user->id);
        }
        return redirect()->route('users.show', $user->id);
    }
//qu xiaoguanzhu
    public function destroy(User $user)
    {
        $this->authorize('follow', $user);
        if (Auth::user()->isFollowing($user->id)) {
            Auth::user()->unfollow($user->id);
        }
        return redirect()->route('users.show', $user->id);
    }
}
