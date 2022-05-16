<div class="col-sm-10">
    <h6 class="text-success text-center"><?php echo $this->session->flashdata('msg1'); ?></h6>
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Manage Cities</span></h2>
    <h6 class="text-danger"><?php echo $this->session->flashdata('msg'); ?></h6>
    <form action="<?php echo site_url('Welcome/addcity'); ?>" method="POST">
        <div class="input-group">
            <input type="text" class="form-control mr-2" name="city" placeholder="Enter New City">
            <input type="submit" value="ADD CITY" class="btn btn-primary mb-3">
        </div>
    </form>
    <form action="<?php echo site_url('Welcome/bcityrem'); ?>" method="post">
        <h6 class="text-danger"><?php echo $this->session->flashdata('msg2'); ?></h6>
        <div class="row col-sm-12">
            <input type="submit" value="REMOVE" class="btn btn-danger mb-3">
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="bg-dark text-white">
                    <th scope="col"><input type="checkbox" onclick="selectAll(this)"></th>
                    <th scope="col">City Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($result as $row)
                {
                    $cityid = $row['bcityid'];
                    $city = $row['bcityname'];
                    echo '
                <tr>
                    <th scope="row"><input type="checkbox" name="bcity[]" value="',$cityid,'"></th>
                    <td>',$city,'</td>
                    <td><button type="button" data-toggle="modal" data-target="#m'.$cityid.'" class="btn btn-primary">Edit</button></td>
                </tr> ';
                }
                echo '
            </tbody>
        </table>
    </form>
</div>';

foreach($result as $row)
{
    $ctid = $row['bcityid'];
    echo '
    <div class="modal fade" id="m'.$ctid.'">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="'.site_url('Welcome/editbcity/').$ctid.'" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit City</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row form-group">
                            <label class="col-sm-4 col-form-label">Enter City Name</label>
                            <input type="text" name="ecity" value="'.$row['bcityname'].'" class="col-sm-8 form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Change City" class="btn btn-primary">
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
        checkboxes = document.getElementsByName('bcity[]');
        for(var i in checkboxes)
        {
            checkboxes[i].checked = source.checked;
        }
    }

    $(document).ready(function() {
        $("#ecitybtn").click(function() {
            var cityid = $(this).data('id');
            console.log(cityid);
            $(cityid).each(function(index) {
                console.log(index + ": " + $(this).cityid);
            })
        });
    });
</script>