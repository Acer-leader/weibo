<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * 解决语法错误  SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 1000 bytes (SQL: alter table `users` add unique
`users_email_unique`(`email`))
 */

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 添加此函数
        Schema::defaultStringLength(191);
    }
}
