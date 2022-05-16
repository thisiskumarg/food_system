

    <!-- Breadcrumb Start -->

    <!-- Breadcrumb End -->

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <!-- <div class="input-group mb-4">
                    <div class="input-group-append">
                        <button class="btn btn-primary"><i class="fas fa-phone-volume"></i> Business Contact</button>
                    </div>
                    <div class="form-control border-0">1800-180-2526</div>
                </div> -->
                <div class="bg-light p-30 mb-5">
                    <div class="col-12">
                        <h2 class="section-title position-relative text-uppercase text-center mb-4 bg-secondary py-2">
                            <span class="text-warning">Business Details</span>
                        </h2>
                    </div>
                    <?php 
                    foreach($result2 as $row2)
                    {
                        $bimg = base_url($row2['bphoto']);
                        $bnm = $row2['bname'];
                        $bcat = $row2['bcatname'];
                        $badd = $row2['baddress'];
                        $bloc = $row2['blocname'];
                        $bcity = $row2['bcityname'];
                    ?>
                    <div class="row justify-content-between mb-3">
                        <div class="col-sm-4 mx-auto">
                            <img src="<?php echo $bimg; ?>" alt="Business_Photo" class="rounded-circle img-fluid" style="height: 200px; width: 420px;">
                        </div>
                        <div class="col-sm-4">
                            <div class="row my-2">
                                <h5 class="col-sm-4">Name:</h5>
                                <h5 class="text-info col-sm-8"><?php echo $bnm; ?></h5>
                            </div>
                            <div class="row my-2">
                                <h5 class="col-sm-4">Category:</h5>
                                <h5 class="text-info col-sm-8"><?php echo $bcat; ?></h5>
                            </div>
                            <div class="row my-2">
                                <h5 class="col-sm-4">Contact:</h5>
                                <h5 class="text-info col-sm-8">1800-180-2526</h5>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="row my-2">
                                <h5 class="col-sm-4">City:</h5>
                                <h5 class="text-info col-sm-8"><?php echo $bcity; ?></h5>
                            </div>
                            <div class="row my-2">
                                <h5 class="col-sm-4">Location:</h5>
                                <h5 class="text-info col-sm-8"><?php echo $bloc; ?></h5>
                            </div>
                            <div class="row my-2">
                                <h5 class="col-sm-4">Address:</h5>
                                <h5 class="text-info col-sm-8"><?php echo $badd; ?></h5>
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <div class="col-12">
                    <h2 class="bg-light position-relative text-uppercase text-center text-warning mb-4">
                        <span class=" pr-3">Business Products</span>
                    </h2>
                </div>
                <div class="row">
                    <?php 
                    foreach($result1 as $row1)
                    {
                        $psno = $row1['psno'];
                        $pimg = base_url($row1['pimage']);
                        $pname = $row1['pname'];
                        $pq = $row1['pquantity'];
                        $pp = $row1['pprice'];
                    ?>
                    <div class="col-sm-3">
                        <div class="bg-light justify-content-between mb-3 py-3">
                            <div class="text-center">
                                <img src="<?php echo $pimg; ?>" alt="Business_Photo" class="img-fluid" style="height: 150px; width: fit-content;">
                            </div>
                            <div class="text-center">
                                <h3 class="text-info"><?php echo $pname ?></h3>
                                <h5>&#8377;<?php echo $pp; ?></h5>
                                <h6>Quantity: <?php echo $pq; ?></h6>
                            </div>
                            <div class="text-center">
                                <a href="<?php echo site_url('Welcome/detail/').$bsno.'/'.$psno; ?>" class="col-sm-10 btn btn-primary">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
            </div>
        </div>
    </div>
    <!-- Cart End -->

