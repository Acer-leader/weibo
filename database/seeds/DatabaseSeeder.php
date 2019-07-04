<?php

use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *现在应用中还不存在拥有管理员身份的用户，让我们对数据填充文件进行更改，将第一个生成的用户设置
    为管理员
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password','remember_token'])->toArray());

        $user = User::find(1);
        $user->name = 'Acer';
        $user->email = 'Acer@163.com';
        $user->is_admin = true;
        $user->save();
    }
}
