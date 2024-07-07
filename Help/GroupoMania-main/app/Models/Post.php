<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image',
        'iSet',
        'likes',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function imageUrl(): string
    {
        return Storage::url($this->image);
    }
    

    public function likes()
    {
        return $this->hasMany(Like::class); // Ajout de la relation
    }

    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function like(User $user)
    {
        if (!$this->isLikedBy($user)) {
            $like = new Like();
            $like->user_id = $user->id;
            $this->likes()->save($like);
        }
    }

    public function unlike(User $user)
    {
        $this->likes()->where('user_id', $user->id)->delete();
    }
    public function scopeIsBlocked($querry)
    {
        return $querry->where('is_blocked', false);
    }
    public function scopeRecentPost($querry)
    {
        return $querry->orderByDesc('created_at', 'desc');
    }
   
}
