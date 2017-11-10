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
<h1 class="page-header">Edit News</h1>
<?php
$News = new News();
loadModuleConfigs('news');

// Check if News cache folder is writable
if($News->isNewsDirWritable()) {
	
	// Edit news process::
	if(check_value($_POST['news_submit'])) {
		$News->editNews($_REQUEST['id'],$_POST['news_title'],$_POST['news_content'],$_POST['news_author'],$_POST['news_comments'],$_POST['news_date'],$_POST['news_venue'],$_POST['news_status']);
		$News->cacheNews();
		$News->updateNewsCacheIndex();
	}
	
	// Load News
	$editNews = $News->loadNewsData($_REQUEST['id']);
	if($editNews) {
?>
		<form role="form" method="post">
			<div class="form-group">
				<label for="input_1">Title:</label>
				<input type="text" class="form-control" id="input_1" name="news_title" value="<?php echo $editNews['news_title']; ?>"/>
			</div>
			<div class="form-group">
				<label for="input_4">Status : </label>
				<div class="radio">
					<label><input type="radio" name="news_status" id="input_4" value="0" <?php if($editNews['status'] == 0) { echo ' checked'; } ?>> News </label>
					<label><input type="radio" name="news_status" id="input_4" value="1" <?php if($editNews['status'] == 1) { echo ' checked'; } ?>> Event </label>
				</div>
			</div>
			<div class="form-group">
				<label for="input_5">Venue : </label>
				<input type="text" class="form-control" id="input_5" name="news_venue" value="<?php echo $editNews['news_venue']; ?>" />
			</div>
			<div class="form-group">
				<label for="news_content"></label>
				<textarea name="news_content" id="news_content"><?php echo $editNews['news_content']; ?></textarea>
			</div>
			<div class="form-group">
				<label for="input_2">Author:</label>
				<input type="text" class="form-control" id="input_2" name="news_author" value="<?php echo $editNews['news_author']; ?>"/>
			</div>
			<div class="form-group">
				<label for="input_4">News Date:</label>
				<input type="text" class="form-control" id="input_4" name="news_date" value="<?php echo date("Y-m-d H:i", $editNews['news_date']); ?>"/>
			</div>
			<?php if(ranconfig('news_enable_comment_system')) { ?>
			<div class="form-group">
				<label for="input_3">Allow Facebook Comments:</label>
				<div class="radio">
					<label><input type="radio" name="news_comments" id="input_3" value="1"<?php if($editNews['allow_comments'] == 1) { echo ' checked'; } ?>> Yes</label>
				</div>
				<div class="radio">
					<label><input type="radio" name="news_comments" id="input_3" value="0"<?php if($editNews['allow_comments'] == 0) { echo ' checked'; } ?>> No</label>
				</div>
			</div>
				
			<?php } else { ?>
				<input type="hidden" name="news_comments" value="0"/>
			<?php }?>

			<button type="submit" class="btn btn-large btn-block btn-success" name="news_submit" value="ok">Update News</button>
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
		message('error','Could not load news data.');
	}
} else {
	message('error','The news cache folder is not writable.');
}

?>