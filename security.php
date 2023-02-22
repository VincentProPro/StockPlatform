<?php
/**
 * 
 */

class Security 
{
	
	function __construct()
	{
		// code...
	}
	function StringTransform($parametre){
		//remove %2B
		//detect malicious log 
		$texte=filter_var($parametre, FILTER_SANITIZE_STRING);
		$patterns = array();
		$patterns[0] = "/%2B/";
		$patterns[1] = "/x3e/";
		$patterns[2] = "/x3c/";
		$patterns[3] = "/HTTPS/";
		$patterns[4] = "/:///";
		$patterns[5] = "/https/";
		$patterns[6] = "/www./";
		// $patterns[2] = '/renard/';
		$texte=preg_replace($patterns, '', $texte,-1);
		return $texte;
	}

function str_replace_assoc(array $replace, $subject) {

   return str_replace(array_keys($replace), array_values($replace), $subject);    

}
	
		
	function againstXSS($parametre){
		$texte=filter_var($parametre, FILTER_SANITIZE_STRING);
		
		$replace = array(


			'script' => '',
			'&gt' => '',
			'&lt' => '',
			'&quot' => '',
			'&#039' => '',
			'script' => '',
			'http' => '',
			'www' => '',
			'script' => '',
			'document.location' => '',
			'document.cookie' => '',
			'onmouse' => '',
			'3e' => '',
			'<' => '',
			'>' => '',
			'3c' => '',
			'%73%63%72%69%70%74' => '',
			'3c%73%63%72%69%70%74%3' => '',
			'69%70%74%3' => '',
			'%2B' => '',
			'x3e' => '',
			'x3c' => '',
			'63%72' => '',
			"/%3c%2f%73%63%72%69%70%74%3e/" => ''

			);
	
		return str_replace(array_keys($replace), array_values($replace), $texte);
		
	}

	function CheckNumberInt($parametre){
		if(isset($parametre) && is_int($parametre)){
			$result= filter_var($parametre, FILTER_SANITIZE_NUMBER_INT);
			return $result;
		}

		return false;
	}
	function CheckNumber($parametre){
		if(isset($parametre) && is_int($parametre)){
			$result= filter_var($parametre, FILTER_SANITIZE_NUMBER_INT);
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

$objectCreated= new Security();
//\x3cscript\x3ealert(1)\x3c/script\x3e
//on
// echo$objectCreated->checkmatch("<script>alert(1);</script> script %22");

// $lname=$_GET['lname'];
$fname=$_GET['fname'];
echo$fname;

echo"Using the againstXSS function => firstname is: <br>";
echo$objectCreated->againstXSS($fname);
// echo"<br> Using the againstXSS function => lastname is: <br>";
// echo$objectCreated->againstXSS($lname);

?>

