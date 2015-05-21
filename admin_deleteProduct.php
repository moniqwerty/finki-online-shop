<?php 

$productID=$_GET['productid'];

include_once 'database.php';

$q="DELETE FROM products WHERE id=$productID;";
				if (mysqli_query($link, $q))
				{
					header("Location: productsAdmin.php");
				}
				// else 
				// {
				// 	$msg="Неуспешна промена во база!";
				// 	echo mysqli_error($link);
				// }
				
?>