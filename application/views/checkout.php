    <div class="container-fluid">
        <div class="row px-xl-5">
            <?php 
            if(!empty($billcart))
            {
            ?>
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
                        <?php 
                        if(!empty($billdetails))
                        {
                            foreach($billdetails as $row)
                            {
                                $name = $row['billname'];
                                $mob = $row['billmobile'];
                                $eml = $row['billemail'];
                                $add = $row['bill_add'];
                                $cntry = $row['billcountry'];
                                $stat = $row['statename'];
                                $ct = $row['billcityname'];
                                $pin = $row['pin'];
                            }
                        ?>
                            <div class="col-md-12 form-group">
                                <label>Name :</label>
                                <div class="form-control border-0"><?php echo $name; ?></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile :</label>
                                <div class="form-control border-0"><?php echo $mob; ?></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail :</label>
                                <div class="form-control border-0"><?php echo $eml; ?></div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Address :</label>
                                <div class="form-control border-0"><?php echo $add.', '.$ct.', '.$stat.', '.$cntry.', '.$pin; ?></div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="shipto">
                                    <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Change Shipping Address</label>
                                </div>
                            </div>
                        <?php 
                        }
                        else
                        {
                        ?>
                            <h6 class="text-danger">You have no billing address, Please Add Billing address.</h6>
                            <div class="col-md-12 mt-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="shipto">
                                    <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Add/Change Shipping Address</label>
                                </div>
                            </div>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
                <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Add/Update Shipping Address</span></h5>
                    <div class="bg-light p-30">
                        <h6 class="text-danger"><?php echo $this->session->flashdata('msg'); ?></h6>
                        <form action="<?php echo site_url('Welcome/changebilldetails'); ?>" method="post">
                            <?php 
                            foreach($billdetails as $row1)
                            {
                                $billid = $row['billid'];
                                $name = $row1['billname'];
                                $mob = $row['billmobile'];
                                $eml = $row['billemail'];
                                $add = $row['bill_add'];
                                $cntry = $row['billcountry'];
                                $statid = $row['stateid'];
                                $stat = $row['statename'];
                                $ct = $row['billcityname'];
                                $pin = $row['pin'];
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="nm" value="<?php if(!empty($name)) echo $name; ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" name="mob" value="<?php if(!empty($mob)) echo $mob; ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" name="eml" value="<?php if(!empty($eml)) echo $eml; ?>">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Address</label>
                                    <textarea name="add" cols="30" rows="5" class="form-control" placeholder="123 Street"><?php if(!empty($add)) echo $add; ?></textarea>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>PIN Code</label>
                                    <input class="form-control" type="text" name="pin" value="<?php if(!empty($pin)) echo $pin; ?>" placeholder="123456">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Country</label>
                                    <input type="text" name="country" value="<?php if(!empty($cntry)) { echo $cntry; } else { echo 'India'; } ?>" class="form-control" readonly>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>State</label>
                                    <select name="statid" id="state" onchange="changestate()" class="custom-select">
                                        <option selected disabled><?php if(!empty($stat)) { echo $stat; } else { echo '--- Choose State ---'; } ?></option>
                                        <?php 
                                        foreach($billstate as $row2)
                                        {
                                            $stid = $row2['stateid'];
                                            $stnm = $row2['statename'];
                                            if($stid != $statid && $stnm != $stat)
                                            {
                                                echo '<option value="'.$stid.'">'.$stnm.'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>City</label>
                                    <select name="ctid" id="city" class="custom-select">
                                        <option selected disabled><?php if(!empty($ct)) { echo $ct; } else { echo '--- Choose City ---'; } ?></option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" value="Add/Change Address" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        <?php 
                        $sp = 0;
                        foreach($billcart as $row3)
                        {
                            $pn = $row3['pname'];
                            $tp = $row3['total_price'];
                            $sp += $tp;
                        ?>
                        <div class="d-flex justify-content-between">
                            <p><?php echo $pn; ?></p>
                            <p>&#8377;<?php echo $tp; ?></p>
                        </div>
                        <?php 
                        }
                        ?>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>&#8377;<?php echo $sp; ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <?php 
                            if($sp < 1000)
                            {
                                echo '<h6 class="font-weight-medium">&#8377;40</h6>';
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
                            if($sp < 1000)
                            {
                                $sp += 40;
                                echo '<h5>&#8377;'.$sp.'</h5>';
                            }
                            else
                            {
                                echo '<h5>&#8377;'.$sp.'</h5>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <form action="<?php echo site_url('Welcome/payment/').$sp.'/'.$billid; ?>" method="post">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="cod" value="cod" required>
                                    <label class="custom-control-label" for="cod">Cash On Delivery</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="online" value="online" required>
                                    <label class="custom-control-label" for="online">Online Payment</label>
                                </div>
                            </div>
                            <input type="submit" value="Place Order" class="btn btn-block btn-primary font-weight-bold py-3">
                        </form>
                    </div>
                </div>
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
    <!-- Checkout End -->

<script>

    function changestate()
    {
        $.ajax({

            type: 'post',
            url: '<?php echo site_url('Welcome/get_city'); ?>',
            cache: false,
            data: $('#state').serialize(),
            success: function(sel_city)
            {
                try
                {
                    $('#city').html(sel_city);
                }
                catch(e)
                {
                    alert(e);
                }
            }
        });
    }

</script>
