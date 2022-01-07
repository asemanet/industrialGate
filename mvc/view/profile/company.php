<?php
//dump($data);
?>

<div class="clearfix"></div>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>گزارشات کاربر
                    <small>گزارش فعالیت‌ها</small>
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
                <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                    <div class="profile_img">
                        <div id="crop-avatar">
                            <!-- Current avatar -->
                            <img class="img-responsive avatar-view"
                                 src=<?=baseUrl() ?>/build/images/user.png
                                 alt="تغییر تصویر پروفایل">
                        </div>
                    </div>
                    <h3><?=$data["company_name"]; ?></h3>

                    <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php echo $data['address']; ?>
                        </li>

                        <li>
                            <i class="fa fa-briefcase user-profile-icon"></i><?php echo $data['activity']; ?>
                        </li>

                        <li class="m-top-xs">
                            <i class="fa fa-external-link user-profile-icon"></i>
                            <a href="http://<?php echo $data['website']; ?>" target="_blank">وب سایت: <?php echo $data['website']; ?></a>
                        </li>
                        <li class="m-top-xs">
                            <i class="fa fa-phone user-profile-icon"></i>
                            <a  target="_blank"><?php echo "021-".$data['tele1']; ?></a>
                        </li>
                    </ul>
                    <a href="changepass" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>&nbsp;تغییر رمز عبور</a>
                    <a href="/profile/contact" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>&nbsp;ویرایش پروفایل</a>
                    <br/>

                    <!-- start skills -->
                    <h4>توانمندی های شرکت شما</h4>
                    <ul class="list-unstyled user_data">
                        <li>
                            <p>برنامه کاربردی وب</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar"
                                     data-transitiongoal="50"></div>
                            </div>
                        </li>
                        <li>
                            <p>طراحی وبسایت</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar"
                                     data-transitiongoal="70"></div>
                            </div>
                        </li>
                        <li>
                            <p>اتوماسیون</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar"
                                     data-transitiongoal="30"></div>
                            </div>
                        </li>
                        <li>
                            <p>UI / UX</p>
                            <div class="progress progress_sm">
                                <div class="progress-bar bg-green" role="progressbar"
                                     data-transitiongoal="50"></div>
                            </div>
                        </li>
                    </ul>
                    <!-- end of skills -->

                </div>


                <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile_title">
                        <div class="col-md-6">
                            <h2>گزارش فعالیت </h2>
                        </div>
                        <div class="col-md-6">
                            <!--                        <div id="reportrange" class="pull-left"-->
                            <!--                             style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">-->
                            <!--                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>-->
                            <!--                            <span></span> <b class="caret"></b>-->
                            <!--                        </div>-->
                        </div>
                    </div>
                    <!-- start of user-activity-graph -->
                    <br>
                    <div style="width:100%; height:450px;">
