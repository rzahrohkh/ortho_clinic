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
                            <h4 class="card-title">Edit Pelayanan Klinik</h4>
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
                                    <form method="POST" action="<?= base_url() ?>ServiceClinic/edit" class="needs-validation" novalidate="">

                                        <!-- <div class="form-group">
                                            <label for="name_service_clinic">Nama Pelayanan Klinik</label>
                                            <input type="text area" class="form-control" id="basicInput" hidden readonly name="id_service_clinic" value="<?= $dataEdit['id_service_clinic'] ?>" require required placeholder="Masukkan Nama Pelayanan Klinik">
                                            <textarea type="text area" class="form-control" id="basicInput" name="name_service_clinic" require required placeholder="Masukkan Nama Pelayanan Klinik"><?= $dataEdit['name_service_clinic'] ?></textarea>
                                            <div class="invalid-feedback">
                                                Silahkan masukan nama pealayanan klinik terlebih dahulu
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label for="name_service_clinic">Nama Pelayanan Klinik</label>
                                            <input type="text" class="form-control" id="basicInput" hidden readonly name="id_service_clinic" value="<?= $dataEdit['id_service_clinic'] ?>" require required placeholder="Masukkan Nama Pelayanan Klinik">
                                            <input type="text" class="form-control" id="basicInput" name="name_service_clinic" value="<?= $dataEdit['name_service_clinic'] ?>" require required placeholder="Masukkan Nama Pelayanan Klinik">
                                            <div class="invalid-feedback">
                                                Silahkan masukan nama pelayanan klinik terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description_service_clinic">Deskripsi Pelayanan Klinik</label>
                                            <input type="text area" class="form-control" id="basicInput" hidden readonly name="id_service_clinic" value="<?= $dataEdit['id_service_clinic'] ?>" require required placeholder="Masukkan Nama Pelayanan Klinik">
                                            <textarea type="text area" class="form-control" id="basicInput" name="description_service_clinic" require required placeholder="Masukkan Nama Pelayanan Klinik"><?= $dataEdit['description_service_clinic'] ?></textarea>
                                            <div class="invalid-feedback">
                                                Silahkan masukan deskripsi pelayanan klinik terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="icon_service_clinic">Icon Pelayanan Klinik</label>
                                            <input type="text" class="form-control" id="basicInput" name="icon_service_clinic" value="<?= $dataEdit['icon_service_clinic'] ?>" require required placeholder="Masukkan Icon Pelayanan Klinik">
                                            <div class="invalid-feedback">
                                                Silahkan masukan icon pelayanan klinik terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="color">Warna</label>
                                            <select name="color" id="color" class="choices form-control">
                                                <option disabled selected>Pilih Warna</option>
                                                <?php if ($dataEdit['color'] == 'Biru') : ?>
                                                    <option value="Biru" selected>Biru</option>
                                                <?php else : ?>
                                                    <option value="Biru">Biru</option>
                                                <?php endif ?>
                                                <?php if ($dataEdit['color'] == 'Oranye') : ?>
                                                    <option value="Oranye" selected>Oranye</option>
                                                <?php else : ?>
                                                    <option value="Oranye">Oranye</option>
                                                <?php endif ?>
                                                <?php if ($dataEdit['color'] == 'Hijau') : ?>
                                                    <option value="Hijau" selected>Hijau</option>
                                                <?php else : ?>
                                                    <option value="Hijau">Hijau</option>
                                                <?php endif ?>
                                            </select>
                                            <div class="form-group">
                                                <label for="data_aos_delay">Data AOS Delay</label>
                                                <select name="data_aos_delay" id="data_aos_delay" class="choices form-control">
                                                    <option disabled selected>Pilih Data</option>
                                                    <?php if ($dataEdit['data_aos_delay'] == '200') : ?>
                                                        <option value="200" selected>200</option>
                                                    <?php else : ?>
                                                        <option value="200">200</option>
                                                    <?php endif ?>
                                                    <?php if ($dataEdit['data_aos_delay'] == '300') : ?>
                                                        <option value="300" selected>300</option>
                                                    <?php else : ?>
                                                        <option value="300">300</option>
                                                    <?php endif ?>
                                                    <?php if ($dataEdit['data_aos_delay'] == '400') : ?>
                                                        <option value="400" selected>400</option>
                                                    <?php else : ?>
                                                        <option value="400">400</option>
                                                    <?php endif ?>
                                                </select>
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