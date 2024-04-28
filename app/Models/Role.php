<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    
    const name = [
        1 => 'Client',
        2 => 'Staff',
        3 => 'Lawyer',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
