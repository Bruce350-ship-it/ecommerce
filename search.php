<?php include("includes/header.php"); ?>

<div class="post">
	<h2 class="title"><a href="#">Search: <?php echo htmlspecialchars($_GET['s'] ?? ''); ?></a></h2>
	<p class="meta"></p>
	<div class="entry">
		<div class="product-grid">
			<?php
				include("includes/connection.php");
				$s = mysqli_real_escape_string($link, $_GET['s'] ?? '');
				$blq = "SELECT * FROM item WHERE b_nm LIKE '%$s%'";
				$blres = mysqli_query($link, $blq);
				if ($blres):
				while($blrow = mysqli_fetch_assoc($blres)):
			?>
			<div class="item_box">
				<a href="item_detail.php?id=<?php echo (int)$blrow['b_id']; ?>">
					<img src="<?php echo htmlspecialchars($blrow['b_img']); ?>" alt="">
					<h2><?php echo htmlspecialchars($blrow['b_nm']); ?></h2>
					<p>UGX <?php echo number_format($blrow['b_price']); ?></p>
				</a>
			</div>
			<?php endwhile; endif; ?>
		</div>
	</div>
</div>

<?php include("includes/footer.php"); ?>