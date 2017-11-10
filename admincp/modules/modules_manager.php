<?php
/**
 * Ran Panel
 * http://glen-soft.net/
 * 
 * @version 1.0.0
 * @author Dev Glenox <025glenox025@gmail.com>
 * @copyright (c) 2016, Dev Glenox Free Ran Panel
 * @license http://glen-soft.net/license.html
 * @build 9/21/2016
 */

$Modules = array(
	'_global' => array(
		array('News','news'),
		array('Login','login'),
		array('Email System','email'),
		array('Contact Us','contact'),
	),
	'_usercp' => array(
		array('Change Password','mypassword'),
	),
);

echo '<h1 class="page-header">Module Manager</h1>';

echo '<div class="row">';
	
	echo '<div class="col-md-6">';
		echo '<h4>Global:</h4>';
		echo '<div class="modulesManager">';
			echo '<ul>';
			foreach($Modules['_global'] as $moduleList) {
				echo '<li><a href="'.admincp_base("modules_manager&config=".$moduleList[1]).'">'.$moduleList[0].'</a></li>';
			}
			echo '</ul>';
		echo '</div>';
	echo '</div>';
	
	echo '<div class="col-md-6">';
		echo '<h4>User CP:</h4>';
		echo '<div class="modulesManager">';
			echo '<ul>';
			foreach($Modules['_usercp'] as $moduleList) {
				echo '<li><a href="'.admincp_base("modules_manager&config=".$moduleList[1]).'">'.$moduleList[0].'</a></li>';
			}
			echo '</ul>';
		echo '</div>';
	echo '</div>';

echo '</div>';

echo '<hr>';

if(check_value($_GET['config'])) {
	$filePath = __PATH_ADMINCP_MODULES__.'mconfig/'.$_GET['config'].'.php';
	if(file_exists($filePath)) {
		include($filePath);
	} else {
		message('error','Invalid module.');
	}
}