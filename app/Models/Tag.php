<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function posts() {
        return $this->belongsToMany(Post::class, 'tag_posts', 'tag_id', 'post_id');
    }

    public function postRequests() : BelongsToMany
    {
        return $this->belongsToMany(PostRequest::class,'tag_post_request', 'tag_id', 'post_request_id' );
    }

}
