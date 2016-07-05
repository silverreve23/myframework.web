<?php
namespace system\libs;
use Exception;

//checking request url file
if(!defined('INC'))
	die('<center>Error Request URL</center>');

//library for work with the HTML
class LH{

	//excerpt method for cut sting (<=200 chars)
	//method given str
	public static function excerpt($str) : string{

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
	public static function styleError($str, $ct = 'white', $cf = '#688AB0'){

		echo "<div style='position:fixed;
						  left:0;
						  top:0;
						  color:$ct;
						  background-color:$cf;
						  font-family:arial;
						  padding:10px;
						  border-radius: 0 0 5px 0;'>$str</div>";
		return;
	}

	//style Eror
	//method given str, color text, color fon
	public static function pr(array $arr, string $style = '#f1f1f1'){

		echo "<pre style='background-color: $style'>";
			print_r($arr);
		echo '</pre>';

		return;
	}

}
