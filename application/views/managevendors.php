<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Manage Vendors</span></h2>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr class="bg-dark text-white">
                <th scope="col">Status</th>
                <th scope="col">Vendor Image</th>
                <th scope="col">Vendor Name</th>
                <th scope="col">Vendor Mobile</th>
                <th scope="col">Vendor Email</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($result as $row)
                {
                    $v = $row['uis_ver'];
                    $vdel = $row['uis_del'];
                    if($vdel == 0)
                    {
                        $vimg = base_url($row['image']);
                        $vnm = $row['name'];
                        $vmb = $row['mobile'];
                        $vem = $row['email'];
                ?>
                <tr>
                    <?php 
                    if($v == 0)
                    {
                        echo '<th scope="row" class="text-danger">Non - Verified</th>';
                    }
                    elseif($v == 1)
                    {
                        echo '<th scope="row" class="text-success">Verified</th>';
                    }
                    elseif($v == 2)
                    {
                        echo '<th scope="row" class="text-warning">Suspended</th>';
                    }
                    ?>
                    <td><img src="<?php echo $vimg; ?>" alt="Vendor_Photo" class="rounded-circle" style="height: 100px; width: 150px;"></td>
                    <td><?php echo $vnm; ?></td>
                    <td><?php echo $vmb; ?></td>
                    <td><?php echo $vem; ?></td>
                </tr>
                <?php 
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>