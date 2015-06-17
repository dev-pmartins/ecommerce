<?php

require(__DIR__.'/../vendor/autoload.php');

error_reporting(-1);
ini_set('display_errors', '1');

$app = new \Framework\Application();

$app->with('MainController')
    ->get('/', 'homeAction');

$app->with('ProductController')
    ->get('/products', 'listAction')
    ->get('/products/:id', 'findAction', [':id' => '\d+'])
    ->get('/products/:brand/:category', 'findAction', [
        ':brand' => '\s+',
        ':category' => '\s+',
    ])
    ->get('/products/:brand/male', 'findAction', [':brand' => '\s+',])
;

$app->with('OrderController')
    ->get('/cart', 'cartAction');

$app->run();
