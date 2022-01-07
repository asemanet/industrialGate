
<?php
//var_dump($_SESSION);
//var_dump($_POST);
?>
<style>
    .bolded {
        font-weight:bold;
    }
    div.dataTables_wrapper {
        width: 95%;
        margin: 0 auto;
    }
</style>
<div class="container">
	<div class="row home-sections">
	<h2><i class="fa fa-life-ring"> </i> تیکت های پشتیبانی</h2>
	<?php include('menus.php'); ?>
	</div>
	<div class="dataTables_wrapper">
		<p> </p>
		<table id="listTickets" class="table table-bordered table-striped  dataTable dtr-inline" style="cursor: pointer; width: 100%" >
			<thead >
				<tr>
                    <th>نمایش </th>
                    <th>خوانده شده</th>
<!--                    <th> </th>-->
                    <th>شماره تیکت</th>
                    <th>موضوع</th>
                    <th>دپارتمان</th>
                    <th>کاربر</th>
                    <th>تاریخ ایجاد</th>
                    <th>وضعیت</th>
                    <?if (isset($_SESSION['roleId'])) {?>
                        <th>عملیات</th>
<!--                        <th></th>-->
                    <?}?>
				</tr>
			</thead>
<!--            <tfoot>-->
<!--            <tr >-->
<!--                <th>نمایش </th>-->
<!--                <th>خوانده شده</th>-->
<!--                <th>شماره تیکت</th>-->
<!--                <th>موضوع</th>-->
<!--                <th>دپارتمان</th>-->
<!--                <th>کاربر</th>-->
<!--                <th>تاریخ ایجاد</th>-->
<!--                <th>وضعیت</th>-->
<!--                --><?//if (isset($_SESSION['roleId'])) {?>
<!--                <th>عملیات</th>-->
<!--                --><?//}?>
<!---->
<!--            </tr>-->
<!--            </tfoot>-->
		</table>
	</div>
	<?php include('add_ticket_modal.php');
    if (!empty($_SESSION['roleId']) && ($_SESSION['roleId']=='1820'|| $_SESSION['roleId']=='1823')){
        require_once ('add_debit_modal.php');
    }
	?>

</div>
<script src="<?=baseUrl()?>/js/support/user-ticket.js"></script>



