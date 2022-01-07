<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//require_once 'includes/phpexcel/classes/PHPExcel.php';
if (!isset($_POST['btn-pardazesh'])){ ?>

<?php
//    $xlsx = SimpleXLSX::parse("/uploader/wds/bank.xlsx");
//    $rows = $xlsx->rows();
//    for( $i=0 ; $i< count($rows)-1; $i++) { ?>
<!--    <tr>-->
<!--        <td>--><?php //echo $rows[$i][0]; ?><!--</td>-->
<!--        <td>--><?php //echo $rows[$i][1]; ?><!--</td>-->
<!--        <td>--><?php //echo $rows[$i][2]; ?><!--</td>-->
<!--    </tr>-->
<?php //} ?>
<!--</table>-->

    <script src="<?=baseUrl()?>/vendors/jquery/dist/jquery.min.js"></script>


<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>پردازش بدهی شارژ اول دوره
                <small>فایل اکسل را آپلود و کنترل اطلاعات را کنترل فرمایید</small>
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
            <div class="x_content">
                <br>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <form  method="post" action="<?=baseUrl()?>/asr/StarterChargeDebit"  class="form-horizontal form-label-left" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>انتخاب فایل اطلاعات</label>
                            <input type="file" name="xlsx"  value="فایل">
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="btn-pardazesh" value="پردازش">
                        </div>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 col-xs-12">
                    <a class="btn btn-info" href="<?=baseUrl()?>/asr/download/charge-debit.xlsx" download>دانلود فایل  نمونه</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <?
    }
    if (isset($_POST['btn-pardazesh'])) {
    $file_upload = $_FILES['xlsx'];
    //        var_dump($file_upload);
    $dir = 'uploader/excel/';
    if (!is_dir($dir)) {
        mkdir($dir);
    }
    $from = $_FILES ['xlsx']['tmp_name'];
    $to = 'uploader/excel/' . $file_upload['name'];
    //        var_dump($to);
    move_uploaded_file($from, $to);
    $dataExel = ImportExcel($to);
    $header = $dataExel['header'][1];
    $arr_data = $dataExel['values'];
//    var_dump($arr_data);

    ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> ثبت اطلاعات و صدور قبض در پنل مشترک
                    <small>پس از اطمینان از صحت اطلاعات ثبت فرمایید</small>
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
                <div class="x_content">
                    <br>
                    <form method="post" action="<?= baseUrl() ?>/asr/StarterChargeDebit" class="form-horizontal form-label-left"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <label>همه چیز درسته؟ اطلاعات رو ثبت کنم؟</label>
                            <br>
                            <button class="btn btn-primary" type="submit" name="btn-insert" value="<?=$to?>">ثبت
                                نهایی
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="col-md-12" align="right">
        <button type="button" name="add" id="addBankModal" class="btn btn-warning btn-xs waves-effect waves-light"><i class="fa fa-plus">&nbsp;&nbsp;</i>رکورد جدید  </button>
    </div>
    <table id="datatable-buttons" data-page-length='10' class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
    <thead>
            <tr>
<!--               --><?// foreach ($header as $key => $value) {
//                   echo '<th>'.$value.'<th>';} ?>
                <td><?=$header['A'];?></td>
                <td><?=$header['B'];?></td>
                <td><?=$header['C'];?></td>
                <td><?=$header['D'];?></td>
            </tr>
    </thead>
<tbody>
<?php foreach ($arr_data as $row): array_map('htmlentities', $row); ?>
<tr>
    <td><?php echo implode('</td><td>', $row); ?></td>
</tr>
<?php endforeach; ?>
</tbody>

    </table>
</div>
    <div class="clearfix"></div>


<?php
}?>


<div class=" col-md-8">
    <div class="col-md-12" align="right">
        <button type="button" name="add" id="addBankModal" class="btn btn-warning btn-xs waves-effect waves-light"><i class="fa fa-plus">&nbsp;&nbsp;</i>رکورد جدید  </button>
    </div>
