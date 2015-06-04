<?php
include_once 'database.php';
// go naogame id-to na logiraniot korisnik
$u=$_SESSION['username'];
$user=mysqli_query($link, "SELECT * FROM users WHERE username LIKE '$u'");
$userID=mysqli_fetch_assoc($user);
$uID=$userID['user_id'];
//gi naogame site proizvodi od kosnickata
$products=mysqli_query($link, "SELECT * FROM cart WHERE user_id LIKE '$uID'");
while ($prod=mysqli_fetch_assoc($products)) {
	$product=$prod['product_id'];
	$quant=$prod['quantity'];

	$price;
	$prices=mysqli_query($link, "SELECT * FROM products WHERE id LIKE '$product'");
	while ($pr=mysqli_fetch_assoc($prices)) {
	$price=$pr['price'];
	}
	$cost=$price*$quant;
	
	//gi vnesuvame bo baza kupenite produkti za korisnikot
	$query1="INSERT INTO orders (user_id,product_id,quantity,cost,date) VALUES ('$uID','$product','$quant','$cost',CURRENT_DATE)";
	$insertIntoBought=mysqli_query($link, $query1);
}
//gi briseme soodvetnite produkti od kosnicka
$query2="DELETE FROM cart WHERE user_id LIKE '$uID'";
$deleteFromReserved=mysqli_query($link, $query2);
?>