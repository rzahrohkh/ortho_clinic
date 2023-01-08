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
            <div class="col-12">
                <div class="row">
                </div>
                <div class="card">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if (validation_errors()) : ?>
                                        <div class="alert alert-danger alert-dismissible show fade">
                                            <?= validation_errors() ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>
                                    <form method="POST" action="<?= base_url() ?>PatientDrug" class="needs-validation" novalidate="">

                                        <div class="form-group">
                                            <label for="drug_name">Obat Pagi Yang Di Konsumsi</label>
                                           <div class="form-floating">
                                                <textarea class="form-control mb-3 summernote" name="obat_pagi" id="summernote"
                                                    placeholder="Contoh: 1. Paracetamol, aturan minum 3x1 hari"
                                                    id="floatingTextarea2" style="height: 100px"></textarea>
                                            </div>
                                            <div class="invalid-feedback">
                                                Silahkan masukan obat pagi terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="drug_name">Obat Siang Yang Di Konsumsi</label>
                                           <div class="form-floating">
                                                <textarea class="form-control mb-3 summernote" name="obat_siang" id="summernote"
                                                    placeholder="Contoh: 1. Paracetamol, aturan minum 3x1 hari"
                                                    id="floatingTextarea2" style="height: 100px"></textarea>
                                            </div>
                                            <div class="invalid-feedback">
                                                Silahkan masukan obat Siang terlebih dahulu
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="drug_name">Obat Malam Yang Di Konsumsi</label>
                                           <div class="form-floating">
                                                <textarea class="form-control mb-3 summernote" name="obat_malam" id="summernote"
                                                    placeholder="Contoh: 1. Paracetamol, aturan minum 3x1 hari"
                                                    id="floatingTextarea2" style="height: 100px"></textarea>
                                            </div>
                                            <div class="invalid-feedback">
                                                Silahkan masukan obat Malam terlebih dahulu
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

        </section>
    </div>