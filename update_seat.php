<?php

$user_id=$_REQUEST["userid"];
$product_id=$_REQUEST["prodid"];
$quantity=$_REQUEST["quantity"];
$conn=mysqli_connect('localhost','root','','finki-online-shop-db');
 




if(!$cart)
	//nova koshnichka
	$sql="INSERT INTO cart (cart_id, user_id, product_id, quantity) VALUES (NULL, ".$user_id.",".$product_id.",".$quantity.")"; 
else 
{	
	//koshnichkata na korisnikot
	$cart=mysqli_query($conn, "SELECT * FROM cart WHERE user_id LIKE '$user_id'");
	$products = mysqli_fetch_assoc($cart);
	$sql="INSERT INTO cart (user_id, product_id, quantity) VALUES( ".$user_id.",".$product_id.",".$quantity.") WHERE cart_id = ".$products['cart_id'].";";
}

 if(!mysqli_query($conn,$sql))
  /* {
  	$sql2="SELECT MAX(ticket_id) as last from TICKETS";
	if($result=mysqli_query($conn,$sql2))
    {
  	  $row = mysqli_fetch_assoc($result);
	  $id= $row['last'];
	  //update buyback
	  $sql3="INSERT INTO buyback VALUES(null,".$user.",".$id.",".$event.",NOW())";
	  if(mysqli_query($conn,$sql3)){
	  	echo "OK";
	  }
    }
  }
 else */ echo mysqli_error($conn);

 header("Location:shoppingCart.php");

?>