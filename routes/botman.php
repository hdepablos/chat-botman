<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hola', function ($bot) {
    // Dependiendo de la hora decir: buenos días, buenas tardes o buenas noches 
    $bot->reply('Hola, buenas días!');
    $bot->reply('Hola, buenas tardes!');
    $bot->reply('Hola, buenas noches!');
});

$botman->hears('Tu nombre es', function ($bot) {
    $bot->reply('Mi nombre es H.D');
});

$botman->hears('Edad', function ($bot) {
    $bot->reply('40!');
});

$botman->hears('Mi nombre es {name}', function ($bot, $name) {
    $bot->reply('Tu nombre es: ' . $name);
});

$botman->hears('Mi dni {dni} y mi cuil {cuil}', function ($bot, $dni, $cuil) {
    $bot->reply('Tu dni ' . $dni . '. Y tu cuil ' . $cuil);
});

$botman->fallback(function ($bot) {
    $bot->reply('Lo siento, no entendí este comando. Aquí hay una lista de comandos que entiendo: ...');
});

$botman->hears('Un crédito de ([0-9]+)', function ($bot, $number) {
    $bot->reply('Conseguirás: ' . $number);
});

$botman->hears('Quiero ([0-9]+) porciones de (queso|pastel)', function ($bot, $amount, $dish) {
    $bot->reply('Conseguirás ' . $amount . ' porciones de ' . $dish . ' servido en breve.');
});

$botman->hears('.*php.*', function ($bot) {
    $bot->reply('Eres programador de php, felicidades!');
});

$botman->hears('Start conversation', BotManController::class . '@startConversation');
