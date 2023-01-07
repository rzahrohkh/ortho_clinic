<!DOCTYPE html>
<html lang="en">
<?php
$logo = $this->db->query("SELECT logo FROM logo_clinic WHERE id_logo = 2")->row_array();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo/<?=$logo['logo']?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo/<?=$logo['logo']?>" type="image/png">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/shared/iconly.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/pages/simple-datatables.css">
    <link href="<?= base_url() ?>assets_user/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/extensions/choices.js/public/assets/styles/choices.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="<?= base_url() ?>assets_user/libs/summernote/summernote-bs4.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/main/myCSS.css">
</head>

<body>
    <div id="app">