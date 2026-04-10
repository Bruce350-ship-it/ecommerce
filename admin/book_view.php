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
                        <div class="panel-heading">
                            item List
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

                                            $item_q="select * from item,category where b_cat=cat_id";

                                            $item_res=mysqli_query($link,$item_q);

                                            $count=1;

                                            if ($item_res) while($item_row=mysqli_fetch_assoc($item_res))
                                            {
                                                echo '<tr class="odd gradeX">
                                                          <td>'.$count.'</td>
                                                          <td>'.$item_row['b_nm'].'</td>
                                                          <td>'.$item_row['cat_nm'].'</td>
                                                          <td>UGX '.number_format($item_row['b_price']).'</td>';

                                                    echo "<td width='120'><center><img src='../$item_row[b_img]' width='100' height='100'></center>";
                                                      
                                                    echo '<td>'.@date("d-M-y",$item_row['b_time']).'</td>
                                                          <td align="center"><a style="color: red;" href="item_edit.php?id='.$item_row['b_id'].'">Edit</a>
                                                            <a style="color: red;" href="process_item_del.php?id='.$item_row['b_id'].'">Del</a></td>
                                                      </tr>';
                                                $count++;
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