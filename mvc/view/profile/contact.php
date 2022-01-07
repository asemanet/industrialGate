
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>فرم 1
                    <!--                    <small>زیر عنوان</small>-->
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
                <div id="alerts"></div>


                <p>برای دست یابی به امکانات بعدی نیازمند ثبت مشخصات اولیه می باشید: لطفا اطلاعات فرم زیر را تکمیل و ثبت فرمایید.
                    <!--                          <code>صفحه کمکی</code> را نگاه کنید <a-->
                    <!--                            href="form.html">راهنما</a>-->
                </p>
                <br>
                <span class="section">مشخصات  قرارداد</span>
                <form  name="form-1" method="post" action="<?php
                $user_id_masir=$_SESSION["user_id"];
                //    $masir= 'update.php?id='.$user_id_masir;
                $masir= baseUrl().'/profile/contact';
                echo htmlspecialchars($masir);
                ?>"  class="form-horizontal form-label-left" data-parsley-validate="">


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">شماره قرارداد
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input
                                    data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" readonly="readonly" name="contract_number" value="<?php echo $data['contract_number']; ?>">
                            <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">قرارداد بنام
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="contract_name" class="form-control col-md-7 col-xs-12" readonly="readonly"
                                   placeholder=""  type="text" name="contract_name" value="<?php echo $data['contract_name']; ?>" ">
                            <span class="fa fa-industry form-control-feedback left" aria-hidden="true"></span>
                            <div  class="error"></div>
                        </div>
                    </div>
                    <span class="section">اطلاعات واحد صنعتی فعال</span>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                            نوع شخص<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="btn-group">
                                <label class="btn btn-default" data-toggle-class="btn-primary"
                                       data-toggle-passive-class="btn-default">
                                    <input type="radio" name="noe_shakhs"  value="1" <?php if ($data['noe_shakhs']==1){
                                        echo "checked"." ".'"noe_shakhsiat(1)"' ;} ?> onclick="noe_shakhsiat(1)">  حقیقی
                                </label>
                                <label class="btn btn-default" data-toggle-class="btn-primary"
                                       data-toggle-passive-class="btn-default">
                                    <input type="radio" name="noe_shakhs" value="0" <?php if ($data['noe_shakhs']==0){
                                        echo "checked"." ".'"noe_shakhsiat(0)"' ;} ?> onclick="noe_shakhsiat(0)"> حقوقی
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نام واحد صنعتی<span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="company_name" class="form-control col-md-7 col-xs-12"
                                   placeholder="" required="required" type="text" name="company_name" value="<?php echo $data['company_name']; ?>" onblur="CheckEmpty();">
                            <span class="fa fa-industry form-control-feedback left" aria-hidden="true"></span>
                            <div id="company-error" class="error"></div>
                        </div>
                    </div>

                    <div id="shakhs">
                        <?php if ($data['noe_shakhs']==0){
                            echo '<div class="item form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">شناسه ملی<span class="required">*</span>
         </label>
         <div class="col-md-6 col-sm-6 col-xs-12">
           <input required="required" class="form-control col-md-7 col-xs-12"  name="national_number" value="'; echo $data['national_number'];
                            echo ' ">
           <span class="fa fa-id-card form-control-feedback left" aria-hidden="true"></span>
         </div>
       </div>
       <div class="item form-group">
         <label class="control-label col-md-3 col-sm-3 col-xs-12">کد اقتصادی<span class="required">*</span>
         </label>
         <div class="col-md-6 col-sm-6 col-xs-12">
           <input required="required" class="form-control col-md-7 col-xs-12"  name="economic_code" value="'; echo $data['economic_code'];
                            echo ' ">
           <span class="fa fa-id-card form-control-feedback left" aria-hidden="true"></span>
         </div>
       </div>';}?>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">متراژ (متر)
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="occupation"
                                   data-validate-length-range="5,20"
                                   class="optional form-control col-md-7 col-xs-12"  name="area" readonly="readonly" value="<?php echo $data['area']; ?>">
                            <span class="fa fa-flag form-control-feedback left" aria-hidden="true"></span>
                            <span class="form-control">در صورتی که متراژ وارد شده صحیح نمی باشد، جهت اصلاح به واحد مالی مراجعه فرمایید.</span>
                        </div>
                    </div>
                    <br>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نوع فعالیت<span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="company_name" class="form-control col-md-7 col-xs-12"
                                   placeholder="مثال: ریخته گری، مصنوعات سنگی، صنایع فلزی" required="required" type="text" name="activity" value="<?php echo $data['activity']; ?>" onblur="CheckEmpty();">
                            <span class="fa fa-briefcase form-control-feedback left" aria-hidden="true"></span>
                            <div id="company-error" class="error"></div>
                        </div>
                    </div>
                    <span class="section">اطلاعات تماس</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">ایمیل <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input <? if ($data['verify_email']==1){echo "readonly=\"readonly\""." "."value=".$data['email'];}?>  type="email"   required="required"
                                                                                                                                  class="form-control col-md-7 col-xs-12" name="email" value="<?php echo $data['email']; ?>"><?php
                            if ($data['verify_email']==1){echo "<a class='btn btn-primary' href='".fullbaseUrl()."/profile/verifyEmail'>تغییر ایمیل </a>";}
                            ?>
                            <span class="fa fa-envelope form-control-feedback left"
                                  aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">آدرس سایت
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input   name="website"
                                     placeholder="www.website.com" class="form-control col-md-7 col-xs-12" value="<?php echo $data['website']; ?>">
                            <span class="fa fa-external-link form-control-feedback left"  aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">آدرس
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
          <textarea  id="occupation" type="text"
                     data-validate-length-range="5,20"
                     class="optional form-control col-md-7 col-xs-12"  name="address" value="<?php echo "تهران شهر ری حسن آباد شهرک صنعتی شمس آباد" ?>" required ><?php echo $data['address']; ?></textarea>
                            <span class="form-control">نمونه: تهران شهر ری حسن آباد شهرک صنعتی شمس آباد بلوار بهارستان...</span>
                            <br><br><br>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">کدپستی
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="occupation"
                                   data-validate-length-range="10"
                                   class="optional form-control col-md-7 col-xs-12"  name="postal_code" required value="<?php echo $data['postal_code']; ?>">
                            <span class="fa fa-address-card form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">شماره قطعه
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="occupation" type="text"
                                   data-validate-length-range="5,20"
                                   class="optional form-control col-md-7 col-xs-12"  name="piece_number" value="<?php echo $data['piece_number']; ?>">
                            <span class="fa fa-address-card form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">تلفن 1 <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="tel"   required="required" data-inputmask="'mask' : ' 99999999'"
                                   data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" name="tele1" value="<?php echo $data['tele1']; ?>">
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">تلفن 2
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="tel"
                                   data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" name="tele2" data-inputmask="'mask' : ' 99999999'" value="<?php echo $data['tele2']; ?>">
                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">فکس
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="tel"
                                   data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" name="fax" value="<?php echo $data['fax']; ?>">
                            <span class="fa fa-fax form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <span class="section">اطلاعات مدیریت</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نام مدیرعامل<span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12"
                                   data-validate-length-range="6" data-validate-words="2"
                                   placeholder="" required="required" type="text"  name="manager_name" value="<?php echo $data['manager_name']; ?>">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نام خانوادگی مدیرعامل<span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12"
                                   data-validate-length-range="6" data-validate-words="2"
                                   placeholder="" required="required" type="text"  name="manager_lastname" value="<?php echo $data['manager_lastname']; ?>">
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >کد ملی مدیر عامل <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input   required="required"
                                     class="form-control col-md-7 col-xs-12" type="tel" minlength="10" maxlength="10"  name="manager_codemeli" value="<?php echo $data['manager_codemeli']; ?>">
                            <span class="fa fa-id-badge form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >شماره شناسنامه <span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input  required="required"
                                    class="form-control col-md-7 col-xs-12" type="tel"  maxlength="10"  name="manager_shenasname" value="<?php echo $data['manager_shenasname']; ?>">
                            <span class="fa fa-id-badge form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">تلفن همراه<span
                                    class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="tel"   required="required"
                                   data-validate-length-range="8,20" class="rtl form-control col-md-7 col-xs-12" name="manager_mobile" minlength="11" maxlength="11"
                                   value="<?php echo $data['manager_mobile']; ?>"
                                   placeholder="نیازمند ثبت شماره موبایل معتبر جهت دسترسی به نسخه همراه می باشید مثال: 09121111111">
                            <span class="fa fa-mobile form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">آدرس منزل
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" name="manager_home" ><?php echo $data['manager_home']; ?></textarea>
                            <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                            <input  type="submit" class="btn btn-success" name="btn"  value="ارسال">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php //include "footer.php"; ?>


