<?php

namespace Application\Controller;

use Framework\Controller;

class MainController extends Controller
{
	public function homeAction()
	{
		$this->render('home');
	}
}