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

define('access', 'index');

try {
	
	if(!@include_once('system/core.php')) throw new Exception('Could not load the core of website.');
	
} catch (Exception $ex) {
	
	$errorPage = file_get_contents('system/error.html');
	echo str_replace("{ERROR_MESSAGE}", $ex->getMessage(), $errorPage);
	
}
