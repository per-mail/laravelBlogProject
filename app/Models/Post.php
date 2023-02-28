<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'posts';
    protected $guarded = [];

//  считаем количесство лайков у поста
//   protected $withCount = ['likedUsers'];

//  оптимизируем код уменьшаем количество запросов к бд, посты будут приходть из базы вместе м категориями, не нужно делать отдельные запросы по постам и категориям
    protected $with = ['category'];

//  отношение многие ко многим
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id',);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    //  отношение многие ко многим
    public function likedUsers()
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id',);
    }

//  считаем комментарии для вывода в Show.blade.php
//  один ко многим
    public function comments ()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
