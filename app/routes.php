<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

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

Route::get('/xml', ['as' => 'dashboard', 'uses' => 'HomeController@twilioXML']);
Route::get('/call', ['as' => 'dashboard', 'uses' => 'HomeController@call']);
Route::get('/sms', ['as' => 'dashboard', 'uses' => 'HomeController@sms']);

// Route::match(array('GET', 'POST'), '/incoming', function()
// {
//   $xml = '<Response><Say>Hello - your app just answered the phone. Neat, eh?</Say></Response>';
//   $response = Response::make($xml, 200);
//   $response->header('Content-Type', 'text/xml');
//   return $response;
// });

Route::match(array('GET', 'POST'), '/incoming', function()
{
  $twiml = new Services_Twilio_Twiml();
  $twiml->say('Hello - your app just answered the phone. Neat, eh?', array('voice' => 'alice'));
  $response = Response::make($twiml, 200);
  $response->header('Content-Type', 'text/xml');
  return $response;
});