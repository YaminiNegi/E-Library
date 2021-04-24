<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title></title>
<!-- 	<link rel="stylesheet" type="text/css" href="style2.css">
 -->	<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	</head>

	<body>
		<header class="d-flex flex-column py-3 flex-md-row align-items-center justify-content-md-between px-md-5">
		<a href="index.php" class="logo  mt-xl-0">
			<img class="img-fluid "src="https://www.boxfordlibrary.org/wordpress/wp-content/uploads/2014/03/elibrary-logo.png">
		</a>
		</header>
	    
		<div class="form-container  d-flex mt-5 ml-2 d-flex flex-column flex-md-row align-items-center justify-content-center px-md-5 ">
			<form class="add-book d-flex flex-column justify-content-center" action="connect.php" method="POST">
				
				<div class="form-group d-flex flex-column mb-3">
					<label>Book Name</label>
					<input type="text" name="title" placeholder="Enter Book Name*" id="title" required="required">
				</div>	
					
				<div class="form-group d-flex flex-column mb-3">
					<label>Author</label>
					<input type="text" name="author" placeholder="Enter Author*" id="author" required="required">
				</div>	
				
				<div class="form-group d-flex flex-column mb-3">
					<label>Description</label>
					<input type="text" name="description" placeholder="Enter Description" id="description">
				</div>	
				
				<div class="form-group d-flex flex-column mb-3">
					<label>Image</label>
					<input type="text" name="image_url" placeholder="Enter Image URL" id="image_url">
				</div>		

				
					<div class="form-group d-flex flex-column mb-3 ">	
					
						<div class="popup d-flex justify-content-center " onclick= "myFunction()">
							<button  type="submit" class="btn btn-primary mt-2 ml-auto" name="submit">Save</button>  					
						</div>

					</div>		
			</form>

		</div>
		

	</body>	