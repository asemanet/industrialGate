<?
$now = time(); // Checking the time now when home page starts.

if ($now > $_SESSION['expire']) {
    session_destroy();
    header("location:". fullbaseUrl() ."/login");
    exit();
}
sessionUp(15);
$remainingTime= $_SESSION['expire'] - $now;
$remainingTime= gmdate("i:s" ,$remainingTime);
//echo $remainingTime;

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
    <!-- Custom Theme Style -->
    <link href="<?=baseUrl()?>/build/css/custom.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?=baseUrl()?>/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- aseman css -->
    <link href="<?=baseUrl()?>/build/css/aseman.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="<?=baseUrl()?>/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <script src="<?=baseUrl()?>/vendors/jquery/dist/jquery.min.js"></script>


    <link href="<?=baseUrl()?>/vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/cropper/dist/cropper.min.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?=baseUrl()?>/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?=baseUrl()?>/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?=baseUrl()?>/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?=baseUrl()?>/vendors/starrr/dist/starrr.css" rel="stylesheet">


    <!-- Datatables -->
    <link href="<?=baseUrl()?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?=baseUrl()?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- persianDataPicker -->
    <link rel="stylesheet" href="<?=baseUrl()?>/vendors/PersianDateTimePicker/Content/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.css" />



    <link rel="apple-touch-icon" sizes="180x180" href="<?=baseUrl()?>/build/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=baseUrl()?>/build/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=baseUrl()?>/build/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?=baseUrl()?>/build/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?=baseUrl()?>/build/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="theme-color" content="#ffffff">

<style>
    .timer-wrapper {
        /*font-weight: bold;*/
        border-radius: 50px;
        font-size: 9pt;
        margin-top: -1px;
        margin-bottom: -15px;
        padding-top: 10px;
        height: 25px;
        background-color: #e4f7e4;
        border: 1px solid #c6d8c6;
        color: #3c763d;
        text-align: center;
        max-width: 160px;
        line-height: 0;
        display: block;
    }
</style>

</head>

<!-- /header content -->
<body  class="nav-md ">
<div class="container body">

    <div class="main_container" >

        <div class="col-md-3 left_col hidden-print">

            <div class="left_col scroll-view">
                <div class="navbar nav_title">
                    <a href="<?=baseUrl()?>/profile/company" class="site_title"  > شرکت خدماتی شهرک صنعتی شمس آباد</a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="<?=baseUrl()?>/build/images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>خوش آمدید,</span>
                        <h2> <?php
                            echo $_SESSION['company_name'];
                            ?></h2>
                    </div>

                </div>

                <!-- /menu profile quick info -->

                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>عمومی</h3>
                        <ul class="nav side-menu">
                            <li><a href="/profile/company"><i class="fa fa-home"></i> خانه <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <!--                                    <li><a href="/profile/company">داشبورد</a></li>-->
                                </ul>
                            </li>
                            <li><a><i class="fa fa-truck"></i> برگه خروج <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/permit/purchase">خرید </a></li>
                                    <li><a href="/permit/issue">ثبت پلاک</a></li>
                                    <li><a href="/permit/catalog">گزارش تردد</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-bank"></i> امور مالی <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/financial/invoice/1">نمایش فاکتور </a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-credit-card"></i> پرداخت قبض <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/bill/water/1">قبض آب</a></li>
                                    <li><a href="/profile/company">قبض هزینه های مشترک</a></li>
                                    <!--                                    <li><a href="/profile/company">قبض جریمه</a></li>-->
                                </ul>
                            </li>
                            <li><a><i class="fa fa-comments"></i> پشتیبانی <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/support/tickets">نمایش تیکت </a></li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-truck"></i> سایر مجوزها <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/profile/company">برگه دپو با مجوز </a></li>
                                    <li><a href="/profile/company">برگ دپو بدون مجوز</a></li>
                                    <li><a href="/profile/company">مجوز ورود مصالح</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-sitemap"> </i> ارتباط با ما<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav menu_fixed">
                                    <li><a href="/support/about" style="color: aliceblue">درباره ما</a></li>
                                    <li><a href="/support/contact" style="color: aliceblue">تماس باما</a></li>
                                    <li><a href="/support/tickets" style="color: aliceblue">فرم ثبت انتقاد یا شکایات</a></li>
