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

    protected $fillable =
    [
        'name',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($role) {
            $role->users()->detach();
        });
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
