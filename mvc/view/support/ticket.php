<?php
//var_dump($_POST);
//var_dump($_SESSION);

$ticketDetails = $data['ticketDetails'];
//var_dump($ticketDetails);
$ticketReplies = $data['ticketReplies'];
//var_dump($ticketReplies);
?>
    <div class="container" >
        <div class="row home-sections">
<!--            <h2>تیکت شماره: </h2>-->
            <?php include('menus.php'); ?>
        </div>
        <br>
        <section class="comment-list" style="background-image: url('<?=baseUrl()?>/build/images/whatsapp.jpg')">
            <br>
            <article class="row" style="padding-right: 20px ">
                <div class="col-md-10 col-sm-10">
                    <div class="panel panel-default arrow right">
                        <div class="panel-heading right">
                            <?php if($ticketDetails['resolved']) { ?>
                                <button type="button" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-eye-close"> </span> تیکت بسته
                                </button>
                            <?php } else { ?>
                                <button type="button" class="btn btn-success btn-sm">
                                    <span class="glyphicon glyphicon-eye-open"> </span> تیکت باز
                                </button>
                            <?php } ?>
                            <span class="ticket-title"><?php echo $ticketDetails['title']; ?></span>
                        </div>
                        <div class="panel-body">
                            <div class="comment-post">
                                <p>
                                    <?php echo $ticketDetails['message']; ?>
                                </p>
                            </div>
                        </div>
                        <div class="panel-heading right">
                              <?if ($ticketDetails['admin_read']==1 && $ticketDetails['user_read']==1 ) {?>
                                  <img class="icon" src="<?=baseUrl()?>/build/images/2check.png">
                                <?}elseif ($ticketDetails['user_read']==1 || $ticketDetails['admin_read']==1 ){?>
                              <img class="icon" src="<?=baseUrl()?>/build/images/check.png">
                                <?}?>&nbsp;&nbsp;
                            <span class=""> </span> <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"> </i> <?php echo ago($ticketDetails['date']); ?></time>
                            &nbsp;&nbsp;<span class="glyphicon glyphicon-user"> </span> <span dir="ltr"><?php echo $ticketDetails['creater']; ?></span>
                            &nbsp;&nbsp;<span class="glyphicon glyphicon-briefcase"> </span> <?php echo $ticketDetails['department']; ?>
                        </div>
                    </div>
                </div>
            </article>

            <?php foreach ($ticketReplies as $replies) { ?>
                <article class="row">
                    <div class="col-md-10 col-sm-10">
                        <div class="panel panel-default arrow  <?
                        if ($replies['role_id'] == null) {
                            echo "right panel-success  ticket-offset-left ";
                        }else{
//                            echo "col-md-offset-1";
                            echo " ticket-offset-right";
                        }
                        ?>">
                            <div class="panel-heading ">
                                <?php if($replies['role_id'] != null) { ?>
                                    <span> <img width="40px" src="<?=baseUrl()?>/build/images/logo-orange-org.png"> </span> <?php echo $ticketDetails['department']; ?>
                                <?php } else { ?>
                                    <span class=""><img width="40px" src="<?=baseUrl()?>/build/images/img.jpg"> </span> <?php echo $replies['creater']; ?>
                                <?php } ?>
                                &nbsp;&nbsp;<span class=""> </span> <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"> </i> <?php echo ago($replies['date']); ?></time>
                            </div>
                            <div class="panel-body" dir="rtl">
                                <div class="comment-post">
                                    <p>
                                        <?php echo $replies['message']; ?>
                                    </p>
                                </div>
                            </div>
                   
                        </div>
                    </div>
                </article>
            <?php } ?>
            <form method="post" id="ticketReply">
                <article class="row">
                    <div class="col-md-10 col-sm-10">
                        <br>
                        <br>
                        <div class="form-group" style="padding-right: 5px">
                            <textarea class="form-control" rows="5" id="message" name="message" placeholder="متن پاسخ ..." required></textarea>
                        </div>
                    </div>
                </article>
                <article class="row">
                    <div class="col-md-10 col-sm-10">
                        <div class="form-group">
                            <input type="submit" name="reply" id="reply" class="btn  btn-round btn-warning" value="       ارسال    " />
                        </div>
                    </div>
                </article>
                <br>
                <input type="hidden" name="ticketId" id="ticketId" value="<?php echo $ticketDetails['id']; ?>" />
                <input type="hidden" name="action" id="action" value="<?
                    if (isset($_SESSION['roleId'])) {
                        echo "saveTicketRepliesAdmin";
                    }else{
                        echo "saveTicketRepliesUser";
                    }
                ?>" />
            </form>
        </section>

        <?php

        require_once ('add_ticket_modal.php');


        ?>
    </div>
<script src="<?=baseUrl()?>/js/support/user-ticket.js"></script>


