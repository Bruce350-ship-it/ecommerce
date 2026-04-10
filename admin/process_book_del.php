<?php

	session_start();
	
	include("../includes/connection.php");

	$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

	$query="delete from item where b_id =".$id;

	$result=mysqli_query($link,$query);

	header("location:item_view.php");

?>