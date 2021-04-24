<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	$title= $_POST['title'] ?? "";
	$author=$_POST['author']?? "";
	$description=$_POST['description']?? "";
	$image_url=$_POST['image_url']?? "";
	$stu_id= $_POST['id']??"";


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


				$sql = "UPDATE  books SET  title='{$title}',author='{$author}',description='{$description}',image_url='{$image_url}' WHERE id={$stu_id}";
				if ($conn->query($sql) === TRUE) {
				  ?><script>
						alert("Book Updated Successfully")
						
							location.href = 'book_details.php?id= <?php echo $stu_id?>';

							
						
						</script>
				<?php
				} else {
				  echo "Error: " . $sql . "<br>" . $conn->error;
				}

				$conn->close()
?>