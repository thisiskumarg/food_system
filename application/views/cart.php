
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <?php 
            if(!empty($result))
            {
            ?>
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle" id="pqr">
                        <?php 
                        $ship = 40;
                        $total = 0;
                        foreach($result as $row)
                        {
                            $cartid = $row['cartid'];
                            $pimg = base_url($row['pimage']);
                            $pnm = $row['pname'];
                            $pp = $row['pprice'];
                            $pq = $row['quantity'];
                            $pprice = $row['total_price'];
                            $total += $pprice;
                        ?>
                        <tr>
                            <form action="<?php echo site_url('Welcome/changecartpq/').$cartid; ?>" method="post">
                                <td class="align-middle"><img src="<?php echo $pimg; ?>" alt="" style="width: 50px;"> <?php echo $pnm; ?></td>
                                <td class="align-middle">&#8377;<?php echo $pp; ?></td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-minus" type="button">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text" name="qnt" class="form-control form-control-sm bg-secondary border-0 text-center" value="<?php echo $pq; ?>">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus" type="button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">&#8377;<?php echo $pprice; ?></td>
                                <td class="align-middle">
                                    <input type="hidden" name="pp" value="<?php echo $pp; ?>">
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <i class="fa fa-sync"></i>
                                        </button>
                                    <a href="<?php echo site_url('Welcome/delcartpro/').$cartid; ?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </form>
                        </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <form action="<?php echo site_url('Welcome/checkout'); ?>" method="post">
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Sub Total</h6>
                                <h6>&#8377;<?php echo $total; ?></h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <?php 
                                if($total < 1000)
                                {
                                    echo '<h6 class="font-weight-medium">&#8377;'.$ship.'</h6>';
                                }
                                else
                                {
                                    echo '<h6 class="font-weight-medium">No Shipping Charge</h6>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <?php 
                                if($total < 1000)
                                {
                                    $total += $ship;
                                    echo '<h5>&#8377;'.$total.'</h5>';
                                }
                                else
                                {
                                    echo '<h5>&#8377;'.$total.'</h5>';
                                }
                                ?>
                            </div>
                            <input type="submit" class="btn btn-block btn-primary font-weight-bold my-3 py-3" value="Proceed To Checkout">
                        </div>
                    </div>
                </form>
            </div>
            <?php 
            }
            else
            {
                echo '
                <div class="mx-auto">
                    <h2 class="text-danger py-5">Your Cart is empty.</h2>
                </div>';
            }
            ?>
        </div>
    </div>
    <!-- Cart End -->
