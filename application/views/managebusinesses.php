<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Manage Businesses</span></h2>
    <table class="table table-hover">
        <thead>
            <tr class="bg-dark text-white">
                <th scope="col">Status</th>
                <th scope="col">Vendor Name</th>
                <th scope="col">Business Image</th>
                <th scope="col">Business Name</th>
                <th scope="col">Business Mobile</th>
                <th scope="col">Business E-Mail</th>
                <th scope="col">Business Address</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach($result as $row)
            {
                $v = $row['bis_ver'];
                $vname = $row['name'];
                $bimg = base_url($row['bphoto']);
                $bnm = $row['bname'];
                $badd = $row['baddress'];
                $bcity = $row['bcityname'];
                $bmb = $row['bmobile'];
                $bem = $row['bemail'];
            ?>
            <tr>
                <?php 
                if($v == '1')
                {
                    echo '<th scope="row" class="text-success">Verified</th>';
                }
                elseif($v == '2')
                {
                    echo '<th scope="row" class="text-warning">Suspended</th>';
                }
                elseif($v == '0')
                {
                    echo '<th scope="row" class="text-danger">Non - Verified</th>';
                }
                ?>
                <td><?php echo $vname; ?></td>
                <td><img src="<?php echo $bimg; ?>" alt="Business_Photo" class="img-fluid rounded-circle" style="height: 100px; width: 150px;"></td>
                <td><?php echo $bnm; ?></td>
                <td><?php echo $bmb; ?></td>
                <td><?php echo $bem; ?></td>
                <td><?php echo $badd.', '.$bcity; ?></td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</div>