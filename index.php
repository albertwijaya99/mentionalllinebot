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
		// init bot
		$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($_ENV['CHANNEL_ACCESS_TOKEN']);
		$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $_ENV['CHANNEL_SECRET']]);

		$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($request);
		$response = $bot->pushMessage('U3b5652591281552702e77740cde3a101', $textMessageBuilder);
});

/* JUST RUN IT */
$app->run();