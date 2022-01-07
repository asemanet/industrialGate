<?php
//dump($data);
?>

<script>
    function loadCatalogUserPermit() {
        // Setup - add a text input to each footer cell
        $('#catalog-user-permit tfoot  th').each(function () {
            var title = $(this).text();
            $(this).html('<div class="input-group mb-3"><input class=" form-control " dir="rtl" style="font-size: 11pt; font-family: \'B Koodak\' " type="text"  placeholder="🔎 ' + title + '" /></div>');
        });

        var tableCatalogUserPermit= $('#catalog-user-permit').DataTable({
            orderCellsTop: true,
            "processing": true,
            "fixedHeader": true,
            "serverSide": true,
            "autoWidth": true,
            "pageLength": 10,
            "searching": true,
            "ajax": {
                "url": "<?=baseUrl()?>/permit/catalogServerSide",
                "type": "POST",
                // "dataSrc": ""
            },
            "columns": [
                {data: "license_plate"},
                {data: "cargo"},
                {data: "driver_name"},
                {data: "issue_date", className: "aseman-ltr"},
                {data: "due_date"  , className: "aseman-ltr" ,"width": "18%"},
                {data: "car_type"},
                {data: "exit_done", className: "text-center "},
                {data: "permit_rand", className: "aseman-ltr"},
                // {
                //     "data": null,
                //     "defaultContent": " <button dir=\"ltr\"  class=\"btn btn-success btn-xs\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"تاریخ خروج: \">خروج موفق</button> "
                // }

            ],



            "rowCallback": function (row, data, index) {
                if (data['exit_done'] == "1") {
                    $('td:eq(6)', row).html( '<button dir="ltr"  class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="تاریخ خروج:'+data["due_date"]+' ">خروج موفق</button>' );
                }
                else if (data['exit_done'] == "0") {
                    $('td:eq(6)', row).html( '&nbsp<button  name="showPermit" type="button" data-toggle="modal" data-target="#showPermit"' +
                        'onclick="testPermit('
                            +"'"+data["exit_permit_hash"]+"'"+','
                            +"'"+data["license_plate"]+"'"+','
                            +"'"+data["driver_name"]+"'"+','
                            +"'"+data["issue_date"]+"'"+','
                            +"'"+data["car_type"]+"'"+','
                            +"'"+data["cargo"]+"'"+','
                            +"'"+data["permit_rand"]+"'"+
                        ')">'+
                        '&nbsp&nbsp<img data-toggle="tooltip" data-placement="top" title="چاپ مجدد" src="<?=baseUrl() ?>/build/images/print.png" width="50%" >&nbsp&nbsp'+

                    '</button>');

                }else {

                    $('td:eq(6)', row).html( '<button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="عدم خروج در مهلت 24 ساعته---عدم خروج از گیت پلاک خوان---مخدوش بودن پلاک جلو---عدم شناسایی دوربین پلاک خوان ">\n' +
                        '                        <!--                    <span style="font-size: 10pt">خطا</span>-->\n' +
                        ' &nbspعدم خروج&nbsp ' +
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


<body onload="loadCatalogUserPermit()"></body>
<table   id="catalog-user-permit"  data-order='[[ 3, "desc" ]]' class="table table-striped table-bordered dt-responsive" cellspacing="0" width="100%"  >
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
    <tfoot>
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
    </tfoot>
</table>
<div class="clearfix"></div>

<div class="container">
    <h3>Tooltip Example</h3>
    <a href="#" data-toggle="tooltip" title="Hooray!">Hover over me</a>
</div>




<script>
    window.jQuery || document.write('<script src="<?=baseUrl()?>/vendors/jQuery.print-master/bower_components/jquery/dist/jquery.min.js"><\/script>')
</script>
<script src="<?=baseUrl()?>/vendors/jQuery.print-master/jQuery.print.js"></script>
<script type="text/javascript">




    function testPermit(hash,plate,driver,date1,car,cargo,num1) {
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
            '<p dir= "rtl" style="position:absolute; top:310px;right:400px; color: #151515; font-weight: bold;font-family: "B Koodak";  ">'+'<?php echo $_SESSION['company_name']; ?>'+'</p>'+
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
            '<p dir= "rtl" style="position:absolute; top:315px;right:700px; color: #151515; font-weight:bold; font-size:7pt; font-family: "B Koodak";  ">'+'<?php echo $_SESSION['company_name']; ?>'+'</p>'+
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