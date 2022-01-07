<?php
$now = time(); // Checking the time now when home page starts.
//echo $_SESSION['expire'];
if ($now > $_SESSION['expire']) {
    session_destroy();
    header("location:../user/login");
    exit();
}
sessionUp(60);

?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?=baseUrl()?>/build/images/favicon.png" type="image/ico"/>
    <title> شرکت خدماتی شهرک صنعتی شمس آباد | پنل کاربری </title>

    <!-- Bootstrap -->
    <link href="<?=baseUrl()?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=baseUrl()?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=baseUrl()?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?=baseUrl()?>/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?=baseUrl()?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?=baseUrl()?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- aseman css -->
    <link href="<?=baseUrl()?>/build/css/aseman.css" rel="stylesheet">

    <link href="<?=baseUrl()?>/vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/cropper/dist/cropper.min.css" rel="stylesheet">

    <script src="<?=baseUrl()?>/vendors/jquery/dist/jquery.min.js"></script>


    <!-- bootstrap-wysiwyg -->
    <link href="<?=baseUrl()?>/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?=baseUrl()?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?=baseUrl()?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?=baseUrl()?>/vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?=baseUrl()?>/build/css/custom.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="<?=baseUrl()?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- persianDataPicker -->
    <link rel="stylesheet" href="<?=baseUrl()?>/vendors/PersianDateTimePicker/Content/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.css" />

