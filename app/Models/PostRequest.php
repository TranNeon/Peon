<?php

namespace App\Models;

use App\PostRequestStatus;
use Illuminate\Database\Eloquent\Model;

class PostRequest extends Model
{


    protected $fillable = [
        'draft_id',
        'post_id',
        'status',
        'title',
        'content',
    ];
    protected $casts = [
        'status' => PostRequestStatus::class
    ];


    public function draft() {
        return $this->belongsTo("App\Models\Draft");
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'tag_post_request', 'post_request_id', 'tag_id');
    }

}
