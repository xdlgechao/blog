<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //自定义数据表的名称
     protected $table = 'blog_user';
     public $primaryKey = 'user_id';  
     public $timestamps = false;
}
