<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Registration</span></h2>
    <?php echo '<h3 class="text-center text-danger">'.$this->session->flashdata('msg').'</h3>'; ?>
    <div class="row px-xl-5">
        <div class="col-lg-6 mb-5 mx-auto">
            <div class="contact-form bg-light p-30">
                <div id="success"></div>
                <form action="<?php echo site_url('Welcome/signup'); ?>" method="POST">
                    <div class="row col-sm-12">
                        <div class="custom-control custom-radio custom-control-inline col-sm-6">
                            <input type="radio" class="custom-control-input" id="vendor" name="role" value="2">
                            <label class="custom-control-label" for="vendor">Vendor</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="user" name="role" value="3">
                            <label class="custom-control-label" for="user">User</label>
                        </div>
                    </div>
                    <hr>
                    <div class="control-group">
                        <input type="text" class="form-control" name="n" placeholder="Enter Full Name">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="tel" class="form-control" name="m" placeholder="Enter Mobile">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" name="e" placeholder="Enter Email">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="password" class="form-control" name="p" placeholder="Enter Password">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary py-2 px-4" type="submit">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>