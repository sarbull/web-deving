<?php

/*
	PHP class for html form methods

	@author Sirbu Nicolae-Cezar
	@email sirbunicolaecezar@gmail.com
*/

class methodForm {

	public $post;
	public $get;
	public $files;

	public function __construct(){
		$this->post = array();
		$this->files = array();
	}

	//savePost method saves the $_POST
	//global variable into the $post class attribute
	private function savePost(){
		if($_POST){
			$this->post = $_POST;
		} else {
			return 0;
		}
	}

	//saveGet method saves the $_GET
	//global variable into the $get class attribute
	private function saveGet(){
		if($_GET){
			$this->get = $_GET;
		} else {
			return 0;
		}
	}

	//saveFiles method saves the $_FILES
	//global variable into the $files class attribute
	private function saveFiles(){
		if($_FILES){
			$this->files = $_FILES;
		} else {
			return 0;
		}
	}

	//save method saves both $_POST and $_FILES
	//by calling the separated methods for each type
	public function save(){
		$savedFiles = $this->saveFiles();
		$savedPost = $this->savePost();
		$savedGet = $this->saveGet();
		if($savedPost && $savedFiles && $savedGet){
			return 1;
		} else {
			return 0;
		}
	}

	//uploadFiles uploads the files from the html form
	//selecting the "name" tag input
	public function uploadFiles($path){
		$path = $path . "/";
		$savedFiles = $this->saveFiles();
		if($savedFiles){
			$files = $this->files;
			foreach($files as $file => $value){
				/*	
					$file is the input name from the html form
					$value is an array for the file properties
				*/
				if($value["error"] != 4) {
					$tmp_name = $value["tmp_name"];
					$name = $value["name"];
					move_uploaded_file($tmp_name, $path . $name);
				}
			}
		}
	}

	public function do_something(){
		print_r($this->post);
		print_r($this->files);
		print_r($this->get);
	}

}

?>
<!doctype html>
<html>
<head>
	<title>PHP class for form methods</title>
</head>
<body>
	<?php
		$objectMethod = new methodForm();
		$objectMethod->save();
		$objectMethod->uploadFiles("uploads");
	?>
	<h3>Post form</h3>
	<form action="" method="post" enctype="multipart/form-data">
		<input type="text" name="firstname" placeholder="First name"> <br/>
		<input type="text" name="lastname" placeholder="Last name"> <br/>
		<input type="text" name="age" placeholder="Age"> <br/>
		<input type="file" name="file"> <br/>
		<input type="file" name="anotherfile"> <br/>
		<input type="submit" value="Send">
	</form>
	<h3>Get form</h3>
	<form action="" method="get">
		<input type="text" name="firstname" placeholder="First name"> <br/>
		<input type="text" name="lastname" placeholder="Last name"> <br/>
		<input type="text" name="age" placeholder="Age"> <br/>
		<input type="submit" value="Send">
	</form>
</body>
</html>
