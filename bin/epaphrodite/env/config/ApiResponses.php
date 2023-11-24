<?php

namespace epaphrodite\epaphrodite\env\config;

use epaphrodite\epaphrodite\define\config\HttpStatut;

/**
 * Response
 */
class ApiResponses extends HttpStatut
{
	/*
	* Send API Response
	*/
	protected static function Json( $CodeStatut , $datas=[])
	{
		header("HTTP/1.1 ".$CodeStatut." ".static::$HttpStatusCodes[$CodeStatut]);

		header('Content-type: application/json; charset=utf-8');

		$response = array('status'=>$CodeStatut,'message' =>static::$HttpStatusCodes[$CodeStatut], 'data' =>$datas);

		echo json_encode( $response , JSON_PRETTY_PRINT );
	}

	/*
	* Send API Response
	*/
	protected static function Http( $CodeStatut , $datas=[])
	{
		echo header("HTTP/1.1 ".$CodeStatut." ".static::$HttpStatusCodes[$CodeStatut]);
	}	
}