<?
    ?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ویرایش شناسه قبض پرداختی در بانک</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtid">ردیف</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['payed_bank_id'];?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtname">تاریخ</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="date" name="date" value="<?php echo $data['b_payed_date'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtsalary">کد شرکت تابعه</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="payed-for" name="payed-for" value="<?php echo  $data['b_payed_for'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtage">مبلغ</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="amount" name="amount" value="<?php echo  $data['b_amount'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtage">شناسه قبض</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="shenase-ghabz" name="shenase-ghabz" value="<?php echo  $data['b_shenase_ghabz'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtage">شناسه پرداخت</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="shenase-pardakht" name="shenase-pardakht" value="<?php echo  $data['b_shenase_pardakht'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtage">کد پیگیری</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="rrn" name="rrn" value="<?php echo  $data['b_rrn'];?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label" for="txtage">شماره کارت</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="card-number" name="card-number" value="<?php echo  $data['b_card_number'];?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a ><button type="button" class="btn btn-danger" data-dismiss="modal">انصراف</button> </a>
                <button type="submit" class="btn btn-primary" name="btnEdit">ثبت</button>
            </div>
        </div>
    </form>
    <?php
//}//end if
?>