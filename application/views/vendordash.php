<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Vendor Dashboard</span></h2>
    <div class="row my-4">
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Products Worth
                </div>
                <div class="card-body">
                    <?php 
                    $tpw = 0;
                    foreach($result1 as $row1)
                    {
                        $tpw += $row1['pprice'];
                    }
                    ?>
                    <h1 class="card-title">&#8377;<?php echo $tpw; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Revenue
                </div>
                <div class="card-body">
                    <?php 
                    // $vp = 0;
                    // $sql = "SELECT * FROM products WHERE is_verified = '1' AND uid = '$uid'";
                    // $res = mysqli_query($con, $sql);
                    // foreach($res as $row)
                    // {
                    //     $vp += 1;
                    // }
                    ?>
                    <h1 class="card-title">&#8377;0<?php //echo $vp; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Daily Revenue
                </div>
                <div class="card-body">
                    <?php 
                    // $nvp = 0;
                    // $sql = "SELECT * FROM products WHERE is_verified = '0' AND uid = '$uid'";
                    // $res = mysqli_query($con, $sql);
                    // foreach($res as $row)
                    // {
                    //     $nvp += 1;
                    // }
                    ?>
                    <h1 class="card-title">&#8377;0<?php //echo $nvp; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Monthly Revenue
                </div>
                <div class="card-body">
                    <?php 
                    // $sp = 0;
                    // $sql = "SELECT * FROM products WHERE is_verified = '2' AND uid = '$uid'";
                    // $res = mysqli_query($con, $sql);
                    // foreach($res as $row)
                    // {
                    //     $sp += 1;
                    // }
                    ?>
                    <h1 class="card-title">&#8377;0<?php //echo $sp; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Yearly Revenue
                </div>
                <div class="card-body">
                    <?php 
                    // $tp = 0;
                    // $sql = "SELECT * FROM products WHERE uid = '$uid'";
                    // $res = mysqli_query($con, $sql);
                    // foreach($res as $row)
                    // {
                    //     $tp += 1;
                    // }
                    ?>
                    <h1 class="card-title">&#8377;0<?php //echo $tp; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Your Business Views
                </div>
                <div class="card-body">
                    <?php 
                    foreach($result2 as $row2)
                    {
                        $views = $row2['bviews'];
                    }
                    ?>
                    <h1 class="card-title"><?php echo $views; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Business Reviews
                </div>
                <div class="card-body">
                    <?php 
                    // $vp = 0;
                    // $sql = "SELECT * FROM products WHERE is_verified = '1' AND uid = '$uid'";
                    // $res = mysqli_query($con, $sql);
                    // foreach($res as $row)
                    // {
                    //     $vp += 1;
                    // }
                    ?>
                    <h1 class="card-title">NA<?php //echo $vp; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Product Reviews
                </div>
                <div class="card-body">
                    <?php 
                    // $nvp = 0;
                    // $sql = "SELECT * FROM products WHERE is_verified = '0' AND uid = '$uid'";
                    // $res = mysqli_query($con, $sql);
                    // foreach($res as $row)
                    // {
                    //     $nvp += 1;
                    // }
                    ?>
                    <h1 class="card-title">NA<?php //echo $nvp; ?></h1>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Your Business
                </div>
                <div class="card-body">
                    <?php 
                    foreach($result2 as $row2)
                    {
                        $bname = $row2['bname'];
                    }
                    ?>
                    <h3 class="card-title"><?php echo $bname; ?></h3>
                </div>
                <div class="card-footer text-muted">
                    <a href="<?php echo site_url('Welcome/venbusiness'); ?>" class="btn btn-primary">Go to My Business</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Total Products
                </div>
                <div class="card-body">
                    <?php 
                    $tp = 0;
                    foreach($result1 as $row1)
                    {
                        $tp += 1;
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
                    foreach($result1 as $row1)
                    {
                        $verp = $row1['pis_ver'];
                        if($verp == '1')
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
                    foreach($result1 as $row1)
                    {
                        $verp = $row1['pis_ver'];
                        if($verp == '2')
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
    </div>
    <div class="row my-4">
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Non - Verified Products
                </div>
                <div class="card-body">
                    <?php 
                    $nvp = 0;
                    foreach($result1 as $row1)
                    {
                        $verp = $row1['pis_ver'];
                        if($verp == '0')
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
</div>