<!-- Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023 -->
<?php
    function bgcolor(){ return sprintf('#%06X', mt_rand(0, 0xFFFFFF));}
?>
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">
                    <?php foreach($menu as $menu):?>
                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="<?= base_url() ?><?=$menu['url']?>">
                            <div class="card" style="height: 80%;">
                                <div class=" card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="px-1 col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                                            <div class="stats-icon green" style="background-color:<?=bgcolor()?>";>
                                                <i class="<?=str_replace('bi ','',$menu['icon']);?>"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
                                            <h6 class="text font-extrabold mt-2"><?=$menu['title']?></h6>
                                            <!-- <h6 class="font-extrabold mb-0">Kegiatan Harian Anda</h6> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>

        </section>
    </div>