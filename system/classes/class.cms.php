<?php
/**
 * https://www.facebook.com/Parad0x25
 * 
 * @version 1.0.0
 * @author Dev Glenox <025glenox025@gmail.com>
 * @copyright (c) 2017, Dev Glenox Free BCP Panel
 * @license https://www.facebook.com/Parad0x25
 * @build 7/3/2017
 */

class Cms {
	
	function LoadCachedCms($filename) {
			
		$file = __PATH_CMS_CACHE__. $filename . '.cache';
		//var_dump($file);
		if(file_exists($file) && is_readable($file)) {
			return file_get_contents($file);

		} else {
			return false;
		}
		
	}

	function deleteCMSFiles($filename) {
		$files = glob(__PATH_CMS_CACHE__.$filename . ".cache");
		//var_dump($files);
		foreach($files as $file) {
			if(is_file($file)) {
				unlink($file);
				return true;
			} else {
				return false;
			}
		}
	}

	function cacheCMS($filename,$content) {
	//var_dump($content);
		if($this->isNewsDirWritable($filename)) {
				if ($this->deleteCMSFiles($filename)) {
					$handle = fopen(__PATH_CMS_CACHE__ . $filename .".cache", "a");
					fwrite($handle, $content);
					fclose($handle);
					return true;
				}
				
		} else {
			return false;
		}
	}

	function isNewsDirWritable() {
		if(is_writable(__PATH_CMS_CACHE__)) {
			return true;
		} else {
			return false;
		}
	}

}