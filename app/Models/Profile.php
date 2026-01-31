<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<int, string>
     */
    protected $fillable = [
        'user_id',
        'bio',
        'avatar',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
