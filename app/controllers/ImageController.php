<?php

class ImageController extends BaseController {

	public function imageUploadForm(){
		return View::make('image_upload');
	}

	public function uploadImage($format){
		Image::save_image($_FILES);
		return "You requested " . $format;
	}
}