<?
var_dump($data);
exit();
    ?>
    <form class="form-horizontal" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ویرایش شناسه قبض پرداختی در بانک</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group">
                        <label class="col-sm-4 control-label">صاحب قرارداد</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="contractName" name="contractName" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">متراژ</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="area" name="area">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">نوع اشتراک شارژ</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="companyType" name="companyType" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">اشتراک آبرسانی</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="waterCounter" name="waterCounter">
                        </div>
                    </div>
                </div>
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