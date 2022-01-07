<?php
//dump($data);
//dump($_SESSION);
if (isset($_SESSION['roleId']) && $_SESSION['permId']==3) {
?>
<div id="listUserModal" class="modal fade">
    <form class="form-horizontal" id="updateForm" method="post">

        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ویرایش شناسه قبض پرداختی در بانک</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label">صاحب قرارداد</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="contractName" name="contractName" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">متراژ</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="area" name="area">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">نوع اشتراک شارژ</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="companyType" name="companyType" >
<!--                                <select required="required" type="text" name="companyType" id="companyType">-->
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">اشتراک آبرسانی</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="waterCounter" name="waterCounter">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" id="contractNumber" name="contractNumber" readonly>
                    <input type="hidden" name="action" id="action" value="" />
                    <a ><button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button> </a>
                    <input type="submit" name="save" id="save" class="btn btn-info" value="ثبت" />
                </div>
            </div>
        </div>
    </form>

</div>
<?}?>


<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>لیست مشترکین
                <small>طراحی شخصی شده</small>
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

        <div class="x_content">


            <style>
                .bolded {
                    font-weight:bold;
                }
                div.dataTables_wrapper {
                    width: 100%;
                }
            </style>
            <div class="dataTables_wrapper">
            <table id="catalog_user_list"  class="table table-bordered table-striped  dataTable dtr-inline" style=" width: 100%" >
                    <thead  style="font-size: 8pt;">
                    <tr>
                        <th>عملیات</th>
                        <th>شماره قرارداد</th>
                        <th> صاحب قرارداد</th>
                        <th>نام شرکت فعال</th>
                        <th>نوع شخصیت</th>
                        <th>شناسه ملی</th>
                        <th>کد اقتصادی</th>
                        <th>متراژ</th>
                        <th>کدپستی</th>
                        <th> برگه خروج </th>
                        <th>کد ملی مدیرعامل</th>
                        <th>تلفن 1</th>
                        <th>تلفن 2</th>
                        <th>فکس</th>
                        <th> مدیر عامل</th>
                        <th>نوع فعالیت</th>
                        <th>آدرس</th>
                        <th>اشتراک آبرسانی</th>
                        <th>نوع کاربری</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>عملیات</th>
                        <th>شماره قرارداد</th>
                        <th> صاحب قرارداد</th>
                        <th>نام شرکت فعال</th>
                        <th>نوع شخصیت</th>
                        <th>شناسه ملی</th>
                        <th>کد اقتصادی</th>
                        <th>متراژ</th>
                        <th>کدپستی</th>
                        <th> برگه خروج </th>
                        <th>کد ملی مدیرعامل</th>
                        <th>تلفن 1</th>
                        <th>تلفن 2</th>
                        <th>فکس</th>
                        <th> مدیر عامل</th>
                        <th>نوع فعالیت</th>
                        <th>آدرس</th>
                        <th>اشتراک آبرسانی</th>
                        <th>نوع کاربری</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
</div>
                </div>
            </div>
<br>
<div class="clearfix"></div>


