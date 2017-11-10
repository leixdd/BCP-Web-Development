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
	echo '<h3>Goals & Objectives</h3><hr>';
			
			
				$CMS = new Cms();

				$loadCmsCache = $CMS->LoadCachedCms('goalobj');
			
				 echo ''.$loadCmsCache.'';

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