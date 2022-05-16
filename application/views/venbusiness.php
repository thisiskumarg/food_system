<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">My Business</span></h2>
    <?php echo '<h3 class="text-center text-danger">'.$this->session->flashdata('msg').'</h3>'; ?>
    <?php 
    foreach($result as $row)
    {
        $status = $row['bis_ver'];
        $bsno = $row['bsno'];
        $bn = $row['bname'];
        $bm = $row['bmobile'];
        $be = $row['bemail'];
        $bi = base_url($row['bphoto']);
        $ba = $row['baddress'];
        $bl = $row['blocname'];
        $bcity = $row['bcityname'];
    }
    if(!empty($bsno) && !empty($bn) && !empty($bm) && !empty($be) && !empty($bi) && !empty($ba) && !empty($bl) && !empty($bcity))
    {
    ?>
    <div class="row px-xl-5">
        <div class="col-lg-8 mb-5 mx-auto">
            <div class="contact-form bg-light p-30">
                <div id="success"></div>
                <form>
                    <div class="row col-sm-12 mb-2">
                        <?php 
                        if($status == '0')
                        {
                            echo '<h6 class="text-danger">Non - Verified</h6>';
                        }
                        if($status == '1')
                        {
                            echo '<h6 class="text-success">Verified</h6>';
                        }
                        if($status == '2')
                        {
                            echo '<h6 class="text-warning">Suspended</h6>';
                        }
                        ?>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5">Business Name</label>
                        <div class="font-weight-bold col-sm-7"><?php echo $bn; ?></div>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5">Business Mobile</label>
                        <div class="font-weight-bold col-sm-7"><?php echo $bm; ?></div>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5">Business Email</label>
                        <div class="font-weight-bold col-sm-7"><?php echo $be; ?></div>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5">Business Address</label>
                        <div class="font-weight-bold col-sm-7"><?php echo $ba.', '.$bl.', '.$bcity; ?></div>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="text-center mt-4">
                        <a href="<?php echo site_url('Welcome/editvenbusinessform/').$bsno; ?>" class="btn btn-primary py-2 px-4">Edit Business</a>
                        <a href="<?php echo site_url('Welcome/delvenbusinessform/').$bsno; ?>" class="btn btn-danger py-2 px-4">Delete Business</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4 mb-5">
            <div class="contact-form bg-light text-center">
                <img class="img-fluid w-40" src="<?php echo $bi; ?>" alt="" style="height: 200px; width: 200px;">
                <form action="<?php echo site_url('Welcome/updateprofilepic'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="text-center m-4">
                        <input type="file" name="pic" class="form-control">
                    </div>
                    <div class="text-center pb-4">
                        <input type="submit" value="Update Pic" class="btn btn-primary py-2 px-4">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php 
    }
    else
    {
        echo '<h3 class="text-center text-danger">Your Business has been deleted or not created.</h3>';
    }
    ?>
</div>
