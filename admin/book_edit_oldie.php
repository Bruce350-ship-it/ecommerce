<?php
    include("includes/header.php");

    include("../includes/connection.php");

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $q="select * from item where b_id=".$id;
    $res=mysqli_query($link,$q);

    if (!$res) {
        die('Query failed: ' . htmlspecialchars(mysqli_error($link)));
    }

    $row=mysqli_fetch_assoc($res);
    if (!$row) {
        die('Item not found.');
    }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                   
                                   

                                    <form role="form" action="process_category_edit.php" method="post">

                                        <div class="form-group">
                                            <label>New Name for Category</label>
                                            <input type="text" name="cat" value="<?php echo $row['b_nm']; ?>" class="form-control">
                                        </div>
                                              <?php
                                                    if(isset($_SESSION['error']['bnm']))
                                                    {
                                                        echo '<p class="error">'.$_SESSION['error']['bnm'].'</p>';
                                                    } 
                                                ?> 
                                        
                                        <input type="hidden" name="id" value="<?php echo $row['b_id']; ?>" /> 

                                        <button type="submit" class="btn btn-default">Update Category</button>

                                        <button type="reset" class="btn btn-default">Reset</button>

                                    </form>

                                    <?php
                                        unset($_SESSION['error']);
                                    ?>

                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php
    include("includes/footer.php");
?>