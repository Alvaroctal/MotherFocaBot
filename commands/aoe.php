<?php

namespace Telegram\Bot\Commands;

/**
 * Class AoE
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
    protected $description = "Comando del AoE";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        if (!empty($arguments)) {
            $id = (int) $arguments;
            $aoe = json_decode(file_get_contents('data/aoe.json'), true);

            if ($id >= count($aoe)) $id = 0;

            $this->replyWithMessage(['text' => $aoe[$id]]);
            
        }
        else {
            $this->replyWithMessage(['text' => '/aoe <codigo>']);
        }
    }
}
