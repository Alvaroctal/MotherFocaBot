<?php

namespace Telegram\Bot\Commands;

/**
 * Class Kitten
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
    protected $description = "Un gatete al año no hace daño";

    protected $patter = '';

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $path = 'data/cats/cats_cats_'.sprintf("%02d", rand(1, 99)).'.jpg';

        $this->replyWithPhoto($path);
    }

    public function getPattern() {
        return $this->pattern;
    }
}
