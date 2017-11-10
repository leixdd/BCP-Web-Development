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

class Account extends common {
	
	
	
	
	
	public function changeEmailAddress($accountId, $newEmail, $ipAddress) {
		if(!check_value($accountId)) throw new Exception(lang('error_21',true));
		if(!check_value($newEmail)) throw new Exception(lang('error_21',true));
		if(!check_value($ipAddress)) throw new Exception(lang('error_21',true));
		if(!Validator::Ip($ipAddress)) throw new Exception(lang('error_21',true));
		if(!Validator::Email($newEmail)) throw new Exception(lang('error_21',true));
		
		# check if email already in use
		if($this->emailExists($newEmail)) throw new Exception(lang('error_11',true));
		
		# account info
		$accountInfo = $this->accountInformation($accountId);
		if(!is_array($accountInfo)) throw new Exception(lang('error_21',true));
		
		$userName = $accountInfo[_CLMN_USERNM_];
		$userEmail = $accountInfo[_CLMN_EMAIL_];
		$requestDate = strtotime(date("m/d/Y 23:59"));
		$key = md5(md5($userName).md5($userEmail).md5($requestDate).md5($newEmail));
		$verificationLink = __BASE_URL__.'verifyemail/?op='.Encode_id(3).'&uid='.Encode_id($accountId).'&email='.$newEmail.'&key='.$key;
		
		# send verification email
		$sendEmail = $this->changeEmailVerificationMail($userName, $userEmail, $newEmail, $verificationLink, $ipAddress);
		if(!$sendEmail) throw new Exception(lang('error_21',true));
	}
	
	public function changeEmailVerificationProcess($encodedId, $newEmail, $encryptedKey) {
		$userId = Decode_id($encodedId);
		if(!Validator::UnsignedNumber($userId)) throw new Exception(lang('error_21',true));
		if(!Validator::Email($newEmail)) throw new Exception(lang('error_21',true));
		
		# check if email already in use
		if($this->emailExists($newEmail)) throw new Exception(lang('error_11',true));
		
		# account info
		$accountInfo = $this->accountInformation($userId);
		if(!is_array($accountInfo)) throw new Exception(lang('error_21',true));
		
		# check key
		$requestDate = strtotime(date("m/d/Y 23:59"));
		$key = md5(md5($accountInfo[_CLMN_USERNM_]).md5($accountInfo[_CLMN_EMAIL_]).md5($requestDate).md5($newEmail));
		if($key != $encryptedKey) throw new Exception(lang('error_21',true));
		
		# change email
		if(!$this->updateEmail($userId, $newEmail)) throw new Exception(lang('error_21',true));
	}
	
	public function verifyRegistrationProcess($username, $key) {
		$verifyKey = $this->db4->query_fetch_single("SELECT * FROM WEBCORE_REGISTER_ACCOUNT WHERE registration_account = ? AND registration_key = ?", array($username,$key));
		if(!is_array($verifyKey)) throw new Exception(lang('error_25',true));
		
		# load registration configs
		$regCfg = loadConfigurations('register');

		$password = Decode($verifyKey['registration_password']);
		
		if($this->_md5Enabled) {
			$password = $this->CRYPTMD5($password);
		}

		# insert data
		$data = array(
			'username' => $verifyKey['registration_account'],
			'password' => $password,
			'email' => $verifyKey['registration_email']
		);
		
		# query
		if($this->_md5Enabled) {
			$query = "INSERT INTO "._TBL_MI_." (UserName, UserID, UserPass, UserPass2, UserEmail) VALUES (:username, :username, :password, :password, :email)";
		} else {
			$query = "INSERT INTO "._TBL_MI_." (UserName, UserID, UserPass, UserPass2, UserEmail) VALUES (:username, :username, :password, :password, :email)";
		}
		
		# create account
		$result = $this->db3->query($query, $data);
		if(!$result) throw new Exception(lang('error_22',true));
		//if(!$result) throw new Exception('1');

		# delete verification request
		$this->deleteRegistrationVerification($username);
		
		# send welcome email
		if($regCfg['send_welcome_email']) {
			$this->sendWelcomeEmail($verifyKey['registration_account'],$verifyKey['registration_email']);
		}
		
		# success message
		message('success', lang('success_1',true));
		
		# redirect to login (5 seconds)
		redirect(2,'login/',5);
	}
	
