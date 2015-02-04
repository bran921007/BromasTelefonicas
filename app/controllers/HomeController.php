<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function call(){

		Twilio::call('8098586191', 'http://joomla-erpp.rhcloud.com/hey.xml');
	}

	public function twilioXML(){
		 return Twilio::twiml(function($message) {
			    $message->say('Hello');
			    $message->play('https://api.twilio.com/cowbell.mp3', array('loop' => 5));
			});


	}

}
