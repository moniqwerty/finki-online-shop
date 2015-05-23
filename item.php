<!DOCTYPE html>
<html lang="en">
<?php include_once 'database.php';
 //include_once 'delete_reservations.php';?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Shop</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">
    <style>
    .btn-left{float:left !important; margin-left:-15px !important;}
	.btn-right{float:right !important; margin-right:-45px !important;}
	</style>
</head>

<body>

    <!-- Navigation -->
    <?php session_start();
	include_once 'navBar.php';
 ?>			
    <!-- Page Content -->
    <div class="container">

        <div class="row">
			<?php include_once 'listCategories.php'?>

            <div class="col-md-9">
            	<?php 
            	//zemanje na productId 
            		$productId=0;				
				     if (isset($_GET['ev'])) {
					    $productId=$_GET['ev'];
					 }
            		$products=mysqli_query($link, "SELECT * FROM products WHERE id LIKE '$productId'");
					   while ($product=mysqli_fetch_assoc($products)) {	
				?>
				<?php
				//citanje od baza za cena
                        		$products=mysqli_query($link, "SELECT * FROM products WHERE id LIKE '$productId'");
								$product=mysqli_fetch_assoc($products);
									//$time=$product['period_time'];
									//$date=$product['period_date'];
									$priceProduct = $product['price'];
									
                        		//$prices=mysqli_query($link, "SELECT * FROM tickets WHERE event_id LIKE '$productId'");
								//$pr=mysqli_fetch_assoc($prices);
									//$price=$pr['price'];
									//formatiranje za poubav prikaz na casot, da ne pokazuva i sekundi 
								//$timeFormated=substr($time, 0, -3);
								
                        ?>
			<div class="thumbnail">
                    <img class="img-responsive" src="images/<?php echo $product['big_img'];?>" alt="http://placehold.it/800x300"/>
                    <div class="caption-full">
                        <h4 class="pull-right"><?php echo $priceProduct . "денари"; ?></h4>
                        <h4><a><?php echo $product['name']?></a></h4>
                        
                        <p><?php echo $product['description']?></p>
						<!--<form method="POST" action="">
						Количина: <input type="text" name="quantity"></input>
						</form>-->
                    </div>
                      <div class="col-md-4 btn-left">
                        <h3> <a class="btn btn-info" href="homeUser.php">Назад</a></h3>
                    </div> 
					
					<?php
					// go naogame id-to na logiraniot korisnik
										$u=$_SESSION['username'];
										$user=mysqli_query($link, "SELECT * FROM users WHERE username LIKE '$u'");
										$userID=mysqli_fetch_assoc($user);
										$uID=$userID['user_id'];
					?>
                    <div class="col-md-4 btn-right">
                        <h3> <a class="btn btn-info" href="<?php echo "update_seat.php?userid=$uID&prodid=".$product['id']."&quantity=1"; ?>">Додади во кошничка</a></h3>
						
                    </div>  
 
                </div>	
                <?php }?>                
           

            </div>

        </div>

    </div>
    
    
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
