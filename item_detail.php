<?php
	include("includes/header.php");

	include("includes/connection.php");

	$bid=(int)($_GET['id'] ?? 0);

	$item_query="select * from item,category where b_cat=cat_id and b_id=$bid";

	$item_res=mysqli_query($link,$item_query);

	if(!$item_res)
	{
		die('Item query failed: ' . mysqli_error($link));
	}

	$item_row=mysqli_fetch_assoc($item_res);
	if(!$item_row)
	{
		die('Item not found.');
	}
?>

<div class="post">
	<h2 class="title"><a href="item_list.php?id=<?php echo (int)$item_row['cat_id']; ?>&cat=<?php echo urlencode($item_row['cat_nm']); ?>"><?php echo htmlspecialchars($item_row['cat_nm']); ?></a></h2>
	<p class="meta"></p>
	<div class="entry">
		<table class="item_detail" width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr valign="top">
				<td width="48%" style="padding-right: 24px;">
					<div class="product-img-zoom">
						<img class="item_img product-img-main" src="<?php echo htmlspecialchars($item_row['b_img']); ?>" width="280" height="350" alt="<?php echo htmlspecialchars($item_row['b_nm']); ?>" title="Click to zoom">
					</div>
					<p class="zoom-hint">Click image to zoom</p>
					<div id="img-lightbox" class="lightbox" role="dialog" aria-label="Zoomed image" aria-modal="true" tabindex="-1" hidden>
						<button type="button" class="lightbox-close" aria-label="Close">&times;</button>
						<div class="lightbox-backdrop"></div>
						<div class="lightbox-content">
							<img src="<?php echo htmlspecialchars($item_row['b_img']); ?>" alt="<?php echo htmlspecialchars($item_row['b_nm']); ?>">
						</div>
					</div>
				</td>
				<td>
					<h1><?php echo htmlspecialchars($item_row['b_nm']); ?></h1>
					<p class="desc"><?php echo nl2br(htmlspecialchars($item_row['b_desc'])); ?></p>
					<p class="price">UGX <?php echo number_format($item_row['b_price']); ?></p>



							<?php

								$is_cart=0;

								if(isset($_SESSION['cart']))
								{
									foreach($_SESSION['cart'] as $id=>$val)
									{
										if(isset($val['id']) && (int)$val['id'] === (int)$item_row['b_id'])
										{	
											$is_cart=1;
											break;
										}
									}
								}

								if($is_cart==0)
								{
									echo '<a href="addtocart.php?bcid='.$item_row['b_id'].'" class="cart_btn">Add to Cart</a>';
									if(!isset($_SESSION['client']['status']))
									{
										echo ' <a style="text-decoration: none; font-size: 0.9em;" href="login.php">Login</a> to save cart across devices.';
									}
								}
								else
								{
									echo "Already in Cart";
								}
							?>


						</td>
					</tr>
				</table>

	</div>
</div>

<script>
(function() {
	var lb = document.getElementById('img-lightbox');
	var mainImg = document.querySelector('.product-img-main');
	var closeBtn = document.querySelector('.lightbox-close');
	var backdrop = document.querySelector('.lightbox-backdrop');
	if (lb && mainImg) {
		function open() { lb.hidden = false; document.body.style.overflow = 'hidden'; lb.focus(); }
		function close() { lb.hidden = true; document.body.style.overflow = ''; }
		mainImg.addEventListener('click', open);
		if (closeBtn) closeBtn.addEventListener('click', close);
		if (backdrop) backdrop.addEventListener('click', close);
		lb.addEventListener('keydown', function(e) { if (e.key === 'Escape') close(); });
	}
})();
</script>
<?php include("includes/footer.php"); ?>

