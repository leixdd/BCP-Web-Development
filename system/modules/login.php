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

if(isLoggedIn()) redirect();

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
	
		if(ranconfig('active')) {
			// Login Process
			if(check_value($_POST['submit'])) {
				$userLogin = new login();
				$userLogin->validateLogin($_POST['id'],$_POST['password']);
			}
			echo '';
			echo '<h2 class="welcome-text">Login</h2>';
			echo '<div align="center">
			<form class="form-horizontal" action="" method="post">
				
					<div class="form-group form-group-sm">
						<label class="col-sm-4 control-label" for="formGroupInputSmall">ID Number</label>
						<div class="col-sm-4">
							<input class="form-control" type="text" name="id" maxlength="18" placeholder="ID Number" autofocus/>
						</div>
					</div>
					<br />
					<div class="form-group form-group-sm">
						<label class="col-sm-4 control-label" for="formGroupInputSmall">Password</label>
						<div class="col-sm-4">
							<input class="form-control" type="password" name="password" maxlength="20" placeholder="Password"/>

						<br />
						<span class="input-tip">
							<a href="'.__BASE_URL__.'forgotpassword/">Forgot Password?</a>
						</span>
					</div>
					</div>
					
					<tr>
						<td></td>
						<td><button name="submit" value="submit" class="btn btn-success" ><span class="button-left"><span class="button-right">Login</span></span></button></td>
					</tr>
				
			</form></div>';
			echo '</div>

			</div>

								</div>
							</div>
						</div>
						';
			
		} else {
			message('error', lang('error_47',true));
		}

		echo '</div>
				</div>
			</div>
		</section>';
?>