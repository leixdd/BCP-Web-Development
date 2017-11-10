<?php
/**
 * https://www.facebook.com/Parad0x25
 * 
 * @version 1.0.0
 * @author Dev Glenox <025glenox025@gmail.com>
 * @copyright (c) 2017, Dev Glenox Free BCP Panel
 * @license https://www.facebook.com/Parad0x25
 * @build 7/3/2017
 */




echo '<div class="col-md-3">
		 <div class="sidebar">
			<div class="widget-main">';

			//if(ranconfig('active')) {

				$News = new News();
				$loadNews = LoadCacheData('news.cache');


				echo '<h4>Latest News</h4>';
				echo '<hr>';
				echo '<ul>';
				//
		if(is_array($loadNews)) {

				$nid = 0;
					foreach($loadNews as $thisNews) {
						if($nid >= 1) {
							//if($nid <= ranconfig('news_list_limit')) {
								$news_id = $thisNews[0];
								$news_title = $thisNews[1];
								$news_author = $thisNews[2];
								$news_date = $thisNews[3];
								$news_comments = $thisNews[4];
								$news_status = $thisNews[5];

								//var_dump($news_status);

								$news_url = __BASE_URL__.'news/'.Encode_id($news_id).'/';

								$loadNewsCache = $News->LoadCachedNews($news_id);


								if(check_value($loadNewsCache)) {
									//if($nid <= ranconfig('news_expanded')) {
										if ($news_status==0) {
												
													echo '<h5 class="event-small-title"><a href="'.$news_url.'" class="subject">'.$news_title.'</a></h5>';
													echo '<hr>';
													echo '</ul></div>';
										}
													
									//} 
								}
							//}
						}
						$nid++;
					}
		}
                      
			//} else {
			//	message('error', lang('error_47',true));
			//}

echo '		</div>
		</div>	
	   </div>';