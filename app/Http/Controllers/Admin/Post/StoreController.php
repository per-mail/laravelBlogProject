<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Admin\Post\StoreRequest;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try {
//  проверяем массив на наличие данных
            $data = $request->validated();
            $tagIds = $data['tag_ids'];
//  удаляем массив
            unset($data['tag_ids']);

//  перемещаем изображения в Storage, и создаём файл-путь до него для базы данных
            $data['preview_image'] = Storage::put('/images', $data['preview_image']);
            $data['main_image'] = Storage::put('/images', $data['main_image']);
//  firstOrCreate - чтобы исключить дублирование названий категорий, дублирование проверяется по ключу titel
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
        } catch (\Exception $exception) {
            abort(404);
        }
            return redirect()->route('admin.post.index');

    }
}
