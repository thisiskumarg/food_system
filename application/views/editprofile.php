<?php 
foreach($result as $row)
{
    $n = $row['name'];
    $m = $row['mobile'];
    $e = $row['email'];
}

?>

<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">My Profile</span></h2>
    <?php echo '<h3 class="text-center text-danger">'.$this->session->flashdata('msg').'</h3>'; ?>
    <div class="row px-xl-5">
        <div class="col-lg-10 mb-5 mx-auto">
            <div class="contact-form bg-light p-30">
                <div id="success"></div>
                <form action="<?php echo site_url('Welcome/updateprofile'); ?>" method="POST">
                    <div class="row control-group">
                        <label class="col-sm-5">Name</label>
                        <input type="text" class="form-control font-weight-bold col-sm-7" name="en" value="<?php echo $n; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5">Mobile</label>
                        <input type="tel" class="form-control font-weight-bold col-sm-7" name="em" value="<?php echo $m; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5">Email</label>
                        <input type="email" class="form-control font-weight-bold col-sm-7" name="ee" value="<?php echo $e; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-primary py-2 px-4" type="submit">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>