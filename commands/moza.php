<?php

namespace Telegram\Bot\Commands;

/**
 * Class Moza
 *
 * @package Telegram\Bot\Commands
 */
class Moza extends Command
{
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
        $path = 'data/mozas/';

        // Remove . and .. directories
        $files = array_slice(scandir($path), 2);

        $this->replyWithPhoto($path . $files[mt_rand(0, count($files))]);
    }
}
