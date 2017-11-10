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
<h1 class="page-header">Edit College History</h1>
<?php
$CMS = new Cms();

// Check if News cache folder is writable
if($CMS->isNewsDirWritable()) {
	
	// Edit news process::
	if(check_value($_POST['news_submit'])) {
		$CMS->cacheCMS('history',$_POST['news_content']);
	}

	$loadCmsCache = $CMS->LoadCachedCms('history');
	
	// Load News
?>
		<form role="form" method="post">
			<div class="form-group">
				<label for="input_1">Title:</label>
				<label for="input_1"> College History</label>
			</div>
			<div class="form-group">
				<label for="news_content"></label>
				<textarea name="news_content" id="news_content"><?php echo $loadCmsCache; ?></textarea>
			</div>

			<button type="submit" class="btn btn-large btn-block btn-success" name="news_submit" value="ok">Update CMS</button>
		</form>
		
		<script src="//cdn.ckeditor.com/4.4.5/standard/ckeditor.js"></script>
		<script type="text/javascript">//<![CDATA[
			//CKEDITOR.replace('editor1');
			CKEDITOR.replace('news_content', {
				language: 'en',
				height: '800px',
				uiColor: '#f1f1f1'

			});
		//]]></script>
<?php	
} else {
	message('error','The cms cache folder is not writable.');
}

?>