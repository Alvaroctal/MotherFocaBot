<?php

	//--------------------------------------------------------------------------
	//	Commands
	//--------------------------------------------------------------------------

	include 'commands/help.php';
	include 'commands/kitten.php';
	include 'commands/hoygan.php';
	include 'commands/getID.php';
	include 'commands/moza.php';

	//--------------------------------------------------------------------------
	//	Connection
	//--------------------------------------------------------------------------

	$telegram->addCommands([
		Telegram\Bot\Commands\Help::class,
		Telegram\Bot\Commands\Hoygan::class,
		Telegram\Bot\Commands\Kitten::class,
		Telegram\Bot\Commands\GetID::class,
		Telegram\Bot\Commands\Moza::class,
	]);
	$telegram->commandsHandler(true);
?>