<!--                                    <li><a href="home.php" style="color: aliceblue">نقشه سایت</a></li>-->
                                </ul>
                            </li>
                            <li><a><i class="fa fa-sitemap"> </i> درخواست ها <span class="fa fa-chevron-down"> </span></a>
                                <ul class="nav child_menu">
                                    <li><a href="/profile/company">در خواست حفاری</a></li>
                                </ul>
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
                        <span class="col-md-offset-1  ">

                        <?
                        $browser= new Browser();
                        if ($browser->getBrowser()=='Internet Explorer'){
                            echo "<blink class=\"fa fa-warning\"></blink><span style='font-size: 12pt' class='text-danger  shadow-lg p-3 mb-5 rounded' >"."لطفاً مرورگر خود را به <a href='https://www.google.com/intl/fa/chrome/' target=_blank'>کروم</a> یا <a href='https://www.mozilla.org/fa/firefox/new/' target=_blank'>موزیلا</a> تغییر دهید!!!"."</span>";
                        }elseif ($browser->getBrowser() == Browser::BROWSER_FIREFOX && $browser->getVersion() < 79 ){
                            echo "<a style='font-size: 12pt;' class='text-danger  shadow-lg p-3 mb-5 rounded' href='https://www.mozilla.org/fa/firefox/new/' target=_blank'>"."<span>"."مرورگر".br().$browser->getBrowser().br(). "شما نیاز به آپدیت دارد!!!"."</span>"."</a>";
                        }elseif ($browser->getBrowser() == Browser::BROWSER_CHROME && $browser->getVersion() < 84 ){
                            echo "<a style='font-size: 12pt' class='text-danger  shadow-lg p-3 mb-5 rounded' href='https://www.google.com/intl/fa/chrome/' target=_blank'>"."<span class='h4 '>"."مرورگر".br().$browser->getBrowser().br(). "شما نیاز به آپدیت دارد!!!"."</span>"."</a>";
                        }
                        ?>


                        </span>
                        <li class="">

                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="<?=baseUrl()?>/build/images/img.jpg" alt=""><?php echo $_SESSION['company_name'];   ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="<?=baseUrl()?>/profile/company"> نمایه</a></li>
                                <li>
                                    <a href="javascript:">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>تنظیمات</span>
                                    </a>
                                </li>
                                <li><a href="javascript:;">کمک</a></li>
                                <li><a href="/user/logout"><i class="fa fa-sign-out pull-right"></i> خروج</a></li>
                            </ul>
                        </li>

                        <span class="col-xs-offset-1"> &nbsp;
                        </span>
                        <div  id="notify-count" ></div>

                    </ul>

                </nav>
            </div>
        </div>
        <!-- /top navigation -->
        <!-- /header content -->

        <!-- page content -->
        <div class="container body">
            <div class="right_col" role="main" >
                <div class="row tile_count hidden-print">
                    <a href="<?=baseUrl()?>/permit/issue">
                        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                            <span class="count_top"><i class="fa fa-user"></i>تعداد برگه خروج:</span>
                            <div class="count green" ><? echo $_SESSION['qtyPermit']." ". 'عدد'  ?></div>
                            <span class="count_bottom"><i class="green">0% </i> از ماه گذشته</span>
                        </div>
                    </a>
                    <a  class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" href="<?=baseUrl()?>/bill/water/1">
                        <div>
                            <span class="count_top"><i class="fa fa-clock-o"></i>بدهی آب</span>
                            <div class="count">  <div class="count"> <?
                                    if (isset($_SESSION['sum_totality'])){
                                        echo "<span class='count green'>".number_format($_SESSION['sum_totality'])."</span>";
                                    }else{
                                        echo 0;
                                    }
                                    ?></div></div>
                            <span class="count_bottom"><i class="green"><i
                                        class="fa fa-sort-asc"></i>0% </i> در 3 ماه گذشته</span>
                        </div>
                    </a>
                    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i>بدهی شارژ</span>
                        <div class="count ">0</div>
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
                                    class="fa fa-sort-asc"></i>0% </i>در ماه جاری</span>
                    </div>


