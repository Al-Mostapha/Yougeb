<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_user',
        `id_url`,
        `mention_name`,
        `full_name`,
        `brief`,
        `user_group`,
        `email`,
        `enc_pass`,
        `md5_pass`,
        `image`,
        `following`,
        `follower`,
        `score` ,
        `question`,
        `answers`,
        `article`,
        `remember_token`
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $table = 'q_user';
    protected $primaryKey = 'id_user';
    public $incrementing = false;
    public $timestamps = false;
}
