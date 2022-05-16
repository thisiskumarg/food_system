<?php 
foreach($result as $row)
{
    $n = $row['name'];
    $m = $row['mobile'];
    $e = $row['email'];
    $i = base_url($row['image']);
}

?>

<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">My Profile</span></h2>
    <?php echo '<h3 class="text-center text-danger">'.$this->session->flashdata('msg').'</h3>'; ?>
    <div class="row px-xl-5">
        <div class="col-lg-8 mb-5 mx-auto">
            <div class="contact-form bg-light p-30">
                <div id="success"></div>
                <form>
                    <div class="row control-group">
                        <label class="col-sm-5">Name</label>
                        <div class="font-weight-bold col-sm-7"><?php echo $n; ?></div>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5">Mobile</label>
                        <div class="font-weight-bold col-sm-7"><?php echo $m; ?></div>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5">Email</label>
                        <div class="font-weight-bold col-sm-7"><?php echo $e; ?></div>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="text-center mt-4">
                        <a href="<?php echo site_url('Welcome/editprofile'); ?>" class="btn btn-primary py-2 px-4">Edit Profile</a>
                        <button class="btn btn-primary py-2 px-4" type="submit">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4 mb-5">
            <div class="contact-form bg-light text-center">
                <img class="img-fluid w-40" src="<?php echo $i; ?>" alt="" style="height: 200px; width: 200px;">
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
</div>
