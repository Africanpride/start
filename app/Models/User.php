<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Uuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function getFullNameAttribute() {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';
    // public $incrementing = false;


    // $user->profile
    public function profile () {
        return $this->hasOne(Profile::class);
    }
    // $user->article
    public function articles () {
        return $this->hasMany(Article::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function($user) {
            // Create profile here
            // dd($user->id);
            Profile::create(['user_id' => $user->id]);
            // dd($user);
        });
    }
}
