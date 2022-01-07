<script src="<?=baseUrl()?>/vendors/jquery/dist/jquery.min.js"></script>


<?php if (isset($data['exitPermitHash'])){
//    dump($data);
  ?>

<!--  <div class="col-md-6 col-sm-6 col-xs-12" id="PermitPrint" >-->
<!--    <p class="hidden-print avoid-this" style="color: #444444">لطفا در صورت نیاز برگه خروج را چاب بفرمایید</p>-->
<!---->
<!--    <div class=" hidden-print avoid-this">-->
<!--      <button class="btn btn-default print-link avoid-this float-left">-->
<!--        <i class="fa fa-print"></i> چاپ-->
<!--      </button>-->
<!--      <button class="btn btn-primary avoid-this"><i class="fa fa-download"></i> ایجاد PDF-->
<!--      </button>-->
<!--    </div>-->
<!--    <div class="clearfix"></div>-->
<!---->
<!--    <div style="size: A4; position: absolute;"  id="">-->
<!--      <img src="--><?//=baseUrl()?><!--/build/images/permit.png" class="img-rounded">-->
<!--        <p dir= "rtl" style="position: absolute;bottom: 330px;left: 590px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt">شماره:</p>-->
<!--        <p dir= "rtl" style="position: absolute;bottom: 330px;left: 355px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> --><?// echo $data['permitRand'];   ?><!--</p>-->
<!--      <p dir= "ltr" style="position: absolute;bottom: 285px;left: 350px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> --><?// echo $data['issueDate'];   ?><!--</p>-->
<!--      <p dir= "rtl" style="position: absolute;bottom: 240px;left: 350px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> --><?// echo $data['carType'];   ?><!--</p>-->
<!--      <p dir= "rtl" style="position: absolute;bottom: 193px;left: 350px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> --><?// echo $data['licensePlate'];   ?><!--</p>-->
<!--      <p dir= "rtl" style="position: absolute;bottom: 145px;left: 350px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> --><?// echo $data['driverName'];   ?><!--</p>-->
<!--      <p dir= "rtl" style="position: absolute;bottom: 100px;left: 350px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> --><?// echo $data['cargo'];   ?><!--</p>-->
<!--      <p dir= "rtl" style="position: absolute;bottom: 53px ;left: 350px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt"> --><?// echo $_SESSION['company_name'];   ?><!--</p>-->
<!--      <p style="position: absolute;bottom: 190px ;left: 840px; color: #151515; transform: rotate(-90deg); font-weight: bold; font-size: 20pt; font-family: 'B Koodak'">-->
<!--        --><?php
//        echo jdate('f')."-".jdate('Y' );
//        ?>
<!--      </p>-->
<!--        <p dir= "rtl" style="position:absolute; top:180px;right:100px; margin: 0px;  ">-->
<!--            '<img  src= "https://chart.googleapis.com/chart?chld=H|0&chs=120x120&cht=qr&chl='--><?//=$data['exitPermitHash']?><!--'&choe=UTF-8%22%20title=%22Link%20to%20Google.com">-->
<!--            </p>-->
<!--      <!--      <p style="position: absolute;bottom: 53px ;left: 600px; color: #151515; opacity:0.2;">-->-->
<!--      <!--        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http%3A%2F%2Fwww.google.com%2F&choe=UTF-8" title="Link to -->--><?php ////echo $data['exitPermitHash']; ?><!--<!--" />-->-->
<!--      <!--      </p>-->-->
<!--        <p dir= "rtl" style="position: absolute;bottom: 330px;left: 220px; color: #151515; font-weight: bold;font-family: 'B Koodak'; font-size: 12pt">شماره:</p>-->
<!--        <p style="position: absolute;bottom: 330px;left: 70px; color: #151515; font-weight: bold;font-family: 'B Koodak'"> --><?// echo $data['permitRand'];   ?><!--</p>-->
<!--      <p dir="ltr" style="position: absolute;bottom: 285px;left: 70px; color: #151515; font-weight: bold;font-family: 'B Koodak'"> --><?// echo $data['issueDate'];   ?><!--</p>-->
<!--      <p style="position: absolute;bottom: 240px;left: 70px; color: #151515; font-weight: bold;font-family: 'B Koodak'"> --><?// echo $data['carType'];   ?><!--</p>-->
<!--      <p style="position: absolute;bottom: 193px;left: 70px; color: #151515; font-weight: bold;font-family: 'B Koodak' text-align: right"> --><?// echo $data['licensePlate'];   ?><!--</p>-->
<!--      <p style="position: absolute;bottom: 145px;left: 70px; color: #151515; font-weight: bold;font-family: 'B Koodak' direction: rtl"> --><?// echo $data['driverName'];   ?><!--</p>-->
<!--      <p style="position: absolute;bottom: 100px;left: 70px; color: #151515; font-weight: bold;font-family: 'B Koodak'"> --><?// echo $data['cargo'];   ?><!--</p>-->
<!--      <p style="position: absolute;bottom: 53px ;left: 70px; color: #151515;                   font-family: 'B Koodak'"> --><?// echo $_SESSION['company_name'];   ?><!--</p>-->
<!--    </div>-->
<!--  </div>-->

      <script> if ( window.history.replaceState ) { window.history.replaceState( null, null, window.location.href ); } </script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="<?=baseUrl()?>/vendors/jQuery.print-master/bower_components/jquery/dist/jquery.min.js"><\/script>')
  </script>
  <script src="<?=baseUrl()?>/vendors/jQuery.print-master/jQuery.print.js"></script>
  <script type='text/javascript'>
    //<![CDATA[
    jQuery(function($) { 'use strict';
      $("#PermitPrint").find('button').on('click', function() {
        //Print ele4 with custom options
        $("#PermitPrint").print({
          //Use Global styles
          globalStyles : false,
          //Add link with attrbute media=print
          mediaPrint : true,
          //Custom stylesheet
          stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
          //Print in a hidden iframe
          iframe : false,
          //Don't print this
          noPrintSelector : ".avoid-this",
          //Add this at top
          prepend : "",
          //Add this on bottom
          append : "<span><br/>شرکت خدماتی شهرک صنعتی شمس آباد</span>",
          //Log to console when printing is done via a deffered callback
          deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
        });
      });
    });
  </script>

  <?php
}else{
?>
<?// echo date("Y-m-d H:i:s");?>
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

</script>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>ثبت پلاک خروج
                        <small>برگه خروج ثبت شده تا 24 ساعت اعتبار دارد و اگر خودرو حامل بار در این مدت مبادرت به خروج نکند، برگه خروج باطل می گردد.</small>
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

        <form data-parsley-validate method="post" action="/permit/issue"  class="form-horizontal form-label-left" name="license">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract-number">شماره قرارداد
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" required="required"
                     class="form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo
              $data['contract_number'];
              ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="company-name">نام واحد صنعتی
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text"  required="required"
                     class="form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo $data['company_name']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label  class="control-label col-md-3 col-sm-3 col-xs-12">شماره پلاک</label>
            <div class="plaque col-md-9 col-sm-9 col-xs-12">
              <input class="inputs" tabindex="3"  id="PLAQUE_PART4" required="required"  maxlength="2" minlength="2" name="ir"  placeholder=""   type="tel" onKeyup="autotab(this, document.license.cargo)" >
              <input  tabindex="2" id="PLAQUE_PART3" required="required"  maxlength="3" minlength="3" name="threeDigit"   type="tel" onKeyup="autotab(this, document.license.ir)">
              <select tabindex="1"   type="text" required="required"  id="PLAQUE_PART2"   name="letter"   >
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
              <input autofocus class="inputs" tabindex="0"  required="required" id="PLAQUE_PART1"  maxlength="2" minlength="2" name="twoDigit"    type="tel" onKeyup="autotab(this, document.license.PLAQUE_PART2)">
            </div>
          </div>
          <hr>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract-number">نوع بار
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select type="select" tabindex="4" required="required" class="form-control col-md-7 col-xs-12" name="cargo">
                <option value="" disabled selected>انتخاب کنید</option>
                <option onclick="autotab1(this, document.license.driver_name)">مواد شیمیایی</option>
                <option onclick="autotab1(this, document.license.driver_name)">مواد فلزی</option>
                <option onclick="autotab1(this, document.license.driver_name)">مواد غذایی</option>
                <option onclick="autotab1(this, document.license.driver_name)">انواع سنگ</option>
                <option onclick="autotab1(this, document.license.driver_name)">مواد معدنی</option>
                <option onclick="autotab1(this, document.license.driver_name)">مواد سلولوزی</option>
                <option onclick="autotab1(this, document.license.driver_name)">انواع مایعات</option>
                <option onclick="autotab1(this, document.license.driver_name)">مصنوعات چوبی</option>
                <option onclick="autotab1(this, document.license.driver_name)">محصولات الکترونیکی</option>
                <option onclick="autotab1(this, document.license.driver_name)">انواع پلاستیک</option>
                <option onclick="autotab1(this, document.license.driver_name)">شیشه و کریستال</option>
                <option onclick="autotab1(this, document.license.driver_name)">ضایعات</option>
                <option onclick="autotab1(this, document.license.driver_name)">ماشین آلات</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract-number">نام راننده<span
                class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="driver_name" tabindex="5" type="text" minlength="5"  name="driver_name" required="required"
                     class="form-control col-md-7 col-xs-12" pattern="/^[\u0600-\u06FF\s]+$/" onblur="CheckEmpty();">
              <span class="fa fa-industry form-control-feedback left" aria-hidden="true"></span>
              <div id="driver-error" class="error"></div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contract-number">نوع خودرو
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select type="select" tabindex="6"  name="car_type"  class="form-control col-md-7 col-xs-12" required="required">
                <option value="" disabled selected>انتخاب کنید</option>
                <option>وانت</option>
                <option>کامیونت</option>
                <option>سواری</option>
                <option>تریلی</option>
                <option>کامیون تانکر</option>
                <option>کامیون کمپرسی</option>
                <option>کامیون یخچال‌دار</option>
                <option>کامیون مسقف</option>
                <option>خاور</option>
                <option>کشنده</option>
              </select>
            </div>
          </div>

          <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
            <input type="submit" name="issue" class="btn btn-success" value="ثبت">
            <button type="reset" class="btn btn-primary">انصراف</button>
          </div>
        </form>

      </div>
<!---->
    </div>


    <!-- End SmartWizard Content -->

  </div>





  <?php
  }
  ?>
    <script>

            $(function () {
                $('[id*=PLAQUE_PART4]').keyup(function (e) {
                    var ctrlKey = 67, vKey = 86;
                    if (e.keyCode != ctrlKey && e.keyCode != vKey) {
                        $('[id*=PLAQUE_PART4]').val(persianToEnglish($(this).val()));
                    }
                });
            });
            $(function () {
                $('[id*=PLAQUE_PART3]').keyup(function (e) {
                    var ctrlKey = 67, vKey = 86;
                    if (e.keyCode != ctrlKey && e.keyCode != vKey) {
                        $('[id*=PLAQUE_PART3]').val(persianToEnglish($(this).val()));
                    }
                });
            });
            $(function () {
                $('[id*=PLAQUE_PART1]').keyup(function (e) {
                    var ctrlKey = 67, vKey = 86;
                    if (e.keyCode != ctrlKey && e.keyCode != vKey) {
                        $('[id*=PLAQUE_PART1]').val(persianToEnglish($(this).val()));
                    }
                });
            });
        function persianToEnglish(input) {
            var inputstring = input;
            var persian = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];
            var english = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"];
            for (var i = 0; i < 10; i++) {
                var regex = new RegExp(persian[i], 'g');
                inputstring = inputstring.toString().replace(regex, english[i]);
            }
            return inputstring;
        }



    </script>


