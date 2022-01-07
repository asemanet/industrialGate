<?php
//dump($data);
//$test='123456';
//echo "vat {$test} hast";

?>
<script src="<?=baseUrl()?>/vendors/jquery/dist/jquery.min.js"></script>




<div class="page-title">
    <div class="title_left">
        <h5> گزارش قبوض پرداختی بانکی </h5>
    </div>

    <div class="title_right">
        <div class="col-md-4 col-sm-4 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <span class="form-control">تاریخ امروز: <?= jdate('Y/m/d') ?></span>
                <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><span class="fa fa-clock-o"></span></button>
                    </span>
            </div>
        </div>
    </div>
</div>



<div class="col-md-12" align="right">
    <button type="button" name="add" id="addRecord" class="btn btn-warning btn-xs waves-effect waves-light"><i class="fa fa-plus">&nbsp;&nbsp;</i>رکورد جدید  </button>
</div>
<table id="catalogBankPayed" data-order='[[ 0, "desc" ]]' class="table table-striped table-bordered dt-responsive"
       cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>ردیف</th>
        <th>شماره دوره</th>
        <th>نام دوره</th>
        <th>شروع کنتور خوانی</th>
        <th>پایان کنتور خوانی</th>
                <th>عملیات</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>ردیف</th>
        <th>تاریخ</th>
        <th>کد شرکت تابعه</th>
        <th>مبلغ</th>
        <th>شناسه قبض</th>
                <th>عملیات</th>
    </tr>
    </tfoot>

</table>
<div class="clearfix"></div>


<div id="pageModal" class="modal fade">
    <form class="form-horizontal" id="updateForm" method="post">

    <div class="modal-dialog">
        <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> </h4>
        </div>
        <div class="modal-body">
                <div class="box-body">
                    <br>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">شماره دوره</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="period_number" name="period_number" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">نام دوره</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="period_name" name="period_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">تاریخ شروع قرائت</label>
                        <div class="input-group col-sm-4">
                            <div class="input-group-addon"  >
                                <span class="glyphicon glyphicon-calendar catalog_start_date cursor-pointer"></span>
                            </div>
                            <input id="start_date" type="text" name="start_date" dir="ltr" class="form-control catalog_start_date col-xs-12" readonly style="font-size: 9pt"   />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">تاریخ پایان قرائت</label>
                        <div class="input-group col-sm-4">
                            <div class="input-group-addon" >
                                <span class="glyphicon glyphicon-calendar catalog_end_date cursor-pointer"></span>
                            </div>
                            <input id="end_date" type="text" name="end_date" dir="ltr" class="form-control catalog_end_date" style="font-size: 9pt"  readonly   />
                        </div>
                    </div>
                </div>
        </div>
            <div class="modal-footer">
                <input type="hidden" class="form-control" id="payId" name="payId" readonly>
                <input type="hidden" name="action" id="action" value="" />
                <a ><button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button> </a>
                <input type="submit" name="save" id="save" class="btn btn-info" value="ثبت" />
            </div>
        </div>
    </div>
    </form>

