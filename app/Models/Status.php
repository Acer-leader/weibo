<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //微博模型指定 一条微博属于一个用户
    protected $fillable = ['content'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
