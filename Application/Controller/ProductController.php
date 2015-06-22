<?php

namespace Application\Controller;

use Framework\Controller;

class ProductController extends Controller
{
	public function listAction()
	{
        $this->render('product/list');
	}

    public function itemAction()
    {
        $this->render('product/item');
    }

    public function pageAction()
    {
        $this->render('product/page');
    }
}