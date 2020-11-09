<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // title, image, des,content, id_user va time
    
    protected $table = "blogs";
    protected $fillable =[
        'id','title','image','des','content','id_user','time'
    ];
    public function User()
    {
        return $this->hasOne('App\User', 'id','id_user');
    }


}
