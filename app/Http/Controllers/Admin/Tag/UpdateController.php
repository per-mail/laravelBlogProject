<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request, Tag $tag)
    {
//проверяем массив на наличие данных
        $data = $request->validated();

        $tag->update($data);

        return view('admin.tag.show', compact('tag'));
    }
}
