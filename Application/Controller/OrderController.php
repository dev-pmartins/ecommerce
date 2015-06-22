<?php

namespace Application\Controller;

use Framework\Controller;

class OrderController extends Controller
{
	public function cartAction()
	{
        $this->render('order/cart');
	}
}