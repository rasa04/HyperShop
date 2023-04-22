<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, User $user)
    {
        // если рекуест не пройдет валидацию ничего не создастся и вернет нашу же страницу
        $data = $request->validated();

        $user->update($data);

        return to_route('user.show', $user->id);
    }
}
