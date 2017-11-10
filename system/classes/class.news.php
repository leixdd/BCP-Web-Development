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

class News {
	function addNews($title,$content,$author='Administrator',$comments=1,$status=0,$venue,$images) {
		global $dB1;
		//var_dump($images);
		$imgurl = $this->imgur($images);
			if(check_value($title) && check_value($content) && check_value($author)) {
			if($this->checkTitle($title)) {
				if($this->checkContent($content)) {
					// make sure comments is 1 or 0
					if($comments < 0 || $comments > 1) {
						$comments = 1;
					}
				
					// collect data
					$news_data = array(
						htmlentities($title),
						$author,
						time(),
						$content,
						$comments,
						$images,
						$venue,
						$status
					);
					// add news
					$add_news = $dB1->query("INSERT INTO news (news_title,news_author,news_date,news_content,allow_comments,news_imagesurl,news_venue,status) VALUES (?,?,?,?,?,?,?,?)", $news_data);
					
					if($add_news) {
						// success message
						message('success', lang('success_15',true));
					} else { message('error', lang('error_23',true));}
				} else { message('error', lang('error_43',true)); }
			} else { message('error', lang('error_42',true)); }
		} else { message('error', lang('error_41',true));}
			//var_dump($imgurl);
	}


	function imgur($image){
			
			$client_id = "c9be617f8094138";


			$url = 'https://api.imgur.com/3/image.json';
			$headers = array("Authorization: Client-ID $client_id");
			$pvars  = array('image' => base64_encode($image));

			$curl = curl_init();

			curl_setopt_array($curl, array(
			   CURLOPT_URL=> $url,
			   CURLOPT_TIMEOUT => 30,
			   CURLOPT_POST => 1,
			   CURLOPT_RETURNTRANSFER => 1,
			   CURLOPT_HTTPHEADER => $headers,
			   CURLOPT_POSTFIELDS => $pvars
			));

			$json_returned = curl_exec($curl); // blank response
			//echo "Result: " . $json_returned ;
			return $json_returned->data->link;

			curl_close ($curl); 


			
	}

	function checkPluginDirectory($name) {
		$name = $this->CRYPTMD5($name);
		if(file_exists($this->uploadPATH($name)) && is_dir($this->uploadPATH($name))) {
			return true;
		} else {
			return false;
		}
	}

	function uploadPATH($name) {
		return __PATH_TEMPLATE_UPL__.$name.'/';
	}

	function CRYPTMD5($a){
        return strtoupper(substr(md5($a),0,10));
    }

	function removeNews($id) {
		global $dB1;
		if(Validator::Number($id)) {
			if($this->newsIdExists($id)) {
				$remove = $dB1->query("DELETE FROM news WHERE news_id = '$id'");
				if($remove) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function editNews($id,$title,$content,$author,$comments,$date,$venue,$status) {
		global $dB1;
		if(check_value($id) && check_value($title) && check_value($content) && check_value($author) && check_value($comments) && check_value($venue) && check_value($date)) {
			if(!$this->newsIdExists($id)) { return false; }
			if($this->checkTitle($title) && $this->checkContent($content)) {
				$editData = array(
					$title,
					$content,
					$author,
					strtotime($date),
					$comments,
					$status,
					$venue,
					$id
				);
				$query = $dB1->query("UPDATE news SET news_title = ?, news_content = ?, news_author = ?, news_date = ?, allow_comments = ?, status = ?, news_venue = ? WHERE news_id = ?", $editData);
				if($query) {
					message('success', 'News successfully edited.');
				} else {
					message('error', 'There was an error while editing the news.');
				}
			}
		}
	}
	
	function checkTitle($title) {
		if(check_value($title)) {
			if(strlen($title) < 4 || strlen($title) > 80) {
				return false;
			} else {
				return true;
			}
		} else {
			return false;
		}
	}
	
	function checkContent($content) {
		if(check_value($content)) {
			if(strlen($content) < 4) {
				return false;
			} else {
				return true;
			}
		} else {
			return false;
		}
	}
	
	function retrieveNews() {
		global $dB1;
		$news = $dB1->query_fetch("SELECT * FROM news ORDER BY news_id DESC");
		if(is_array($news)) {
			return $news;
		} else {
			return null;
		}
	}

	//retrieving 3 top news 
	function rt_topNews(){
		global $dB1;
		$news = $dB1->query_fetch("SELECT * FROM news WHERE status = 0 ORDER BY news_id DESC");
		if(is_array($news)) {
			return $news;
		} else {
			return null;
		}	
	}

	
	function newsIdExists($id) {
		global $dB1;
		if(Validator::Number($id)) {

			$id_exists = $dB1->query_fetch_single("SELECT * FROM news WHERE news_id = '$id'");
			
			if(is_array($id_exists)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function deleteNewsFiles() {
		$files = glob(__PATH_NEWS_CACHE__.'*');
		foreach($files as $file) {
			if(is_file($file)) {
				unlink($file);
			}
		}
	}
	
	function cacheNews() {
		if($this->isNewsDirWritable()) {
			$news_list = $this->retrieveNews();
			if(is_array($news_list)) {
				$this->deleteNewsFiles();
				foreach($news_list as $news) {
					$handle = fopen(__PATH_NEWS_CACHE__."news_".$news['news_id'].".cache", "a");
					fwrite($handle, $news['news_content']);
					fclose($handle);
				}
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function isNewsDirWritable() {
		if(is_writable(__PATH_NEWS_CACHE__)) {
			return true;
		} else {
			return false;
		}
	}
	
	function retrieveNewsDataForCache() {
		global $dB1;
		$news = $dB1->query_fetch("SELECT news_id,news_title,news_author,news_date,allow_comments,status FROM news ORDER BY news_id DESC");
		if(is_array($news)) {
			return $news;
		} else {
			return null;
		}
	}
	
	function updateNewsCacheIndex() {
		$news_list = $this->retrieveNewsDataForCache();
		$cacheDATA = BuildCacheData($news_list);
		$updateCache = UpdateCache('news.cache',$cacheDATA);
		if($updateCache) {
			return true;
		} else {
			return false;
		}
	}
	
	function LoadCachedNews($id) {
		//var_dump($id);
		if(Validator::Number($id)) {
			if($this->newsIdExists($id)) {
				$file = __PATH_NEWS_CACHE__ . 'news_' . $id . '.cache';
				if(file_exists($file) && is_readable($file)) {
					return file_get_contents($file);
				} else {
					return false;
				}
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	
	function loadNewsData($id) {
		global $dB1;
		if(check_value($id) && $this->newsIdExists($id)) {
			$query = $dB1->query_fetch_single("SELECT * FROM news WHERE news_id = ?", array($id));
			if($query && is_array($query)) {
				return $query;
			}
		}
	}

	//retrieving 3 top events 
	function rt_topEvent(){
		global $dB1;
		$events = $dB1->query_fetch("SELECT * FROM news WHERE status = 1 ORDER BY news_id DESC LIMIT 6 ");
		if(is_array($events)) {
			return $events;
		} else {
			return [];
		}	
	}

}