</head>
<!-- /header content -->
<body  class="nav-md ">

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col hidden-print">
            <div class="left_col scroll-view">
                <div class="navbar nav_title">
                    <a href="/asr/admin" class="site_title"  > شرکت خدماتی شهرک صنعتی شمس آباد</a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?=baseUrl()?>/build/images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>خوش آمدید,</span>
                        <h2>
                            <?php echo  $_SESSION['name'] ?>
                        </h2>
                        <span>
                            <?php echo $_SESSION['job']; ?>
                        </span>
                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>پنل مدیریت شهرک صنعتی</h3>
                        <ul class="nav side-menu">
                            <li><a href="/asr/admin"><i class="fa fa-home"></i> خانه <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <!--                                    <li><a href="/profile/company">داشبورد</a></li>-->
                                </ul>
                            </li>
                            <li><a><i class="fa fa-bank"></i>  مالی <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/asr/invoiceCatalog">گزارش صورت حساب </a></li>
                                    <li><a>قبوض پرداختی از بانک<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                        <li><a href="/asr/importBillingPayed">ثبت  قبوض پرداختی از بانک </a></li>
                                        <li><a href="/asr/catalogPayedBank">گزارش  قبوض پرداختی از بانک </a></li>
                                        </ul>
                                    </li>
                                    <li><a>شارژ<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                        <li><a href="/asr/StarterChargeDebit">بدهی شارژ اول دوره </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li><a><i class="fa fa-tint"></i>  آبرسانی <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <!--                                    <li><a href="/">کنتور خوانی </a></li>-->
                                    <li><a href="/asr/wsd">صدور قبض</a></li>
                                    <li><a href="/asr/counter_reader">کنتور خوانی </a></li>
                                    <li><a href="/asr/importWsCounter">کنتور خوانی اکسل </a></li>
                                    <li><a>گزارش<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="/asr/wsdReports">گزارش قبض</a></li>
                                            <li><a href="/asr/catalogCounter">گزارش کنتور خوانی</a>
                                        </ul>

                                    </li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-truck"></i> کنترل تردد <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/asr/permitCheck">تردد کل خطوط</a></li>
                                    <li><a href="/asr/permitCheckR">تردد راست</a></li>
                                    <li><a href="/asr/permitCheckL">تردد چپ</a></li>
                                    <li><a href="/asr/fl">ثبت دستی برگه خروج</a></li>

                                    <li><a>گزارش<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="/asr/catalogPermit/1">گزارش برگه خروج</a>
                                            <li><a href="/asr/catalog">گزارش برگه خروج پیشرفته</a>
                                            <li><a href="/asr/catalogTraffic">گزارش تردد</a></li>
                                        </ul>

                                    </li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-plus-square"></i> مشترکین <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/asr/users">لیست مشترکین</a></li>
                                    <li><a href="/asr/register">ثبت مشترک جدید</a></li>
                                    <li><a href="/asr/changeUserPass">بازیابی رمز عبور مشترک</a></li>
                                    <li><a href="/asr/lastLogin"> لاگین</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-comments"> </i> پشتیبانی <span class="fa fa-chevron-down"> </span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/support/tickets">نمایش تیکت </a></li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-bell-o"></i> اطلاعیه ها <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <!--                                    <li><a href="tables.html">جداول</a></li>-->
                                    <!--                                    <li><a href="tables_dynamic.html">جدول پویا</a></li>-->
                                </ul>
                            </li>
                            <li><a><i class="fa fa-envelope-o"></i> ایمیل<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav menu_fixed">
                                </ul>
                            </li>              </li>
                            <li><a><i class="fa fa-sitemap"></i> درخواست ها <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                </ul>
                            </li>

                            </li>
                            <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> شرکت در انتخابات <span
                                            class="label label-success pull-left">به زودی</span></a></li>
                        </ul>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="تنظیمات">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="تمام صفحه" onclick="toggleFullScreen();">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="خروج" href="/user/logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav hidden-print">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <span class="col-md-offset-1 ">

                        </span>

                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="<?=baseUrl()?>/build/images/img.jpg" alt=""><?php echo $_SESSION['name']   ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <!--                                <li><a href="--><?//=baseUrl()?><!--/profile/company"> نمایه</a></li>-->
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>تنظیمات</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">کمک</a></li>
                                <li><a href="/user/logout"><i class="fa fa-sign-out pull-right"></i> خروج</a></li>
                            </ul>
                        </li>
                        <span class="col-xs-offset-1">
                        </span>
                        <div  id="notify-count"> </div>


                        <!--                <li>-->
                        <!--                    <div class="info-number user-profile dropdown-toggle pull-left"  style="padding-top: 20px; padding-left: 20px" >-->
                        <!--                        <span dir="ltr" style="padding-left: 20px" id="demo-time"></span>-->
                        <!--                        <span style="padding-right: 0px">-->
                        <!--                        <span dir="rtl" class="">آدرس IP :</span>-->
                        <!--                        <span></span>-->
                        <!--                        <span dir="ltr" class="" >--><?//=$_SERVER['REMOTE_ADDR']?><!--</span>-->
                        <!--                            </span>-->
                        <!--                        <script>-->
                        <!--                            var myVar = setInterval(myTimer, 1000);-->
                        <!---->
                        <!--                            function myTimer() {-->
                        <!--                                var d = new Date();-->
                        <!--                                document.getElementById("demo-time").innerHTML = d.toLocaleTimeString();-->
                        <!--                            }-->
                        <!--                        </script>-->
                        <!--                    </div>-->
                        <!--                        </li>-->
                    </ul>

                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- /header content -->

        <!-- page content -->
        <div class="container body">
            <body class="main_container">
            <div class="right_col" role="main">
                <?php
                if ($_SESSION['roleId'] == 1822) {
                    if(preg_match('/admin/', $_SERVER['REQUEST_URI'])) {
                        include('mvc/view/asr/tile-stats-count/guard.php');
     }
                }else{
                    ?>
                    <div class="row tile_count hidden-print">
                        <a href="">
                            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                                <span class="count_top"><i class="fa fa-user"></i>تعداد برگه خروج:</span>
                                <div class="count" style="color: #4cae4c">
                                    <? if (!isset($_SESSION['qtyPermit'])) echo "0"; else {
                                        echo $_SESSION['qtyPermit'] . " " . 'عدد';
                                    } ?>
                                </div>
                                <span class="count_bottom"><i class="green">0% </i> از ماه گذشته</span>
                            </div>
                        </a>
                        <a  class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" href="">
                            <div>
                                <span class="count_top"><i class="fa fa-clock-o"></i>بدهی آب</span>
                                <div class="count">   <div class="count"><?
                                        if (isset($_SESSION['sum_totality'])){
                                            echo number_format($_SESSION['sum_totality']);
                                        }else{
                                            echo 0;
                                        }
                                        ?></div></div>
                                <span class="count_bottom"><i class="green"><i
                                                class="fa fa-sort-asc"></i>0% </i> از هفته گذشته</span>
                            </div>
                        </a>
                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i>بدهی شارژ</span>
                            <div class="count green">0</div>
                            <span class="count_bottom"><i class="green"><i
                                            class="fa fa-sort-asc"></i>0% </i> از هفته گذشته</span>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> تعداد درخواست های فعال</span>
                            <div class="count">0</div>
                            <span class="count_bottom"><i class="red"><i
                                            class="fa fa-sort-desc"></i>0% </i> از هفته گذشته</span>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> مجموعه بدهی </span>
                            <div class="count">0</div>
                            <span class="count_bottom"><i class="green"><i
                                            class="fa fa-sort-asc"></i>0% </i> از هفته گذشته</span>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i> زمان آخرین ورود شما</span>
                            <div dir="ltr" class="count" style="font-size: 120%" >
                                <?php
                                $lastSeen= $_SESSION['lastseen'];
                                $lastSeen = str_replace('-' , '/' , "$lastSeen" );
                                echo $lastSeen;
                                ?>
                            </div>
                            <span class="count_bottom"><i class="green"><i
                                            class="fa fa-sort-asc"></i>0% </i> در ماه جاری</span>
                        </div>
                    </div>
                <?}?>

                <?=$content?>
            </div>

                <!--    <div class="container body">-->
                <div class="clearfix"></div>
                <br>
                <div id="lock_screen">
                    <table>
                        <tr>
                            <td>
                                <div class="clock"></div>
                                <span class="unlock">
                      <span class="fa-stack fa-5x">
                        <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                        <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                      </span>
                  </span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<footer class="hidden-print;  footer " style=" background-color: rgb(81,89,91); height: 110px;">
    <div class="container">
        <div class=" col-md-6 col-lg-6 col-xs-12">
            <div class="pull-right" style="color: aliceblue">
                پنل کاربری شهرک صنعتی شمس آباد <a style="color: aliceblue" href="http://www.asemanet.com" target="_blank">Asemanet</a> | طراحی شده توسط <a style="color: aliceblue"
                                                                                                                                                           href="http://www.asemanet.com" target="_blank">فرهاد آقاساقلو</a>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 ">
            <ul class="social-network social-circle ">
                <li>
                    <a  class="icoFacebook" title="آسمان رایانه سوشیانت" href="http://www.asemanet.com" target="_blank"><i class="fa fa-external-link"></i></a>
                </li>
                <li>
                    <a  class="icoFacebook" title="تلگرام" href="https://t.me/Farhadags" target="_blank"><i class="fa fa-telegram"></i></a>
                </li>
                <li>
                    <a  class="icoFacebook" title="whatsapp" href="https://wa.me/989124061318" target="_blank"><i class="fa fa-whatsapp"></i></a>
                </li>
                <li>
                    <a  class="icoFacebook" title="linkedin" href="https://www.linkedin.com/public-profile/settings?trk=d_flagship3_profile_self_view_public_profile" target="_blank"><i class="fa fa-linkedin"></i></a>
                </li>

            </ul>

        </div>
    </div>

