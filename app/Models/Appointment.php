<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'agenda',
        'user_id',
        'lawyer_id',
        'date',
        'time',
        'status'
    ];
    // Relations
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function lawyer(){
        return $this->belongsTo(Lawyer::class);
    }
}
