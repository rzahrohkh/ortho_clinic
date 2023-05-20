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
                            <li class="breadcrumb-item active" aria-current="page">Detail Rekam Medis</li>
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
                    $this->load->view('dp/view_history_patient_medical_record/menu_detail_patient');
                    ?>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        Riwayat rekam medis pasien
                    </div>
                    
                     <div class="card-body">
                          <table class="table table-striped table-responsive" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Rekam Medis</th>
                                    <th>Tanggal Pemeriksaan</th>
                                    <th>Tipe Penanganan</th>
                                    <th>Ditangani eleh</th>
                                    <th>Status Penanganan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                              <?php foreach ($medicalRecord as $medicalRecord) : ?>
                                  <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $medicalRecord['id_medical_record'] ?></td>
                                    <td><?= $medicalRecord['inspection_date'] ?></td>
                                    <td><?= $medicalRecord['type_handling'] ?></td>
                                    <td>Dr. <?= $medicalRecord['name']?$medicalRecord['name']:'-' ?></td>
                                    <td><?= ucwords($medicalRecord['status_medical_record']) ?></td>
                                    
                                    <td style="width:25% ;">
                                            <a href="<?= base_url(); ?>ViewPatientHistory/detailMedicalRecord/<?= $medicalRecord['id_medical_record'] ?>" class="badge bg-success">Lihat detail rekam medis</a>
                                    </td>
                                   </tr>
                            </thead>  
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>