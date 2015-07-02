<?php

namespace Application\Controller;

use Framework\Controller;

class ProductController extends Controller
{
	public function listAction()
	{
        $productCollection = array(
            'x', 'y', 'z'
        );

        $this->render('product/list', $productCollection);
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