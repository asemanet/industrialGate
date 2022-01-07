<?php
if ($_SESSION['roleId']==1822){

    $time= time()-(86400*7);
    $date= jdate('Y-m-d',$time);




    for ($i=1;  $i<9; $i++) {
        $count=AsrModel::fetch_count_exite_permit($date);
        $countDone= AsrModel::fetch_count_exite_permit_done($date);
        $countDontExit= $count['COUNT(*)']-$countDone['COUNT(*)'];
        $test[]=array(
            'count'     =>$count['COUNT(*)'],
            'date'      =>$date,
            'exit-done' =>$countDone['COUNT(*)'],
            'dont-exit' =>$countDontExit,
        );
        $dateExp=explode('-',$date);
        $ts=jmktime(24,59,59,$dateExp[1],$dateExp[2],$dateExp[0]) + 1440; //یک روز بعد از تاریخ دلخواه
        $ts= jdate('Y-m-d',$ts);
        $date=$ts;
    }

//    dump($test);
    ?>
    <script  src="<?=baseUrl()?>/vendors/echarts/dist/echarts.min.js"></script>
<div >

    <div class="col-lg-10 col-sm-10 col-sm-offset-1 col-xl-8 col-xl-offset-1 px-xl-default jumbotron-custom-overlapping-content" id="test78" style="height: 400px"></div>
</div>
    <script>
        var dom = document.getElementById("test78");
        var myChart = echarts.init(dom);
        var app = {};
        option = null;
        option = {
            legend: {},
            tooltip: {},
            dataset: {
                dimensions: ['permit', 'برگه خروج ثبت شده', 'برگه خروج خارج شده', 'عدم خروج'],
                source: [
                    {permit: '<?=$test[0]['date']?>', 'برگه خروج ثبت شده': <?=$test[0]['count']?>, 'برگه خروج خارج شده': <?=$test[0]['exit-done']?>, 'عدم خروج': <?=$test[0]['dont-exit']?>},
                    {permit: '<?=$test[1]['date']?>', 'برگه خروج ثبت شده': <?=$test[1]['count']?>, 'برگه خروج خارج شده': <?=$test[1]['exit-done']?>, 'عدم خروج': <?=$test[1]['dont-exit']?>},
                    {permit: '<?=$test[2]['date']?>', 'برگه خروج ثبت شده': <?=$test[2]['count']?>, 'برگه خروج خارج شده': <?=$test[2]['exit-done']?>, 'عدم خروج': <?=$test[2]['dont-exit']?>},
                    {permit: '<?=$test[3]['date']?>', 'برگه خروج ثبت شده': <?=$test[3]['count']?>, 'برگه خروج خارج شده': <?=$test[3]['exit-done']?>, 'عدم خروج': <?=$test[3]['dont-exit']?>},
                    {permit: '<?=$test[4]['date']?>', 'برگه خروج ثبت شده': <?=$test[4]['count']?>, 'برگه خروج خارج شده': <?=$test[4]['exit-done']?>, 'عدم خروج': <?=$test[4]['dont-exit']?>},
                    {permit: '<?=$test[5]['date']?>', 'برگه خروج ثبت شده': <?=$test[5]['count']?>, 'برگه خروج خارج شده': <?=$test[5]['exit-done']?>, 'عدم خروج': <?=$test[5]['dont-exit']?>},
                    {permit: '<?=$test[6]['date']?>', 'برگه خروج ثبت شده': <?=$test[6]['count']?>, 'برگه خروج خارج شده': <?=$test[6]['exit-done']?>, 'عدم خروج': <?=$test[6]['dont-exit']?>},
                    {permit: '<?=$test[7]['date']?>', 'برگه خروج ثبت شده': <?=$test[7]['count']?>, 'برگه خروج خارج شده': <?=$test[7]['exit-done']?>, 'عدم خروج': <?=$test[7]['dont-exit']?>},

                ]
            },
            xAxis: {type: 'category'},
            yAxis: {},
            // Declare several bar series, each will be mapped
            // to a column of dataset.source by default.
            series: [
                {type: 'bar', itemStyle:{
                normal: {
                    color: '#232f34'}}
                    },
                {type: 'bar', itemStyle:{
                        normal: {
                            color: '#4cae4c'}}
                    },
                {type: 'bar'}
            ]
        };
        ;
        if (option && typeof option === "object") {
            myChart.setOption(option, true);
        }
    </script>


<?}else {

    messageAdmin("success", '<span> خوش آمدید</span><br><br>', true);
}
?>

