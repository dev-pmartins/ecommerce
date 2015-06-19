<?php

require(__DIR__.'/../vendor/autoload.php');

error_reporting(-1);
ini_set('display_errors', '1');

$app = new \Framework\Application();

$app->with('MainController')
    ->get('/', 'homeAction');

$app->with('ProductController')
    ->get('/products', 'listAction')
    ->get('/products/:id', 'itemAction', [':id' => '\d+'])
    ->get('/products/:brand', 'pageAction', [':brand' => '[a-zA-Z]+'])
    ->get('/products/:brand/:category', 'pageAction', [
        ':brand' => '[a-zA-Z]+',
        ':category' => '[a-zA-Z]+',
    ])
    ->get('/products/:brand/male', 'listAction', [':brand' => '[a-zA-Z]+',])
;

$app->with('OrderController')
    ->get('/cart', 'cartAction');

$app->run();
