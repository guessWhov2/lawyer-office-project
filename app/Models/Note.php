<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'legal_case_id',
    ];

    public function legalCase()
    {
        return $this->belongsTo(LegalCase::class);
    }
}
