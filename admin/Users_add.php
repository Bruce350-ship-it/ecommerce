<?php
    include("includes/header.php");
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add User</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New User
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="process_users_add.php" method="post">

                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="r_fnm" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>User Name</label>
                                            <input type="text" name="r_unm" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="r_pwd" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Contact No</label>
                                            <input type="text" name="r_cno" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>E-Mail</label>
                                            <input type="email" name="r_email" class="form-control">
                                        </div>

                                        <button type="submit" class="btn btn-default">Add User</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        <a href="Users_view.php" class="btn btn-default">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php
    include("includes/footer.php");
?>

