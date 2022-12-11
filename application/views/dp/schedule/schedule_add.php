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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>Schedule">Jadwal Praktek Dokter</a></li>
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
                            <h4 class="card-title">Jadwal Praktek Dokter Baru</h4>
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
                                    <form method="POST" action="<?= base_url() ?>Schedule/add" class="needs-validation" novalidate="">


                                        <div class="form-group">
                                            <label for="id_opening_hours">Jam Buka Praktek</label>
                                            <select name="id_opening_hours" id="id_opening_hours" class="choices form-control">
                                                <option disabled selected>Pilih Jam Buka Praktek</option>
                                                <?php foreach ($ClinicOpeningHours as $ClinicOpeningHours) : ?>
                                                    <option value="<?= $ClinicOpeningHours['id_opening_hours'] ?>"><?= $ClinicOpeningHours['opening_hours'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan pilih jam buka terlebih dahulu
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="day">Hari</label>
                                            <select name="day" id="day" class="choices form-control">
                                                <option disabled selected>Pilih Hari</option>
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumat">Jumat</option>
                                                <option value="Sabtu">Sabtu</option>
                                                <option value="Minggu">Minggu</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan isi hari terlebih dahulu
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="id_position">Posisi</label>
                                            <select name="id_position" id="id_position" class="choices form-control">
                                                <option disabled selected>Pilih Posisi</option>
                                                <?php foreach ($WorkerPosition as $WorkerPosition) : ?>
                                                    <option value="<?= $WorkerPosition['id_position'] ?>"><?= $WorkerPosition['position'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan pilih posisi terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="<?= base_url() ?>Schedule" class="btn btn-warning">Kembali</a>
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