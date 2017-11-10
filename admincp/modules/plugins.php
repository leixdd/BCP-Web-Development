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
<h1 class="page-header">Plugin Manager</h1>
<?php
define('PLUGIN_ALLOW_UNINSTALL',true);
$Plugins = new Plugins();

if(check_value($_REQUEST['enable'])) {
	$Plugins->updatePluginStatus($_REQUEST['enable'],1);
}
if(check_value($_REQUEST['disable'])) {
	$Plugins->updatePluginStatus($_REQUEST['disable'],0);
}
if(check_value($_REQUEST['uninstall'])) {
	$uninstall_plugin = $Plugins->uninstallPlugin($_REQUEST['uninstall']);
	if($uninstall_plugin) {
		message('success','Plugin successfully uninstalled.');
	} else {
		message('error','Could not uninstall plugin.');
	}
	$update_cache = $Plugins->rebuildPluginsCache();
	if(!$update_cache) {
		message('error','Could not update plugins cache data, make sure the file exists and it\'s writable!');
	}
}

$plugins = $Plugins->retrieveInstalledPlugins();
if(is_array($plugins)) {
	echo '<table class="table">';
		echo '<thead>';
			echo '<tr>';
			echo '<th>Name</th>';
			echo '<th>Author</th>';
			echo '<th>Version</th>';
			echo '<th>Compatibility</th>';
			echo '<th>Install Date</th>';
			echo '<th>Status</th>';
			echo '<th>Actions</th>';
			echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach($plugins as $thisPlugin) {
		
			if($thisPlugin['status'] == 1) {
				$status = '<span class="label label-success">enabled</span>';
				$ed = '<a class="btn btn-default btn-xs" href="index.php?module=plugins&disable='.$thisPlugin['id'].'">disable</a>';
			} else {
				$status = '<span class="label label-default">disabled</span>';
				$ed = '<a class="btn btn-success btn-xs" href="index.php?module=plugins&enable='.$thisPlugin['id'].'">enable</a>';
			}
			
			$uninstall = '';
			if(PLUGIN_ALLOW_UNINSTALL) {
				$uninstall = '<a class="btn btn-danger btn-xs" href="index.php?module=plugins&uninstall='.$thisPlugin['id'].'">uninstall</a></td>';
			}
			
			echo '<tr>';
			echo '<td>'.$thisPlugin['name'].'</td>';
			echo '<td>'.$thisPlugin['author'].'</td>';
			echo '<td>'.$thisPlugin['version'].'</td>';
			echo '<td>'.implode(", ",explode("|",$thisPlugin['compatibility'])).'</td>';
			echo '<td>'.date("m/d/Y",$thisPlugin['install_date']).'</td>';
			echo '<td>'.$status.'</td>';
			echo '<td>'.$ed.'  '.$uninstall.'';
			echo '</tr>';
		}
		echo '<tbody>';
	echo '</table>';
} else {
	message('warning','You have not installed any plugin yet.');
}
?>