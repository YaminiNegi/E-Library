<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	$title= $_POST['title'] ?? "";
	$author=$_POST['author']?? "";
	$description=$_POST['description']?? "";
	$image_url=$_POST['image_url']?? "";

// Create connection
		$conn = new mysqli('localhost', 'root', '','e_library');

		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		//echo "Connected successfully";
			if (empty($title) || empty($author)) {
				
				return ;
			 	# code...
	            }


				$sql = "INSERT INTO books (title, author, description,image_url)
				 VALUES ('$title','$author','$description','$image_url')";

				if ($conn->query($sql) === TRUE) {
				  	
				  	?> 	<script>
						alert("Book Added Successfully")
						
							location.href = 'index.php';

							
						
						</script>
					<?php

					

				} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}

				$conn->close()
				
		//Database connection
	// 	$conn = new mysqli('localhost','root','','e_library');
	// 	var_dump($conn);die();

	// 	if(mysqli_connect_error()) {
	// 		die('Connection Failed :'.mysqli_connect_errno().')'.mysqli_connect_error());

	// 	  }else{
			// $stmt= $conn->prepare("insert into e_library(title,author,description)values(?,?,?)");
			// //var_dump($stmt);die();
			// $stmt->bind_param("sss",$title,$author,$description);
			// $stmt->execute();
			// echo "Successful";
			// $stmt->close();
			// $conn->close();


	// 	}
				// else{
				// 	echo "All req";
				// 	die();



				//  }
?>
