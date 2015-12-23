<?php

namespace Telegram\Bot\Commands;

/**
 * Class HelpCommand
 *
 * @package Telegram\Bot\Commands
 */
class Kitten extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "kitten";

    /**
     * @var string Command Description
     */
    protected $description = "Help command, Get a list of commands";

    protected $patter = '';

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $path = 'commands/data/cats/cats_cats_'.sprintf("%02d", rand(1, 99)).'.jpg';

        $this->replyWithPhoto($path);
    }

    public function getPattern() {
        return $this->pattern;
    }
}
