<?php

namespace Telegram\Bot\Commands;

/**
 * Class Hoygan
 *
 * @package Telegram\Bot\Commands
 */
class Hoygan extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "hoygan";

    /**
     * @var string Command Description
     */
    protected $description = "hUnas vuenas patadas hal dicxionarrio, wey";

    protected $patter = '';

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $changes = array(
            ' y ' => ' i ',
            'ya' => 'ia',
            'y' => '\y', 
            'll' => 'y',
            '\y' => 'll',
            'v' => '\v',
            'b' => 'v',
            '\v' => 'b',
            'h' => '',
            's ' => ' ',
            'á ' => 'a',
            'é'  => 'e',
            'í' => 'í',
            'ó' => 'o',
            'ú' => 'u',
            'm' => '\m',
            'n' => 'm',
            '\m' => 'n',
            'ce' => 'se',
            'c' => 'k',
            'gu' => 'g',
            'qu' => 'k'
        );

        if ($arguments == '') {
            $arguments = "cuentenme un poco su vida";
        }

        $this->replyWithMessage('hoygan, '.str_replace(array_keys($changes), array_values($changes), strtolower($arguments)));
    }

    public function getPattern() {
        return $this->pattern;
    }
}
