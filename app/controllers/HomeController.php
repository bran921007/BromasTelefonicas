<?php

class HomeController extends BaseController {

	public function mensajeVoz(){

	}

	// public function call(){


	// 	Twilio::to('+18098586191')->call('http://joomla-erpp.rhcloud.com/hey.xml');
	// 	//Twilio::call('8098586191', 'http://joomla-erpp.rhcloud.com/hey.xml');
	// }	
	public function sms(){
		// return Response::json(array(
		// 		'success' => false,
		// 		'msg' => "llamada no realizada satisfactoriamente"
		// 	));

		$mensaje = Input::get('mensaje');
		$telefono = Input::get('telefono');

		try{
			Twilio::to('+'.$telefono)->message($mensaje);
			return Response::json(array(
				'success' => true,
				'msg' => "llamada realizada satisfactoriamente"
			));

		}catch(Exception $e){
			return Response::json(array(
				'success' => false,
				'msg' => "llamada no realizada satisfactoriamente"
			));
		}		
		
	}	

	public function call(){

		$mensaje = Input::get('mensaje');
		$telefono = Input::get('telefono');

		$mensaje = rawurlencode($mensaje);

		try{
		
			Twilio::to('+'.$telefono)->call('http://104.131.62.203/xml/'.$mensaje);
			return Response::json(array(
				'success' => true,
				'msg' => "llamada realizada satisfactoriamente"
			));

		}catch(Exception $e){
			return Response::json(array(
				'success' => false,
				'msg' => "llamada no realizada satisfactoriamente"
			));
		}		
		
	}



	public function twilioXML($mensaje){
		 // return Twilio::twiml(function($message) {
			//     $message->say('Hello');
			//     $message->play('https://api.twilio.com/cowbell.mp3', array('loop' => 5));
			// });

		  $twiml = new Services_Twilio_Twiml();
		  $twiml->say($mensaje, array('voice' => 'woman','language'=>'es'));
		  $twiml->play('http://joomla-erpp.rhcloud.com/Porno.mp3');
		  $response = Response::make($twiml, 200);
		  $response->header('Content-Type', 'text/xml');

		  return $response;


	}

}
