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
<h2>Login Settings</h2>
<?php
function saveChanges() {
	global $_POST;
	foreach($_POST as $setting) {
		if(!check_value($setting)) {
			message('error','Missing data (complete all fields).');
			return;
		}
	}
	$xmlPath = __PATH_MODULE_CONFIGS__.'login.xml';
	$xml = simplexml_load_file($xmlPath);
	
	$xml->active = $_POST['setting_1'];
	$xml->enable_session_timeout = $_POST['setting_2'];
	$xml->session_timeout = $_POST['setting_3'];
	$xml->max_login_attempts = $_POST['setting_4'];
	$xml->failed_login_timeout = $_POST['setting_5'];
	
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

loadModuleConfigs('login');
?>
<form action="" method="post">
	<table class="table table-striped table-bordered table-hover module_config_tables">
		<tr>
			<th>Status<br/><span>Enable/disable the login module.</span></th>
			<td>
				<?=enabledisableCheckboxes('setting_1',ranconfig('active'),'Enabled','Disabled'); ?>
			</td>
		</tr>
		<tr>
			<th>Session Timeout<br/><span>Enable/disable sessions timeout.</span></th>
			<td>
				<?=enabledisableCheckboxes('setting_2',ranconfig('enable_session_timeout'),'Enabled','Disabled'); ?>
			</td>
		</tr>
		<tr>
			<th>Session Timeout Limit<br/><span>If session timeout is enabled, define the time (in seconds) after which the inactive session should be logged out automatically.</span></th>
			<td>
				<input class="input-mini" type="text" name="setting_3" value="<?=ranconfig('session_timeout')?>"/> seconds
			</td>
		</tr>
		<tr>
			<th>Maximum Failed Login Attempts<br/><span>Define the maximum failed login attempts before the client's IP address should be temporarily blocked.</span></th>
			<td>
				<input class="input-mini" type="text" name="setting_4" value="<?=ranconfig('max_login_attempts')?>"/>
			</td>
		</tr>
		<tr>
			<th>Failed Login Attempts IP Block Duration<br/><span>Time in minutes of failed login attempts IP block duration.</span></th>
			<td>
				<input class="input-mini" type="text" name="setting_5" value="<?=ranconfig('failed_login_timeout')?>"/> minutes
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit_changes" value="Save Changes" class="btn btn-success"/></td>
		</tr>
	</table>
</form>