<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
//  auth() - возвращает пользователей авторизованных на сайте, из их получаем одного пользователя, который отправил запрос, он получит свой список понравившихся постов $posts
//  метод likedPosts получаем из модели User
        $posts = auth()->user()-> likedPosts;

//  метод view начинает поиск файла с папки view потом идёт папка personal, папка main и файл index, точку между ними пишем вместо слэша
        return view ('personal.liked.index', compact('posts'));
    }
}
