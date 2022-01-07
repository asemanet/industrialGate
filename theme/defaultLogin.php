<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>پنل کاربری  شرکت خدماتی شهرک صنعتی شمس آباد </title>

  <!-- Bootstrap -->
  <link href="<?=baseUrl()?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=baseUrl()?>/vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?=baseUrl()?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?=baseUrl()?>/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?=baseUrl()?>/vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?=baseUrl()?>/build/css/custom.css" rel="stylesheet">

    <link href="<?=baseUrl()?>/build/css/aseman.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="<?=baseUrl()?>/build/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=baseUrl()?>/build/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=baseUrl()?>/build/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?=baseUrl()?>/build/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?=baseUrl()?>/build/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="theme-color" content="#ffffff">

</head>
<?php
$images = array(
//        '1.jpg',
//        '2.jpg',
//        '3.jpg',
//        '4.jpg',
//        '5.jpg',
//        '6.jpg',
//        '7.jpg',
//        '8.jpg',
//        '9.jpg',
//        '10.jpg',
//        '11.jpg',
//        '12.jpg',
//        '13.jpg',
//        '14.jpg',
//        '15.jpg',
        '16.jpg',
    );
$random_image = array_rand($images);
?>
<body class="login">
<div class="hidden-xs">
    <img class="aseman-full-bg img-responsive img-container"  src="<?=baseUrl()?>/build/images/bk/<?=$images[$random_image]?>">
</div>

<div class="" style="position: ;">
    <?=$contentlogin?>
    </div>
</body>

</html>
