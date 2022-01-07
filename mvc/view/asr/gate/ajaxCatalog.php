<?php
//dump($data);

?>
<!--<div id="page"></div>-->

<div>

</div>
<!--  <table id="datatable-buttons" class="col-sm-12 table table-striped table-bordered dataTable no-footer dtr-inline collapsed " role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">-->
<!--<table id="datatable-responsive"  class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">-->
<!--<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"-->
<!--<table id="datatable-buttons" data-order='[[ 8, "dsc" ]]'  data-page-length='50'  class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">-->
<table class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">



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

<!--<script>-->
<!--    setTimeout(function() {-->
<!--        location.reload();-->
<!--    }, 2000);-->
<!--</script>-->