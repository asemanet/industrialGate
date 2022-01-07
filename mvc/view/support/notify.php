<?php
//var_dump($data);

?>
<style>

</style>

<li  role="presentation" class="" >

    <a href="javascript:;" class="dropdown-toggle " data-toggle="dropdown"
       aria-expanded="false" >
        <? if (isset($data['num_rows'])) {?>
        <span class="badge bg-green info-number-message ">
            <?  echo $data['num_rows']; ?>
        </span>
        <?}?>
        <i class="fa fa-envelope-o"> </i>
    </a>

    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                <?php
                if (!isset($_SESSION['roleId']) and $_SESSION['company_name']== null ){?>
                    <li>
                        <a href="/profile/contact">
                            <span class="image"><img src="<?= baseUrl() ?>/build/images/img.jpg" alt="Profile Image"/></span><span>
                            <span><?php echo $_SESSION['company_name']; ?></span>
                            <span class="time">3 دقیقه پیش</span>
                            <span class="message">
                                <a href="/profile/contact" >لطفا نسبت به تکمیل اطلاعات ورودی اقدام فرمایید</a>
                            </span>
            </a>
        </li>
        <? } elseif (isset($data['num_rows'])){
        for ($i=0; $i<count($data)-1; $i++){
            if ($data[$i]['ticket_debit']==1) {
                $debitTicket= $data[$i];
            }
            ?>
        <li>
            <a href="<?= baseUrl() ?>/support/ticket?id=<? if (isset($data[$i]['uniqid'])) echo $data[$i]['uniqid']; ?> ">
                <span class="image"><img src="<?= baseUrl() ?>/build/images/img.jpg" alt="Profile Image"/></span><span>
            <span><?php
                if (isset($_SESSION['roleId'])) {
                    echo $data[$i]['creater'];
                }else {
                    echo $_SESSION['company_name'];
                }
                ?>
            </span>
                    <br>
            <span class="time">
               <? if (isset($data[$i]['date'])) echo ago($data[$i]['date']); ?>
            </span>
            <span class="message">
                            <a href="<?= baseUrl() ?>/support/ticket?id=<? if (isset($data[$i]['uniqid'])) echo $data[$i]['uniqid']; ?>">
                            <? if (isset($data[$i]['title'])) {
                                echo $data[$i]['title'];
                            } ?>
                            </a>
                        </span>
            </a>
        </li>
        <? }}else{?>
        <li>
            <a>
                <span class="image"><img src="<?= baseUrl() ?>/build/images/img.jpg" alt="Profile Image"/></span><span>
            <span>کاربر عزیز</span>

            <span class="message">
                   شما پیامی ندارید!
            </span>
            </a>
        </li>
        <?}?>

        <li>
            <div class="text-center">
                <a>
                    <a href="/support/tickets"><strong>مشاهده تمام اعلان ها</strong></a>
                    <i class="fa fa-angle-right"> </i>
                </a>
            </div>
        </li>
    </ul>
    </div>
</li>

<?
if (isset($debitTicket) && $debitTicket['title'] != null) {
?>

<script>
    $(document).ready(function(){
        init_PNotify()
    });
    function init_PNotify() {

        if (typeof (PNotify) === 'undefined') {
            return;
        }
        console.log('init_PNotify');

        new PNotify({
            title: `<?=$debitTicket['title']?>` ,
            text:`<?=$debitTicket['init_msg']?>
            <br>
            <a href="/support/ticket?id=<?=$debitTicket['uniqid']?>"class="btn btn-sm btn-default " >نمایش پیام</a>`
            ,
            type: 'danger',
            hide: true,
            styling: 'bootstrap3',
            delay: 590000,


        });
    };
</script>

<?php } ?>

    <?php
    if (isset($data['num_rows'])){
    for ($i=0; $i<count($data)-1; $i++){
    if ($data[$i]['ticket_debit']==0){
    ?>
<script>
    $(document).ready(function(){
        init_PNotify()
    });
    function init_PNotify() {

        if (typeof (PNotify) === 'undefined') {
            return;
        }
        console.log('init_PNotify');

        new PNotify({

            title: ` پیام جدید ` ,
            text:`<?=$data[$i]['title'];?>
            <br>
            <a href="/support/ticket?id=<?=$data[$i]['uniqid'];?>"class="btn btn-sm btn-default " >نمایش پیام</a>`
            ,
            type: 'success',
            hide: true,
            styling: 'bootstrap3',
            delay: 15000,


        });
    };
</script>
<?}}}?>