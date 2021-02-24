<?php

namespace Rumd3x\NightbotAPI;


class NightbotAPI extends NightbotAPIAbstract {

    public function sendChannelMessage(string $message)
    {
        $message = substr($message, 0, 400);
        return $this->doPost('channel/send', ['message' => $message]);
    }
}