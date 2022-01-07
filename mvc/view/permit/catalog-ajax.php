<?php
//dump($data);
$userId = $_SESSION['user_id'];
$where= "'user_id=$userId'";
echo $where;
?>
<script>
    function loadMyScript() {
        // Setup - add a text input to each footer cell
        $('#catalog tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<div class=""><input class="btn btn-toolbar" type="text" placeholder="جستجو ' + title + '" /></div>');
        });
        var table= $('#catalog').DataTable({
            "ajax": {
                "url": "/permit/ajaxCatalog",
                "type": "POST",
                "dataSrc": ""
            },
            "columns": [
                {data: "license_plate"},
                {data: "cargo"},
                {data: "driver_name"},
                {data: "issue_date"},
                {data: "due_date"},
                {data: "car_type"},
                {data: "exit_done"},
                {data: "permit_rand"},
            ],
            "responsive": true,
            // "processing": true,
            // "serverSide": true,
            "autoWidth": true,
            "pageLength": 10,
            "searching": true,

            "language": {
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
            dom: "Bfrtip",
            buttons: [
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
                    className: "btn-sm"
                },
                {
                    extend: "print",
                    text: "چاپ",
                    className: "btn-sm"
                },
            ],

        });


        // Apply the search
        table.columns().every( function () {
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

<body onload="loadMyScript()"></body>
<table   id="catalog"  class=" table table-striped table-bordered dt-responsive" style="width:100%" >
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