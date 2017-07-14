<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';
    protected $guarded; //不可以使用数组注入字段
    protected $fillable=['title','content'];//可以使用数组注入字段

}
