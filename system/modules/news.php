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

if(ranconfig('active')) {
	echo '<section class="blog">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						
						';
	
	$News = new News();
	$loadNews = LoadCacheData('news.cache');

	if(is_array($loadNews)) {
		$requestedNewsId = $_GET['subpage'];

		if(check_value($requestedNewsId) && $News->newsIdExists(Decode_id($requestedNewsId))) {
			$newsID = Decode_id($requestedNewsId);
			foreach($loadNews as $thisNews) {
				$news_id = $thisNews[0];
				if($news_id == $newsID) {
					$news_title = $thisNews[1];
					$news_author = $thisNews[2];
					$news_date = $thisNews[3];
					$news_comments = $thisNews[4];
					$news_url = __BASE_URL__.'news/'.Encode_id($news_id).'/';

					$loadNewsCache = $News->LoadCachedNews($news_id);
					if(check_value($loadNewsCache)) {
						echo '<div class="blog-grid">
							<div class="row">
								<div class="col-md-12">
									<div class="post-item">'; 
						echo '<div class="text">';
						echo '<h3>'.$news_title.'</h3>';
						echo '<ul class="status">';
						echo '<li><i class="fa fa-user"></i>'.date("F j, Y  - H:i:s",$news_date).'</li>';
						echo '</ul>';
					                          if(ranconfig('news_enable_like_button')) {
					                            echo '<tr><td><div class="fb-like" data-href="'.$news_url.'" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div></td></tr>';
					                          }
					                    echo '<hr>';
					                       
					              
					                echo ''.$loadNewsCache.'';
					     echo '</div>

					     			</div>

								</div>
							</div>
						</div>';
					           
					}
				}
			}

			if($news_comments && ranconfig('news_enable_comment_system')) {
        		echo '<ul class="comment-list">
                  			<center><div class="fb-comments" data-href="'.$news_url.'" data-width="750" data-numposts="10"></div></center>
              				</ul>
              			 
              		';
      }

		}

		else {
			
			echo '<center><table class="table table-hover">
					<thead>
						<tr>
							<th></th>
							<th>SUBJECT</th>
							<th>DATE</th>
						</tr>
					</thead>
					<tbody>';
			$nid = 0;
			foreach($loadNews as $thisNews) {
				if($nid >= 1) {
					if($nid <= ranconfig('news_list_limit')) {
						$news_id = $thisNews[0];
						$news_title = $thisNews[1];
						$news_author = $thisNews[2];
						$news_date = $thisNews[3];
						$news_comments = $thisNews[4];
						$news_status = $thisNews[5];
						$news_url = __BASE_URL__.'news/'.Encode_id($news_id).'/';

						$loadNewsCache = $News->LoadCachedNews($news_id);
						if(check_value($loadNewsCache)) {
							if($nid <= ranconfig('news_expanded')) {
								if ($news_status==0) {
									echo '<tr>
										<td></td>';
										
											echo '<td><a href="'.$news_url.'" class="subject">'.$news_title.'</a></td>
											<td><span class="date">'.date("F j, Y  - H:i:s",$news_date).'</span></td>
											</tr>';
								}
											
							} 
						}
					}
				}
				$nid++;
			}
		echo '</tbody>
		</table></center>';
		}
		
	}
} else {
	message('error', lang('error_47',true));
}

echo '</div>';

				if(!@include_once(__PATH_MODULES__. 'blanko.php')) throw new Exception ('Could not load the side file.');
	


				echo'</div>
			</div>
		</section>';