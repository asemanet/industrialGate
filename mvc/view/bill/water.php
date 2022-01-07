<?php
//echo generatePermitId(7);
//echo generateHash(7);
//$pageIndex= $data['pageIndex'];
//echo $pageIndex;
//dump($data);
//dump($records);
//dump($_SESSION);


$companyDetails= $data['companyDetails'];

if ($records==null){
    echo "
<div class=\"alert alert-danger alert-dismissible fade in \" ng-show=\"success\">
    <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>
    کاربر عزیز قبض جهت پرداخت وجود ندارد!
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
<table id="datatable-buttons" data-order='[[ 3, "desc" ]]' data-page-length='50'  class="table table-striped table-bordered dt-responsive compact " cellspacing="0" width="100%">

    <thead>
    <tr>
        <th>دوره</th>
        <th>تاریخ صدور قبض</th>
        <th>مبلغ قابل پرداخت</th>
        <th>مهلت پرداخت</th>
        <th>شماره قبض</th>
        <th>وضعیت</th>
        <th class="avoid-this">مشاهده و چاپ</th>
    </tr>
    </thead>

    <tbody>
    <tr>
        <?php
        foreach ($records as $data){
//            dump($data);
        ?>
        <td><?php  echo $data['period_name']; ?></td>
        <td dir="ltr">
            <?php
            $data['create_date']= str_replace('-', '/' , $data['create_date'] );
            echo $data['create_date'];
            ?>
        </td>
        <td dir="ltr"><?php echo "ریال"." ".number_format($data['sum_totality']); ?></td>
        <td style="direction: ltr">
            <?php
            $data['usance_date']= str_replace('-', '/' , $data['usance_date'] );
            echo $data['usance_date'];
            ?>
        </td>
        <td><?php  echo $data['bill_serial_mahfa']; ?></td>
        <td style='text-align: center'>
            <form method="post" action="/bill/payWater"  class="form-horizontal form-label-left">
                <input type="hidden" name="hash" value="<?=$data['water_bill_hash']?>">
                <input type="hidden" name="gateway" value="AsanPardakht">
                <div>
                    <?php
                    $waterVat=($data["water_amount"]*9)/100;
                    $abounmanVat= ($data['abonman_amount']*9)/100;
                    $khadamatVat= ($data['khadamat_amount']*9)/100;
                    $sumWater=$data['water_amount']+$waterVat;
                    $sumAbounman=$data['abonman_amount']+$abounmanVat;
                    $sumKhadamat=$data['khadamat_amount']+$khadamatVat;
                    $usance_date= str_replace('/', '-' , $data['usance_date'] );
                    if($data['payed']==1){
                        echo "<i class='fa fa-check green fa-lg	'></i><span class=''>&nbsp پرداخت شده (آنلاین) &nbsp </span>";
                    }elseif($data['b_payed_date']!=null){
                                                echo "<i class='fa fa-check green fa-lg'></i><span> پرداخت شده (با شناسه قبض) </span>";
                    } elseif($usance_date<=jdate('Y-m-d')){
                        echo "<i class='fa fa-exclamation text-danger'></i><span  class=''>   مهلت پرداخت سپری شده لطفا به واحد آبرسانی مراجعه فرمایید</span>";
                    } elseif($data['payed']==0) {
                        echo "<button type='submit' name='pay' value='پرداخت کنید' class='btn-danger' style='padding-right:10px;'>
                                     &nbsp پرداخت کنید &nbsp   
                              </button>";
                    }
                    ?>
                </div>
            </form>
        </td>
        <td>
            <button name="showPermit" type="button" data-toggle="modal" data-target="#showPermit"
                    onclick="testPermit(
                            // این اطلاعات همگی از نرم افزار حسابداری دریافت می گردد
                            '<?=$data["bill_serial_mahfa"] ?>',                                  //سریال فاکتور نرم افزار حسابداری
                            '<?=$data["period_name"] ?>',                                       //نام دوره آبرسانی
                            '<? if (isset($data["paymentTime"])){
                                echo $data["paymentTime"];}?>',                                       // تاریخ پرداخت
                            '<?=$data["create_date"] ?>',
                            '<?=$data["water_qty"] ?>',
                            '<?=number_format($data["water_rate"]) ?>',
                            '<?=number_format($data["water_amount"]) ?>',
                            '<?=number_format($data["abonman_amount"]) ?>',
                            '<?=number_format($data["khadamat_amount"]) ?>',
                            '<?=number_format($data["debit_water_bill"]) ?>',
                            '<?=$data["meter_befor_number"] ?>',
                            '<?=$data["meter_curent_number"] ?>',
                            '<?=$data["usance_date"] ?>',
                            '<?=$data["diameter_pipe"] ?>',
                            '<?=$data["shenase_ghabz"] ?>',
                            '<?=$data["shenase_pardakht"] ?>',
                            '<?=$data["company_name"] ?>',
                            '<?=$data["shenase_meli"] ?>',
                            '<?=$data["shomareh_eghtesadi"] ?>',
                            '<?=$data["address"] ?>',
                            '<?=$data["tel"] ?>',
                            '<?=$data["postal_code"] ?>',
                            '<?=number_format($waterVat)?>',
                            '<?=number_format($abounmanVat) ?>',
                            '<?=number_format($khadamatVat)?>',
                            '<?=$data["az_tarikh"] ?>',
                            '<?=$data["ta_tarikh"] ?>',
                            '<?=$data["area"] ?>',
                            '<?=number_format($data["sum_totality"])?>',                                       // مبلغ قابل پرداخت
                            '<?
                    if ($data["payed"]==1){
                        echo "<span class= alert-success >پرداخت آنلاین</span>";
                        $hashPayed=$data['hash'];
                        $userId1= $data['user_id'];
                        $payedTransa=BillModel::return_rrn($userId1,$hashPayed);
                    }elseif ($data['b_payed_date']!=null){
                        echo "<span class= alert-success >پرداخت با شناسه</span>";
                    }else{
                        echo "<span class= alert-danger >عدم پرداخت </span>";}
                    ?>',
                            '<?=number_format($sumWater)?>',
                            '<?=number_format($sumAbounman) ?>',
                            '<?=number_format($sumKhadamat)?>',
                            '<? if ($data["payed"]==1){ echo $payedTransa[0]["reference"];}elseif ($data['b_payed_date']!=null){
                                echo  $payedTransa=$data['b_rrn'];
                    }?>',
                            )">
                <img src="<?=baseUrl()?>/build/images/print.png" width="60%"  class="fa fa-print" >
                <input type="hidden" value="">
            </button>
        </td>
    </tr>
    <?php
    } ?>
    </tbody>
