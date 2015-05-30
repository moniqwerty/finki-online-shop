<?php
include_once 'database.php';

$user_id=$_REQUEST["userid"];
$product_id=$_REQUEST["prodid"];
$quantity=$_REQUEST["quantity"];
$conn=mysqli_connect('localhost','root','','finki-online-shop-db');

if(!$user_id){
	header("Location:login.php");
}
else {
	//$cart=mysqli_query($conn, "SELECT * FROM cart WHERE user_id LIKE '$user_id'"); 
	//if(!$cart)
		//nova koshnichka
		$sql="INSERT INTO cart (cart_id, user_id, product_id, quantity) VALUES (NULL, ".$user_id.",".$product_id.",".$quantity.")"; 
	/* else 
	{	
		//koshnichkata na korisnikot
		$products = mysqli_fetch_assoc($cart);
		$sql="INSERT INTO cart (user_id, product_id, quantity) VALUES( ".$user_id.",".$product_id.",".$quantity.") WHERE cart_id = ".$products['cart_id'].";";
	} */
	 if(!mysqli_query($conn,$sql))
		echo mysqli_error($conn);
	 header("Location:shoppingCart.php");
}
?>