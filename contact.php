<?php
	include("includes/header.php");
?>

<style>
.contact-dashboard {
  background: rgba(255, 255, 255, 0.8) !important;
  backdrop-filter: blur(12px) !important;
  -webkit-backdrop-filter: blur(12px) !important;
  border-radius: 20px !important;
  border: 1px solid rgba(255, 255, 255, 0.5) !important;
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
  display: grid !important;
  grid-template-columns: 1fr 1.5fr !important;
  overflow: hidden !important;
  margin: 20px 0 !important;
}

.contact-info-panel {
  background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%) !important;
  padding: 40px !important;
  color: #fff !important;
  display: flex !important;
  flex-direction: column !important;
  justify-content: center !important;
}

.contact-info-panel h2 {
  color: #fff !important;
  font-size: 2rem !important;
  margin-bottom: 20px !important;
  font-weight: 700 !important;
}

.contact-info-panel p {
  opacity: 0.9 !important;
  margin-bottom: 30px !important;
}

.info-details {
  display: flex !important;
  flex-direction: column !important;
  gap: 20px !important;
}

.info-item {
  display: flex !important;
  align-items: center !important;
  gap: 15px !important;
}

.info-icon {
  width: 40px !important;
  height: 40px !important;
  background: rgba(255, 255, 255, 0.2) !important;
  border-radius: 10px !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  font-size: 18px !important;
}

.info-text strong {
  display: block !important;
  font-size: 0.8rem !important;
  text-transform: uppercase !important;
  opacity: 0.8 !important;
}

.info-text a, .info-text span {
  color: #fff !important;
  text-decoration: none !important;
  font-weight: 500 !important;
}

.contact-form-panel {
  padding: 40px !important;
  background: #fff !important;
}

.contact-form-panel h3 {
  font-size: 1.5rem !important;
  margin-bottom: 25px !important;
  color: #1e293b !important;
}

.form-group-modern {
  margin-bottom: 20px !important;
}

.form-group-modern label {
  display: block !important;
  font-weight: 600 !important;
  font-size: 0.9rem !important;
  margin-bottom: 5px !important;
  color: #64748b !important;
}

.form-group-modern input, .form-group-modern textarea {
  width: 100% !important;
  padding: 12px !important;
  border: 1px solid #e2e8f0 !important;
  border-radius: 8px !important;
  background: #f8fafc !important;
}

.btn-modern-submit {
  width: 100% !important;
  padding: 14px !important;
  background: #0d9488 !important;
  color: #fff !important;
  border: none !important;
  border-radius: 10px !important;
  font-weight: 700 !important;
  cursor: pointer !important;
}

@media (max-width: 768px) {
  .contact-dashboard {
    grid-template-columns: 1fr !important;
  }
}
</style>

<div class="post">
	<h2 class="title"><a href="#">Contact Us</a></h2>
	<p class="meta"></p>
	<div class="entry">
		<div class="contact-dashboard">
            <!-- Left Side: Contact Info -->
            <div class="contact-info-panel">
                <h2>Get in Touch</h2>
                <p>Have questions about our products or need technical support? We're here to help you find the perfect computing solution.</p>
                
                <div class="info-details">
                    <div class="info-item">
                        <div class="info-icon"><i class="fa fa-envelope"></i></div>
                        <div class="info-text">
                            <strong>Email Address</strong>
                            <a href="mailto:kimbugweanthony7@gmail.com">kimbugweanthony7@gmail.com</a>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon"><i class="fa fa-phone"></i></div>
                        <div class="info-text">
                            <strong>Phone Number</strong>
                            <a href="tel:+256782478371">+256 782 478 371</a>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-icon"><i class="fa fa-map-marker"></i></div>
                        <div class="info-text">
                            <strong>Main Office</strong>
                            <span>Namugongo Janda, Uganda</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side: Contact Form -->
            <div class="contact-form-panel">
                <h3>Send us a Message</h3>
                <form action="contact_process.php" method="post">
                    <div class="form-group-modern">
                        <label for="fnm">Full Name</label>
                        <input type="text" id="fnm" name="fnm" placeholder="Enter your full name">
                        <?php if(isset($_SESSION['error']['fnm'])): ?>
                            <span class="error-msg-mini"><?php echo $_SESSION['error']['fnm']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group-modern">
                        <label for="mno">Mobile Number</label>
                        <input type="text" id="mno" name="mno" placeholder="e.g. +256 000 000 000">
                        <?php if(isset($_SESSION['error']['mno'])): ?>
                            <span class="error-msg-mini"><?php echo $_SESSION['error']['mno']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group-modern">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="example@domain.com">
                        <?php if(isset($_SESSION['error']['email'])): ?>
                            <span class="error-msg-mini"><?php echo $_SESSION['error']['email']; ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group-modern">
                        <label for="msg">Your Message</label>
                        <textarea id="msg" name="msg" placeholder="How can we help you today?"></textarea>
                        <?php if(isset($_SESSION['error']['msg'])): ?>
                            <span class="error-msg-mini"><?php echo $_SESSION['error']['msg']; ?></span>
                        <?php endif; unset($_SESSION['error']); ?>
                    </div>

                    <button type="submit" class="btn-modern-submit">Send Message</button>
                </form>
            </div>
        </div>
	</div>
</div>

<?php include("includes/footer.php"); ?>