<script>
    function noe_shakhsiat(x) {
        if (x==0)
            document.getElementById("shakhs").innerHTML="<div class=\"item form-group\">\n" +
                "         <label class=\"control-label col-md-3 col-sm-3 col-xs-12\" >شناسه ملی<span\n" +
                "             class=\"required\">*</span>\n" +
                "         </label>\n" +
                "         <div class=\"col-md-6 col-sm-6 col-xs-12\">\n" +
                "           <input\n" +
                "              required=\"required\" class=\"form-control col-md-7 col-xs-12\"  data-inputmask=\"'mask' : '99999999999'\"\n" +
                "                    name=\"national_number\" value=\"<?php echo $data['national_number']; ?>\">\n" +
                "           <span class=\"fa fa-id-card form-control-feedback left\" aria-hidden=\"true\"></span>\n" +
                "         </div>\n" +
                "       </div>\n" +
                "       <div class=\"item form-group\">\n" +
                "         <label class=\"control-label col-md-3 col-sm-3 col-xs-12\" >کد اقتصادی<span\n" +
                "             class=\"required\">*</span>\n" +
                "         </label>\n" +
                "         <div class=\"col-md-6 col-sm-6 col-xs-12\">\n" +
                "           <input\n" +
                "             required=\"required\"       class=\"form-control col-md-7 col-xs-12\"  data-inputmask=\"'mask' : '999999999999'\" name=\"economic_code\" value=\"<?php echo $data['economic_code']; ?>\">\n" +
                "           <span class=\"fa fa-id-card form-control-feedback left\" aria-hidden=\"true\"></span>\n" +
                "         </div>\n" +
                "       </div>";

        else
            document.getElementById("shakhs").innerHTML="";
    }
</script>






<!--<script src="vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>-->





