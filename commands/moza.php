<?php

namespace Telegram\Bot\Commands;

/**
 * Class Moza
 *
 * @package Telegram\Bot\Commands
 */
class Moza extends Command
{
    const TRIES = 3;

    /**
     * @var string Command Name
     */
    protected $name = "moza";

    /**
     * @var string Command Description
     */
    protected $description = "Una buena moza para alegrarte el día... o para la llamada";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $path = 'data/mozas/'.sprintf("%02d", rand(1, 99)).'.jpg';

        for($i = 0; $i < self::TRIES; $i++) {
            if(is_file($path)) {
                break;
            }

            $path = 'data/mozas/'.sprintf("%02d", rand(1, 99)).'.jpg';
        }

        if(is_file($path)) {
            $this->replyWithPhoto($path);
        }

    }
}