<table id="catalogChargeStarterDebit"    class="table table-striped table-bordered dt-responsive"
       cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>ردیف</th>
        <th>شماره قرارداد</th>
        <th>مبلغ بدهی</th>
        <th>متراژ</th>
        <th>سال</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th>ردیف</th>
        <th>شماره قرارداد</th>
        <th>مبلغ بدهی</th>
        <th>متراژ</th>
        <th>سال</th>
    </tr>
    </tfoot>

</table>
</div>




<script>
    $("document").ready(function () {
        // Setup - add a text input to each footer cell
        $('#catalogChargeStarterDebit tfoot  th').each(function () {
            var title = $(this).text();
            $(this).html('<div class="input-group mb-3"><input class=" form-control " dir="ltr" style="font-size: 11pt; font-family: \'B Koodak\' "   placeholder="🔎 ' + title + '" /></div>');
        });
        var catalogChargeStarterDebit = $('#catalogChargeStarterDebit').DataTable({

            "processing": true,
            "fixedHeader": true,
            "serverSide": true,
            "autoWidth": true,
            "pageLength": 10,
            "order": [],
            // "searching": true,
            "orderCellsTop": true,
            "ajax": {
                "url": "<?=baseUrl()?>/asr/StarterChargeDebitServerSide",
                "type": "POST",
                // "dataSrc": ""
            },
            "columns": [
                {data: 0, "width": "15%", className: "contenteditable aseman-ltr"},
                {data: 1, className: "contenteditable aseman-ltr"},
                {data: 2, className: "contenteditable aseman-ltr" , render: $.fn.dataTable.render.number(',')},
                {data: 3, className: "contenteditable aseman-ltr"},
                {data: 4, className: "contenteditable aseman-ltr"},


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

        catalogChargeStarterDebit.columns().every(function () {
            var that = this;
            $('input', this.footer()).on('keyup change clear', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });

        $('#addBankModal').click(function(){
            $('#payBankModal').modal('show');
            $('#updateForm')[0].reset();
            $('.modal-title').html("<i class='fa fa-plus'></i> ثبت رکورد جدید");
            $('#action').val('addPayedBank');
            $('#save').val('ثبت جدید');
        });

        $(document).on('click', '#updatePayBankModal', function(){
            var Id = $(this).attr('data-id');
            var action = 'getbillPayBank';
            $.ajax({
                url:'getBillPayedBank',
                method:"POST",
                data:{billPayId:Id, action:action},
                dataType:"json",
                success:function(data){
                    $('#payBankModal').modal('show');
                    $('#payId').val(data.id);
                    $('#date').val(data.date);
                    $('#payed-for').val(data.payedFor);
                    $('#amount').val(data.amount);
                    $('#shenase-ghabz').val(data.shenaseGhabz);
                    $('#shenase-pardakht').val(data.shenasePardakht);
                    $('#rrn').val(data.rrn);
                    $('#card-number').val(data.cardNumber);
                    $('.modal-title').html("<i class='fa fa-edit'></i> ویرایش قبض پرداختی  ردیف:"+data.id);
                    $('#action').val('updatePayBank');
                    $('#save').val('ویرایش');
                }
            })
        });

        $("#payBankModal").on('submit','#updateForm', function(event){
            event.preventDefault();
            $('#save').attr('disabled','disabled');
            var formData = $(this).serialize();
            $.ajax({
                url:"actionBillPayedBank",
                method:"POST",
                data:formData,
                success:function(data){
                    $('#updateForm')[0].reset();
                    $('#payBankModal').modal('hide');
                    $('#save').attr('disabled', false);
                    tableCatalogPayedBank.ajax.reload();
                }
            })
        });
    })
</script>

<div id="payBankModal" class="modal fade">
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
                            <label class="col-sm-4 control-label">تاریخ</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="date" name="date" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">کد شرکت تابعه</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="payed-for" name="payed-for">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">مبلغ</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="amount" name="amount" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">شناسه قبض</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="shenase-ghabz" name="shenase-ghabz">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" >شناسه پرداخت</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="shenase-pardakht" name="shenase-pardakht">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" >کد پیگیری</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="rrn" name="rrn" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" >شماره کارت</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="card-number" name="card-number" >
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