<?php

function stripZeroFromDate($string=''){
	//first remove the marked zeros
	$noZeros = str_replace('*0', '', $string);
	//then remove any remaining marks
	$cleanString = str_replace('*', '', $noZeros);
	return $cleanString;
}

function redirectTo($location = Null){
	if ($location != Null) {
		header("Location: {$location}");
		exit;
	}
}

function outputMessage($message = '', $type = 'success'){
	if (!empty($message)) {
		$result = "<div class=\"alert alert-{$type} alert-dismissible \">";
		$result .= "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
		$result .= " {$message} </div>";

		return $result;
	} else {
		return "";
	}
}

?>
