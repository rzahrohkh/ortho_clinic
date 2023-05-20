<!-- Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023 -->
<!DOCTYPE html>
<html lang="en">
<?php
$logo = $this->db->query("SELECT logo FROM logo_clinic WHERE id_logo = 2")->row_array();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/pages/auth.css">
    <link rel="shortcut icon" href="<?php base_url() ?>assets/images/logo/<?=$logo['logo']?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php base_url() ?>assets/images/logo/<?=$logo['logo']?>" type="image/png">
</head>

<body>