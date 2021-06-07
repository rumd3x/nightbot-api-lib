<?php

namespace Rumd3x\NightbotAPI\Resources;

use Carbon\Carbon;

/**
 * CustomCommand Resource
 */
class CustomCommand {
    

    /**
     * The command's unique ID
     *
     * @var string
     */
    public $id;

    /**
     * The minimum amount of seconds between command usage (prevents spam)
     *
     * @var int
     */
    public $cooldown;


    /**
     * The number of times a command has been used (only increments if the command uses the count variable)
     *
     * @var int
     */
    public $count;

    /**
     * The time the command was created
     *
     * @var Carbon
     */
    public $createdAt;

    /**
     * The last time the command was updated
     *
     * @var Carbon
     */
    public $updatedAt;

    /**
     * The userlevel required to use the command
     *
     * @var string
     */
    public $userLevel;

    /**
     * The command name (usually prefixed with a !, but any prefix [or none] can be used)
     *
     * @var string
     */
    public $name;

    /**
     * The message Nightbot sends to chat when the command is called. It can contain variables for extra functionality.
     *
     * @var string
     */
    public $message;


    public function __construct(
        string $id,
        int $cooldown,
        int $count,
        string $createdAt,
        string $message,
        string $name,
        string $updatedAt,
        string $userLevel
    ) {
        $this->id = $id;
        $this->cooldown = $cooldown;
        $this->count = $count;
        $this->createdAt = Carbon::parse($createdAt);
        $this->updatedAt = Carbon::parse($updatedAt);
        $this->name = $name;
        $this->userLevel = $userLevel;
        $this->message = $message;
    }
}