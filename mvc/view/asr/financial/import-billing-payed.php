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



<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>پردازش قبوض پرداخت شده از طریق شناسه قبض و پرداخت
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
                    <form  method="post" action="<?=baseUrl()?>/asr/importBillingPayed"  class="form-horizontal form-label-left" enctype="multipart/form-data">
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
                    <a class="btn btn-info" href="<?=baseUrl()?>/asr/download/bank.xlsx" download>دانلود فایل  نمونه</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <?
    }

    if (isset($_POST['btn-pardazesh'])) {
    require_once ('includes/phpOffice/autoload.php');
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
    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load($to);
    $worksheet = $spreadsheet->getActiveSheet();
    $rows = $worksheet->toArray();
    $header = $rows[0];
    unset($rows[0]);
    $arr_data = $rows;
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
                    <form method="post" action="<?= baseUrl() ?>/asr/importBillingPayed" class="form-horizontal form-label-left"
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

    <table id="datatable-buttons" data-page-length='10' class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
    <thead>
            <tr>
<!--               --><?// foreach ($header as $key => $value) {
//                   echo '<th>'.$value.'<th>';} ?>
                <td><?=$header['0'];?></td>
                <td><?=$header['1'];?></td>
                <td><?=$header['2'];?></td>
                <td><?=$header['3'];?></td>
                <td><?=$header['4'];?></td>
                <td><?=$header['5'];?></td>
                <td><?=$header['6'];?></td>
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
