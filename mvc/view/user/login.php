<?php
?>

<style>
    .dropbtn {
        /*margin-right: 20px;*/
        background-color: rgba(255, 255, 255, 0.0);
        padding: 15px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        margin-right: 5px;
        padding: 2px;
        display: none;
        position: fixed;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    .p-3 {
        padding: 10px !important;
    }
    .dropdown-content a:hover {background-color: #ddd;}
    .dropdown:hover .dropdown-content {display: block;}
    /*.dropdown:hover .dropbtn {background-color: #3e8e41;}*/
</style>
<nav class="navbar navbar-default navbar-fixed-top hidden-sm hidden-xs " style="background-color: rgba(255, 255, 255, 0.88)">
    <div class="container" >

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav  justify-content-center">
                <li>
                    <div class="dropdown">
                        <button style="color: #4CAF50;;" class="dropbtn"><i class="fa fa-plus-circle fa-lg"></i> ثبت نام در سامانه </button>
                        <div class="dropdown-content alignright">
                            <h5 style="color: #15587e">پنل کاربری مخصوص صنعتگران مستقر در شهرک صنعتی شمس آباد می باشد</h5>
                            <h5 style="color: #15587e">جهت دریافت نام کاربری و رمز عبور به شرکت خدماتی شهرک مراجعه فرمایید</h5>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button style=" background-color: rgba(255, 255, 255, 0.0);"  class="text-muted dropbtn">خدمات ما</button >
                        <div class="dropdown-content alignright" style="width: 400px" >
                            <br>
                            <h5 class="text-justify" style="color: #15587e">1-جهت دریافت نام کاربری و رمز عبور به شرکت خدماتی شهرک صنعتی شمس آباد مراجعه فرمایید.</h5>
                            <h5 class="text-justify" style="color: #15587e">2-پس از ورود به پنل می توانید نسبت به خرید برگه خروج به تعداد لازم اقدام  و مجوز خروج  را صادر فرمایید.</h5>
                            <hr>
                            <span class="h5"> خدمات زیر به صنعتگران گرامی  در شهرک صنعتی شمس آباد ارائه می گردد:</span>
                            <br>
                            <ul>
                                <li>
                                    <b> برگه خروج:</b>
                                </li>
                                <span>  خرید برگه خروج،</span>
                                <span> ثبت برگه خروج، </span>
                                <span> گزارش برگه خروج</span>
                                <li><b>پرداخت هزینه های مشترک شامل:</b></li>
                                <span> قبض آب ، قبوض هزینه های مشترک و قبوض هزینه های بازسازی و نوسازی</span>
                                <li><b>ارتباط با واحد های مدیریت شهرک از طریق تیکت</b> </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown">
                        <button style=" background-color: rgba(255, 255, 255, 0.0);"  class="text-muted dropbtn">درباره ما</button >
                        <div class="dropdown-content alignright" style="width: 400px" >
                            <span>
                                <p class="text-justify" style="padding: 5px">
                                    شرکت خدماتی شهرک صنعتی شمس آباد با هدف توسعه روز افزون خدمات و سرویس های جانبی و تکیه بر اصل احترام به صنعتگران گرامی ، همواره در طول فعالیت خود تلاش داشته تا با ارائه خدمات نوین و امکانات جدید ، بیش از پیش رضایت صنعتگران خود را فراهم نماید.لذا جهت سهولت هرچه بیشتر و صرفه جویی در زمان صنعتگران گرامی، از این پس ارائه کلیه خدمات این مجموعه به شرح ذیل از طریق پنل کاربری شرکت خدماتی شهرک صنعتی شمس آباد صورت می پذیرد
                                </p>
                            </span>
                            <div class="separator"></div>
                            <h5 class="text-info p-3"> تماس با ما:</h5>
                            <div class="col-sm-12">
                                <div class=" col-md-12">
                                    <ul class="list-unstyled">
                                        <li><i class="glyphicon glyphicon-home"></i> آدرس:  کیلومتر 35 اتوبان تهران - قم، شهرک صنعتی شمس آباد، نبش بلوار گلستان، ساختمان فن آوری</li>
                                        <br>
                                        <li> <i class="fa fa-location-arrow"></i> کد پستی:1834185391 </li>
                                        <br>
                                        <li><i class="fa fa-phone"></i> تلفن: 56230800-021</li>
                                        <br>
                                        <li><i class="glyphicon glyphicon-envelope"></i> ایمیل: info@shamsabad.org </li>
                                    </ul>
                                </div>
                            </div>


                        </div>

                    </div>
                </li>
            </ul>

        </div><!--/.nav-collapse -->
    </div>
</nav>
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <a class="hiddenanchor" id="reset"></a>
    <a class="hiddenanchor" id="in"></a>
    <br class="hidden-xs">
    <br class="hidden-xs">
    <div class=" login_wrapper">

        <div class="animate form login_form aseman-login-large aseman-login-small ">
            <div>
                <img  src="<?=baseUrl()?>/build/images/logo.png">
            </div>
            <section class=" login_content" >
                <?php
                $browser= new Browser();
                br();
                if ($browser->isRobot()==true){
                    exit();
                }
                //            echo $browser->getVersion();
                if ($browser->getBrowser()=='Internet Explorer'){
                    echo "<span style='font-size: 12pt' class='text-danger bg-info shadow-lg p-3 mb-5 rounded fa fa-warning' >"."لطفاً مرورگر خود را به <a href='https://www.google.com/intl/fa/chrome/' target=_blank'>کروم</a> یا <a href='https://www.mozilla.org/fa/firefox/new/' target=_blank'>موزیلا</a> تغییر دهید!!!"."</span>";
                }elseif ($browser->getBrowser() == Browser::BROWSER_FIREFOX && $browser->getVersion() < 79 ){
                    echo "<a style='font-size: 12pt;' class='text-danger bg-info shadow-lg p-3 mb-5 rounded fa fa-warning' href='https://www.mozilla.org/fa/firefox/new/' target=_blank'>"."<span>"."مرورگر".br().$browser->getBrowser().br(). "شما نیاز به آپدیت دارد!!!"."</span>"."</a>";
                }elseif ($browser->getBrowser() == Browser::BROWSER_CHROME && $browser->getVersion() < 84 ){
                    echo "<a style='font-size: 12pt' class='text-danger bg-info shadow-lg p-3 mb-5 rounded fa fa-warning' href='https://www.google.com/intl/fa/chrome/' target=_blank'>"."<span class='h4 '>"."مرورگر".br().$browser->getBrowser().br(). "شما نیاز به آپدیت دارد!!!"."</span>"."</a>";
                }
                ?>

                <form action="/login" method="post">

                    <!--          <h1>ورود به پنل کاربری</h1>-->

                    <div>
                        <input type="text" class="form-control" placeholder="نام کاربری"  name="username" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="رمز ورود" name="password" />
                        <button type="submit"  class="btn btn-success btn-block" style="font-size: medium; background-color: rgba(38,185,154,.7)" >ورود</button>
                        <br class="hidden-xs">
                        <a class="reset_pass" style="color: #15587e" href="#reset">رمز عبورتان را فراموش کرده اید؟</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div class="clearfix">
                            <div class="hidden-lg hidden-md">
                                <h4 style="color: #15587e">*جهت دریافت نام کاربری و رمز عبور به ساختمان فناوری شهرک مراجعه فرمایید*</h4>
                            </div>

                        </div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <div style="color: #15587e">
                                <br/>
                                پنل کاربری شهرک صنعتی شمس آباد <a style="color:#15587e " href="http://www.asemanet.com">Asemanet</a><br>
                                طراحی شده توسط <a style="color:#15587e " href="http://www.asemanet.com">فرهاد آقاساقلو</a>
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </div>
        <div id="rest_pass" class="animate form rest_pass_form" >

            <form action="/login" class="login_form" method="post"  style="background-color: rgba(255, 255, 255,.9)">
                <h1>بازیابی رمز عبور</h1>
                <br>
                <br>
                <br>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="contract" placeholder="شماره قرارداد" />
                    <div class="form-control-feedback">
                        <i class="fa fa-user text-muted"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="ایمیل" />
                    <div class="form-control-feedback">
                        <i class="fa fa-envelope-o text-muted"></i>
                    </div>
                </div>
                <button type="submit" name="btn_forget" class="btn btn-default btn-block">بازیابی رمز عبور </button>
                <div class="clearfix"></div>
                <hr>
                <a href="#signin"  >  بازگشت به صفحه ورود </a>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <hr>

                <div class="separator">
                    <div class="clearfix"></div>
                    <br/>
                    پنل کاربری شهرک صنعتی شمس آباد <a style="color: " href="http://www.asemanet.com">Asemanet</a><br>
                    طراحی شده توسط <a style="color: " href="http://www.asemanet.com">فرهاد آقاساقلو</a>
                </div>

            </form>
            <!-- Password recovery -->
            <!-- /password recovery -->

        </div>

    </div>
</div>

