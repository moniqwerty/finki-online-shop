<?php 
session_start();

if(!empty($_SESSION['adminname'])) {

   $user=$_SESSION['adminname'];
   $_SESSION["type"]="admin";
   $flag=1;

}else{

  header("Location: adminLogin.php");
   
  $flag=0;

}


include_once 'database.php';
if(isset($_GET['event_id'])) 
{
	$event_id=$_GET['event_id'];
	mysqli_query($link,"UPDATE events SET active = IF(active=0,1,0) where event_id=$event_id");
	header("Location: eventsAdmin.php"); 
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

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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
                <a class="navbar-brand" href="index.html" style="margin-left: 100px;">Finki online shop</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    
                    <!-- /.dropdown-messages 
                </li> -->
                <!-- /.dropdown -->
                
              
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <?php	if ($flag==1){ ?>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                        
                            <a href="logout.php">
                                Logout
                            </a>
                        <?php   } ?>
                          
                        </li>
                    </ul>
                    
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links-->

            <div class="navbar-default sidebar" role="navigation" style="margin-left: 100px;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="homeAdmin_temp.php"><i class="fa fa-home fa-fw"></i> Почетна</a>
                        </li>
                        <li>
                            <a class="active" href="productsAdmin.php"><i class="fa fa-bell-o fa-fw"></i> Продукти</a>
                            
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
                    <h1 class="page-header" style="margin-left: 15px;">Продукти</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="col-lg-12">

            <table class="table table-striped table-hover">
  			<tr class="active" align="center">
  				<th class="text-center">Име</th>
  				<th class="text-center">Опис</th>
  				<th class="text-center">Категорија ID</th>
  				<th class="text-center">Цена</th>
          <th class="text-center">Купени</th>
  				<th class="text-center">Измени</th>
  				<th class="text-center">Деактивирај</th>         
  				
  			</tr>
  			<?php 
  			include_once 'database.php';
  			//$counter sluzi za boenje na tabelata
  			$counter=0;
  			$query="SELECT products.*, coalesce(order_details.quantity, 0) as num_bought FROM products LEFT OUTER JOIN order_details ON products.id = order_details.product_id order by products.id";
  			$res=mysqli_query($link, $query);

  			while($row=mysqli_fetch_assoc($res))			{

  	  			echo "<tr class='info'>" .
  	  			 "<td class=\"text-center\"> $row[name] </td>".
  	  			 "<td class=\"text-center\">$row[description]</td>".
  	  			 "<td class=\"text-center\">$row[category_id]</td>".
             "<td class=\"text-center\">$row[price]</td>".
             "<td class=\"text-center\">$row[num_bought]</td>".
  	  			 "<td class=\"text-center\"><a href=\"admin_editProduct.php?productid=$row[id]\">Измени</a></td>".
  	  			 "<td class=\"text-center\"><a href=\"admin_deleteProduct.php?productid=$row[id]\">Избриши</a></td>";//todo
                 "</tr>";			
  				}  			
  			?>
			</table>           
           
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
  
    
</html>

