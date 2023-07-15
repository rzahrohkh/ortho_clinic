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
                <div class="row">
                    <?php
                    $this->load->view('dp/view_history_patient_medicine/menu_detail_patient');
                    ?>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        Riwayat Obat yang di konsumsi oleh pasien
                    </div>
                     
                     <div class="card-body">
                        <div>
                            <a href="<?=base_url() ?>ViewPatientHistory/generateHistoryMedicinePdf/<?=$id?>" class="btn icon icon-left btn-success">
                            Download Riwayat Obat Pasien</a>
                        </div> 
                          <table class="table table-striped table-responsive" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th scope="col">Tanggal Submit Obat</th>
                                   
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($medicines as $drugs) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $drugs['date_drugs_patient'] ?></td>
                                        <?php
                                            $delimiter = ' ';
                                            $words = explode($delimiter,$drugs['date_drugs_patient']);
                                            $date= $words[0];
                                            $detailUrl ="$date|$id";
                                        ?>
                                        <td style="width:25% ;">
                                            <a href="<?= base_url(); ?>ViewPatientHistory/detailMedicine/<?= $detailUrl ?>" class="badge bg-success">Lihat Obat yang dikonsumsi</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>