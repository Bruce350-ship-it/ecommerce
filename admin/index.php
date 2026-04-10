<?php
    include("includes/header.php");
    include("../includes/connection.php");

    $cat_count = 0;
    $item_count = 0;
    $contact_count = 0;
    $user_count = 0;
    if ($link) {
        $r = mysqli_query($link, "SELECT COUNT(*) AS c FROM category");
        if ($r) { $row = mysqli_fetch_assoc($r); $cat_count = (int)$row['c']; }
        $r = mysqli_query($link, "SELECT COUNT(*) AS c FROM item");
        if ($r) { $row = mysqli_fetch_assoc($r); $item_count = (int)$row['c']; }
        $r = mysqli_query($link, "SELECT COUNT(*) AS c FROM contact");
        if ($r) { $row = mysqli_fetch_assoc($r); $contact_count = (int)$row['c']; }
        $r = mysqli_query($link, "SELECT COUNT(*) AS c FROM register");
        if ($r) { $row = mysqli_fetch_assoc($r); $user_count = (int)$row['c']; }
    }
?>
        <div id="page-wrapper">
            <div class="dashboard-header animate__animated animate__fadeIn">
                <div class="dashboard-header__content">
                    <h1 class="dashboard-title">Dashboard Overview</h1>
                    <p class="dashboard-subtitle">Welcome back<?php if(isset($_SESSION['admin']['unm'])) echo ', <strong>' . htmlspecialchars($_SESSION['admin']['unm']) . '</strong>'; ?>. Here's what's happening in your store today.</p>
                </div>
                <div class="dashboard-header__actions">
                    <a href="../index.php" target="_blank" class="btn btn-outline-primary shadow-sm">
                        <i class="fa fa-external-link"></i> Live Store
                    </a>
                </div>
            </div>

            <div class="dashboard-cards animate__animated animate__fadeInUp">
                <!-- Categories -->
                <a href="category_view.php" class="dashboard-card dashboard-card--teal">
                    <div class="dashboard-card__icon"><i class="fa fa-th-large"></i></div>
                    <div class="dashboard-card__body">
                        <span class="dashboard-card__value"><?php echo number_format($cat_count); ?></span>
                        <span class="dashboard-card__label">Store Categories</span>
                    </div>
                    <span class="dashboard-card__link">Manage Categories <i class="fa fa-chevron-right"></i></span>
                </a>

                <!-- Products -->
                <a href="item_view.php" class="dashboard-card dashboard-card--blue">
                    <div class="dashboard-card__icon"><i class="fa fa-cube"></i></div>
                    <div class="dashboard-card__body">
                        <span class="dashboard-card__value"><?php echo number_format($item_count); ?></span>
                        <span class="dashboard-card__label">Total Products</span>
                    </div>
                    <span class="dashboard-card__link">Manage Inventory <i class="fa fa-chevron-right"></i></span>
                </a>

                <!-- Contacts -->
                <a href="contact_view.php" class="dashboard-card dashboard-card--amber">
                    <div class="dashboard-card__icon"><i class="fa fa-comments"></i></div>
                    <div class="dashboard-card__body">
                        <span class="dashboard-card__value"><?php echo number_format($contact_count); ?></span>
                        <span class="dashboard-card__label">Customer Inquiries</span>
                    </div>
                    <span class="dashboard-card__link">View Messages <i class="fa fa-chevron-right"></i></span>
                </a>

                <!-- Users -->
                <a href="Users_view.php" class="dashboard-card dashboard-card--slate">
                    <div class="dashboard-card__icon"><i class="fa fa-users"></i></div>
                    <div class="dashboard-card__body">
                        <span class="dashboard-card__value"><?php echo number_format($user_count); ?></span>
                        <span class="dashboard-card__label">Verified Customers</span>
                    </div>
                    <span class="dashboard-card__link">Manage Users <i class="fa fa-chevron-right"></i></span>
                </a>
            </div>

            <!-- Pro Control Panel -->
            <div class="dashboard-actions-panel animate__animated animate__fadeInUp" style="animation-delay: 0.1s;">
                <div class="panel-heading">
                    <i class="fa fa-rocket"></i> Management Control Panel
                </div>
                <div class="panel-body">
                    <div class="action-buttons">
                        <a href="category_add.php" class="action-btn action-btn--primary">
                            <i class="fa fa-folder"></i>
                            <div class="action-content">
                                <strong>New Category</strong>
                                <small>Add store departments</small>
                            </div>
                        </a>
                        <a href="item_add.php" class="action-btn action-btn--success">
                            <i class="fa fa-plus-circle"></i>
                            <div class="action-content">
                                <strong>List Product</strong>
                                <small>Add new stock items</small>
                            </div>
                        </a>
                        <a href="contact_view.php" class="action-btn action-btn--info">
                            <i class="fa fa-envelope"></i>
                            <div class="action-content">
                                <strong>Inbox</strong>
                                <small>Respond to customers</small>
                            </div>
                        </a>
                        <a href="Users_view.php" class="action-btn action-btn--slate" style="background: linear-gradient(135deg, #475569 0%, #1e293b 100%); color: #fff !important; box-shadow: 0 4px 12px rgba(30, 41, 59, 0.2);">
                            <i class="fa fa-cog"></i>
                            <div class="action-content">
                                <strong>User Access</strong>
                                <small>Member permissions</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
<?php
    include("includes/footer.php");
?>
