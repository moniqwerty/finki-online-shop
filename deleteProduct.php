<?php
include_once 'database.php';
session_start();
$del;
$uID;
if (isset($_GET["delId"])) {
	 $del = $_GET["delId"];	
}	
echo $del;	
//get user ID
if(isset($_SESSION['username']))
{
	$u = $_SESSION['username'];
	$user=mysqli_query($link, "SELECT * FROM users WHERE username LIKE '$u'");
	$userID=mysqli_fetch_assoc($user);
	$uID=$userID['user_id'];
}

$quantity = "SELECT quantity FROM `cart` WHERE user_id=".$uID." and product_id=".$del;
if ($res=mysqli_query($link, $quantity)){
	$row = mysqli_fetch_row($res);
	$resInt = $row[0];

	$sql="";
	if (intval($resInt)<=1){
		$sql="DELETE FROM cart WHERE product_id LIKE '$del' and user_id=".$uID;
	}
	else {
		$quantity = $resInt - 1;
		$sql="UPDATE `cart` set quantity = ".$quantity." where user_id=".$uID." and product_id=".$del;
	}
}
else {
	echo mysqli_error($link);
}

$query=mysqli_query($link, $sql);

if($query)
 header("Location: shoppingCart.php");


?>