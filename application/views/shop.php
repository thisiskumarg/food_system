

    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Search</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form action="">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="s" placeholder="Search for products">
                        </div>
                    </form>
                </div>
                <!-- Category Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Category</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form action="" class="pb-4">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search for products">
                        </div>
                    </form>
                    <?php 
                    foreach($result2 as $row2)
                    {
                        $catid = $row2['bcid'];
                        $cat = $row2['bcatname'];
                    ?>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" name="cat[]" value="<?php echo $catid; ?>" class="custom-control-input" id="<?php echo $cat; ?>" onchange="search()">
                        <label class="custom-control-label" for="<?php echo $cat; ?>"><?php echo $cat; ?></label>
                        <!-- <span class="badge border font-weight-normal">1000</span> -->
                    </div>
                    <?php 
                    }
                    ?>
                </div>
                <!-- Category End -->
                
                <!-- Location Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Location</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form action="" class="pb-4">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text bg-transparent text-primary">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search for products">
                        </div>
                    </form>
                    <?php 
                    foreach($result3 as $row3)
                    {
                        $cityid = $row3['bcityid'];
                        $city = $row3['bcityname'];
                    ?>
                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" name="city[]" value="<?php echo $cityid; ?>" class="custom-control-input" id="<?php echo $city; ?>" onchange="search()">
                        <label class="custom-control-label" for="<?php echo $city; ?>"><?php echo $city; ?></label>
                        <!-- <span class="badge border font-weight-normal">1000</span> -->
                    </div>
                    <?php 
                    }
                    ?>
                </div>
                <!-- Location End -->

            </div>
            <!-- Shop Sidebar End -->

            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <!-- <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Latest</a>
                                        <a class="dropdown-item" href="#">Popularity</a>
                                        <a class="dropdown-item" href="#">Best Rating</a>
                                    </div>
                                </div>
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">Showing</button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">10</a>
                                        <a class="dropdown-item" href="#">20</a>
                                        <a class="dropdown-item" href="#">30</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="row col-sm-12" id="i">
                        <div class="row col-12" id="product">
                            <div class="col-12 text-center">
                                <div class="row" id="load_data"></div>
                            </div>
                            <div id="error_load_message"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="error_load_message"></div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

<script>

    $(document).ready(function()
    {
        var limit = 0;
        var action = 'inactive';
        $(window).scroll(function()
        {
            if($(window).scrollTop() + $(window).height() > $('#load_data').height() && action == 'inactive')
            {
                limit++;
                action = 'active';
                setTimeout(function()
                {
                    load_more_data(limit);
                }, 1000);
            }
        });

        if(action == 'inactive')
        {
            load_more_data(limit);
        }

        function load_more_data(limit)
        {
            $.ajax(
            {
                method: 'post',
                url: "<?php echo site_url('Welcome/more_data'); ?>",
                cache: false,
                data: {limit: limit},
                success: function(data)
                {
                    if(data == 1)
                    {
                        $('#error_load_message').append('<h4 class="text-danger">No more record found!</h4>');
                        $('#error_load_message').attr('disabled', true);
                        action = 'active';
                    }
                    else
                    {
                        action = 'inactive';
                        $('#load_data').append(data);
                    }
                }
            });
        }
    });

    function search()
    {
        var citylist = [];
        var catlist = [];

        $.each($("input[name='city[]']:checked"), function() {
            citylist.push($(this).val());
        });

        $.each($("input[name='cat[]']:checked"), function() {
            catlist.push($(this).val());
        });

        $.ajax({
            url: "<?php echo site_url('Welcome/filter'); ?>",
            method: "post",
            data: {'data': citylist, 'x': catlist},
            cache: false,
            success: function(a)
            {
                $('#product').empty();
                $('#product').append(a);
            }
        });
    }

    $(document).ready(function() {

        $('#s').keyup(function() {
            var txt = $(this).val();

            if(txt != "")
            {
                $.ajax({
                    type: 'post',
                    url: '<?php echo site_url('Welcome/isearch'); ?>',
                    data: {search:txt},
                    dataType: 'text',
                    cache: false,
                    success: function(data)
                    {
                        $('#i').html(data);
                    }
                });
            }
            else
            {
                $.ajax({
                    url: '<?php echo site_url('Welcome/isearch'); ?>',
                    success: function(data1)
                    {
                        $('#i').html(data1);
                    }
                });
            }
        });
    });

</script>