<?php
//if (!isset($_POST['btn-report'])){
//var_dump($data);



?>
<div class="col-md-6 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>گزارش
                <small>نوع گزارش را انتخاب و جستجو فرمایید</small>
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
            <br/>
            <form class="form-horizontal form-label-left" method="post" action="<?= baseUrl() ?>/asr/invoiceCatalog" class="form-horizontal form-label-left" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">شماره فاکتور:</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input dir="ltr" type="text" name="start" class="form-control"  placeholder=" از شماره">
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input dir="ltr" type="text" name="end" class="form-control"  placeholder=" تا شماره">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">شماره قرارداد:</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input dir="ltr" type="text" name="gharardad" class="form-control" value="415-" placeholder="شماره قرارداد">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">کد پیگیری</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="codePeygiry" class="form-control" placeholder="کد پیگیری:">
                    </div>
                </div>
                <div class="form-group">
                    <label style="margin-top: 15px" class="control-label col-md-3 col-sm-3 col-xs-12">ناریخ پرداخت:</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div id="date-traffic-1" class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click" data-targetselector="#fromDate1" data-groupid="group1" data-fromdate="true" data-enabletimepicker="false" data-placement="left">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <input type="text" name="start-date" dir="ltr" class="form-control" id="inputDate-traffic-1" placeholder="از تاریخ و ساعت" data-MdDateTimePicker="true" data-trigger="click" data-targetselector="#fromDate1" data-groupid="group1" data-fromdate="true" data-enabletimepicker="false" data-placement="right" />
                            </div>

                            <div class="input-group">
                                <div id="date-traffic-2" class="input-group-addon" data-MdDateTimePicker="true" data-trigger="click" data-targetselector="#toDate1" data-groupid="group1" data-todate="true" data-enabletimepicker="true" data-placement="left">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <input type="text" dir="ltr" name="end-date" class="form-control" id="inputDate-traffic-2" placeholder="تا تاریخ و ساعت" data-MdDateTimePicker="true" data-trigger="click" data-targetselector="#toDate1" data-groupid="group1" data-todate="true" data-enabletimepicker="true" data-placement="right" />
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                    <input class="btn btn-primary" type="submit" name="btn-report" value="جستجو">
                </div>
            </form>

        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>گزارش صورتحساب
                <small style="font-family: IRANSans" dir="rtl"><?
                    if (isset($data['catalog-type'])){
                       echo $data['catalog-type'];
                    }
                    ?></small>
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
            <?php
            //    }
//                dump($data);
            if (isset($data['eroor'])){
                echo "<span class='alert alert-danger'>برای جستجو شما اطلاعاتی وجود ندارد لطفا مقادیر ورودی را کنترل فرمایید</span>";

            }elseif (isset($_POST['btn-report'])){

            if (isset($data['sum-qty'])){
                ?>
                <form class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">تعداد برگه خروج خریداری شده:</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input dir="ltr" value="<?=$data['sum-qty'][0]["SUM(`qty`)"]?>">
                        </div>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">مجموع مبالغ خرید شده:</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input dir="ltr"  value="<?=number_format($data['sum-price'][0]["SUM(`totality`)"])?>">
                        </div>
                    </div>
                </form>


                <br>

            <?}?>
            <table id="datatable-buttons" data-order='[[ 2, "asc" ]]' data-page-length='50'  class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>شماره قرارداد</th>
                    <th>شماره فاکتور</th>
                    <th>تاریخ صدور</th>
                    <th>نام خریدار</th>
                    <th>مبلغ</th>
                    <th>تعداد</th>
                    <th>تاریخ پرداخت</th>
                    <th>نحوه پرداخت</th>
                    <th>شماره پیگیری</th>
                    <th>شماره کارت بانکی</th>
                    <th>توضیحات</th>

                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php
                    foreach ($data['invoice'] as $records) {
                    ?>
                    <td><?=$records['contract_number']?></td>
                    <td><?=$records['invoice_id']?></td>
                    <td><?=$records['issue_date']?></td>
                    <td><?=$records['company_name']?></td>
                    <td><?=number_format($records['totality'])?></td>
                    <td><?=$records['qty']?></td>
                    <td><?=$records['paymentTime']?></td>
                    <td><? echo "<span class= alert-success >پرداخت آنلاین</span>";?></td>
                    <td><?=$records['reference']?></td>
                    <td dir="ltr"><?=$records['card_number']?></td>
                    <td><?=$records['title']?></td>

                </tr>

                <?php
                }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="clearfix"></div>



