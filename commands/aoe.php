<?php

namespace Telegram\Bot\Commands;

/**
 * Class HelpCommand
 *
 * @package Telegram\Bot\Commands
 */
class AoE extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "aoe";

    /**
     * @var string Command Description
     */
    protected $description = "Returns a aoe response";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        if (!empty($arguments)) {
            $id = (int) $arguments;
            $aoe = json_decode(file_get_contents('data/aoe.json'), true);

            $this->replyWithMessage($aoe[$id]);
        }
        else {
            $this->replyWithMessage('/aoe <codigo>');
        }
    }
}
