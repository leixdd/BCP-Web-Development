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

session_start();
ob_start();

# Version
define('__FRAMEWORK_VERSION__', '1.0.0');

# Load Configurations
if(!@include_once(dirname(__FILE__).'/config.php')) throw new Exception('Could not load the configurations file.');

# CMS Status
if(!$config['system_active']) {
	if(!array_key_exists($_SESSION['username'], $config['admins'])) {
		header('Location: ' . $config['maintenance_page']);
		die();
	}
	$config['enable_session_timeout'] = false;
	
	# show website status to the admin
	echo '<div style="text-align:center;border:1px solid #ff0000;padding:10px;background:#520000;color:#ff0000;font-size:16pt;">';
		echo 'OFFLINE MODE';
	echo '</div>';
}

# Error Reporting
if($config['error_reporting']) {
	ini_set('display_errors', true);
	error_reporting(E_ALL & ~E_NOTICE);
} else {
	ini_set('display_errors', false);
	error_reporting(0);
}

# Set Encoding
@ini_set('default_charset', 'utf-8');

# CloudFlare IP workaround
$_SERVER['REMOTE_ADDR'] = (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];

# Global Paths
define('HTTP_HOST', $_SERVER['HTTP_HOST']);
define('SERVER_PROTOCOL', (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ) ? 'https://' : 'http://');
define('__ROOT_DIR__', str_replace('\\','/',dirname(dirname(__FILE__))).'/'); // /home/user/public_html/
define('__RELATIVE_ROOT__', str_ireplace(rtrim(str_replace('\\','/', realpath(str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['SCRIPT_FILENAME']))), '/'), '', __ROOT_DIR__));// /
define('__BASE_URL__', SERVER_PROTOCOL.HTTP_HOST.__RELATIVE_ROOT__); // http(s)://www.mysite.com/

# CMS Paths
define('__PATH_SYSTEM__', __ROOT_DIR__.'system/');
define('__PATH_TEMPLATES__', __ROOT_DIR__.'templates/');
define('__PATH_TEMPLATES_EXTRA__', __ROOT_DIR__.'templates/'.$config['website_template'].'/extra/');
define('__PATH_TEMPLATE__', __BASE_URL__ . 'templates/' . $config['website_template'] . '/');
define('__PATH_TEMPLATE_IMG__', __BASE_URL__ . 'templates/' . $config['website_template'] . '/img/');
define('__PATH_LANGUAGES__', __ROOT_DIR__ . 'languages/');
define('__PATH_CLASSES__', __PATH_SYSTEM__.'classes/');
define('__PATH_FUNCTIONS__', __PATH_SYSTEM__.'functions/');


define('__PATH_MODULES__', __PATH_SYSTEM__.'modules/');
define('__PATH_MODULES_USERCP__', __PATH_MODULES__.'usercp/');

define('__PATH_EMAILS__', __PATH_SYSTEM__.'emails/');
define('__PATH_CACHE__', __PATH_SYSTEM__.'cache/');
define('__PATH_ADMINCP__', __ROOT_DIR__.'admincp/');
define('__PATH_ADMINCP_INC__', __ROOT_DIR__.'admincp/inc/');
define('__PATH_ADMINCP_MODULES__', __ROOT_DIR__.'admincp/modules/');
define('__PATH_ADMINCP_HOME__', __BASE_URL__.'admincp/index.php');
define('__PATH_NEWS_CACHE__', __PATH_CACHE__.'news/');
define('__PATH_CMS_CACHE__', __PATH_CACHE__.'cms/');
define('__PATH_PLUGINS__', __PATH_SYSTEM__.'plugins/');
define('__PATH_CONFIGS__', __PATH_SYSTEM__.'config/');
define('__PATH_MODULE_CONFIGS__', __PATH_CONFIGS__.'modules/');
define('__PATH_CRON__', __ROOT_DIR__.'cron/');

define('__PATH_TEMPLATE__', __BASE_URL__ . 'templates/' . $config['template'] . '/');
define('__PATH_TEMPLATE_ROOT__', __ROOT_DIR__ . 'templates/' . $config['template'] . '/');
define('__PATH_TEMPLATE_IMG__', __PATH_TEMPLATE__ . 'img/');
define('__PATH_TEMPLATE_UPL__', __PATH_TEMPLATE_IMG__ . 'upload/');
define('__PATH_TEMPLATE_CSS__', __PATH_TEMPLATE__ . 'css/');
define('__PATH_TEMPLATE_JS__', __PATH_TEMPLATE__ . 'js/');
define('__PATH_TEMPLATE_FONTS__', __PATH_TEMPLATE__ . 'fonts/');



