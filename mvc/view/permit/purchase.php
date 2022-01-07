
<div class="row">

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>خرید برگه خروج
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
        <?
          if (!isset($_POST['btnnext'])) {
          ?>
          <div  class="form_wizard wizard_horizontal">
            <ul class="wizard_steps anchor">
              <li>
                <a href="#step-1" class="selected" isdone="0" rel="1">
                  <span class="step_no">1</span>
                  <span class="step_descr">
                                              قدم اول<br>
                                              <small>درخواست خرید</small>
                                          </span>
                </a>
              </li>
              <li>
                <a href="#step-2" class="disabled" isdone="0" rel="2">
                  <span class="step_no">2</span>
                  <span class="step_descr">
                                              قدم دوم<br>
                                              <small>انتخاب درگاه پرداخت بانکی</small>
                                          </span>
                </a>
              </li>
              <li>
                <a href="#step-3" class="disabled" isdone="0" rel="3">
                  <span class="step_no">3</span>
                  <span class="step_descr">
                                              قدم سوم<br>
                                              <small>تایید پرداخت</small>
                                          </span>
                </a>
              </li>
              <li>
                <a href="#step-4" class="disabled" isdone="0" rel="4">
                  <span class="step_no">4</span>
                  <span class="step_descr">
                                              قدم چهارم<br>
                                              <small>چاپ فاکتور خرید</small>
                                          </span>
                </a>
              </li>

            </ul>
          </div>
            <div class="x_content">


        <form data-parsley-validate  method="post" action="/permit/purchase"  class="form-horizontal form-label-left">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">شماره قرارداد
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="first-name" required="required"
                     class="form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo $data['contract_number']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">نام واحد صنعتی
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="last-name" name="last-name" required="required"
                     class="form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo $data['company_name']; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">تعداد برگه خروج<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="number" min="4"
                     name="qty" required="required">
                <br>
                <span style="color:rgb(38, 185, 154)" >حداقل تعداد خرید 4 عدد می باشد</span>
            </div>
          </div>
          <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12"> قیمت واحد</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text"
                     name="middle-name" readonly="readonly" value="3000 ریال">
            </div>
            <br>
            <br>
                          <input type="submit" class=" btn btn-success" name="btnnext"  value="بعدی">
            </div>

        </form>

        <?php }elseif (isset($_POST['btnnext'])){
            $qty=$_POST['qty'];
            ?>
          <div  class="form_wizard wizard_horizontal">
          <ul class="wizard_steps anchor">
              <li>
                <a href="#step-1" class="done" isdone="1" rel="1">
                  <span class="step_no">1</span>
                  <span class="step_descr">
                                              قدم اول<br>
                                              <small>درخواست خرید</small>
                                          </span>
                </a>
              </li>
              <li>
                <a href="#step-2" class="selected" isdone="1" rel="2">
                  <span class="step_no">2</span>
                  <span class="step_descr">
                                              قدم دوم<br>
                                              <small>انتخاب درگاه پرداخت بانکی</small>
                                          </span>
                </a>
              </li>
              <li>
                <a href="#step-3" class="disabled" isdone="0" rel="3">
                  <span class="step_no">3</span>
                  <span class="step_descr">
                                              قدم سوم<br>
                                              <small>تایید پرداخت</small>
                                          </span>
                </a>
              </li>
              <li>
                <a href="#step-4" class="disabled" isdone="0" rel="4">
                  <span class="step_no">4</span>
                  <span class="step_descr">
                                              قدم چهارم<br>
                                              <small>چاپ فاکتور خرید</small>
                                          </span>
                </a>
              </li>

            </ul>
          </div>
          <form action="/permit/purchase" method="post" class="form-horizontal form-label-left">
            <?php
            $qty=$_POST['qty'];
            $buy= $qty*'3000';
            $vat= $buy*9;
            $vat= $vat/100;
            $kol= $buy+$vat;
            ?>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">مبلغ کل </label>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text"
                       name="sum" readonly="readonly"  value="<?php
                echo number_format($buy)." "."ریال";      ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">جمع مالیات و عوارض </label>

              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text"
                       name="sum" readonly="readonly"  value="<?php
                echo number_format($vat)." "."ریال";      ?>">
              </div>
            </div>

            <div class="form-group">
            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">مبلغ قابل پرداخت </label>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text"
                     name="sum" readonly="readonly"  value="<?php
              echo number_format($kol)." "."ریال";      ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="dargah" class="control-label col-md-3 col-sm-3 col-xs-12">انتخاب درگاه</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select name="gateway" id="" class="form-control col-md-7 col-xs-12" style="width:150px;">
                  <option  value="iranKish">درگاه بانک تجارت</option>
                  <option disabled value="AsanPardakht">آسان پرداخت</option>
                  <!--                  <option value="zarinPal">زرین</option>-->
              </select>
            </div>
            <hr>
            <br>
            <input type="hidden" name="qty" value="<? echo $qty?>">
            <a class="btn btn-primary co-md-2" href="<? echo baseUrl().'/permit/purchase';    ?>">بازگشت</a>
            <input type="submit"  class="btn btn-success co-md-2" name="purchase"  value="خرید">
          </form>
          </div> <?php }  ?>

          </div>

    </div>
    <!-- End SmartWizard Content -->

  </div>
</div>





