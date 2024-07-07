<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $attributes = [
        // 'role_id' => 2,
    ];

    protected $fillable = [
        'name',
        'role_id',
        'email',
        'password',
        'is_blocked',
        'email_verified_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }


    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function scopeIsBlocked($querry)
    {
        return $querry->where('is_blocked', false);
    }
    public function scopeRecentUser($querry)
    {
        return $querry->orderByDesc('created_at', 'desc');
    }
    public function scopeIsNotAdmin($querry)
    {
        return $querry->where('role_id', '!=', 1);
    }
}
