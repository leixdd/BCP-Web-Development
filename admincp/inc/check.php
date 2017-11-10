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

$configError = array();
$writablePaths = array(
	'cache/',
	'cache/news/',
	//config
	'config/email.xml',
	'config/modules/contact.xml',
	'config/modules/login.xml',
	'config/modules/news.xml',
);

// File permission check
foreach($writablePaths as $thisPath) {
	if(file_exists(__PATH_SYSTEM__ . $thisPath)) {
		if(!is_writable(__PATH_SYSTEM__ . $thisPath)) {
			$configError[] = "<span style=\"color:#aaaaaa;\">[Permission Error]</span> " . $thisPath . " <span style=\"color:red;\">(file must be writable)</span>";
		}
	} else {
		$configError[] = "<span style=\"color:#aaaaaa;\">[Not Found]</span> " . $thisPath. " <span style=\"color:orange;\">(re-upload file)</span>";
	}
}

// Encryption hash check
if(!check_value($config['encryption_hash'])) {
	$configError[] = "<span style=\"color:#aaaaaa;\">[Configuration]</span> encryption_hash <span style=\"color:green;\">(must be configured)</span>";
} else {
	if(!in_array(strlen($config['encryption_hash']), array(16,24,32))) {
		$configError[] = "<span style=\"color:#aaaaaa;\">[Configuration]</span> encryption_hash <span style=\"color:green;\">(must have 16, 24 or 32 characters)</span>";
	}
}

//checkVersion();
/*if (!checkVersion()) {
	echo 'Serial not found';
	exit();
}*/

// Check cURL
if(!function_exists('curl_version')) $configError[] = "<span style=\"color:#aaaaaa;\">[PHP]</span> <span style=\"color:green;\">curl not loaded (WebCore required cURL)</span>";

if(count($configError) >= 1) {
	throw new Exception("<strong>The following errors ocurred:</strong><br /><br />" . implode("<br />", $configError));
}