<?php

namespace Framework;


class Controller
{
    protected function render($view)
    {
        $css = file_get_contents(__DIR__.'/../Application/View/CSS/style.css');
        $page = file_get_contents(__DIR__.'/../Application/View/'.$view.'.php');
        include __DIR__.'/../Application/View/layout.php';
    }
}