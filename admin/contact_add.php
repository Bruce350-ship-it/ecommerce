<?php
    include("includes/header.php");
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Contact</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            New Contact
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="process_contact_add.php" method="post">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="fnm" class="form-control">
                                            <?php
                                                if(isset($_SESSION['error']['fnm'])) {
                                                    echo '<p class="error">'.$_SESSION['error']['fnm'].'</p>';
                                                }
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Mobile No</label>
                                            <input type="text" name="mno" class="form-control">
                                            <?php
                                                if(isset($_SESSION['error']['mno'])) {
                                                    echo '<p class="error">'.$_SESSION['error']['mno'].'</p>';
                                                }
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label>E-Mail Address</label>
                                            <input type="email" name="email" class="form-control">
                                            <?php
                                                if(isset($_SESSION['error']['email'])) {
                                                    echo '<p class="error">'.$_SESSION['error']['email'].'</p>';
                                                }
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="msg" rows="3" class="form-control"></textarea>
                                            <?php
                                                if(isset($_SESSION['error']['msg'])) {
                                                    echo '<p class="error">'.$_SESSION['error']['msg'].'</p>';
                                                }
                                            ?>
                                        </div>

                                        <button type="submit" class="btn btn-default">Add Contact</button>
                                        <a href="contact_view.php" class="btn btn-default">Cancel</a>
                                    </form>

                                    <?php
                                        unset($_SESSION['error']);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    include("includes/footer.php");
?>

