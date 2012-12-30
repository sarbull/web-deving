<?php
	//Get data via GET method
	@$_GET['width'] ? $width = $_GET['width'] : $width = 200;
	@$_GET['height'] ? $height = $_GET['height'] : $height = 200;
	@$_GET['text'] ? $name = $_GET['text'] : $name = "demo-text";
?>
<!doctype html>
<html>
<head>
	<title>Generate png image</title>
	<style>
		body {
			margin:0;
			padding:0;
		}

		#image {
			margin-top: 30px;
			text-align: center;
		}
	</style>
</head>
<body>
	<div id="image">
		<?php
			echo '<img src="img.php?width='. $width .'&height='. $height .'&text='. $name .'">';
		?>
	</div>
</body>
</html>