<?php
if (isset($data['username'])){?>
    <div class="x_content bs-example-popovers">
          <span>
              <h5 class="alert alert-success alert-dismissible fade in">همکار گرامی! رمز عبور را چاپ فرمایید و در پاکت مخصوص به مشترک تحویل نمایید</h5>
          </span>
    </div>
<div class="col-md-6 col-xs-12" id="PermitPrint">
    <div class="x_panel">
        <div class="x_title">
            <h2>شرکت خدماتی شهرک صنعتی شمس آباد
                <small> www.shamsabad.org </small>
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
            <br/>
        <span>
            <h3> </h3>
            <h4> </h4>
        </span>
    <div class="form-group">
        <label class=" control-label col-md-3 col-sm-3 col-xs-12">قرارداد بنام:<span class="required">*</span></label>
        <div class=" col-md-8 col-sm-8 col-xs-12">
            <input  dir="rtl" type="text" name="contract-name" class="form-control" required="required"  readonly value="<?=$data['contract_name']?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12 required">نام کاربری
            <span class="required">*</span></label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input class="form-control"  dir="ltr" type="text" name="user-name" required="required" class="form-control"   readonly value="<?=$data['username']?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">متراژ<span class="required">*</span></label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input class="form-control" dir="ltr" type="text" name="area" required="required" class="form-control" readonly value="<?=$data['area']?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">رمزعبور<span class="required">*</span></label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input class="form-control" dir="ltr" style="font-family: 'tahoma'" type="text" name="password1" minlength="7" required="required" class="form-control" readonly value="<?=$data['password']?>">
            <span>(حساس به حروف کوچک و بزرگ)</span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">زمان ثبت نام مشترک<span class="required">*</span></label>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <input class="form-control" dir="ltr" style="font-family: 'tahoma'" type="text" name="password2" minlength="7" required="required" class="form-control" readonly value="<?=$data['creationTime']?>">
        </div>
    </div>
    <br>
    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
        <div class=" hidden-print avoid-this">
            <button class="btn btn-primary print-link avoid-this float-left">
                <i class="fa fa-print"></i> چاپ
            </button>
            <a class="btn btn-default avoid-this" href="register"><i class="fa fa-arrow-circle-left"></i>بازگشت
            </a>
        </div>
    </div>
    </div>
    </div>
</div>
<?}else{
?>
<div class="col-md-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>ثبت مشترک جدید
                <small>لطفا در ثبت اطلاعات دقت فرمایید و پس از ثبت مشترک، نسخه چاپی را به مشترک تحویل نمایید</small>
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
            <br/>
            <form data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= baseUrl() ?>/asr/register" class="form-horizontal form-label-left" enctype="multipart/form-data">

                <div class="form-group">
                    <label class=" control-label col-md-3 col-sm-3 col-xs-12">قرارداد بنام:<span class="required">*</span></label>
                    <div class=" col-md-8 col-sm-8 col-xs-12">
                        <input   type="text" name="contract-name" class="form-control" required="required"  placeholder=" ">
                </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12 required">شماره قرارداد:
                        <span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input class="form-control"  dir="ltr" type="text" name="user-name" required="required" class="form-control" value="415-"  placeholder="شماره قرارداد">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">متراژ<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input class="form-control" dir="ltr" type="text" name="area" required="required" class="form-control"  placeholder="متراژ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">رمزعبور<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input class="form-control" dir="ltr" style="font-family: 'tahoma'" type="text" name="password1" minlength="7" required="required" class="form-control" placeholder="رمزعبور" value="<?
                        $pass= generatePassword(8);
                        echo $pass;
                        ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">تکرار رمزعبور<span class="required">*</span></label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input class="form-control" dir="ltr" style="font-family: 'tahoma'" type="text" name="password2" minlength="7" required="required" class="form-control" placeholder="تکرار رمزعبور" value="<?=$pass?>">
                    </div>
                </div>
                <br>
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <input class="btn btn-primary" type="submit" name="btn-report" value="ثبت">
                </div>
            </form>

        </div>
    </div>
</div>
<div class="clearfix"></div>

<hr>
<?}?>
<script> if ( window.history.replaceState ) { window.history.replaceState( null, null, window.location.href ); } </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="<?=baseUrl()?>/vendors/jQuery.print-master/bower_components/jquery/dist/jquery.min.js"><\/script>')
</script>
<script src="<?=baseUrl()?>/vendors/jQuery.print-master/jQuery.print.js"></script>
<script type='text/javascript'>
    //<![CDATA[
    jQuery(function($) { 'use strict';
        $("#PermitPrint").find('button').on('click', function() {
            //Print ele4 with custom options
            $("#PermitPrint").print({
                //Use Global styles
                globalStyles : true,
                //Add link with attrbute media=print
                mediaPrint : true,
                //Custom stylesheet
                stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
                //Print in a hidden iframe
                iframe : false,
                //Don't print this
                noPrintSelector : ".avoid-this",
                //Add this at top
                prepend : "",
                //Add this on bottom
                // append : "<span><br/>شرکت خدماتی شهرک صنعتی شمس آباد</span>",
                //Log to console when printing is done via a deffered callback
                deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
            });
        });
    });

</script>
