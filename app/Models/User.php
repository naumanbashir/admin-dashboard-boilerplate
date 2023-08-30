<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'email_verified_at', 'verification_code', 'phone',
        'password', 'type', 'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return ucwords($this->first_name.' '.$this->last_name);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    protected static function booted()
    {
        parent::booted();
        self::creating(function ($model) {
            $model->verification_code = rand(100000, 999999);
        });
    }

    public function isSuperAdmin()
    {
        return $this->attributes['is_super_admin'] === YES;
    }

    public function isAdmin()
    {
        return $this->attributes['type'] === ADMIN;
    }

    public function isUser()
    {
        return $this->attributes['type'] === USER;
    }

    public function isActive()
    {
        return $this->attributes['is_active'] === YES;
    }

    public function isAccountVerified()
    {
        return $this->attributes['email_verified_at'] === null ? false : true;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', '=', YES);
    }

}
