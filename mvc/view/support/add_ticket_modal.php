<?php
$tickets = new Tickets;
?>
<script src="<?=baseUrl()?>/vendors/jquery/dist/jquery.min.js"></script>

<div id="ticketModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="ticketForm" class="form-horizontal form-label-left">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-plus"> </i> ثبت تیکت جدید</h4>
                </div>
                <div class="modal-body" style="padding:10px ">
                    <div class="form-group">
                         <label for="subject" class="control-label">موضوع</label>
                         <input type="text" class="form-control" id="subject" name="subject" placeholder="موضوع" required>
                     </div>
                    <? if (!isset($_SESSION['roleId'])) { ?>
                        <div class="form-group">
                            <label for="department" class="control-label">دپارتمان</label>
                            <select id="department" name="department" class="form-control">
                                <?php $tickets->getDepartments(); ?>
                            </select>
                        </div>
                    <? } else { ?>
                        <div class="form-group">
                            <label for="contract_number" class="control-label">مشترک</label>
                          <?  if ($_SESSION['roleId']==1818) {?><input type="checkbox" id="checkbox" name="select-all" > all <?}?>
                                <select id="contract_number" required name="contract_number[]" multiple="multiple" class="form-control js-example-basic-multiple  ">

                                    <?php $tickets->getCompany(); ?>

                                </select>
                        </div>
                        <input type="hidden" name="department" value="<?=$_SESSION['roleId']?>">
                    <? } ?>
                <div class="form-group">
                    <label for="message" class="control-label">پیام</label>
                    <textarea class="form-control" rows="5" id="message" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <label for="status" class="control-label">وضعیت</label>
                    <label class="radio-inline">
                        <input type="radio" name="status" id="open" value="0" checked required>باز
                    </label>
                    <?php if(isset($_SESSION["roleId"])) { ?>
                        <label class="radio-inline">
                            <input type="radio" name="status" id="close" value="1" required>بسته
                        </label>
                    <?php } ?>

                </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="ticketId" id="ticketId" />
                <input type="hidden" name="action" id="action" value="" />
                <input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
                <button type="button" class="btn btn-default" data-dismiss="modal">انصراف</button>
            </div>
    </div>

    </form>
</div>
</div>
</div>

<script>
    // $("#checkbox").click(function(){
    //     if($("#checkbox").is(':checked') ){
    //         $("select > option").prop("selected","selected");
    //     }else{
    //         $("select > option").removeAttr("selected");
    //     }
    // });
</script>