<script src="<?=baseUrl()?>/vendors/jquery/dist/jquery.min.js"></script>

<div class="page-title">
    <div class="title_left">
        <!--            <span  class="fa fa-search fa-3x"></span>-->
        <hr>
    </div>

    <div class="title_right">
        <div class="col-md-4 col-sm-4 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <span  class="form-control" >تاریخ امروز: <?=jdate('Y/m/d')?></span>
                <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><span class="fa fa-clock-o"></span></button>
                    </span>
            </div>
        </div>
    </div>
</div>
<hr>
<?php
//dump($data);
if (!isset($data['exit_permit_hash'])){
    if (isset($data['message'])){
        echo "<span class='h4 alert alert-danger center-block'>".$data['message']."</span>";
    }
//        dump($_SESSION);
    ?>

    <script>
        function autotab(current,to){
            if (current.getAttribute &&
                current.value.length==current.getAttribute("maxlength")) {
                to.focus()
            }
        }
        function autotab1(current,to){
            if (current &&
                current.value) {
                to.focus()
            }
        }
        $('body').keypress(function(e){
            if (e.keyCode == 13)
            {
                $('#btn-search').click();
            }
        });

    </script>



    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>جستجو و ثبت پلاک خروج
                        <!--              <small>جلسات</small>-->
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

                    <form data-parsley-validate method="post" action="/asr/fl" name="license" id="license" class="form-horizontal form-label-left">


                        <div class="form-group">
                            <label  class="control-label col-md-3 col-sm-3 col-xs-12">شماره پلاک</label>
                            <div class="plaque col-md-9 col-sm-9 col-xs-12">
                                <input class="inputs" tabindex="3"  id="PLAQUE_PART4" required="required"  maxlength="2" minlength="2" name="ir"  placeholder=""   type="text" onKeyup="autotab(this, document.license.PLAQUE_PART2)" >
                                <input  tabindex="2" id="PLAQUE_PART3" required="required"  maxlength="3" minlength="3" name="threeDigit"   type="text" onKeyup="autotab(this, document.license.ir)">
                                <select tabindex="1"   type="text" required="required"  id="PLAQUE_PART2"   name="letter">
                                    <option value="" disabled selected>انتخاب کنید</option>
                                    <option value="الف"onclick="autotab1(this, document.license.threeDigit)"> الف </option>
                                    <option  value="ب" onclick="autotab1(this, document.license.threeDigit)"> ب </option>
                                    <option  value="ت" onclick="autotab1(this, document.license.threeDigit)"> ت </option>
                                    <option  value="ج" onclick="autotab1(this, document.license.threeDigit)"> ج </option>
                                    <option  value="د" onclick="autotab1(this, document.license.threeDigit)"> د </option>
                                    <option  value="س" onclick="autotab1(this, document.license.threeDigit)"> س </option>
                                    <option  value="ص" onclick="autotab1(this, document.license.threeDigit)"> ص </option>
                                    <option  value="ط" onclick="autotab1(this, document.license.threeDigit)"> ط </option>
                                    <option  value="ع" onclick="autotab1(this, document.license.threeDigit)"> ع </option>
                                    <option  value="ق" onclick="autotab1(this, document.license.threeDigit)"> ق </option>
                                    <option  value="گ" onclick="autotab1(this, document.license.threeDigit)"> گ </option>
                                    <option  value="ل" onclick="autotab1(this, document.license.threeDigit)"> ل </option>
                                    <option  value="م" onclick="autotab1(this, document.license.threeDigit)"> م </option>
                                    <option  value="ن" onclick="autotab1(this, document.license.threeDigit)"> ن </option>
                                    <option  value="و" onclick="autotab1(this, document.license.threeDigit)"> و </option>
                                    <option  value="ه" onclick="autotab1(this, document.license.threeDigit)"> ه </option>
                                    <option  value="ی" onclick="autotab1(this, document.license.threeDigit)"> ی </option>
                                    <option  value="ز" onclick="autotab1(this, document.license.threeDigit)"> ز </option>
                                    <option  value="ث" onclick="autotab1(this, document.license.threeDigit)"> ث </option>
                                    <option  value="پ" onclick="autotab1(this, document.license.threeDigit)"> پ </option>
                                    <option  value="ش" onclick="autotab1(this, document.license.threeDigit)"> ش </option>
                                    <option  value="ک" onclick="autotab1(this, document.license.threeDigit)"> ک </option>
                                    <option  value="ژ" onclick="autotab1(this, document.license.threeDigit)"> معلولین و جانبازان</option>
                                    <option  value="D" onclick="autotab1(this, document.license.threeDigit)"> D </option>
                                    <option  value="S" onclick="autotab1(this, document.license.threeDigit)"> S </option>
                                </>
                                <input autofocus class="inputs" tabindex="0"  required="required" id="PLAQUE_PART1"  maxlength="2" minlength="2" name="twoDigit"    type="text" onKeyup="autotab(this, document.license.PLAQUE_PART3)">
                            </div>
                        </div>
                        <hr>


                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <div class="item form-group">
                            <input type="submit" id="btn-search" name="btn-search" class="btn  btn-success" value="جستجو">
                            <button type="reset" class="btn btn-primary">انصراف</button>

                            </div>
                            <span class="text-info">توجه: برای سرعت بیشتر بعد از ورود پلاک، دکمه اینتر کیبورد کار جستجو، ثبت و بازگشت رو انجام میده!</span>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

<?}else{ ?>

    <table id="datatable_" data-order='[[ 6, "asc" ]]' data-page-length='100'  class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">



        <thead>
        <tr>
            <th>نام مشترک</th>
            <!--                <th>شماره قرارداد</th>-->
            <th>شماره پلاک</th>
            <th>نوع بار</th>
            <th>نام راننده</th>
            <th>تاریخ ثبت</th>
            <th>تاریخ خروج</th>
            <th>نوع خودرو</th>
            <th>چاپ برگه خروج</th>
            <th>شماره برگه خروج</th>
        </tr>
        </thead>

        <tbody>
        <tr <?php
        if ($data["due_date"]!=null){
            echo " class='green'";
        }else{
            echo " class='dark'";
        }
        ?>>
            <td><?=$data['company_name']?></td>
            <!--                    <td dir="ltr">--><?//=$data['contract_number']; ?><!--</td>-->
            <td><?php  echo $data['license_plate']; ?></td>
            <td><?php  echo $data['cargo']; ?></td>
            <td><?php  echo $data['driver_name']; ?></td>
            <td dir="ltr">
                <?php
                $issueDate= $data["issue_date"];
                $issueDate= str_replace('-' , '/' , "$issueDate" );
                echo $issueDate;
                ?>
            </td>
            <td dir="ltr">
                <?php
                $dueDate= $data["due_date"];
                $dueDate= str_replace('-' , '/' , "$dueDate" );
                echo $dueDate;
                ?>
            </td>
            <td><?php  echo $data['car_type']; ?></td>
            <td>
                <button name="showPermit" type="button" data-toggle="modal" data-target="#showPermit" onclick="testPermit(
                        '<?=$data['exit_permit_hash']; ?>',
                        '<?=$data["license_plate"] ?>',
                        '<?=$data["driver_name"] ?>',
                        '<?
                $issueDate= $data["issue_date"];
                $issueDate= str_replace('-' , '/' , "$issueDate" );
                echo $issueDate;
                ?>',
                        '<?=$data["car_type"] ?>',
                        '<?=$data["cargo"] ?>',
                        '<?=$data['permit_rand']; ?>',
                        '<?=$data['company_name']; ?>',
                        )">
                    <img src="<?=baseUrl()?>/build/images/print.png" width="60%"  class="fa fa-print"  >
                    <input type="hidden" value="">
                </button>
            </td>
            <td ><?=$data['permit_rand']; ?></td>
        </tr>
        </tbody>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="<?=baseUrl()?>/vendors/jQuery.print-master/bower_components/jquery/dist/jquery.min.js"><\/script>')
    </script>
    <script src="<?=baseUrl()?>/vendors/jQuery.print-master/jQuery.print.js"></script>
    <script type="text/javascript">
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

        function testPermit(hash,plate,driver,date1,car,cargo,num1,company) {
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
                '<p dir= "rtl" style="position:absolute; top:310px;right:400px; color: #151515; font-weight: bold;font-family: "B Koodak";  ">'+company+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:160px;right:95px; margin: 0px;  ">'+
                '<img  src= "https://chart.googleapis.com/chart?chld=H|0&chs=120x120&cht=qr&chl='+hash+'&choe=UTF-8%22%20title=%22Link%20to%20Google.com">'
                +'</p>'+

                '<p style="position: absolute;top: 175px ;right: -20px; color: #151515; transform: rotate(-90deg); font-weight: bold; font-size: 15pt; font-family: "B Koodak"">'+
                '<?php echo jdate(f)."-".jdate(Y ); ?>'+
                '</p>'+
                '<p dir= "ltr" style="position:absolute; top:55px;right:610px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">:شماره</p>'+
                '<p dir= "ltr" style="position:absolute; top:55px;right:700px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";">'+num1+'</p>'+
                '<p dir= "ltr" style="position:absolute; top:100px;right:670px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+date1+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:140px;right:700px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+car+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:185px;right:690px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+plate+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:230px;right:700px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+driver+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:270px;right:700px; color: #151515; font-weight:bold; font-size:9pt; font-family: "B Koodak";  ">'+cargo+'</p>'+
                '<p dir= "rtl" style="position:absolute; top:315px;right:700px; color: #151515; font-weight:bold; font-size:7pt; font-family: "B Koodak";  ">'+company+'</p>'+
                '</div>'+
                '</div>';

        }
    </script>
    <script>

        $(document).on('keypress',function(e) {
            if(e.which == 13) {
                $('a[name = btn-insert]').click();
            }
        });

    </script>
    <div id="insert">

    <a class="btn btn-danger" onclick="window.location.href='/asr/fl/<?=$data["exit_permit_hash"]?>'"     name="btn-insert" id="btn-insert"  >ثبت تردد</a>
    <a class="btn btn-primary" href="/asr/fl">جستجوی مجدد</a>
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="showPermit"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">برگه خروج شماره:</h5>
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

    <hr>

    <div class="clearfix"></div>
