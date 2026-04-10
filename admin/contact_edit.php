<?php
    include("includes/header.php");
    include("../includes/connection.php");

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $q  = "select * from contact where c_id=".$id;
    $res = mysqli_query($link, $q);
    $row = $res ? mysqli_fetch_assoc($res) : null;

    if (!$row) {
        echo "<div id=\"page-wrapper\"><div class=\"row\"><div class=\"col-lg-12\"><h1 class=\"page-header\">Contact not found</h1></div></div></div>";
        include("includes/footer.php");
        exit;
    }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Contact</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Contact
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" action="process_contact_edit.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo (int)$row['c_id']; ?>">

                                        <div class="form-group">
                                            <label>Full Name</label>
                                            <input type="text" name="fnm" value="<?php echo htmlspecialchars($row['c_fnm'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control">
                                            <?php
                                                if(isset($_SESSION['error']['fnm'])) {
                                                    echo '<p class="error">'.$_SESSION['error']['fnm'].'</p>';
                                                }
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Mobile No</label>
                                            <input type="text" name="mno" value="<?php echo htmlspecialchars($row['c_mno'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control">
                                            <?php
                                                if(isset($_SESSION['error']['mno'])) {
                                                    echo '<p class="error">'.$_SESSION['error']['mno'].'</p>';
                                                }
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label>E-Mail Address</label>
                                            <input type="email" name="email" value="<?php echo htmlspecialchars($row['c_email'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control">
                                            <?php
                                                if(isset($_SESSION['error']['email'])) {
                                                    echo '<p class="error">'.$_SESSION['error']['email'].'</p>';
                                                }
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="msg" rows="3" class="form-control"><?php echo htmlspecialchars($row['c_msg'], ENT_QUOTES, 'UTF-8'); ?></textarea>
                                            <?php
                                                if(isset($_SESSION['error']['msg'])) {
                                                    echo '<p class="error">'.$_SESSION['error']['msg'].'</p>';
                                                }
                                            ?>
                                        </div>

                                        <button type="submit" class="btn btn-default">Update Contact</button>
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

