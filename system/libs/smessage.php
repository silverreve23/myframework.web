<?php

//class lib message
class SMessage{
	
	//method send message
	//method given string exlode ':' params
	public static function sendMail($str_mess = null){

		if(!is_string($str_mess))
			throw new Exception("Error Given Non String Message", 17);

		$str_mess_ex = SArray::getFilterExArray(':', $str_mess);

		if(count($str_mess_ex) < 3)
			throw new Exception("Error Given String Message Count Params < 3", 18);

		//processing given string
		$to_mess = trim($str_mess_ex[0]);
		$sub_mess = htmlspecialchars($str_mess_ex[1]);
		$text_mess = htmlspecialchars($str_mess_ex[2]);

		if(isset($str_mess_ex[4]) and !empty($str_mess_ex[4]))
			$headers_mess = htmlspecialchars($str_mess_ex[4]);
		else
			$headers_mess = null;

		//processing reg email
		if (!preg_match("/^[a-z0-9_-]{1,20}@(([a-z0-9-]+\.)+(com|net|org|mil|".
   						"edu|gov|arpa|info|biz|inc|name|[a-z]{2})|[0-9]{1,3}\.[0-9]{1,3}\.[0-"."9]{1,3}\.[0-9]{1,3})$/is",$to_mess))
			throw new Exception("Error Given String Email Is Non Corect", 18);

		if(mail($to_mess, $sub_mess, $text_mess, $headers_mess))
			return true;

		return false;

	}
}