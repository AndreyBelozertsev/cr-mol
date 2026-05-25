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
        Log::build(['driver' => 'single', 'path' => storage_path('logs/vk-redirect.log')])->info(request());
        if($driver != 'vkontakte'){
            throw new DomainException('произошла ошибка или драйвер не поддерживается ');
        }

        try {
            $vkUser = Socialite::driver($driver)->stateless()->user();
        } catch (Throwable $e) {
            Log::error('VK auth callback failed', [
                'error'     => $e->getMessage(),
                'exception' => get_class($e),
                'request'   => [
                    'has_code'      => request()->has('code'),
                    'has_device_id' => request()->has('device_id'),
                    'has_state'     => request()->has('state'),
                    'params'        => request()->except(['code']),
                ],
            ]);
            return redirect()->route('home')->withErrors(['auth' => 'Ошибка авторизации через ВКонтакте. Попробуйте ещё раз.']);
        }

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
