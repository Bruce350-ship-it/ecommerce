<?php
	include("includes/header.php");
?>

<style>
/* Premium Cart Aesthetics */
.cart-dashboard {
    background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 20px 40px -10px rgba(0,0,0,0.08);
    margin-bottom: 40px;
    border: 1px solid rgba(0,0,0,0.05);
}
.cart-header-premium {
    text-align: center;
    margin-bottom: 30px;
}
.cart-header-premium h2 {
    font-size: 2.2rem;
    color: #0f172a;
    font-weight: 800;
    margin: 0 0 8px;
    background: linear-gradient(to right, #0f766e, #2563eb);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.cart-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-bottom: 30px;
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 15px rgba(0,0,0,0.03);
}
.cart-table th {
    background: #f8fafc;
    color: #475569;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.05em;
    padding: 16px;
    text-align: left;
    border-bottom: 2px solid #e2e8f0;
}
.cart-table td {
    padding: 16px;
    color: #334155;
    vertical-align: middle;
    border-bottom: 1px solid #f1f5f9;
}
.cart-table tbody tr {
    transition: background-color 0.2s ease;
}
.cart-table tbody tr:hover {
    background: #f8fafc;
}
.cart-table tfoot td {
    background: #f8fafc;
    font-weight: 800;
    font-size: 1.1rem;
    color: #0f172a;
    border-top: 2px solid #e2e8f0;
}
.cart-img-wrap {
    width: 80px;
    height: 60px;
    border-radius: 8px;
    background: #f8fafc;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 4px;
}
.cart-img-wrap img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    mix-blend-mode: multiply;
}
.qty-input {
    width: 70px;
    padding: 8px;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    text-align: center;
    font-weight: 600;
    color: #0f172a;
    transition: border-color 0.2s;
}
.qty-input:focus {
    outline: none;
    border-color: #0f766e;
    box-shadow: 0 0 0 3px rgba(15,118,110,0.1);
}
.btn-remove {
    color: #ef4444;
    font-weight: 600;
    text-decoration: none;
    padding: 6px 12px;
    border-radius: 6px;
    background: rgba(239, 68, 68, 0.1);
    transition: all 0.2s ease;
    display: inline-block;
}
.btn-remove:hover {
    background: #ef4444;
    color: white;
}
.cart-actions {
    display: flex;
    justify-content: flex-end;
    gap: 16px;
    align-items: center;
}
.btn-update, .btn-checkout {
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 700;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
    font-size: 1rem;
}
.btn-update {
    background: #f1f5f9;
    color: #475569;
}
.btn-update:hover {
    background: #e2e8f0;
    color: #0f172a;
}
.btn-checkout {
    background: linear-gradient(135deg, #0f766e 0%, #0369a1 100%);
    color: white !important;
    box-shadow: 0 4px 12px rgba(15,118,110,0.3);
}
.btn-checkout:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(15,118,110,0.4);
}
.empty-cart-msg {
    text-align: center;
    padding: 60px 20px;
    color: #64748b;
    font-size: 1.2rem;
    font-weight: 500;
    background: white;
    border-radius: 12px;
    border: 1px dashed #cbd5e1;
}
</style>

<div class="cart-dashboard">
	<div class="cart-header-premium">
		<h2>Your Shopping Cart</h2>
		<p style="color: #64748b; margin: 0; font-size: 1.1rem;">Review your items before checkout</p>
	</div>
	
	<div class="entry">
		<?php
			$count = 1;
			$total = 0;
			$hasItems = isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0;
		?>
		<?php if ($hasItems): ?>
		<form action="addtocart.php" method="post">
			<div class="cart-wrap">
				<table class="cart-table">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th width="35%">Product Name</th>
							<th width="15%">Image</th>
							<th width="10%">Qty</th>
							<th width="15%">Price</th>
							<th width="10%">Total</th>
							<th width="10%">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($_SESSION['cart'] as $idx => $val): ?>
							<?php
								$qty  = isset($val['qty']) ? (int)$val['qty'] : 1;
								$rate = $qty * (float)$val['price'];
								$total += $rate;
							?>
							<tr>
								<td style="font-weight: 600; color: #94a3b8;"><?php echo $count++; ?></td>
								<td style="font-weight: 600;"><?php echo htmlspecialchars($val['nm']); ?></td>
								<td>
									<div class="cart-img-wrap">
										<img src="<?php echo htmlspecialchars($val['img']); ?>" alt="">
									</div>
								</td>
					<td><input type="number" min="1" value="<?php echo $qty; ?>" class="qty-input" name="qty[<?php echo (int)$idx; ?>]" data-price="<?php echo (float)$val['price']; ?>"></td>
								<td style="font-weight: 500;">UGX <?php echo number_format($val['price']); ?></td>
								<td style="font-weight: 700; color: #0f766e;">UGX <span class="row-total"><?php echo number_format($rate); ?></span></td>
								<td><a href="addtocart.php?id=<?php echo (int)$idx; ?>" class="btn-remove">Remove</a></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5" style="text-align: right; padding-right: 24px;">Order Total</td>
							<td colspan="2" style="color: #0f766e;">UGX <span id="order-total"><?php echo number_format($total); ?></span></td>
						</tr>
					</tfoot>
				</table>
			</div>
			
			<div class="cart-actions">
				<button type="submit" name="update" class="btn-update">Update Quantities</button>
				<button type="submit" name="checkout" class="btn-checkout">Confirm & Checkout</button>
			</div>
		</form>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const qtyInputs = document.querySelectorAll('.qty-input');
            const totalDisplay = document.getElementById('order-total');
            
            function formatCurrency(num) {
                return num.toLocaleString('en-US');
            }

            function updateTotals() {
                let grandTotal = 0;
                qtyInputs.forEach(input => {
                    const price = parseFloat(input.dataset.price);
                    const qty = parseInt(input.value) || 0;
                    const rowTotal = price * qty;
                    grandTotal += rowTotal;
                    
                    const rowTotalSpan = input.closest('tr').querySelector('.row-total');
                    if (rowTotalSpan) {
                        rowTotalSpan.textContent = formatCurrency(rowTotal);
                    }
                });
                totalDisplay.textContent = formatCurrency(grandTotal);
            }

            qtyInputs.forEach(input => {
                input.addEventListener('input', updateTotals);
                input.addEventListener('change', updateTotals);
            });
        });
        </script>
		<?php else: ?>
			<div class="empty-cart-msg">
                <div style="font-size: 3rem; margin-bottom: 16px;">🛒</div>
                <p>Your cart is currently empty.</p>
                <a href="index.php" class="btn-checkout" style="display: inline-block; margin-top: 16px;">Continue Shopping</a>
            </div>
		<?php endif; ?>
	</div>
</div>

<?php include("includes/footer.php"); ?>