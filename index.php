<?php
	include_once 'connect.php';			
?>	


<!DOCTYPE html>
<html>
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	


	<header class="d-flex flex-column py-3 flex-md-row align-items-center justify-content-md-between px-md-5">
		<a href="index.php" class="logo  mt-xl-0">
			<img class="img-fluid "src="https://www.boxfordlibrary.org/wordpress/wp-content/uploads/2014/03/elibrary-logo.png">
		</a>
		<div class="button-container ml-md-auto mr-md-5" >
			<a href="add_book.php">Add a Book</a>
		</div>		
	</header>

	

	<?php
		//Sorting
		if (isset($_GET['Sort'])) {
			if($_GET['Sort']=='A-Z'){
				$a = "ORDER BY title"; 
	  		} 
	  		elseif($_GET['Sort']=='Z-A'){ 
				$a = "ORDER BY title desc"; 
	  		} else{$a="Order by id desc"; 
				} 
  		}else{$a="Order by id desc"; 
		}
		 $limit =6;
		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}else{
			$page=1;
		}
		$offset=($page -1)* $limit;
		$results_per_page=5;
	    

		if (isset($_GET['search'])) {

			$search = mysqli_real_escape_string($conn, $_GET['search']);
			$sql="SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%' {$a} LIMIT {$offset} ,{$limit} "; 
			$result=mysqli_query($conn,$sql); 
		
		} else{
			$sql="SELECT * FROM books {$a} LIMIT {$offset} ,{$limit} ";
			$result=mysqli_query($conn,$sql); 
		}
	?>

	<div class="container">
		<div class="d-flex flex-column flex-md-row  mt-5 mx-md-auto justify-content-md-center">
			<div class="d-flex flex-row  ">
				<form class="search-form d-flex flex-row " style="width: 280px;" action="index.php" method="GET">
					<input type="text" name="search" placeholder="Search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>">
					<button type="submit" class="bg-white border-0"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
		  			<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
					</svg></button>						
				</form>	
				<?php if(isset($_GET['search'])){?>
					<button class=" bg-white border-0"> 
						<a href="index.php" class="text-dark"  style="text-decoration: none;">
							<span aria-hidden="true">&times;</span>
						</a>
					</button>
				<?php }?>
			</div>	    
	
	
			<form action="index.php" method="GET" class="d-flex flex-row justify-content-end mx-md-5">
				<?php if(isset($_GET['Sort'])){
					$sort=$_GET['Sort'];
				}else{
					$sort=" ";
				}
				?>
					<select name="Sort" class=" form-select mt-4 w-100 w-md-25 mt-md-0" id="sort" onchange="javascript:this.form.submit()">	
						<option>Sort</option>	
						<option value="A-Z" <?php echo $sort=='A-Z'?"selected":"" ?> id="1">A-Z</option> 
						<option value="Z-A" <?php echo $sort=='Z-A'?"selected":"" ?> id="2">Z-A</option>
					</select>
			</form>

		</div>
		<?php
		if(isset($_GET['search'])){?>
			
			<div class="alert alert-warning alert-dismissible fade mt-5 show w-75 mx-auto d-flex justify-content-between" role="alert">
  				<strong>Showing result for <?php echo $_GET['search']; ?></strong>
  				<button type="button" class="close bg-transparent border-0 ml-auto" data-dismiss="alert" aria-label="Close">
    				<span aria-hidden="true">&times;</span>
  				</button>
			</div>

		<?php	}?>		
		<div class="book-container d-flex mt-5  flex-wrap justify-content-md-center">
			<?php
				$queryResult = mysqli_num_rows($result);
				if($queryResult > 0){
					while($book = mysqli_fetch_assoc($result)) { ?>
							<div class="single-book-container col-12 col-md-4 col-xl-3 mx-auto mx-md-3 mx-xl-5 mb-5 d-flex flex-column align-items-center">
				                <img src="<?php echo $book['image_url'];?>" height="160" width="140">
				                <p><strong> <?php echo $book['title'];?></strong></p>
				                <div class="text-truncate text-center d-block w-100"><i><strong><?php echo $book['author'];?></strong></i></div>
				                <div class="text-truncate d-block w-100" style="height: 30px;"><i><?php echo $book['description'];?></i></div>
				                <div><a href="book_details.php?id=<?php echo $book['id']?>">More Info</a></div>    
						</div>
					<?php }
				} else {
					echo "No Matching Results";
				}
			?>			
					
			<?php 
				if(isset($_GET['Sort'])){
					$sort_variable = $_GET['Sort'] ? $_GET['Sort'] : ' ';
					}else{
						$sort_variable="";
					}

				if (isset($_GET['search'])) { 
					$search = mysqli_real_escape_string($conn, $_GET['search']); 
					$search_variable = $_GET['search'] ? $_GET['search'] : ' ';
					$sql1="SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%'  "; 
					$pagination_result=mysqli_query($conn,$sql1);
				} else{ 
					$sql1=" SELECT * FROM books ";
					$pagination_result = mysqli_query($conn,$sql1) or die("query error"); 

				} 
				
			?>
		</div>
	</div>
	<div>
		<?php 
			if(mysqli_num_rows($pagination_result)>0){
				$total_record= mysqli_num_rows($pagination_result); 
				$total_page=ceil($total_record/$limit); 
				echo '<div class="pagination col-12  flex-wrap d-flex flex-md-row justify-content-center">'; 

				if (isset($search)) {
					$search_variable = $_GET['search'] ? $_GET['search'] : ' ';
					
					echo '<a href="index.php?search='.$search_variable.'&page='.($page-1).'"><<</a>';
					}else{
						echo '<a href="index.php?Sort='.$sort_variable.'&page='.($page-1).'"><<</a>'; 
				}	
				for($i=1;$i<=$total_page;$i++){
				
					if(isset($_GET['Sort'])){
							$sort_variable = $_GET['Sort'] ? $_GET['Sort'] : ' ';
							}
					if (isset($search)) { 
						$search_variable = $_GET['search'] ? $_GET['search'] : ' ';
						
						echo '<a href="index.php?search='.$search_variable.'&page='.$i.'">'.$i.'</a>';

					} else{
						echo '<a href="index.php?Sort='.$sort_variable.'&page='.$i.'">'.$i.'</a>'; 

					}
				}
				if (isset($search)) {
					$search_variable = $_GET['search'] ? $_GET['search'] : ' ';

					echo '<a href="index.php?search='.$search_variable.'&page='.($page+1).'">>></a>';
				}else{
					 echo '<a href="index.php?Sort='.$sort_variable.'&page='.($page+1).'">>></a>'; 
				}

				echo '</div>';
			}
		?>
	</div>					

	<footer>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
	</footer>
		
</html>