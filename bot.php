<?php
$path = __DIR__ . '/vendor/autoload.php';
require_once $path;

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('wzwpbz9tZWCSPDrTFYf+APzByZ3jnlV259OV13WiCcsBXMftEVvi/OzVdEy8C31CYj4iA6GdPwQ5QCBnrJPKTNC4IcxZlr4bJwIVRAPd1FlWnDG8ThGjHWY4ZIOD1V/DhshZVuUJUv+YfDrLgh6xtgdB04t89/1O/w1cDnyilFU=');
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '515995d49d4801e7c580b8c914709b35']);
$mid = 'Ubb0233685f6c43ad7af9f72476d67f16';

$postdata = file_get_contents("php://input");
// Parse JSON
$events = json_decode($postdata, true);

if(!is_null($events['events'])) {
	foreach ($events['events'] as $event) {
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			$text = $event['message']['text'];
			
			if(strpos($text, 't') !== false){
				$MessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('Hello!!');
				$response = $bot->pushMessage($mid, $MessageBuilder);
				$MessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('How are you??');
				$response = $bot->pushMessage($mid, $MessageBuilder);
			}
			else if(strpos($text, 'i') !== false){
				$MessageBuilder = new \LINE\LINEBot\MessageBuilder\ImageMessageBuilder('https://upload.wikimedia.org/wikipedia/commons/b/b4/JPEG_example_JPG_RIP_100.jpg','https://upload.wikimedia.org/wikipedia/en/6/6d/Pullinger-150x150.jpg');
				$response = $bot->pushMessage($mid, $MessageBuilder);
			}
			else{
				$MessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('Blank');
				$response = $bot->pushMessage($mid, $MessageBuilder);
			}
		}
	}	
}
