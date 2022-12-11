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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>ClinicOpeningHours">Jam Buka Praktek</a></li>
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
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Jam Buka Praktek Baru</h4>
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
                                    <form method="POST" action="<?= base_url() ?>ClinicOpeningHours/add" class="needs-validation" novalidate="">

                                        <div class="form-group">
                                            <label for="opening_hours">Jam Buka Praktek</label>
                                            <input type="text" class="form-control" id="basicInput" name="opening_hours" require required placeholder="Masukkan Jam Buka Praktek">
                                            <div class="invalid-feedback">
                                                Silahkan masukan jam buka praktek terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description_opening_hours">Deskripsi Jam Buka Praktek</label>
                                            <input type="text" class="form-control" id="basicInput" name="description_opening_hours" require required placeholder="Masukkan Deskripsi Jam Buka Praktek">
                                            <div class="invalid-feedback">
                                                Silahkan masukan deskripsi jam buka praktek terlebih dahulu
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <a href="<?= base_url() ?>drugs" class="btn btn-warning">Kembali</a>
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