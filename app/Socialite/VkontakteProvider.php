<?php

namespace App\Socialite;

use GuzzleHttp\Exception\ClientException;
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
        $verifier = $this->request->session()->pull(self::VERIFIER_KEY);

        Log::info('VK token exchange fields', [
            'has_code_verifier' => $verifier !== null ? 'yes' : 'NO - session lost',
            'has_device_id'     => $this->request->has('device_id') ? 'yes' : 'no',
            'device_id'         => $this->request->get('device_id'),
        ]);

        return [
            'grant_type'    => 'authorization_code',
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'code'          => $code,
            'redirect_uri'  => $this->redirectUrl,
            'code_verifier' => $verifier,
            'device_id'     => $this->request->get('device_id'),
            'state'         => Str::random(64),
        ];
    }

    public function getAccessTokenResponse($code): array
    {
        try {
            $response = parent::getAccessTokenResponse($code);
        } catch (ClientException $e) {
            $body = (string) $e->getResponse()->getBody();
            Log::error('VK OAuth2 token exchange HTTP error', [
                'status'      => $e->getResponse()->getStatusCode(),
                'vk_response' => $body,
            ]);
            return json_decode($body, true) ?? [];
        }

        if (!isset($response['access_token'])) {
            Log::error('VK OAuth2 token exchange failed', ['vk_response' => $response]);
        }

        return $response;
    }
}
