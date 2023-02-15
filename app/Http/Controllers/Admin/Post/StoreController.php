<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Post;
use App\Http\Requests\Admin\Post\StoreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
//  проверяем массив на наличие данных
        $data = $request->validated();
//  через this и родительский класс BaseController вызываем метод store() из PostService
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }
}
