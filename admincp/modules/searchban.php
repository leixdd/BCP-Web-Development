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
<h1 class="page-header">Search Ban</h1>
<form class="form-inline" role="form" method="post">
	<div class="form-group">
		<input type="text" class="form-control" id="input_1" name="search_request" placeholder="Account username"/>
	</div>
	<button type="submit" class="btn btn-primary" name="search_ban" value="ok">Search</button>
</form>
<br />
<?php
	if(check_value($_POST['search_request'])) {
		try {
			$search = $dB->query_fetch("SELECT TOP 25 * FROM WEBENGINE_BAN_LOG WHERE account_id LIKE '%".$_POST['search_request']."%'");
			if(is_array($search)) {
				echo '<div class="row">';
				echo '<div class="col-md-12">';
				echo '<table class="table table-striped table-condensed table-hover">';
					echo '<thead>';
						echo '<tr>';
							echo '<th colspan="6">Search Results for <span style="color:red;"><i>'.$_POST['search_request'].'</i></span></th>';
						echo '</tr>';
					echo '</thead>';
					echo '<thead>';
						echo '<tr>';
							echo '<th>Account</th>';
							echo '<th>Banned By</th>';
							echo '<th>Type</th>';
							echo '<th>Date</th>';
							echo '<th>Days</th>';
							echo '<th></th>';
						echo '</tr>';
					echo '</thead>';
					echo '<tbody>';
					foreach($search as $ban) {
						$banType = ($ban['ban_type'] == "temporal" ? '<span class="label label-default">Temporal</span>' : '<span class="label label-danger">Permanent</span>');
						echo '<tr>';
							echo '<td><a href="'.admincp_base("accountinfo&id=".$common->retrieveUserID($ban['account_id'])).'">'.$ban['account_id'].'</a></td>';
							echo '<td><a href="'.admincp_base("accountinfo&id=".$common->retrieveUserID($ban['banned_by'])).'">'.$ban['banned_by'].'</a></td>';
							echo '<td>'.$banType.'</td>';
							echo '<td>'.date("Y-m-d H:i", $ban['ban_date']).'</td>';
							echo '<td>'.$ban['ban_days'].'</td>';
							echo '<td style="text-align:right;"><a href="#" class="btn btn-default btn-xs" title="'.$ban['ban_reason'].'">Reason</a> <a href="index.php?module=latestbans&liftban='.$ban['id'].'" class="btn btn-danger btn-xs">Lift Ban</a></td>';
						echo '</tr>';
					}
					echo '</tbody>';
				echo '</table>';
				echo '</div>';
				echo '</div>';
			} else {
				throw new Exception("No results found.");
			}
		} catch(Exception $ex) {
			message('error', $ex->getMessage());
		}
	}
?>

