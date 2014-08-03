<?php

class BaseController extends Controller {

	public function getUserToken() {
    $userToken = Input::get('voter_token');

    if($userToken == null) {
      $userToken = Cookie::get('voter_token');
    }

    if($userToken == null) {
      App::abort(403);
    }

    return $userToken;
  }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
