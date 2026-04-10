<?php
	include("includes/header.php");

	include("includes/connection.php");
?>

<style>
/* Premium Checkout Aesthetics */
.checkout-dashboard {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-radius: 20px;
    padding: 30px;
    margin-bottom: 40px;
    border: 1px solid rgba(255,255,255,0.4);
    box-shadow: 0 25px 50px -12px rgba(0,0,0,0.1);
}
.checkout-header {
    text-align: center;
    margin-bottom: 40px;
}
.checkout-header h2 {
    font-size: 2.4rem;
    color: #0f172a;
    font-weight: 800;
    margin: 0 0 10px;
    background: linear-gradient(to right, #0f766e, #2563eb);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.checkout-grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 30px;
}
.checkout-card {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.8);
    border-radius: 16px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.03);
}
.checkout-card h3 {
    margin-top: 0;
    font-size: 1.4rem;
    color: #1e293b;
    font-weight: 700;
    border-bottom: 2px solid #e2e8f0;
    padding-bottom: 12px;
    margin-bottom: 24px;
}
.form-group {
    margin-bottom: 20px;
}
.form-label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #475569;
    font-size: 0.95rem;
}
.form-input {
    width: 100%;
    padding: 12px 16px;
    background: rgba(255, 255, 255, 0.9);
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    color: #0f172a;
    font-family: inherit;
    transition: all 0.2s ease;
}
.form-input:focus {
    outline: none;
    border-color: #0f766e;
    box-shadow: 0 0 0 4px rgba(15,118,110,0.1);
    background: #fff;
}
.btn-submit {
    width: 100%;
    padding: 14px 20px;
    background: linear-gradient(135deg, #0f766e 0%, #0369a1 100%);
    color: white;
    font-size: 1.1rem;
    font-weight: 700;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(15,118,110,0.3);
    margin-top: 10px;
}
.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(15,118,110,0.4);
}
.alert {
    padding: 16px;
    border-radius: 10px;
    margin-bottom: 24px;
    font-weight: 600;
}
.alert-error {
    background: rgba(239, 68, 68, 0.1);
    border: 1px solid rgba(239, 68, 68, 0.2);
    color: #dc2626;
}
.alert-success {
    background: rgba(16, 185, 129, 0.1);
    border: 1px solid rgba(16, 185, 129, 0.2);
    color: #059669;
}
.summary-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 16px;
    font-size: 1rem;
    color: #475569;
}
.summary-total {
    display: flex;
    justify-content: space-between;
    border-top: 2px dashed #cbd5e1;
    margin-top: 20px;
    padding-top: 20px;
    font-size: 1.4rem;
    font-weight: 800;
    color: #0f766e;
}
.summary-qty {
    font-weight: 700;
    color: #64748b;
    margin-right: 8px;
}

@media (max-width: 768px) {
    .checkout-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php
	$cartTotal = 0;
	$cartItems = [];
	if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
	    foreach($_SESSION['cart'] as $idx => $val) {
	        $qty  = isset($val['qty']) ? (int)$val['qty'] : 1;
	        $price = (float)$val['price'];
	        $cartTotal += $qty * $price;
	        $cartItems[] = [
	            'nm' => $val['nm'],
	            'qty' => $qty,
	            'price' => $price * $qty
	        ];
	    }
	} else if (isset($_GET['total'])) {
	    $cartTotal = (int)$_GET['total'];
	}
?>

<div class="checkout-dashboard">
    <div class="checkout-header">
        <h2>Checkout - Cash On Delivery</h2>
        <p style="color: #64748b; margin: 0; font-size: 1.1rem;">Provide your shipping details to complete your order</p>
    </div>

    <div class="checkout-grid">
        <!-- Billing Details Form -->
        <div class="checkout-card">
            <h3>Billing Details</h3>
            
            <?php if(isset($_GET['order'])): ?>
                <div class="alert alert-success">
                    ✓ Order Successfully Placed! Thank you for shopping with us.
                </div>
            <?php endif; ?>

            <?php if(!empty($_SESSION['error'])): ?>
                <div class="alert alert-error">
                    <?php 
                        foreach($_SESSION['error'] as $er) {
                            echo htmlspecialchars($er) . "<br>";
                        }
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <form role="form" action="order_process.php" method="post">
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="fnm" class="form-input" placeholder="Enter your full name" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Address</label>
                    <input type="text" name="add" class="form-input" placeholder="Street layout or House No." required>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label">City</label>
                        <input type="text" name="city" class="form-input" placeholder="City" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Pin Code</label>
                        <input type="text" name="pc" class="form-input" placeholder="Postal Code" required>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label">State / Region</label>
                        <input type="text" name="state" class="form-input" placeholder="State" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mobile Number</label>
                        <input type="text" name="mno" class="form-input" placeholder="Phone Number" required>
                    </div>
                </div>

                <button type="submit" name="sub" class="btn-submit">Confirm Order & Proceed</button>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="checkout-card" style="height: fit-content;">
            <h3>Order Summary</h3>
            
            <?php if(count($cartItems) > 0): ?>
                <?php foreach($cartItems as $item): ?>
                    <div class="summary-item">
                        <div>
                            <span class="summary-qty"><?php echo $item['qty']; ?>x</span>
                            <span style="font-weight: 500; color: #1e293b;"><?php echo htmlspecialchars($item['nm']); ?></span>
                        </div>
                        <div style="font-weight: 600;">UGX <?php echo number_format($item['price']); ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="color: #64748b; font-style: italic;">Your cart summary is not available or is empty.</p>
            <?php endif; ?>

            <div class="summary-total">
                <span>Total to Pay</span>
                <span>UGX <?php echo number_format($cartTotal); ?></span>
            </div>
            
            <div style="margin-top: 30px; background: #f1f5f9; padding: 16px; border-radius: 8px; display: flex; gap: 12px; align-items: center;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#0f766e" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM200,56V76.69A31.85,31.85,0,0,0,176,72h-8.52L149.2,56ZM129.41,56l18.28,16H95.4l11.43-16Zm-53,0L65.05,72H40V56ZM40,88H71.13A31.85,31.85,0,0,0,56,108.69V200H40ZM72,200V112a16,16,0,0,1,16-16h80a16,16,0,0,1,16,16v88Zm144,0H200V108.69A31.85,31.85,0,0,0,184.87,88H216Z"></path></svg>
                <div style="font-size: 0.9rem; color: #475569;">
                    <strong>Cash on Delivery</strong><br>
                    You will pay the exact total amount upon delivery.
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>