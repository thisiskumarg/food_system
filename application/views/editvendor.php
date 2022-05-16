<?php 
foreach($result as $row)
{
    $vnm = $row['name'];
    $vmb = $row['mobile'];
    $vem = $row['email'];
    $vimg = base_url($row['image']);
    $uid = $row['uid'];
}
?>
<div class="col-sm-10">
    <?php 
    if(!empty($vv))
    {
        echo '<h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Edit Verified Vendor</span></h2>';
        echo '<h5 class="text-center text-danger">'.$this->session->flashdata('msg').'</h5>';
        echo '<form action="'.site_url('Welcome/updatevv/').$uid.'" method="POST" enctype="multipart/form-data">';
    }
    elseif(!empty($sv))
    {
        echo '<h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Edit Suspended Vendor</span></h2>';
        echo '<h5 class="text-center text-danger">'.$this->session->flashdata('msg').'</h5>';
        echo '<form action="'.site_url('Welcome/updatesv/').$uid.'" method="POST" enctype="multipart/form-data">';
    }
    elseif(!empty($nvv))
    {
        echo '<h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Edit Non - Verified Vendor</span></h2>';
        echo '<h5 class="text-center text-danger">'.$this->session->flashdata('msg').'</h5>';
        echo '<form action="'.site_url('Welcome/updatenvv/').$uid.'" method="POST" enctype="multipart/form-data">';
    }
    ?>
        <div class="row px-xl-5">
            <div class="col-lg-8 mb-4">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Customer Name</label>
                        <input type="text" class="form-control font-weight-bold col-sm-7" name="evnm" value="<?php echo $vnm; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Customer Mobile</label>
                        <input type="text" class="form-control font-weight-bold col-sm-7" name="evmb" value="<?php echo $vmb; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group mb-3">
                        <label class="col-sm-5 col-form-label">Customer E-Mail</label>
                        <input type="text" class="form-control font-weight-bold col-sm-7" name="evem" value="<?php echo $vem; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="contact-form bg-light p-30">
                    <label class="row col-sm-12 mb-4">Customer Image</label>
                    <img src="<?php echo $vimg; ?>" alt="" class="img-fluid" style="height: 200px; width: 300px;">
                    <input type="file" name="evpic" class="col-sm-12 form-control mt-4" required>
                </div>
            </div>
            <div class="contact-form col-sm-12 bg-light p-30">
                <div class="text-center">
                    <input type="submit" value="UPDATE VENDOR" class="btn btn-primary py-2 px-4">
                </div>
            </div>
        </div>
    </form>
</div>