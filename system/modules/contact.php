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
?>
<section class="contact">
	<div class="container">
						
<?php
		if(ranconfig('active')) {

			if(check_value($_POST['submit'])) {

						try{


							if(ranconfig('contact_enable_recaptcha')) {
								//$resp = recaptcha_check_answer(ranconfig('contact_recaptcha_public_key'),$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);
								$resp = $_POST['g-recaptcha-response'];
								$secretKey = ranconfig('contact_recaptcha_private_key');
								$request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$resp);
								
								$obj = json_decode($request);

								//var_dump($obj);
								if(!$obj->success == true) throw new Exception(lang('error_18',true));
							}

							//var_dump($common);
							$result = $common->contact($_POST['name'],$_POST['email'],$_POST['message'],ranconfig('contact_subject'));
							

							if($result){
								 message('success', lang('success_2',true));
							} else {
								 message('error', lang('error_50',true));
								//var_dump($result);
							}
							
						} catch (Exception $ex) {
							message('error', $ex->getMessage());
							
						}
				
				 //var_dump($_POST['name'],$_POST['email'],$_POST['subject'],$_POST['message']);
				
			}
							echo '<div class="row">';
							echo '<div class="col-md-12">';
								echo '<div class="heading-normal">';
									echo '<h2>Contact Form</h2>';
									echo '<p>Fill up the form below to contact us and send us an email</p>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
						echo '<div class="row">';

					echo '<div class="col-md-8">';
						echo '<form action="" class="form-horizontal cform-1" method="post">';
							echo '<div class="form-group">';
								echo '<div class="col-sm-12">';
									echo '<input type="text" class="form-control" placeholder="Name" name="name">';
								echo '</div>';
							echo '</div>';
							echo '<div class="form-group">';
								echo '<div class="col-sm-12">';
									echo '<input type="email" class="form-control" placeholder="Email" name="email">';
								echo '</div>';
							echo '</div>';		                           
							echo '<div class="form-group">';
								echo '<div class="col-sm-12">';
									echo '<textarea name="message" class="form-control" cols="30" rows="13" placeholder="Your Message"></textarea>';
								echo '</div>';
							echo '</div>';	
							echo '<div class="form-group">';
								echo '<div class="col-sm-12">';
								//var_dump(ranconfig('contact_recaptcha_public_key'));
									if(ranconfig('contact_enable_recaptcha')) {
										//echo '<div style="padding-left: 30px;">'. recaptcha_get_html(ranconfig('contact_recaptcha_public_key')) .'</div>';
										echo '<div class="g-recaptcha" data-sitekey="'.ranconfig('contact_recaptcha_public_key').'"></div>';

									}	
								echo '</div>';
							echo '</div>';							
							echo '<div class="form-group">';
								echo '<div class="col-sm-12">';
									echo '<input type="submit" value="Submit Message" class="btn btn-success" name="submit" value="submit">';
								echo '</div>';
							echo '</div>';
							
						echo '</form>';
					echo '</div>';
			} else {
				echo '<div class="row">';
					echo '<div class="col-md-8">';
						message('error', lang('error_47',true));
					echo '</div>';

			}
					

?>
					<div class="col-md-4">
						<div class="item">
							<div class="icon">
								<i class="fa fa-map"></i>
							</div>
							<div class="text">
								<h3>Address</h3>
								<p>
									#1071 Brgy. Kaligayahan Quirino Highway Novaliches, Quezon City
								</p>
							</div>
						</div>
						<div class="item">
							<div class="icon">
								<i class="fa fa-phone"></i>
							</div>
							<div class="text">
								<h3>Phone</h3>
								<ul>
									<li>+63 930 1565</li>
									<li>+417-4355</li>
								</ul>
							</div>
						</div>
						<div class="item">
							<div class="icon">
								<i class="fa fa-envelope"></i>
							</div>
							<div class="text">
								<h3>Email</h3>
								<p>
									bcp-inquire@bcp.edu.ph
								</p>
							</div>
						</div>
					</div>
					
				</div>

				
				<div class="gap-small"></div>
				<div class="gap-small"></div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="heading-normal">
							<h2>Find Us on Map</h2>
						</div>
						<div class="google-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.720831936779!2d121.03929441444653!3d14.728368989721211!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b05657720dfb%3A0x7a7efa0f0a24a9be!2sBestlink+College+of+the+Philippines!5e0!3m2!1sen!2sph!4v1497549122914" width="600" height="450" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Contact End -->