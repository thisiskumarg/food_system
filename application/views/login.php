<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Login</span></h2>
    <?php echo '<h3 class="text-center text-danger">'.$this->session->flashdata('msg').'</h3>'; ?>
    <div class="row px-xl-5">
        <div class="col-lg-6 mb-5 mx-auto">
            <div class="contact-form bg-light p-30">
                <div id="success"></div>
                <form action="<?php echo site_url('Welcome/signin'); ?>" method="POST">
                    <div class="control-group">
                        <input type="email" class="form-control" name="e" placeholder="Enter Email"
                            data-validation-required-message="Please Enter Your Email" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="password" class="form-control" name="p" placeholder="Enter Password"
                            data-validation-required-message="Please Enter Your Password" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary py-2 px-4" type="submit">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>