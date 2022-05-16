<?php 
foreach($result as $row)
{
    $bnm = $row['bname'];
    $pnm = $row['pname'];
    $pbrand = $row['brandname'];
    $pqnt = $row['pquantity'];
    $pp = $row['pprice'];
    $dis = $row['discount'];
    $pdes = $row['pdescription'];
    $pimg = base_url($row['pimage']);
    $psno = $row['psno'];
}
?>
<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Edit Non - Verified Product</span></h2>
    <h5 class="text-center text-danger"><?php echo $this->session->flashdata('msg'); ?></h5>
    <form action="<?php echo site_url('Welcome/updatenvp/').$psno; ?>" method="POST" enctype="multipart/form-data">
        <div class="row px-xl-5">
            <div class="col-lg-8 mb-4">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <div class="row control-group">
                        <label class="col-sm-5 col-form-label">Business Name</label>
                        <div class="col-sm-7 form-control border-0"><?php echo $bnm; ?></div>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Product Name</label>
                        <input type="text" class="form-control font-weight-bold col-sm-7" name="epnm" value="<?php echo $pnm; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Product Brand</label>
                        <input type="text" class="form-control font-weight-bold col-sm-7" name="epb" value="<?php echo $pbrand; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group mb-3">
                        <label class="col-sm-5 col-form-label">Product Quantity</label>
                        <input type="text" class="form-control font-weight-bold col-sm-7" name="epqnt" value="<?php echo $pqnt; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5 col-form-label">Product Price (in Rs.)</label>
                        <input type="text" class="form-control font-weight-bold col-sm-7" name="epp" value="<?php echo $pp; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Product Discount (in %)</label>
                        <input type="text" class="form-control font-weight-bold col-sm-7" name="edis" value="<?php echo $dis; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5 col-form-label">Product Description</label>
                        <textarea name="epdes" cols="30" rows="4" class="form-control font-weight-bold col-sm-7"><?php echo $pdes; ?></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="contact-form bg-light p-30">
                    <label class="row col-sm-12 mb-4">Product Image</label>
                    <img src="<?php echo $pimg; ?>" alt="" class="img-fluid" style="height: 200px; width: 300px;">
                    <input type="file" name="eppic" class="col-sm-12 form-control mt-4" required>
                </div>
            </div>
            <div class="contact-form col-sm-12 bg-light p-30">
                <div class="text-center">
                    <input type="submit" value="UPDATE PRODUCT" class="btn btn-primary py-2 px-4">
                </div>
            </div>
        </div>
    </form>
</div>