<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request, Post $post)
    {
// проверяем массив на наличие данных
        $data = $request->validated();

        $post->update($data);

        return view('admin.post.show', compact('post'));
    }
}
