<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
//   'required|integer|exists: categories,id' проверка, что в базе данных в таблице categories есть id которому равен category_id
            'category_id' => '',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

//пишем сообщения о ошибках
    public function messages()
    {
        return [
            'title.required'  => 'Это поле обязательно для заполнения',
            'title.string'  => 'Данные должны соответствовать строчному типу',
            'content.required'  => 'Это поле обязательно для заполнения',
            'content.string'  => 'Данные должны соответствовать строчному типу',
            'preview_image.required' => 'Это поле обязательно для заполнения',
            'preview_image.file' => 'Необходимо выбрать файл',
            'main_image.required' => 'Это поле обязательно для заполнения',
            'main_image.file' => 'Необходимо выбрать файл',
            'category_id.required' => 'Это поле обязательно для заполнения',
            'category_id.integer' => 'Id категории должно быть числом',
            'category_id.exists' => 'Id категории должно быть в базе данных',
            'tag_ids.array' => 'Необходимо отправить массив данных',
        ];
    }
}

