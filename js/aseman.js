
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
           "sEmptyTable": "?????? ???????? ???? ???? ???????? ???????? ??????????",
           "sInfo": "?????????? _START_ ???? _END_ ???? _TOTAL_ ??????????",
           "sInfoEmpty": "?????????? 0 ???? 0 ???? 0 ??????????",
           "sInfoFiltered": "(?????????? ?????? ???? _MAX_ ??????????)",
           "sInfoPostFix": "",
           "sInfoThousands": ",",
           "sLengthMenu": "?????????? _MENU_ ??????????",
           "sLoadingRecords": "???? ?????? ????????????????...",
           "sProcessing": "???? ?????? ????????????...",
           "sSearch": "??????????:",
           "sZeroRecords": "???????????? ???? ?????? ???????????? ???????? ??????",
           "oPaginate": {
               "sFirst": "??????????",
               "sLast": "??????????",
               "sNext": "????????",
               "sPrevious": "????????"
           },
           "oAria": {
               "sSortAscending": ": ???????? ???????? ?????????? ???? ???????? ??????????",
               "sSortDescending": ": ???????? ???????? ?????????? ???? ???????? ??????????"
           }
       }
    });
     setInterval(function () {
        tableRight.ajax.reload(null, false);
    },1000);

//?????????? ????
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
            "sEmptyTable": "?????? ???????? ???? ???? ???????? ???????? ??????????",
            "sInfo": "?????????? _START_ ???? _END_ ???? _TOTAL_ ??????????",
            "sInfoEmpty": "?????????? 0 ???? 0 ???? 0 ??????????",
            "sInfoFiltered": "(?????????? ?????? ???? _MAX_ ??????????)",
            "sInfoPostFix": "",
            "sInfoThousands": ",",
            "sLengthMenu": "?????????? _MENU_ ??????????",
            "sLoadingRecords": "???? ?????? ????????????????...",
            "sProcessing": "???? ?????? ????????????...",
            "sSearch": "??????????:",
            "sZeroRecords": "???????????? ???? ?????? ???????????? ???????? ??????",
            "oPaginate": {
                "sFirst": "??????????",
                "sLast": "??????????",
                "sNext": "????????",
                "sPrevious": "????????"
            },
            "oAria": {
                "sSortAscending": ": ???????? ???????? ?????????? ???? ???????? ??????????",
                "sSortDescending": ": ???????? ???????? ?????????? ???? ???????? ??????????"
            }
        }


    });
    setInterval(function () {
        tableLeft.ajax.reload(null, false);
        // tableLeft.blur();
    },1000);








