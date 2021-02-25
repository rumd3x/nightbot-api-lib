<?php

namespace Rumd3x\NightbotAPI\Resources;

/**
 * Authorization Resource
 */
class Authorization {
    
    /**
     * Owner for oauth2.
     *
     * @var string
     */
    public $userLevel;

    /**
     * The auth type. Usually "oauth2"
     *
     * @var string
     */
    public $authType;

    /**
     * The Credentials Object
     *
     * @var Credentials
     */
    public $credentials;

    /**
     * Array of scopes this authorization grants access to
     *
     * @var array
     */
    public $scopes;

    /**
     * New Authorization Class
     *
     * @param string $expires
     * @param string $client
     */
    public function __construct(
        string $userLevel, 
        string $authType, 
        array $credentials, 
        array $scopes
    ) {
        $this->userLevel = $userLevel;
        $this->authType = $authType;
        $this->userLevel = $scopes;
        $this->credentials = new Credentials($credentials['expires'], $credentials['client']);
        $this->scopes = $scopes;
    }
}