<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
//  создаём условные id для ролей
//  id для админа
    const ROLE_ADMIN = 1;
//  id для пользователей
    const ROLE_READER = 2;

    public static function getRoles()
    {
        return[
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_READER => 'Пользователь',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
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
    ];
//  отправка письма пользователю при регистрации
//    public function sendEmailVerificationNotification()
//    {
//        $this->notify(new SendVerifyWithQueueNotification());
//    }

// создаём отношение многие ко многим лайки и пользователи
    public function likedPosts()
    {
       return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id', 'post_id');
    }

// создаём отношение один ко многим комменттарий и посты
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
}
