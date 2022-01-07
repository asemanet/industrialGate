<?php
$isGuest = !isset($_SESSION['username']);
if ($isGuest) {
  header("location: ../user/login");
  exit();
}
class PageController {
  public function home()  {
    $isGuest = !isset($_SESSION['username']);
     if($isGuest) {
      header("location: ../user/login");
    }
    $now = time(); // Checking the time now when home page starts.
    if ($now > $_SESSION['expire']) {
      header("location: ../user/login");
      session_destroy();
    }
    View::render("/page/home.php");
  }
}