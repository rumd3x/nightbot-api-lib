<?php

namespace Rumd3x\NightbotAPI\Resources;

/**
 * User Resource
 */
class User {

    /**
     * User ID
     *
     * @var string
     */
    public $id;

    /**
     * User name
     *
     * @var string
     */
    public $name;

    /**
     * User display name
     *
     * @var string
     */
    public $displayName;

    /**
     * Provider resource
     *
     * @var Provider
     */
    public $provider;

    /**
     * User avatar link
     *
     * @var string
     */
    public $avatar;

    /**
     * Whether or not the user is a Nightbot administrator
     *
     * @var bool
     */
    public $admin;

    public function __construct(
        string $id,
        string $name,
        string $displayName,
        string $provider,
        string $providerId,
        string $avatar,
        bool $admin
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->displayName = $displayName;
        $this->provider = new Provider($providerId, $provider);
        $this->avatar = $avatar;
        $this->admin = $admin;
    }

}