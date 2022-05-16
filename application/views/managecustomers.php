<div class="col-sm-10">
    <h2 class="section-title position-relative text-uppercase text-center mb-4"><span class="bg-secondary pr-3">Manage Customers</span></h2>
    <table class="table table-hover">
        <thead>
            <tr class="bg-dark text-white">
            <th scope="col">Status</th>
            <th scope="col">Customer Image</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Customer Mobile</th>
            <th scope="col">Customer Email</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($result as $row)
            {
                $status = $row['uis_ver'];
                $uimg = base_url($row['image']);
                $uname = $row['name'];
                $umobile = $row['mobile'];
                $uemail = $row['email'];
            ?>
            <tr>
                <?php 
                if($status == '0')
                {
                    echo '<th scope="row" class="text-danger">Non - Verified</th>';
                }
                elseif($status == '1')
                {
                    echo '<th scope="row" class="text-success">Verified</th>';
                }
                elseif($status == '2')
                {
                    echo '<th scope="row" class="text-warning">Suspended</th>';
                }
                ?>
                <td><img src="<?php echo $uimg; ?>" alt="User_Photo" style="height: 100px; width: 150px;"></td>
                <td><?php echo $uname; ?></td>
                <td><?php echo $umobile; ?></td>
                <td><?php echo $uemail; ?></td>
            </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
</div>