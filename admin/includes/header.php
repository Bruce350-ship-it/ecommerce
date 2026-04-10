<?php 
    session_start();

    if(! isset($_SESSION['admin']['status']))
    {
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JK Computers and Accessories - Admin Panel</title>

    <!-- Google Fonts - Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/admin-modern.css" rel="stylesheet">

    <style type="text/css">
        body { font-family: 'Inter', sans-serif !important; }
        .error { color: #dc2626; }
    </style>

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <i class="fa fa-shopping-cart" style="margin-right: 8px;"></i>
                    JK Computer <span style="font-weight: 300; opacity: 0.8;">& Accessories</span>
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle user-menu-toggle" data-toggle="dropdown" href="#">
                        <div class="user-profile-summary">
                            <span class="user-name-text">
                                <?php echo htmlspecialchars($_SESSION['admin']['unm'] ?? 'Admin', ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                            <div class="user-avatar-mini">
                                <i class="fa fa-user"></i>
                            </div>
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user modern-dropdown">
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php" class="logout-link"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="#"><i class="fa fa-folder-open fa-fw"></i> Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="category_add.php">Add Category</a></li>
                                <li><a href="category_view.php">View Category</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="item_add.php">Add Product</a></li>
                                <li><a href="item_view.php">View Product</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope fa-fw"></i> Contact<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="contact_view.php">View Contact</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="Users_view.php">View Users</a></li>
                            </ul>
                        </li>

                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
