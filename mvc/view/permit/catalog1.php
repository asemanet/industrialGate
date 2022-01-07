<?php

//var_dump(randomDigits(7));

//echo generatePermitId(7);
//echo generateHash(7);
//$pageIndex= $data['pageIndex'];
//echo $pageIndex;
//dump($data);
//dump($records);
//$e= rand(111,999999);
//echo $e;



//generateQr("من رشیدی");
//die();

//
//echo "<img src='https://chart.googleapis.com/chart?chld=H|0&chs=300x300&cht=qr&chl=test&choe=UTF-8%22%20title=%22Link%20to%20Google.com';>";
//die();


//ob_start();
//$image = generateQr("test");
//$output = ob_get_content();
//ob_end_clean();
//header("Content-type: image/png");
//die();





if ($records==null){
    echo "
<div class=\"alert alert-success alert-dismissible ng-binding\" ng-show=\"success\">
    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>
    کاربر عزیز شما برگه خروج ثبت شده ندارید!
</div>
";
}
?>

<? if ($records!=null){?>
    <?= paginantion('/permit/catalog',1 ,'paginate_button active', 'paginate_button',$pageCount, $pageIndex );?>
    <div>

    </div>
    <!--  <table id="datatable-buttons" class="col-sm-12 table table-striped table-bordered dataTable no-footer dtr-inline collapsed " role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">-->
    <!--<table id="datatable-responsive"  class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">-->
    <!--<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"-->
    <table id="datatable-buttons" data-order='[[ 4, "asc" ]]' data-page-length='50'  class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">



        <thead>
        <tr>
            <th>شماره پلاک</th>
            <th>نوع بار</th>
            <th>نام راننده</th>
            <th>تاریخ ثبت</th>
            <th>تاریخ خروج</th>
            <th>نوع خودرو</th>
            <th>وضعیت / چاپ</th>
            <th>شماره برگه خروج</th>
        </tr>
        </thead>

        <tbody>
        <tr>
            <?php
            foreach ($records as $data){
            ?>
            <td><?php  echo $data['license_plate']; ?></td>
            <td><?php  echo $data['cargo']; ?></td>
            <td><?php  echo $data['driver_name']; ?></td>
            <td dir="ltr">
                <?php
                $issueDate= $data["issue_date"];
                $issueDate= str_replace('-' , '/' , "$issueDate" );
                echo $issueDate;
                ?>
            </td>
            <td dir="ltr">
                <?php
                $dueDate= $data["due_date"];
                $dueDate= str_replace('-' , '/' , "$dueDate" );
                echo $dueDate;
                ?>
            </td>
            <td><?php  echo $data['car_type']; ?></td>
            <td class="text-center">
                <?php
                if ($data['exit_done']==1) {
                    ?>
                    <button dir="ltr"  class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="تاریخ خروج: <?=$dueDate?>">خروج موفق</button>


                <? }elseif($data['exit_done']==0) { ?>
                    <button  name="showPermit" type="button" data-toggle="modal" data-target="#showPermit"
                             onclick="testPermit(
                                     '<?= $data['exit_permit_hash']; ?>',
                                     '<?= $data["license_plate"] ?>',
                                     '<?= $data["driver_name"] ?>',
                                     '<?
                             $issueDate = $data["issue_date"];
                             $issueDate = str_replace('-', '/', "$issueDate");
                             echo $issueDate;
                             ?>',
                                     '<?= $data["car_type"] ?>',
                                     '<?= $data["cargo"] ?>',
                                     '<?= $data['permit_rand']; ?>',
                                     )">
                        <img data-toggle="tooltip" data-placement="top" title="چاپ مجدد" src="<?= baseUrl() ?>/build/images/print.png" width="60%" class="fa fa-print">
                        <input type="hidden" value="">
                    </button>
                    <?php
                }elseif ($data['exit_done']==2){ ?>
                    <button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="عدم خروج در مهلت 24 ساعته---عدم خروج از گیت پلاک خوان---مخدوش بودن پلاک جلو---عدم شناسایی دوربین پلاک خوان ">
                        <!--                    <span style="font-size: 10pt">خطا</span>-->
                        &nbsp &nbsp &nbsp خطا &nbsp &nbsp  &nbsp
                    </button>
                <?}?>
            </td>
            <td ><?=$data['permit_rand']; ?></td>
        </tr>
        <?php
        } ?>
        </tbody>
    </table>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="<?=baseUrl()?>/vendors/jQuery.print-master/bower_components/jquery/dist/jquery.min.js"><\/script>')
    </script>
    <script src="<?=baseUrl()?>/vendors/jQuery.print-master/jQuery.print.js"></script>
    <script type="text/javascript">


        jQuery(function ($) {
            'use strict';
            $("#permitPrint").find('button1').on('click', function () {
                //Print ele4 with custom options
                $("#permitPrint").print({
                    //Use Global styles
                    globalStyles: true,
                    //Add link with attrbute media=print
                    mediaPrint: true,
                    //Custom stylesheet
                    stylesheet: "http://fonts.googleapis.com/css?family=Inconsolata",
                    //Print in a hidden iframe
                    iframe: false,
                    //Don't print this
                    noPrintSelector: ".avoid-this",
                    //Add this at top
                    prepend: "",
                    //Add this on bottom
                    append: "<span><br/>شرکت خدماتی شهرک صنعتی شمس آباد</span>",
                    //Log to console when printing is done via a deffered callback
                    deferred: $.Deferred().done(function () {
                        console.log('Printing done', arguments);
                    })
                });
            });
        });

        function testPermit(hash,plate,driver,date1,car,cargo,num1) {
            document.getElementById("permit").innerHTML=
                '<div style="size:A4 portrait;">'+
                '<div   id="permitPrint">'+
                '<img  style="width:850px;" src="<?=baseUrl()?>/build/images/permit.png">'+
                '<p dir= "ltr" "rtl" style="position:absolute; top:55px;right:270px; color: #151515; font-weight: bold;font-family: "B Koodak";  ">:شماره</p>'+
                '<p dir= "ltr" "rtl" style="position:absolute; top:55px;right:400px; color: #151515; font-weight: bold;font-family: "B Koodak";  ">'+num1+'</p>'+
                '<p dir= "ltr" "rtl" style="position:absolute; top:100px;right:400px; color: #151515; font-weight: bold;font-family: "B Koodak";  ">'+date1+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:140px;right:400px; color: #151515; font-weight: bold;font-family: "B Koodak";  ">'+car+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:185px;right:400px; color: #151515; font-weight: bold;font-family: "B Koodak";  ">'+plate+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:225px;right:400px; color: #151515; font-weight: bold;font-family: "B Koodak";  ">'+driver+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:270px;right:400px; color: #151515; font-weight: bold;font-family: "B Koodak";  ">'+cargo+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:310px;right:400px; color: #151515; font-weight: bold;font-family: "B Koodak";  ">'+'<?php echo $_SESSION['company_name']; ?>'+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:160px;right:95px; margin: 0px;  ">'+
                '<img  src= "https://chart.googleapis.com/chart?chld=H|0&chs=120x120&cht=qr&chl='+hash+'&choe=UTF-8%22%20title=%22Link%20to%20Google.com">'
                +'</p>'+

                '<p style="position: absolute;top: 175px ;right: -20px; color: #151515; transform: rotate(-90deg); font-weight: bold; font-size: 15pt; font-family: "B Koodak"">'+
                '<? echo jdate(f)."-".jdate(Y ); ?>'+
                '</p>'+
                '<p dir= "ltr" style="position:absolute; top:55px;right:610px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">:شماره</p>'+
                '<p dir= "ltr" style="position:absolute; top:55px;right:700px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";">'+num1+'</p>'+
                '<p dir= "ltr" style="position:absolute; top:100px;right:670px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+date1+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:140px;right:700px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+car+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:185px;right:690px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+plate+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:230px;right:700px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+driver+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:270px;right:700px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+cargo+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:315px;right:700px; color: #151515; font-weight:bold; font-size:7pt; font-family: "B Koodak";  ">'+'<?php echo $_SESSION['company_name']; ?>'+'</p>'+
                '</div>'+
                '</div>';

        }
        //



    </script>



    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="showPermit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">برگه خروج شماره:</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div  class="modal-body">
                    <div id="permit">

                    </div>

                </div>

            </div>
            <div class="modal-footer avoid-this" id="permitPrint" style="size: A4 portrait;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                <button1 type="button"  class="btn btn-primary  avoid-this ">چاپ</button1>
            </div>
        </div>

    </div>
    <br>
    <br>
    <br>
<?}?>
<div class="clearfix"></div>
