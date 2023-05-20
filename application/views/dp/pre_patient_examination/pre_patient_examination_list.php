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
                    $this->load->view('dp/pre_patient_examination/menu_detail_patient');
                    ?>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        Riwayat pemeriksaan awal pasien
                    </div>
                    <div class="d-flex flex-row-reverse" style="margin-right: 3% ; margin-button: 1%;">
                        <a href="<?= base_url(); ?>PrePatientExamination/add/<?=$id?>" class="btn btn-success"> + Buat Pemeriksaan Awal Baru</a>
                    </div>
                     <div class="card-body">
                        <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash') ?>">
                        </div>
                        <div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data') ?>">
                        </div>
                          <table class="table table-striped table-responsive" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No Pemeriksaan Awal</th>
                                    <th>Ditangani oleh id perawat</th>
                                   
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                              <?php foreach ($preMedicalRecord as $preMedicalRecord) : ?>
                                   <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $preMedicalRecord['id_pre_medical_record'] ?></td>
                                    <td><?= $preMedicalRecord['id_user'] ?></td>
                                    
                                    <td style="width:25% ;">
                                            <a href="<?= base_url(); ?>PrePatientExamination/detailPreMedicalRecord/<?= $preMedicalRecord['id_pre_medical_record'] ?>" class="badge bg-success">Lihat detail</a>
                                            <a href="<?= base_url(); ?>PrePatientExamination/edit/<?= $preMedicalRecord['id_pre_medical_record']; ?>" class="badge bg-warning">Ubah</a>
                                            <a href="<?= base_url(); ?>PrePatientExamination/delete/<?= $preMedicalRecord['id_pre_medical_record']; ?>" class="badge bg-danger hapus-news">Hapus</a>
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