<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Verified Businesses</span></h2>
    <h5 class="text-danger"><?php echo $this->session->flashdata('msg'); ?></h5>
    <form action="<?php echo site_url('Welcome/vbact'); ?>" method="post">
        <input type="submit" name="vbsus" value="SUSPEND" class="btn btn-warning mb-2 mr-2">
        <input type="submit" name="vbrem" value="REMOVE" class="btn btn-danger mb-2">
        <table class="table table-hover">
            <thead>
                <tr class="bg-dark text-white">
                    <th scope="col"><input type="checkbox" onclick="selectAll(this)"></th>
                    <th scope="col">Vendor Name</th>
                    <th scope="col">Business Image</th>
                    <th scope="col">Business Name</th>
                    <th scope="col">Business Address</th>
                    <th scope="col">Business Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach($result as $row)
                {
                    $v = $row['bis_ver'];
                    if($v == 1)
                    {
                        $bsno = $row['bsno'];
                        $vname = $row['name'];
                        $bimg = base_url($row['bphoto']);
                        $bnm = $row['bname'];
                        $badd = $row['baddress'];
                        $bcity = $row['bcityname'];
                        $bcat = $row['bcatname'];
                ?>
                <tr>
                    <th scope="row"><input type="checkbox" name="vb[]" value="<?php echo $bsno; ?>"></th>
                    <td><?php echo $vname; ?></td>
                    <td><img src="<?php echo $bimg; ?>" alt="Business_Photo" class="img-fluid" style="height: 100px; width: 150px;"></td>
                    <td><?php echo $bnm; ?></td>
                    <td><?php echo $badd.', '.$bcity; ?></td>
                    <td><?php echo $bcat; ?></td>
                    <td><a href="<?php echo site_url('Welcome/editvb/').$bsno; ?>" class="btn btn-primary">EDIT</a></td>
                </tr>
                <?php 
                    }
                }
                ?>
            </tbody>
        </table>
    </form>
</div>

<script>
    function selectAll(source)
    {
        checkboxes = document.getElementsByName('vb[]');
        for(var i in checkboxes)
        {
            checkboxes[i].checked = source.checked;
        }
    }
</script>