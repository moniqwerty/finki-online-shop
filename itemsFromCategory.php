<!DOCTYPE html>
<?php include_once 'database.php';
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Online Shop</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/shop-homepage.css" rel="stylesheet">
	</head>

	<body>
	
		
		<!-- Navigation -->
		<?php session_start();
			include_once 'navBar.php'; ?>
			
		<!-- Page Content -->
		<div class="container">
			<div class="row">

				<?php include_once 'listCategories.php' ?>
				<div class="col-md-9">
					
					<div class="row">
							<?php
							  	// da se prikazuvaat 6 proizvodi po strana	
							   $num_rec_per_page=6;							
								if (isset($_GET["page"])) {
									 $page  = $_GET["page"]; 
								} else {
								    $page=1; }	
								$start_from = ($page-1) * $num_rec_per_page; 								

							// selekcija na site proizvodi od odbranata kategorija
							$products=mysqli_query($link, "SELECT * FROM products WHERE category_id LIKE '$id' LIMIT $start_from, $num_rec_per_page");
								while ($product=mysqli_fetch_assoc($products)) {
									$productID=$product['id'];		
							?>
						<div class="col-sm-4 col-lg-4 col-md-4">
							<div class="thumbnail">
								<img src="images/<?php echo $product['big_img'];?>" alt="http://placehold.it/320x150" >
								<div class="caption">
									<h4><a href='<?php echo "item.php?ev=$productID&id=$id"?>'><?php echo $product['name'] ?></a></h4>
									<p>
										<?php echo $product['description']?>
									</p>
								</div>
							</div>
						</div>
						<?php } ?>
						
					</div>
					
						<div class="pull-right">

					<ul class="pagination">										
						
						<?php //izbroj kolku zapisi ima vkupno vo tabelata
							$rs_result = mysqli_query($link,"SELECT * FROM products WHERE category_id LIKE '$id'"); //run the query
							$total_records = mysqli_num_rows($rs_result);  //count number of records
							$total_pages = ceil($total_records / $num_rec_per_page); 
						?>
					<!-- prva strana -->
					  <li><a href='<?php echo "itemsFromCategory.php?page=1&id=$id"?>'>&laquo;</a></li>
					  <?php for($i=1;$i<=$total_pages;$i++){
						 ?>
					  <li><a href='<?php echo "itemsFromCategory.php?page=$i&id=$id"?>'><?php echo $i; ?></a></li>
					  <?php } ?>
					  <!-- posledna strana -->
					  <li><a href='<?php echo "itemsFromCategory.php?page=$total_pages&id=$id"?>'>&raquo;</a></li>
					  
					</ul> 
					</div>

				</div>

			</div>

		</div>
		<!-- /.container -->
		
		<div class="container">

				<hr>

				<footer>
					<div class="row">
						<div class="col-lg-12">
							<div class="row well">

								<p align="center">
									2015  ФИНКИ |    Факултет за информатички науки и компјутерско инженерство
								</p>
							</div>

						</div>
					</div>
				</footer>

			</div><!-- /.container -->



		<!-- jQuery -->
		<script src="js/jquery.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

	</body>

</html>
