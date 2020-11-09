<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable =[
        'name','price','id_category','id_brand','trangthaisp','sale','company','image','detail','id_user'
    ];
    public function User()
    {
        return $this->hasOne('App\User', 'id','id_user');
    }
}