<script>
    $(document).ready(function(){
        init_PNotify()
    });
    function init_PNotify() {

        if (typeof (PNotify) === 'undefined') {
            return;
        }
        console.log('init_PNotify');

        new PNotify({
            title: 'اطلاعات مهم',
            text:
            '<div class="ui-pnotify-text"> '+
            '<p dir="rtl">  لطفا در وارد نمودن پلاک دقت فرمایید، کنترل برگه خروج الکترونیکی از طریق دوربین های پلاک خوان انجام می گردد.</p>' +
                '<br>'+
            '<p dir="rtl"> لطفا به راننده تاکید فرمایید جهت خروج در گیت انتظامات از  مسیرهای کندرو (که مجهز به دوربین پلاک خوان می باشد)  تردد نماید.</p>' +
            '<br>'+
            '<p dir="rtl"> برگه خروج ثبت شده تا 24 ساعت اعتبار دارد و اگر خودرو حامل بار در این مدت مبادرت به خروج نکند، برگه خروج باطل می گردد.  </p>'+
            '<div>'
            ,
            type: 'info',
            hide: true,
            styling: 'bootstrap3'


        });
    };




    </script>
<!--    <script src="--><?//=baseUrl()?><!--/vendors/pnotify/dist/pnotify.js"></script>-->
<!--    <script src="--><?//=baseUrl()?><!--/vendors/pnotify/dist/pnotify.buttons.js"></script>-->
<!--    <script src="--><?//=baseUrl()?><!--/vendors/pnotify/dist/pnotify.nonblock.js"></script>-->









