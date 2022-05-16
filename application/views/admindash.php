<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Admin Dashboard</span></h2>
    <div class="row my-4">
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Vendors
                </div>
                <div class="card-body">
                    <?php 
                    $tv = 0;
                    foreach($result1 as $row1)
                    {
                        $usrid = $row1['uid'];
                        $rlid = $row1['roleid'];
                        $del = $row1['uis_del'];
                        if(isset($usrid) && $rlid == '2' && $del == '0')
                        {
                            $tv += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $tv; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/managevendors'); ?>" class="btn btn-primary">Go to Total Vendors</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Verified Vendors
                </div>
                <div class="card-body">
                    <?php 
                    $vv = 0;
                    foreach($result1 as $row1)
                    {
                        $usrid = $row1['uid'];
                        $rlid = $row1['roleid'];
                        $del = $row1['uis_del'];
                        $status = $row1['uis_ver'];
                        if(isset($usrid) && $rlid == '2' && $status == '1' && $del == '0')
                        {
                            $vv += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $vv; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/vvendors'); ?>" class="btn btn-primary">Go to Verified Vendors</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Suspended Vendors
                </div>
                <div class="card-body">
                    <?php 
                    $sv = 0;
                    foreach($result1 as $row1)
                    {
                        $usrid = $row1['uid'];
                        $rlid = $row1['roleid'];
                        $del = $row1['uis_del'];
                        $status = $row1['uis_ver'];
                        if(isset($usrid) && $rlid == '2' && $status == '2' && $del == '0')
                        {
                            $sv += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $sv; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/svendors'); ?>" class="btn btn-primary">Go to Suspended Vendors</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Non - Verified Vendors
                </div>
                <div class="card-body">
                    <?php 
                    $nvv = 0;
                    foreach($result1 as $row1)
                    {
                        $usrid = $row1['uid'];
                        $rlid = $row1['roleid'];
                        $del = $row1['uis_del'];
                        $status = $row1['uis_ver'];
                        if(isset($usrid) && $rlid == '2' && $status == '0' && $del == '0')
                        {
                            $nvv += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $nvv; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/nvvendors'); ?>" class="btn btn-primary">Go to Non - Verified Vendors</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Customers
                </div>
                <div class="card-body">
                    <?php 
                    $tc = 0;
                    foreach($result1 as $row1)
                    {
                        $usrid = $row1['uid'];
                        $rlid = $row1['roleid'];
                        $del = $row1['uis_del'];
                        if(isset($usrid) && $rlid == '3'  && $del == '0')
                        {
                            $tc += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $tc; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/managecustomers'); ?>" class="btn btn-primary">Go to Manage Customers</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Verified Customers
                </div>
                <div class="card-body">
                    <?php 
                    $vc = 0;
                    foreach($result1 as $row1)
                    {
                        $usrid = $row1['uid'];
                        $rlid = $row1['roleid'];
                        $del = $row1['uis_del'];
                        $status = $row1['uis_ver'];
                        if(isset($usrid) && $rlid == '3' && $status == '1' && $del == '0')
                        {
                            $vc += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $vc; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/vcustomers'); ?>" class="btn btn-primary">Go to Verified Customers</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Suspended Customers
                </div>
                <div class="card-body">
                    <?php 
                    $sc = 0;
                    foreach($result1 as $row1)
                    {
                        $usrid = $row1['uid'];
                        $rlid = $row1['roleid'];
                        $del = $row1['uis_del'];
                        $status = $row1['uis_ver'];
                        if(isset($usrid) && $rlid == '3' && $status == '2' && $del == '0')
                        {
                            $sc += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $sc; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/scustomers'); ?>" class="btn btn-primary">Go to Suspended Customers</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Non - Verified Customers
                </div>
                <div class="card-body">
                    <?php 
                    $nvc = 0;
                    foreach($result1 as $row1)
                    {
                        $usrid = $row1['uid'];
                        $rlid = $row1['roleid'];
                        $del = $row1['uis_del'];
                        $status = $row1['uis_ver'];
                        if(isset($usrid) && $rlid == '3' && $status == '0' && $del == '0')
                        {
                            $nvc += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $nvc; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/nvcustomers'); ?>" class="btn btn-primary">Go to Non - Verified Customers</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Businesses
                </div>
                <div class="card-body">
                    <?php 
                    $tb = 0;
                    foreach($result2 as $row2)
                    {
                        $bid = $row2['bsno'];
                        $del = $row2['bis_del'];
                        if(isset($bid) && $del == '0')
                        {
                            $tb += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $tb; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/managebusinesses'); ?>" class="btn btn-primary">Go to Manage Businesses</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Verified Businesses
                </div>
                <div class="card-body">
                    <?php 
                    $vb = 0;
                    foreach($result2 as $row2)
                    {
                        $bid = $row2['bsno'];
                        $del = $row2['bis_del'];
                        $status = $row2['bis_ver'];
                        if(isset($bid) && $status == '1' && $del == '0')
                        {
                            $vb += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $vb; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/vbusinesses'); ?>" class="btn btn-primary">Go to Verified Businesses</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Suspended Businesses
                </div>
                <div class="card-body">
                    <?php 
                    $sb = 0;
                    foreach($result2 as $row2)
                    {
                        $bid = $row2['bsno'];
                        $del = $row2['bis_del'];
                        $status = $row2['bis_ver'];
                        if(isset($bid) && $status == '2' && $del == '0')
                        {
                            $sb += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $sb; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/sbusinesses'); ?>" class="btn btn-primary">Go to Suspended Businesses</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Non - Verified Businesses
                </div>
                <div class="card-body">
                    <?php 
                    $nvb = 0;
                    foreach($result2 as $row2)
                    {
                        $bid = $row2['bsno'];
                        $del = $row2['bis_del'];
                        $status = $row2['bis_ver'];
                        if(isset($bid) && $status == '0' && $del == '0')
                        {
                            $nvb += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $nvb; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/nvbusinesses'); ?>" class="btn btn-primary">Go to Non - Verified Businesses</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Products
                </div>
                <div class="card-body">
                    <?php 
                    $tp = 0;
                    foreach($result3 as $row3)
                    {
                        $pid = $row3['psno'];
                        $del = $row3['pis_del'];
                        if(isset($pid) && $del == '0')
                        {
                            $tp += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $tp; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/manageproducts'); ?>" class="btn btn-primary">Go to Manage Products</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Verified Products
                </div>
                <div class="card-body">
                    <?php 
                    $vp = 0;
                    foreach($result3 as $row3)
                    {
                        $pid = $row3['psno'];
                        $del = $row3['pis_del'];
                        $status = $row3['pis_ver'];
                        if(isset($pid) && $status == '1' && $del == '0')
                        {
                            $vp += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $vp; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/vproducts'); ?>" class="btn btn-primary">Go to Verified Products</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Suspended Products
                </div>
                <div class="card-body">
                    <?php 
                    $sp = 0;
                    foreach($result3 as $row3)
                    {
                        $pid = $row3['psno'];
                        $del = $row3['pis_del'];
                        $status = $row3['pis_ver'];
                        if(isset($pid) && $status == '2' && $del == '0')
                        {
                            $sp += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $sp; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/sproducts'); ?>" class="btn btn-primary">Go to Suspended Products</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Non - Verified Products
                </div>
                <div class="card-body">
                    <?php 
                    $nvp = 0;
                    foreach($result3 as $row3)
                    {
                        $pid = $row3['psno'];
                        $del = $row3['pis_del'];
                        $status = $row3['pis_ver'];
                        if(isset($pid) && $status == '0' && $del == '0')
                        {
                            $nvp += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $nvp; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/nvproducts'); ?>" class="btn btn-primary">Go to Non - Verified Products</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Cities
                </div>
                <div class="card-body">
                    <?php 
                    $tct = 0;
                    foreach($result4 as $row4)
                    {
                        $ctid = $row4['bcityid'];
                        $status = $row4['bcity_del'];
                        if(isset($tct) && $status == '0')
                        {
                            $tct += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $tct; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/managebcities'); ?>" class="btn btn-primary">Go to Manage Cities</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Locations
                </div>
                <div class="card-body">
                    <?php 
                    $tl = 0;
                    foreach($result5 as $row5)
                    {
                        $blid = $row5['blid'];
                        $status = $row5['bloc_del'];
                        if(isset($blid) && $status == '0')
                        {
                            $tl += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $tl; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/manageblocations'); ?>" class="btn btn-primary">Go to Manage Locations</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Categories
                </div>
                <div class="card-body">
                    <?php 
                    $tcat = 0;
                    foreach($result6 as $row6)
                    {
                        $catid = $row6['bcid'];
                        $status = $row6['bcat_del'];
                        if(isset($catid) && $status == '0')
                        {
                            $tcat += 1;
                        }
                    }
                    ?>
                    <h1 class="card-title"><?php echo $tcat; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/managebcategories'); ?>" class="btn btn-primary">Go to Manage Categories</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Orders
                </div>
                <div class="card-body">
                    <?php 
                    // $nvp = 0;
                    // foreach($result as $row)
                    // {
                    //     $verp = $row['pis_ver'];
                    //     if($verp == '0')
                    //     {
                    //         $nvp += 1;
                    //     }
                    // }
                    ?>
                    <h1 class="card-title"><?php //echo $nvp; ?>NA</h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/manageorders'); ?>" class="btn btn-primary">Go to Orders</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Reviews
                </div>
                <div class="card-body">
                    <?php 
                    // $nvp = 0;
                    // foreach($result as $row)
                    // {
                    //     $verp = $row['pis_ver'];
                    //     if($verp == '0')
                    //     {
                    //         $nvp += 1;
                    //     }
                    // }
                    ?>
                    <h1 class="card-title"><?php //echo $nvp; ?>NA</h1>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/reviews'); ?>" class="btn btn-primary">Go to Reviews</a>
                </div>
            </div>
        </div>
    </div>
</div>