<?php
	
	session_start();

	if(! empty($_POST))
	{
		extract($_POST);
		$_SESSION['error']=array();

		if(empty($fnm))
		{
			$_SESSION['error']['fnm']="Please enter Full Name";
		}

		if(empty($unm))
		{
			$_SESSION['error']['unm']="Please enter User Name";
		}

		if(empty($pwd) || empty($cpwd))
		{
			$_SESSION['error']['pwd']="Please enter Password";
		}
		else if($pwd != $cpwd)
		{
			$_SESSION['error']['pwd']="Password isn't Match";
		}
		else if(strlen($pwd)<8)
		{
			$_SESSION['error']['pwd']="Please Enter Minimum 8 Digit Password";
		}

		if(empty($email))
		{
			$_SESSION['error']['email']="Please enter E-Mail Address";
		}
		else if(!preg_match("/^[a-z0-9_.+-]+@[a-z0-9_.-]+\.[a-z]{2,}$/i", $email))
		{
			$_SESSION['error']['email']="Please Enter Valid E-Mail Address";
		}

		if(empty($nin))
		{
			$_SESSION['error']['nin']="NIN (National Identification Number) is required";
		}

		if(empty($cno))
		{
			$_SESSION['error']['cno']="Please enter Contact Number (Uganda +256)";
		}
		else
		{
			$cno_clean = preg_replace('/\s+/', '', $cno);
			if(!preg_match('/^[0-9]+$/', $cno_clean))
			{
				$_SESSION['error']['cno']="Contact number must contain digits only (e.g. 256712345678)";
			}
			else
			{
				if(strlen($cno_clean) == 9 && substr($cno_clean, 0, 1) === '7')
					$cno = '256' . $cno_clean;
				elseif(strlen($cno_clean) == 10 && substr($cno_clean, 0, 1) === '0')
					$cno = '256' . substr($cno_clean, 1);
				elseif(strlen($cno_clean) == 12 && substr($cno_clean, 0, 3) === '256')
					$cno = $cno_clean;
				else
					$_SESSION['error']['cno']="Enter valid Uganda number (e.g. 256 7XX XXX XXX or 07XX XXX XXX)";
			}
		}

		if(!empty($error))
		{
			foreach($error as $er)
			{
				echo '<font color="red">'.$er.'</font><br>';
			}
		}

		if(! empty($_SESSION['error']))
		{
			header("location:register.php");
		}

		else
		{
			include("includes/connection.php");

			$t=time();
			$fnm = mysqli_real_escape_string($link, $fnm);
			$unm = mysqli_real_escape_string($link, $unm);
			$pwd = mysqli_real_escape_string($link, $pwd);
			$cno = mysqli_real_escape_string($link, $cno);
			$email = mysqli_real_escape_string($link, $email);
			$nin = mysqli_real_escape_string($link, $nin);

			$q="insert into register(r_fnm,r_unm,r_pwd,r_cno,r_email,r_question,r_answer,r_nin,r_time) values('$fnm','$unm','$pwd','$cno','$email','','','$nin','$t')";

			mysqli_query($link,$q);

			header("location:register.php?register");
		}
	}
	else
	{
		header("location:register.php");
	}

?>