<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperRole
 */
class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function user() : HasMany
    {
        return $this->hasMany(User::class);
    }
    public function scopeRecentRole($querry)
    {
        return $querry->orderByDesc('created_at');
    }
    public function scopeIsNotAdmin($querry)
    {
        return $querry->where('name', '!=', 'admin');
    }
   
}
