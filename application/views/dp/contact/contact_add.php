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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>ContactClinic">Kontak</a></li>
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
                            <h4 class="card-title">Kontak Baru</h4>
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
                                    <form method="POST" action="<?= base_url() ?>ContactClinic/add" class="needs-validation" novalidate="">

                                        <div class="form-group">
                                            <label for="title_contact">Nama Kontak</label>
                                            <input type="text" class="form-control" id="basicInput" name="title_contact" require required placeholder="Masukkan Nama Kontak">
                                            <div class="invalid-feedback">
                                                Silahkan masukan nama kontak terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="value_contact">Isi Kontak</label>
                                            <input type="text" class="form-control" id="basicInput" name="value_contact" require required placeholder="Masukkan Isi Kontak">
                                            <div class="invalid-feedback">
                                                Silahkan masukan isi kontak terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="menu">Tipe Kontak</label>
                                            <select name="type_contact" id="type_contact" class="choices form-control">
                                                <option disabled selected>Pilih Tipe Kontak</option>
                                                <option value="sosmed">Sosmed</option>
                                                <option value="non sosmed">Non Sosmed</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan isi tipe sosmed terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="icon_contact">Icon Kontak</label>
                                            <input type="text" class="form-control" id="basicInput" name="icon_contact" require required placeholder="Masukkan Icon Kontak">
                                            <div class="invalid-feedback">
                                                Silahkan masukan icon kontak terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="class">Kelas Kontak</label>
                                            <input type="text" class="form-control" id="basicInput" name="class" require required placeholder="Masukkan Kelas Kontak">
                                            <div class="invalid-feedback">
                                                Silahkan masukan kelas kontak terlebih dahulu
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