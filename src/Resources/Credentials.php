<?php

namespace Rumd3x\NightbotAPI\Resources;

use Carbon\Carbon;

/**
 * Credentials Resource
 */
class Credentials {
    /**
     * Access Token Expirations
     *
     * @var Carbon
     */
    public $expires;

    /**
     * Your Client ID
     *
     * @var string
     */
    public $client;

    /**
     * New Credentials Class
     *
     * @param string $expires
     * @param string $client
     */
    public function __construct(
        string $expires, 
        string $client
    ) {
        $this->client = $client;
        $this->expires = Carbon::parse($expires);
    }
}