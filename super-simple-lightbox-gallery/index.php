<!doctype html>
<html>
	<head>
		<title>Ich</title>
		<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/lightbox.js"></script>
	</head>
<body>
<?php
	$images = array(
		array("thumb" => "thumb-1.jpg", "image" => "image-1.jpg"), 
		array("thumb" => "thumb-2.jpg", "image" => "image-2.jpg"), 
		array("thumb" => "thumb-3.jpg", "image" => "image-3.jpg"), 
		array("thumb" => "thumb-4.jpg", "image" => "image-4.jpg"), 
		array("thumb" => "thumb-5.jpg", "image" => "image-5.jpg"), 
		array("thumb" => "thumb-6.jpg", "image" => "image-6.jpg")
	);

	// \n lasa linie noua, \t lasa tab nou, sunt vizibile in codul sursa
	$length = count($images);	//Numarul total de poze
	$nr_coloane = 2;			//Cate coloane vrei sa aibe tabelul
	$index = 1;

	echo "<table>" . "\n";
		echo "\t" . "<tr>" . "\n";
		foreach ($images as $image) {
			echo "\t\t" . '<td>';
				echo '<a href="images/examples/'. $image["image"] .'" rel="lightbox[images]">';
					echo '<img src="images/examples/'. $image["thumb"] .'">';
				echo '</a>';
			echo '</td>' . "\n";
			if($index % $nr_coloane == 0 && $index < $length){
				echo "\t" . "</tr>" . "\n";
				echo "\t" . "<tr>" . "\n";
			}
			$index++;
		}
		echo "\t" . "</tr>" . "\n";
	echo "</table>" . "\n";
?>
</body>	
</html>

<!-- Aici ai codul rezultat din php -->

<!-- <!doctype html>
<html>
	<head>
		<title>Ich</title>
		<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
		<script src="js/jquery-1.7.2.min.js"></script>
		<script src="js/lightbox.js"></script>
	</head>
<body>
<table>
	<tr>
		<td><a href="images/examples/image-1.jpg" rel="lightbox[images]"><img src="images/examples/thumb-1.jpg"></a></td>
		<td><a href="images/examples/image-2.jpg" rel="lightbox[images]"><img src="images/examples/thumb-2.jpg"></a></td>
		<td><a href="images/examples/image-3.jpg" rel="lightbox[images]"><img src="images/examples/thumb-3.jpg"></a></td>
	</tr>
	<tr>
		<td><a href="images/examples/image-4.jpg" rel="lightbox[images]"><img src="images/examples/thumb-4.jpg"></a></td>
		<td><a href="images/examples/image-5.jpg" rel="lightbox[images]"><img src="images/examples/thumb-5.jpg"></a></td>
		<td><a href="images/examples/image-6.jpg" rel="lightbox[images]"><img src="images/examples/thumb-6.jpg"></a></td>
	</tr>
	<tr>
	</tr>
</table>
</body>	
</html> -->

