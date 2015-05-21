<?php 
$productID=$_GET['productid'];
//echo $productID;
include_once 'database.php';
session_start();

//selektiraj vrednosti  promenlivi
$res=mysqli_query($link,"Select * from products where id=$productID");
$row=mysqli_fetch_assoc($res);

$name=$row['name'];
$des = $row['description'];
$price = $row['price'];
$catId = $row['category_id'];

$largeImg=$row['big_img'];
$smallImg=$row['small_img'];


$res2=mysqli_query($link, "Select name from categories where id=$catId");
$row2=mysqli_fetch_assoc($res2);
$cat=$row2['name'];

$n = "";
$flag = false;
$imgL=false;
$imgS=false;
if (isset($_POST['submit'])) {
//upload
	$msg = "";	

		if ($name != null && $des != null && $price != null) {
			//promeni vo baza 
            
			  $q="UPDATE products p set p.name='$_POST[event]', p.description='$_POST[des]', p.category_id='$_POST[cat]', p.price='$_POST[price]' WHERE p.id=$productID";
				if (mysqli_query($link, $q))
				{
					header("Location: productsAdmin.php");
				}
				else 
				{
					$msg="Неуспешна промена во база!";
					echo mysqli_error($link);
				}


			
		} else {
			$msg = "Пополнете ги сите полиња";			
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>homeAdmin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Event Details</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/plugins/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;border:0px; width:1280px;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style="margin-left: 100px;">E-tickets Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="margin-left: 100px;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="homeAdmin.php"><i class="fa fa-home fa-fw"></i> Почетна</a>
                        </li>
                        <li>
                            <a class="active" href="eventsAdmin.php"><i class="fa fa-bell-o fa-fw"></i> Продукти</a>
                            
                        </li>
                        
                        <li>
                            <a href="usersAdmin.php"><i class="fa fa-users fa-fw"></i> Корисници </a>
                        </li>
                        <li>
                            <a href="statistics.php"><i class="fa fa-bar-chart-o fa-fw"></i> Статистики </a>
                           
                        </li>
                                               
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" style="width: 900px; margin-left: 350px;">
        	<div class="row">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style="margin-left: 15px;">Измени продукт</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="col-lg-12">
<?php
if (isset($_POST['submit'])) {
	echo "<h5 style=color:red>" . $msg . "</h5>";
}
?>
            <!--updating event form -->
            
        <form action="" method="post"  enctype="multipart/form-data" >
		<div class="form-group">
		<label for="event">Име:</label>
		<input type="text" class="form-control" name="event" id="event" value="<?php echo $name; ?>">
		
		<label for="des">Опис:</label>
		<input type="text" class="form-control" name="des" id="des" value="<?php echo $des; ?>">

		<label for="des">Цена:</label>
		<input type="text" class="form-control" name="price" id="price" value="<?php echo $price; ?>">		
		
		<label> Категорија:</label>
		<br/>
		<?php $query = "SELECT * FROM categories ";
			//select na vekepostoecki kategorii
			print "<select name='cat' id='cat'>";
			$result = mysqli_query($link, $query);
			if ($result) {
				while ($row = mysqli_fetch_assoc($result)) {
					print "<option value='" . $row['id'] . "' ";
		
					($row['name']==$cat? print " selected ": print "");
					print ">" . $row['name'] . "</option>";
				}
			}
			print "</select><br/>";
		?>	
		
		</div>		
		
		
		<input  class="btn btn-default" type="submit"  value="Измени" name="submit" id="submit"  />
		
		</form>
           
           
            <!-- /.row -->
         </div>   
            <!-- /.row -->
        </div>
        <!--end of row -->
        </div>
        <!-- /#page-wrapper -->

    
    <!-- /#wrapper -->

  <!-- jQuery -->
  
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
    
   
</body>
	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
    
</html>

