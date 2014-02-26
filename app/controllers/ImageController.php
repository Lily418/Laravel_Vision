<?php

class ImageController extends BaseController {

	public function trainUploadForm(){
		return View::make('training_upload')->with('action', '/image')->with('grouped_images', Image::imagesGroupedByUser());
	}



	public function identifyUploadForm(){
		return View::make('upload_identify_image')->with('action', '/image/identify');
	}

	public function uploadImage(){
		$user_id = Input::get('user_id');
		$user = User::findOrFail($user_id);
		$id = Image::saveImage($_FILES, $user);
		return Response::json(Array("id" => $id));
	}

	public function getImage($id){
		$imagePath = Image::find($id) -> path;
		$response = Response::make(File::get($imagePath));
		$response->header('Content-Type', 'image/jpeg');
		return $response;
	}

	public function identify(){
		//Move posted file to somewhere for OpenCV to find it, give it's location via argument
		$path = tempnam("./identify_images/", "img");
		$inputId = Image::saveImage($_FILES, null, $path);
		$output = exec("python ./OpenCV/open_cv.py $path.jpg");
		$subjectId = json_decode($output)[0];
		$user = User::findOrFail($subjectId);
		$users_images = Image::where('user_id', '=', $user->id)->get();
		return View::make('display_result')->with('user', $user)->with('images', $users_images)->with('inputId', $inputId);
	}
}