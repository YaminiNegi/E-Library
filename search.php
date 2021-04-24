<?php include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<header>
		<a href="index.php" class="logo">
		  	<h1>E-LIBRARY</h1>
		  </a>
		   <div class="button-container">
			<a href="add_book.php" ;>Add a Book</a>
		   </div>	
	</header>	
</head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">

	

<div class="single-container">
<?php
	if( isset($_POST['search'])){ 
		$search = mysqli_real_escape_string($conn, $_POST['search']);
		$sqlA= " SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%'";
		$result4 = mysqli_query($conn, $sqlA);
		$queryResult = mysqli_num_rows($result4);
		echo "There are" .$queryResult."_results!_";

		if ($queryResult > 0) {
			while($book = mysqli_fetch_assoc($result4)) { 
				  ?>
				                <img src="<?php echo $book['image_url'];?>" height="160" width="140">
				                <p><b><?php echo $book['title'];?></p>
				                <div><i><?php echo $book['author'];?></div>
				                <div></i><i><?php echo $book['description'];?></div>
				                <div></i><a href="book_details.php?id=<?php echo $book['id']?>">More Info</a></b></div>
		    			
			<?php }

		} else {
			echo "No Matching Results";
		}
	}

?>
</div>
</html>