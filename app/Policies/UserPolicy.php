<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function update(User $currentUser,User $user)
    {
        /**
         * 默认授权用户策略文件
         */
        return $currentUser->id === $user->id;

    }
}

