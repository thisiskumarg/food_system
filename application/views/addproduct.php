<?php 
foreach($result as $row)
{
    $bsno = $row['bsno'];
    $bname = $row['bname'];
}
?>
<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Add Product</span></h2>
    <?php echo '<h3 class="text-center text-danger">'.$this->session->flashdata('msg').'</h3>'; ?>
    <form action="<?php echo site_url('Welcome/addproduct/').$bsno; ?>" method="POST" enctype="multipart/form-data">
        <div class="row px-xl-5">
            <div class="col-lg-10 mb-5 mx-auto">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <div class="row control-group mb-3">
                        <label class="col-sm-5 col-form-label">Business Name</label>
                        <input type="text" value="<?php echo $bname; ?>" class="col-sm-7 form-control border-0">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Brand Name</label>
                        <input type="text" name="brand" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Product Image</label>
                        <input type="file" name="ppic" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Product Name</label>
                        <input type="text" name="pn" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Product Quantity</label>
                        <input type="text" name="pq" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Product Price</label>
                        <input type="text" name="pp" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Discount (in %)</label>
                        <input type="text" name="discount" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Product Description</label>
                        <textarea name="pdes" cols="30" rows="5" class="col-sm-7 form-control"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="mx-auto">
                <input type="submit" value="ADD PRODUCT" class="btn btn-primary py-2 px-4">
            </div>
        </div>
    </form>
</div>