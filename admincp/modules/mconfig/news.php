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
<h2>News Settings</h2>
<?php
function saveChanges() {
	global $_POST;
	foreach($_POST as $setting) {
		if(!check_value($setting)) {
			message('error','Missing data (complete all fields).');
			return;
		}
	}
	$xmlPath = __PATH_MODULE_CONFIGS__.'news.xml';
	$xml = simplexml_load_file($xmlPath);
	
	$xml->active = $_POST['setting_1'];
	$xml->news_expanded = $_POST['setting_2'];
	$xml->news_list_limit = $_POST['setting_3'];
	$xml->news_enable_comment_system = $_POST['setting_4'];
	$xml->news_enable_like_button = $_POST['setting_5'];
	
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

loadModuleConfigs('news');
?>
<form action="" method="post">
	<table class="table table-striped table-bordered table-hover module_config_tables">
		<tr>
			<th>Status<br/><span>Enable/disable the news module.</span></th>
			<td>
				<?=enabledisableCheckboxes('setting_1',ranconfig('active'),'Enabled','Disabled'); ?>
			</td>
		</tr>
		<tr>
			<th>Expanded News<br/><span>Amount of news you want to display expanded. If less than the display news limit configuration, then the rest of the news will not display expanded.</span></th>
			<td>
				<input class="input-mini" type="text" name="setting_2" value="<?=ranconfig('news_expanded')?>"/>
			</td>
		</tr>
		<tr>
			<th>Shown News Limit<br/><span>Amount of news to display in the news page.</span></th>
			<td>
				<input class="input-mini" type="text" name="setting_3" value="<?=ranconfig('news_list_limit')?>"/>
			</td>
		</tr>
		<tr>
			<th>Comments<br/><span>Enable/disable Facebook's comment system.</span></th>
			<td>
				<?php enabledisableCheckboxes('setting_4',ranconfig('news_enable_comment_system'),'Enabled','Disabled'); ?>
			</td>
		</tr>
		<tr>
			<th>Like and Share<br/><span>Enable/disable Facebook's like and share buttons.</span></th>
			<td>
				<?php enabledisableCheckboxes('setting_5',ranconfig('news_enable_like_button'),'Enabled','Disabled'); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit_changes" value="Save Changes" class="btn btn-success"/></td>
		</tr>
	</table>
</form>