<!--                        <div class="col-md-4 col-sm-4 col-xs-12">-->
<!--                            <div class="x_panel">-->
<!--                                <div class="x_title">-->
<!--                                    <h5>برگه خروج ثبت شده در 7 روز گذشته</h5>-->
<!--                                    <ul class="nav navbar-right panel_toolbox">-->
<!--                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>-->
<!--                                        </li>-->
<!--                                        <li class="dropdown">-->
<!--                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"-->
<!--                                               aria-expanded="false"><i class="fa fa-wrench"></i></a>-->
<!--                                            <ul class="dropdown-menu" role="menu">-->
<!--                                                <li><a href="#">تنظیمات 1</a>-->
<!--                                                </li>-->
<!--                                                <li><a href="#">تنظیمات 2</a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
<!--                                        <li><a class="close-link"><i class="fa fa-close"></i></a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                    <div class="clearfix"></div>-->
<!--                                </div>-->
<!--                                <div class="x_content">-->
<!---->
<!--                                    <div id="echart_pie_week" style="height:350px;"></div>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

                        <div class="col-md-12 col-sm-12 col-xs-12" >
                            <div class="x_panel">
                                <div class="x_title">
                                    <h5> نمودار برگه خروج ثبت شده در 30 روز گذشته</h5>
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

                                    <div id="permit_chart" style="height:350px;"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- end of user-activity-graph -->

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab"
                                                                      role="tab" data-toggle="tab"
                                                                      aria-expanded="true">فعالیت اخیر</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab"
                                                                data-toggle="tab" aria-expanded="false">محصولات تولیدی</a>
                            </li>
                            <!--                        <li role="presentation" class=""><a href="#tab_content3" role="tab"-->
                            <!--                                                            id="profile-tab2" data-toggle="tab"-->
                            <!--                                                            aria-expanded="false">پروفایل</a>-->
                            <!--                        </li>-->
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                                 aria-labelledby="home-tab">
                                <!-- start user projects -->
                                <div class="table-responsive" style="width: 100%">
                                    <table   class="table table-striped jambo_table bulk_action" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>آخرین ورود</th>
                                            <th>آدرس اینترنتی</th>
                                            <th class="hidden-phone">تاریخ و زمان</th>
                                            <th>از مرورگر</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <?php
                                            $counter=0;
                                            foreach ($data['login'] as $loginData){
                                            if ($loginData['platform']=='iPhone'){
                                                $loginData['platform']= 'سیستم عامل آیفون';
                                            }elseif ($loginData['platform']=='Android'){
                                                $loginData['platform']= 'سیستم عامل اندروید';
                                            }elseif ($loginData['platform']=='Windows'){
                                                $loginData['platform']= 'سیستم عامل ویندوز';
                                            }
                                            $counter++;
                                            ?>
                                            <td><?php  echo $counter; ?></td>
                                            <td><?php  echo $loginData['platform']; ?></td>
                                            <td><?php  echo $loginData['ip_address']; ?></td>
                                            <td dir="ltr" style="text-align: right"><?php  echo $loginData['login_time']; ?></td>
                                            <td><?php  echo $loginData['browser_name']."_"."Version"." ".$loginData['browse_version']; ?></td>
                                        </tr>
                                        <?}?>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- end user projects -->


                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2"
                                 aria-labelledby="profile-tab">



                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content3"
                                 aria-labelledby="profile-tab">
                                <!--                <p>در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>-->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?
//echo $data['pie']['1']['date']
?>


<script src="<?=baseUrl()?>/vendors/echarts/dist/echarts.min.js"></script>


