<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function show(Request $request)
    {
        return view('user.show', [
                'user' => $request->user(), 
                'cities' => City::activeItems()->get()
            ]);
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        unset($data['agree']);
        $request->user()->update($data);

        return response()->json(['success'=>'Спасибо! Ваши данные успешно обновлены.'],200);
    }

}
