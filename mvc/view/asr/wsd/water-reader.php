
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>پردازش قبض آب
                <small>فایل از نوع CSV را آپلود و کنترل اطلاعات را کنترل فرمایید</small>
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
                <form  method="post" action="<?=baseUrl()?>/asr/wsdtest"  class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>انتخاب فایل اطلاعات</label>
                        <input type="file" name="csv" accept=".csv" value="فایل">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="btn-pardazesh" value="پردازش">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <?

    if (isset($_POST['btn-pardazesh'])) {
        $dir = 'uploader/WDS';
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $from = $_FILES ['csv']['tmp_name'];
        $to = 'uploader/WDS/doreh' . jdate('Ymd') . '.csv';
        move_uploaded_file($from, $to);
        $dirCSV = $to;
        $counter = 0;
        $CSVfpTest = fopen("$dirCSV", "r");
        $rowtest = fgetcsv($CSVfpTest,"*");
        $explodeDataTest = explode("*", $rowtest[0]);
        var_dump($explodeDataTest);


        if (isset($_POST['btn-pardazesh']) & !isset($periodLastId)){
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>  ثبت اطلاعات و صدور قبض در پنل مشترک
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
                            <form  method="post" action="<?=baseUrl()?>/asr/wsdtest"  class="form-horizontal form-label-left" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>همه چیز درسته؟ اطلاعات رو ثبت کنم؟</label>
                                    <br>
                                    <button class="btn btn-primary" type="submit" name="btn-insert" value="<?=$dirCSV?>">ثبت نهایی</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
        <?}
        br();
        br();

        echo "
                            <table id=\"datatable-buttons\" data-page-length='10'  class=\"table table-striped table-bordered dt-responsive \" cellspacing=\"0\" width=\"100%\">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>شماره قرارداد</th>
                <th>قرارداد بنام</th>
                <th>user_id</th>
                <th>مصرف قبلی</th>
            </tr>
            </thead>
                    ";
        $CSVfp = fopen("$dirCSV", "r");
        if ($CSVfp !== FALSE) {
            while (!feof($CSVfp)) {
                $row = fgetcsv($CSVfp,"*");
                $explodeData = explode("*", $row[0]);
//                var_dump($explodeData);
                $contractNumber ="415-".$explodeData[0];
                $contractNumber = str_replace('﻿', '', $contractNumber);
                $userDetailes=AsrModel::fetch_bill_by_contract_number($contractNumber);
                $userId= $userDetailes[0]['user_id'];
                $userName= $userDetailes[0]['contract_name'];
                $pastUse= $explodeData[1];
                $counter++;
                ?>
                <tr>
                    <td><?=$counter?></td>
                    <td><?=$contractNumber?></td>
                    <td>
                        <?if(!isset($userName)){
                            echo "<span class='alert-danger'>مشترک پنل کاربری ندارد و قبض صادر نمی شود</span>";
                        }else{
                            echo $userName;
                        }
                        ?>
                    </td>
                    <td><?=$userId?></td>
                    <td><?=$pastUse?></td>
                </tr>

                <?
            }
        }
        fclose($CSVfp);
    }else{
//    exit();
    }
    ?>
    </table>
</div>
<div class="clearfix"></div>



