<?php
/**
 * https://www.facebook.com/Parad0x25
 * 
 * @version 1.0.0
 * @author Dev Glenox <025glenox025@gmail.com>
 * @copyright (c) 2017, Dev Glenox Free BCP Panel
 * @license https://www.facebook.com/Parad0x25
 * @build 4/21/2017
 */

function admincp_base($module="") {
	if(check_value($module)) return __PATH_ADMINCP_HOME__ . "?module=" . $module;
	return __PATH_ADMINCP_HOME__;;
}

function enabledisableCheckboxes($name,$checked,$e_txt,$d_txt) {
	echo '<div class="radio">';
	echo '<label class="radio">';
	if($checked == 1) {
		echo '<input type="radio" name="'.$name.'" value="1" checked>';
	} else {
		echo '<input type="radio" name="'.$name.'" value="1">';
	}
	echo $e_txt;
	echo '</label>';
	echo '<label class="radio">';
	if($checked == 0) {
		echo '<input type="radio" name="'.$name.'" value="0" checked>';
	} else {
		echo '<input type="radio" name="'.$name.'" value="0">';
	}
	echo $d_txt;
	echo '</label>';
	echo '</div>';
}

function checkVersion(){
	$string = file_get_contents("http://glen-soft.net/serial/default.json");
	$json_a = json_decode($string, true);


	$serial1 = __BASE_URL__;


	 foreach ($json_a as $person_name => $person_a) {

    	$serial2 = $person_a['serial'];
    	 
	}
	
	  //var_dump($serial2);
		
   	if ($serial1 == $serial2) {

	    
		 return true;
	
	}

	
}