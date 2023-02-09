<?php
/**
 * 
 */
class Security 
{
	
	function __construct(argument)
	{
		// code...
	}
	function StringTransform($parametre){
		//remove %2B
		//detect malicious log 
		$texte=filter_var($parametre, FILTER_SANITIZE_STRING);
		$patterns = array();
		$patterns[0] = '/%2B/';
		$patterns[1] = '/x3e/';
		$patterns[2] = '/x3c/';
		$patterns[3] = '/HTTPS/';
		$patterns[4] = '/:///';
		$patterns[5] = '/https/';
		$patterns[6] = '/www./';
		// $patterns[2] = '/renard/';
		$texte=preg_replace($patterns, '', $texte,-1)
		return $texte;
	}

	function CheckNumberInt($parametre){
		if(isset($parametre) && is_int($parametre)){
			$result= filter_var($parametre, FILTER_SANITIZE_NUMBER_INT)
			return $result;
		}

		return false;
	}
	function CheckNumber($parametre){
		if(isset($parametre) && is_int($parametre)){
			$result= filter_var($parametre, FILTER_SANITIZE_NUMBER_INT)
			return $result;
		}

		return false;
	}
	function SearchScript($parametre){
		if(strpos($parametre, "<script>")){
			return false;
		}else{
			return $parametre;
		}
	}
	function sanitizeemail($parametre){
		$parametre=filter_var($parametre, FILTER_SANITIZE_EMAIL);

	}
}

?>