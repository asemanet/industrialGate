<?php
$date = jdate("Y-m-d H:i:s");
$today= jdate('Y-m-d').' '.'00'.':'.'00'.':'.'00';
$yesterDay= time() - ((60*60)*24);
$yesterDay= jdate('Y-m-d H:i:s', $yesterDay);
$firstMonth= jdate('Y-m').'-'.'01'.' '.'00'.':'.'00'.':'.'00';


$countPermitLast24h=AsrModel::count_exit_permit_between($today, $date);
$countExitLast24h=AsrModel::count_exit_between($today, $date);
$countExitByPermitLast24h=AsrModel::count_exit_by_permit_between($today, $date);
$countPermitMonth=AsrModel::count_exit_permit_between($firstMonth, $date);
$countExitMonth=AsrModel::count_exit_between($firstMonth, $date);

//var_dump($countPermitMonth);
?>

<div class="row tile_count hidden-print">
    <a href="">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>تعداد برگه خروج ثبت شده:</span>
            <div class="count green"><? echo number_format($countPermitLast24h['COUNT(*)'])  ?></div>
            <span class="count_bottom"><i class="green">0% </i>در امروز</span>
        </div>
    </a>
    <a  class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" href="">
        <div>
            <span class="count_top"><i class="fa fa-clock-o"></i>تعداد خروج خودرو:</span>
            <div class="count">   <div class="count"><? echo number_format($countExitLast24h['COUNT(*)'])  ?></div></div>
            <span class="count_bottom"><i class="green"><i
                        class="fa fa-sort-asc"></i>0% </i>در امروز</span>
        </div>
    </a>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i>تعداد خروج خودرو با برگه خروج:</span>
        <div class="count green"><? echo number_format($countExitByPermitLast24h['COUNT(*)'])  ?></div>
        <span class="count_bottom"><i class="green"><i
                    class="fa fa-sort-asc"></i>0% </i>در امروز</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i>تعداد برگه خروج ثبت شده:  </span>
    <div class="count green"><? echo number_format($countPermitMonth['COUNT(*)']) ?></div>

    <span class="count_bottom"><i class="green"><i
                    class="fa fa-sort-desc"></i>0% </i>در ماه جاری</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> تعداد خروج خودرو: </span>
        <div class="count"><? echo number_format($countExitMonth['COUNT(*)'])  ?></div>
        <span class="count_bottom"><i class="green"><i
                    class="fa fa-sort-asc"></i>0% </i> در ماه جاری</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> زمان آخرین ورود شما</span>
        <div dir="ltr" class="count" style="font-size: 120%" >
            <?php
            $lastSeen= $_SESSION['lastseen'];
            $lastSeen = str_replace('-' , '/' , "$lastSeen" );
            echo $lastSeen;
            ?>
        </div>
        <span class="count_bottom"><i class="green"><i
                    class="fa fa-sort-asc"></i>0% </i> در ماه جاری</span>
    </div>

</div>