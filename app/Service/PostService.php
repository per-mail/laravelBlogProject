<?php

namespace App\Service;

use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
//  транзакция
            Db::beginTransaction();
//  делаем проверку на наличие файла tag_ids в $data
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
//  удаляем массив
                unset($data['tag_ids']);
            }
//  перемещаем изображения в Storage, и создаём файл-путь до него для базы данных
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
//  firstOrCreate - чтобы исключить дублирование названий категорий, дублирование проверяется по ключу titel
            $post = Post::firstOrCreate($data);
//  делаем проверку на наличие файла tag_ids
            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }
// если транзакция прошла успешно делаем коммит
            DB::commit();
        } catch (Exception $exception) {
// если транзакция прошла не успешно делаем ролбэк
            DB::rollBack();
            abort(500);
        }
    }
    public function update($data, $post)
    {
        try {
//  транзакция
             Db::beginTransaction();
//  делаем проверку на наличие файла tag_ids в $data
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
//  удаляем массив
                unset($data['tag_ids']);
            }

//  делаем проверку на наличие файла preview_image в $data
            if (isset($data['preview_image'])) {
//  перемещаем изображения в Storage, и создаём файл-путь до него для базы данных
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

//  делаем проверку на наличие файла main_image в $data
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
//  firstOrCreate - чтобы исключить дублирование названий категорий, дублирование проверяется по ключу titel
            $post->update($data);
            //  делаем проверку на наличие файла tag_ids
            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }
// если транзакция прошла успешно делаем коммит
           DB::commit();
        } catch (Exception $exception) {
// если транзакция прошла не успешно делаем ролбэк
            DB::rollBack();
            abort(500);
    }
        return $post;
    }
}
