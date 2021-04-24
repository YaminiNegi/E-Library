<?php
 // 	$title= $_POST['title'] ?? "";
	// $author=$_POST['author']?? "";
	// $description=$_POST['description']?? "";
	// $image_url=$_POST['image_url']?? "";

// Create connection
		$conn = new mysqli('localhost', 'root', '','e_library');
		$sql = "SELECT * FROM books ORDER BY id DESC";
$result = $conn->query($sql);
$conn->close();
?>		