<?php
	session_start();

	if(isset($_GET['bcid']))
	{
		include("includes/connection.php");

		$bcid = (int)$_GET['bcid'];
		$q="select * from item where b_id=".$bcid;

		$res=mysqli_query($link,$q);

		if(!$res)
		{
			die('Add to cart query failed: ' . mysqli_error($link));
		}

		$row=mysqli_fetch_assoc($res);
		if(!$row)
		{
			header("location:cart.php");
			exit;
		}

		if(!isset($_SESSION['cart']) || !is_array($_SESSION['cart']))
		{
			$_SESSION['cart'] = [];
		}

		$foundIndex = null;
		foreach($_SESSION['cart'] as $i => $val)
		{
			if(isset($val['id']) && (int)$val['id'] === (int)$row['b_id'])
			{
				$foundIndex = $i;
				break;
			}
		}

		if($foundIndex !== null)
		{
			$_SESSION['cart'][$foundIndex]['qty'] = (int)$_SESSION['cart'][$foundIndex]['qty'] + 1;
		}
		else
		{
			$_SESSION['cart'][]=array("id" => (int)$row['b_id'], "nm"=>$row['b_nm'],"img"=>$row['b_img'],"price"=>$row['b_price'],"qty"=>1);
		}
	}

	else if(!empty($_POST))
	{
		if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && isset($_POST['qty']) && is_array($_POST['qty'])) {
			foreach($_POST['qty'] as $id=>$qty)
			{
				if (isset($_SESSION['cart'][$id])) {
					$qty = (int)$qty;
					if ($qty > 0) {
						$_SESSION['cart'][$id]['qty'] = $qty;
					} else {
						unset($_SESSION['cart'][$id]);
					}
				}
			}
		}
		if (isset($_POST['checkout'])) {
			header("location:order.php");
			exit;
		}
	}

	else if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		unset($_SESSION['cart'][$id]);
	}

	header("location:cart.php");
	exit;
?>