</div>
<script>


    $("document").ready(function () {

        $(document).on('click', '#confirm-delete', function (e) {
            e.preventDefault();

            var pid = $(this).attr('data-id');
            var periodNumber = $(this).attr('data-periodNumber');
            var parent = $(this).parent("td").parent("tr");
            alert(periodNumber);

            bootbox.dialog({
                message: "&nbsp;آیا از حذف ردیف&nbsp; "+"<span class='red'>&nbsp;"+pid+"&nbsp;</span>"+"&nbsp;اطمینان دارید؟&nbsp;&nbsp;",
                title: "<i class='glyphicon glyphicon-trash'></i>حذف ",
                buttons: {
                    success: {
                        label: "بازگشت",
                        className: "btn",
                        callback: function() {
                            $('.bootbox').modal('hide');
                        }
                    },
                    danger: {
                        label: "تایید حذف",
                        className: "btn-danger",
                        callback: function() {

                                $.ajax('<?=baseUrl()?>/asr/wsdPeriodDelete?delete=' + pid, {
                                    type: 'post',
                                })

                                .done(function(response){

                                    // bootbox.alert(response);
                                    parent.css('background','tomato');
                                    parent.fadeOut(1200);
                                    // tableCatalogPayedBank.ajax.reload().fadeOut('slow');
                                })
                                .fail(function(){

                                    bootbox.alert('مشکلی پیش آمد');

                                })

                        }
                    }
                }
            });
        });

        $('#addRecord').click(function(){
            $('#pageModal').modal('show');
            $('#updateForm')[0].reset();
            $('.modal-title').html("<i class='fa fa-plus'></i> ثبت رکورد جدید");
            $('#action').val('addRecord');
            $('#save').val('ثبت جدید');
        });
        
        $(document).on('click', '#updatepageModal', function(){
            var Id = $(this).attr('data-id');
            var action = 'getWsdPeriod';
            $.ajax({
                url:'getWsdPeriod',
                method:"POST",
                data:{billPayId:Id, action:action},
                dataType:"json",
                success:function(data){
                    $('#pageModal').modal('show');
                    $('#payId').val(data.id);
                    $('#period_number').val(data.periodNumber);
                    $('#period_name').val(data.periodName);
                    $('#start_date').val(data.startDate);
                    $('#end_date').val(data.endDate);
                    $('.modal-title').html("<i class='fa fa-edit'></i> ویرایش قبض پرداختی  ردیف:"+data.id);
                    $('#action').val('updateRecord');
                    $('#save').val('ویرایش');
                }
            })
        });

        $("#pageModal").on('submit','#updateForm', function(event){
            event.preventDefault();
            $('#save').attr('disabled','disabled');
            var formData = $(this).serialize();
            $.ajax({
                url:"actionWsdPeriod",
                method:"POST",
                data:formData,
                success:function(data){
                    $('#updateForm')[0].reset();
                    $('#pageModal').modal('hide');
                    $('#save').attr('disabled', false);
                    tableCatalogPayedBank.ajax.reload();
                }
            })
        });



        // Setup - add a text input to each footer cell
        $('#catalogBankPayed tfoot  th').each(function () {
            var title = $(this).text();
            $(this).html('<div class="input-group mb-3"><input class=" form-control " dir="ltr" style="font-size: 11pt; font-family: \'B Koodak\' "   placeholder="🔎 ' + title + '" /></div>');
        });
        var tableCatalogPayedBank = $('#catalogBankPayed').DataTable({

            "processing": true,
            "fixedHeader": true,
            "serverSide": true,
            "autoWidth": true,
            "pageLength": 10,
            "order" : [],
            // "searching": true,
            "orderCellsTop": true,
            "ajax": {
                "url": "<?=baseUrl()?>/asr/wsdPeriodServerSide",
                "type": "POST",
                // "dataSrc": ""
            },
            "columns": [
                {data: 0, "width": "2%",  className: "contenteditable "},
                {data: 1, "width": "10%", className: "contenteditable "},
                {data: 2, "width": "10%", className: "contenteditable "},
                {data: 3,                 className: "contenteditable "},
                {data: 4,                 className: "contenteditable "},
                {data: 0,                 className: "contenteditable "},
            ],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 5,
                    // "render": function (data, type, row) {
                    "render": function (data,data1) {
                        var btn = '<span  class="btn btn-danger btn-xs delete_product" href="#" data-periodNumber="' + data + '" data-id="' + data + '"  id="confirm-delete">حذف<i class="glyphicon glyphicon-trash"></i>&nbsp;</span>' +
                            '<button type="button" name="updatepageModal" class="btn btn-info btn-xs updatepageModal" id="updatepageModal" data-id="' + data + '">ویرایش&nbsp;<i class="glyphicon glyphicon-pencil"></i></button>'
                        return btn;

                    }
                }
            ],
            dom: "Bfrtip",
            language: {
                buttons: {
                    pageLength: {
                        _: " نمایش %d رکورد ▼",
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
                [10, 25, 50, 100, 200],
                ['10 رکورد', '25 رکورد', '50 رکورد', '100 رکورد', '200 رکورد']
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

        // $('[data-toggle="tooltip"]').tooltip();


        // Apply the search
        tableCatalogPayedBank.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change clear', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });


        $("#target").click(function () {
            alert("Handler for .click() called.");
        });

        $('.catalog_start_date').MdPersianDateTimePicker({
            Placement: 'bottom',
            Trigger: 'click',
            EnableTimePicker: true,
            TargetSelector: '#start_date',
            rangeSelector: true,
            groupId: 'rangeSelector1',
            FromDate: true,
            DisableBeforeToday: false,
            Disabled: false,
            Format: 'yyyy-MM-dd',
            IsGregorian: false,
            EnglishNumber: true,
            InLine: false
        });
        $('.catalog_end_date').MdPersianDateTimePicker({
            Placement: 'bottom',
            Trigger: 'click',
            EnableTimePicker: true,
            TargetSelector: '#end_date',
            rangeSelector: true,
            groupId: 'rangeSelector1',
            ToDate: true,
            DisableBeforeToday: false,
            Disabled: false,
            Format: 'yyyy-MM-dd',
            IsGregorian: false,
            EnglishNumber: true,
            InLine: false
        });
    });


</script>
