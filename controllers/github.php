<?php

    $group = $GLOBALS['core']->getTelegram('group');

    $json = json_decode(file_get_contents('php://input'), true);

    $message = explode("\n", $json['head_commit']['message']);
    $title = $message[0];

    unset($message[0]); unset($message[1]);

    $message = $json['head_commit']['committer']['username'] .' ha publicado un nuevo commit:'. PHP_EOL . '['.$title.']('.$json['head_commit']['url'].')'; //. PHP_EOL . implode(PHP_EOL, $message);

    $telegram->sendMessage(['chat_id' => $group, 'text' => $message, 'parse_mode' => 'Markdown']);
?>