<? } if(isset($data['past'])){?>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>گزارش تردد قبلی
                        <small> در این قسمت گزارشی از تردد های قبلی این پلاک را مشاهده می فرمایید</small>
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

                    <table id="datatable" data-order='[[ 5, "dsc" ]]' data-page-length='10'  class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>نام مشترک</th>
                            <!--                <th>شماره قرارداد</th>-->
                            <th>شماره پلاک</th>
                            <th>نوع بار</th>
                            <th>نام راننده</th>
                            <th>تاریخ ثبت</th>
                            <th>تاریخ خروج</th>
                            <th>نوع خودرو</th>
                            <th>گیت خروج</th>
                            <th>شماره برگه خروج</th>
                        </tr>
                        </thead>

                        <tbody>
                        <? foreach ($data['past'] as $records){
//        dump($records);
                            ?>
                            <tr <?php

                            if ($records["permit_rand"]!=0){
                                echo " class='green'";
                            }else{
                                echo " class='dark'";
                            }
                            ?>>
                                <td><?=$records['company_name']?></td>
                                <!--                    <td dir="ltr">--><?//=$data['contract_number']; ?><!--</td>-->
                                <td><?php  echo $records['license_platte']; ?></td>
                                <td><?php  echo $records['cargo']; ?></td>
                                <td><?php  echo $records['driver_name']; ?></td>
                                <td dir="ltr">
                                    <?php
                                    $issueDate= $records["issue_date"];
                                    $issueDate= str_replace('-' , '/' , "$issueDate" );
                                    echo $issueDate;
                                    ?>
                                </td>
                                <td dir="ltr">
                                    <?php
                                    $dueDate= $records["exite_date"];
                                    $dueDate= str_replace('-' , '/' , "$dueDate" );
                                    echo $dueDate;
                                    ?>
                                </td>
                                <td><?=$records['car_type']; ?></td>
                                <td><?=$records['channel']; ?></td>
                                <td ><? if($records['permit_rand']==0){
                                        echo "<span class=' alert-danger'>بدون مجوز</span>";}else{
                                        echo $records['permit_rand'];
                                    }; ?></td>
                            </tr>
                        <?}?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>


    <?
}
?>





