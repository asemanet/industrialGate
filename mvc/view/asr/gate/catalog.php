

<!---->
<!--<div>-->
<!---->
<!--</div>-->
<!--<!--  <table id="datatable-buttons" class="col-sm-12 table table-striped table-bordered dataTable no-footer dtr-inline collapsed " role="grid" aria-describedby="datatable-buttons_info" style="width: 100%;">-->
<!--<!--<table id="datatable-responsive"  class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">-->
<!--<!--<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"-->
<!--<table id="datatable-buttons" data-order='[[ 8, "dsc" ]]'  data-page-length='50'  class="table table-striped table-bordered dt-responsive " cellspacing="0" width="100%">-->
<!---->
<!---->
<!---->
<!--    <thead>-->
<!--    <tr>-->
<!--        <th>شماره پلاک</th>-->
<!--        <th>نام شرکت</th>-->
<!--        <th>مسیر حرکت</th>-->
<!--        <th>شماره برگه خروج</th>-->
<!--        <th>نوع خودرو</th>-->
<!--        <th>نام راننده</th>-->
<!--        <th>نوع بار</th>-->
<!--        <th>تاریخ ثبت</th>-->
<!--        <th>تاریخ خروج</th>-->
<!--    </tr>-->
<!--    </thead>-->
<!---->
<!--    <tbody>-->
<!--    --><?php
//    foreach ($data as $record){
//        ?>
<!--    <tr-->
<!--        --><?// if (isset($record['permit_rand'])){
//        echo " style='background-color: limegreen'";
//    }else{
//        echo " style='background-color: indianred'";
//    }
//    ?>
<!--    >-->
<!--        <td>--><?php // echo $record['license_platte']; ?><!--</td>-->
<!--        <td>--><?php // echo $record['company_name']; ?><!--</td>-->
<!--        <td>--><?php // echo $record['channel']; ?><!--</td>-->
<!--        <td>--><?php // echo $record['permit_rand']; ?><!--</td>-->
<!--        <td>--><?php // echo $record['car_type']; ?><!--</td>-->
<!--        <td>--><?php // echo $record['driver_name']; ?><!--</td>-->
<!--        <td>--><?php // echo $record['cargo']; ?><!--</td>-->
<!--        <td dir="ltr">-->
<!--            --><?php
//            $issueDate= $record["issue_date"];
//            $issueDate= str_replace('-' , '/' , "$issueDate" );
//            echo $issueDate;
//            ?>
<!--        </td>-->
<!--        <td dir="ltr">-->
<!--            --><?php
//            $dueDate= $record["exite_date"];
//            $dueDate= str_replace('-' , '/' , "$dueDate" );
//            echo $dueDate;
//            ?>
<!--        </td>-->
<!---->
<!--    </tr>-->
<!--    --><?php
//    } ?>
<!--    </tbody>-->
<!--</table>-->
<body onLoad="test()">
<div class="page-title">
    <div class="title_left">
        <h4><small>تردد کل خطوط</small></h4>
        <hr>
    </div>

    <div class="title_right">
        <div class="col-md-4 col-sm-4 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                <span  class="form-control" >تاریخ امروز: <?=jdate('Y/m/d')?></span>
                <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><span class="fa fa-clock-o"></span></button>
                    </span>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<span class="btn btn-primary" style="width: 200px" onclick="test()">همخوانی</span>

<div id="page"></div>

<script>

    // refreshData();
    function test() {
        $.ajax('/asr/permitCheckAjax' , {
            type: 'post',
            dataType: 'json',
            success: function (data) {
                $("#page").html(data.html);
                // alert(data.html)
                // setInterval(test(), 300000);
                // setInterval(function(){
                //     test()
                // }, 5000);
            }
        });
    }


    // function refreshData()
    // {
    //     setInterval(test(), 1000);
    // }



    // var myVar = setInterval(myTimer, 1000);
    //
    // function myTimer() {
    //     var d = new Date();
    //     var t = d.toLocaleTimeString();
    //     document.getElementById("demo").innerHTML = t;
    // }
</script>