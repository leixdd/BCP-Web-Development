<?php


class Password {
	
	public function cPasswordProcess($userid, $pincode, $password,$new_password, $confirm_new_password) {
		global $dB3;
		if(!Validator::Number($userid)) { $error = true; }
		if(!$error) {

			if(!Validator::PasswordLength($new_password)) { 
				message('error', lang('error_62',true)); 
			} else {
				if($new_password != $confirm_new_password) { 
					message('error', lang('error_63',true)); 
				} else {
					$accountInfo = $this->GetAccount($userid);

						$password = $this->CRYPTMD5($password);
						$new_password = $this->CRYPTMD5($new_password);
						$pincode = $this->CRYPTMD5($pincode);

				
							if ($accountInfo['UserPass']==$password){
								if ($accountInfo['UserPass2']==$pincode){


										$this->ChangePassword($userid,$new_password);
										message('success', lang('success_2',true));
									} else {
			
										message('error', lang('error_60',true));
								}
							} else {
									message('error', lang('error_61',true));
							}
					} 	
				}
			} else {
				// unknown error
				message('error', lang('error_23',true));
			}

			
		
	}

	private function GetAccount($id) {
		global $dB3;
		if(!Validator::Number($id)) return;
		$result = $dB3->query_fetch_single("SELECT * FROM UserInfo WHERE UserNum = ?", array($id));
		if(is_array($result)) return $result;
		return;
	}
	private function CRYPTMD5($a){
        return strtoupper(substr(md5($a),0,19));
    }

    private function ChangePassword($userid,$userpass) {
		global $dB3;
		if(!Validator::Number($userid)) return;
		if(!Validator::AlphaNumeric($userpass)) return;

		$result = $dB3->query("UPDATE UserInfo SET UserPass = ? WHERE UserNum = ?", array($userpass, $userid));
		
		if($result) return true;
		return;
	}
	
}

?>