<?php

	//--------------------------------------------------------------------------
	//	Commands
	//--------------------------------------------------------------------------

	include 'commands/help.php';
	include 'commands/kitten.php';
	include 'commands/hoygan.php';
	include 'commands/getID.php';
	include 'commands/moza.php';
	include 'commands/aoe.php';
	include 'commands/parse.php';
	include 'commands/espalet.php';
	include 'commands/mozo.php';
	include 'commands/random.php';

	//--------------------------------------------------------------------------
	//	Connection
	//--------------------------------------------------------------------------

	$telegram->addCommands([
		Telegram\Bot\Commands\Help::class,
		Telegram\Bot\Commands\Hoygan::class,
		Telegram\Bot\Commands\Kitten::class,
		Telegram\Bot\Commands\GetID::class,
		Telegram\Bot\Commands\Moza::class,
		Telegram\Bot\Commands\AoE::class,
		Telegram\Bot\Commands\Parse::class,
		Telegram\Bot\Commands\Espalet::class,
		Telegram\Bot\Commands\Mozo::class,
		Telegram\Bot\Commands\Random::class,
	]);
	$telegram->commandsHandler(true);
