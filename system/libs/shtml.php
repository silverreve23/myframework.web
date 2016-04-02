<?php

//library for work with the HTML
class SHtml{

	//excerpt method for cut sting (<=200 chars)
	//method given str
	public static function excerpt($str){

		$countstr = strlen($str);

		//if count str < 200 char then return given str
		if($countstr <= 200)
			return $str.'...';

		$stripos = stripos($str, ' ', 200);
		$substr = substr($str, 0, $stripos).'...';

		return $substr;
	}

	//style Eror
	//method given str, color text, color fon
	public static function styleEror($str, $ct = 'white', $cf = '#688AB0'){

		echo "<div style='position:fixed;
						  left:0;
						  top:0;
						  color:$ct;
						  background-color:$cf;
						  font-family:arial;
						  padding:10px;'>$str</div>";
	}

}