	private function sendRegistrationVerificationEmail($username, $account_email, $key) {
		$verificationLink = __BASE_URL__.'verifyemail/?op='.Encode_id(2).'&user='.Encode($username).'&key='.$key;
		try {
			$email = new Email();
			$email->setTemplate('WELCOME_EMAIL_VERIFICATION');
			$email->addVariable('{USERNAME}', $username);
			$email->addVariable('{LINK}', $verificationLink);
			$email->addAddress($account_email);
			$email->send();
		} catch (Exception $ex) {}
	}
	
	private function sendWelcomeEmail($username,$address) {
		try {
			$email = new Email();
			$email->setTemplate('WELCOME_EMAIL');
			$email->addVariable('{USERNAME}', $username);
			$email->addAddress($address);
			$email->send();
		} catch (Exception $ex) {
			// do nuthin u.u
		}
	}
	
	private function createRegistrationVerification($username,$password,$email) {
		if(!check_value($username)) return;
		if(!check_value($password)) return;
		if(!check_value($email)) return;
		
		$key = uniqid();
		$data = array(
			$username,
			Encode($password),
			$email,
			time(),
			$_SERVER['REMOTE_ADDR'],
			$key
		);
		
		$query = "INSERT INTO WEBCORE_REGISTER_ACCOUNT (registration_account,registration_password,registration_email,registration_date,registration_ip,registration_key) VALUES (?,?,?,?,?,?)";
		
		$result = $this->db4->query($query, $data);
		if(!$result) return;
		return $key;
	}
	
	private function deleteRegistrationVerification($username) {
		if(!check_value($username)) return;
		$delete = $this->db4->query("DELETE FROM WEBCORE_REGISTER_ACCOUNT WHERE registration_account = ?", array($username));
		if($delete) return true;
		return;
	}

	private function checkUsernameEVS($username) {
		if(!check_value($username)) return;
		$result = $this->db4->query_fetch_single("SELECT * FROM WEBCORE_REGISTER_ACCOUNT WHERE registration_account = ?", array($username));
		
		$configs = loadConfigurations('register');
		if(!is_array($configs)) return;
		
		$timelimit = $result['registration_date']+$configs['verification_timelimit']*60*60;
		if($timelimit > time()) return true;
		
		$this->deleteRegistrationVerification($username);
		return false;
	}

	private function checkEmailEVS($email) {
		if(!check_value($email)) return;
		$result = $this->db4->query_fetch_single("SELECT * FROM WEBCORE_REGISTER_ACCOUNT WHERE registration_email = ?", array($email));
		
		$configs = loadConfigurations('register');
		if(!is_array($configs)) return;
		
		$timelimit = $result['registration_date']+$configs['verification_timelimit']*60*60;
		if($timelimit > time()) return true;
		
		$this->deleteRegistrationVerification($result['registration_account']);
		return false;
	}
	
	private function changeEmailVerificationMail($userName, $emailAddress, $newEmail, $verificationLink, $ipAddress) {
		try {
			$email = new Email();
			$email->setTemplate('CHANGE_EMAIL_VERIFICATION');
			$email->addVariable('{USERNAME}', $userName);
			$email->addVariable('{IP_ADDRESS}', $ipAddress);
			$email->addVariable('{NEW_EMAIL}', $newEmail);
			$email->addVariable('{LINK}', $verificationLink);
			$email->addAddress($emailAddress);
			$email->send();
			
			return true;
		} catch (Exception $ex) {
			return;
		}
	}
	
	private function generateAccountRecoveryLink($userid,$email,$recovery_code) {
		if(!check_value($userid)) return;
		if(!check_value($recovery_code)) return;
		
		$build_url = __BASE_URL__;
		$build_url .= 'forgotpassword/';
		$build_url .= '?ui=';
		$build_url .= Encode($userid);
		$build_url .= '&ue=';
		$build_url .= Encode($email);
		$build_url .= '&key=';
		$build_url .= $recovery_code;
		return $build_url;
	}
	
}