<script>
    $("document").ready(function () {

        $(document).on('click', '#updateUser', function(){
            var Id = $(this).attr('data-id');
            var action = 'getUser';
            $.ajax({
                url:'getUser',
                method:"POST",
                data:{contractNumber:Id, action:action},
                dataType:"json",
                success:function(data){
                    $('#listUserModal').modal('show');
                    $('#contractNumber').val(data.contractNumber);
                    $('#contractName').val(data.contractName);
                    $('#waterCounter').val(data.waterCounter);
                    $('#companyType').val(data.companyType);
                    $('#area').val(data.area);
                    $('.modal-title').html("<i class='fa fa-edit'></i><span style = \"direction: ltr;\" class='text-info'> ویرایش مشترک:"+data.contractNumber+"</span>");
                    $('#action').val('updateListUser');
                    $('#save').val('ویرایش');
                }
            })
        });

        $("#listUserModal").on('submit','#updateForm', function(event){
            event.preventDefault();
            $('#save').attr('disabled','disabled');
            var formData = $(this).serialize();
            $.ajax({
                url:"actionUsers",
                method:"POST",
                data:formData,
                success:function(data){
                    $('#updateForm')[0].reset();
                    $('#listUserModal').modal('hide');
                    $('#save').attr('disabled', false);
                    catalogUserList.ajax.reload();
                }
            })
        });



        // Setup - add a text input to each footer cell
        $('#catalog_user_list tfoot  th').each(function () {
            var title = $(this).text();
            $(this).html('<div class="input-group mb-3"><input class=" form-control " dir="ltr" style="font-size: 11pt; font-family: \'B Koodak\' "   placeholder="🔎 ' + title + '" /></div>');
        });
        var catalogUserList = $('#catalog_user_list').DataTable({

            "processing": true,
            "scrollX": true,
            "scrollCollapse": true,
            "fixedHeader": true,
            "serverSide": true,
            "autoWidth": true,
            "pageLength": 10,
            "order" : [],
            // "searching": true,
            "orderCellsTop": true,
            "ajax": {
                "url": "<?=baseUrl()?>/asr/usersListServerSide",
                "type": "POST",
                // "dataSrc": ""
            },
            "columns": [
                // {data: 0,  className: "contenteditable aseman-ltr"},
                {data: 0,  className: "contenteditable aseman-ltr"},
                {data: 0,  className: "contenteditable aseman-ltr"},
                {data: 1,  className: "contenteditable "},
                {data: 2,  className: "contenteditable "},
                {data: 3,  className: "contenteditable aseman-ltr text-center",
                },
                {data: 4,  className: "contenteditable aseman-ltr"},
                {data: 5,  className: "contenteditable aseman-ltr"},
                {data: 6,  className: "contenteditable aseman-ltr",},
                {data: 7,  className: "contenteditable aseman-ltr"},
                {data: 8,  className: "contenteditable aseman-ltr"},
                {data: 9,  className: "contenteditable aseman-ltr"},
                {data: 10,  className: "contenteditable aseman-ltr"},
                {data: 11,  className: "contenteditable aseman-ltr"},
                {data: 12,  className: "contenteditable aseman-ltr"},
                {data: 13,  className: "contenteditable ",},
                {data: 14,  className: "contenteditable aseman-ltr"},
                {data: 15,  className: "contenteditable aseman-ltr"},
                {data: 16,  className: "contenteditable aseman-ltr"},
                {data: 17,  className: "contenteditable aseman-ltr"},
            ],
            "rowCallback": function (row, data, dataIndex ) {
                if (data[2] == null) {
                    $('td:eq(4)', row).html('<button type="button" class="btn btn-warning btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="">\n' +
                        ' پروفایل کامل نیست ' +
                        '                    </button>  ');
                }
                if (data[3] == "0" && data[2] != null) {

                    $('td:eq(4)', row).html('<button type="button" class="btn btn-success btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="">\n' +
                        ' &nbspحقوقی&nbsp ' +
                        '                    </button>  ');
                }
                if (data[3] == "1" && data[2] != null) {
                    $('td:eq(4)', row).html('<button type="button" class="btn btn-info btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="">\n' +
                        ' &nbspحقیقی&nbsp ' +
                        '                    </button>  ');
                }
                if (data[16]==1) {
                    $('td:eq(17)', row).html('<button type="button" class="btn btn-info btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="">\n' +
                        ' &nbspدارد&nbsp ' +
                        '                    </button>  ');
                }if(data[16]==0 || data[16]==null){
                    $('td:eq(17)', row).html('<button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="">\n' +
                        ' &nbspندارد&nbsp ' +
                        '                    </button>  ');
                }

                if (data[17]==1) {
                    $('td:eq(18)', row).html('<button type="button" class="btn btn-info btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="">\n' +
                        ' &nbspواحد صنعتی&nbsp ' +
                        '                    </button>  ');
                } if (data[17]==2){
                    $('td:eq(18)', row).html('<button type="button" class="btn btn-success btn-xs" data-toggle="tooltip" href="#" data-placement="top" title="">\n' +
                        ' واحد تجاری&nbsp ' +
                        '                    </button>  ');
                }
            },

            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0,
                    // "render": function (data, type, row) {
                    "render": function (data) {
                        var btn =
                            '<button type="button" name="updateUser" class="btn btn-dark btn-xs updatelistUserModal" id="updateUser" data-id="' + data + '">ویرایش&nbsp;<i class="glyphicon glyphicon-pencil"></i></button>'

                        return btn;

                    },
                },
                {
                    "columnDefs": [ {
                        "searchable": false,
                        "orderable": false,
                        "targets": 0
                    } ],
                    "order": [[ 1, 'asc' ]]
                },
                {
                    "render": function ( data, type, row ) {
                        if (data!= null) {
                            return  row[18]+' '+ data ;
                        }else {
                            return '';
                        }
                    },
                    "targets": 14
                },
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
                [10, 25, 50, 100, 200, -1],
                ['10 رکورد', '25 رکورد', '50 رکورد', '100 رکورد', '200 رکورد', 'تمام رکورد ها']
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
        catalogUserList.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change clear', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });



        // catalogUserList.on( 'order.dt search.dt', function () {
        //     catalogUserList.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        //         cell.innerHTML = i+1;
        //     } );
        // } ).draw();

        $("#target").click(function () {
            alert("Handler for .click() called.");
        });
    });
</script>