</footer>

</body>


</html>


<!-- jQuery -->
<script src="<?=baseUrl()?>/vendors/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?=baseUrl()?>/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=baseUrl()?>/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?=baseUrl()?>/vendors/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="<?=baseUrl()?>/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="<?=baseUrl()?>/vendors/iCheck/icheck.min.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?=baseUrl()?>/vendors/moment/min/moment.min.js"></script>

<script src="<?=baseUrl()?>/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- bootstrap-wysiwyg -->
<script src="<?=baseUrl()?>/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="<?=baseUrl()?>/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="<?=baseUrl()?>/vendors/google-code-prettify/src/prettify.js"></script>
<!-- jQuery Tags Input -->
<script src="<?=baseUrl()?>/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- Switchery -->
<script src="<?=baseUrl()?>/vendors/switchery/dist/switchery.min.js"></script>
<!-- Select2 -->
<script src="<?=baseUrl()?>/vendors/select2/dist/js/select2.full.min.js"></script>
<!-- Parsley -->
<script src="<?=baseUrl()?>/vendors/parsleyjs/dist/parsley.min.js"></script>
<script src="<?=baseUrl()?>/vendors/parsleyjs/dist/i18n/fa.js"></script>
<!-- Autosize -->
<script src="<?=baseUrl()?>/vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->
<script src="<?=baseUrl()?>/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
<!-- starrr -->
<script src="<?=baseUrl()?>/vendors/starrr/dist/starrr.js"></script>

<!-- Custom Theme Scripts -->
<script src="<?=baseUrl()?>/build/js/custom.min.js"></script>
<!-- jquery.inputmask -->
<script src="<?=baseUrl()?>/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
<script src="<?=baseUrl()?>/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

<!-- Datatables -->
<script src="<?=baseUrl()?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=baseUrl()?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=baseUrl()?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=baseUrl()?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?=baseUrl()?>/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?=baseUrl()?>/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?=baseUrl()?>/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?=baseUrl()?>/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?=baseUrl()?>/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?=baseUrl()?>/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=baseUrl()?>/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?=baseUrl()?>/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?=baseUrl()?>/vendors/jszip/dist/jszip.min.js"></script>
<script src="<?=baseUrl()?>/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?=baseUrl()?>/vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- persianDataPicker -->
<!--<script src="--><?//=baseUrl()?><!--/vendors/PersianDateTimePicker/jquery.md.bootstrap.datetimepicker.js" type="text/javascript"></script>-->
<script src="<?=baseUrl()?>/vendors/PersianDateTimePicker/Scripts/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.js" type="text/javascript"></script>
<script src="<?=baseUrl()?>/vendors/PersianDateTimePicker/Scripts/MdBootstrapPersianDateTimePicker/jalaali.js" type="text/javascript"></script>

<!-- js aseman -->
<script src="<?=baseUrl()?>/js/aseman.js" type="text/javascript"></script>
<script src="<?=baseUrl()?>/js/aseman.js" type="teincxt/javascript"></script>

<!-- ECharts -->
<script src="<?=baseUrl()?>/vendors/echarts/dist/echarts.min.js"></script>
<script src="<?=baseUrl()?>/vendors/echarts/map/js/world.js"></script>
<!-- chart canvasjs -->
<script src="<?=baseUrl()?>/vendors/canvasjs-2.3.2/canvasjs.min.js"></script>

<!-- bootbox code -->
<script src="<?=baseUrl()?>/vendors/bootbox/bootbox.min.js"></script>
<script src="<?=baseUrl()?>/vendors/bootbox/bootbox.locales.min.js"></script>

<script>
    $(document).ready(function(){
        $("#notify-count").load("/support/notify");
        setInterval(function(){
            $("#notify-count").load('/support/notify')
        }, 60000);
    });
</script>