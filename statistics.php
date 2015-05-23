<?php
session_start();
// include_once 'delete_reservations.php';
if(!empty($_SESSION['adminname'])) {

   $user=$_SESSION['adminname'];
   $_SESSION["type"]="admin";
   $flag=1;

}else{

  header("Location: adminLogin.php");
   
  $flag=0;

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
    <style>
    	a:hover,a:focus {text-decoration: none;}
    	.highcharts-button{visibility: hidden;}
    </style>
<script src="js/jquery.js"></script>
<script src="js/highcharts1.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

   
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
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" style="margin-left: 100px;">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                      
                        <li>
                            <a href="homeAdmin_temp.php"><i class="fa fa-home fa-fw"></i> Почетна</a>
                        </li>
                        <li>
                            <a href="productsAdmin.php"><i class="fa fa-bell-o fa-fw"></i> Продукти</a>
                            
                        </li>
                  
                        <li>
                            <a href="usersAdmin.php"><i class="fa fa-users fa-fw"></i> Корисници </a>
                        </li>
                        <li>
                            <a class="active" href="statistics.php"><i class="fa fa-bar-chart-o fa-fw"></i> Статистики </a>
                           
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
                    <h1 class="page-header" style="margin-left: 15px;">Статистики</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="col-lg-12">
<!--toggle navigation -->
<!--tabs-->
<ul class="nav nav-tabs" role="tablist" id="myTab">
  <!-- <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Најгледани претстави</a></li> -->
  <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Преферирана категорија на продукт</a></li>
  <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Продадени билети</a></li>
</ul>

<div class="tab-content">
  <div role="tabpanel" class="tab-pane" id="home">
  	<!-- tab1 -->  
  	<br>
  		<!-- <div class="panel panel-default">
  			<div class="panel-heading">
  				Најгледани претстави
  				</div>
  	<div id="bar" style="width: 800px; height: 400px;"></div>
  </div> -->
  </div>
  <div role="tabpanel" class="tab-pane" id="messages">
  		<!-- tab2 -->
  		<br>
  		<div class="panel panel-default">
  			<div class="panel-heading">
                            Преферирана категорија на продукт
            </div>
  		<div id="container" style="height: 400px; width: 800px"></div>	
  		</div>
  </div>
  
  <div role="tabpanel" class="tab-pane active" id="settings">
  		 <!-- diagram -->
            <br>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Број на продадени производи месечно
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

             <!--end of diagram-->
  </div>
</div>


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
	
    <script src="js/bootstrap.min.js"></script>
	<script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
  	<script>
  $(function () {
    $('#myTab a:last').tab('show')
  })
	</script>



<script>


<?php
include_once 'database.php';

 //get sold tickets for march
$q3=mysqli_query($link, "SELECT sum(od.quantity) as sold FROM `order_details` od, `order` o WHERE od.order_id=o.id and o.date > '2015-02-31' and o.date < '2015-04-01' group by month(o.date);");
$row3=mysqli_fetch_assoc($q3);
$soldMar=$row3['sold'];
 //get sold tickets for april
$q4=mysqli_query($link, "SELECT sum(od.quantity) as sold FROM `order_details` od, `order` o WHERE od.order_id=o.id and o.date > '2015-03-31' and o.date < '2015-05-01' group by month(o.date)");
$row4=mysqli_fetch_assoc($q4);
$soldApr=$row4['sold'];
//get sold tickets for may
$q5=mysqli_query($link, "SELECT sum(od.quantity) as sold FROM `order_details` od, `order` o WHERE od.order_id=o.id and o.date > '2015-04-31' and o.date < '2015-06-01' group by month(o.date)");
$row5=mysqli_fetch_assoc($q5);
$soldMay=$row5['sold'];
// //get sold tickets for june
$q=mysqli_query($link, "SELECT sum(od.quantity) as sold FROM `order_details` od, `order` o WHERE od.order_id=o.id and o.date > '2015-05-31' and o.date < '2015-07-01' group by month(o.date)");
$row1=mysqli_fetch_assoc($q);
$soldJune=$row1['sold'];
// //get sold tickets for july
$q2=mysqli_query($link, "SELECT sum(od.quantity) as sold FROM `order_details` od, `order` o WHERE od.order_id=o.id and o.date > '2015-06-31' and o.date < '2015-08-01' group by month(o.date)");
$row2=mysqli_fetch_assoc($q2);
$soldJuly=$row2['sold'];



?>


Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: 'Март 2015',
            proizvodi: '<?php if($soldMar!="") echo $soldMar; else echo 0; ?>',
           
        }, {
            period: 'Април 2015',
             proizvodi: '<?php if($soldApr!="") echo $soldApr; else echo 0; ?>',
            
            
        }, {
            period: 'Мај 2015',
            proizvodi: '<?php if($soldMay!="") echo $soldMay; else echo 0; ?>',
            
        }
        , {
            period: 'Јуни 2015',
            proizvodi: '<?php if($soldJune!="") echo $soldJune; else echo 0; ?>',           
        },
        {
            period: 'Јули 2015',
            proizvodi: '<?php if($soldJuly!="") echo $soldJuly; else echo 0;?>',
           
        }
        ],
        xkey: 'period',
        ykeys: ['proizvodi'],
        labels: ['Вкупно продадени производи'],
        pointSize: 2,
        hideHover: 'auto',
        parseTime: false,
        resize: true
    });
	</script>

    <script>
    	function func (st) {
    		document.getElementById(st).style.color = "blue";
		  
		}
    </script>

    <script>




//pie chart data

<?php 
include_once 'database.php';

$cat1=mysqli_query($link, "select sum(od.quantity) as sold from `categories` c, `products` p, `order_details` od where c.id = p.category_id and od.product_id = p.id and c.name='Category 1' group by c.name");
$row11=mysqli_fetch_assoc($cat1);
$catt1=$row11['sold'];

$cat2=mysqli_query($link, "select sum(od.quantity) as sold1 from `categories` c, `products` p, `order_details` od where c.id = p.category_id and od.product_id = p.id and c.name='Category 2' group by c.name");
$row22=mysqli_fetch_assoc($cat2);
$catt2=$row22['sold1'];

$cat3=mysqli_query($link, "select sum(od.quantity) as sold2 from `categories` c, `products` p, `order_details` od where c.id = p.category_id and od.product_id = p.id and c.name='Category 3' group by c.name");
$row33=mysqli_fetch_assoc($cat3);
$catt3=$row33['sold2'];
 


?>



    

      $(function () {

    $(document).ready(function () {
        // Build the chart
        $('#container').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '<b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: false,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: '',
                data: [                    
                    ['Category 1',   parseInt('<?php echo intval($catt1); ?>')],
                    ['Category 2',       parseInt('<?php echo intval($catt2); ?>')],
                    ['Category 3',    parseInt('<?php echo intval($catt3); ?>')]                   
                    
                ]
            }]
        });
    });

});
    </script>

</html>