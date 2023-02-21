<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
//  auth() - возвращает пользователей авторизованных на сайте, из их получаем одного пользователя, который оставил комментарий, он получит свой список комментариев $comments
//  метод comments получаем из модели User
        $comments = auth()->user()->comments;

// метод view начинает поиск файла с папки view потом идёт папка personal, папка main и файл index, точку между ними пишем вместо слэша
        return view ('personal.comment.index', compact('comments'));
    }
}
