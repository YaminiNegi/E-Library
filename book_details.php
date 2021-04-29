
<?php
include('connect.php');

 if(isset($_GET['id'])){
 	$id=mysqli_real_escape_string($conn,$_GET['id']);
 	$sql="SELECT * FROM books WHERE id=$id";

 	$result = mysqli_query($conn,$sql);
 	$book = mysqli_fetch_assoc($result);
 	mysqli_free_result($result);
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
		<img src="<?php echo $book['image_url'] ? $book['image_url']  : 'https://assets.entrepreneur.com/content/3x2/2000/20191219170611-GettyImages-1152794789.jpeg' ;?>" height="160" width="140" >
		<p>Author- <?php echo htmlspecialchars($book['author'])?></p>
		<p class="text-truncate text-center" style="white-space: pre-wrap;">Description- <?php echo htmlspecialchars($book['description'])?></p>
		
  	<?php else: ?>
  		<h5>No Book with this id</h5>
  	 <?php endif; ?>
 </div> 	 	
  	<div class="d-flex flex-row align-items-center justify-content-center px-4 container col-md-6">
		<form class= "mx-2 delete_book" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="POST">
			<input id="delete_book_id" type="hidden" name="id_to_delete" value="<?php echo $book['id']?>">	
			<button type="submit" name="delete" class="btn btn-danger" >Delete</button>
		</form>	
		<form >
			<a href="edit.php?id=<?php echo $book['id']?>" class="btn btn-primary">Edit</a>
		</form>
	</div>


</body>


</html>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>


    <script src="deleteform.js" ></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<?php
if (!empty($_POST['id'])) {
	$data=[];
	$id_to_delete=mysqli_real_escape_string($conn,$_POST['id']);	
	$sql = " DELETE FROM books WHERE id = $id_to_delete";	
	if(mysqli_query($conn, $sql)){
		    $data['success'] = true;

		return json_encode($data);

	}
}	


?>