<!--                    <div class="col-md-12 col-xs-12 ">-->
<!--                        <div  class="left timer-wrapper">-->
<!--                            <span>زمان باقی مانده:</span>-->
<!--                            <span  class=" countdown"> </span>-->
<!--                        </div>-->
<!--                        <span class="h4">پنل کاربری شهرک صنعتی شمس آباد</span>-->
<!--                    </div>-->
                </div>
                <?=$content?>

                <!--    <div class="container body">-->

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
<!--<div id="banner"><a href="http://asemanet.com/" title="آسمان نت"> </a></div>-->

<footer class="hidden-print;  footer c-footer " style=" background-color: #e7e7e7;">
    <div CLASS="c-footer__jumpup">
        <a onclick="topFunction()"style="font-family: 'B Yekan'; font-size: 14pt;"  class="c-footer__jumpup-container">
            <span style="margin-left: 2px" class="glyphicon glyphicon-menu-up"></span>
            <span   class="c-footer__jumpup-angle ">
                 برگشت به بالا
            </span>
        </a>
    </div>


    <div class="container">
        <div style="padding-right: -400px" class="col-xs-12 col-sm-12 col-md-7 col-lg-7 service-aseman">
            <a href="http://asemanet.com"  target="_blank">
                <!--                <img  class="view" src="--><?//=baseUrl()?><!--/build/images/asemanet1.jpg" width="120%"   >-->
                <div  class="service-header row">
                    <div class="col-md-3 col-sm-5 col-xs-12 ">
                        <blink>
                            <div class="service-item full-img" style="background: rgba(0, 0, 0, 0) none repeat ;">
                                <img src="<?=baseUrl()?>/build/images/Support-Color.svg">
                            </div>
                        </blink>

                        <h6 class="service-title">خدمات پشتیبانی شبکه</h6>
                    </div>

                    <div class="col-md-9 col-sm-7 col-xs-12">
                        <div class="service-motto">پشتیبانی تمام نیازهای IT شما در یک بسته جامع و مقرون به صرفه</div>
                        <div class="content-service no-margin"><p>به جای درگیر شدن با مشکلات فنی بر روی کسب و کار خود متمرکز بمانید.</p></div>
                    </div>

                </div>
            </a>
            <br>
            <p class="alert alert-secondary" style="text-align: justify;font-size: 12pt"> برخی از خدمات   <a class="" href="http://asemanet.com" target="_blank">شرکت آسمان رایانه سوشیانت</a>  <em> </em> در شهرک صنعتی شمس آباد:</p>
            <ul style="font-size: 8pt">
                <li class="text-justify">بررسی ساختار کلی <em>شبکه های کامپیوتری</em> و رفع ایرادات سخت افزاری و نرم افزاری موجود</li>
                <li class="text-justify">نصب و پیکربندی سوییچ‌ها و فایروال‌های <em>شبکه های کامپیوتری</em></li>
                <li class="text-justify">نصب و راه اندازی انواع سرورها</li>
                <li class="text-justify">راه اندازی سرویس مدیریت مصرف اینترنت در <em>شبکه کامپیوتری</em></li>
                <li class="text-justify">رفع مشکلاتی نظیر کندی و قطعی <em>شبکه های کامپیوتری</em></li>
                <li class="text-justify">رفع مشکلات پرینترها و سایر دستگاه‌های <em>شبکه های کامپیوتری</em></li>
                <li class="text-justify">رفع مشکلات روزمره کارکنان در زمینه کامپیوتر، اینترنت و شبکه اینترنت و شبکه</a></li>
                <li class="text-justify">بررسی وضعیت امنیت اطلاعات در سطح سازمان و بازبینی و پیاده سازی دسترسی‌ها به منابع</li>
                <li class="text-justify">نصب و راه اندازی سامانه های بکاپ گیری از اطلاعات شرکت‌ها با توجه به نوع دیتا</li>
            </ul>

            <div style="padding-right: 50px">
                <a class="btn btn-success" href="http://www.asemanet.com/%d8%a7%db%8c%d9%86%d8%aa%d8%b1%d9%86%d8%aa-%d9%85%d8%a8%db%8c%d9%86-%d9%86%d8%aa/" target="_blank">اینترنت</a>
                <a class="btn btn-success" href="http://www.asemanet.com/" target="_blank">پشتیبانی شبکه در شمس آباد</a>
                <button class="btn btn-dark" style="font-family: 'Vazir-FD'">5623 9130 -021 <span class="fa fa-phone"></span></button>
            </div>
        </div>

        <div class=" col-md-5 col-lg-5 col-xs-12 panel panel-default " style="font-family: IRANSans; background-color: #f1f1f1" >
            <br>
            <div class="panel-danger">
                <div class="">
                    <h3 class="text-center ">شرکت خدماتی شهرک صنعتی شمس آباد</h3>
                </div>
                <hr>

                <p>
                    پیام مدیر عامل شرکت خدماتی شهرک صنعتی شمس آباد:
                </p>
                <p  class="text-secondary text-justify">
                    ما برای موفقیت در پیشبرد اهداف مان ، به وفاق ، همدلی و همکاری تمامی شما صاحبان صنایع نیاز داریم و آماده ی هرگونه همکاری در زمینه ی هدف های مشترک مان هستیم . اینجا را خانه خود بدانید و ما را در شرکت خدماتی از دوستان خود . پیشنهاد های کارساز و انتقادهای به جای شما به یقین هدف هایمان را بیش از پیش هم سو میکند که به تجربه ثابت شده : هرگاه با هم بودن را تجربه کردیم ، موفقیت قرین راهمان بوده است .
                </p>

                <table class="table" style="font-family: Vazir-FD; font-size: 8pt">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">واحد</th>
                        <th scope="col">تلفن</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td> مالی:        </td>
                        <td>56230801-3</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>     آبرسانی: </td>
                        <td>56231544</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>     عمران و فنی: </td>
                        <td>56235048</td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td> آتش نشانی:</td>
                        <td>56232493</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td> درمانگاه:</td>
                        <td>56232492 , 56231734 </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>

    </div>

    <hr class="style1">
    <div class=" col-md-12 col-lg-12 col-xs-12">
        <div>
                     <span class="pull-right">
                    پنل کاربری شهرک صنعتی شمس آباد <a style="color:black " href="http://www.asemanet.com" target="_blank">Asemanet</a>
                    | طراحی شده توسط <a style="color:black " href="http://www.asemanet.com" target="_blank">فرهاد آقاساقلو</a>
                    </span>
        </div>
        <ul  class="social-network social-circle pull-left ">
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

    <!--    <iframe height="400" width="100%" src="http://asemanet.com"></iframe>-->

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

