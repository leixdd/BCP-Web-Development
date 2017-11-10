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

/**
 * config
 * Returns or prints the value of a config.
 */
function config($config_name, $return = false) {
	global $config;
	if($return) {
		return $config[$config_name];
	} else {
		echo $config[$config_name];
	}
}

function convertXML($object) {
	return json_decode(json_encode($object), true);
}

function loadModuleConfigs($module) {
	global $ranconfig;
	if(moduleConfigExists($module)) {
		$xml = simplexml_load_file(__PATH_MODULE_CONFIGS__.$module.'.xml');
		$ranconfig = array();
		if($xml) {
			$moduleCONFIGS = convertXML($xml->children());
			$ranconfig = $moduleCONFIGS;
		}
	}
}

function moduleConfigExists($module) {
	if(file_exists(__PATH_MODULE_CONFIGS__.$module.'.xml')) {
		return true;
	}
}

function globalConfigExists($config_file) {
	if(file_exists(__PATH_CONFIGS__.$config_file.'.xml')) {
		return true;
	}
}

function ranconfig($configuration) {
	global $ranconfig;
	if(@array_key_exists($configuration, $ranconfig)) {
		return $ranconfig[$configuration];
	} else {
		return null;
	}
}

function gconfig($config_file,$return=true) {
	global $gconfig;
	if(globalConfigExists($config_file)) {
		$xml = simplexml_load_file(__PATH_CONFIGS__.$config_file.'.xml');
		$gconfig = array();
		if($xml) {
			$globalCONFIGS = convertXML($xml->children());
			if($return) {
				return $globalCONFIGS;
			} else {
				$gconfig = $globalCONFIGS;
			}
		}
	}
}

function loadConfigurations($file) {
	if(!check_value($file)) return;
	if(!moduleConfigExists($file)) return;
	$xml = simplexml_load_file(__PATH_MODULE_CONFIGS__ . $file . '.xml');
	if($xml) return convertXML($xml->children());
	return;
}