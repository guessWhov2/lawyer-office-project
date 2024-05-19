<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'password',
        'is_super',
        'pass_phrase'
    ];

    // Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
