<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
//  при помощи auth() получаем авторизованных пользователей
//  метод toggle() проверяет при нажатии если этот пользователь уже поставил лайк то он его убирает, если лайка от этого пользователя не было добавляет
        auth()->user()->likedPosts()->toggle($post->id);

//  redirect()->back() - возвращает обратно к посту котоорый пролайкали
        return redirect()->back();
    }
}

