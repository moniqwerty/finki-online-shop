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

		<title>FINKI Online Shop</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/shop-homepage.css" rel="stylesheet">
	</head>

	<body>

		<!-- Navigation -->
		<?php 
		session_start();
		include_once 'navBar.php'; 	
		?>
			
		<!-- Page Content style="margin-top:100px;" -->
		<div class="container">
			<div class="row">
				<div class="col-xs-8">
						<div class="panel panel-info">
							<div class="panel-heading">
								<div class="panel-title">
									<div class="row">
										<div class="col-xs-6">
											<h5><span class="glyphicon glyphicon-shopping-cart"></span> Купувачка кошничка</h5>
										</div>
										<div class="col-xs-6">
											<!--redirect do welcome-->
											<a href="homeUser.php" class="btn btn-primary btn-sm btn-block">
												 <span class="glyphicon glyphicon-share-alt"></span>Продолжи со купување</a>
										</div>
									</div>
								</div>
							</div>
							
				<div class="panel-body">
						<?php
										//id na logiraniot korisnik
										$u=$_SESSION['username'];
										$user=mysqli_query($link, "SELECT * FROM users WHERE username LIKE '$u'");
										$userID=mysqli_fetch_assoc($user);
										$uID=$userID['user_id'];
										
										//koshnichkata na korisnikot
										$products=mysqli_query($link, "SELECT * FROM cart WHERE user_id LIKE '$uID'");
										
										//promenlivi za prikazhuvanje na informacii
										$name=""; $desc=""; $img; $price; $category; $quantity=0; $totalPrice=0; $cartID; 
										
										while ($product=mysqli_fetch_assoc($products)) {
											$cartID = $product['cart_id']; 
											$productID = $product['product_id'];
											$quantity = $product['quantity'];
											
											//informacii za proizvodot
											$productInfo = mysqli_query($link, "SELECT * FROM products WHERE id LIKE '$productID'");
											while ($prod=mysqli_fetch_assoc($productInfo)) {
												$name = $prod['name'];
												$desc = $prod['description'];
												$img = $prod['small_img'];
												$price = $prod['price'];
												$totalPrice += $price * $quantity;
												
												$categoryID = $prod['category_id'];
												$cat = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM categories WHERE id LIKE '$categoryID'")); 
												$category = $cat['name'];
											}
									?>
				
					<div class="row">
						<div class="col-xs-2"><img class="img-responsive" src="images/<?php echo $img;?>">
						</div>
						<div class="col-xs-6">
							<h4 class="product-name"><strong><?php echo $name;?></strong></h4>
							<span class="small"><strong>Опис: </strong><?php echo $desc ?></span> <br />
							<span class="small"><strong>Категорија: </strong><?php echo $category ?>  <br/> <strong>Количина: </strong><?php echo $quantity?></span>
						</div>
						<br />
						<div class="col-xs-4" style="width: 32%">
							<div class="col-xs-8 text-right">
								<h3><strong><?php echo $price;?> ден.</strong></h3>
							</div>
							<br />
							<div class="col-xs-2 text-center ">
								<a href='<?php echo "deleteTicket.php?delId=$productID"?>'>
									<span class="glyphicon glyphicon-trash" style="font-size: 24px"> </span>
								</a>
							</div>
						</div>
					</div>
					<hr>
							
				<?php  } ?>	
					
				</div>							
								
							<div class="panel-footer">
								<div class="row text-center">
									<div class="col-xs-8">										
										<!-- suma na cenite na biletite -->
										<h4 class="text-right"><p id="total">Вкупно: <?php echo $totalPrice; ?> ден.</p></h4>							
									</div>
									<div class="col-xs-4">									
										<!--PayPal integracija-->
										<form action="Checkout/paypal_ec_redirect.php" method="POST">
										      <input type="hidden" name="PAYMENTREQUEST_0_AMT" value='<?php echo $totalPrice; ?>'></input>
										      <input type="hidden" name="currencyCodeType" value="USD"></input>
										      <input type="hidden" name="paymentType" value="Sale"></input>
										      <!--Pass additional input parameters based on your shopping cart. For complete list of all the parameters click here -->
										      <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="Check out with PayPal"></input>
										</form>										
									</div>
								</div>
							</div>
							
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
