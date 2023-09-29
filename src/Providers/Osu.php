<?php

/*
 * This file is part of ianm/oauth-Osu.
 *
 * Copyright (c) 2021 IanM.
 *
 *  For the full copyright and license information, please view the LICENSE.md
 *  file that was distributed with this source code.
 */

namespace cpluscc\OAuthOsu\Providers;

use Flarum\Forum\Auth\Registration;
use FoF\OAuth\Provider;
use League\OAuth2\Client\Provider\AbstractProvider;
use Cpluscc\OAuth2\Client\Provider\Osu as OsuProvider;
use Cpluscc\OAuth2\Client\Provider\OsuResourceOwner;

class Osu extends Provider
{
    /**
     * @var OsuProvider
     */
    protected $provider;

    public function name(): string
    {
        return 'osu';
    }

    public function link(): string
    {
        return 'https://developer.Osu.com/docs/login-with-Osu/register-web.html';
    }

    public function fields(): array
    {
        return [
            'client_id'     => 'required',
            'client_secret' => 'required',
        ];
    }

    public function provider(string $redirectUri): AbstractProvider
    {
        return $this->provider = new OsuProvider([
            'clientId'     => $this->getSetting('client_id'),
            'clientSecret' => $this->getSetting('client_secret'),
            'redirectUri'  => $redirectUri,
        ]);
    }

    
}
