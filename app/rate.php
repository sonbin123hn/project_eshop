<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rate extends Model
{
    protected $fillable = [
        'id_user','id_blog','rate'
    ];
}
