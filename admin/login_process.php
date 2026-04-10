<?php

	session_start();

	include("../includes/connection.php");

	if(!empty($_POST))
	{
		$_SESSION['error']=array();
		extract($_POST);

		$unm = trim($unm);
		$pwd = trim($pwd);

		if(empty($unm) || empty($pwd))
		{
			$_SESSION['error'][]="Required User Name & Password";

			header("location:login.php");
			exit;
		}
		else
		{
			 
            $unm = mysqli_real_escape_string($link, $unm);
            $pwd = mysqli_real_escape_string($link, $pwd);

            $res=mysqli_query($link,"select * from admin where a_unm='$unm' and a_pwd='$pwd'");

			if (!$res) {
				$_SESSION['error'][] = 'Login could not be processed. Please try again.';
				header("location:login.php");
				exit;
			}

			$row=mysqli_fetch_assoc($res);

			if(!empty($row))
			{
				$_SESSION['admin']['unm']=$row['a_unm'];
				$_SESSION['admin']['status']=true;

				header("location:index.php");
				exit;
			}
			else
			{
				$_SESSION['error'][]="Wrong User Name or Password";

				header("location:login.php");
				exit;
			}
		}
	}
	else
	{
		header("location:login.php");
	}
?>