<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?= $title ?></title>
    <meta content="" name="description">

    <meta content="" name="keywords">
<?php
$logo = $this->db->query("SELECT logo FROM logo_clinic WHERE id_logo = 2")->row_array();
?>
    <!-- Favicons -->
    <link href="<?php base_url() ?>assets/images/logo/<?=$logo['logo']?>" rel="icon">
    <link href="<?php base_url() ?>asset_landing/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="<?php base_url() ?>stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php base_url() ?>asset_landing/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?php base_url() ?>asset_landing/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php base_url() ?>asset_landing/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php base_url() ?>asset_landing/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?php base_url() ?>asset_landing/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?php base_url() ?>asset_landing/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php base_url() ?>asset_landing/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>