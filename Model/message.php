<?php
    ob_start(); // Initiate the output buffer

// echo"message";
class Messager{


	
	private $pagego;
	private $message;

	function __construct($message,$pagego){
		$this->message=$message;
		$this->pagego=$pagego;

	}


	public function sendmessage(){
		$cookie_name="messagedisplay";
		if(!isset($_COOKIE[$cookie_name])) {
			setcookie("messagedisplay", $this->message, time()+30,"/");
		} else {
			unset($_COOKIE[$cookie_name]);
			$res = setrawcookie($cookie_name, '', time() - 3600);
			setcookie("messagedisplay", $this->message, time()+30,"/");
		}
		// echo"message";

		// $options['expires']=time()+30;
		// setcookie("messagedisplay", $this->message, time()+3600,"/");
              header("location: ".$this->pagego);
	}
	public function sendmessagesecond($message, $pagego){
		// echo"message";

		$options['expires']=time()+30;
		// setcookie("messagedisplay", "", time() - 3600);
          setcookie("messagedisplay",$message, time()+30,"/");
              header("location: ".$pagego);
	}
}
// echo"message end1";


    ob_end_flush(); // Flush the output from the buffer
?>