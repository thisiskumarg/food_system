<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Add your Business</span></h2>
    <?php echo '<h3 class="text-center text-danger">'.$this->session->flashdata('msg').'</h3>'; ?>
    <form action="<?php echo site_url('Welcome/addbusiness'); ?>" method="POST" enctype="multipart/form-data">
        <div class="row px-xl-5">
            <div class="col-lg-10 mb-5 mx-auto">
                <div class="contact-form bg-light p-30">
                    <!-- <div id="success"></div> -->
                    <div class="row control-group">
                        <label class="col-sm-5 col-form-label">Business Image</label>
                        <input type="file" name="bpic" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Business Name</label>
                        <input type="text" name="bn" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Business Address</label>
                        <input type="text" name="badd" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Business E-Mail</label>
                        <input type="email" name="bem" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Business Contact No</label>
                        <input type="tel" name="bno" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group mb-3">
                        <label class="col-sm-5 col-form-label">Business City</label>
                        <select name="bcity" id="city" onchange="oncitychange()" class="col-sm-7 form-control">
                            <option selected disabled>--- Select City ---</option>
                            <?php 
                            foreach($result1 as $row)
                            {
                                $bcityid = $row['bcityid'];
                                $bcityname = $row['bcityname'];
                            ?>
                            <option value="<?php echo $bcityid; ?>"><?php echo $bcityname; ?></option>
                            <?php 
                            }
                            ?>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group mb-3">
                        <label class="col-sm-5 col-form-label">Business Location</label>
                        <select name="blocation" id="location" class="col-sm-7 form-control">
                            <option selected disabled>--- Select Location ---</option>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5 col-form-label">Business Category</label>
                        <select name="bcat" class="col-sm-7 form-control">
                            <option selected disabled>--- Select Category ---</option>
                            <?php 
                            foreach($result2 as $row)
                            {
                                $bcatid = $row['bcid'];
                                $bcat = $row['bcatname'];
                            ?>
                            <option value="<?php echo $bcatid; ?>"><?php echo $bcat; ?></option>
                            <?php 
                            }
                            ?>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mx-auto">
                <input type="submit" value="ADD BUSINESS" class="btn btn-primary py-2 px-4">
            </div>
        </div>
    </form>
</div>

<script>
    function oncitychange()
    {
        $.ajax({
            type: 'post',
            url: "<?php echo site_url('Welcome/get_location'); ?>",
            cache: false,
            data: $('#city').serialize(),
            success: function(sel_city)
            {
                try
                {
                    $('#location').html(sel_city);
                }
                catch(e)
                {
                    alert(e);
                }
            }
        });
    }
</script>