<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
//  auth() - возвращает пользователей авторизованных на сайте, из их получаем одного пользователя, который отправил запрс, он получит свой список понравившихся постов $posts
       $posts = auth()->user()-> LikedPosts()->detach($post->id);
//  метод view начинает поиск файла с папки view потом идёт папка personal, папка liked и файл index, точку между ними пишем вместо слэша
        return redirect()->route('personal.liked.index');
    }
}
