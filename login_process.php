<?php

	session_start();
	
	if(! empty($_POST))
	{
		extract($_POST);
		$_SESSION['error']=array();

		if(empty($unm) || empty($pwd))
		{
			$_SESSION['error'][]="Please enter User Name or Password";

			header("location:login.php");
			exit;
		}
		else
		{
			include("includes/connection.php");

			$unm = mysqli_real_escape_string($link, $unm);
			$pwd = mysqli_real_escape_string($link, $pwd);

			$adminCheck = mysqli_query($link, "select * from admin where a_unm='$unm'");
			if ($adminCheck && mysqli_num_rows($adminCheck) > 0) {
				$_SESSION['error'][] = 'Admin accounts must login from the admin portal at admin/login.php.';
				header("location:login.php");
				exit;
			}

			$q="select * from register where r_unm='$unm' and r_pwd='$pwd'";

			$res=mysqli_query($link,$q);

			if (!$res) {
				$_SESSION['error'][] = 'Login could not be processed. Please try again.';
				header("location:login.php");
				exit;
			}

			$row=mysqli_fetch_assoc($res);

			if(! empty($row))
			{
				$_SESSION['client']['unm']=$row['r_fnm'];
				$_SESSION['client']['id']=$row['r_id'];
				$_SESSION['client']['status']=true;

				header("location:index.php");
			}
			else
			{
				$_SESSION['error'][]="Wrong Username or Password";
				header("location:login.php");
			}
		}
	}
	else
	{
		header("location:login.php");
	}

?>