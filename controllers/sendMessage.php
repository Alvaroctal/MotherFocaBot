<?php

	$group = (int) $_POST['chat'];

	if ($group) {
		$telegram->sendMessage($group, $_POST['message'], 'Markdown');

		$output['status'] = 1;
		$output['code'] = 'send-message';
		$output['return'] = 'Message was sent successfully';
	}  
	else {
		$output['status'] = 0;
		$output['code'] = 'send-message-no-chat';
		$output['return'] = 'You must specify a chat';
	}
?>