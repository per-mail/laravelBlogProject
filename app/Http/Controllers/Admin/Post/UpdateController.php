<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use App\Http\Controllers\Admin\Post\BaseController;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
//  проверяем массив на наличие данных
        $data = $request->validated();
//  через this и родительский класс BaseController вызываем метод store() из PostService
//  и получаем новую переменную $post
        $post = $this->service->update($data, $post);

        return view('admin.post.show', compact('post'));
    }
}
