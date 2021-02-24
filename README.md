# nightbot-api-lib

A PHP wrapper for Nightbot's Web API.

## Install

```sh
composer require rumd3x/nightbot-api-lib
```

## Examples

Authorization Code Flow

```php

use Rumd3x\NightbotAPI\NightbotAPI;
use Rumd3x\NightbotAPI\NightbotProvider;

$provider = new NightbotProvider('CLIENT_ID','CLIENT_SECRET','REDIRECT_URL');

if (!isset($_GET['code'])) {

    $options = ['scope' => [
        'channel_send',
    ]];

    header('Location: ' . $provider->getAuthorizationUrl($options));
    die;

} else {

    $accessToken = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code'],
    ]);    

    $api = new NightbotAPI($accessToken);
    $api->sendChannelMessage('Hello Gamers!');

    echo 'Access Token: ' . $accessToken->getToken() . "<br>";
    echo 'Refresh Token: ' . $accessToken->getRefreshToken() . "<br>";
    echo 'Expired in: ' . $accessToken->getExpires() . "<br>";
    echo 'Already expired? ' . ($accessToken->hasExpired() ? 'expired' : 'not expired') . "<br>";

    // Store Refresh Token for Future use.
}

```

Refreshing Tokens

```php
    $refreshToken = getAccessTokenFromYourDataStore();

    $newAccessToken = $provider->getAccessToken('refresh_token', [
        'refresh_token' => $refreshToken,
    ]);

    $api = new NightbotAPI($newAccessToken);
    $api->sendChannelMessage('Hello Gamers!');

    echo 'Access Token: ' . $newAccessToken->getToken() . "<br>";
    echo 'Refresh Token: ' . $newAccessToken->getRefreshToken() . "<br>";
    echo 'Expired in: ' . $newAccessToken->getExpires() . "<br>";
    echo 'Already expired? ' . ($newAccessToken->hasExpired() ? 'expired' : 'not expired') . "<br>";

    // Store New Refresh Token for Future use.
```