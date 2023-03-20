<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        // если рекуест не пройдет валидацию ничего не создастся и вернет нашу же страницу
        $data = $request->validated();

        // вложен на массив, так как это отвечает за уникальность поля и вторым аргументом указан дата
        User::firstOrCreate([
            'username' => $data['username'],
            'email' => $data['email'],
        ], $data);

        return redirect()->route('user.index');
    }
}
