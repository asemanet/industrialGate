<?php
//echo generatePermitId(7);
//echo generateHash(7);
//$pageIndex= $data['pageIndex'];
//echo $pageIndex;
// dump($data);
//dump($records);
//dump($_SESSION);
$companyDetails= $data['companyDetails'];
if ($records==null){
    echo "
<div class=\"alert alert-danger alert-dismissible fade in \" ng-show=\"success\">
    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>
    کاربر عزیز اطلاعاتی جهت نمایش وجود ندارد!
</div>
";
}
?>

<link rel="stylesheet" href="<?=baseUrl()?>/vendors/aseman/factor.css">
<script> if ( window.history.replaceState ) { window.history.replaceState( null, null, window.location.href ); } </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="<?=baseUrl()?>/vendors/jQuery.print-master/bower_components/jquery/dist/jquery.min.js"><\/script>')
</script>
<script src="<?=baseUrl()?>/vendors/jQuery.print-master/jQuery.print.js"></script>





<?= paginantion('/financial/invoice',1 ,'paginate_button active', 'paginate_button',$pageCount, $pageIndex );?>

<!--  <table  class="col-sm-12 table table-striped table-bordered dataTable no-footer dtr-inline collapsed " role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">-->
<table id="datatable-buttons" data-order='[[ 3, "asc" ]]' data-page-length='50'  class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">

    <thead>
    <tr>
        <th>شماره فاکتور</th>
        <th>شماره کارت پرداخت </th>
        <th>تاریخ پرداخت</th>
        <th>مبلغ پرداختی</th>
        <th>شماره پیگیری</th>
<!--        <th>شماره مرجع بانکی</th>-->
        <th>وضعیت</th>
        <th>چاپ فاکتور</th>
        <th>شرح</th>
    </tr>
    </thead>

    <tr>
        <?php
        foreach ($records as $data){
        $explodeTime= explode(' ', $data['paymentTime']);
        $explodeTime= str_replace('-','/', $explodeTime);
        $data['explodeTime']= $explodeTime[1];

        ?>
        <td><?php  echo $data['invoice_id']; ?></td>
        <td dir="ltr"><?php  echo $data['card_number']; ?></td>
        <td style="direction: ltr; font-size: 10pt;">
            <?php
            $data['paymentTime']= str_replace('-', '/' , $data['paymentTime'] );
            echo $data['paymentTime'];
            ?>
        </td>
        <td><?php  echo $data['totality']; ?></td>
        <td><?php  echo $data['reference']; ?></td>
<!--        <td>--><?php // echo $data['rrn']; ?><!--</td>-->
        <td>
            <?php
            if ($data['payed']==1){
                echo "<span class='alert-success'>پرداخت شده</span>";
            }else{
                echo "<span class='alert-danger'>عدم پرداخت</span>";
            }
            ?>
        </td>
        <td>
            <button name="showPermit" type="button" data-toggle="modal" data-target="#showPermit"
                    onclick="testPermit(
                            '<?=$data["invoice_id"] ?>',
                            '<?=$data["card_number"] ?>',
                            '<?=$data["paymentTime"] ?>',
                            '<?=number_format($data["totality"] )?>',
                            '<?=$data["reference"] ?>',
                            '<?=$data["rrn"] ?>',
                            '<?
                    if ($data["payed"]==1){
                        echo "<span class= alert-success >پرداخت آنلاین</span>";
                    }else{
                        echo "<span class= alert-danger >عدم پرداخت </span>";
                    }
                    ?>',
                            '<?=number_format($data["rate"]) ?>',
                            '<?=$data["qty"] ?>',
                            '<?=number_format($data["amount"]) ?>',
                            '<?=number_format($data["vat"]) ?>',
                            '<?=$data["explodeTime"] ?>',
                            '<?=$data["national_number"] ?>',
                            '<?=$data["economic_code"] ?>',
                            '<?=$data["address"] ?>',
                            '<?=$data["tel"] ?>',
                            '<?=$data["postal_code"] ?>',
                            '<?=$data["company_name"] ?>',
                            )">
                <img src="<?=baseUrl()?>/build/images/print.png" width="60%"  class="fa fa-print" >
                <input type="hidden" value="">
            </button>
        </td>
        <td style="font-size: 8pt"><?=$data['title']?></td>
    </tr>
    <?php
    } ?>
