<?php
?>
<div style="height: 100px"></div>
<div class="row">
    <div class="col-md-offset-3 col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">

                <h2>تغییر رمز عبور
                    <!--                    <small>زیر عنوان</small>-->
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"> <i class="fa fa-chevron-up"> </i> </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"> <i class="fa fa-wrench"> </i> </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">تنظیمات 1</a>
                            </li>
                            <li><a href="#">تنظیمات 2</a>
                            </li>
                        </ul>
                    </li>
                    <li><a class="close-link"> <i class="fa fa-close"> </i> </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div id="alerts"></div>

                <span class="alert-danger" style="margin: auto auto"><?php
                    if (isset($message)){
                        echo $message;}
                    ?>
  </span>
            </div>

            <p>رمز عبور باید حاوی حداقل 8 کارکتر و شامل حرف کوچک و بزرگ لاتین، یک حرف خاص، عدد و همچنین فاقد space باشد
                <!--                          <code>صفحه کمکی</code> را نگاه کنید <a-->
                <!--                            href="form.html">راهنما</a>-->
            </p>
            <br>

            <form method="post" name="form-change-pass"  action="/user/pass_reset_asemanet/<?=$data['token']?>" class="form-horizontal form-label-left col-md-8 col-xs-6">

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-2 col-xs-12 text-muted h5 " for="password">رمزعبور <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input data-validate-length="8,15" maxlength="15" minlength="8"  type="password" required="required" class="form-control col-md-5 col-xs-12"  placeholder=""  id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"><br>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-2 col-xs-12 text-muted h5" for="confirm_password">تکرار رمزعبور <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" required="required" maxlength="15" minlength="8" class="form-control col-md-5 col-xs-12" placeholder="" id="confirm_password" name="confirm_password" data-validate-linked="password"><br>
                    </div>
                    <br>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <input type="submit"  name="btn-reset-pass" class="btn btn-success " value="<?=_btn_reset?>">
                        <a href="<?=baseUrl()?>/login" class="btn btn-default">انصراف</a>
                    </div>
                </div>
            </form>


            <div dir="rtl" class="col-md-4 col-xs-6">   <ul id="message" class="list-group" style="display: none	;">
                    <li class="list-group-item list-group-item-success">انتخاب رمز عبور</li>
                    <li class="list-group-item"> <span id="capital" class="glyphicon glyphicon-remove" aria-hidden="true"> </span> لطفا از حروف انگلیسی بزرگ در رمز خود استفاده نمایید</li>
                    <li class="list-group-item"> <span id="letter"  class="glyphicon glyphicon-remove" aria-hidden="true"> </span>  حروف انگلیسی را برای رمز انتخاب نمایید </li>
                    <li class="list-group-item"> <span id="special" class="glyphicon glyphicon-remove" aria-hidden="true"> </span> لطفا در کلمه عبور خوداز کارکترهای خاص ( !,@,#,$,% ,& ,*,_ ) استفاده نمایید </li>
                    <li class="list-group-item"> <span id="number"  class="glyphicon glyphicon-remove" aria-hidden="true"> </span> ترکیبی از اعدد استفاده کنید</li>
                    <li class="list-group-item"> <span id="length"  class="glyphicon glyphicon-remove" aria-hidden="true"> </span> طول کلمه عبور شما از 8 کارکتر کوچکتر است</li>
                </ul>
            </div>

        </div>
    </div>




    <script>
        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");
        var special = document.getElementById("special");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if(myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("glyphicon-remove");
                letter.classList.remove("red");
                letter.classList.add("glyphicon-ok");
                letter.classList.add("green");
            } else {
                letter.classList.remove("glyphicon-ok");
                letter.classList.remove("green");
                letter.classList.add("glyphicon-remove");
                letter.classList.add("red");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if(myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("glyphicon-remove");
                capital.classList.remove("red");
                capital.classList.add("glyphicon-ok");
                capital.classList.add("green");
            } else {
                capital.classList.remove("glyphicon-ok");
                capital.classList.remove("green");
                capital.classList.add("glyphicon-remove");
                capital.classList.add("red");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if(myInput.value.match(numbers)) {
                number.classList.remove("glyphicon-remove");
                number.classList.remove("red");
                number.classList.add("glyphicon-ok");
                number.classList.add("green");
            } else {
                number.classList.remove("glyphicon-ok");
                number.classList.remove("green");
                number.classList.add("glyphicon-remove");
                number.classList.add("red");
            }


            // Validate length
            if(myInput.value.length >= 8) {
                length.classList.remove("glyphicon-remove");
                length.classList.remove("red");
                length.classList.add("glyphicon-ok");
                length.classList.add("green");
            } else {
                length.classList.remove("glyphicon-ok");
                length.classList.remove("green");
                length.classList.add("glyphicon-remove");
                length.classList.add("red");
            }

            var special_char = new RegExp("[!/\'^£$%&*()}{@#~?><>,|=_+¬-\]");
            if(myInput.value.match(special_char)) {
                special.classList.remove("glyphicon-remove");
                special.classList.remove("red");
                special.classList.add("glyphicon-ok");
                special.classList.add("green");
            } else {
                special.classList.remove("glyphicon-ok");
                special.classList.remove("green");
                special.classList.add("glyphicon-remove");
                special.classList.add("red");
            }
        };

    </script>
    <!-- validator -->
