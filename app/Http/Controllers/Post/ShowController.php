<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;


class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
//  sgl-запрос, при помощи класса Carbon приводим дату из created_at в нужный вид
        $data = Carbon::parse($post->created_at);

//  sgl-запрос, олучаем рекомендуемые посты, схожих по категориям
//  where('id', '!=', $post->id) -- условие чтобы id рекомендуемых постов не был равен id показываемого поста
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);
//  метод view начинает поиск файла с папки view потом идёт папка main и файл index, точку между ними пишем вместо слэша
        return view ('post.show', compact('post', 'data', 'relatedPosts'));
    }
}
