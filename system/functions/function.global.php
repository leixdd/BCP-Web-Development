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

function check_value($value) {
	if((@count($value)>0 and !@empty($value) and @isset($value)) || $value=='0') {
		return true;
	}
}

function redirect($type = 1, $location = null, $delay = 0) {
	if(!check_value($location)) {
		$to = __BASE_URL__;
	} else {
		$to = __BASE_URL__ . $location;
		
		if($location == 'login') {
			$_SESSION['login_last_location'] = $_REQUEST['page'].'/';
			if(check_value($_REQUEST['subpage'])) {
				$_SESSION['login_last_location'] .= $_REQUEST['subpage'].'/';
			}
		}
	}

	switch($type) {
		default:
			header('Location: '.$to.'');
			die();
		break;
		case 1:
			header('Location: '.$to.'');
			die();
		break;
		case 2:
			echo '<meta http-equiv="REFRESH" content="'.$delay.';url='.$to.'">';
		break;
		case 3:
			header('Location: '.$location.'');
			die();
		break;
	}
}

function isLoggedIn() {
	$login = new login();
	if($login->isLoggedIN()) {
		return true;
	} else {
		return false;
	}
}

function logOutUser() {
	$login = new login();
	$login->logout();
}

function message($type = 'neutral',$message = null, $newTitle = null) {
	switch($type) {
		default:
			$class = ' alert-info';
			$class_admincp = ' alert-info';
		break;
		case 'error':
			$class = ' alert-danger';
			$class_admincp = ' alert-danger';
			$title = 'ERROR:';
		break;
		case 'success':
			$class = ' alert-success';
			$class_admincp = ' alert-success';
			$title = 'SUCCESS!';
		break;
		case 'warning':
			$class = ' alert-warning';
			$class_admincp = ' alert-warning';
			$title = 'WARNING:';
		break;
		case 'info':
			$class = ' information';
			$class_admincp = ' alert-info';
			$title = 'INFO:';
		break;
		case 'tip':
			$class = ' tip';
			$title = 'TIP:';
		break;
		case 'message':
			$class = ' message';
			$title = 'MESSAGE:';
		break;
		case 'download':
			$class = ' download';
			$title = 'DOWNLOAD:';
		break;
		case 'edit':
			$class = ' edit';
			$title = 'EDIT:';
		break;
		case 'chat':
			$class = ' chat';
			$title = 'HELLO!';
		break;
		case 'lock':
			$class = ' lock';
			$title = 'MEMBERS AREA:';
		break;
		case 'construction':
			$class = ' construction';
			$title = 'UNDER CONSTRUCTION:';
		break;
	}
	
	if(check_value($newTitle)) { $title = $newTitle; }
	
	if(defined('admincp') && admincp == true) {
		echo '<div class="alert'.$class_admincp.'">';
	} else {
		echo '<div class="alert'.$class.'">';
	}
	if(check_value($title)) { echo '<strong>'.$title.'</strong>   '; }
	echo $message;
	echo '</div>';
}

function lang($lang_name, $return = false) {
	global $lang;
	if($return) {
		return $lang[$lang_name];
	} else {
		echo $lang[$lang_name];
	}
}

function Encode($txt) {
	$encryption = new Encryption();
	return $encryption->encode($txt);
}

function Decode($txt) {
	$encryption = new Encryption();
	return $encryption->decode($txt);
}

function debug($value) {
	echo '<pre>';
		print_r($value);
	echo '</pre>';
}

function canAccessAdminCP($username) {
	if(!check_value($username)) return;
	if(array_key_exists($username, config('admins',true))) return true;
	return false;
}

function studentAccess($username) {
	global $dB1;
	//var_dump($username);
	if(!check_value($username)) return;
	//if(array_key_exists($username, config('admins',true))) return true;
	$result = $dB1->query_fetch_single("SELECT * FROM UserInfo WHERE UserNum = ?", array($username));
	//var_dump($result['Usertype']);
	if($result['Usertype']==1) return true;
	return false;
}

