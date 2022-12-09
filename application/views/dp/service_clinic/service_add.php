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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>ServiceClinic">Pelayanan Klinik</a></li>
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
                            <h4 class="card-title">Pelayanan Klinik Baru</h4>
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
                                    <form method="POST" action="<?= base_url() ?>ServiceClinic/add" class="needs-validation" novalidate="">

                                        <div class="form-group">
                                            <label for="name_service_clinic">Nama Pelayanan Klinik</label>
                                            <input type="text" class="form-control" id="basicInput" name="name_service_clinic" require required placeholder="Masukkan Nama Pelayanan Klinik">
                                            <div class="invalid-feedback">
                                                Silahkan masukan nama pelayanan terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description_service_clinic">Deskripsi Pelayanan Klinik</label>
                                            <textarea type="text area" class="form-control" id="basicInput" name="description_service_clinic" require required placeholder="Masukkan Deskripsi Pelayanan Klinik"></textarea>
                                            <div class="invalid-feedback">
                                                Silahkan masukan deskripsi pelayanan terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="icon_service_clinic">Icon Pelayanan Klinik</label>
                                            <input type="text" class="form-control" id="basicInput" name="icon_service_clinic" require required placeholder="Masukkan Icon Pelayanan Klinik">
                                            <div class="invalid-feedback">
                                                Silahkan masukan icon pelayanan terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="menu">Warna</label>
                                            <select name="color" id="color" class="choices form-control">
                                                <option disabled selected>Pilih Warna</option>
                                                <option value="Biru">Biru</option>
                                                <option value="Oranye">Oranye</option>
                                                <option value="Hijau">Hijau</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan isi tipe warna terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="menu">Data AOS Delay</label>
                                            <select name="data_aos_delay" id="data_aos_delay" class="choices form-control">
                                                <option disabled selected>Pilih Data AOS Delay</option>
                                                <option value="200">200</option>
                                                <option value="300">300</option>
                                                <option value="400">400</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan isi tipe data delay terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="<?= base_url() ?>ServiceClinic" class="btn btn-warning">Kembali</a>
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