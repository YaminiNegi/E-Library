
<?php
include('connect.php');
if(isset($_POST['delete'])){
	$id_to_delete=mysqli_real_escape_string($conn,$_POST['id_to_delete']);
	$sql = " DELETE FROM books WHERE id = $id_to_delete";
	if(mysqli_query($conn, $sql)){
		?><script>
		alert("Book Deleted Successfully")			
		location.href = 'index.php';				
		</script>
<?php				
	}{
		echo'error:' . mysqli_error($conn);
	}
}


 if(isset($_GET['id'])){
 	$id=mysqli_real_escape_string($conn,$_GET['id']);
 	$sql="SELECT * FROM books WHERE id=$id";

 	$result = mysqli_query($conn,$sql);
 	$book = mysqli_fetch_assoc($result);
 	mysqli_free_result($result);
 	mysqli_close($conn);

 	}
?>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="stylesheet" type="text/css" href="<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<!DOCTYPE html>
<html>
<head>
	<header class="d-flex flex-column py-3 flex-md-row align-items-center justify-content-md-between px-md-5">
		<a href="index.php" class="logo  mt-xl-0">
			<img class="img-fluid "src="https://www.boxfordlibrary.org/wordpress/wp-content/uploads/2014/03/elibrary-logo.png">
		</a>
	</header>

</head>
<body>
<div class="container col-md-6 mx-md-auto d-flex align-items-center flex-column mt-5">
	<h1>Book Details</h1>
	<?php if($book): ?>
		<h4><?php echo htmlspecialchars($book['title'])?></h4>
		<img src="<?php echo $book['image_url'];?>" height="160" width="140">
		<p>Author- <?php echo htmlspecialchars($book['author'])?></p>
		<p class="text-center">Description- <?php echo htmlspecialchars($book['description'])?></p>
		
  	<?php else: ?>
  		<h5>No Book with this id</h5>
  	 <?php endif; ?>
 </div> 	 	
  	<div class="d-flex flex-row align-items-center justify-content-center px-4 container col-md-6">
		<form class= "mx-2" action="book_details.php" method="POST">
			<input type="hidden" name="id_to_delete" value="<?php echo $book['id']?>">	
			<button type="submit" name="delete" class="btn btn-danger ">Delete</button>
		</form>	
		<form >
			<a href="edit.php?id=<?php echo $book['id']?>" class="btn btn-primary">Edit</a>
		</form>
	</div>


</body>
</html>