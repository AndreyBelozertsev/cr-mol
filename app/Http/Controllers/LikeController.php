<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toVote(Request $request, $id)
    {
        //if(NOW() > config('const.end_vote_terms')){
            return response()->json(['error'=>'К сожалению процесс голосования окончен'],400);
        //}

        if(! Auth::check()){
            return response()->json(['error'=>'Вы не авторизованы - <a class="custom-link" href="' . route('login-vk') . '">войти</a>'],400);
        }
        

        $user = $request->user();

        if(! $unit = Unit::activeItem($id, 'id')->first()){
            return response()->json(['error'=>'Номинант не найден'],400);
        }

        if(! isCorrectProfile()){
            return response()->json(['error'=>'Вы не полностью заполнили профиль! <a class="custom-link" href="' . route('profile') . '">Заполнить</a>'],400);
        }

        if($user->units()->whereHas('category',function($q) use($unit){
                $q->where('id', $unit->category_id);
        })->count() ){
            return response()->json(['error'=> 'Вы уже голосовали за претендента из этой номинации'],400);
        }
        $user->units()->attach($unit);
        return response()->json(['success'=>'Спасибо! Ваш голос учтен'],200);
    }
}
