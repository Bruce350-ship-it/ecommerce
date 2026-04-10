<?php
    include("includes/header.php");

    include("../includes/connection.php");
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View item</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <span>item List</span>
                            <a href="item_add.php" class="btn btn-success btn-xs">Add item</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>item Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $item_q = "select * from item,category where b_cat=cat_id order by b_time desc";
                                            $item_res = mysqli_query($link, $item_q);

                                            if (!$item_res) {
                                                echo '<tr><td colspan="7">Error loading items: '.htmlspecialchars(mysqli_error($link)).'</td></tr>';
                                            } else {
                                                $count = 1;
                                                if (mysqli_num_rows($item_res) === 0) {
                                                    echo '<tr><td colspan="7">No items found.</td></tr>';
                                                } else {
                                                    while ($item_row = mysqli_fetch_assoc($item_res)) {
                                                        echo '<tr class="odd gradeX">
                                                                  <td>'.$count.'</td>
                                                                  <td>'.htmlspecialchars($item_row['b_nm']).'</td>
                                                                  <td>'.htmlspecialchars($item_row['cat_nm']).'</td>
                                                                  <td>UGX '.number_format($item_row['b_price']).'</td>';

                                                        $img = htmlspecialchars($item_row['b_img']);
                                                        echo "<td width='120'><center><img src='../$img' width='100' height='100'></center></td>";
                                                      
                                                        echo '<td>'.@date("d-M-y",$item_row['b_time']).'</td>
                                                              <td align="center"><a style="color: red;" href="item_edit.php?id='.(int)$item_row['b_id'].'">Edit</a>
                                                                <a style="color: red;" href="process_item_del.php?id='.(int)$item_row['b_id'].'">Del</a></td>
                                                          </tr>';
                                                        $count++;
                                                    }
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
    
        </div>
        <!-- /#page-wrapper -->
<?php
    include("includes/footer.php");
?>

