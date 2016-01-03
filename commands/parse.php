<?php

namespace Telegram\Bot\Commands;

/**
 * Class Parse
 *
 * @package Telegram\Bot\Commands
 */
class Parse extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "parse";

    /**
     * @var string Command Description
     */
    protected $description = "Returns a parsed command list";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $commands = $this->telegram->getCommands();

        $response = '';
        
        foreach ($commands as $name => $command) {
            if ($name != $this->name) {
                $response .= sprintf('%s - %s' . PHP_EOL, strtolower($name), $command->getDescription());
            }
        }

        $this->replyWithMessage($response);
    }
}
