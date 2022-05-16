<div class="col-sm-10">
    <h6 class="text-success text-center"><?php echo $this->session->flashdata('msg1'); ?></h6>
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Manage Categories</span></h2>
    <h6 class="text-danger"><?php echo $this->session->flashdata('msg'); ?></h6>
    <form action="<?php echo site_url('Welcome/addcat'); ?>" method="POST">
        <div class="input-group">
            <input type="text" class="form-control mr-2" name="cat" placeholder="Enter New Category">
            <input type="submit" value="Add Category" class="btn btn-primary mb-3">
        </div>
    </form>
    <form action="<?php echo site_url('Welcome/bcatrem'); ?>" method="post">
        <h6 class="text-danger"><?php echo $this->session->flashdata('msg2'); ?></h6>
        <div class="row col-sm-12">
            <input type="submit" value="REMOVE" class="btn btn-danger mb-3">
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="bg-dark text-white">
                    <th scope="col"><input type="checkbox" onclick="selectAll(this)"></th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($result as $row)
                {
                    $catid = $row['bcid'];
                    $cat = $row['bcatname'];
                    echo '
                <tr>
                    <th scope="row"><input type="checkbox" name="bcat[]" value="'.$catid.'"></th>
                    <td>'.$cat.'</td>
                    <td><button type="button" data-toggle="modal" data-target="#m'.$catid.'" class="btn btn-primary">Edit</button></td>
                </tr>';
                }
                ?>
            </tbody>
        </table>
    </form>
</div>

<?php 
foreach($result as $row)
{
    $ctrid = $row['bcid'];
    echo '
    <div class="modal fade" id="m'.$ctrid.'">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="'.site_url('Welcome/editbcat/').$ctrid.'" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label">Enter Category Name</label>
                            <input type="text" name="ecat" value="'.$row['bcatname'].'" class="col-sm-8 form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Change Category" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>';
}

?>

<script>
    function selectAll(source)
    {
        checkboxes = document.getElementsByName('bcat[]');
        for(var i in checkboxes)
        {
            checkboxes[i].checked = source.checked;
        }
    }
</script>