<?php

namespace Telegram\Bot\Commands;

/**
 * Class Random
 *
 * @package Telegram\Bot\Commands
 */
class Random extends Command
{
    const USAGE_INFORMATION = 'Uso: /random <min> <max>';
    const ONLY_NUMBERS = 'Error: escribe sólo números... ';
    const MIN_BIGGER_THAN_MAX = 'Error: el primer número debe ser menor que el segundo';

    /**
     * @var string Command Name
     */
    protected $name = 'random';

    /**
     * @var string Command Description
     */
    protected $description = 'Nunca sabes en qué situación vas a necesitar un random';

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        list($min, $max) = explode(' ', $arguments);

        if ($arguments == '') {
            $this->replyWithMessage(self::USAGE_INFORMATION);
            return $this;
        } elseif (!is_numeric($min) || !is_numeric($max)) {
            $insultosSuaves = json_decode(file_get_contents('data/insultosSuaves.json'), true);

            $this->replyWithMessage(self::USAGE_INFORMATION . PHP_EOL . self::ONLY_NUMBERS .
                strtolower($insultosSuaves[mt_rand(0, count($insultosSuaves) - 1)]) . '!');
            return $this;
        }

        $min = intval($min);
        $max = intval($max);

        if ($min >= $max) {
            $this->replyWithMessage(['text' => self::USAGE_INFORMATION . PHP_EOL . self::MIN_BIGGER_THAN_MAX]);
        } else {
            $this->replyWithMessage(['text' => mt_rand($min, $max)]);
        }

        return $this;
    }
}
