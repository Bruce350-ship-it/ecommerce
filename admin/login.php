<?php
    session_start();

    if(isset($_SESSION['admin']['status']))
    {
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login - JK Computer & Accessories</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/admin-modern.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Admin Sign In</h3>
                    </div>
                    <div class="panel-body">
                        
                        <form role="form" action="login_process.php" method="post">
                           
                            

                            <fieldset>

                                <div class="form-group">
                                    <input class="form-control" placeholder="User Name" name="unm" type="text" autofocus>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="pwd" type="password" value="">
                                </div>

                                <?php
                                    if(!empty($_SESSION['error']))
                                    {
                                        foreach($_SESSION['error'] as $er)
                                        {
                                            echo '<span style="display: block;text-align: center;padding-bottom: 10px;" class="error">'.$er.'</span>';
                                        }
                                        unset($_SESSION['error']);
                                    }
                                ?>
                        
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" class="btn btn-lg btn-success btn-block">
                                    Login
                                </button>

                            </fieldset>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

</body>

</html>
