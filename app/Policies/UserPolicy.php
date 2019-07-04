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

    public function destroy(User $currentUser,User $user)
    {
        //只有当前用户拥有管理员权限且删除的用户不是自己时才显示链接
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
}

