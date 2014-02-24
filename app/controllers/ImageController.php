<?php

class ImageController extends BaseController {

	public function imageUploadForm(){
		return View::make('image_upload');
	}

	public function uploadImage(){
		$id = Image::save_image($_FILES);
		return Response::json(Array("id" => $id));
	}

	public function getImage($id){
		$imagePath = Image::find($id) -> path;
		$response = Response::make(File::get($imagePath));
		$response->header('Content-Type', 'image/jpeg');
		return $response;



	}
}