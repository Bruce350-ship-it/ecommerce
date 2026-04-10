<?php
	include("includes/header.php");
?>


<style>
.register-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
    min-height: 80vh;
}

.register-card {
    background: rgba(255, 255, 255, 0.9);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border-radius: 24px;
    border: 1px solid rgba(255, 255, 255, 0.5);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
    width: 100%;
    max-width: 550px;
    overflow: hidden;
    animation: slideUp 0.6s ease-out;
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.register-header {
    background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%);
    padding: 32px;
    text-align: center;
    color: #fff;
}

.register-header i {
    font-size: 3rem;
    margin-bottom: 12px;
}

.register-header h2 {
    margin: 0;
    font-size: 1.75rem;
    font-weight: 800;
    color: #fff !important;
}

.register-header p {
    margin: 8px 0 0;
    opacity: 0.9;
    font-size: 1rem;
}

.register-body {
    padding: 40px;
}

.register-success-msg {
    background: #ecfdf5;
    color: #065f46;
    padding: 16px;
    border-radius: 12px;
    margin-bottom: 24px;
    font-weight: 600;
    text-align: center;
    border: 1px solid #10b981;
}

.form-grid-modern {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group-full {
    grid-column: span 2;
}

.form-group-modern {
    margin-bottom: 20px;
}

.form-group-modern label {
    display: block;
    font-weight: 700;
    font-size: 0.85rem;
    color: #64748b;
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.input-with-icon {
    position: relative;
}

.input-with-icon i {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    color: #94a3b8;
    font-size: 1rem;
}

.input-with-icon input {
    width: 100% !important;
    padding: 12px 14px 12px 42px !important;
    border: 1px solid #e2e8f0 !important;
    border-radius: 12px !important;
    font-family: inherit !important;
    font-size: 1rem !important;
    background: #f8fafc !important;
    transition: all 0.3s ease !important;
}

.input-with-icon input:focus {
    outline: none !important;
    border-color: #0d9488 !important;
    background: #fff !important;
    box-shadow: 0 0 0 4px rgba(13, 148, 136, 0.1) !important;
}

.error-msg-small {
    color: #ef4444;
    font-size: 0.75rem;
    font-weight: 600;
    margin-top: 5px;
    display: block;
}

.btn-register-premium {
    width: 100%;
    padding: 16px;
    background: #0d9488;
    color: #fff;
    border: none;
    border-radius: 14px;
    font-weight: 800;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(13, 148, 136, 0.2);
    margin-top: 20px;
}

.btn-register-premium:hover {
    background: #0f766e;
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(13, 148, 136, 0.3);
}

.login-redirect {
    text-align: center;
    margin-top: 32px;
    padding-top: 24px;
    border-top: 1px solid #f1f5f9;
}

.login-redirect a {
    color: #0d9488;
    text-decoration: none;
    font-weight: 700;
}

.login-redirect a:hover {
    text-decoration: underline;
}

@media (max-width: 600px) {
    .form-grid-modern {
        grid-template-columns: 1fr;
    }
    .form-group-full {
        grid-column: span 1;
    }
    .register-body {
        padding: 24px;
    }
}
</style>

<div class="register-container">
    <div class="register-card">
        <div class="register-header">
            <i class="fa fa-user-plus"></i>
            <h2>Join JK Computers & Accessories</h2>
            <p>Create your professional account today</p>
        </div>

        <div class="register-body">
            <?php if(isset($_GET['register'])): ?>
                <div class="register-success-msg">
                    <i class="fa fa-check-circle"></i> Registered Successfully!
                </div>
            <?php endif; ?>

            <form action="register_process.php" method="post">
                <div class="form-grid-modern">
                    <!-- Full Name -->
                    <div class="form-group-modern form-group-full">
                        <label for="fnm">Full Name</label>
                        <div class="input-with-icon">
                            <i class="fa fa-id-badge"></i>
                            <input type="text" id="fnm" name="fnm" placeholder="Enter your full name">
                        </div>
                        <?php if(isset($_SESSION['error']['fnm'])): ?>
                            <span class="error-msg-small"><?php echo $_SESSION['error']['fnm']; ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- User Name -->
                    <div class="form-group-modern">
                        <label for="unm">Username</label>
                        <div class="input-with-icon">
                            <i class="fa fa-user"></i>
                            <input type="text" id="unm" name="unm" placeholder="Choose a username">
                        </div>
                        <?php if(isset($_SESSION['error']['unm'])): ?>
                            <span class="error-msg-small"><?php echo $_SESSION['error']['unm']; ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Email -->
                    <div class="form-group-modern">
                        <label for="email">E-Mail ID</label>
                        <div class="input-with-icon">
                            <i class="fa fa-envelope"></i>
                            <input type="email" id="email" name="email" placeholder="example@domain.com">
                        </div>
                        <?php if(isset($_SESSION['error']['email'])): ?>
                            <span class="error-msg-small"><?php echo $_SESSION['error']['email']; ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Password -->
                    <div class="form-group-modern">
                        <label for="pwd">Password</label>
                        <div class="input-with-icon">
                            <i class="fa fa-lock"></i>
                            <input type="password" id="pwd" name="pwd" placeholder="Enter password">
                        </div>
                        <?php if(isset($_SESSION['error']['pwd'])): ?>
                            <span class="error-msg-small"><?php echo $_SESSION['error']['pwd']; ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group-modern">
                        <label for="cpwd">Confirm Password</label>
                        <div class="input-with-icon">
                            <i class="fa fa-shield"></i>
                            <input type="password" id="cpwd" name="cpwd" placeholder="Verify password">
                        </div>
                    </div>

                    <!-- Contact No -->
                    <div class="form-group-modern">
                        <label for="cno">Contact No</label>
                        <div class="input-with-icon">
                            <i class="fa fa-phone"></i>
                            <input type="text" id="cno" name="cno" placeholder="+256 000 000 000" maxlength="15">
                        </div>
                        <?php if(isset($_SESSION['error']['cno'])): ?>
                            <span class="error-msg-small"><?php echo $_SESSION['error']['cno']; ?></span>
                        <?php endif; ?>
                    </div>

                    <!-- NIN -->
                    <div class="form-group-modern">
                        <label for="nin">NIN (National ID)</label>
                        <div class="input-with-icon">
                            <i class="fa fa-id-card"></i>
                            <input type="text" id="nin" name="nin" placeholder="CM8501012ABCD">
                        </div>
                        <?php if(isset($_SESSION['error']['nin'])): ?>
                            <span class="error-msg-small"><?php echo $_SESSION['error']['nin']; ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <button type="submit" class="btn-register-premium">Create Account</button>

                <div class="login-redirect">
                    Already have an account? <a href="login.php">Login here</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php unset($_SESSION['error']); unset($_GET['register']); ?>

<?php
	include("includes/footer.php");
?>