<script type="text/javascript">
    // based on prepared DOM, initialize echarts instance
    var myChart = echarts.init(document.getElementById('echart_pie_week'));

    // specify chart configuration item and data
    option = {
        title : {
            // text: 'تست',
            // subtext: 'ساب تکست',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'horizontal',
            left: 'left',
            data: ['<?=$data['pie']['30']['date']?>','<?=$data['pie']['29']['date']?>','<?=$data['pie']['28']['date']?>','<?=$data['pie']['27']['date']?>','<?=$data['pie']['26']['date']?>','<?=$data['pie']['25']['date']?>','<?=$data['pie']['24']['date']?>']
        },
        series : [
            {
                name: 'برگه خروج',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    {value:<?=$data['pie']['30']['count']?>, name:'<?=$data['pie']['30']['date']?>'},
                    {value:<?=$data['pie']['29']['count']?>, name:'<?=$data['pie']['29']['date']?>'},
                    {value:<?=$data['pie']['28']['count']?>, name:'<?=$data['pie']['28']['date']?>'},
                    {value:<?=$data['pie']['27']['count']?>, name:'<?=$data['pie']['27']['date']?>'},
                    {value:<?=$data['pie']['26']['count']?>, name:'<?=$data['pie']['26']['date']?>'},
                    {value:<?=$data['pie']['25']['count']?>, name:'<?=$data['pie']['25']['date']?>'},
                    {value:<?=$data['pie']['24']['count']?>, name:'<?=$data['pie']['24']['date']?>'}

                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 10,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };


    // use configuration item and data specified to show chart
    myChart.setOption(option);
</script>
<script>
    var dom = document.getElementById("permit_chart");
    var myChart = echarts.init(dom);
    var app = {};

    option = {
        legend: {},
        tooltip: {},
        dataset: {
            dimensions: ['permit', 'برگه خروج ثبت شده'],
            source: [
                {permit: '<?=$data['pie']['0']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['0']['count']?>},
                {permit: '<?=$data['pie']['1']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['1']['count']?>},
                {permit: '<?=$data['pie']['2']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['2']['count']?>},
                {permit: '<?=$data['pie']['3']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['3']['count']?>},
                {permit: '<?=$data['pie']['4']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['4']['count']?>},
                {permit: '<?=$data['pie']['5']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['5']['count']?>},
                {permit: '<?=$data['pie']['6']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['6']['count']?>},
                {permit: '<?=$data['pie']['7']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['7']['count']?>},
                {permit: '<?=$data['pie']['8']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['8']['count']?>},
                {permit: '<?=$data['pie']['9']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['9']['count']?>},
                {permit: '<?=$data['pie']['10']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['10']['count']?>},
                {permit: '<?=$data['pie']['11']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['11']['count']?>},
                {permit: '<?=$data['pie']['12']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['12']['count']?>},
                {permit: '<?=$data['pie']['13']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['13']['count']?>},
                {permit: '<?=$data['pie']['14']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['14']['count']?>},
                {permit: '<?=$data['pie']['15']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['15']['count']?>},
                {permit: '<?=$data['pie']['16']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['16']['count']?>},
                {permit: '<?=$data['pie']['17']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['17']['count']?>},
                {permit: '<?=$data['pie']['18']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['18']['count']?>},
                {permit: '<?=$data['pie']['19']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['19']['count']?>},
                {permit: '<?=$data['pie']['20']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['20']['count']?>},
                {permit: '<?=$data['pie']['21']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['21']['count']?>},
                {permit: '<?=$data['pie']['22']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['22']['count']?>},
                {permit: '<?=$data['pie']['23']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['23']['count']?>},
                {permit: '<?=$data['pie']['24']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['24']['count']?>},
                {permit: '<?=$data['pie']['25']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['25']['count']?>},
                {permit: '<?=$data['pie']['26']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['26']['count']?>},
                {permit: '<?=$data['pie']['27']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['27']['count']?>},
                {permit: '<?=$data['pie']['28']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['28']['count']?>},
                {permit: '<?=$data['pie']['29']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['29']['count']?>},
                {permit: '<?=$data['pie']['30']['date']?>', 'برگه خروج ثبت شده': <?=$data['pie']['30']['count']?>},
            ]
        },
        xAxis: {type: 'category',
            axisLabel: {
                fontFamily: "Vazir-FD"
            }
        },
        yAxis: { axisLabel: {
                fontFamily: "Vazir-FD"
            }},
        // Declare several bar series, each will be mapped
        // to a column of dataset.source by default.
        series: [
            {type: 'bar', itemStyle:{
                    normal: {
                        color: '#324872'}}
            }
        ],

    };

    if (option && typeof option === "object") {
        myChart.setOption(option, true);
    }
</script>



<!--<!-- ECharts -->
<!--<script src="--><?//=baseUrl()?><!--/vendors/echarts/dist/echarts.min.js"></script>-->

<!---->
<?php
//if (isset($_SESSION['sum_totality'])){
//?>
<!--<script>-->
<!--    function init_PNotify() {-->
<!---->
<!--        if (typeof (PNotify) === 'undefined') {-->
<!--            return;-->
<!--        }-->
<!--        console.log('init_PNotify');-->
<!---->
<!--        new PNotify({-->
<!--            title: 'قبض آب ',-->
<!--            text:-->
<!--            '<div class="ui-pnotify-text"> '+-->
<!--            '<p dir="rtl"> <a style="color: snow" href="/bill/water/1">قبض آب دوره سه ماهه دوم 98 صادر گردید</a>  </p>' +-->
<!--            '<br>'+-->
<!--            // '<p dir="rtl">نمایش قبوض آب<a href="/bill/water/1"></a> </p>' +-->
<!--            '<br>'+-->
<!--            // '<p dir="rtl"> برگه خروج ثبت شده 10 ساعت معتبر می باشد و اگر خودرو حامل بار در این مدت مبادرت به خروج نکند، برگه خروج باطل می گردد.  </p>'+-->
<!--            '<div>'-->
<!--            ,-->
<!--            // type: 'info',-->
<!--            hide: false,-->
<!--            styling: 'bootstrap3'-->
<!--        });-->
<!--    };-->
<!--    --><?//}?>
<!--</script>-->