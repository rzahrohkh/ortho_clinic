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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>LandingProfile">Profil Klinik</a></li>
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
                            <h4 class="card-title">Edit Profil Klinik</h4>
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
                                    <form method="POST" action="<?= base_url() ?>landingProfile/edit" class="needs-validation" novalidate="">

                                        <div class="form-group">
                                            <label for="description_profile">Deskripsi Profil</label>
                                            <!-- <textarea class="form-control" id="basicInput" rows="3" hidden readonly name="id_profile" value="<?= $dataEdit['id_profile'] ?>" require required placeholder="Masukkan Deskripsi Profil"></textarea> -->
                                            <input type="text area" class="form-control" id="basicInput" hidden readonly name="id_profile" value="<?= $dataEdit['id_profile'] ?>" require required placeholder="Masukkan Deskripsi Profil">
                                            <textarea class="form-control summernote" id="basicInput" rows="3" name="description_profile" require required placeholder="Masukkan Deskripsi Profil"><?= $dataEdit['description_profile'] ?></textarea>
                                            <!-- <input type="text area" class="form-control" id="basicInput" name="description_profile" value="<?= $dataEdit['description_profile'] ?>" require required placeholder="Masukkan Deskripsi Profil"> -->
                                            <div class="invalid-feedback">
                                                Silahkan masukan deskripsi terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="operational_hour">Jam Operasional</label>
                                            <textarea type="text area" class="form-control summernote" id="basicInput" name="operational_hour" require required placeholder="Masukkan Jam Operasional"><?= $dataEdit['operational_hour'] ?></textarea>
                                            <div class="invalid-feedback">
                                                Silahkan masukan jam operasional terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer_service">Pelayanan Klinik</label>
                                            <textarea type="text area" class="form-control summernote" id="basicInput" name="customer_service" require required placeholder="Masukkan Pelayanan Klinik"><?= $dataEdit['customer_service'] ?></textarea>
                                            <div class="invalid-feedback">
                                                Silahkan masukan pelayanan klinik terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="<?= base_url() ?>landingProfile" class="btn btn-warning">Kembali</a>
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