<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRepo extends Model
{
    protected $table = "users";
//    protected $guarded = ['id'];
    protected $fillable = ['name', 'email', 'password'];

}
