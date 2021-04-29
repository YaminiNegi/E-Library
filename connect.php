<?php
$conn = new mysqli('localhost', 'root', '','e_library');

error_reporting(E_ALL);
ini_set('display_errors', 1);
	$title= isset($_POST['title']) ? mysqli_real_escape_string($conn,$_POST['title'])  : "";
	$author= isset($_POST['author']) ? mysqli_real_escape_string($conn,$_POST['author']) : "";
	$description= isset($_POST['description']) ? mysqli_real_escape_string($conn,$_POST['description']) : "";
	$image_url= isset($_POST['image_url']) ? mysqli_real_escape_string($conn,$_POST['image_url']) : "";

// Create connection

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
				 VALUES ('$title','$author','$description','$image_url') ";
				 

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
				
?>
