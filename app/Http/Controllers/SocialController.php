<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use DomainException;
use Illuminate\Http\Request;
use App\Support\SessionRegenerator;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect(string $driver){
        try{
            return Socialite::driver($driver)->redirect();
        }catch(Throwable $e){
            throw new DomainException('произошла ошибка или драйвер не поддерживается ');
        }
        
    }

    public function callback(string $driver){
        if($driver != 'vkontakte'){
            throw new DomainException('произошла ошибка или драйвер не поддерживается ');
        }
    
        $vkUser = Socialite::driver($driver)->user();

        if(!$user = User::where('vkontakte_id', $vkUser->getId())->first()){
            $user = User::create([
                'vkontakte_id' => $vkUser->getId(),
                'first_name' => $vkUser->getRaw()['first_name'],
                'last_name'=> $vkUser->getRaw()['last_name'],
                'password'=> bcrypt(str()->random(20)),
            ]);
        }
        
        SessionRegenerator::run(fn()=>auth()->login($user));

        if(! isCorrectProfile()){
            return redirect()->intended(route('profile'));
        }
 
        return redirect()->intended(route('home',['#nominacii']));
        
    }
}
