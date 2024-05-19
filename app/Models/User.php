<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'phone_number',
        'email',
        'address',
        'city',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    // Relations
    public function legalCases()
    {
        return $this->hasMany(LegalCase::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }
    public function appointment(){
        return $this->hasOne(Appointment::class);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function lawyer()
    {
        return $this->hasOne(Lawyer::class);
    }
    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
// Methods
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }
    public function isLawyer(){
        return strtolower($this->role->name) == 'lawyer';
    }
}
