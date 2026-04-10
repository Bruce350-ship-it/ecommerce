<?php
    include("includes/header.php");

    include("../includes/connection.php");

    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $cq = "select * from item where b_id=".$id;
    $res = mysqli_query($link, $cq);
    if (!$res) {
        die('Query failed: ' . htmlspecialchars(mysqli_error($link)));
    }
    $crow = mysqli_fetch_assoc($res);
    if (!$crow) {
        die('Product not found.');
    }
    $desc = $crow['b_desc'] ?? '';
    $price = $crow['b_price'] ?? '';
?> 

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Update Product</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Product
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
								  
                                   
                                    <form role="form" action="process_item_edit.php" method="post" enctype="multipart/form-data">

                                        <input type="hidden" name="id" value="<?php echo (int)$crow['b_id']; ?>" />

                                        <div class="form-group">
                                            <label>Product Name</label>
                                               <?php
                                                    if(isset($_SESSION['error']['bnm']))
                                                    {
                                                        echo '<p class="error">'.$_SESSION['error']['bnm'].'</p>';
                                                    } 
                                                ?> 
                                            <input type="text" name="bnm" value="<?php echo htmlspecialchars($crow['b_nm'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" class="form-control">
											
											  
                                        </div>


                                        <div class="form-group">
                                            <label>Product Category</label>
                                            <select name="cat" class="form-control">
                                                <?php
                                                    $cq2="select * from category";

                                                    $cres=mysqli_query($link,$cq2);

                                                    if ($cres) while($crow2=mysqli_fetch_assoc($cres))
                                                    {
                                                        $sel = ((int)$crow2['cat_id'] === (int)$crow['b_cat']) ? ' selected' : '';
                                                        echo '<option value="'.$crow2['cat_id'].'"'.$sel.'>'.htmlspecialchars($crow2['cat_nm'], ENT_QUOTES, 'UTF-8').'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label>Description
                                                <?php
                                                    if(isset($_SESSION['error']['desc']))
                                                    {
                                                        echo '<p class="error">'.$_SESSION['error']['desc'].'</p>';
                                                    }
                                                ?>
                                            </label>
                                            <textarea name="desc" rows="3" class="form-control"><?php echo htmlspecialchars($desc, ENT_QUOTES, 'UTF-8'); ?></textarea>
                                        </div>


                                        <div class="form-group">
                                            <label>Price (UGX)</label>
                                                <?php
                                                    if(isset($_SESSION['error']['price']))
                                                    {
                                                        echo '<p class="error">'.$_SESSION['error']['price'].'</p>';
                                                    } 
                                                ?>
                                            <input type="text" name="price" value="<?php echo htmlspecialchars($price, ENT_QUOTES, 'UTF-8'); ?>" class="form-control">
											
                                        </div>


                                        <div class="form-group">
                                            <label>Product Image</label>
                                                <?php
                                                    if(isset($_SESSION['error']['b_img']))
                                                    {
                                                        echo '<p class="error">'.$_SESSION['error']['b_img'].'</p>';
                                                    }
                                                ?>
                                            <input type="file" name="b_img" class="form-control">
                                        </div>


                                        <button type="submit" class="btn btn-default">Update item</button>

                                        <a href="item_view.php" class="btn btn-default">Exit</a>

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

