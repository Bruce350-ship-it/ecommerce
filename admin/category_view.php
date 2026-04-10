<?php
    include("includes/header.php");

    include("../includes/connection.php");
?>
        <div id="page-wrapper" class="glass-panel">
            <div class="dashboard-header">
                <div class="dashboard-header__content">
                    <h1 class="dashboard-title">Category Management</h1>
                    <p class="dashboard-subtitle">Organize and refine your product categories with ease.</p>
                </div>
                <div class="dashboard-header__actions">
                    <a href="category_add.php" class="btn btn-success btn-lg">
                        <i class="fa fa-plus-circle"></i> Create Category
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel-body" style="padding: 0;">
                        <div class="table-responsive" style="border: none;">
                            <table class="table table-category" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="80" class="text-center">ID</th>
                                        <th>Category Details</th>
                                        <th width="200" class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $cat_q = "select * from category";
                                        $cat_res = mysqli_query($link, $cat_q);
                                        $count = 1;
                                        if ($cat_res) while ($cat_row = mysqli_fetch_assoc($cat_res))
                                        {
                                            echo '<tr>
                                                      <td class="text-center">
                                                        <span class="index-badge">'.$count.'</span>
                                                      </td>
                                                      <td>
                                                        <div style="display: flex; align-items: center; gap: 15px;">
                                                            <div class="panel-title-icon" style="width: 38px; height: 38px; font-size: 14px; flex-shrink: 0;">
                                                                <i class="fa fa-tag"></i>
                                                            </div>
                                                            <div>
                                                                <a href="#" class="cat-name-link">'.htmlspecialchars($cat_row['cat_nm']).'</a>
                                                                <div style="font-size: 11px; color: #94a3b8; margin-top: 2px;">Database ID: #'.$cat_row['cat_id'].'</div>
                                                            </div>
                                                        </div>
                                                      </td>
                                                      <td class="text-center">
                                                        <div style="display: flex; justify-content: center; gap: 8px;">
                                                            <a class="action-link action-link--edit" href="category_edit.php?id='.$cat_row['cat_id'].'" title="Edit Category">
                                                                <i class="fa fa-pencil"></i> Edit
                                                            </a>
                                                            <a class="action-link action-link--delete" href="process_category_del.php?id='.$cat_row['cat_id'].'" title="Delete Category" onclick="return confirm(\'Are you sure you want to delete this category?\');">
                                                                <i class="fa fa-trash-o"></i> Delete
                                                            </a>
                                                        </div>
                                                      </td>
                                                  </tr>';
                                            $count++;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    include("includes/footer.php");
?>