<?php

namespace Telegram\Bot\Commands;

/**
 * Class HelpCommand
 *
 * @package Telegram\Bot\Commands
 */
class Help extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "help";

    /**
     * @var string Command Description
     */
    protected $description = "Help command, Get a list of commands";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $commands = $this->telegram->getCommands();

        $response = '';
        // TODO: fix $name variable next line
        $response .= sprintf('Lista de Comandos:'. $name.PHP_EOL);
        $response .= sprintf(PHP_EOL);
        foreach ($commands as $name => $command) {
            if ($name != 'help') {
                $response .= sprintf('/%s %s' . PHP_EOL, $name, $command->getDescription());
            }
        }

        $this->replyWithMessage($response);
    }
}
