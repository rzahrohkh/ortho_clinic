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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>role">Obat</a></li>
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
                            <h4 class="card-title">Obat Baru</h4>
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
                                    <form method="POST" action="<?= base_url() ?>drugs/add" class="needs-validation" novalidate="">

                                        <div class="form-group">
                                            <label for="drug_name">Nama Obat</label>
                                            <input type="text" class="form-control" id="basicInput" name="drug_name" require required placeholder="Masukkan Nama Obat">
                                            <div class="invalid-feedback">
                                                Silahkan masukan nama obat terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="menu">Tipe Obat</label>
                                            <select name="drug_type" id="drug_type" class="choices form-control">
                                                <option disabled selected>Pilih Tipe Obat</option>
                                                <option value="Sirup">Sirup</option>
                                                <option value="Pill">Pill</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan isi tipe obat terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="stock">Stok Obat</label>
                                            <input type="number" class="form-control" id="basicInput" name="stock" required placeholder="Jumlah Stok">
                                            <div class="invalid-feedback">
                                                Silahkan masukan stok terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="menu">Unit2</label>
                                            <select name="unit" id="unit" class="choices form-control">
                                                <option disabled selected>Pilih Tipe Obat</option>
                                                <?php foreach ($unit as $unit) : ?>
                                                    <option value="<?= $unit['unit_name'] ?>"><?= $unit['unit_name'] ?> <?= $unit['unit_abbreviation'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan isi tipe obat terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exp_date">Tanggal Expired</label>
                                            <input type="date" class="form-control" id="basicInput" name="exp_date" required placeholder="Masukkan Tanggal Expired">
                                            <div class="invalid-feedback">
                                                Silahkan masukan tanggal expired terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="selling_price">Harga Jual Obat</label>
                                            <input type="number" class="form-control" id="basicInput" name="selling_price" required placeholder="Masukkan Harga Jual Obat">
                                            <div class="invalid-feedback">
                                                Silahkan masukan harga jual obat terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="purchase_price">Harga Beli Obat</label>
                                            <input type="number" class="form-control" id="basicInput" name="purchase_price" required placeholder="Masukkan Harga Beli Obat">
                                            <div class="invalid-feedback">
                                                Silahkan masukan harga beli obat terlebih dahulu
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