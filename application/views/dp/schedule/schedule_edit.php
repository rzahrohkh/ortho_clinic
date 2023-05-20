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
                            <h4 class="card-title">Edit Jadwal Praktek Dokter</h4>
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
                                    <form method="POST" action="<?= base_url() ?>Schedule/edit" class="needs-validation" novalidate="">

                                        <div class="form-group">
                                            <input type="text" class="form-control" id="basicInput" hidden readonly name="id_clinical_practice_schedule" value="<?= $dataEdit['id_clinical_practice_schedule'] ?>" require required placeholder="Masukkan Nama Jadwal Praktek">
                                            <div class="invalid-feedback">
                                                Silahkan masukan nama jadwal praktek terlebih dahulu
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="menu">Jam Buka Praktek</label>
                                            <select name="id_opening_hours" id="id_opening_hours" class="choices form-control">
                                                <?php foreach ($ClinicOpeningHours as $ClinicOpeningHours) : ?>
                                                    <?php if ($dataEdit['id_opening_hours'] == $ClinicOpeningHours['id_opening_hours']) : ?>
                                                        <option value="<?= $ClinicOpeningHours['id_opening_hours'] ?>" selected><?= $ClinicOpeningHours['opening_hours'] ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $ClinicOpeningHours['id_opening_hours'] ?>"><?= $ClinicOpeningHours['opening_hours'] ?></option>
                                                    <?php endif ?>
                                                <?php endforeach; ?>
                                                <option disabled>Pilih Jam Buka Praktek</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan pilih jam buka praktek terlebih dahulu
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="day">Hari</label>
                                            <select name="day" id="day" class="choices form-control">
                                                <option disabled selected>Pilih Hari</option>
                                                <?php if ($dataEdit['day'] == 'Senin') : ?>
                                                    <option value="Senin" selected>Senin</option>
                                                <?php else : ?>
                                                    <option value="Senin">Senin</option>
                                                <?php endif ?>

                                                <?php if ($dataEdit['day'] == 'Selasa') : ?>
                                                    <option value="Selasa" selected>Selasa</option>
                                                <?php else : ?>
                                                    <option value="Selasa">Selasa</option>
                                                <?php endif ?>

                                                <?php if ($dataEdit['day'] == 'Rabu') : ?>
                                                    <option value="Rabu" selected>Rabu</option>
                                                <?php else : ?>
                                                    <option value="Rabu">Rabu</option>
                                                <?php endif ?>

                                                <?php if ($dataEdit['day'] == 'Kamis') : ?>
                                                    <option value="Kamis" selected>Kamis</option>
                                                <?php else : ?>
                                                    <option value="Kamis">Kamis</option>
                                                <?php endif ?>

                                                <?php if ($dataEdit['day'] == 'Jumat') : ?>
                                                    <option value="Jumat" selected>Jumat</option>
                                                <?php else : ?>
                                                    <option value="Jumat">Jumat</option>
                                                <?php endif ?>

                                                <?php if ($dataEdit['day'] == 'Sabtu') : ?>
                                                    <option value="Sabtu" selected>Sabtu</option>
                                                <?php else : ?>
                                                    <option value="Sabtu">Sabtu</option>
                                                <?php endif ?>

                                                <?php if ($dataEdit['day'] == 'Minggu') : ?>
                                                    <option value="Minggu" selected>Minggu</option>
                                                <?php else : ?>
                                                    <option value="Minggu">Minggu</option>
                                                <?php endif ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan isi hari terlebih dahulu
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="menu">Posisi</label>
                                            <select name="id_position" id="id_position" class="choices form-control">
                                                <?php foreach ($WorkerPosition as $WorkerPosition) : ?>
                                                    <?php if ($dataEdit['id_position'] == $WorkerPosition['id_position']) : ?>
                                                        <option value="<?= $WorkerPosition['id_position'] ?>" selected><?= $WorkerPosition['position'] ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $WorkerPosition['id_position'] ?>"><?= $WorkerPosition['position'] ?></option>
                                                    <?php endif ?>
                                                <?php endforeach; ?>
                                                <option disabled>Pilih Jam Buka Praktek</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan pilih jam buka praktek terlebih dahulu
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