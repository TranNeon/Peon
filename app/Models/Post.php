<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Post extends Model
{

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $slug = Str::slug($model->title);
            $originalSlug = $slug;
            $counter = 1;

            while (static::where('slug', $slug)->exists()) {
                $slug = "{$originalSlug}-{$counter}";
                $counter++;
            }
            $model->slug = $slug;
        });


    }

    protected $fillable = ['title', 'content', 'user_id'];

    public function  tags (): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tag_posts', 'post_id', 'tag_id');
    }
}
