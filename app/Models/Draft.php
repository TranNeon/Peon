<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Draft extends Model
{
    //
    protected $fillable = [
        'content' , 'user_id', 'title'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function requests()
    {
        return $this->hasMany(PostRequest::class);
    }
}
