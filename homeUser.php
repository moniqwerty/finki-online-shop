<!DOCTYPE html>
<?php include_once 'database.php';
    //include_once 'delete_reservations.php';
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
		<!-- facebook integration script -->
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.0";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
		
		
		<!-- Navigation -->
		<?php 
		session_start();
		include_once 'navBar.php'; 	
		?>
			
		<!-- Page Content -->
		<div class="container">
			<div class="row">

				<?php include_once 'listCategories.php'?>

				<div class="col-md-9">

					<div class="row carousel-holder">

						<div class="col-md-12">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1"></li>
									<li data-target="#carousel-example-generic" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="item active">									
									<a href='<?php echo "item.php?ev=7&id=7"?>'>
										<img class="slide-image" src="images/cover1.jpg" alt="http://placehold.it/800x300">
										</a>
									</div>
									<div class="item">
										<a href='<?php echo "item.php?ev=6&id=6"?>'>
										<img class="slide-image" src="images/cover2.jpg" alt="http://placehold.it/800x300">
										</a>
									</div>
									<div class="item">
										<a href='<?php echo "item.php?ev=4&id=4"?>'>
										<img class="slide-image" src="images/cover3.jpg" alt="http://placehold.it/800x300">
										</a>
									</div>
								</div>
								<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a>
								<a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a>
							</div>
						</div>

					</div>

					<div class="row">
							<?php 
							  	// da se prikazuvaat 6 proizvodi po strana	
							   $num_rec_per_page=6;							
								if (isset($_GET["page"])) {
									 $page  = $_GET["page"]; 
								} else {
								    $page=1; }	
								$start_from = ($page-1) * $num_rec_per_page; 								

							//selekcija na site proizvodi za prikazuvanje
							$products=mysqli_query($link, "SELECT * FROM products");
								while ($product=mysqli_fetch_assoc($products)) {
									$productID=$product['id'];	
							?>
						<div class="col-sm-4 col-lg-4 col-md-4">
							<div class="thumbnail">
								<img src="images/<?php echo $product['small_img'];?>" alt="http://placehold.it/320x150">
								<div class="caption">
									<!--<h4 class="pull-right">$24.99</h4> -->
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
							$rs_result = mysqli_query($link,"SELECT * FROM products"); //run the query
							$total_records = mysqli_num_rows($rs_result);  //count number of records
							$total_pages = ceil($total_records / $num_rec_per_page); 
						?>
					
					<!-- prva strana -->
					  <li><a href='<?php echo "homeUser.php?page=1"?>'>&laquo;</a></li>
					  <?php for($i=1;$i<=$total_pages;$i++){
						 ?>
					  <li><a href='<?php echo "homeUser.php?page=$i"?>'><?php echo $i; ?></a></li>
					  <?php } ?>
					  <!-- posledna strana -->
					  <li><a href='<?php echo "homeUser.php?page=$total_pages"?>'>&raquo;</a></li>
					  
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
									2014  ФИНКИ |    Факултет за информатички науки и компјутерско инженерство
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
