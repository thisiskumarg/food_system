<?php 
foreach($result1 as $row1)
{
    $vnm = $row1['name'];
    $bnm = $row1['bname'];
    $bmb = $row1['bmobile'];
    $bem = $row1['bemail'];
    $badd = $row1['baddress'];
    $bimg = base_url($row1['bphoto']);
    $bcityid = $row1['bcityid'];
    $bcity = $row1['bcityname'];
    $blid = $row1['blid'];
    $bloc = $row1['blocname'];
    $bcid = $row1['bcid'];
    $bcat = $row1['bcatname'];
    $bsno = $row1['bsno'];
}
?>
<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Edit Verified Business</span></h2>
    <h5 class="text-danger"><?php echo $this->session->flashdata('msg'); ?></h5>
    <?php echo '<h3 class="text-center text-danger">'.$this->session->flashdata('msg').'</h3>'; ?>
    <form action="<?php echo site_url('Welcome/updatevb/').$bsno; ?>" method="POST" enctype="multipart/form-data">
        <div class="row px-xl-5">
            <div class="col-lg-8 mb-4">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <div class="row control-group">
                        <label class="col-sm-5 col-form-label">Vendor Name</label>
                        <div class="col-sm-7 form-control border-0"><?php echo $vnm; ?></div>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Business Name</label>
                        <input type="text" class="form-control font-weight-bold col-sm-7" name="ebnm" value="<?php echo $bnm; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Business Mobile</label>
                        <input type="tel" class="form-control font-weight-bold col-sm-7" name="ebmb" value="<?php echo $bmb; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group mb-3">
                        <label class="col-sm-5 col-form-label">Business E-Mail</label>
                        <input type="email" class="form-control font-weight-bold col-sm-7" name="ebem" value="<?php echo $bem; ?>">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5 col-form-label">Business Address</label>
                        <textarea name="ebadd" cols="10" rows="5" class="form-control font-weight-bold col-sm-7"><?php echo $badd; ?></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group my-3">
                        <label class="col-sm-5 col-form-label">Business City</label>
                        <select name="bcity" id="bcity" onchange="changebcity()" class="form-control font-weight-bold col-sm-7">
                            <option value="<?php echo $bcityid; ?>" selected><?php echo $bcity; ?></option>
                            <?php 
                            foreach($result2 as $row2)
                            {
                                $bctid = $row2['bcityid'];
                                $bct = $row2['bcityname'];
                                if($bctid != $bcityid && $bct != $bcity)
                                {
                                    echo '<option value="'.$bctid.'">'.$bct.'</option>';
                                }
                            }
                            ?>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5 col-form-label">Business Location</label>
                        <select name="bloc" id="bloc" class="form-control font-weight-bold col-sm-7">
                            <option value="<?php echo $blid; ?>" selected><?php echo $bloc; ?></option>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group mt-3">
                        <label class="col-sm-5 col-form-label">Business Category</label>
                        <select name="ebcat" id="ebcat" class="form-control font-weight-bold col-sm-7">
                            <option value="<?php echo $bcid; ?>"><?php echo $bcat; ?></option>
                            <?php 
                            foreach($result3 as $row3)
                            {
                                $bcatid = $row3['bcid'];
                                $bcatname = $row3['bcatname'];
                                if($bcatid != $bcid && $bcatname != $bcat)
                                {
                                    echo '<option value="'.$bcatid.'">'.$bcatname.'</option>';
                                }
                            }
                            ?>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="contact-form bg-light p-30">
                    <label class="row col-sm-12 mb-4">Business Image</label>
                    <img src="<?php echo $bimg; ?>" alt="" class="img-fluid" style="height: 200px; width: 300px;">
                    <input type="file" name="ebpic" class="col-sm-12 form-control mt-4" required>
                </div>
            </div>
            <div class="contact-form col-sm-12 bg-light p-30">
                <div class="text-center">
                    <input type="submit" value="UPDATE BUSINESS" class="btn btn-primary py-2 px-4">
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function changebcity()
    {
        $.ajax({
            type: 'post',
            url: "<?php echo site_url('Welcome/get_location'); ?>",
            cache: false,
            data: $('#bcity').serialize(),
            success: function(sel_city)
            {
                try
                {
                    $('#bloc').html(sel_city);
                }
                catch(e)
                {
                    alert(e);
                }
            }
        });
    }
</script>