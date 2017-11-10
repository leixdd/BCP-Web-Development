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
<h1 class="page-header">Publish News</h1>
<?php
$News = new News();
loadModuleConfigs('news');



// Check if News cache folder is writable
if($News->isNewsDirWritable()) {
	
	// Add news process::
	if(check_value($_POST['news_submit'])) {
		
	
		if($_FILES['upload']['tmp_name'] == "images/jpg") {
		    message('error','Invalid image type');
		} else {

			$images = file_get_contents($_FILES['upload']['tmp_name']);
			$News->addNews($_POST['news_title'],$_POST['news_content'],$_POST['news_author'],$_POST['news_comments'],$_POST['news_status'],$_POST['news_venue'],$images);
			$News->cacheNews();
			$News->updateNewsCacheIndex();
		}
	}
	
		// Cache news process::
		if(check_value($_REQUEST['cache']) && $_REQUEST['cache'] == 1) {
			$cacheNews = $News->cacheNews();
			if($cacheNews) {
				message('success','News successfully cached!');
			} else {
				message('error','Unknown error');
			}
		}
	
?>
	<form role="form" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="50000" />
		<div class="form-group">
			<label for="input_1">Title:</label>
			<input type="text" class="form-control" id="input_1" name="news_title" />
		</div>
		<div class="form-group">
			<label for="input_4">Status : </label>
			<div class="radio">
				<label><input type="radio" name="news_status" id="input_4" value="0" checked> News </label>
				<label><input type="radio" name="news_status" id="input_4" value="1"> Event </label>
			</div>
		</div>
		<div class="form-group">
			<label for="input_5">Venue : </label>
			<input type="text" class="form-control" id="input_5" name="news_venue" />
		</div>
		<div class="form-group">
			<label>Select file </label>
			<input type="file" name="upload" />
		</div>
		<div class="form-group">
			<label for="news_content"></label>
			<textarea name="news_content" id="news_content"></textarea>
		</div>
		<div class="form-group">
			<label for="input_2">Author:</label>
			<input type="text" class="form-control" id="input_2" name="news_author" value="Administrator"/>
		</div>
		<?php if(ranconfig('news_enable_comment_system')) { ?>
		<div class="form-group">
			<label for="input_3">Allow Facebook Comments:</label>
			<div class="radio">
				<label><input type="radio" name="news_comments" id="input_3" value="1" checked> Yes</label>
			</div>
			<div class="radio">
				<label><input type="radio" name="news_comments" id="input_3" value="0"> No</label>
			</div>
		</div>

			
		<?php } else { ?>
			<input type="hidden" name="news_comments" value="0"/>
		<?php }?>

		<button type="submit" class="btn btn-large btn-block btn-success" name="news_submit" value="ok">Publish</button>
	</form>

	<script src="//cdn.ckeditor.com/4.4.5/standard/ckeditor.js"></script>
	<script type="text/javascript">//<![CDATA[
		//CKEDITOR.replace('editor1');
		CKEDITOR.replace('news_content', {
			language: 'en',
			uiColor: '#f1f1f1'
		});
	//]]></script>
<?php	
} else {
	message('error','The news cache folder is not writable.');
}
?>