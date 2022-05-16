<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Non - Verified Products</span></h2>
    <h5 class="text-danger"><?php echo $this->session->flashdata('msg'); ?></h5>
    <form action="<?php echo site_url('Welcome/nvact'); ?>" method="post">
        <?php 
        if($roleid == '1')
        {
            echo '<input type="submit" name="nvver" value="VERIFY" class="btn btn-success mb-2">';
            echo '<input type="submit" name="nvsus" value="SUSPEND" class="btn btn-warning mb-2 mx-2">';
        }
        ?>
        <input type="submit" name="nvrem" value="REMOVE" class="btn btn-danger mb-2">
        <table class="table table-hover">
            <thead>
                <tr class="bg-dark text-white">
                    <th scope="col"><input type="checkbox" onclick="selectAll(this)"></th>
                    <th scope="col">Business Name</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Product Price (in Rs.)</th>
                    <th scope="col">Product Discount (in %)</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($result as $row)
                {
                    $pv = $row['pis_ver'];
                    $pdel = $row['pis_del'];
                    $bdel = $row['bis_del'];
                    if($pv == '0' && $pdel == '0' && $bdel == '0')
                    {
                        $psno = $row['psno'];
                        $bnm = $row['bname'];
                        $pimg = base_url($row['pimage']);
                        $pnm = $row['pname'];
                        $pqnt = $row['pquantity'];
                        $pp = $row['pprice'];
                        $dis = $row['discount'];
                        $pdes = $row['pdescription'];
                ?>
                <tr>
                    <th scope="row"><input type="checkbox" name="nvpsno[]" value="<?php echo $psno; ?>"></th>
                    <td><?php echo $bnm; ?></td>
                    <td> <img src="<?php echo $pimg; ?>" alt="NV-Image" class="img-fluid" style="height: 80px; width: 150px;"></td>
                    <td><?php echo $pnm; ?></td>
                    <td><?php echo $pqnt; ?></td>
                    <td><?php echo $pp; ?></td>
                    <td><?php echo $dis; ?></td>
                    <td><?php echo $pdes; ?></td>
                    <td><a href="<?php echo site_url('Welcome/editnvp/').$psno; ?>" class="btn btn-primary">EDIT</a></td>
                </tr>
                <?php 
                    }
                }
                ?>
            </tbody>
        </table>
    </form>
</div>

<script>
    function selectAll(source)
    {
        checkboxes = document.getElementsByName('nvpsno[]');
        for(var i in checkboxes)
        {
            checkboxes[i].checked = source.checked;
        }
    }
</script>