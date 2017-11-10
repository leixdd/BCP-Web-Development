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

(!isLoggedIn()) ? redirect(1,'login') : null;

	echo '<section class="blog">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						';
	echo '<div class="blog-grid">
							<div class="row">
								<div class="col-md-12">
									<div class="post-item">';
						echo '<div class="text">';
	echo '<div class="widget-item">';
	echo '<h2 class="welcome-text">Student Information</h2><hr>';
		if(ranconfig('active')) {

			// Retrieve Account Information
			$accountInfo = $common->accountInformation($_SESSION['userid']);

			if($accountInfo) {
				

				/* account status */
				if($accountInfo['UserBlock'] == 1) {
					$accountStatus = '<span class="blocked">'.lang('myaccount_txt_8',true).'</span>';
				} else {
					$accountStatus = '<span class="active">'.lang('myaccount_txt_7',true).'</span>';
				}
				if($accountInfo['UserStatus'] != 0) {
					$UserStat = '<span class="label label-danger">Irregular</span>';
				} else {
					$UserStat = '<span class="label label-primary">Regular</span>';
				}

				$Meron = ($accountInfo['UserContactNum'])? ''.$accountInfo['UserContactNum'].'' : '<p>Not Set</p>';
				//var_dump($accountInfo['UserCourse']);
				$course = $common->course($accountInfo['UserCourse']);

				echo '<table class="table table-hover"><thead></thead>';
				echo '<tbody>';
					echo '<tr>';
						echo '<td>Student ID</td>';
						echo '<td>'.$accountInfo['UserID'].'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>First Name</td>';
						echo '<td>'.$accountInfo['UserFName'].'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>Last Name</td>';
						echo '<td>'.$accountInfo['UserLName'].'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>Contact #</td>';
						echo '<td>'.$Meron.'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>Email</td>';
						echo '<td>'.$accountInfo['UserEmail'].' (<a href="'.__BASE_URL__.'student/myemail/">Change Email</a>)</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>Password</td>';
						echo '<td>********** (<a href="'.__BASE_URL__.'student/mypassword/">Change Password</a>)</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>Course</td>';
						echo '<td>'.$course.'</td>';
					echo '</tr>';
					echo '<tr>';
						echo '<td>Status</td>';
						echo '<td>'.$UserStat.'</td>';
					echo '</tr>';


					
			} else {
				message('error', lang('error_12',true));
			}
		} else {
			message('error', lang('error_47',true));
		}
	echo '</tbody></table></div>';

	echo '</div>

			</div>

								</div>
							</div>
						</div>
						';
	echo '</div>
				</div>
			</div>
		</section>';