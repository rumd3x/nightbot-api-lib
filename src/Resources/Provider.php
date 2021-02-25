<?php

namespace Rumd3x\NightbotAPI\Resources;

/**
 * Provider Resource
 */
class Provider {
    /**
     * The unique id for this user at the auth provider
     *
     * @var int
     */
    public $id;

    /**
     * The auth provider for the user account (like twitch or youtube)
     *
     * @var string
     */
    public $name;

    /**
     * New Provider Class
     *
     * @param string $expires
     * @param string $client
     */
    public function __construct(
        string $id, 
        string $name
    ) {
        $this->id = $id;
        $this->name = $name;
    }
}