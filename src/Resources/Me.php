<?php

namespace Rumd3x\NightbotAPI\Resources;

/**
 * Me Resource
 */
class Me {

    /**
     * User Resource
     *
     * @var User
     */
    public $user;

    /**
     * Authorization Resource
     *
     * @var Authorization
     */
    public $authorization;

    /**
     * New Me Class
     *
     * @param string $expires
     * @param string $client
     */
    public function __construct(
        array $user, 
        array $authorization 
    ) {
        $this->user = new User(
            $user['_id'],
            $user['name'],
            $user['displayName'],
            $user['provider'],
            $user['providerId'],
            $user['avatar'],
            $user['admin']
        );

        $this->authorization = new Authorization(
            $authorization['userLevel'],
            $authorization['authType'],
            $authorization['credentials'],
            $authorization['scopes']
        );
    }
}