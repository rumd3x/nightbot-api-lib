<?php

namespace Rumd3x\NightbotAPI;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use League\OAuth2\Client\Token\AccessTokenInterface;

abstract class NightbotAPIAbstract extends Client implements ClientInterface {

    const BASE_URL = "https://api.nightbot.tv/";

    /**
     * Oauth2 Provider
     *
     * @var AccessTokenInterface
     */
    private $token;

    public function __construct(
       AccessTokenInterface $token
    ) {
        $this->token = $token;        
        parent::__construct(['base_uri' => static::BASE_URL]);
    }

    private function getAccessToken()
    {
        return $this->token->getToken();
    }

    protected function doGet(string $url)
    {
        $response = $this->get($url, [
            'headers' => [
                'Authorization' => "Bearer {$this->getAccessToken()}",
            ],
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    protected function doPost(string $url, array $data)
    {
        $response = $this->post($url, [
            'form_params' => $data,
            'headers' => [
                'Authorization' => "Bearer {$this->getAccessToken()}",
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    protected function doPut(string $url, array $data)
    {
        $response = $this->put($url, [
            'form_params' => $data,
            'headers' => [
                'Authorization' => "Bearer {$this->getAccessToken()}",
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    protected function doDelete(string $url)
    {
        $response = $this->delete($url, [
            'headers' => [
                'Authorization' => "Bearer {$this->getAccessToken()}",
            ],
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }
}