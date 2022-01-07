
$('#date-traffic-1').MdPersianDateTimePicker({
        // Placement: 'left',
        Trigger: 'click',
        EnableTimePicker: true,
        TargetSelector: '#inputDate-traffic-1',
        GroupId: '',
        ToDate: false,
        FromDate: false,
        DisableBeforeToday: false,
        Disabled: false,
        Format: 'yyyy-MM-dd HH:mm:ss',
        IsGregorian: false,
        EnglishNumber: false,
        InLine: false
    });
    $('#date-traffic-2').MdPersianDateTimePicker({
        // Placement: 'left',
        Trigger: 'click',
        EnableTimePicker: true,
        TargetSelector: '#inputDate-traffic-2',
        GroupId: '',
        ToDate: false,
        FromDate: false,
        DisableBeforeToday: false,
        Disabled: false,
        Format: 'yyyy-MM-dd HH:mm:ss',
        IsGregorian: false,
        EnglishNumber: false,
        InLine: false
    });

$('.date-traffic-1').MdPersianDateTimePicker({
        // Placement: 'left',
        Trigger: 'click',
        EnableTimePicker: true,
        TargetSelector: '#inputDate-traffic-1',
        GroupId: '',
        ToDate: false,
        FromDate: false,
        DisableBeforeToday: false,
        Disabled: false,
        Format: 'yyyy-MM-dd HH:mm:ss',
        IsGregorian: false,
        EnglishNumber: false,
        InLine: false
    });
    $('.date-traffic-2').MdPersianDateTimePicker({
        // Placement: 'left',
        Trigger: 'click',
        EnableTimePicker: true,
        TargetSelector: '#inputDate-traffic-2',
        GroupId: '',
        ToDate: false,
        FromDate: false,
        DisableBeforeToday: false,
        Disabled: false,
        Format: 'yyyy-MM-dd HH:mm:ss',
        IsGregorian: false,
        EnglishNumber: false,
        InLine: false
    });



        // $('#testfarhad').dataTable({
        //     "ajax": {
        //         "url": "/asr/permitCheckAjaxTest",
        //         "type": "POST",
        //         "columns": [
        //             {data: "exited_id"},
        //             {data: "license_platte"},
        //             {data: "channel"},
        //             {data: "permit_rand"},
        //             {data: "company_name"},
        //             {data: "car_type"},
        //             {data: "cargo"},
        //             {data: "driver_name"},
        //             {data: "issue_date"},
        //             {data: "exite_date"},
        //             {data: "exited_hash"},
        //             {data: "note"},
        //         ],
        //         "responsive": true,
        //         "autoWidth": true,
        //         "pageLength": 100,
        //     }, "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
        //         if ( aData[3] == "0" )
        //         {
        //             $('td', nRow).css('background-color', 'indianred');
        //         }
        //         else if ( aData[3] != "0" )
        //         {
        //             $('td', nRow).css('background-color', 'limegreen');
        //         }
        //     }
        //
        // });
   var tableRight= $('#fetch-right').DataTable({
        "ajax": {
            "url": "/asr/permitCheckAjaxRight",
            "type": "POST",
            "dataSrc": ""
        },
        "columns": [
            {data: "license_platte"},
            {data: "company_name"},
            {data: "channel"},
            {data: "permit_rand"},
            {data: "car_type"},
            {data: "cargo"},
            {data: "driver_name"},
            {data: "issue_date", className: "aseman-ltr"},
            {data: "exite_date", className: "aseman-ltr"}
        ],
        "responsive": true,
       // "processing": true,
       // "serverSide": true,
        "autoWidth": true,
        "pageLength": 5,
        "searching": true,
        "rowCallback": function (row, data, index) {
            if (data['permit_rand'] == "0") {
                $('td', row).css('background-color', 'indianred');
            }
            else if (data['permit_rand'] != "0") {
                $('td', row).css('background-color', 'limegreen');
            }
        },
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
       }
    });
     setInterval(function () {
        tableRight.ajax.reload(null, false);
    },1000);

//خروجی چپ
    var tableLeft= $('#fetch-left').DataTable({
        "ajax": {
            "url": "/asr/permitCheckAjaxLeft",
            "type": "POST",
            "dataSrc": ""
        },
        "columns": [
            {data: "license_platte"},
            {data: "company_name"},
            {data: "channel"},
            {data: "permit_rand"},
            {data: "car_type"},
            {data: "cargo"},
            {data: "driver_name"},
            {data: "issue_date", className: "aseman-ltr"},
            {data: "exite_date", className: "aseman-ltr"}
        ],
        "responsive": true,
        // "processing": true,
        "autoWidth": true,
        "pageLength": 5,
        "searching": true,
        "rowCallback": function (row, data, index) {
            if (data['permit_rand'] == "0") {
                $('td', row).css('background-color', 'indianred');
            }
            else if (data['permit_rand'] != "0") {
                $('td', row).css('background-color', 'limegreen');
            }
        },
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
        }


    });
    setInterval(function () {
        tableLeft.ajax.reload(null, false);
        // tableLeft.blur();
    },1000);








