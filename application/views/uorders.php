<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">My Orders</span></h2>
    <h5 class="text-danger"><?php echo $this->session->flashdata('msg'); ?></h5>
    <div class="table-responsive mb-5">
        <table class="table table-light table-borderless table-hover text-center mb-0">
            <thead>
                <tr class="bg-dark text-white">
                    <th scope="col">Order ID</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Products</th>
                    <th scope="col">Product Price (in Rs.)</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Order Price</th>
                    <th scope="col">Activity</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($uorders as $row)
                {
                    $oid = $row['oid'];
                    $od = $row['odate'];
                    $oprice = $row['oprice'];
                    $pqnt = $row['pquantity'];
                    $pp = $row['pvalue'];
                    $pimg = base_url($row['pimage']);
                    $pnm = $row['pname'];
                ?>
                <tr>
                    <td class="align-middle"><?php echo $oid; ?></td>
                    <td class="align-middle"><?php echo $od; ?></td>
                    <td class="align-middle"><img src="<?php echo $pimg; ?>" alt="Product_Photo" style="width: 50px;"> <?php echo $pnm; ?></td>
                    <td class="align-middle"><?php echo $pp; ?></td>
                    <td class="align-middle"><?php echo $pqnt; ?></td>
                    <td class="align-middle"><?php echo $oprice; ?></td>
                    <td class="align-middle">Confirmed</td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
