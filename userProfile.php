<!DOCTYPE html>
<?php
 include_once 'database.php';
?>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>E-tickets Shop</title>

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
				<div class="panel">
				<h2 class="text-center"><?php echo $_SESSION['username']?>  овде можете да ги видите вашите нарачки</h2>
				</div>
				<div class="col-xs-8">
					<h3 class="text-center">Купени производи:</h3>	
					<div class="table-responsive">
					  <table class="table table-striped">
					       <thead>
						    <tr>
						        <th>Име на производ</th>
						        <th>Дата</th>
								<th>Количина</th>
						        <th>Цена</th>
						        <th>Вкупно</th>
						    </tr>
						    <tbody>
							<?php 
								$u=$_SESSION['username'];
								$user=mysqli_query($link, "SELECT distinct * FROM users WHERE username LIKE '$u'");
								$id=mysqli_fetch_assoc($user);
								$userID=$id['user_id'];
								
								//gi naogame site rezervirani producti od korisnikot
								$orders=mysqli_query($link, "SELECT * FROM `orders` WHERE user_id LIKE '$userID'");

								//gi naogame site kupeni producti od korisnikot
								while ($order=mysqli_fetch_assoc($orders)) {
									$orderID=$order['id'];
									$product= $order['product_id'];
									$quantity = $order['quantity'];
									$cost = $order['cost'];
									$date = $order['date'];

									$productInfoPrev=mysqli_query($link, "SELECT * FROM products WHERE id LIKE '$product'");									
									while ($pr=mysqli_fetch_assoc($productInfoPrev)) {
										$name=$pr['name'];
										$price=$pr['price'];	
										
							?>
							    <tr>
							        <td><?php echo $name; ?></td>
									 <td><?php echo $date; ?></td>
									<td><?php echo $quantity; ?></td>
							        <td><?php echo $price; ?></td>
									<td><?php echo $cost; ?></td>
							    </tr>
							    	<?php  } }?>
						    </tbody>
						    </thead>
					  </table>
					</div>			
				</div>	
				
				
<div class="container">

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
