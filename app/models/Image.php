<?php
class Image extends Eloquent {

	public static function save_image($files){


    // Undefined | Multiple Files | $files Corruption Attack
    // If this request falls under any of them, treat it invalid.
			if (!isset($files['upfile']['error'])) 
			{
				throw new RuntimeException('Invalid parameters.');
			}
			else if(is_array($files['upfile']['error']))
			{
				throw new RuntimeException($files['upfile']['error']);
			}

    // Check $files['upfile']['error'] value.
		switch ($files['upfile']['error']) {
			case UPLOAD_ERR_OK:
			break;
			case UPLOAD_ERR_NO_FILE:
			throw new RuntimeException('No file sent.');
			case UPLOAD_ERR_INI_SIZE:
			case UPLOAD_ERR_FORM_SIZE:
			throw new RuntimeException('Exceeded filesize limit.');
			default:
			throw new RuntimeException('Unknown errors.');
		}

		//Size is specfied in bytes
		$twoMegabytes = 20971520;
    // You should also check filesize here. 
		if ($files['upfile']['size'] > $twoMegabytes) {
			throw new RuntimeException('Exceeded filesize limit. '.$files['upfile']['size']);
		}

    // DO NOT TRUST $files['upfile']['mime'] VALUE !!
    // Check MIME Type by yourself.
		$finfo = new finfo(FILEINFO_MIME_TYPE);
		if (false === $ext = array_search(
			$finfo->file($files['upfile']['tmp_name']),
			array(
				'jpg' => 'image/jpeg',
				'png' => 'image/png',
				'gif' => 'image/gif',
				),
			true
			)) {
			throw new RuntimeException('Invalid file format.');
	}

    // You should name it uniquely.
    // DO NOT USE $files['upfile']['name'] WITHOUT ANY VALIDATION !!
    // On this example, obtain safe unique name from its binary data.

    $path = sprintf('./uploads/%s.%s', strval(Image::all() -> count()), $ext);
	if (!move_uploaded_file(
		$files['upfile']['tmp_name'], $path
		)) {
		throw new ErrorException('Failed to move uploaded file. '. getcwd());
}

	$image = new Image;
	$image -> path = $path;
	$image -> save();

	return $image -> id;


}

}
