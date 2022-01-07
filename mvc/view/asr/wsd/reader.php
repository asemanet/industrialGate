<?php
//dump($_SESSION);
//var_dump($data);
if (!isset($data['lastCounter'])){
?>

<div class="col-md-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>کنتور خوانی
                <small>شماره فرارداد را جستجو فرمایید</small>
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
            <br/>
            <form class="form-horizontal form-label-left" method="post" action="<?= baseUrl() ?>/asr/counter_reader" class="form-horizontal form-label-left" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">شماره قرارداد:</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="number" name="gharardad" dir="ltr" class="form-control" value="415-" placeholder="شماره قرارداد">
                    </div>
                </div>
                <br>
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <input class="btn btn-primary" type="submit" name="btn-report" value="جستجو">
                </div>
            </form>
<?}else{
    $selected=$data['newCounter']['status'];

    ?>
            <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>کنتور خوانی
                            <small> </small>
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"> </i></a>
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
                            <li><a class="close-link"><i class="fa fa-close"> </i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br/>
                        <form class="form-horizontal form-label-left" method="post" action="<?= baseUrl() ?>/asr/counter_reader"  enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">شماره قرارداد:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="gharardad" dir="ltr" class="form-control" disabled value="<?=$data['lastCounter']['contract_number']?>" placeholder="شماره قرارداد">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">آدرس:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="" dir="rtl" class="form-control" disabled value="<?=$data['lastCounter']['address'].'___'.'تلفن:'.$data['lastCounter']['tele1'] ?>" placeholder="آدرس">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">قرارداد بنام:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="" dir="rtl" class="form-control" disabled value="<?=$data['lastCounter']['contract_name']?>" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">شرکت فعال:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="" dir="rtl" class="form-control" disabled value="<?=$data['lastCounter']['company_name']?>" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">قرائت پیشین:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="" dir="ltr" class="form-control" disabled value="<?=$data['lastCounter']['counter']?>" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">تاریخ قرائت پیشین:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input type="text" name="" dir="ltr" class="form-control" disabled value="<?=$data['lastCounter']['read_date']?>" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12 red">قرائت جدید:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <input style="font-size: 18pt; font-weight: bold; color: #1a3a95"  type="number" name="new_counter" dir="ltr" class="form-control"  value="<?=$data['newCounter']['counter']?>" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12 red ">وضعیت:</label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <select tabindex="1"   type="text" required="required"   name="status">
                                        <option <?php if($selected == '0'){echo("selected");}?> value="0" >عادی</option>
                                        <option <?php if($selected == '1'){echo("selected");}?> value="1" >دور کامل</option>
                                        <option <?php if($selected == '2'){echo("selected");}?> value="2" >کنتور خراب</option>
                                        <option <?php if($selected == '3'){echo("selected");}?> value="3" >قطع انشعاب</option>
                                        <option <?php if($selected == '4'){echo("selected");}?> value="4" >عدم دسترسی به کنتور</option>
                                        <option <?php if($selected == '5'){echo("selected");}?> value="5" >کنتور ناخوانا</option>
                                        <option <?php if($selected == '6'){echo("selected");}?> value="6" >عدم پاسخگویی مشترک</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" value="<?=$data['lastCounter']['user_id']?>" name="id">
                            <input type="hidden" value="<?=$data['lastCounter']['period_number']?>" name="last_period_id">
                            <input type="hidden" value="<?=$data['lastCounter']['period_name']?>" name="last_period_name">
                            <input type="hidden" value="<?=$data['lastCounter']['contract_number']?>" name="contract_number">
                            <input type="hidden" value="<?=$data['lastCounter']['counter']?>" name="last_counter">
                            <br>
                            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                <input class="btn btn-primary" type="submit" name="btn-insert" value="ثبت">
                                <a class="btn btn-default" href="<?=baseUrl()?>/asr/counter_reader"><i class="glyphicon glyphicon-arrow-left"> </i>بازگشت</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </br>
    </br>
    </br>



                        <div class="clearfix"></div>

            <?} ?>


