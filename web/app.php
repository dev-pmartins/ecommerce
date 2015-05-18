<?php

require __DIR__ . '/vendor/autoload.php';

$app = new \Framework\Application();

$app->with('MainController')
    ->get('/', 'homeAction');

$app->with('ProductController')
    ->get('/products', 'listAction');
    ->get('/products/:id', 'findAction');

$app->with('OrderController')
    ->get('/cart', 'cartAction');
