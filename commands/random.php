<?php

namespace Telegram\Bot\Commands;

/**
 * Class HelpCommand
 *
 * @package Telegram\Bot\Commands
 */
class Random extends Command
{
    const DS = DIRECTORY_SEPARATOR;
    const SPLASHBASE_RANDOM_IMAGE_URL = 'http://www.splashbase.co/api/v1/images/random';
    const TEMP_DIR = 'commands' . self::DS . 'data' . self::DS . 'temp' . self::DS;

    /**
     * @var string Command Name
     */
    protected $name = "random";

    /**
     * @var string Command Description
     */
    protected $description = "Un buen random nunca viene mal";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        if($path = $this->getRandomImage()) {
            //$this->replyWithPhoto($path);
            $this->replyWithMessage($path);
        } else {
            $this->replyWithMessage('Algo ha petado...');
        }
    }

    /**
     * Get a random image from Splashbase
     *
     * @return bool|string full path to the image
     */
    private function getRandomImage()
    {
        $json = file_get_contents(self::SPLASHBASE_RANDOM_IMAGE_URL);

        return 'PHP v' . phpversion() . ' O.o Such High, Very Updated, Wow!';

        // TODO: peta en el json_decode y puede que en el is_writable, que cojones
        $res = json_decode($json);
        $image = file_get_contents($res['url']);
        file_put_contents(self::TEMP_DIR.'random.'.self::DS.pathinfo($res['url'], PATHINFO_EXTENSION), $image);
        return self::TEMP_DIR.'random.'.self::DS.pathinfo($res['url'], PATHINFO_EXTENSION);

        if($res && is_writable(self::TEMP_DIR)) {
            $res = json_decode($res);
            $image = file_get_contents($res['url']);

            file_put_contents(self::TEMP_DIR.'random.'.self::DS.pathinfo($res['url'], PATHINFO_EXTENSION), $image);

            return self::TEMP_DIR . 'random.' . self::DS . pathinfo($res['url'], PATHINFO_EXTENSION);
        }

        return false;
    }
}
