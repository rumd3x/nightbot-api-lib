<?php

namespace Rumd3x\NightbotAPI;

use League\OAuth2\Client\Provider\GenericProvider;

class NightbotProvider extends GenericProvider {

    public function __construct(
       string $clientId,
       string $clientSecret,
       string $redirectUrl 
    ) {
        parent::__construct([
            'clientId'                => $clientId,
            'clientSecret'            => $clientSecret,
            'redirectUri'             => $redirectUrl,
            'urlAuthorize'            => 'https://api.nightbot.tv/oauth2/authorize',
            'urlAccessToken'          => 'https://api.nightbot.tv/oauth2/token',
            'urlResourceOwnerDetails' => 'https://api.nightbot.tv/1/me',
            'scopeSeparator'          => ' ',
        ]);
    }
}