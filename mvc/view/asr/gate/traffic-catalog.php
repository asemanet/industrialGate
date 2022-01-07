<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"-->
<!--        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">-->
<!--</script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"-->
<!--        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">-->
<!--</script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"-->
<!--        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">-->
<!--</script>-->
<!--<link rel="stylesheet" href="--><?//=baseUrl()?><!--/vendors/PersianDateTimePicker/jquery.md.bootstrap.datetimepicker.style.css" />-->


    <div class="col-md-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2> گزارش تردد
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
            <form class="form-horizontal " method="post" action="<?= baseUrl() ?>/asr/traffic" class="form-horizontal form-label-left" enctype="multipart/form-data">
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="heard">نوع تردد :</label>
                    <div class=" col-md-8 col-sm-8 col-xs-12 ">
                        <select id="heard" class="form-control " name="type">
                            <option value="">انتخاب...</option>
                            <option value="all">تمام موارد</option>
                            <option value="on">دارای مجوز</option>
                            <option value="off">فاقد مجوز</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">شماره قرارداد:</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input dir="ltr" type="text" name="gharardad" class="form-control" value="415-" placeholder="شماره قرارداد">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">نام مشترک:</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="company" class="form-control" placeholder="نام مشترک">
                    </div>
        </div>
                    <div class="form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12 ">شماره پلاک:</label>
                        <div  class="plaque col-md-8 col-sm-9 col-xs-12 col-md-offset-1  ">
                            <input  id="PLAQUE_PART4"   maxlength="2" minlength="2" name="ir" pattern="\d\d" placeholder=""   type="text">
                            <input id="PLAQUE_PART3"   maxlength="3" minlength="3" name="threeDigit" pattern="\d\d\d"  type="text">
                            <select   type="text"   id="PLAQUE_PART2" name="letter"  >
                                <option value="" disabled selected>انتخاب کنید</option>
                                <option  value="الف"> الف </option>
                                <option  value="ب"> ب </option>
                                <option  value="ت"> ت </option>
                                <option  value="ج"> ج </option>
                                <option  value="چ"> چ </option>
                                <option  value="د"> د </option>
                                <option  value="س"> س </option>
                                <option  value="ص"> ص </option>
                                <option  value="ط"> ط </option>
                                <option  value="ع"> ع </option>
                                <option  value="ق"> ق </option>
                                <option  value="گ"> گ </option>
                                <option  value="ل"> ل </option>
                                <option  value="م"> م </option>
                                <option  value="ن"> ن </option>
                                <option  value="و"> و </option>
                                <option  value="ک"> ک </option>
                                <option  value="ه"> ه </option>
                                <option  value="ی"> ی </option>
                                <option  value="ژ"> معلولین و جانبازان</option>
                                <option  value="D"> D </option>
                                <option  value="S"> S </option>
                            </>
                            <input   id="PLAQUE_PART1"  maxlength="2" minlength="2" name="twoDigit"  pattern="\d\d"    >
                        </div>
                    </div>

                </div>
        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">تاریخ خروج:</label>
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
                <div class="col-md-4 col-sm-4 col-xs-12">
<!--                    <input dir="ltr" type="text" name="end-date" class="form-control"  data-inputmask="'mask': '9999/99/99'">-->
                </div>
            </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">نام راننده</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="driver" class="form-control" placeholder="نام راننده">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">نوع بار</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="cargo" class="form-control" placeholder="نوع بار">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">نوع خودرو</label>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <input type="text" name="car-type" class="form-control" placeholder="نوع خودرو">
                    </div>
                </div>
                <br>
        </div>
                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1">
                    <br>
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
                <small>طراحی شخصی شده</small>
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
        <div class="x_content">
            <?php
            //    }
            if (isset($data['error'])){
                echo "<span class='alert alert-danger'>برای جستجو شما اطلاعاتی وجود ندارد لطفا مقادیر ورودی را کنترل فرمایید</span>";
            }
            elseif (isset($_POST['btn-report'])){
//                dump($data);
//                dump($data['count'])
            ?>
            <table id="datatable-buttons" data-order='[[ 5, "asc" ]]' data-page-length='10'  class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>نام مشترک</th>
                    <th>شماره پلاک</th>
                    <th>گیت خروج</th>
                    <th>تاریخ خروج</th>
                    <th>نوع بار</th>
                    <th>نام راننده</th>
                    <th>تاریخ ثبت</th>
                    <th>نوع خودرو</th>
                    <th>شماره برگه خروج</th>

                </tr>
                </thead>

                <tbody>
                <?php
//                dump($data);
                foreach ($data['catalog'] as $records){
                    ?>
                <tr <?php

                if ($records["permit_rand"] != 0) {
                    echo " class='green'";
                } else {
                    echo " class='dark'";
                }
                ?>>
                    <td><?= $records['company_name'] ?></td>
                    <!--                    <td dir="ltr">--><?//=$data['contract_number'];
                    ?><!--</td>-->
                    <td><?php echo $records['license_platte']; ?></td>
                    <td><?= $records['channel']; ?></td>
                    <td dir="ltr">
                        <?php
                        $dueDate = $records["exite_date"];
                        $dueDate = str_replace('-', '/', "$dueDate");
                        echo $dueDate;
                        ?>
                    </td>
                    <td><?php echo $records['cargo']; ?></td>
                    <td><?php echo $records['driver_name']; ?></td>
                    <td dir="ltr">
                        <?php
                        $issueDate = $records["issue_date"];
                        $issueDate = str_replace('-', '/', "$issueDate");
                        echo $issueDate;
                        ?>
                    </td>
                    <td><?= $records['car_type']; ?></td>
                    <td><? if ($records['permit_rand'] == 0) {
                            echo "<span class=' alert-danger'>بدون مجوز</span>";
                        } else {
                            echo $records['permit_rand'];
                        }; ?></td>
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







