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
            <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash') ?>">
            </div>
            <div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data') ?>">
            </div>
            <div class="flash-data-fail" data-flashdata="<?= $this->session->flashdata('flashFail') ?>">
            </div>
            <?= $this->session->flashdata('message'); ?>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Aktifitas Harian Anda</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if (validation_errors()) : ?>
                                        <div class="alert alert-danger alert-dismissible show fade">
                                            <?= validation_errors() ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>
                                    <form method="POST" action="<?= base_url() ?>PatientActivity/save" class="needs-validation" novalidate="">
                            
                                <div class="form-group">
                                    <?php foreach ($dataActivityType as $dataActivityType ) : ?>
                                    </br>
                                    <h6><?=$dataActivityType['activity_type']?></h6>

                                    <?php
                                        $idActivityType = $dataActivityType['id_activity_type'];
                                        $queryActivityQuestion = $this->db->query("SELECT * FROM activity_question WHERE id_activity_type = $idActivityType")->result_array();
                                    ?>
                                        <?php foreach ($queryActivityQuestion as $dataActivityQuestion) : ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                id="<?= $dataActivityQuestion['id_activity_question']; ?>"
                                                value="<?= $dataActivityQuestion['activity_question']; ?>"
                                                name="<?= $dataActivityQuestion['id_activity_question']; ?>">
                                            <label class="form-check-label"
                                                for="<?= $dataActivityQuestion['id_activity_question']; ?>"><?=$dataActivityQuestion['activity_question']?></label>
                                        </div>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                    <label for="" class="mt-3"><span style="color :red">Catatan : silakan centang aktifitas selama sehari yang
                                            telah anda lakukan</span></label>
                                        <div class="form-group">
                                            <a href="<?= base_url() ?>patient" class="btn btn-warning">Kembali</a>
                                            <button type="submit" class="btn icon icon-left btn-success"><i data-feather="check-circle"></i>
                                                Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </section>