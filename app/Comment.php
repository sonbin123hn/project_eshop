<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable =[
        'id', 'id_blog', 'id_user', 'name', 'avata', 'cmt', 'id_cmt'
    ];
}
