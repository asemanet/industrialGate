<?php
//dump($data);

?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> تردد زنده
                    <small>همحوانی خودکار</small>
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
<table class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">
<!--<table>-->


    <thead>
    <tr>
        <th>شماره پلاک</th>
        <th>نام شرکت</th>
        <th>مسیر حرکت</th>
        <th>شماره برگه خروج</th>
        <th>نوع خودرو</th>
        <th>نام راننده</th>
        <th>نوع بار</th>
        <th>تاریخ ثبت</th>
        <th>تاریخ خروج</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach ($data as $record){
        ?>
    <tr
        <? if ($record['permit_rand']>0){
        echo " style='background-color: limegreen'";
    }else{
        echo " style='background-color: indianred'";
    }
    ?>
    >
        <td><?php  echo $record['license_platte']; ?></td>
        <td><?php  echo $record['company_name']; ?></td>
        <td><?php  echo $record['channel']; ?></td>
        <td><?php  echo $record['permit_rand']; ?></td>
        <td><?php  echo $record['car_type']; ?></td>
        <td><?php  echo $record['driver_name']; ?></td>
        <td><?php  echo $record['cargo']; ?></td>
        <td dir="ltr">
            <?php
            $issueDate= $record["issue_date"];
            $issueDate= str_replace('-' , '/' , "$issueDate" );
            echo $issueDate;
            ?>
        </td>
        <td dir="ltr">
            <?php
            $dueDate= $record["exite_date"];
            $dueDate= str_replace('-' , '/' , "$dueDate" );
            echo $dueDate;
            ?>
        </td>

    </tr>
    <?php
    } ?>
    </tbody>
</table>
<div class="clearfix"></div>
        </div>
    </div>
</div>


<!--<script>-->
<!--    setTimeout(function() {-->
<!--        location.reload();-->
<!--    }, 2000);-->
<!--</script>-->