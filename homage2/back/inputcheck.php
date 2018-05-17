<?php

	
	function inputchecked($str){
		
		return $result = preg_replace("/'/", ' ', $str);

	}

	function dirchecked($str){
		
		return $result = preg_replace("/ /", '', $str);

	}

// 	$string = 'I have a match1 and a match3, and here\'s a match2';
// $find = array('/match1/', '/match2/');
// $replace = array('foo', 'bar');
// $result = preg_replace($find, $replace, $string);
	
?>