<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Verified Customers</span></h2>
    <h5 class="text-danger"><?php echo $this->session->flashdata('msg'); ?></h5>
    <form action="<?php echo site_url('Welcome/vcact'); ?>" method="post">
        <input type="submit" name="vcsus" value="SUSPEND" class="btn btn-warning mb-2 mr-2">
        <input type="submit" name="vcrem" value="REMOVE" class="btn btn-danger mb-2">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr class="bg-dark text-white">
                        <th scope="col"><input type="checkbox" onclick="selectAll(this)"></th>
                        <th scope="col">Customer Image</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Customer Mobile</th>
                        <th scope="col">Customer Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($result1 as $row1)
                    {
                        $v = $row1['uis_ver'];
                        $udel = $row1['uis_del'];
                        if($v == 1 && $udel == 0)
                        {
                            $uid = $row1['uid'];
                            $uimg = base_url($row1['image']);
                            $uname = $row1['name'];
                            $umobile = $row1['mobile'];
                            $uemail = $row1['email'];
                    ?>
                    <tr>
                        <th scope="row"><input type="checkbox" name="vc[]" value="<?php echo $uid; ?>"></th>
                        <td><img src="<?php echo $uimg; ?>" alt="Customer_Photo" style="height: 100px; width: 150px;"></td>
                        <td><?php echo $uname; ?></td>
                        <td><?php echo $umobile; ?></td>
                        <td><?php echo $uemail; ?></td>
                        <td><a href="<?php echo site_url('Welcome/editvc/').$uid; ?>" class="btn btn-primary">EDIT</a></td>
                    </tr>
                    <?php 
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>
</div>

<script>
    function selectAll(source)
    {
        checkboxes = document.getElementsByName('vc[]');
        for(var i in checkboxes)
        {
            checkboxes[i].checked = source.checked;
        }
    }
</script>