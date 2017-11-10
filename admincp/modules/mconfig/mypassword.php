<?php
/**
 * Ran Panel
 * http://glen-soft.net/
 * 
 * @version 1.0.0
 * @author Dev Glenox <025glenox025@gmail.com>
 * @copyright (c) 2016, Dev Glenox Free Ran Panel
 * @license http://glen-soft.net/license.html
 * @build 9/21/2016
 */
?>
<h2>Change Password Settings</h2>
<?php
function saveChanges() {
	global $_POST;
	foreach($_POST as $setting) {
		if(!check_value($setting)) {
			message('error','Missing data (complete all fields).');
			return;
		}
	}
	$xmlPath = __PATH_MODULE_CONFIGS__.'usercp.mypassword.xml';
	$xml = simplexml_load_file($xmlPath);
	
	$xml->active = $_POST['setting_1'];
	$xml->change_password_email_verification = $_POST['setting_2'];
	$xml->change_password_request_timeout = $_POST['setting_3'];
	
	$save = $xml->asXML($xmlPath);
	if($save) {
		message('success','Settings successfully saved.');
	} else {
		message('error','There has been an error while saving changes.');
	}
}

if(check_value($_POST['submit_changes'])) {
	saveChanges();
}

loadModuleConfigs('usercp.mypassword');
?>
<form action="" method="post">
	<table class="table table-striped table-bordered table-hover module_config_tables">
		<tr>
			<th>Status<br/><span>Enable/disable the change password module.</span></th>
			<td>
				<?=enabledisableCheckboxes('setting_1',ranconfig('active'),'Enabled','Disabled'); ?>
			</td>
		</tr>
		<tr>
			<th>Email Verification<br/><span>If enabled, the account's password will not be changed until the user clicks the verification link sent via email.</span></th>
			<td>
				<?=enabledisableCheckboxes('setting_2',ranconfig('change_password_email_verification'),'Enabled','Disabled'); ?>
			</td>
		</tr>
		<tr>
			<th>Change Password Time Limit<br/><span>If email verification is enabled, set the time that the verification link will stay valid.</span></th>
			<td>
				<input class="input-small" type="text" name="setting_3" value="<?=ranconfig('change_password_request_timeout')?>"/> hour(s)
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit_changes" value="Save Changes" class="btn btn-success"/></td>
		</tr>
	</table>
</form>