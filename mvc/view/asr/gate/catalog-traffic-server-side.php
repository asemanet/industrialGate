<?php
//
////$test='123456';
////echo "vat {$test} hast";
//echo "
//<span class=\"h4 alert alert-success center-block\"><span>گزارش تردد امروز</span></span>

//";
//?>


<div class="col-md-12 col-xs-12">
    <div class="x_panel">
        <?
        if (isset($data['message'])){
        echo "
        <div class=\"alert alert-danger alert-dismissible fade in \" ng-show=\"success\">
        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">×</a>
        ".$data['message']."
    </div>
    ";}?>
        <div class="x_title">
            <h2> جستجو تردد
                <small>نوع گزارش را انتخاب و جستجو فرمایید</small>
            </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link "><i <?if(isset($data['start-date']) AND empty($data['message'])){
//                            echo 'class="fa fa-chevron-down alert-info"';
                            echo 'class="fa fa-chevron-up"';
                        }else{
                            echo 'class="fa fa-chevron-up"';
                        }?>></i></a>
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
        <div class="x_content" <?if(isset($data['start-date']) AND empty($data['message'])){
//            echo 'style="display: none;"';


        }?>>
            <br/>
            <form class="form-horizontal " method="post" action="<?= baseUrl() ?>/asr/catalogTraffic" class="form-horizontal form-label-left" enctype="multipart/form-data">

                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">تاریخ خروج:</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div id="date-traffic-1" class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click"
                                         data-groupid="group1" data-fromdate="true" data-enabletimepicker="false" data-placement="left">

                                        <span class="glyphicon glyphicon-calendar"></span>

                                    </div>
                                    <input type="text" name="start-date" readonly dir="ltr" class="form-control date-traffic-1" id="inputDate-traffic-1" placeholder="از تاریخ و ساعت"
                                           data-MdDateTimePicker="true" data-trigger="click" data-targetselector="#fromDate1" data-groupid="group1" data-fromdate="true"
                                           data-enabletimepicker="false" data-placement="right" />

                                </div>

                                <div class="input-group">
                                    <div id="date-traffic-2" class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click"
                                         data-groupid="group1" data-todate="true" data-enabletimepicker="true" data-placement="left">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </div>
                                    <input type="text" dir="ltr" readonly name="end-date" class="form-control date-traffic-2" id="inputDate-traffic-2" placeholder="تا تاریخ و ساعت"
                                           data-MdDateTimePicker="true" data-trigger="click" data-targetselector="#toDate1" data-groupid="group1" data-todate="true"
                                           data-enabletimepicker="true" data-placement="right" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-right: 22px" class="form-group">
                        <label dir="rtl"  class="control-label col-md-3 col-sm-3 col-xs-12">قسمتی از پلاک:</label>
                        <div  class="plaque col-md-9 col-sm-9 col-xs-12" >
                            <input class="inputs" tabindex="3"  id="PLAQUE_PART4"   maxlength="2" minlength="2" name="ir"  placeholder=""   type="text" onKeyup="autotab(this, document.license.PLAQUE_PART2)" >
                            <input  tabindex="2" id="PLAQUE_PART3"   maxlength="3" minlength="3" name="threeDigit"   type="text" onKeyup="autotab(this, document.license.ir)">
                            <select tabindex="1"   type="text"  id="PLAQUE_PART2"   name="letter"   >
                                <option value="">انتخاب کنید</option>
                                <option value="الف"onclick="autotab1(this, document.license.threeDigit)"> الف </option>
                                <option  value="ب" onclick="autotab1(this, document.license.threeDigit)"> ب </option>
                                <option  value="ت" onclick="autotab1(this, document.license.threeDigit)"> ت </option>
                                <option  value="ج" onclick="autotab1(this, document.license.threeDigit)"> ج </option>
                                <option  value="د" onclick="autotab1(this, document.license.threeDigit)"> د </option>
                                <option  value="س" onclick="autotab1(this, document.license.threeDigit)"> س </option>
                                <option  value="ص" onclick="autotab1(this, document.license.threeDigit)"> ص </option>
                                <option  value="ط" onclick="autotab1(this, document.license.threeDigit)"> ط </option>
                                <option  value="ع" onclick="autotab1(this, document.license.threeDigit)"> ع </option>
                                <option  value="ق" onclick="autotab1(this, document.license.threeDigit)"> ق </option>
                                <option  value="گ" onclick="autotab1(this, document.license.threeDigit)"> گ </option>
                                <option  value="ل" onclick="autotab1(this, document.license.threeDigit)"> ل </option>
                                <option  value="م" onclick="autotab1(this, document.license.threeDigit)"> م </option>
                                <option  value="ن" onclick="autotab1(this, document.license.threeDigit)"> ن </option>
                                <option  value="و" onclick="autotab1(this, document.license.threeDigit)"> و </option>
                                <option  value="ه" onclick="autotab1(this, document.license.threeDigit)"> ه </option>
                                <option  value="ی" onclick="autotab1(this, document.license.threeDigit)"> ی </option>
                                <option  value="ز" onclick="autotab1(this, document.license.threeDigit)"> ز </option>
                                <option  value="ث" onclick="autotab1(this, document.license.threeDigit)"> ث </option>
                                <option  value="پ" onclick="autotab1(this, document.license.threeDigit)"> پ </option>
                                <option  value="ش" onclick="autotab1(this, document.license.threeDigit)"> ش </option>
                                <option  value="ک" onclick="autotab1(this, document.license.threeDigit)"> ک </option>
                                <option  value="ژ" onclick="autotab1(this, document.license.threeDigit)"> معلولین و جانبازان</option>
                                <option  value="D" onclick="autotab1(this, document.license.threeDigit)"> D </option>
                                <option  value="S" onclick="autotab1(this, document.license.threeDigit)"> S </option>
                            </>
                            <input autofocus class="inputs" tabindex="0"   id="PLAQUE_PART1"  maxlength="2" minlength="2" name="twoDigit"    type="text" onKeyup="autotab(this, document.license.PLAQUE_PART3)">
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
<!--                    <div class="form-group">-->
<!--                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="heard">نوع تردد :</label>-->
<!--                        <div class=" col-md-8 col-sm-8 col-xs-12 ">-->
<!--                            <select id="heard" class="form-control " name="type">-->
<!--                                <option  value="">انتخاب...</option>-->
<!--                                <option value="all">تمام موارد</option>-->
<!--                                <option value="on">دارای مجوز</option>-->
<!--                                <option value="off">فاقد مجوز</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group" >-->
<!--                        <label class="control-label col-md-3 col-sm-3 col-xs-12">شماره قرارداد:</label>-->
<!--                        <div class="col-md-8 col-sm-8 col-xs-12">-->
<!--                            <input dir="ltr" type="text" name="gharardad" class="form-control" value="415-" placeholder="شماره قرارداد">-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">نام مشترک:</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" name="company" class="form-control" placeholder="نام مشترک">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">نام راننده</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <input type="text" name="driver" class="form-control" placeholder="نام راننده">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">نوع بار</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <select type="select" tabindex="4"  class="form-control col-md-7 col-xs-12" name="cargo">
                                <option value="" >انتخاب کنید</option>
                                <option onclick="autotab1(this, document.license.driver_name)">مواد شیمیایی</option>
                                <option onclick="autotab1(this, document.license.driver_name)">مواد فلزی</option>
                                <option onclick="autotab1(this, document.license.driver_name)">مواد غذایی</option>
                                <option onclick="autotab1(this, document.license.driver_name)">انواع سنگ</option>
                                <option onclick="autotab1(this, document.license.driver_name)">مواد معدنی</option>
                                <option onclick="autotab1(this, document.license.driver_name)">مواد سلولوزی</option>
                                <option onclick="autotab1(this, document.license.driver_name)">انواع مایعات</option>
                                <option onclick="autotab1(this, document.license.driver_name)">مصنوعات چوبی</option>
                                <option onclick="autotab1(this, document.license.driver_name)">محصولات الکترونیکی</option>
                                <option onclick="autotab1(this, document.license.driver_name)">انواع پلاستیک</option>
                                <option onclick="autotab1(this, document.license.driver_name)">شیشه و کریستال</option>
                                <option onclick="autotab1(this, document.license.driver_name)">ضایعات</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">نوع خودرو</label>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <select type="select" tabindex="6"  name="car-type"  class="form-control col-md-7 col-xs-12">
                                <option value="">انتخاب کنید</option>
                                <option>وانت</option>
                                <option>کامیونت</option>
                                <option>سواری</option>
                                <option>تریلی</option>
                                <option>کامیون تانکر</option>
                                <option>کامیون کمپرسی</option>
                                <option>کامیون یخچال‌دار</option>
                                <option>کامیون مسقف</option>
                                <option>خاور</option>
                                <option>کشنده</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1">
                    <br>
                    <input class="btn btn-primary" type="submit" name="btn-report" value="جستجو">
                </div>
            </form>

        </div>
    </div>
