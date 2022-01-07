<?php
?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2 class="">تایید آدرس ایمیل
                    <!--                    <small>زیر عنوان</small>-->
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
            <div class="x_content">
                <div id="alerts"></div>
<!--                <span class="section">مشخصات  قرارداد</span>-->
                <? if (!isset($_POST['btn-submit'])){?>
                <form  name="form-1" method="post" action="/profile/verifyEmail"  class="form-horizontal form-label-left" data-parsley-validate="">


                    <div class="item form-group has-feedback"">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">آدرس ایمیل
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" required="required" class="form-control col-md-7 col-xs-12"  name="email" value="" placeholder="ایمیل">
                            <div class="form-control-feedback">
                                <i class="fa fa-envelope-o text-muted"></i>
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <input class="btn btn-primary" type="submit" name="btn-submit" value="دریافت کد تایید">
                    </div>
                </form><?}elseif (isset($_POST['btn-submit'])){?>
                          <p>کد تا یید به آدرس ایمیل <span class="text-info" href = "<?=$_SESSION['recipient']?>"><?=$_SESSION['recipient']?></span> ارسال گردید:</p>
                          <small  class="text-muted"> پوشه spam و junk ایمیل را نیز چک فرمایید</small>
                    <br>
                    <form  name="form-2" method="post" action="/profile/verify"  class="form-horizontal form-label-left" data-parsley-validate="">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">کد تایید
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" required="required" class="form-control col-md-7 col-xs-12"  name="otp" placeholder="کد تایید را فقط تایپ نمایید" ">
                                <span class="fa fa-email form-control-feedback left" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="item form-group">
                            <input class="btn btn-success" type="submit" name="btn-verify" value="ثبت کد تایید">
                            <a class="btn btn-danger" href="/profile/verifyEmail">بازگشت</a>
                        </div>
                    </form>
                <?}?>
            </div>
        </div>
    </div>
</div>

