<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;


class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(6);

//  делаем sql-запрос, выводим 4 случайных поста внизу страницы
//  метод get() возвращает коллекцию
        $randomPosts = Post::get()->random(4);

//  делаем sql-запрос, выводим лайки постов
//  withCount - считает количество лайков у постов
//  orderBy('liked_users_count', 'DESC')  - сортируем получаемый список постов  в порядке убывания количества лайков
//  'liked_users_count' - таблица где соотносятся лайки и посты, 'DESC' -  метод сортировки в порядке убыванияб противоположный ему метод 'ASC'
//  take(4) - выводит 4 поста из коллекции которая выходит из метода get()
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);

//  метод view начинает поиск файла с папки view потом идёт папка main и файл index, точку между ними пишем вместо слэша
        return view ('post.index', compact('posts', 'randomPosts', 'likedPosts'));
    }
}
