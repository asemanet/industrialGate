<script src="<?=baseUrl()?>/vendors/jquery/dist/jquery.min.js"></script>
<script>
    $(document).on('keypress',function(e) {
        if(e.which == 13) {
            $('#backform').click();
        }
    });
</script>
<div class="content">
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="color"><?php
                    if (isset($_SESSION['company_name'])) {
                        echo $_SESSION['company_name']." "."عزیز";
                    }else{
                        echo "کاربر عزیز";
                    }
                    ?>
                    <small></small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">تنظیمات 1</a>
                            </li>
                            <li><a href="#">تنظیمات 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content bs-example-popovers">
          <span>
              <h5 class="alert alert-success alert-dismissible fade in"><?=$message?></h5>
          </span>
            </div>
        </div>
    </div>
</div>


<!--ارجاع به صفحه پرداخت آسان پرداخت-->
