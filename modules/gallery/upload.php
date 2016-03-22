<?php
use Enpowi\Modules\DataOut;
use Enpowi\Modules\Module;
use Enpowi\Files\Gallery;
use Enpowi\App;
Module::is();

$g = App::paramInt('g');
(new DataOut)
	->add('gallery', new Gallery($g))
	->add('g', $g)
	->bind();
?>
<form
	class="form container"
	action="gallery"
	v-module>
	<h3><span v-t>Upload image to:</span> {{ gallery.name }}</h3>
	<input id="image" name="files[]" type="file" multiple="true">

</form>

<link href="vendor/bootstrap-fileinput/css/fileinput.min.css" rel="stylesheet">
<script src="vendor/bootstrap-fileinput/js/fileinput.min.js"></script>
<script>
	$(app.getElementById('image')).fileinput({
		uploadAsync: false,
		uploadUrl: "modules/?module=gallery&component=uploadService&g=" + data.g,
		allowedFileExtensions: ["jpg", "png", "gif"]
	});
</script>