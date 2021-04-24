<?php
	$conn = new mysqli('localhost', 'root', '','e_library');
	$sql = "SELECT * FROM books ORDER BY id DESC";
	$result = $conn->query($sql);
	$conn->close();
?>		