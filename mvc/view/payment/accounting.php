<div class="tac">
  <span>فاکتور های پرداخت نشده شما عبارتست از:</span><br><br>
  <ul class="cols" style="background-color: #8f0">
    <li style="width: 100px">مبلغ فاکتور</li>
    <li style="width: 150px">زمان شروع</li>
    <li style="width: 150px">زمان پایان</li>
    <li style="width: 100%">تیتر</li>
    <li style="width: 100px"></li>
  </ul>

  <? foreach ($invoices as $invoice) { ?>
    <ul class="cols" style="line-height: 20pt">
      <li style="width: 100px"><?=$invoice['price']?></li>
      <li style="width: 150px"><?=jdate($invoice['startDate'])?></li>
      <li style="width: 150px"><?=jdate($invoice['endDate'])?></li>
      <li style="width: 100%"><?=$invoice['title']?></li>
      <li style="width: 100px"><a class="btn" href="<?=fullBaseUrl()?>/payment/pay/<?=$invoice['hash']?>">پرداخت</a></li>
    </ul>
  <? } ?>
</div>

<div style="position: fixed; bottom: 10px; left: 10px; ">
  <script type="text/javascript" src="http://www.zarinpal.com/webservice/TrustCode"></script><noscript><a href="https://www.zarinpal.com/users/receptive_websites">ZarinPal Receptive Websites</a></noscript>
</div>