</table>

<div style="position: center" class=" hidden-print avoid-this">

</div>
<script type="text/javascript">
    function testPermit(shomareFactor,shomrehCart,paymentTime,totality,reference,rrn,payed,rate,qty,amount,vat,explodeTime,national_number,economic_code,address,tele1,postal_code,name) {
        document.getElementById("permit").innerHTML=
            '<div class="modal-header">'+
            '<h5 class="modal-title" id="exampleModalLabel">فاکتور شماره:'+shomareFactor+'</h5>'+
            '<button type="button" class="close" data-dismiss="modal">&times;</button>'+
            '</div>'+

            '<div id="permitPrint" style="width:842px; ">'+
            '<div style="padding-right: 30px;">'+
            '<table style="width: 100%" class="">'+
            '<tr>'+
            '<td>'+
            '<img style="margin-top: 5px;" src="<?=baseUrl()?>/build/images/logo-1-min.png">'+
            '</td>'+
            '<td style="padding-right: 120px">'+
            '<table>'+
            '<tbody>'+
            '<tr>'+
            '<td class="td-header">'+
            '<h5 style="font-weight: bold">شرکت خدماتی شهرک صنعتی شمس آباد</h5>'+
            '</td>'+
            '</tr>'+
            '<tr>'+
            '<td class="td-header">'+
            '<h5 style="font-weight: bold">صورتحساب فروش کالا و خدمات</h5>'+
            '</td>'+
            '</tr>'+
            '</tbody>'+
            '</table>'+
            '</td>'+
            '<td style="width: 200px; " >'+
            '<table class="table-01">'+
            '<tbody >'+
            '<tr>'+
            '<td class="tr-padding border-bottom">'+
            '<span class="font-bold" style="font-size: 14px; font-family:"B Nazanin";">شماره فاکتور:</span>'+
            '</td>'+
            '<td class="tr-padding border-bottom ">'+
            '<span>'+shomareFactor+'</span>'+
            '</td>'+
            '</tr>'+
            '<tr>'+
            '<td class="tr-padding ">'+
            '<span class="font-bold" style="font-size: 14px; font-family: "B Nazanin";">تاریخ:</span>'+
            '</td>'+
            '<td>'+
            '<span style="padding-left: 10px">'+explodeTime+'</span>'+
            '</td>'+
            '</tr>'+
            '</tbody>'+
            '</table>'+
            '</td>'+
            '</tr>'+
            '</table>'+
            '<table class="table-02" style="width: 100%;">'+
            '<tr>'+
            '<td colspan="2">'+
            '<table style="width: 100%;" class="border-bottom">'+
            '<tr>'+
            '<td style="padding-right: 0px; colspan="2">'+
            '<span class="font-bold">مشخصات فروشنده</span>'+
            '</td>'+
            '<td style="text-align:left;">'+
            '<span dir: "rtl" class="font-bold">شماره قرارداد:&nbsp</span>'+
            '</td>'+
            '<td style="text-align:right;">'+
            '<i dir: "rtl" >'+'<?=$_SESSION['contract_number']?>'+'</i>'+
            '</td>'+
            '<td style="text-align:center;">'+
            '<span class="font-bold">مشخصات خریدار</span>'+
            '</td>'+
            '</tr>'+

            '</table>'+
            '</td>'+

            '</tr>'+
            '<tr style="width: 100%">'+
            '<td style="width: 50%;border-left: 1px solid">'+
            '<table class="" style="padding-right: 5px">'+
            '<tr>'+
            '<td>'+
            '<span class="font-bold">نام شخص حقیقی/حقوقی:</span>'+
            '</td>'+
            '<td>'+
            '<span>شرکت خدماتی شهرک صنعتی شمس آباد</span>'+
            '</td>'+
            '</tr>'+
            '<tr>'+
            '<td>'+
            '<span class="font-bold">شماره اقتصادی:</span>'+
            '<span>'+411481866918+'</span>'+
            '</td>'+
            '<td style="text-align: center">'+
            '<span class="font-bold">شناسه ملی:</span>'+
            '<span>'+14004887729+'</span>'+
            '</td>'+
            '</tr>'+
            '<tr>'+
            '<td>'+
            '<span class="font-bold">کدپستی:</span>'+
            '<span>1834171483</span>'+
            '</td>'+
            '<td style="text-align: center">'+
            '<span class="font-bold">شماره تماس:</span>'+
            '<span>56230801</span>'+
            '</td>'+
            '</tr>'+
            '<tr>'+
            '<td colspan="2">'+
            '<span class="font-bold">نشانی:</span>'+
            '<span style="font-size: 6pt"> تهران شهر ری حسن آباد شهرک صنعتی شمس آباد بلوار بهارستان نبش بلوار گلستان ساختمان فناوری ط سوم</span>'+
            '</td>'+
            '</tr>'+

            '</table>'+
            '</td>'+
            '<td>'+
            '<table class="" style="padding-right: 5px">'+
            '<tr>'+
            '<td>'+
            '<span class="font-bold">نام شخص حقیقی/حقوقی:</span>'+
            '</td>'+
            '<td>'+
            '<span>'+name+'</span>'+
            '</td>'+
            '</tr>'+
            '<tr>'+
            '<td>'+
            '<span class="font-bold">شماره اقتصادی:</span>'+
            '<span>'+economic_code+'</span>'+
            '</td>'+
            '<td style="text-align: center">'+
            '<span class="font-bold">شناسه ملی:</span>'+
            '<span>'+national_number+'</span>'+
            '</td>'+
            '</tr>'+
            '<tr>'+
            '<td>'+
            '<span class="font-bold">کدپستی:</span>'+
            '<span>'+postal_code+'</span>'+
            '</td>'+
            '<td style="text-align: center">'+
            '<span class="font-bold">شماره تماس:</span>'+
            '<span>'+tele1+'</span>'+
            '</td>'+
            '</tr>'+
            '<tr>'+
            '<td colspan="2">'+
            '<span class="font-bold">نشانی:</span>'+
            '<span style="font-size: 7pt">'+address+'</span>'+
            '</td>'+
            '</tr>'+
            '</table>'+
            '</td>'+
            '</tr>'+
            '</table>'+
            '<span style="margin-right: 50%">ارائه خدمات</span>'+
            '<table style=" width: 100%">'+
            '<thead>'+
            '<tr style="text-align: center; font-size: 8pt; font-family: "B Titr";">'+
            '<th style="text-align: center; border: 1px solid">ردیف</th>'+
            '<th style="text-align: center; border: 1px solid">کد کالا</th>'+
            '<th style="text-align: center; border: 1px solid">شرح کالا یا خدمات</th>'+
            '<th style="text-align: center; border: 1px solid">تعدا/متراژ</th>'+
            '<th style="text-align: center; border: 1px solid">واحد اندازه گیری</th>'+
            '<th style="text-align: center; border: 1px solid">مبلغ واحد(ریال)</th>'+
            '<th style="text-align: center; border: 1px solid">مبلغ کل(ریال)</th>'+
            '<th style="text-align: center; border: 1px solid">مبلغ تخفیف(ریال)</th>'+
            '<th style="text-align: center; border: 1px solid">مبلغ کل پس از تخفیف(ریال)</th>'+
            '<th style="text-align: center; border: 1px solid">مالیات و عوارض(ریال)</th>'+
            '<th style="text-align: center; border: 1px solid">جمع مبلغ کل بعلاوه مالیات و عوارض ارزش افزوده(ریال)</th>'+
            '</tr>'+
            '</thead>'+
            '<tbody>'+
            '<tr>'+
            '<td style="text-align: center; border: 1px solid"><span>1</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>--</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>برگه خروج</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+qty+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>عدد</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+rate+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+amount+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>0</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+amount+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+vat+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+totality+'</span></td>'+
            '</tr>'+
            '<tr>'+
            '<td class="font-bold" colspan="6" style="text-align: center; border: 1px solid;"><span>مبلغ کل (ریال)</span></td>'+
            '<td style="text-align: center; border: 1px solid;"><span>'+amount+'</span></td>'+
            '<td style="text-align: center; border: 1px solid;"><span>0</span></td>'+
            '<td style="text-align: center; border: 1px solid;"><span>'+amount+'</span></td>'+
            '<td style="text-align: center; border: 1px solid;"><span>'+vat+'</span></td>'+
            '<td style="text-align: center; border: 1px solid;"><span>'+totality+'</span></td>'+
            '</tr>'+
            '<tr>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            //     '<td class="font-bold" style="text-align: center; border: 1px solid"><span>بدهی معوق</span></td>'+
            // '<td style="text-align: center; border: 1px solid"><span>0</span></td>'+
            '<td class="font-bold" style="text-align: center; border: 1px solid;"><span>مبلغ کل</span></td>'+
            '<td style="text-align: center; border: 1px solid;"><span>'+totality+'</span></td>'+
            '</tr>'+
            '<tr>'+
            '<td style="border: 0px"></td>'+
            '<td colspan="7" class="font-bold" style="border: 1px solid;padding-right: 20px;"> مبلغ قابل پرداخت:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp '+totality+'ریال &nbsp &nbsp '+'</td>'+
            '<td style="border: 0px"></td>'+
            //     '<td class="font-bold" style="text-align: center; border: 1px solid"><span>جریمه تاخیر</span></td>'+
            // '<td style="text-align: center; border: 1px solid"><span>0</span></td>'+
            '</tr>'+
            '<tr>'+
            '<td style="border: 0px"></td>'+
            '<td colspan="7" style="border: 1px solid">'+
            '<span class="font-bold" style="padding-right: 20px">شرایط و نحوه تسویه:</span>'+
            '<?  $payed="'+payed+'"; echo $payed; ?>'+
            '<span class="font-bold" style="padding-right: 20px">کدرهگیری:</span>'+
            '<span style="padding-right: 20px">'+reference+'</span>'+
            '</td>'+
            '<td style="border: 0px"></td>'+
            //     '<td class="font-bold" style="text-align: center; border: 1px solid;"><span>مبلغ کل</span></td>'+
            // '<td style="text-align: center; border: 1px solid;"><span>'+totality+'</span></td>'+
            '</tr>'+
            '</tbody>'+
            '</table>'+
            '<div style="margin-top: 30px;">'+
            '<table style="border: 1px solid; width: 100%; ">'+
            '<tr class="font-bold">'+
            '<td style="padding-right: 50px">'+
            '<span>مهر و امضاء فروشنده</span>'+
            '</td>'+
            '<td>'+
            '<span style="padding-right: 50%">مهر و امضاء خریدار</span>'+
            '</td>'+
            '</tr>'+
            '</table>'+
            '</div>'+

            '</div>'+
            '<br>'+
            '</div>'
    }

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
                // append: "<span><br/>شرکت خدماتی شهرک صنعتی شمس آباد</span>",
                //Log to console when printing is done via a deffered callback
                deferred: $.Deferred().done(function () {
                    console.log('Printing done', arguments);
                })
            });
        });
    });

</script>



<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="showPermit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div id="permit">
                <div  class="modal-body">
                </div>
            </div>
        </div>
        <div class="modal-footer" id="permitPrint">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            <button1 type="button" name="testman" id="testman" class="btn btn-primary print-link avoid-this ">چاپ</button1>
        </div>
    </div>
</div>


<div class="clearfix"></div>




