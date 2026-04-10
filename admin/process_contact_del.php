<?php

	session_start();
	
	include("../includes/connection.php");

	$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

	$query = "delete from contact where c_id =".$id;

	$result = mysqli_query($link, $query);

	// optional: handle query failure
	// if (!$result) {
	// 	die('Delete failed: ' . mysqli_error($link));
	// }

	header("location:contact_view.php");

?>