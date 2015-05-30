<?php
include_once 'database.php';

$del;
if (isset($_GET["delId"])) {
	 $del = $_GET["delId"];	
}	
echo $del;	 
$query=mysqli_query($link, "DELETE FROM cart WHERE product_id LIKE '$del'");

if($query)
 header("Location: shoppingCart.php");


?>