<?php
$link=mysqli_connect("localhost" , "root" ,  "" , "finki-online-shop-db");
$link->set_charset("utf8");
if(!$link) die("Error:" .mysql_connect_error() );
?>