# Load Libraries
if(!@include_once(__PATH_CLASSES__ . 'class.database.php')) throw new Exception('Could not load class (database).');
if(!@include_once(__PATH_CLASSES__ . 'class.password.php')) throw new Exception('Could not load class (password).');
if(!@include_once(__PATH_CLASSES__ . 'class.common.php')) throw new Exception('Could not load class (common).');
if(!@include_once(__PATH_CLASSES__ . 'class.handler.php')) throw new Exception('Could not load class (handler).');
if(!@include_once(__PATH_CLASSES__ . 'class.validator.php')) throw new Exception('Could not load class (validator).');
if(!@include_once(__PATH_CLASSES__ . 'class.login.php')) throw new Exception('Could not load class (login).');
if(!@include_once(__PATH_CLASSES__ . 'class.news.php')) throw new Exception('Could not load class (news).');


if(!@include_once(__PATH_CLASSES__ . 'class.encryption.php')) throw new Exception('Could not load class (encryption).');
if(!@include_once(__PATH_CLASSES__ . 'class.phpmailer.php')) throw new Exception('Could not load class (phpmailer).');
if(!@include_once(__PATH_CLASSES__ . 'class.smtp.php')) throw new Exception('Could not load class (smtp).');

if(!@include_once(__PATH_CLASSES__ . 'class.plugins.php')) throw new Exception('Could not load class (plugins).');

if(!@include_once(__PATH_CLASSES__ . 'class.email.php')) throw new Exception('Could not load class (email).');
if(!@include_once(__PATH_CLASSES__ . 'class.account.php')) throw new Exception('Could not load class (account).');
if(!@include_once(__PATH_CLASSES__ . 'class.cms.php')) throw new Exception('Could not load class (cms).');


# Load Functions
if(!@include_once(__PATH_FUNCTIONS__ . 'function.global.php')) throw new Exception('Could not load function (global).');
if(!@include_once(__PATH_FUNCTIONS__ . 'function.recaptchalib.php')) throw new Exception('Could not load function (recaptchalib).');
if(!@include_once(__PATH_FUNCTIONS__ . 'function.config.php')) throw new Exception('Could not load function (config).');




# MYSQL Connection
$dB1 = new dB($config['MYSQL_DB_HOST'], $config['MYSQL_DB_PORT'], $config['MYSQL_DB_DATABASE'], $config['MYSQL_DB_USER'], $config['MYSQL_DB_PASS'], $config['MYSQL_PDO_DRIVER']);
if($dB1->dead) {
	if(config('error_reporting',true)) {
		throw new Exception($dB1->error);
	} else {
		throw new Exception($dB1->error);
	}
}


# Common Library Instance
$common = new common($dB1);


# Anti-flood System
if($config['flood_check_enable']) {
	if(!check_value($_SESSION['track_timestamp'])) {
		$_SESSION['track_timestamp'] = time();
		$_SESSION['track_actions'] = 0;
	}
	
	if(time() > $_SESSION['track_timestamp']+60) {
		$_SESSION['track_timestamp'] = time();
		$_SESSION['track_actions'] = 0;
	}
	
	if($_SESSION['track_actions'] >= $config['flood_actions_per_minute']) throw new Exception('Flood limit reached, please try again in a moment.');
	
	$_SESSION['track_actions'] += 1;
}

# Load Custom Data
if(!@include_once(__PATH_SYSTEM__.'custom.php')) throw new Exception('Could not load custom data.');

# Load Plugins
if($config['plugins_system_enable']) {
	$PluginsSys = new Plugins();
	if($PluginsSys->gotEnabledPlugins()) {
		$pluginsCACHE = LoadCacheData('plugins.cache');
		$pli = 0;
		foreach($pluginsCACHE as $thisPlugin) {
			if($pli >= 1) {
				$pPath = $PluginsSys->pluginPath($thisPlugin[0]);
				$pFiles = explode("|",$thisPlugin[1]);
				foreach($pFiles as $pFile) {
					if(!@include_once($pPath.$pFile)) throw new Exception('Could not load plugin file ('.$pPath.$pFile.').');
				}
			}
			$pli++;
		}
	}
}

# Handler Instance
$handler = new Handler($dB1);
$handler->loadPage();