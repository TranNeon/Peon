<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\UserRole;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $table = "users";
    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $casts = [
        'role' => UserRole::class,
    ];

    public function drafts()
    {
        return $this->hasMany(Draft::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function postRequests()
    {
        return $this->hasManyThrough(PostRequest::class, Draft::class);
    }
public function  canAccessPanel()
{
    return $this->role === UserRole::ADMIN;
}



}
