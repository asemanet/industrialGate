<?php
?>

<div class="row tile_count hidden-print">
    <a href="">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-user"></i>تعداد برگه خروج:</span>
            <div class="count" style="color: #4cae4c"><? echo $_SESSION['qtyPermit']." ". 'عدد'  ?></div>
            <span class="count_bottom"><i class="green">0% </i> از ماه گذشته</span>
        </div>
    </a>
    <a  class="col-md-2 col-sm-4 col-xs-6 tile_stats_count" href="">
        <div>
            <span class="count_top"><i class="fa fa-clock-o"></i>بدهی آب</span>
            <div class="count">   <div class="count"><?
                    if (isset($_SESSION['sum_totality'])){
                        echo number_format($_SESSION['sum_totality']);
                    }else{
                        echo 0;
                    }
                    ?></div></div>
            <span class="count_bottom"><i class="green"><i
                        class="fa fa-sort-asc"></i>0% </i> از هفته گذشته</span>
        </div>
    </a>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i>بدهی شارژ</span>
        <div class="count green">0</div>
        <span class="count_bottom"><i class="green"><i
                    class="fa fa-sort-asc"></i>0% </i> از هفته گذشته</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> تعداد درخواست های فعال</span>
        <div class="count">0</div>
        <span class="count_bottom"><i class="red"><i
                    class="fa fa-sort-desc"></i>0% </i> از هفته گذشته</span>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> مجموعه بدهی </span>
        <div class="count">0</div>
        <span class="count_bottom"><i class="green"><i
                    class="fa fa-sort-asc"></i>0% </i> از هفته گذشته</span>
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
