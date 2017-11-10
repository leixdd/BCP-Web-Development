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

class common {
	
	protected $_encryptionHash;
	protected $_md5Enabled;
	//protected $_serverFiles = 'Neo';
	
	function __construct(dB $db1=null) {
		
		$this->db1 = $db1;
		
		
		$this->_encryptionHash = config('encryption_hash',true);
		$this->_md5Enabled = config('MYSQL_ENABLE_MD5', true);
	}

	public function emailExists($email) {
		if(!Validator::Email($email)) return;
		$result = $this->db3->query_fetch_single("SELECT * FROM UserInfo WHERE UserEmail = ?", array($email));
		if(is_array($result)) return true;
		return;
	}
	public function CRYPTMD5($a){
        return strtoupper(substr(md5($a),0,19));
    }

	public function userExists($username) {
		
		if(!Validator::Number($username)) return;

		$result = $this->db1->query_fetch_single("SELECT * FROM userinfo WHERE UserID = ? AND Status = 1", array($username));
		
		if(is_array($result)) return true;
		return;
	}

	public function validateUser($username,$password) {
		if(!Validator::Number($username)) return;
		if(!Validator::PasswordLength($password)) return;
		if($this->_md5Enabled) {
			$password = $this->CRYPTMD5($password);
		}

		$data = array(
			'userid' => $username,
			'password' => $password
		);

		//echo $data[1];
		if($this->_md5Enabled) {
			
			$query = "SELECT * FROM userinfo WHERE UserID = :userid AND UserPass = :password";
		} else {
			$query = "SELECT * FROM userinfo WHERE UserID = :userid AND UserPass = :password";
		}
		
		$result = $this->db1->query_fetch_single($query, $data);

		if(is_array($result)) return true;
		return false;
	}

	public function retrieveUserID($username) {
		if(!Validator::Number($username)) return;
		$result = $this->db1->query_fetch_single("SELECT UserNum FROM userinfo WHERE UserID = ?", array($username));
		if(is_array($result)) return $result['UserNum'];
		return;
	}

	public function retrieveUserIDbyEmail($email) {
		if(!$this->emailExists($email)) return;
		$result = $this->db1->query_fetch_single("SELECT UserNum FROM userinfo WHERE UserEmail = ?", array($email));
		if(is_array($result)) return $result['UserNum'];
		return;
	}

	public function accountInformation($id) {
		global $dB1;
		if(!Validator::Number($id)) return;
		
		$result = $dB1->query_fetch_single("SELECT * FROM userinfo WHERE UserNum = ?", array($id));
		
		if(is_array($result)) return $result;
		return;
	}

	public function changePassword($id,$username,$new_password) {
		if(!Validator::UnsignedNumber($id)) return;
		if(!Validator::UsernameLength($username)) return;
		if(!Validator::AlphaNumeric($username)) return;
		if(!Validator::PasswordLength($new_password)) return;
		
		if($this->_md5Enabled) {
			$new_password = $this->CRYPTMD5($new_password);
			$data = array('userid' => $id, 'username' => $username, 'password' => $new_password);
			$query = "UPDATE UserInfo SET UserPass = :password WHERE UserNum = :userid";
		} else {
			$data = array('userid' => $id, 'password' => $new_password);
			$query = "UPDATE UserInfo SET UserPass = :password WHERE UserNum = :userid";
		}

		$result = $this->db3->query($query, $data);
		if($result) return true;
		return;
	}

	public function addPasswordChangeRequest($userid,$new_password,$auth_code) {
		if(!check_value($userid)) return;
		if(!check_value($new_password)) return;
		if(!check_value($auth_code)) return;
		if(!Validator::PasswordLength($new_password)) return;
		
		$data = array(
			$userid,
			Encode($new_password),
			$auth_code,
			time()
		);
		
		$query = "INSERT INTO ChangePass (user_id,new_password,auth_code,request_date) VALUES (?, ?, ?, ?)";
		$result = $this->db1->query($query, $data);
		if($result) return true;
		return;
	}