</table>

<div style="position: center" class=" hidden-print avoid-this">

</div>
<?php

?>
<script type="text/javascript">
    function testPermit(serial,nameDoreh,zamanPardakht,tarikh,abMeghdar, rate, mablaghAb, mablaghAbounman, mablaghKhadamat, bedehiQhabli, qrGhabli, qrFeli ,mohlatPardakht, qotr,shenaseGhabz,shenasePardakht,
                        nameSherkat,shenaseMeli,codeEghtesadi, address,tel,codePosti, maliatAb, MaliatAbounman, maliatKhadamat,azTarikh, taTarikh, metrajh, ghablePardakht, payed, jamAb, jamAbounman, jamKhadamat, reference ) {
        document.getElementById("permit").innerHTML=

            '<div class="modal-header">'+
            // '<h5 class="modal-title" id="exampleModalLabel">فاکتور شماره:'+invoice_id+'</h5>'+
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
            '<span>'+serial+'</span>'+
            '</td>'+
            '</tr>'+
            '<tr>'+
            '<td class="tr-padding ">'+
            '<span class="font-bold" style="font-size: 14px; font-family: "B Nazanin";">تاریخ:</span>'+
            '</td>'+
            '<td>'+
            '<span style="padding-left: 10px">'+tarikh+'</span>'+
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
            '<span>'+1481866918+'</span>'+
            '</td>'+
            '</tr>'+
            '<tr>'+
            '<td>'+
            '<span class="font-bold">کدپستی:</span>'+
            '<span>1481866918</span>'+
            '</td>'+
            '<td style="text-align: center">'+
            '<span class="font-bold">شماره تماس:</span>'+
            '<span>56231545</span>'+
            '</td>'+
            '</tr>'+
            '<tr>'+
            '<td colspan="2">'+
            '<span class="font-bold">نشانی:</span>'+
            '<span style="font-size: 7pt"> تهران شهر ری حسن آباد شهرک صنعتی شمس آباد بلوار بهارستان نبش بلوار گلستان ساختمان فناوری </span>'+
            '</td>'+
            '</tr>'+

            '</table>'+
            '</td>'+
            '<td >'+
            '<table style="padding-right:10px;" >'+
            '<tr>'+
            '<td>'+
            '<span class="font-bold">نام شخص حقیقی/حقوقی:</span>'+
            '</td>'+
            '<td>'+
            '<span>'+nameSherkat+'</span>'+
            '</td>'+
            '</tr>'+
            '<tr>'+
            '<td>'+
            '<span class="font-bold">شماره اقتصادی:</span>'+
            '<span>'+codeEghtesadi+'</span>'+
            '</td>'+
            '<td style="text-align: center">'+
            '<span class="font-bold">شناسه ملی:</span>'+
            '<span>'+shenaseMeli+'</span>'+
            '</td>'+
            '</tr>'+
            '<tr>'+
            '<td>'+
            '<span class="font-bold">کدپستی:</span>'+
            '<span>'+codePosti+'</span>'+
            '</td>'+
            '<td style="text-align: center">'+
            '<span class="font-bold">شماره تماس:</span>'+
            '<span>'+tel+'</span>'+
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
            '<tr style="text-align: center; font-size: 7pt; font-family: "B Titr ";">'+
            '<th style="text-align: center; border: 1px solid">ردیف</th>'+
            '<th style="text-align: center; border: 1px solid">کد کالا</th>'+
            '<th style="text-align: center; border: 1px solid">شرح کالا یا خدمات</th>'+
            '<th style="text-align: center; border: 1px solid">مقدار</th>'+
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
            '<td style="text-align: center; border: 1px solid; font-size: 8pt;"><span>آب بهاء</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+abMeghdar+'</span></td>'+
            '<td style="text-align: center; border: 1px solid; font-size: 8pt;"><span>متر مکعب</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+rate+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+mablaghAb+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>0</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+mablaghAb+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+maliatAb+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+jamAb+'</span></td>'+
            '</tr>'+
            '<tr>'+
            '<tr>'+
            '<td style="text-align: center; border: 1px solid"><span>2</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>--</span></td>'+
            '<td style="text-align: center; border: 1px solid; font-size: 8pt;""><span>آبونمان</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+1+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>عدد</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+mablaghAbounman+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+mablaghAbounman+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>0</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+mablaghAbounman+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+MaliatAbounman+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+jamAbounman+'</span></td>'+
            '</tr>'+
            '<tr>'+
            '<tr>'+
            '<td style="text-align: center; border: 1px solid"><span>3</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>--</span></td>'+
            '<td style="text-align: center; border: 1px solid; font-size: 7pt;"><span>خدمات آبرسانی</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+1+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>عدد</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+mablaghKhadamat+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+mablaghKhadamat+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>0</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+mablaghKhadamat+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+maliatKhadamat+'</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+jamKhadamat+'</span></td>'+
            '</tr>'+
            // '<tr>'+
            // '<td class="font-bold" colspan="6" style="text-align: center; border: 1px solid;"><span>جمع کل (ریال)</span></td>'+
            // '<td style="text-align: center; border: 1px solid;"><span>'+water_amount+'</span></td>'+
            // '<td style="text-align: center; border: 1px solid;"><span>0</span></td>'+
            // '<td style="text-align: center; border: 1px solid;"><span>'+water_amount+'</span></td>'+
            // '<td style="text-align: center; border: 1px solid;"><span>'+water_vat+'</span></td>'+
            // '<td style="text-align: center; border: 1px solid;"><span>'+sum_totality+'</span></td>'+
            // '</tr>'+
            '<tr>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            '<td style="border: 0px"></td>'+
            // '<td style="border: 0px"></td>'+
            '<td colspan="2" class="" style="text-align: center; border: 1px solid; font-size: 7pt;"><span>بدهی/ بستانکاری معوق</span></td>'+
            '<td style="text-align: center; border: 1px solid"><span>'+bedehiQhabli+'</span></td>'+
            '</tr>'+
            '<tr>'+
            '<td style="border: 0px"></td>'+
            '<td colspan="6" class="font-bold" style="border: 1px solid;padding-right: 20px;"> مبلغ قابل پرداخت:&nbsp &nbsp '+ghablePardakht+'ریال &nbsp '+
            '<br> <span>مهلت پرداخت:&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp'+mohlatPardakht+'</span>'+
            '</td>'+
            '<td style="border: 0px"></td>'+
            '<td colspan="2" class="" style="text-align: center; border: 1px solid;font-size: 7pt; width="50px"><span>جمع بدهی/بستانکاری تا </span><span>تاریخ صدور این صورتحساب</span>' +
            '</td>'+
            '<td style="text-align: center; border: 1px solid;"><span>'+ghablePardakht+'</span></td>'+
            '<td style="border: 0px"></td>'+
            '</tr>'+
            '<tr>'+
            '<td style="border: 0px"></td>'+
            '<td colspan="6" style="border: 1px solid">'+
            '<span style="padding-right: 1px; font-size:7pt">شرایط و نحوه تسویه:</span>'+
                payed+
            '<span class="" style="padding-right: 2px;font-size:7pt">کدرهگیری:</span>'+
            '<span style="padding-right: 20px">'+reference+'</span>'+
                '<fr>'+
                '</td>'+
            '<td style="border: 0px"></td>'+
            '<td colspan="6">'+
            '<span class="font-bold" style="padding-right:10px;">&nbsp***شناسه قبض:</span>\n' +
            '<span style="font-size:8pt">'+shenaseGhabz+'</span>\n' +
            '<span class="font-bold">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspشناسه پرداخت:</span>\n' +
            '<span style="font-size:8pt"">'+shenasePardakht+'&nbsp</span>\n' +
                '<span class="font-bold">***</span>'+
            '</td>'+
            '<td style="border: 0px"></td>'+
            //     '<td class="font-bold" style="text-align: center; border: 1px solid;"><span>مبلغ کل</span></td>'+
            // '<td style="text-align: center; border: 1px solid;"><span>'+totality+'</span></td>'+
            '</tbody>'+
            '</table>'+
            '<table class="left" style="width: 417px; border: 1px solid; border-radius: 1em;">\n' +
            '            <tr>\n' +
            '                <td colspan="6" style="text-align: center">\n' +
            '                    <span >مشخصات دوره و کارکرد کنتور</span>\n' +
            '                </td>\n' +
            '            </tr>\n' +
            '            <tr style="text-align: center;">\n' +
            '                <td style="border: 1px solid" width="58">دوره</td>\n' +
            '                <td style="border: 1px solid" width="40">قبلی</td>\n' +
            '                <td style="border: 1px solid" width="40">فعلی</td>\n' +
            '                <td style="border: 1px solid" width="60">میزان مصرف</td>\n' +
            '                <td style="border: 1px solid" width="60">شروه دوره</td>\n' +
            '                <td style="border: 1px solid" width="66">پایان دوره</td>\n' +
            '            </tr>\n' +
            '<tr style="text-align: center; border-bottom: 1px solid;">\n' +
            '    <td style="border: 1px solid" width="58">'+nameDoreh+'</td>\n' +
            '    <td style="border: 1px solid" width="40">'+qrGhabli+'</td>\n' +
            '    <td style="border: 1px solid" width="40">'+qrFeli+'</td>\n' +
            '    <td style="border: 1px solid" width="60">'+abMeghdar+'</td>\n' +
            '    <td style="border: 1px solid" width="60">'+azTarikh+'</td>\n' +
            '    <td style="border: 1px solid" width="66">'+taTarikh+'</td>\n' +
            '</tr>\n' +
            '            <tr>\n' +
            '                    <td style="border-left: 1px solid" colspan="3">مساحت زمین:'+metrajh+'</td>\n' +
            '                    <td style="border-right: 1px solid" colspan="3">قطر انشعاب:'+qotr+'</td>\n' +
            '            </tr>\n' +
            '        </table>\n' +
            // '        <table class="right" style="margin-right: 21px; width: 314px">\n' +
            // '            <tr>\n' +
            // '                <td style="border: 1px solid">\n' +
            // '                    <span class="font-bold">شناسه قبض:</span>\n' +
            // '                    <span class="font-bold">'+shenaseGhabz+'</span>\n' +
            // '                    </td>\n' +
            // '            </tr>\n' +
            // '        <table class="right" style="margin-right: 21px; width: 314px">\n' +
            // '            <tr>\n' +
            // '                <td style="border: 1px solid">\n' +
            // '                    <span class="font-bold">شناسه پرداخت:</span>\n' +
            // '                    <span class="font-bold">'+shenasePardakht+'</span>\n' +
            // '                </td>\n' +
            // '            </tr>\n' +
            // '        </table>\n' +
            // '                    <br>\n' +
                '<div style="width:350px">'+
            '                <p class="text-secondary text-justify" style="font-size: 7pt; margin-right:22px">'+
            '                    <span style=" line-height: 5px"> بند ب ماده 2 آیین نامه اجرایی قانون نحوه واگذاری مالکیت و اداره امور شهرک های صنعتی:</span><br>\n' +
            '                    <span style=" line-height: 5px">الف- تاسیسات قسمت های مشترک از قبیل چاه آب، پمپ آب و شبکه های آبرسانی و توزیع آب،</span><br>\n' +
            '                    <span style=" line-height: 5px">   منبع آب، شبکه گاز رسانی، شبکه مخابرات، شبکه جمع آوری فاضلاب، شبکه برق رسانی و شبکه  </span><br>\n' +
            '                    <span style=" line-height: 5px">   روشنایی و حق الامتیازهای مربوط\n' + '</span>\n' +
            '                <p>'+
                '</div>'+
            // '        <br>\n' +
            '            <table class="right" style="margin-right: 20px; width: 407px">\n' +
            '                <tr class="font-bold">\n' +
            '                    <td style="border-top: 1px solid; ">\n' +
            '                        <span>مهر و امضاء فروشنده</span>\n' +
            '                        </td>\n' +
            '                    <td style="text-align: left; border-top: 1px solid; ">\n' +
            '                        <span>مهر و امضاء خریدار</span>\n' +
            '                        </td>\n' +
            '                    </tr>\n' +
            '                </table>'+

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
            <button type="button" class="btn btn-secondary" data-dismiss="modal"> <i class="fa fa-close"></i> <i>بستن</i></button>
            <button1 type="button" name="testman" id="testman" class="btn btn-primary print-link avoid-this "> <i class="fa fa-print"></i> <i>چاپ</i>  </button1>
        </div>
    </div>
</div>


<div class="clearfix"></div>



<?php

?>


