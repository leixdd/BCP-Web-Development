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

// File Name
$file_name = basename(__FILE__);

// Build Directory Path
$dir_path = str_replace('\\','/',dirname(dirname(__FILE__))).'/';

// Load System Core
include($dir_path . 'system/core.php');

// Load Cache Data
$cacheDATA = LoadCacheData('cron.cache');

foreach($cacheDATA as $key => $thisCRON) {
	if($key != 0) {
		$cron = array(
			'id' => $thisCRON[0],
			'file' => $thisCRON[3],
			'run_time' => $thisCRON[4],
			'last_run' => $thisCRON[5],
			'status' => $thisCRON[6]
		);
		
		if($cron['status'] == 1) {
			if(!check_value($cron['last_run'])) {
				$lrtime = $cron['run_time'];
			} else {
				$lrtime = $cron['last_run']+$cron['run_time'];
			}
			if(time() > $lrtime) {
				$filePath = __PATH_CRON__.$cron['file'];
				if(file_exists($filePath)) {
					include($filePath);
				}
			}
		}
	}
}