	public function hasActivePasswordChangeRequest($userid) {
		if(!check_value($userid)) return;
		
		$result = $this->db1->query_fetch_single("SELECT * FROM ChangePass WHERE user_id = ?", array($userid));
		if(!is_array($result)) return;
		
		$configs = loadConfigurations('usercp.mypassword');
		if(!is_array($configs)) return;
		
		$request_timeout = $configs['change_password_request_timeout'] * 3600;
		$request_date = $result['request_date'] + $request_timeout;
		if(time() < $request_date) return true;
		
		$this->removePasswordChangeRequest($userid);
		return;
	}

	public function removePasswordChangeRequest($userid) {
		$result = $this->db1->query("DELETE FROM ChangePass WHERE user_id = ?", array($userid));
		if($result) return true;
		return;
	}

	public function generatePasswordChangeVerificationURL($user_id,$auth_code) {
		$build_url = __BASE_URL__;
		$build_url .= 'verifyemail/';
		$build_url .= '?op='; // operation
		$build_url .= Encode_id(1);
		$build_url .= '&uid=';
		$build_url .= Encode_id($user_id);
		$build_url .= '&ac=';
		$build_url .= Encode_id($auth_code);
		return $build_url;
	}

	

	/*public function retrieveAccountIPs($username) {
		if(!check_value($username)) return;
		if(!$this->userExists($username)) return;
		switch($this->_serverFiles) {
			case 'MUE':
				$result = $this->db1->query_fetch("SELECT "._CLMN_LOGEX_IP_." FROM "._TBL_LOGEX_." WHERE "._CLMN_LOGEX_ACCID_." = ? GROUP BY "._CLMN_LOGEX_IP_."", array($username));
				if(is_array($result)) return $result;
				return;
			default:
				return;
		}
	}*/

	public function generateAccountRecoveryCode($userid,$username) {
		if(!check_value($userid)) return;
		if(!check_value($username)) return;
		return md5($userid . $username . $this->_encryptionHash . date("m-d-Y"));
	}
	
	
	public function isIpBlocked($ip) {
		if(!Validator::Ip($ip)) return true; // automatically block ip if invalid
		$result = $this->db1->query_fetch_single("SELECT * FROM Blocked_IP WHERE block_ip = ?", array($ip));
		if(is_array($result)) return true;
		return;
	}

	public function blockIpAddress($ip,$user) {
		if(!check_value($user)) return;
		if(!Validator::Ip($ip)) return;
		if($this->isIpBlocked($ip)) return;
		$result = $this->db1->query("INSERT INTO Blocked_IP (block_ip,block_by,block_date) VALUES (?,?,?)", array($ip,$user,time()));
		if($result) return true;
	}

	public function retrieveBlockedIPs() {
		return $this->db1->query_fetch("SELECT * FROM Blocked_IP ORDER BY id DESC");
	}

	public function unblockIpAddress($id) {
		if(!check_value($id)) return;
		$result = $this->db1->query("DELETE FROM Blocked_IP WHERE id = ?", array($id));
		if($result) return true;
		return;
	}
	
	public function updateEmail($userid, $newemail) {
		if(!Validator::UnsignedNumber($userid)) return;
		if(!Validator::Email($newemail)) return;
		$result = $this->db1->query("UPDATE UserInfo SET UserEmail = ? WHERE UserNum = ?", array($newemail, $userid));
		if($result) return true;
		return;
	}

	public function course($code=0) {
		global $custom;
		$course = $custom['course'][$code][0];
		return $course;
	}

	public function contact($name,$email,$message,$subject){
		
		if(!check_value($name)) return;
		if(!check_value($email)) return;
		if(!check_value($message)) return;
		if(!Validator::Alpha($name)) throw new Exception('Invalid Name.');
		if(!Validator::Email($email)) throw new Exception('Invalid Email.');

		$result = $this->db1->query("INSERT INTO contact_email (email_name,email_email,email_subject,email_message,email_time) VALUES (?,?,?,?,?)", array($name,$email,$subject,$message,time()));
		if($result) return true;

	}
}