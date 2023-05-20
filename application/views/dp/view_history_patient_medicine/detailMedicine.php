<!-- Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023 -->
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3><?php echo $title ?></h3>
                    <p class="text-subtitle text-muted">Ini Adalah Halaman <?php echo $title ?></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <?php
                            if($dataUser['role']=="Admin"):
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
                            <?php
                            elseif($dataUser['role']=="Perawat"):
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>nurse">Dashboard</a></li>
                            <?php
                            endif;
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>ViewPatientHistory">Lihat Riwayat Pasien</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Pasien</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
               
                
                <div class="card">
                    <div class="card-header">
                        Detail Riwayat Obat yang di konsumsi oleh pasien
                    </div>
                    
                     <div class="card-body">
                       <form method="POST" action="<?=base_url()?>obatpasien/save" class="needs-validation"
                                novalidate="">
                                
                                <div class="form-group">
                                    <h4 for=""><span style="font-size:medium">Obat Pagi</span></h4>
                                    <div class="row">
                                        <div class="col">
                                            
                                            <?=$obat_pagi?>
                                        </div>
                                    </div>
                                    <hr class="mt-2 mb-3"/>
                                    <h4 for=""><span style="font-size:medium">Obat Siang</span></h4>
                                    <div class="row">
                                        <div class="col">
                                        <?=$obat_siang?>
                                            
                                        </div>
                                    </div>
                                    <hr class="mt-2 mb-3"/>
                                    <h4 for=""><span style="font-size:medium">Obat Malam</span></h4>
                                    <div class="row">
                                        <div class="col">
                                            
                                        <?=$obat_malam?>
                                        </div>
                                    </div>
                                    <hr class="mt-2 mb-3"/>
                                    
                                </div>
                              
                            </form>
                         <a href="<?= base_url() ?>ViewPatientHistory/historyMedicine/<?= $id?>" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
            </div>

        </section>
    </div>