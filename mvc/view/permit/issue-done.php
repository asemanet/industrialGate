<?php
?>
<div class="col-md-6 col-sm-6 col-xs-12" id="PermitPrint" >
    <p class="hidden-print avoid-this" style="color: #444444">لطفا در صورت نیاز برگه خروج را چاب بفرمایید</p>

    <div class=" hidden-print avoid-this">
        <button class="btn btn-primary print-link avoid-this float-left">
            <i class="fa fa-print"></i> چاپ
        </button>
        <button class="btn btn-default avoid-this"><i class="fa fa-download"></i> ایجاد PDF
        </button>
        <a href="/permit/issue" class="btn btn-default avoid-this"><i class="fa fa-arrow-circle-left"></i>بازگشت
        </a>
    </div>
    <div class="clearfix"></div>

    <div style="size: A4; position: absolute;"  id="">
        <img src="<?=baseUrl()?>/build/images/permit.png" class="img-rounded">
        <p dir= "rtl" style="position: absolute;bottom: 330px;left: 590px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt">شماره:</p>
        <p dir= "rtl" style="position: absolute;bottom: 330px;left: 355px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> <? echo $data['permit_rand'];   ?></p>
        <p dir= "ltr" style="position: absolute;bottom: 285px;left: 350px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> <? echo $data['issue_date'];   ?></p>
        <p dir= "rtl" style="position: absolute;bottom: 240px;left: 350px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> <? echo $data['car_type'];   ?></p>
        <p dir= "rtl" style="position: absolute;bottom: 193px;left: 350px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> <? echo $data['license_plate'];   ?></p>
        <p dir= "rtl" style="position: absolute;bottom: 145px;left: 350px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> <? echo $data['driver_name'];   ?></p>
        <p dir= "rtl" style="position: absolute;bottom: 100px;left: 350px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> <? echo $data['cargo'];   ?></p>
        <p dir= "rtl" style="position: absolute;bottom: 53px ;left: 350px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> <? echo $_SESSION['company_name'];   ?></p>
        <p style="position: absolute;bottom: 190px ;left: 840px; color: #151515; transform: rotate(-90deg); font-weight: bold; font-size: 20pt; font-family: 'B Koodak'">
            <?php
            echo jdate('f')."-".jdate('Y' );
            ?>
        </p>
        <p dir= "rtl" style="position:absolute; top:180px;right:100px; margin: 0px;  ">
            '<img  src= "https://chart.googleapis.com/chart?chld=H|0&chs=120x120&cht=qr&chl='<?=$data['exit_permit_hash']?>'&choe=UTF-8%22%20title=%22Link%20to%20Google.com">
        </p>
        <!--      <p style="position: absolute;bottom: 53px ;left: 600px; color: #151515; opacity:0.2;">-->
        <!--        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.google.com%2F&choe=UTF-8" title="Link to --><?php //echo $data['exitPermitHash']; ?><!--" />-->
        <!--      </p>-->
        <p dir= "rtl" style="position: absolute;bottom: 330px;left: 220px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt">شماره:</p>
        <p style="position: absolute;bottom: 330px;left: 70px; color: #151515; font-weight: bold;font-family: 'B Koodak'"> <? echo $data['permit_rand'];   ?></p>
        <p dir="ltr" style="position: absolute;bottom: 285px;left: 70px; color: #151515; font-weight: bold;font-family: 'B Koodak'"> <? echo $data['issue_date'];   ?></p>
        <p style="position: absolute;bottom: 240px;left: 70px; color: #151515; font-weight: bold;font-family: 'B Koodak'"> <? echo $data['car_type'];   ?></p>
        <p style="position: absolute;bottom: 193px;left: 70px; color: #151515; font-weight: bold;font-family: 'B Koodak' text-align: right"> <? echo $data['license_plate'];   ?></p>
        <p style="position: absolute;bottom: 145px;left: 70px; color: #151515; font-weight: bold;font-family: 'B Koodak' direction: rtl"> <? echo $data['driver_name'];   ?></p>
        <p style="position: absolute;bottom: 100px;left: 70px; color: #151515; font-weight: bold;font-family: 'B Koodak'"> <? echo $data['cargo'];   ?></p>
        <p style="position: absolute;bottom: 53px ;left: 70px; color: #151515;                   font-family: 'B Koodak'"> <? echo $_SESSION['company_name'];   ?></p>
    </div>
</div>

<!--<script> if ( window.history.replaceState ) { window.history.replaceState( null, null, window.location.href ); } </script>-->

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
                globalStyles : false,
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
                append : "<span><br/>شرکت خدماتی شهرک صنعتی شمس آباد</span>",
                //Log to console when printing is done via a deffered callback
                deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
            });
        });
    });
</script>
