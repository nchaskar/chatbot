<?php

$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST")
{
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	
	$text = $json->result->parameters->text;
	
	switch($text)
	{
		case 'hi':
			$speech = "Hi, how r u";
			break;
			
		case 'bye':
			$speech = "Have a nice day";
			break;
			
		case 'anything':
			$speech = "type Anything";
			break;
			
		default:
			$speech = "I can't get you";
			break;
	}
	
	$response = new \stdClass();
	$response->speech = "";
	$response->displayText = "";
	$response->source = "Startek";
	
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}

?>