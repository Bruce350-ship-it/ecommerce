<?php
	include("includes/header.php");
?>

<style>
/* Premium Login Aesthetics */
.login-page-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
    min-height: 60vh;
}
.login-card {
    background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(241,245,249,0.9) 100%);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.8);
    border-radius: 24px;
    padding: 40px 50px;
    width: 100%;
    max-width: 480px;
    box-shadow: 0 25px 50px -12px rgba(0,0,0,0.15);
}
.login-header {
    text-align: center;
    margin-bottom: 30px;
}
.login-header h2 {
    font-size: 2.4rem;
    color: #0f172a;
    font-weight: 800;
    margin: 0 0 10px;
    background: linear-gradient(to right, #0f766e, #2563eb);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.login-header p {
    color: #64748b;
    margin: 0;
    font-size: 1.05rem;
}
.form-group {
    margin-bottom: 24px;
}
.form-label {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 8px;
    font-weight: 600;
    color: #475569;
    font-size: 0.95rem;
}
.form-input {
    width: 100%;
    padding: 14px 16px;
    background: #ffffff;
    border: 1px solid #cbd5e1;
    border-radius: 10px;
    color: #0f172a;
    font-family: inherit;
    font-size: 1rem;
    transition: all 0.2s ease;
    box-sizing: border-box;
}
.form-input:focus {
    outline: none;
    border-color: #0f766e;
    box-shadow: 0 0 0 4px rgba(15,118,110,0.1);
}
.forgot-password {
    font-size: 0.85rem;
    color: #0f766e;
    text-decoration: none;
    font-weight: 600;
}
.forgot-password:hover {
    text-decoration: underline;
    color: #0369a1;
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
    margin-top: 8px;
}
.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(15,118,110,0.4);
}
.btn-admin {
    width: 100%;
    padding: 14px 20px;
    background: transparent;
    color: #475569;
    font-size: 1rem;
    font-weight: 600;
    border: 2px solid #cbd5e1;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 16px;
    display: inline-block;
    text-align: center;
    box-sizing: border-box;
    text-decoration: none;
}
.btn-admin:hover {
    background: #f1f5f9;
    color: #0f172a;
    border-color: #94a3b8;
}
.divider {
    display: flex;
    align-items: center;
    text-align: center;
    margin: 24px 0;
    color: #94a3b8;
    font-size: 0.9rem;
    font-weight: 500;
}
.divider::before, .divider::after {
    content: '';
    flex: 1;
    border-bottom: 1px solid #cbd5e1;
}
.divider::before {
    margin-right: 12px;
}
.divider::after {
    margin-left: 12px;
}
.alert-error {
    background: rgba(239, 68, 68, 0.1);
    border: 1px solid rgba(239, 68, 68, 0.2);
    color: #dc2626;
    padding: 16px;
    border-radius: 10px;
    margin-bottom: 24px;
    font-weight: 600;
    text-align: center;
}
.login-links {
    margin-top: 24px;
    text-align: center;
    font-weight: 500;
    color: #64748b;
}
.login-links a {
    color: #0f766e;
    text-decoration: none;
    font-weight: 600;
    margin-left: 6px;
}
.login-links a:hover {
    color: #0369a1;
    text-decoration: underline;
}

@media (max-width: 600px) {
    .login-card {
        padding: 30px 24px;
    }
}
</style>

<div class="login-page-wrapper">
    <div class="login-card">
        <div class="login-header">
            <h2>Welcome Back</h2>
            <p>Sign in to access your account</p>
        </div>

        <?php
            if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
                $errors = $_SESSION['error'];
                if (!is_array($errors)) {
                    $errors = array($errors);
                }
                echo '<div class="alert-error">';
                foreach ($errors as $er) {
                    echo htmlspecialchars($er) . '<br>';
                }
                echo '</div>';
                unset($_SESSION['error']);
            }
        ?>

        <form class="login-form" action="login_process.php" method="post">
            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" name="unm" class="form-input" placeholder="Enter your username" required>
            </div>

            <div class="form-group">
                <div class="form-label">
                    <span>Password</span>
                    <a href="forget_password.php" class="forgot-password">Forgot password?</a>
                </div>
                <input type="password" name="pwd" class="form-input" placeholder="Enter your password" required>
            </div>

            <!-- Missing Feature Added: Keep me signed in (Visual element) -->
            <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
                <input type="checkbox" id="remember" name="remember" style="width: 16px; height: 16px; accent-color: #0f766e; cursor: pointer;">
                <label for="remember" style="color: #475569; font-weight: 500; font-size: 0.95rem; cursor: pointer;">Keep me signed in</label>
            </div>

            <button type="submit" class="btn-submit">Sign In</button>
            
            <div class="divider">OR</div>

            <a href="admin/index.php" class="btn-admin">Access Admin Portal</a>

            <div class="login-links">
                Don't have an account? <a href="register.php">Create one now</a>
            </div>
            <p style="margin-top: 16px; color: #475569; font-size: 0.95rem; text-align: center;">
                Are you an admin? <a href="admin/login.php" style="color: #0f766e; font-weight: 600;">Login from the admin portal</a>.
            </p>
        </form>
    </div>
</div>

<?php include("includes/footer.php"); ?>