<!-- PNotify -->
<script src="<?=baseUrl()?>/vendors/pnotify/dist/pnotify.js"></script>
<script src="<?=baseUrl()?>/vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="<?=baseUrl()?>/vendors/pnotify/dist/pnotify.nonblock.js"></script>


<script>
    // چشمک زن
    function vmsblink(selector){
        $(selector).fadeOut(800, function(){
            $(this).fadeIn(1000, function(){
                vmsblink(this);
            });
        });
    }
    vmsblink('blink');
</script>

<!--  persianDataPicker-->
<!--<script src="--><?//=baseUrl()?><!--/vendors/PersianDateTimePicker/jquery.md.bootstrap.datetimepicker.js" type="text/javascript"></script>-->
<script src="<?=baseUrl()?>/vendors/PersianDateTimePicker/Scripts/MdBootstrapPersianDateTimePicker/jquery.Bootstrap-PersianDateTimePicker.js" type="text/javascript"></script>
<script src="<?=baseUrl()?>/vendors/PersianDateTimePicker/Scripts/MdBootstrapPersianDateTimePicker/jalaali.js" type="text/javascript"></script>

<!-- js aseman-->
<script src="<?=baseUrl()?>/js/aseman.js" type="text/javascript"></script>
<script>
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0
    }
</script>

<?php
if(preg_match('/changePass/', $_SERVER['REQUEST_URI']) OR preg_match('/resetpass/', $_SERVER['REQUEST_URI'])) {
    echo '<script type="text/javascript" src="' . baseUrl() . '/vendors/validator/validator.js"></script>';
} ?>

<script>
    $(document).ready(function(){
        $("#notify-count").load("/support/notify");
        setInterval(function(){
            $("#notify-count").load('/support/notify')
        }, 150000);
    });
</script>


<script>
    var timer2 = "<?=$remainingTime?>";
    var interval = setInterval(function() {


        var timer = timer2.split(':');
        //by parsing integer, I avoid all extra string processing
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 0) clearInterval(interval);
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        //minutes = (minutes < 10) ?  minutes : minutes;
        $('.countdown').html(minutes + ':' + seconds);
        timer2 = minutes + ':' + seconds;
    }, 1000);
</script>
