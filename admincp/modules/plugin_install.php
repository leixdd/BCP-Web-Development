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
<h1 class="page-header">Import Plugin</h1>
<?php

if(check_value($_POST['submit'])) {

	if($_FILES["file"]["error"] > 0) {
		message('error', 'There has been an error uploading the file.');
	} else {
		$Plugin = new Plugins();
		$Plugin->importPlugin($_FILES);
	}
}

?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Select file</label>
		<input type="file" name="file" id="file"/>
	</div>
	<input type="submit" name="submit" class="btn btn-primary span2" value="Install"/>
</form>
<p>Make sure you upload all the plugin files before importing it.</p>