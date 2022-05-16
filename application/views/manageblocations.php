<div class="col-sm-10">
    <h6 class="text-success text-center"><?php echo $this->session->flashdata('msg1'); ?></h6>
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Manage Locations</span></h2>
    <h6 class="text-danger"><?php echo $this->session->flashdata('msg'); ?></h6>
    <form action="<?php echo site_url('Welcome/addlocation'); ?>" method="POST">
        <div class="input-group">
            <select name="lcity" id="" class="form-control mr-2">
                <option selected disabled>--- Choose City ---</option>
                <?php 
                foreach($result1 as $row1)
                {
                    $cityid = $row1['bcityid'];
                    $citynm = $row1['bcityname'];
                ?>
                <option value="<?php echo $cityid; ?>"><?php echo $citynm; ?></option>
                <?php 
                }
                ?>
            </select>
            <input type="text" class="form-control mr-2" name="location" placeholder="Enter New Location">
            <input type="submit" value="Add Location" class="btn btn-primary mb-3">
        </div>
    </form>
    <h6 class="text-danger"><?php echo $this->session->flashdata('msg2'); ?></h6>
    <form action="<?php echo site_url('Welcome/blocrem'); ?>" method="post">
        <input type="submit" value="REMOVE" class="btn btn-danger mb-3">
        <table class="table table-hover">
            <thead>
                <tr class="bg-dark text-white">
                    <th scope="col"><input type="checkbox" onclick="selectAll(this)"></th>
                    <th scope="col">City Name</th>
                    <th scope="col">Location Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($result as $row)
                {
                    $city = $row['bcityname'];
                    $locid = $row['blid'];
                    $location = $row['blocname'];
                    echo '
                <tr>
                    <th scope="row"><input type="checkbox" name="bloc[]" value="'.$locid.'"></th>
                    <td>'.$city.'</td>
                    <td>'.$location.'</td>
                    <td><button type="button" data-toggle="modal" data-target="#m'.$locid.'" class="btn btn-primary">Edit</button></td>
                </tr>';
                }
                echo '
            </tbody>
        </table>
    </form>
</div>';

foreach($result as $row)
{
    $lid = $row['blid'];
    $city = $row['bcityname'];
    echo '
    <div class="modal fade" id="m'.$lid.'">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="'.site_url('Welcome/editbloc/').$lid.'" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Location</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label">Your City</label>
                            <div class="col-sm-8 form-control border-0">'.$city.'</div>
                        </div>
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label">Enter Location Name</label>
                            <input type="text" name="eloc" value="'.$row['blocname'].'" class="col-sm-8 form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Change Location" class="btn btn-primary">
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
        checkboxes = document.getElementsByName('bloc[]');
        for(var i in checkboxes)
        {
            checkboxes[i].checked = source.checked;
        }
    }
</script>