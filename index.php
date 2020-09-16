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
	$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient('<channel access token>');
	$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => '<channel secret>']);

	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
	$response = $bot->replyMessage('<replyToken>', $textMessageBuilder);

	echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
});

/* JUST RUN IT */
$app->run();