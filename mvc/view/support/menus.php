


<nav class="navbar navbar-default " role="navigation" style="background-color: #e1e1e1">
        <div class="navbar-header " style="background-color: #e1e1e1">
            <div class="navbar-brand">
                <a href="tickets" class="text-info"><i
                        class="  <? if ($_SERVER['REQUEST_URI'] == '/support/tickets') {
                            echo "fa fa-list";
                        } else {
                            echo "fa fa-mail-forward";
                        }
                        ?>"
                    > </i> لیست تیکت ها</a></div>
    </div>
    <div class="container-fluid">

    <?php
        if ($_SERVER['REQUEST_URI']== '/support/tickets') { ?>
        <ul class="nav navbar-nav">
            <li><a href="#" id="createTicket" class="btn btn-toolbar"><i class="glyphicon glyphicon-plus ">
                    </i> <span class="text-">ایجاد تیکت جدید</span></a></li>
        </ul>
        <?}if (!empty($_SESSION['roleId']) && ($_SESSION['roleId']=='1820' || $_SESSION['roleId']=='1823')){?>

            <ul class="nav navbar-nav">
                <li><a href="#" id="createDebitTicket" class="btn btn-toolbar"><i class="glyphicon glyphicon-plus ">
                        </i> <span class="text-">اخطار بدهی</span></a></li>
            </ul>
        <?}?>
        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count"></span>
                    <img src="//gravatar.com/avatar/<?php
                    if (isset($_SESSION['email'])) {
                        echo md5($_SESSION['email']); }
                    ?>?s=100" width="35px">&nbsp;<?php if(isset($_SESSION["company_name"])) { echo $_SESSION['company_name']; } ?>
                <ul class="dropdown-menu">
                    <?if (isset($_SESSION["company_name"])) { ?>
                        <li><a href="/profile/company">پروفایل</a></li>
                    <?}else{?>
                        <li><a href="/asr/admin">خانه</a></li>
                    <?}?>
                </ul>
                </a>
            </li>
        </ul>
    </div>
</nav>
