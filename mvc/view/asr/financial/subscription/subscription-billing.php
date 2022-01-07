<?php
if (!isset($_POST['btn-pardazesh'])){ ?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>پردازش قبض هزینه مشترک
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
                <form  method="post" action="<?=baseUrl()?>/asr/wsd"  class="form-horizontal form-label-left" enctype="multipart/form-data">
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
    }
    if (isset($_POST['btn-pardazesh'])) {
        $dir = 'uploader/subscription-billing';
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $from = $_FILES ['csv']['tmp_name'];
        $to = 'uploader/subscription-billing/doreh' . jdate('Ymd') . '.csv';
        move_uploaded_file($from, $to);
        $dirCSV = $to;
        $counter = 0;
        $CSVfpTest = fopen("$dirCSV", "r");
        $rowtest = fgetcsv($CSVfpTest,"؛");
        $explodeDataTest = explode("؛", $rowtest[0]);
        $periodId = $explodeDataTest[17];
        $periodLastId= AsrModel::fetch_bill_by_period_id($periodId);
        if (isset($periodLastId)) {
            echo "<span class='h5 '>برای این شماره دوره قبلا قبض صادر گردیده و ادامه عملیات امکانپذیر نمی باشد</span>";
            echo br().br()."<a class='btn btn-primary' ' href='/asr/wsd' >بازگشت</a>";
            echo hr();
            return $periodLastId;
        }

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
                            <form  method="post" action="<?=baseUrl()?>/asr/wsd"  class="form-horizontal form-label-left" enctype="multipart/form-data">
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
                <th>نام کاربری</th>
                <th>نام مشترک</th>
                <th>مصرف مشترک</th>
                <th>بدهی قبلی</th>
                <th>قابل پرداخت</th>
                <th>خدمات آبرسانی</th>
                <th>مهلت پرداخت</th>
                <th>نام دوره</th>
                <th>شناسه قبض</th>
                <th>شناسه پرداخت</th>
                <th>متراژ</th>
            </tr>
            </thead>
                    ";
        $CSVfp = fopen("$dirCSV", "r");
        if ($CSVfp !== FALSE) {
            while (!feof($CSVfp)) {
                $row = fgetcsv($CSVfp,"؛");
                $explodeData = explode("؛", $row[0]);
//                var_dump($explodeData);
                $contractNumber ="415-".$explodeData[0];
                $contractNumber = str_replace('﻿', '', $contractNumber);
                $companyName= $explodeData[1];
                $userDetailes=AsrModel::fetch_bill_by_contract_number($contractNumber);
                $userName= $userDetailes[0]['contract_number'];
                $ShenaseGhabz = $explodeData[3];
                $ShenasePardakht = $explodeData[4];
                $MizanMasraf = round($explodeData[5]);
                $HazineTaviz = round($explodeData[9]);
                if ($HazineTaviz == null) {
                    $HazineTaviz = 0;
                }
                $HazineKharabi = round($explodeData[10]);
                if ($HazineKharabi == null) {
                    $HazineKharabi = 0;
                }
                $HazineAbTankeri = round($explodeData[11]);
                if ($HazineAbTankeri == null) {
                    $HazineAbTankeri = 0;
                }
                $MablaghFazelab = round($explodeData[12]);
                if ($MablaghFazelab == null) {
                    $MablaghFazelab = 0;
                }
                $MablaghJarime = round($explodeData[13]);
                if ($MablaghJarime == null) {
                    $MablaghJarime = 0;
                }
                $khadamatAbresani = $HazineTaviz + $HazineKharabi + $HazineAbTankeri + $MablaghFazelab + $MablaghJarime;
                $GhabelPardakht = round($explodeData[15]);
                $MohlatPardakht = $explodeData[21];
                $NameDoreh = $explodeData[22];
                $BedehiQ = round($explodeData[24]);
                $ZaminKol = $explodeData[28];
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
                    <td><?=$companyName?></td>
                    <td><?=$MizanMasraf?></td>
                    <td><?=number_format($BedehiQ)?></td>
                    <td><?=number_format($GhabelPardakht)?></td>
                    <td><?=number_format($khadamatAbresani)?></td>
                    <td><?=$MohlatPardakht?></td>
                    <td><?=$NameDoreh?></td>
                    <td><?=$ShenaseGhabz?></td>
                    <td><?=$ShenasePardakht?></td>
                    <td><?=round($ZaminKol)?></td>
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



