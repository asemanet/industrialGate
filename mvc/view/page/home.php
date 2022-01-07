<?php

if (empty($_SESSION['company_name'])) {
//  echo "<h1><a href=\"form.php\" style=\"background-color: blue; color: #9cc2cb \">ثبت مشخصات شرکت--</a>با سلام لطفا نسبت به ورود اطلاعات اقدام فرمایید</h1>";
header("location: ../profile/contact");
}else{
header("location: ../profile/contact");
}

?>
