<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'role' => 'required|integer',
        ];
    }
    //пишем сообщения о ошибках
    public function messages()
    {
        return [
            'name.required'  => 'Это поле обязательно для заполнения',
            'name.string'  => 'Данные должны соответствовать строчному типу',
            'email.required'  => 'Это поле обязательно для заполнения',
            'email.string'  => 'Данные должны соответствовать строчному типу',
            'email.email' => 'Ваша почта должна соответствовать формату mail@some.domain',
            'email.unique' => 'Пользователь с таким email уже существует',
            'password.required'  => 'Это поле обязательно для заполнения',
            'password.string'  => 'Данные должны соответствовать строчному типу',
        ];
    }
}
