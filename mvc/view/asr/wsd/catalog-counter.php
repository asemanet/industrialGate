<?php
//dump($data);
//$test='123456';
//echo "vat {$test} hast";
?>
<script>
    function loadCatalogCounter() {
        // Setup - add a text input to each footer cell
        $('#catalog-counter tfoot  th').each(function () {
            var title = $(this).text();
            $(this).html('<div class="input-group mb-3"><input class=" form-control " dir="rtl" style="font-size: 11pt; font-family: \'B Koodak\' " type="text"  placeholder="🔎 ' + title + '" /></div>');
        });


        var tableCatalogUserPermit= $('#catalog-counter').DataTable({

            "processing": true,
            "fixedHeader": true,
            "serverSide": true,
            "autoWidth": true,
            "pageLength": 10,
            "searching": true,
            "ajax": {
                "url": "<?=baseUrl()?>/asr/catalogCounterServerSide",
                "type": "POST",
                // "dataSrc": ""
            },
            "columns": [
                {data: "company_name"},
                {data: "contract_number"},
                {data: "address"},
                {data: "period_number"},
                {data: "period_name"},
                {data: "counter"},
                {data: "status"},
                {data: "read_date", className: "aseman-ltr"},
                {data: "change_date"  , className: "aseman-ltr" ,"width": "%"},
                {data: "reader_name"},
                // {
                //     "data": null,
                //     "defaultContent": " <button dir=\"ltr\"  class=\"btn btn-success btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"تاریخ خروج: \">خروج موفق</button> "
                // }

            ],

            "rowCallback": function (row, data, index) {

                if(data['status'] == "0") {

                    $('td:eq(6)', row).html( '<button type="button" class="btn btn-success btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="عدد 0 را جستجو کنید">\n' +
                        ' &nbspعادی&nbsp ' +
                        '                    </button>  ' );
                    // $('td', row).css('color', '#00bb18');
                }
                if (data['status'] == "1") {
                    $('td:eq(6)', row).html( '<button type="button" class="btn btn-success btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="عدد 1 را جستجو کنید">\n' +
                        '  دور کامل  ' +
                        '                    </button>  ' );
                }
                if (data['status'] == "2") {
                    $('td:eq(6)', row).html( '<button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="عدد 2 را جستجو کنید">\n' +
                        '  کنتور خراب  ' +
                        '                    </button>  ' );
                }
                if (data['status'] == "3") {
                    $('td:eq(6)', row).html( '<button type="button" class="btn btn-dark btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="عدد 3 را جستجو کنید">\n' +
                        '  قطع انشعاب  ' +
                        '                    </button>  ' );
                }
                if (data['status'] == "4") {
                    $('td:eq(6)', row).html( '<button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="عدد 4 را جستجو کنید">\n' +
                        '  عدم دسترسی به کنتور  ' +
                        '                    </button>  ' );
                }
                if (data['status'] == "5") {
                    $('td:eq(6)', row).html( '<button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="عدد 5 را جستجو کنید">\n' +
                        ' کنتور ناخوانا ' +
                        '                    </button>  ' );
                }
                if (data['status'] == "6") {
                    $('td:eq(6)', row).html( '<button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="عدد 6 را جستجو کنید">\n' +
                        ' عدم پاسخگویی مشترک ' +
                        '                    </button>  ' );
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

<!--خروجی دوره-->
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
    <div class="x_title">
        <h2>ایجاد فایل خروجی
            <small>شماره دوره را انتخاب فرمایید</small>
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
        <?php
        if (isset($_SESSION['perm'])){
        ?>
        <div class="x_content">
            <br>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <form method="post" action="<?= baseUrl() ?>/asr/exportCounterReader"
                      class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>دوره کنتورخوانی:</label>
                        <select required="required" type="text" name="period-number">
                            <option value="" disabled selected>انتخاب کنید</option>
                            <?php
                            foreach ($data['period'] as $records) {
                                ?>
                                <option value="<?= $records['period_number'] ?>">
                                    <?= $records['period_number'] . ' ' . '(' . $records['period_name'] . ')' ?>
                                    <span class="tag">و تعداد <?= $records['COUNT(period_number)'] ?></span>
                                </option>
                                <?
                            }
                            ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="btn-download" value="دانلود">
                    </div>
                </form>
            </div>
            <?php
            $endPeriod = end($data['period']);
            $lastPeriodId = $endPeriod['period_number'];
            ?>
            <div class="col-lg-6 col-md-6 col-xs-12">
                <form method="post" action="<?= baseUrl() ?>/asr/counterReader0" class="form-horizontal form-label-left"
                      enctype="multipart/form-data">
                    <div class="form-group">

                        <label>
                            <div class="checkbox">
                                <input required type="checkbox" class="flat" name="check" value="yes">
                                تبدیل عدم قرائت دوره
                                <a class="btn btn-default"><?= $lastPeriodId ?></a> به کارکرد صفر:
                            </div>

                        </label>
                        <input type="hidden" name="period_id" value="<?= $lastPeriodId ?>">
                        <input class="btn btn-primary" type="submit" name="btn-counter0" value="کارکرد صفر">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <?php
    }
    ?>

<div class="clearfix"></div>
<body onload="loadCatalogCounter()"></body>
<table   id="catalog-counter"  data-order='[[ 5, "desc" ]]' class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%"  >
    <thead>
    <tr>
        <th>نام مشترک</th>
        <th>شماره قرارداد</th>
        <th>آدرس</th>
        <th>شماره دوره</th>
        <th>نام دوره</th>
        <th>شمارنده کنتور</th>
        <th>وضعیت</th>
        <th>تاریخ قرائت</th>
        <th>تاریخ تغییر</th>
        <th>نام کنتور خوان</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>نام مشترک</th>
        <th>شماره قرارداد</th>
        <th>آدرس</th>
        <th>شماره دوره</th>
        <th>نام دوره</th>
        <th>شمارنده کنتور</th>
        <th>وضعیت</th>
        <th>تاریخ قرائت</th>
        <th>تاریخ تغییر</th>
        <th>نام کنتور خوان</th>
    </tr>
    </tfoot>
</table>
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
</div>
<div class="clearfix"></div>

<br>
<br>