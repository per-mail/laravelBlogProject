<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Http\Requests\Admin\Tag\StoreRequest;
class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
//проверяем массив на наличие данных
        $data = $request->validated();

        Tag::firstOrCreate($data);
        return redirect()->route('admin.tag.index');
    }
}
