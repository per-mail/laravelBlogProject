<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

//Создадим Ресурс для модели User для изучения тестирования

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
