<?php

namespace Framework;


class Controller
{
    protected function render($view)
    {
        include __DIR__.'/../Application/View/'.$view.'.php';
    }
}