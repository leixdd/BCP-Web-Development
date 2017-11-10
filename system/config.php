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
 * General Settings
 */
$config['system_active'] = true;
$config['error_reporting'] = false;
$config['website_template'] = 'bcp'; // default
$config['encryption_hash'] = 'jgkajGHJ2345mkld'; //encyption 16 hash only
$config['maintenance_page'] = 'maintenance/index.php';

/**
 * Administrators
 * account => access level
 */
$config['admins'] = array(
	//Administrators
	'15017900' => 100,
	'15016403' => 100,
	//Faculty

	
	
);

/**
 * Admincp Modules Access level
 * module => access level
 */
$config['admincp_modules_access'] = array(
	'addnews' => 50,
	'managenews' => 100,
	// CMS Start //
	'profile' => 100,
	'history' => 100,
	'goalobj' => 100,
	// CMS End //
	'searchaccount' => 50,
	'accountsfromip' => 100,
	'onlineaccounts' => 50,
	'modules_manager' => 100,
	'plugins' => 100,
	'plugin_install' => 100,
);

/**
 * Website Title and Modules
 */
$config['website_title'] = "Bestlink College of the Philippines";
$config['website_footer_copyright'] = 'Copyright &copy;2017, GlenSoft. All rights reserved.';
$config['website_meta_description'] = 'Bestlink College of the Philippines';
$config['website_meta_keywords'] = 'college, business, course, education, event, classes, e-learning, instructor, lessons, Online Learning, school, studying, teaching, tutoring, university';
$config['website_forum_link'] = 'https://facebook.com/Parad0x25';
$config['website_title_alt'] = 'BCP - '; // for sub-pages
$config['website_page_titles'] = array(
	'admission' => 'Admission requirements',
	'ep' => 'Enrollment Procedures',
	
);

/**
 * MYSQL Connection Details
 */
$config['MYSQL_DB_HOST'] = "localhost";
$config['MYSQL_DB_DATABASE'] = 'bcp_db';
$config['MYSQL_DB_USER'] = 'root';
$config['MYSQL_DB_PASS'] = '';
$config['MYSQL_DB_PORT'] = '3306';
$config['MYSQL_PDO_DRIVER'] = 2;
$config['MYSQL_ENABLE_MD5'] = true;

/**
 * Language System
 */
$config['language_switch_active'] = false;
$config['language_default'] = 'en';

/**
 * Plugin System
 */
$config['plugins_system_enable'] = true;

/**
 * Anti-flood System (basic)
 */
$config['flood_check_enable'] = true;
$config['flood_actions_per_minute'] = 30; // lower = more strict