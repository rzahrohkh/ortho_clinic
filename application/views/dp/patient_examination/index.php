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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $title ?></li>
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
                </div>
                <div class="card">
                    <div class="card-header">
                        Data Lihat Pasien
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
                                    <th>Nomor Rekam Medis</th>
                                    <th>Nama pasien</th>
                                    <th>Pemeriksaan Awal Oleh</th>
                                    <th>Di Periksa Oleh</th>
                                    <th>Status Pemeriksaan</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($inspections as $inspections) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $inspections['id_patient'] ?></td>
                                        <td><?= ucwords($inspections['name_patient']) ?></td>
                                        <td><?= ucwords($inspections['preInspectionBy']) ?></td>
                                        <?php $inspectionBy =ucwords($inspections['inspectionBy']);?>
                                        <td><?= $inspections['inspectionBy']?"Dr. $inspectionBy":"-" ?></td>
                                        <td><?= ucwords($inspections['status_medical_record']) ?></td>
                                        <td style="width:25% ;">
                                            <a href="<?= base_url(); ?>ViewPatientHistory/historyMedicalRecord/<?= $inspections['id_patient']; ?>" class="badge bg-warning">Lihat Riwayat Rekam Medis</a>
                                            <?php if($inspections['status_medical_record']=='belum diperiksa'):?>
                                            <a href="<?= base_url(); ?>patientExamination/edit/<?= $inspections['id_medical_record']; ?>" class="badge bg-success">Mulai Pemeriksaan</a>
                                            <?php endif;?>

                                           <?php if($inspections['status_medical_record']=='resep belum dibuat'):
                                            ?>
                                            <a href="<?= base_url(); ?>PrececptionNewFromMR/add/<?= $inspections['id_medical_record']; ?>|<?=$inspections['id_patient']?>" class="badge bg-success">Buat Resep</a>
                                            <?php endif;?>
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