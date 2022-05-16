<?php 
foreach($result1 as $row1)
{
    $bsno = $row1['bsno'];
    $bn = $row1['bname'];
    $bm = $row1['bmobile'];
    $be = $row1['bemail'];
    $bi = base_url($row1['bphoto']);
    $ba = $row1['baddress'];
    $bctid = $row1['bcityid'];
    $bct = $row1['bcityname'];
    $blid = $row1['blid'];
    $bl = $row1['blocname'];
}
?>

<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Edit Business</span></h2>
    <?php echo '<h3 class="text-center text-danger">'.$this->session->flashdata('msg').'</h3>'; ?>
    <div class="row px-xl-5">
        <div class="col-lg-12 mb-5 mx-auto">
            <div class="contact-form bg-light p-30">
                <div id="success"></div>
                <form action="<?php echo site_url('Welcome/editvenbusiness/').$bsno; ?>" method="POST">
                    <div class="row control-group">
                        <label class="col-sm-5">Business Name</label>
                        <input type="text" name="ebn" value="<?php echo $bn; ?>" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5">Business Mobile</label>
                        <input type="tel" name="ebm" value="<?php echo $bm; ?>" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5">Business Email</label>
                        <input type="email" name="ebe" value="<?php echo $be; ?>" class="col-sm-7 form-control">
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5">Business City</label>
                        <select name="bcity" id="bcity" onchange="changebcity()" class="col-sm-7 form-control">
                            <option value="<?php echo $bctid; ?>" selected><?php echo $bct; ?></option>
                            <?php 
                            foreach($result2 as $row2)
                            {
                                $bcityid = $row2['bcityid'];
                                $bcity = $row2['bcityname'];
                                if($bcityid != $bctid && $bcity != $bct)
                                {
                                    echo '<option value="'.$bcityid.'">'.$bcity.'</option>';
                                }
                            }
                            ?>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5">Business Location</label>
                        <select name="blocation" id="bloc" class="col-sm-7 form-control">
                            <option value="<?php echo $blid; ?>"><?php echo $bl; ?></option>
                        </select>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="row control-group">
                        <label class="col-sm-5">Business Address</label>
                        <textarea name="eba" cols="30" rows="6" class="col-sm-7 form-control"><?php echo $ba; ?></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="text-center mt-4">
                        <input type="submit" value="UPDATE" class="btn btn-primary py-2 px-4">
                    </div>
                </form>
            </div>
        </div>
    </div>
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