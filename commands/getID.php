<?php

namespace Telegram\Bot\Commands;

/**
 * Class GetID
 *
 * @package Telegram\Bot\Commands
 */
class GetID extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "id";

    /**
     * @var string Command Description
     */
    protected $description = "Devuelve tu ID y grupo de telegram";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $response = 'Tu id de telegram: '. $this->update['message']['from']['id'];
        $response .= ($this->update['message']['from']['id'] != $this->update['message']['chat']['id'] ? PHP_EOL.'El id del grupo: '.$this->update['message']['chat']['id'] : '');
        $this->replyWithMessage(['text' => $response]);
    }
}
