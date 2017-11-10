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

class login {

	function isLoggedIN() {
		global $_SESSION,$dB1;
		if($_SESSION['valid'] == true) {
			if(check_value($_SESSION['userid']) && check_value($_SESSION['username'])) {
				
				if($this->checkActiveSession($_SESSION['userid'],session_id())) {
					$this->updateActiveSessionTime($_SESSION['userid']);
				} else {
					$this->logout();
					return;
				}
				
				if(ranconfig('enable_session_timeout')) {
					if($this->isSessionActive($_SESSION['timeout'])) {
						$_SESSION['timeout'] = time();
						return true;
					} else {
						$this->logout();
						return;
					}
				} else {
					return true;
				}
			}
		}
	}
	
	function validateLogin($username,$password) {
		global $common,$_SERVER;
		if(check_value($username) && check_value($password)) {
			if($this->canLogin($_SERVER['REMOTE_ADDR'])) {
				if($common->userExists($username)) {
					if($common->validateUser($username,$password)) {
					
						$this->removeFailedLogins($_SERVER['REMOTE_ADDR']);
						session_regenerate_id();
						$_SESSION['valid'] = true;
						$_SESSION['timeout'] = time();
						$_SESSION['userid'] = $common->retrieveUserID($username);
						$_SESSION['username'] = $username;
						
						// ACTIVE SESSIONS
						$this->deleteActiveSession($_SESSION['userid']);
						$this->addActiveSession($_SESSION['userid'],$_SERVER['REMOTE_ADDR']);
						
						if(check_value($_SESSION['login_last_location'])) {
							redirect(1,$_SESSION['login_last_location']);
						} else {
							redirect(1,'student/info/');
						}
						
					} else {
						// invalid password
						$this->addFailedLogin($username,$_SERVER['REMOTE_ADDR']);
						message('error', lang('error_1',true));
						message('warning', $this->checkFailedLogins($_SERVER['REMOTE_ADDR']) . lang('warning_1b',true) . ranconfig('max_login_attempts'), lang('warning_1a',true));
					}
				} else {
					// invalid username
					message('error', lang('error_2',true));
				}
			} else {
				// user is timed out
				message('error', lang('error_3',true));
			}
		} else {
			// user didn't complete a field
			message('error', lang('error_4',true));
		}
	}
	
	function canLogin($ipaddress) {
		global $dB1,$common;
		if(Validator::Ip($ipaddress)) {
			$fl = $this->checkFailedLogins($ipaddress);
			if($fl >= ranconfig('max_login_attempts')) {
				$result = $dB1->query_fetch_single("SELECT * FROM Login WHERE ip_address = '$ipaddress' ORDER BY id DESC");
				if(is_array($result)) {
					if(time() > $result['unlock_timestamp']) {
						$this->removeFailedLogins($ipaddress);
						return true;
					} else {
						return false;
					}
				} else {
					return true;
				}
			} else {
				return true;
			}
		} else {
			return false;
		}
	}
	
	function checkFailedLogins($ipaddress) {
		global $dB1;
		if(Validator::Ip($ipaddress)) {
			$result = $dB1->query_fetch_single("SELECT * FROM Login WHERE ip_address = '$ipaddress' ORDER BY id DESC");
			
			if(is_array($result)) {
				return $result['failed_attempts'];
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function addFailedLogin($username,$ipaddress) {
		global $dB1,$common,$config;
		
		if(!Validator::Number($username)) { $error = true; }
		if(!Validator::Ip($ipaddress)) { $error = true; }
		if(!$common->userExists($username)) { $error = true; }
		if(!$error) {
		
			$n = $this->checkFailedLogins($ipaddress);
			$timeout = time() + ranconfig('failed_login_timeout') * 60;
			
			if(!$n) {
				$data = array($username, $ipaddress, 0, 1, time());

				$dB1->query("INSERT INTO login (userid, ip_address, unlock_timestamp, failed_attempts, timestamp) VALUES (?, ?, ?, ?, ?)", $data);
			} else {
			
				$new_n = $n + 1;
				
				if($new_n >= ranconfig('max_login_attempts')) {
					$dB1->query("UPDATE login SET userid = '$username', ip_address = '$ipaddress', failed_attempts = '$new_n', unlock_timestamp = '$timeout', timestamp = '".time()."' WHERE ip_address = '$ipaddress'");
				} else {
					$dB1->query("UPDATE login SET userid = '$username', ip_address = '$ipaddress', failed_attempts = '$new_n', timestamp = '".time()."' WHERE ip_address = '$ipaddress'");
				}
			}
		}
	
	}
	
	function removeFailedLogins($ipaddress) {
		global $dB1;
		if(Validator::Ip($ipaddress)) {
			$dB1->query("DELETE FROM login WHERE ip_address = '$ipaddress'");
		}
	}
	
	function isSessionActive($session_timeout) {
		if(check_value($session_timeout)) {
			$offset = time() - $session_timeout;
			if($offset < ranconfig('session_timeout')) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function logout() {
		$_SESSION = array();
		session_destroy();
		redirect();
	}
	
	private function deleteActiveSession($userid) {
		global $dB1;
		$delete = $dB1->query("DELETE FROM activesessions WHERE session_user_id = ?", array($userid));
	}
	
	private function addActiveSession($userid,$ipaddress) {
		global $dB1;
		
		
			//$data = ;
			$add = $dB1->query("INSERT INTO activesessions (session_user_id,session_id,session_ip,session_time) VALUES (?, ?, ?, ?)", array($userid, session_id(), $ipaddress, time()));
		
		//throw new Exception($data);
		if($add) {
			return true;
		}
		
			
	}
	
	private function checkActiveSession($userid,$session_id) {
		global $dB1;
		$check = $dB1->query_fetch_single("SELECT * FROM activesessions WHERE session_user_id = ? AND session_id = ?", array($userid,$session_id));
		if($check && is_array($check)) {
			return true;
		}
	}
	
	private function updateActiveSessionTime($userid) {
		global $dB1;
		$update = $dB1->query("UPDATE activesessions SET session_time = ? WHERE session_user_id = ?", array(time(),$userid));
		if($update) {
			return true;
		}
	}

}