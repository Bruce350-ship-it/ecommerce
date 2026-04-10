<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JK Computers and Accessories</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header class="site-header">
		<div class="header-inner">
			<input type="checkbox" id="nav-toggle" class="nav-toggle-checkbox" aria-label="Toggle menu">
			<label for="nav-toggle" class="nav-toggle-label" aria-hidden="true">
				<span></span><span></span><span></span>
			</label>
			<div class="logo">
				<a href="index.php"><span class="logo-jk">JK</span> Computer & Accessories</a>
			</div>
			<nav class="nav-wrapper">
				<ul class="nav-menu">
					<li><a href="index.php">Home</a></li>
					<?php if(isset($_SESSION['client']['status'])): ?>
						<li><a href="logout.php">Logout</a></li>
					<?php else: ?>
						<li><a href="login.php">Login</a></li>
						<li><a href="register.php">Register</a></li>
					<?php endif; ?>
					<li><a href="contact.php">Contact</a></li>
					<?php $cartCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
					<li><a href="cart.php" class="nav-cart" style="display: inline-flex; align-items: center; gap: 6px;"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 256 256" style="flex-shrink: 0;"><path d="M222.14,58.87A8,8,0,0,0,216,56H54.68L49.79,29.14A16,16,0,0,0,34.05,16H16a8,8,0,0,0,0,16h18L59.56,172.29a24,24,0,0,0,5.33,11.27,28,28,0,1,0,44.4,8.44h45.42a27.75,27.75,0,0,0-2.71,12,28,28,0,1,0,28-28H91.17a8,8,0,0,1-7.87-6.57L80.58,152h116a24,24,0,0,0,23.61-19.71l12.16-66.86A8,8,0,0,0,222.14,58.87ZM96,204a12,12,0,1,1-12-12A12,12,0,0,1,96,204Zm96,0a12,12,0,1,1-12-12A12,12,0,0,1,192,204Zm24.53-72.53L204.37,136H77.67L57.59,72H211.51Z"></path></svg> Cart (<?php echo $cartCount; ?>)</a></li>
				</ul>
			</nav>
			<div class="header-search">
				<form method="get" action="search.php">
					<input type="text" name="s" placeholder="Search products" aria-label="Search">
					<input type="submit" value="Search">
				</form>
			</div>
		</div>
	</header>

	<div class="page-wrap">
		<aside class="sidebar">
			<?php if(isset($_SESSION['client']['status'])): ?>
			<div class="sidebar-card">
				<p class="user-greeting">Hi, <?php echo htmlspecialchars($_SESSION['client']['unm'] ?? ''); ?></p>
				<ul>
					<li><a href="logout.php">Log out</a></li>
				</ul>
			</div>
			<?php endif; ?>
			<div class="sidebar-card">
				<h2>Categories</h2>
				<ul>
					<?php
						include(__DIR__ . "/connection.php");
						$cat_q = "SELECT * FROM category ORDER BY cat_nm ASC";
						$cat_res = mysqli_query($link, $cat_q);
						if ($cat_res):
						while($cat_row = mysqli_fetch_assoc($cat_res)):
					?>
					<li><a href="item_list.php?id=<?php echo (int)$cat_row['cat_id']; ?>&cat=<?php echo urlencode($cat_row['cat_nm']); ?>"><?php echo htmlspecialchars($cat_row['cat_nm']); ?></a></li>
					<?php endwhile; endif; ?>
				</ul>
			</div>
			<div class="sidebar-card">
				<h2>Statistics</h2>
				<ul>
					<li><a href="statistics.php">View charts</a></li>
				</ul>
			</div>
		</aside>
		<main class="main-content">