</div>
<div class="clearfix"></div>





<?php

//$data= array(
//  'start-date' => '1398-03-28 17:50:44',
//  'end-date' => '1398-03-29 17:50:44',
//
//);
//var_dump($data);
//echo $data['company'].'</br>';
//if ($data['start-date']>0 AND $data['end-date']>0 ){
/*    echo "\"url\": \"<?=baseUrl()?>/asr/catalogTrafficServerSide/".$data['start-date']."/".$data['end-date'].",";*/
//}elseif (array_key_exists("company",$data)){
//    echo "yes";
//    echo $data['company'];
/*    echo "\"url\": \"<?=baseUrl()?>/asr/catalogTrafficServerSide/''/''/".$data['company'].",";*/
//}
?>

<? if (array_values($data) AND empty($data['message'])){ ?>

<script>

    function loadCatalogUserPermit() {
        // Setup - add a text input to each footer cell
        $('#catalog-user-permit tfoot  th').each(function () {
            var title = $(this).text();
            $(this).html('<div class="input-group mb-3"><input class=" form-control " dir="rtl" style="font-size: 11pt; font-family: \'B Koodak\' " type="text"  placeholder="🔎 ' + title + '" /></div>');
        });


        var tableCatalogUserPermit= $('#catalog-user-permit').DataTable({

            "processing": true,
            "fixedHeader": true,
            "serverSide": true,
            "autoWidth": true,
            "pageLength": 10,
            "searching": true,
            "ajax": {
                <?php
                if ($data['start-date']>0 AND $data['end-date']>0 ){
                    echo "\"url\": \"".baseUrl()."/asr/catalogTrafficServerSide/".$data['start-date']."/".$data['end-date']."\"".",";
                }
                elseif (strlen($data['company'])>0){
                    echo "\"url\": \"".baseUrl()."/asr/catalogTrafficServerSide/0/0/".$data['company']."\"".",";
                }
                elseif (isset($data['license-plate'])){
                    echo "\"url\": \"".baseUrl()."/asr/catalogTrafficServerSide/0/0/0/".$data['license-plate']."\"".",";
                }
                elseif (strlen($data['driver'])>0){
                    echo "\"url\": \"".baseUrl()."/asr/catalogTrafficServerSide/0/0/0/0/".$data['driver']."\"".",";
                }
                elseif (strlen($data['car-type'])>0){
                    echo "\"url\": \"".baseUrl()."/asr/catalogTrafficServerSide/0/0/0/0/0/".$data['car-type']."\"".",";
                }
                elseif (strlen($data['cargo'])>0){
                    echo "\"url\": \"".baseUrl()."/asr/catalogTrafficServerSide/0/0/0/0/0/0/".$data['cargo']."\"".",";
                }

                ?>
                //"url": "<?//=baseUrl()?>///asr/catalogTrafficServerSide/<?//=$data['start-date']?>///<?//=$data['end-date']?>///<?//=$data['company']?>//",
                //"url": "<?//=baseUrl()?>///asr/catalogTrafficServerSide",
                "type": "POST",
                // "dataSrc": ""
            },
            "columns": [
                {data: "company_name" },
                {data: "license_plate"},
                {data: "channel"      },
                {data: "exit_date"    },
                {data: "cargo"        },
                {data: "driver_name"  },
                {data: "issue_date"   },
                {data: "car_type"     },
                {data: "permit_rand"  },
                // {
                //     "data": null,
                //     "defaultContent": " <button dir=\"ltr\"  class=\"btn btn-success btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"تاریخ خروج: \">خروج موفق</button> "
                // }

            ],

            "myData": [
                {mydata: "mydata"},
                ],



            "rowCallback": function (row, data, index) {
                // if (data['exit_done'] == "1") {
                //     $('td:eq(6)', row).html( '<button dir="ltr"  class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="تاریخ خروج:'+data["due_date"]+' ">خروج موفق</button>' );
                // }
                // else

                if (data['company_name'] !="") {

                    $('td:eq(8)', row).html('<button  name="showPermit" type="button" data-toggle="modal" data-target="#showPermit"' +
                        'onclick="testPermit('
                        + "'" + data["exit_permit_hash"] + "'" + ','
                        + "'" + data["license_plate"] + "'" + ','
                        + "'" + data["driver_name"] + "'" + ','
                        + "'" + data["issue_date"] + "'" + ','
                        + "'" + data["car_type"] + "'" + ','
                        + "'" + data["cargo"] + "'" + ','
                        + "'" + data["permit_rand"] + "'" + ','
                        + "'" + data["company_name"] + "'" +
                        ')">' +
                        '&nbsp<img data-toggle="tooltip" data-placement="top" title="چاپ مجدد" src="<?=baseUrl() ?>/build/images/print.png" width="50%">&nbsp' +

                        '</button>');
                }else{
                    $('td:eq(8)', row).html('<button type="button"  class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="عدم خروج در مهلت 24 ساعته---عدم خروج از گیت پلاک خوان---مخدوش بودن پلاک جلو---عدم شناسایی دوربین پلاک خوان ">\n' +
                        'بدون مجوز' +
                        '                </button>');
                }

                if (data['company_name'] !="") {
                    $('td', row).css('color', '#1abb9c' );
                    $('td', row).css('font-weight', 'bold' );
                }
            },



            dom: "Bfrtip",
            language: {
                buttons: {
                    pageLength: {
                        _: " نمایش %d رکورد ▼" ,
                        className: "fa fa-caret-down"
                    }
                },
                "sEmptyTable": "هیچ داده ای در جدول وجود ندارد",
                "sInfo": "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
                "sInfoEmpty": "نمایش 0 تا 0 از 0 رکورد",
                "sInfoFiltered": "(فیلتر شده از _MAX_ رکورد)",
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": "نمایش _MENU_ رکورد",
                "sLoadingRecords": "در حال بارگزاری...",
                "sProcessing": "در حال پردازش...",
                "sSearch": "جستجو:",
                "sZeroRecords": "رکوردی با این مشخصات پیدا نشد",
                "oPaginate": {
                    "sFirst": "ابتدا",
                    "sLast": "انتها",
                    "sNext": "بعدی",
                    "sPrevious": "قبلی"
                },
                "oAria": {
                    "sSortAscending": ": فعال سازی نمایش به صورت صعودی",
                    "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
                }

            },
            lengthMenu: [
                [ 10, 25, 50, 100, 200 ],
                [ '10 رکورد', '25 رکورد', '50 رکورد', '100 رکورد', '200 رکورد' ]
            ],
            buttons: [
                {
                    extend: "pageLength",
                    className: "btn-sm  alert-info  "
                },
                {
                    extend: "copy",
                    text: "کپی",
                    className: "btn-sm"
                },
                {
                    extend: "csv",
                    text: "فایل CSV",
                    className: "btn-sm"
                },
                {
                    extend: "excel",
                    text: "اکسل",
                    className: "btn-sm"
                },
                {
                    extend: "pdfHtml5",
                    text: "فایل PDF",
                    className: "btn-sm",
                    download: 'open'
                },
                {
                    extend: "print",
                    text: "چاپ",
                    className: "btn-sm"
                },
            ],

        });

        $('[data-toggle="tooltip"]').tooltip();


        // Apply the search
        tableCatalogUserPermit.columns().every( function () {
            var that = this;

            $('input', this.footer()).on('keyup change clear', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });

    }


</script>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>گزارش تردد
                <small>
                    <?php
                    if ($data['start-date']>0){
                        echo "از تاریخ".$data['start-date']." تا تاریخ "." ".$data['end-date'];
                    }elseif (isset($data['license-plate'])){
                        echo "برای پلاک"."(".$data['license-plate'].")";
                    }
                    ?>

                </small>
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
<body onload="loadCatalogUserPermit()"></body>
<table   id="catalog-user-permit"  data-order='[[ 3, "desc" ]]' class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%"  >
    <thead>
    <tr>
        <th>نام مشترک</th>
        <th>شماره پلاک</th>
        <th>گیت خروج</th>
        <th>تاریخ خروج</th>
        <th>نوع بار</th>
        <th>نام راننده</th>
        <th>تاریخ ثبت</th>
        <th>نوع خودرو</th>
        <th>شماره برگه خروج</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>نام مشترک</th>
        <th>شماره پلاک</th>
        <th>گیت خروج</th>
        <th>تاریخ خروج</th>
        <th>نوع بار</th>
        <th>نام راننده</th>
        <th>تاریخ ثبت</th>
        <th>نوع خودرو</th>
        <th>شماره برگه خروج</th>
    </tr>
    </tfoot>
</table>
    </div>
</div>
<div class="clearfix"></div>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="<?=baseUrl()?>/vendors/jQuery.print-master/bower_components/jquery/dist/jquery.min.js"><\/script>')
</script>
<script src="<?=baseUrl()?>/vendors/jQuery.print-master/jQuery.print.js"></script>
<script type="text/javascript">




    function testPermit(hash,plate,driver,date1,car,cargo,num1, company) {
        // alert("I am an alert box!");
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
            //'<?// echo jdate(f)."-".jdate(Y ); ?>//'+
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


</script>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="showPermit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><script>data["permit_rand"]</script>برگه خروج شماره:</h5>
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

<?}
?>


<script>
    function autotab(current,to){
        if (current.getAttribute &&
            current.value.length==current.getAttribute("maxlength")) {
            to.focus()
        }
    }
    function autotab1(current,to){
        if (current &&
            current.value) {
            to.focus()
        }
    }

</script>
