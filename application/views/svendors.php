<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Suspended Vendors</span></h2>
    <h6 class="text-danger"><?php echo $this->session->flashdata('msg'); ?></h6>
    <form action="<?php echo site_url('Welcome/svact'); ?>" method="post">
        <input type="submit" name="svver" value="VERIFY" class="btn btn-success mb-2">
        <input type="submit" name="svrem" value="REMOVE" class="btn btn-danger mb-2 mx-2">
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr class="bg-dark text-white">
                <th scope="col"><input type="checkbox" onclick="selectAll(this)"></th>
                <th scope="col">Vendor Image</th>
                <th scope="col">Vendor Name</th>
                <th scope="col">Vendor Mobile</th>
                <th scope="col">Vendor Email</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($result1 as $row1)
                {
                    $v = $row1['uis_ver'];
                    $vdel = $row1['uis_del'];
                    if($v == '2' && $vdel == 0)
                    {
                        $uid = $row1['uid'];
                        $vimg = base_url($row1['image']);
                        $vnm = $row1['name'];
                        $vmb = $row1['mobile'];
                        $vem = $row1['email'];
                ?>
                <tr>
                    <th scope="row"><input type="checkbox" name="sv[]" value="<?php echo $uid; ?>"></th>
                    <td><img src="<?php echo $vimg; ?>" alt="Vendor_Photo" class="rounded-circle" style="height: 100px; width: 150px;"></td>
                    <td><?php echo $vnm; ?></td>
                    <td><?php echo $vmb; ?></td>
                    <td><?php echo $vem; ?></td>
                    <td><a href="<?php echo site_url('Welcome/editsv/').$uid; ?>" class="btn btn-primary">EDIT</a></td>
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
        checkboxes = document.getElementsByName('sv[]');
        for(var i in checkboxes)
        {
            checkboxes[i].checked = source.checked;
        }
    }
</script>