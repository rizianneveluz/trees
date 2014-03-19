<?php

class BaseController extends Controller {

	public function __construct() {
        //parent::__construct(); // Our layout will still be instantiated now.

        $this->beforeFilter(function() {
		    Event::fire('clockwork.controller.start');
		});

		$this->afterFilter(function() {
		    Event::fire('clockwork.controller.end');
		});
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