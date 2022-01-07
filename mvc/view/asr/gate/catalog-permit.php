<?php
//dump($records);
?>
<div class="page-title">
    <div class="title_left">
        <h4><small>گزارش برگه خروج </small></h4>
        <hr>
    </div>

    <div class="title_right">
        <div class="col-md-4 col-sm-4 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <span  class="form-control" >تاریخ امروز: <?=jdate('Y/m/d')?></span>
                <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><span class="fa fa-clock-o"></span></button>
                    </span>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
    <?= paginantion('/asr/catalogPermit',1 ,'paginate_button active', 'paginate_button',$pageCount, $pageIndex );?>

<table id="datatable-buttons" data-order='[[ 6, "asc" ]]' data-page-length='300'  class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>نام مشترک</th>
        <th>شماره قرارداد</th>
        <th>شماره پلاک</th>
        <th>نوع بار</th>
        <th>نام راننده</th>
        <th>تاریخ ثبت</th>
        <th>تاریخ خروج</th>
        <th>نوع خودرو</th>
        <th>چاپ برگه خروج</th>
        <th>شماره برگه خروج</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach ($records as $data){
        ?>
        <tr <?php
        if ($data["exit_done"]==1){
            echo " class='green'";
        }elseif($data['exit_done']==2){
            echo " class='text-warning '";
        }else{
            echo " class='dark'";
        }
        ?>>
            <td><?=$data['company_name']?></td>
            <td dir="ltr"><?=$data['contract_number']; ?></td>
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
                if ($data['exit_done']==2){
                    echo "  <button type=\"button\" class=\"btn btn-warning btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"عدم خروج در مهلت 24 ساعته---عدم خروج از گیت پلاک خوان---مخدوش بودن پلاک جلو---عدم شناسایی دوربین پلاک خوان \">
                    &nbsp &nbsp &nbsp خطا &nbsp &nbsp  &nbsp
                </button>";
                }else {
                    echo $dueDate;
                }
                ?>
            </td>
            <td><?php  echo $data['car_type']; ?></td>
            <td>
                <button name="showPermit" type="button" data-toggle="modal" data-target="#showPermit" onclick="testPermit(
                        '<?=$data['exit_permit_hash']; ?>',
                        '<?=$data["license_plate"] ?>',
                        '<?=$data["driver_name"] ?>',
                        '<?
                $issueDate= $data["issue_date"];
                $issueDate= str_replace('-' , '/' , "$issueDate" );
                echo $issueDate;
                ?>',
                        '<?=$data["car_type"] ?>',
                        '<?=$data["cargo"] ?>',
                        '<?=$data['permit_rand']; ?>',
                        '<?=$data['company_name']; ?>',
                        )">
                    <img src="<?=baseUrl()?>/build/images/print.png" width="60%"  class="fa fa-print"  >
                    <input type="hidden" value="">
                </button>
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

    function testPermit(hash,plate,driver,date1,car,cargo,num1,company) {
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
            '<p dir= "rtl" style="position:absolute; top:310px;right:400px; color: #151515; font-weight: bold;font-family: "B Koodak";  ">'+company+'</p>'+
            '<p dir= "rtl" style="position:absolute; top:160px;right:95px; margin: 0px;  ">'+
            '<img  src= "https://chart.googleapis.com/chart?chld=H|0&chs=120x120&cht=qr&chl='+hash+'&choe=UTF-8%22%20title=%22Link%20to%20Google.com">'
            +'</p>'+

            '<p style="position: absolute;top: 175px ;right: -20px; color: #151515; transform: rotate(-90deg); font-weight: bold; font-size: 15pt; font-family: "B Koodak"">'+
            '<?php echo jdate(f)."-".jdate(Y ); ?>'+
            '</p>'+
            '<p dir= "ltr" style="position:absolute; top:55px;right:610px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">:شماره</p>'+
            '<p dir= "ltr" style="position:absolute; top:55px;right:700px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";">'+num1+'</p>'+
            '<p dir= "ltr" style="position:absolute; top:100px;right:670px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+date1+'</p>'+
            '<p dir= "rtl" style="position:absolute; top:140px;right:700px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+car+'</p>'+
            '<p dir= "rtl" style="position:absolute; top:185px;right:690px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+plate+'</p>'+
            '<p dir= "rtl" style="position:absolute; top:230px;right:700px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+driver+'</p>'+
            '<p dir= "rtl" style="position:absolute; top:270px;right:700px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+cargo+'</p>'+
            '<p dir= "rtl" style="position:absolute; top:315px;right:700px; color: #151515; font-weight:bold; font-size:7pt; font-family: "B Koodak";  ">'+company+'</p>'+
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

<div class="clearfix"></div>



