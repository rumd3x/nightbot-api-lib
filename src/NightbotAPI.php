<?php

namespace Rumd3x\NightbotAPI;

use Rumd3x\NightbotAPI\Resources\CustomCommand;
use Rumd3x\NightbotAPI\Resources\Me;

class NightbotAPI extends NightbotAPIAbstract {

    /**
     * The me endpoint provides you with information about the authorized user
     *
     * @return Me
     */
    public function me()
    {
        $response = $this->doGet('/1/me');
        return new Me($response['user'], $response['authorization']);
    }

    /**
     * Makes Nightbot send a message to the chat
     *
     * @param string $message
     * @return void
     */
    public function sendChatMessage(string $message)
    {
        $message = substr($message, 0, 400);
        $this->doPost('/1/channel/send', ['message' => $message]);
    }

    /**
     * Gets the current API user's custom commands list
     *
     * @return Collection
     */
    public function getCustomCommands()
    {
        $response = $this->doGet('/1/commands');
        
        $result = collect();
        foreach ($response['commands'] as $command) {
            $result->push(new CustomCommand(
                $command['_id'],
                $command['coolDown'],
                $command['count'],
                $command['createdAt'],
                $command['message'],
                $command['name'],
                $command['updatedAt'],
                $command['userLevel']
            ));
        }

        return $result;
    }

    /**
     * Adds a new custom command to the current user's channel
     *
     * @param integer $coolDown
     * @param string $message
     * @param string $name
     * @param string $userLevel
     * @return CustomCommand
     */
    public function addCommand(
        int $coolDown,
        string $message,
        string $name,
        string $userLevel
    ){
        $message = substr($message, 0, 400);

        $response = $this->doPost('/1/commands', [
            'coolDown' => $coolDown,
            'message' => $message,
            'name' => $name,
            'userLevel' => $userLevel,
        ]);
        
        return new CustomCommand(
            $response['command']['_id'],
            $response['command']['coolDown'],
            $response['command']['count'],
            $response['command']['createdAt'],
            $response['command']['message'],
            $response['command']['name'],
            $response['command']['updatedAt'],
            $response['command']['userLevel']
        );
    }

    /**
     * Looks up a custom command by id
     *
     * @param string $id
     * @return CustomCommand
     */
    public function getCommand(string $id)
    {
        $response = $this->doGet(sprintf('/1/commands/%s', $id));
        return new CustomCommand(
            $response['command']['_id'],
            $response['command']['coolDown'],
            $response['command']['count'],
            $response['command']['createdAt'],
            $response['command']['message'],
            $response['command']['name'],
            $response['command']['updatedAt'],
            $response['command']['userLevel']
        );
    }

    /**
     * Edits a custom command by its id.
     *
     * @param string $id
     * @param integer $coolDown
     * @param string $message
     * @param string $name
     * @param string $userLevel
     * @return CustomCommand
     */
    public function editCommand(
        string $id,
        string $message = '',
        string $name = '',
        int $coolDown = -1,
        int $count = -1,
        string $userLevel = ''
    ){
        $message = substr($message, 0, 400);

        $requestBody = [];
        if (!empty($message)) $requestBody['message'] = $message;
        if (!empty($name)) $requestBody['name'] = $name;
        if (!empty($userLevel)) $requestBody['userLevel'] = $userLevel;
        if ($coolDown != -1) $requestBody['coolDown'] = $coolDown;
        if ($count != -1) $requestBody['count'] = $count;

        $response = $this->doPut(sprintf('/1/commands/%s', $id), $requestBody);
        
        return new CustomCommand(
            $response['command']['_id'],
            $response['command']['coolDown'],
            $response['command']['count'],
            $response['command']['createdAt'],
            $response['command']['message'],
            $response['command']['name'],
            $response['command']['updatedAt'],
            $response['command']['userLevel']
        );
    }

    /**
     * Deletes a custom command by id
     *
     * @param string $id
     * @return void
     */
    public function deleteCommand(string $id)
    {
        $this->doDelete(sprintf('/1/commands/%s', $id));
    }
}