<?php

namespace Rumd3x\NightbotAPI\Resources;

/**
 * DefaultCommand Resource
 */
class DefaultCommand {
    

    /**
     * The command name (usually prefixed with a !, but any prefix [or none] can be used)
     *
     * @var string
     */
    public $name;

    /**
     * The minimum amount of seconds between command usage (prevents spam)
     *
     * @var int
     */
    public $cooldown;


    /**
     * The status of the default command. If true, command is enabled. If false, the command is disabled and is nonfunctional.
     *
     * @var bool
     */
    public $enabled;

    /**
     * The command's unique name
     *
     * @var string
     */
    public $uniqueName;

    /**
     * The userlevel required to use the command
     *
     * @var string
     */
    public $userLevel;


    /**
     * New DefaultCommand Resource
     *
     * @param string $uniqueName
     * @param integer $cooldown
     * @param boolean $enabled
     * @param string $name
     * @param string $userLevel
     */
    public function __construct(
        string $uniqueName,
        int $cooldown,
        bool $enabled,
        string $name,
        string $userLevel
    ) {
        $this->uniqueName = $uniqueName;
        $this->cooldown = $cooldown;
        $this->enabled = $enabled;
        $this->name = $name;
        $this->userLevel = $userLevel;
    }
}