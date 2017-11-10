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

echo '<div class="row">';
	echo '<div class="col-md-6">';
		echo '<div class="panel panel-primary">';
		echo '<div class="panel-heading">General Information</div>';
		echo '<div class="panel-body">';
			
			echo '<div class="list-group">';
				echo '<a href="https://web.facebook.com/Parad0x25" class="list-group-item" target="_blank">';
					echo '<i class="fa fa-check"></i> BCP-Panel Version';
					echo '<span class="pull-right text-muted small">';
						echo '<em>1.0.0</em>';
					echo '</span>';
				echo '</a>';
			echo '</div>';
			
			echo '<div class="list-group">';
				
				
				// Total student
				$totalAccounts = $dB1->query_fetch_single("SELECT COUNT(*) as result FROM UserInfo WHERE Usertype = 1");
				echo '<div class="list-group-item">';
					echo 'Total Student';
					echo '<span class="pull-right text-muted small">'.number_format($totalAccounts['result']).'</span>';
				echo '</div>';
				
				// Total Banned
				$bannedAccounts = $dB1->query_fetch_single("SELECT COUNT(*) as result FROM UserInfo WHERE UserBlock = 1");
				echo '<div class="list-group-item">';
					echo 'Banned Students';
					echo '<span class="pull-right text-muted small">'.number_format($bannedAccounts['result']).'</span>';
				echo '</div>';

				
				// Plugins Status
				$pluginStatus = (config('plugins_system_enable',true) ? 'Enabled' : 'Disabled');
				echo '<div class="list-group-item">';
					echo 'Plugin System';
					echo '<span class="pull-right text-muted small">'.$pluginStatus.'</span>';
				echo '</div>';
				
				
				// Server Time
				echo '<div class="list-group-item">';
					echo 'Server Time (web)';
					echo '<span class="pull-right text-muted small">'.date("Y-m-d h:i A").'</span>';
				echo '</div>';
				
				
			echo '</div>';
		echo '</div>';
		echo '</div>';
	echo '</div>';
echo '</div>';