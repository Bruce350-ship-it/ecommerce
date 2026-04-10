<?php

	session_start();
	
	include("../includes/connection.php");

	$query="delete from category where cat_id =".$_GET['id'];

	$result=mysqli_query($link,$query);

	header("location:category_view.php");

?>