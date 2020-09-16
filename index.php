<?php

require __DIR__ . '/vendor/autoload.php';


use \LINE\LINEBot\SignatureValidator as SignatureValidator;

// load config
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

// initiate app
$configs =  [
	'settings' => ['displayErrorDetails' => true],
];
$app = new Slim\App($configs);

/* ROUTES */
$app->get('/', function ($request, $response) {
	return "sup?";
});

$app->post('/', function ($request, $response) {
	// get request body and line signature header
	$body 	   = file_get_contents('php://input');
	$signature = $_SERVER['HTTP_X_LINE_SIGNATURE'];

	// init bot
	$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV['CHANNEL_ACCESS_TOKEN']);
	$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_ENV['CHANNEL_SECRET']]);
	$data = json_decode($body, true);
	$userMessage = $event['message']['text'];
	$message = "asd";
	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
	$result = $bot->replyMessage($event['replyToken'], $textMessageBuilder);
	return $result->getHTTPStatus() . ' awowkaoakw ' . $result->getRawBody();
});

/* JUST RUN IT */
$app->run();