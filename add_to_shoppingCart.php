<?php
include_once 'database.php';

$user_id=$_REQUEST["userid"];
$product_id=$_REQUEST["prodid"];
$quantity=$_REQUEST["quantity"];
//$conn=mysqli_connect('localhost','root','','finki-online-shop-db');

if(!$user_id){
	header("Location:login.php");
}
else {
	//$cart=mysqli_query($conn, "SELECT * FROM cart WHERE user_id LIKE '$user_id'"); 
	//if(!$cart)
		//nova koshnichka
		$isInCart = "SELECT count(*) FROM `cart` WHERE user_id=".$user_id." and product_id=".$product_id;
		if ($res=mysqli_query($link, $isInCart)){
			$row = mysqli_fetch_row($res);
			$resInt = $row[0];
				
			$sql="";
			if (intval($resInt)==0){
				$sql="INSERT INTO cart (cart_id, user_id, product_id, quantity) VALUES (NULL, ".$user_id.",".$product_id.",".$quantity.")";
			}
			else {
				$quantity = $quantity + 1;
				$sql="UPDATE `cart` set quantity = ".$quantity." where user_id=".$user_id." and product_id=".$product_id;
			}
			echo $sql;
		}
		else {
			echo mysqli_error($link);
		}
	/* else 
	{	
		//koshnichkata na korisnikot
		$products = mysqli_fetch_assoc($cart);
		$sql="INSERT INTO cart (user_id, product_id, quantity) VALUES( ".$user_id.",".$product_id.",".$quantity.") WHERE cart_id = ".$products['cart_id'].";";
	} */
	 if(!mysqli_query($link,$sql))
		echo mysqli_error($link);
	 header("Location:shoppingCart.php");
}
?>