function ranpanel_id($var, $action='encode') {
	$base_chars = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; // DON'T REPEAT A SINGLE CHAR!
	
	for ($n = 0; $n<strlen($base_chars); $n++) {
		$i[] = substr( $base_chars,$n ,1);
    }
 
    $passhash = hash('sha256',config('encryption_hash',true));
    $passhash = (strlen($passhash) < strlen($base_chars)) ? hash('sha512',config('encryption_hash',true)) : $passhash;
 
    for ($n=0; $n < strlen($base_chars); $n++) {
		$p[] =  substr($passhash, $n ,1);
    }
 
    array_multisort($p, SORT_DESC, $i);
    $base_chars = implode($i);
	
	switch($action) {
		case 'encode':
			$string = '';
			$len = strlen($base_chars);
			while($var >= $len) {
				$mod = bcmod($var, $len);
				$var = bcdiv($var, $len);
				$string = $base_chars[$mod].$string;
			}
			return $base_chars[$var] . $string;
		break;
		case 'decode':
			$integer = 0;
			$var = strrev($var );
			$baselen = strlen( $base_chars );
			$inputlen = strlen( $var );
			for ($i = 0; $i < $inputlen; $i++) {
				$index = strpos($base_chars, $var[$i] );
				$integer = bcadd($integer, bcmul($index, bcpow($baselen, $i)));
			}
			return $integer;
		break;
	}
}

function Encode_id($id) {
	return ranpanel_id($id,'encode');
}

function Decode_id($id) {
	return ranpanel_id($id,'decode');
}

function BuildCacheData($data_array) {
	$result = null;
	if(is_array($data_array)) {
		foreach($data_array as $row) {
			$count = count($row);
			$i = 1;
			foreach($row as $data) {
				$result .= $data;
				if($i < $count) {
					$result .= '¦';
				}
				$i++;
			}
			$result .= "\n";
		}
		return $result;
	} else {
		return null;
	}
}

function UpdateCache($file_name,$data) {
	$file = __PATH_CACHE__.$file_name;
	if(file_exists($file) && is_writable($file)) {
		$fp = fopen($file, 'w');
		fwrite($fp, time()."\n");
		fwrite($fp, $data);
		fclose($fp);
		return true;
	} else {
		return false;
	}
}

function LoadCacheData($file_name) {
	$file = __PATH_CACHE__.$file_name;
	if(file_exists($file) && is_readable($file)) {
		$cache_file = file_get_contents($file);
		$file_lanes = explode("\n",$cache_file);
		$nlines = count($file_lanes);
		for($i=0; $i<$nlines; $i++) {
			if(check_value($file_lanes[$i])) {
				$line_data[$i] = explode("¦",$file_lanes[$i]);
			}
		}
		return $line_data;
	} else {
		return null;
	}
}

function sec_to_hms($input_seconds) {
	if($input_seconds >= 1) {
		$hours_module = $input_seconds % 3600;
		$hours = ($input_seconds-$hours_module)/3600;
		$minutes_module = $hours_module % 60;
		$minutes = ($hours_module-$minutes_module)/60;
		$seconds = $minutes_module;
		return array($hours,$minutes,$seconds);
	} else {
		return null;
	}
}


function listCronFiles($selected="") {
	$dir = opendir(__PATH_CRON__);
	while(($file = readdir($dir)) !== false) {
		if(filetype(__PATH_CRON__ . $file) == "file" && $file != ".htaccess" && $file != "cron.php") {
			
			if(check_value($selected) && $selected == $file) {
				$return[] = "<option value=\"$file\" selected=\"selected\">$file</option>";
			} else {
				$return[] = "<option value=\"$file\">$file</option>";
			}
		}
	}
	closedir($dir);
	return join('', $return);
}

function cronFileAlreadyExists($cron_file) {
	global $dB4;
	$check = $dB4->query_fetch_single("SELECT * FROM cron WHERE cron_file_run = '$cron_file'");
	if(!is_array($check)) {
		return true;
	}
}

