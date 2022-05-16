<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Manage Products</span></h2>
    <table class="table table-hover">
        <thead>
            <tr class="bg-dark text-white">
                <th scope="col">Status</th>
                <th scope="col">Business Name</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Product Price (in Rs.)</th>
                <th scope="col">Product Discount (in %)</th>
                <th scope="col">Product Description</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($result as $row)
            {
                $businessn = $row['bname'];
                $bdel = $row['bis_del'];
                $brandn = $row['brandname'];
                $pimg = base_url($row['pimage']);
                $pnm = $row['pname'];
                $pquant = $row['pquantity'];
                $pp = $row['pprice'];
                $dis = $row['discount'];
                $pdes = $row['pdescription'];
                $pv = $row['pis_ver'];
                if($bdel == '0')
                {
            ?>
            <tr>
                <?php 
                if($pv=='1')
                {
                    echo '<th scope="row" class="text-success">Verified</th>';
                }
                elseif($pv=='2')
                {
                    echo '<th scope="row" class="text-warning">Suspended</th>';
                }
                elseif($pv=='0')
                {
                    echo '<th scope="row" class="text-danger">Non - Verified</th>';
                }
                ?>
                <td><?php echo $businessn; ?></td>
                <td><?php echo $brandn; ?></td>
                <td><img src="<?php echo $pimg; ?>" alt="Product-Image" class="img-fluid" style="height: 70px; width: 180px;"></td>
                <td><?php echo $pnm; ?></td>
                <td><?php echo $pquant; ?></td>
                <td><?php echo $pp; ?></td>
                <td><?php echo $dis; ?></td>
                <td><?php echo $pdes; ?></td>
            </tr>
            <?php 
                }
            }
            ?>
        </tbody>
    </table>
</div>