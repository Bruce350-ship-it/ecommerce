<?php
    include("includes/header.php");

    include("../includes/connection.php");
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Contact</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading d-flex justify-content-between align-items-center">
                            <span>Contact List</span>
                            <a href="contact_add.php" class="btn btn-success btn-xs">Add Contact</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Mobile No</th>
                                            <th>E-Mail Address</th>
                                            <th>Message</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $item_q = "select * from contact";
                                            $item_res = mysqli_query($link, $item_q);

                                            if (!$item_res) {
                                                echo '<tr><td colspan="7">Error loading contacts: '.htmlspecialchars(mysqli_error($link)).'</td></tr>';
                                            } else {
                                                $count = 1;
                                                if (mysqli_num_rows($item_res) === 0) {
                                                    echo '<tr><td colspan="7">No contacts found.</td></tr>';
                                                } else {
                                                    while ($item_row = mysqli_fetch_assoc($item_res)) {
                                                        echo '<tr class="odd gradeX">
                                                                  <td>'.$count.'</td>
                                                                  <td>'.htmlspecialchars($item_row['c_fnm']).'</td>
                                                                  <td>'.htmlspecialchars($item_row['c_mno']).'</td>
                                                                  <td>'.htmlspecialchars($item_row['c_email']).'</td>
                                                                  <td>'.htmlspecialchars($item_row['c_msg']).'</td>
                                                                  <td>'.@date("d-M-y",$item_row['c_time']).'</td>
                                                                  <td align="center">
                                                                      <a href="contact_edit.php?id='.(int)$item_row['c_id'].'" class="text-primary">Edit</a>
                                                                      |
                                                                      <a style="color: red;" href="process_contact_del.php?id='.(int)$item_row['c_id'].'">Del</a>
                                                                  </td>
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