<?php 

$userID=$_GET['userid'];

include_once 'database.php';

$q="DELETE FROM users WHERE user_id=$userID;";

				if (mysqli_query($link, $q))
				{
					header("Location: usersAdmin.php");
				}
				else 
				{
					$msg="Неуспешна промена во база!";
					echo mysqli_error($link);
				}
				
?>