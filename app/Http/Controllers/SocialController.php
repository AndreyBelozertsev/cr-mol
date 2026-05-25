<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use DomainException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Support\SessionRegenerator;
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

        $code     = request('code');
        $deviceId = request('device_id');

        if (!$code || !$deviceId) {
            Log::error('VK callback missing required params', [
                'has_code'      => (bool) $code,
                'has_device_id' => (bool) $deviceId,
            ]);
            return redirect()->route('home')->withErrors(['auth' => 'Ошибка авторизации через ВКонтакте. Попробуйте ещё раз.']);
        }

        try {
            $tokenFields = [
                'grant_type'    => 'authorization_code',
                'client_id'     => config('services.vkontakte.client_id'),
                'client_secret' => config('services.vkontakte.client_secret'),
                'code'          => $code,
                'redirect_uri'  => config('services.vkontakte.redirect'),
                'device_id'     => $deviceId,
                'state'         => Str::random(64),
            ];

            // Include code_verifier if PKCE was used during redirect
            $codeVerifier = session()->pull('vk_code_verifier') ?? session()->pull('code_verifier');
            if ($codeVerifier) {
                $tokenFields['code_verifier'] = $codeVerifier;
            }

            $tokenResponse = Http::asForm()->post('https://id.vk.com/oauth2/auth', $tokenFields);
            $tokenData     = $tokenResponse->json();

            if (!isset($tokenData['access_token'])) {
                Log::error('VK token exchange failed', ['vk_response' => $tokenData]);
                return redirect()->route('home')->withErrors(['auth' => 'Ошибка авторизации через ВКонтакте. Попробуйте ещё раз.']);
            }

            $userInfoResponse = Http::asForm()->post('https://id.vk.com/oauth2/user_info', [
                'client_id'    => config('services.vkontakte.client_id'),
                'access_token' => $tokenData['access_token'],
            ]);

            $vkUserData = $userInfoResponse->json()['user'] ?? null;

            if (!$vkUserData || !isset($vkUserData['user_id'])) {
                Log::error('VK user_info failed', ['vk_response' => $userInfoResponse->json()]);
                return redirect()->route('home')->withErrors(['auth' => 'Ошибка авторизации через ВКонтакте. Попробуйте ещё раз.']);
            }

        } catch (Throwable $e) {
            Log::error('VK auth exception', ['error' => $e->getMessage()]);
            return redirect()->route('home')->withErrors(['auth' => 'Ошибка авторизации через ВКонтакте. Попробуйте ещё раз.']);
        }

        if(!$user = User::where('vkontakte_id', $vkUserData['user_id'])->first()){
            $user = User::create([
                'vkontakte_id' => $vkUserData['user_id'],
                'first_name'   => $vkUserData['first_name'] ?? '',
                'last_name'    => $vkUserData['last_name'] ?? '',
                'password'     => bcrypt(str()->random(20)),
            ]);
        }

        SessionRegenerator::run(fn()=>auth()->login($user));

        if(! isCorrectProfile()){
            return redirect()->intended(route('profile'));
        }

        return redirect()->intended(route('home',['#nominacii']));
    }
}
