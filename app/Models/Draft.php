<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    //
    protected $fillable = [
        'content' , 'user_id', 'title'
    ];
}
