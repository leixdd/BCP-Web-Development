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

function template_studentcp() {
	global $tSettings;

	$viewinfo = new common();

	$accountInfo = $viewinfo->accountInformation($_SESSION['userid']);

	//var_dump($accountInfo);

	if ($accountInfo) {

		if (!$accountInfo['UserImg']) {
			echo '<center><img src="'.__PATH_TEMPLATE__.'images/no-images.png" class="img-thumbnail" alt="No Images" width="150" height="300">';
		} else {
			echo '<center><img src="'.__PATH_TEMPLATE__.'images/student/'.$accountInfo['UserImg'].'" class="img-thumbnail" alt="No Images" width="150" height="300">';
		}
		
		echo '<br />';
		echo 'Hi. <b>'.$accountInfo['UserLName'].'</b>';


		echo '<br /><br /><br />';
		echo '<a href="'.__BASE_URL__.'/logout" class="btn btn-danger"> Logout </a>';
		echo '</center>';

		
	}
	//
}
function template_displayLogin()
{
	global $tSettings;
		if(check_value($_POST['submit']))
		{
			$userLogin = new login();
			$userLogin->validateLogin($_POST['username'],$_POST['password']);
		}
		else
		{
			echo '<form class="form" method="POST">
					<fieldset>
						<div class="form-group">
							<label class="control-label" for="username">'.lang('login_txt_1',true).'</label>
							<div class="controls">
								<input class="form-control" type="text" id="username" name="username" placeholder="Username"  maxlength="15" autofocus="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label" for="password">'.lang('login_txt_2',true).'</label>
								<input class="form-control" type="password" id="password" name="password"placeholder="Password" required="">
						</div>
						<div class="controls">
						<button type="submit" name="submit" class="btn btn-success"> Login </button>
						</div>
					</fieldset>
					</form>';
		}
		
}