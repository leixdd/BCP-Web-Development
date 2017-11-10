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

class Handler {

	private $_dB1;
	
	function __construct(dB $dB1 = null) {
		$this->_dB1 = $dB1;
		

		$this->loadInfo();
	}
	
	public function loadPage() {
		global $config,$lang,$custom,$common,$tSettings;
		
		# object instances
		$handler = $this;
		$dB1 = $this->_dB1;
		
		# load language
		$loadLanguage = (check_value($_SESSION['language_display']) ? $_SESSION['language_display'] : $config['language_default']);
		$loadLanguage = (config('language_switch_active',true) ? $loadLanguage : $config['language_default']);
		if(!$this->languageExists($loadLanguage)) throw new Exception('The chosen language cannot be loaded ('.$loadLanguage.').');
		include(__PATH_LANGUAGES__ . $loadLanguage . '/language.php');
		
		# access
		if(!defined('access') or !access) {
			// blank for APIs
		} else {
			# check if template exists
			if(!$this->templateExists($config['website_template'])) throw new Exception('The chosen template cannot be loaded ('.$config['website_template'].').');
			
			# load template
			include(__PATH_TEMPLATES__ . $config['website_template'] . '/index.php');
			
			# show admincp button
			// if(isLoggedIn() && canAccessAdminCP($_SESSION['username'])) {
			// 	echo '<a href="'.__PATH_ADMINCP_HOME__.'" class="admincp-button">AdminCP</a>';
			// }
		}
	}

	public function loadModule($page = 'news',$subpage = 'home') {
		global $config,$lang,$custom,$common,$mconfig,$tSettings;
		
		$handler = $this;
		$dB1 = $this->_dB1;
		
		$page = $this->cleanRequest($page);
		$subpage = $this->cleanRequest($subpage);
		
		$request = explode("/", $_GET['request']);
		if(is_array($request)) {
			for($i = 0; $i < count($request); $i++) {
				if(check_value($request[$i])) {
					if(check_value($request[$i+1])) {
						$_GET[$request[$i]] = filter_var($request[$i+1], FILTER_SANITIZE_STRING);
					} else {
						$_GET[$request[$i]] = NULL;
					}
				}
				$i++;
			}
		}
		
		if(!check_value($page)) { $page = 'home'; }
		
		if(!check_value($subpage)) {
			if($this->moduleExists($page)) {
				@loadModuleConfigs($page);
				include(__PATH_MODULES__ . $page . '.php');
			} else {
				$this->module404();
			}
		} else {
			// HANDLE PAGE AS DIRECTORY (PATH)
			switch($page) {
				case 'news':
					if($this->moduleExists($page)) {
						@loadModuleConfigs($page);
						include(__PATH_MODULES__ . $page . '.php');
					} else {
						$this->module404();
					}
				break;
				default:
					$path = $page.'/'.$subpage;
					if($this->moduleExists($path)) {
						$cnf = $page.'.'.$subpage;
						@loadModuleConfigs($cnf);
						include(__PATH_MODULES__ . $path . '.php');
					} else {
						$this->module404();
					}
				break;
			}
		}
	
	}

	private function moduleExists($page) {
		if(file_exists(__PATH_MODULES__ . $page . '.php')) return true;
		return false;
	}
	
	private function usercpmoduleExists($page) {
		if(file_exists(__PATH_MODULES_USERCP__ . $page . '.php')) return true;
		return false;
	}
	
	private function templateExists($template) {
		if(file_exists(__PATH_TEMPLATES__ . $template . '/index.php')) return true;
		return false;
	}
	
	private function languageExists($language) {
		if(file_exists(__PATH_LANGUAGES__ . $language . '/language.php')) return true;
		return false;
	}
	
	private function admincpmoduleExists($page) {
		if(file_exists(__PATH_ADMINCP_MODULES__ . $page . '.php')) return true;
		return false;
	}
	
	public function loadAdminCPModule($module='home') {
		global $config,$custom,$common,$handler,$mconfig,$gconfig;
		
		$dB1 = $this->_dB1;
		
		$module = (check_value($module) ? $module : 'home');
		
		if($this->admincpmoduleExists($module)) {
			
			// admin access level
			$adminAccessLevel = config('admins',true);
			$accessLevel = $adminAccessLevel[$_SESSION['username']];
			
			// module access level
			$modulesAccessLevel = config('admincp_modules_access',true);
			if(is_array($modulesAccessLevel)) {
				if(array_key_exists($module, $modulesAccessLevel)) {
					if($accessLevel >= $modulesAccessLevel[$module]) {
						include(__PATH_ADMINCP_MODULES__.$module.'.php');
					} else {
						message('error','You do not have access to this module.');
					}
				} else {
					include(__PATH_ADMINCP_MODULES__.$module.'.php');
				}
			}
		} else {
			message('error','INVALID MODULE');
		}
	}
	
	private function displayTitle() {
		$page_titles = config('website_page_titles',true);
		$page = $_REQUEST['page'];
		if(check_value($page) && check_value($page_titles[$page])) {
			return '<title>'.config('website_title_alt',true).$page_titles[$page].'</title>';
		} else {
			if(check_value(lang('website_title',true))) {
				return '<title>'.lang('website_title',true).'</title>';
			} else {
				return '<title>'.config('website_title',true).'</title>';
			}
		}
	}
	
	public function printHeader() {
		$meta = array(
			'<meta charset="utf-8" />',
			$this->displayTitle(),
			'<meta name="generator" content="FRAMEWORK '.__FRAMEWORK_VERSION__.'" />',
			'<meta name="description" content="'.config('website_meta_description',true).'" />',
			'<meta name="keywords" content="'.config('website_meta_keywords',true).'" />',
			'<link rel="shortcut icon" href="'.__PATH_TEMPLATE__.'favicon.ico" />'
		);
		
		return "\n".implode("\n",$meta);
	}
	
	private function cleanRequest($string) {
		return preg_replace("/[^a-zA-Z0-9\s\/]/", "", $string);
	}
	
	private function module404() {
		redirect();
	}
	
	public function switchLanguage($language) {
		if(!check_value($language)) return;
		if(!$this->languageExists($language)) return;
		
		# set session variable
		$_SESSION['language_display'] = $language;
		
		return true;
	}
	
	private function loadInfo() {
		if(!check_value($_GET['dev'])) return;
		if($_GET['dev'] != "ok") return;
		debug('version: 1.0.0');
		debug('plugins: ' . config('plugins_system_enable', true));
	}
	
	public function Powered() {
		echo ' Designed and Developed by <a href="https://facebook.com/Parad0x25" target="_blank"> GlenSoft Inc. </a>';
	}

}