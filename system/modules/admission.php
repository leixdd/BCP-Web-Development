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

	echo '<h3>Admission Requirements</h3><hr>';
			
			
				

				echo '
<h1>Entering Freshmen</h1>
	<p>
	A. HS Card (Form 138) Original Copy
	B. Results of the Entrance Exam
	C. 2 pcs. of 2x2 Id Pictures and 2pcs. of 1x1 ID Pictures
	D. NSO birth certificate (Xerox Copy)
	</p>

<h1>Transfer Students</h1>
	<p> 
	A. Transer credential (Honorable dismissal)
	B. Certification of grades duly signed by the Registrar (TOR)
	C. 2 copies of 2 x 2 and 1 x 1 ID pictures
	D. NSO birth certificate (Xerox Copy)
	</p>

<h1>Degree Holders</h1>
	<p>
	A. original Copy of TOR
	B. 2 x 2 ID pictures and 1 x 1 
	</p>
';

			
			echo '</div>

			</div>

								</div>
							</div>
						</div>
						';
						echo '</div>';
if(!@include_once(__PATH_MODULES__. 'blanko.php')) throw new Exception ('Could not load the side file.');

				echo '</div>
			</div>
		</section>';
			
		
	
?>