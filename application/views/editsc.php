<?php 
foreach($result as $row)
{
    $cnm = $row['name'];
    $cmb = $row['mobile'];
    $cem = $row['email'];
    $cimg = base_url($row['image']);
    $uid = $row['uid'];
}
?>
<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Edit Suspended Customer</span></h2>
    <h5 class="text-center text-danger"><?php echo $this->session->flashdata('msg'); ?></h5>
    <form action="<?php echo site_url('Welcome/updatesc/').$uid; ?>" method="POST" enctype="multipart/form-data">
        <div class="row px-xl-5">
            <div class="col-lg-8 mb-4">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Customer Name</label>
                        <input type="text" class="form-control font-weight-bold col-sm-7" name="ecnm" value="<?php echo $cnm; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Customer Mobile</label>
                        <input type="text" class="form-control font-weight-bold col-sm-7" name="ecmb" value="<?php echo $cmb; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group mb-3">
                        <label class="col-sm-5 col-form-label">Customer E-Mail</label>
                        <input type="text" class="form-control font-weight-bold col-sm-7" name="ecem" value="<?php echo $cem; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="contact-form bg-light p-30">
                    <label class="row col-sm-12 mb-4">Customer Image</label>
                    <img src="<?php echo $cimg; ?>" alt="" class="img-fluid" style="height: 200px; width: 300px;">
                    <input type="file" name="ecpic" class="col-sm-12 form-control mt-4" required>
                </div>
            </div>
            <div class="contact-form col-sm-12 bg-light p-30">
                <div class="text-center">
                    <input type="submit" value="UPDATE CUSTOMER" class="btn btn-primary py-2 px-4">
                </div>
            </div>
        </div>
    </form>
</div>