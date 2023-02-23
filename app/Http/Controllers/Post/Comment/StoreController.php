<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;

class StoreController extends Controller
{
    public function __invoke(Post $post, StoreRequest $request)
    {
//  получаем оставленный комментарий и помещаем его в $data
        $data = $request->validated();


//  получаем id пользователя, который отправил комментарий и добавляем его в $data
        $data['user_id'] = auth()->user()->id;

//  получаем id поста, которому отправлен комментарий и добавляем его в $data
        $data['post_id'] = $post->id;

//  добавляем данные комментария в таблицу
        Comment::create($data);

//  $post->id - нужен чтобы найти нужный пост
        return redirect()->route('post.show', $post->id);
    }
}

