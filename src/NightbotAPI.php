<?php

namespace Rumd3x\NightbotAPI;

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
     * Makes Nightbot send a message to the channel
     *
     * @param string $message
     * @return void
     */
    public function sendChatMessage(string $message)
    {
        $message = substr($message, 0, 400);
        $this->doPost('/1/channel/send', ['message' => $message]);
    }
}