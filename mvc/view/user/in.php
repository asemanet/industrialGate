<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>تغییر رمز عبور
                    <!--                    <small>زیر عنوان</small>-->
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"> <i class="fa fa-chevron-up"> </i> </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"> <i class="fa fa-wrench"> </i> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li> <a href="#">تنظیمات 1</a>
                            </li>
                            <li><a href="#">تنظیمات 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"> <i class="fa fa-close"> </i> </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="alerts"></div>


                <p>رمز عبور باید حاوی حداقل 7 کارکتر و شامل عدد و حرف باشد
                    <!--                          <code>صفحه کمکی</code> را نگاه کنید <a-->
                    <!--                            href="form.html">راهنما</a>-->
                </p>
                <br>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form-horizontal form-label-left">


                    <div class="item form-group">
                        <div class="control-label col-md-3 col-sm-3 col-xs-12">
                            <input type="password" class="form-control col-md-7 col-xs-12"  placeholder="<?=_ph_password?>" name="password1"><br>
                            <br>
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="control-label col-md-3 col-sm-3 col-xs-12">
                            <input type="password" class="form-control col-md-7 col-xs-12" placeholder="<?=_ph_confirm_password?>" name="password2"><br>
                            <br>
                        </div>
                    </div>
                    <br>
                    <div class="item form-group">
                        <div class="control-label col-md-3 col-sm-3 col-xs-12">
                            <div class="login_msg">
                                <div style="position: absolute; text-align: center;">
            <span class="alert-danger" style="margin: auto auto"><?php
                if (isset($message)){
                    echo $message;}
                ?>
  </span>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                    <button type="submit"  name="btn" class="btn btn-success"><?=_btn_reset?></button>
                </form>
            </div>
        </div>
    </div>
</div>
