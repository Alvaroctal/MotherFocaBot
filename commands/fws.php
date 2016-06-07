<?php

namespace Telegram\Bot\Commands;

/**
 * Class FWS
 *
 * @package Telegram\Bot\Commands
 */
class FWS extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "fws";

    /**
     * @var string Command Description
     */
    protected $description = "Forward Sound";

    /**
     * @var array characters Characters list
     * @var array types Types allowed
     */
    private $characters = array('anarchist','balkan','gign','gsg9','idf','leet','phoenix','pirate','sas','seal','separatist');
    private $types = array('affirmative','negative','agree','bombtickingdown','chickenhate','clear','inposition','sniperwarning','waitinghere');

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        if (in_array($this->update['message']['from']['id'], $GLOBALS['core']->getTelegram('users','auth'))) {
            $params = explode(' ', $arguments);

            if (in_array($params[1], $this->types)) $this->replyWithVoice(['chat_id' => (int) $params[0],'voice' => 'data/csgo/'.$this->characters[array_rand($this->characters)].'/'.$params[1].'01.wav']);
            else $this->replyWithMessage(['text' => '/fws <group> <'.implode(',', $this->types).'>']);
        } else {
            $this->replyWithMessage(['text' => 'Tu no puedes darme ordenes']);
        }
    }
}
