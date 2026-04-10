		</main>
	</div>

	<footer class="site-footer">
		<div class="footer-inner">
			<div class="footer-grid">
				<div class="footer-col footer-brand">
					<h3>JK Computers & Accessories</h3>
					<p>Your trusted source for computers and accessories in Uganda. Quality products at great prices.</p>
				</div>
				<div class="footer-col">
					<h4>Quick links</h4>
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="login.php">Login</a></li>
						<li><a href="register.php">Register</a></li>
						<li><a href="cart.php">Cart</a></li>
						<li><a href="contact.php">Contact us</a></li>
					</ul>
				</div>
				<div class="footer-col">
					<h4>Categories</h4>
					<ul>
						<?php
							include(__DIR__ . "/connection.php");
							$fcat = @mysqli_query($link, "SELECT cat_id, cat_nm FROM category ORDER BY cat_nm ASC LIMIT 6");
							if ($fcat) while ($fc = mysqli_fetch_assoc($fcat)):
						?>
						<li><a href="item_list.php?id=<?php echo (int)$fc['cat_id']; ?>&cat=<?php echo urlencode($fc['cat_nm']); ?>"><?php echo htmlspecialchars($fc['cat_nm']); ?></a></li>
						<?php endwhile; ?>
					</ul>
				</div>
				<div class="footer-col">
					<h4>Get in touch</h4>
					<p>Have questions? We’d love to hear from you.</p>
					<a href="contact.php" class="footer-cta">Contact us</a>
				</div>
			</div>
			<div class="footer-bottom">
				<p>&copy; <?php echo date('Y'); ?> JK Computer and Accessories. All rights reserved.</p>
			</div>
		</div>
	</footer>
</body>
</html>
