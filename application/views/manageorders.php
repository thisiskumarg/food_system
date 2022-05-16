<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Manage Orders</span></h2>
    <h5 class="text-danger"><?php echo $this->session->flashdata('msg'); ?></h5>
    <div class="table-responsive mb-5">
        <table class="table table-light table-borderless table-hover text-center mb-0">
            <thead>
                <tr class="bg-dark text-white">
                    <th scope="col">Order ID</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Order Price</th>
                    <th scope="col">Products</th>
                    <th scope="col">Product Price (in Rs.)</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Order By</th>
                    <th scope="col">Activity</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach($orders as $row)
                {
                    $oid = $row['oid'];
                    $odate = $row['odate'];
                    $oprice = $row['oprice'];
                    $pqnt = $row['pquantity'];
                    $pp = $row['pvalue'];
                    $pimg = base_url($row['pimage']);
                    $pnm = $row['pname'];
                    $oby = $row['name'];
                    $act = $row['status'];
                ?>
                <tr>
                    <td class="align-middle"><?php echo $oid; ?></td>
                    <td class="align-middle"><?php echo $odate; ?></td>
                    <td class="align-middle"><?php echo $oprice; ?></td>
                    <td class="align-middle"><img src="<?php echo $pimg; ?>" alt="Product_Photo" style="width: 50px;"> <?php echo $pnm; ?></td>
                    <td class="align-middle"><?php echo $pp; ?></td>
                    <td class="align-middle"><?php echo $pqnt; ?></td>
                    <td class="align-middle"><?php echo $oby; ?></td>
                    <td>
                        <form action="" method="post">
                            <select name="changestatus" class="form-control">
                                <option value="Placed">Placed</option>
                                <option value="Confirmed">Confirmed</option>
                                <option value="Shipped">Shipped</option>
                                <option value="Delivered">Delivered</option>
                                <?php 
                                if($roleid == '1')
                                {
                                    echo '<option value="Admin cancelled">Cancelled by Admin</option>';
                                }
                                elseif($roleid == '2')
                                {
                                    echo '<option value="Vendor cancelled">Cancelled by Vendor</option>';
                                }
                                ?>
                            </select>
                            <button class="btn btn-sm btn-primary mt-2" type="submit">
                                <i class="fa fa-sync"></i>
                            </button>
                            <a href="" class="btn btn-sm btn-danger mt-2"><i class="fa fa-times"></i></a>
                        </form>
                    </td>
                </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
