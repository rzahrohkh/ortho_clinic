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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>unit">Unit</a></li>
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
                            <h4 class="card-title">Edit Unit</h4>
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
                                    <form method="POST" action="<?= base_url() ?>Unit/edit" class="needs-validation" novalidate="">

                                        <div class="form-group">
                                            <label for="unit_name">Nama Unit</label>
                                            <input type="text" class="form-control" id="basicInput" hidden readonly name="id_unit" value="<?= $dataEdit['id_unit'] ?>" require required placeholder="Masukkan Nama Unit">
                                            <input type="text" class="form-control" id="basicInput" name="unit_name" value="<?= $dataEdit['unit_name'] ?>" require required placeholder="Masukkan Nama Unit">
                                            <div class="invalid-feedback">
                                                Silahkan masukan nama unit terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="unit_note">Catatan Unit</label>
                                            <input type="text" class="form-control" id="basicInput" name="unit_note" value="<?= $dataEdit['unit_note'] ?>" require required placeholder="Masukkan Catatan Unit">
                                            <div class="invalid-feedback">
                                                Silahkan masukan nama unit terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="unit_abbreviation">Singkatan Unit</label>
                                            <input type="text" class="form-control" id="basicInput" name="unit_abbreviation" value="<?= $dataEdit['unit_abbreviation'] ?>" require required placeholder="Masukkan Singkatan Unit">
                                            <div class="invalid-feedback">
                                                Silahkan masukan nama unit terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="menu">Tipe Unit</label>
                                            <select name="unit_type" id="unit_type" class="choices form-control">
                                                <option disabled selected>Pilih Tipe Unit</option>
                                                <?php if ($dataEdit['unit_type'] == 'mass') : ?>
                                                    <option value="mass" selected>Masa</option>
                                                <?php else : ?>
                                                    <option value="mass">Masa</option>
                                                <?php endif ?>
                                                <?php if ($dataEdit['unit_type'] == 'length') : ?>
                                                    <option value="length" selected>Panjang</option>
                                                <?php else : ?>
                                                    <option value="length">Panjang</option>
                                                <?php endif ?>
                                                <?php if ($dataEdit['unit_type'] == 'temperature') : ?>
                                                    <option value="temperature" selected>Temperatur</option>
                                                <?php else : ?>
                                                    <option value="temperature">Temperatur</option>
                                                <?php endif ?>

                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan isi tipe unit terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="<?= base_url() ?>Unit" class="btn btn-warning">Kembali</a>
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