function addCron($cron_times) {
	global $dB4;
	if(check_value($_POST['cron_name']) && check_value($_POST['cron_file']) && check_value($_POST['cron_time'])) {
		
		$filePath = __PATH_CRON__.$_POST['cron_file'];

		// Check Cron File Exists
		if(!file_exists($filePath)) {
			message('error','The selected file doesn\'t exist.');
			return;
		}
		// Check Cron File Databse
		if(!cronFileAlreadyExists($_POST['cron_file'])) {
			message('error','A cron job with the same file already exists.');
			return;
		}
		// Check Cron Time
		if(!array_key_exists($_POST['cron_time'], $cron_times)) {
			message('error','The selected cron time doesn\'t exist.');
			return;
		}
		
		$sql_data = array(
			$_POST['cron_name'],
			$_POST['cron_description'],
			$_POST['cron_file'],
			$cron_times[$_POST['cron_time']],
			1,
			md5_file($filePath)
		);
		$query = $dB4->query("INSERT INTO cron (cron_name, cron_description, cron_file_run, cron_run_time, cron_status, cron_file_md5) VALUES (?, ?, ?, ?, ?, ?)", $sql_data);
		if($query) {
		
			// UPDATE CACHE
			updateCronCache();
			
			message('success','Cron job successfully added!');
		} else {
			message('error','Could not add cron job.');
		}
		
	} else {
		message('error','Please complete all the required fields.');
	}
}

function updateCronLastRun($file) {
	global $dB4;
	$update = $dB4->query("UPDATE cron SET cron_last_run = '".time()."' WHERE cron_file_run = '".$file."'");
	if($update) {
		// UPDATE CACHE
		updateCronCache();
	}
}

function updateCronCache() {
	global $dB4;
	$cacheDATA = BuildCacheData($dB4->query_fetch("SELECT * FROM cron"));
	UpdateCache('cron.cache',$cacheDATA);
}

function getCronJobDATA($id) {
	global $dB4;
	$result = $dB4->query_fetch_single("SELECT * FROM cron WHERE cron_id = '$id'");
	if(is_array($result)) {
		return $result;
	}
}

function deleteCronJob($id) {
	global $dB4;
	$cronDATA = getCronJobDATA($id);
	if(is_array($cronDATA)) {
		if($cronDATA['cron_protected']) {
			message('error','This cron job is protected therefore cannot be deleted.');
			return;
		}
		$delete = $dB4->query("DELETE FROM cron WHERE cron_id = '$id'");
		if($delete) {
			message('success','Cron job "<strong>'.$cronDATA['cron_name'].'</strong>" successfully deteled!');
			updateCronCache();
		} else {
			message('error','Could not delete cron job.');
		}
	} else {
		message('error','Could not find cron job.');
	}
}

function togglestatusCronJob($id) {
	global $dB4;
	$cronDATA = getCronJobDATA($id);
	if(is_array($cronDATA)) {
		if($cronDATA['cron_status'] == 1) {
			$status = 0;
		} else {
			$status = 1;
		}
		$toggle = $dB4->query("UPDATE CRON SET cron_status = $status WHERE cron_id = '$id'");
		if($toggle) {
			message('success','Cron job "<strong>'.$cronDATA['cron_name'].'</strong>" status successfully changed!');
			updateCronCache();
		} else {
			message('error','Could not update cron job.');
		}
	} else {
		message('error','Could not find cron job.');
	}
}

function editCronJob($id,$name,$desc,$file,$time,$cron_times,$current_file) {
	global $dB4;
	if(check_value($name) && check_value($file) && check_value($time)) {
		$filePath = __PATH_CRON__.$file;

		// Check Cron File Exists
		if(!file_exists($filePath)) {
			message('error','The selected file doesn\'t exist.');
			return;
		}
		// Check Cron File Databse
		if($file != $current_file) {
			if(!cronFileAlreadyExists($file)) {
				message('error','A cron job with the same file already exists.');
				return;
			}
		}
		// Check Cron Time
		if(!array_key_exists($time, $cron_times)) {
			message('error','The selected cron time doesn\'t exist.');
			return;
		}

		$query = $dB4->query("UPDATE CRON SET cron_name = '".$name."', cron_description = '".$desc."', cron_file_run = '".$file."', cron_run_time = '".$cron_times[$time]."' WHERE cron_id = $id");
		if($query) {
		
			// UPDATE CACHE
			updateCronCache();
			
			message('success','Cron job successfully updated!');
		} else {
			message('error','Could not edit cron job.');
		}
	} else {
		message('error','You must fill all the required fields.');
	}
}