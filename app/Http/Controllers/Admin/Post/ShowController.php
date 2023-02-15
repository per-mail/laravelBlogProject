<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use App\Http\Controllers\Admin\Post\BaseController;


class ShowController extends BaseController
{
//   переменную category - мы берём из роута '/{category}'
    public function __invoke(Post $post)
    {
        return view ('admin.post.show', compact('post'));
    }
}
