<?php

class HomeController extends BaseController {

	public function showWelcome() {
		return View::make('hello');
	}

	public function showThanks() {
		return View::make('thanks');
	}
}
