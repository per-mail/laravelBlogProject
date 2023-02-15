<?php

namespace App\Http\Controllers\Admin\Post;


use App\Models\Post;
use App\Http\Controllers\Admin\Post\BaseController;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {
//  проверяем массив на наличие данных
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
