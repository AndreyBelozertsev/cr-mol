<?php

namespace App\Socialite;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use SocialiteProviders\VKontakte\Provider as BaseProvider;

class VkontakteProvider extends BaseProvider
{
    private const VERIFIER_KEY = 'vk_code_verifier';

    protected function hasInvalidState(): bool
    {
        if ($this->isStateless()) {
            return false;
        }

        $state = $this->request->session()->pull('state');

        return empty($state) || $this->request->input('state') !== $state;
    }

    public function redirect()
    {
        $verifier = Str::random(128);
        $challenge = rtrim(strtr(base64_encode(hash('sha256', $verifier, true)), '+/', '-_'), '=');

        $this->request->session()->put(self::VERIFIER_KEY, $verifier);
        // Also put under the standard key so new Socialite's getCodeChallenge() uses our verifier
        $this->request->session()->put('code_verifier', $verifier);

        // Ensure code_challenge is in auth URL for all Socialite versions
        $this->with([
            'code_challenge'        => $challenge,
            'code_challenge_method' => 'S256',
        ]);

        return parent::redirect();
    }

    protected function getCodeVerifier(): string
    {
        return $this->request->session()->get(self::VERIFIER_KEY, Str::random(128));
    }

    protected function getCodeChallenge(): string
    {
        $verifier = $this->request->session()->get(self::VERIFIER_KEY);

        return rtrim(strtr(base64_encode(hash('sha256', $verifier, true)), '+/', '-_'), '=');
    }

    protected function getTokenFields($code): array
    {
        return [
            'grant_type'    => 'authorization_code',
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'code'          => $code,
            'redirect_uri'  => $this->redirectUrl,
            'code_verifier' => $this->request->session()->pull(self::VERIFIER_KEY),
            'device_id'     => $this->request->get('device_id'),
            'state'         => Str::random(64),
        ];
    }

    public function getAccessTokenResponse($code): array
    {
        $response = parent::getAccessTokenResponse($code);

        if (!isset($response['access_token'])) {
            Log::error('VK OAuth2 token exchange failed', ['vk_response' => $response]);
        }

        return $response;
    }
}
