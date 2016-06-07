<?php

namespace Telegram\Bot\Commands;

/**
 * Class Mozo
 *
 * @package Telegram\Bot\Commands
 */
class Mozo extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "mozo";

    /**
     * @var string Command Description
     */
    protected $description = "Errl bue mosico";

    protected $patter = '';

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $insultosSuaves = json_decode(file_get_contents('data/insultosSuaves.json'), true);

        $this->replyWithMessage(['text' => 'Programalo tu, '.$insultosSuaves[mt_rand(0, count($insultosSuaves) - 1)]]);
    }

    public function getPattern() {
        return $this->pattern;
    }
}
