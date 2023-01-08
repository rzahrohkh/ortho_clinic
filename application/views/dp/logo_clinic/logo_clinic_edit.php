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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>role">Logo</a></li>
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
                            <h4 class="card-title">Edit Logo</h4>
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
                                     <?= form_open_multipart('LogoClinic/edit'); ?>
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="text" class="form-control" id="basicInput" hidden readonly name="id_logo" value="<?= $dataEdit['id_logo'] ?>" require required placeholder="Masukkan Logo">
                                            <div class="row">
                                            <div class="col-sm-3">
                                                <img src="<?= base_url('assets/images/logo/') . $dataEdit['logo']; ?>" class="img-thumbnail">
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control" id="image" name="image">
        
                                                </div>
                                            </div>
                                        </div>
                                            <div class="invalid-feedback">
                                                Silahkan masukan nama obat terlebih dahulu
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="purchase_price">Deskripsi Logo</label>
                                            <input type="text" class="form-control" id="basicInput" name="description" value="<?= $dataEdit['description'] ?>" required placeholder="Masukkan Deskripsi Logo">
                                            <div class="invalid-feedback">
                                                Silahkan masukan Deskripsi Logo terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="<?= base_url() ?>logoClinic" class="btn btn-warning">Kembali</a>
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