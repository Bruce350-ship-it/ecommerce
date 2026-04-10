<?php

	session_start();

	include("includes/connection.php");

	if(!empty($_POST))
	{
		extract($_POST);
		extract($_SESSION);

		$_SESSION['error']=array();

		if(empty($fnm))
		{
			$_SESSION['error'][]="Enter Full Name";
		}

		if(empty($add))
		{
			$_SESSION['error'][]="Enter Full Address";
		}

		if(empty($pc))
		{
			$_SESSION['error'][]="Enter City Pincode";
		}

		if(empty($city))
		{
			$_SESSION['error'][]="Enter City";
		}

		if(empty($state))
		{
			$_SESSION['error']['state']="Enter State";
		}

		if(empty($mno))
		{
			$_SESSION['error'][]="Enter Mobile Number";
		}
		else if(!is_numeric($mno))
		{
			$_SESSION['error'][]="Enter Mobile Number in Numbers";
		}

		if(!empty($_SESSION['error']))
		{
			header("location:order.php");
		}
		elseif(!isset($_SESSION['client']['id']))
		{
			$_SESSION['error'][]="Please login to place an order.";
			header("location:login.php");
		}
		else
		{
			$rid = (int) $_SESSION['client']['id'];
			$fnm = mysqli_real_escape_string($link, $fnm);
			$add = mysqli_real_escape_string($link, $add);
			$pc = (int) $pc;
			$city = mysqli_real_escape_string($link, $city);
			$state = mysqli_real_escape_string($link, $state);
			$mno = mysqli_real_escape_string($link, $mno);

			$q="INSERT INTO `order` (
						`o_id` ,
						`o_name` ,
						`o_address` ,
						`o_pincode` ,
						`o_city` ,
						`o_state` ,
						`o_mobile` ,
						`o_rid`
						)
						VALUES (
						NULL , '$fnm', '$add', $pc, '$city', '$state', '$mno', $rid
						)";

			$res=mysqli_query($link,$q);

			header("location:order.php?order");
		}
	}
	else
	{
		header("location:order.php");
	}
?>