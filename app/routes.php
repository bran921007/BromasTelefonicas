<?php

//Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard']);
// REST API localhost/api/v1/
Route::group(['prefix' => 'api/v1', 'before' => 'auth.token', 'after' => 'allowOrigin'], function()
{
	Route::post('/createTrans', ['as' => 'home', 'uses' => 'TransactionController@createTransaction']);
	Route::get('/createTrans', ['as' => 'home', 'uses' => 'TransactionController@createTransaction']);
	Route::post('/refund', ['as' => 'home', 'uses' => 'TransactionController@refund']);
	Route::get('/refund/{id}', ['as' => 'home', 'uses' => 'TransactionController@refund']);
});
// Route::get('/verRes', ['as' => 'home', 'uses' => 'TransactionController@verRes']);
//--------------------------------------------------------------------------
//--------------------------------------------------------------------------
// REST API AUTH TOKEN
Route::filter('auth.token', function($route, $request)
{
	$payload = Input::get('api_key');
	$user =  Token::where('api_key','=', $payload)->where('estado','=','true')->first();
	if(!$payload || !$user) {
		$response = Response::json([
			'error' => true,
			'message' => 'Not authenticated',
			'code' => 401],
			401
		);
		$response->header('Content-Type', 'application/json');
		return $response;
	}
});
//--------------------------------------------------------------------------

Route::get('/', function()
{
	return View::make('index');
});

Route::get('mensaje', function()
{
	// Twilio::from('+14123243098')->to('+18098586191')->message('This is still.. so, damn, easy!');

	// Twilio::from('+14123243098')->to('+18098586191')->call('http://joomla-erpp.rhcloud.com/hey.xml');
	Twilio::to('+18098586191')->call('http://joomla-erpp.rhcloud.com/hey.xml');
});
//APP
// Route::get('/llamar', ['as' => 'dashboard', 'uses' => 'HomeController@llamar']);

Route::get('/xml/{mensaje}', ['as' => 'dashboard', 'uses' => 'HomeController@twilioXML']);
// Route::post('/xml', ['as' => 'dashboard', 'uses' => 'HomeController@twilioXML']);

Route::post('/call', ['as' => 'dashboard', 'uses' => 'HomeController@call']);

Route::get('/sms', ['as' => 'dashboard', 'uses' => 'HomeController@sms']);
Route::post('/sms', ['as' => 'dashboard', 'uses' => 'HomeController@sms']);




Route::match(array('GET', 'POST'), '/incoming', function()
{
  $twiml = new Services_Twilio_Twiml();
  $twiml->say('Hello - your app just answered the phone. Neat, eh?', array('voice' => 'alice'));
  $response = Response::make($twiml, 200);
  $response->header('Content-Type', 'text/xml');
  return $response;
});