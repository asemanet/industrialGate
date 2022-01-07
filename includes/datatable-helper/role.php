<?php
class rolePermission{

    public function rolePerm($rolId,$floorRol, $href)
    {
        if ($_SESSION['roleId'] != $rolId AND $_SESSION['roleId'] > $floorRol) {
            messageAdmin("fail", '<span>شما دسترسی به این قسمت ندارید</span><br><br><a class="btn btn-default" href="'.$href.'">بازگشت</a>', true);
        }
    }
}