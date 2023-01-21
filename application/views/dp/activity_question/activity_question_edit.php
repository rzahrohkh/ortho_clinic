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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>role">Pertanyaan Aktivitas</a></li>
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
                            <h4 class="card-title">Edit Pertanyaan Aktivitas</h4>
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
                                    <form method="POST" action="<?= base_url() ?>ActivityQuestion/edit" class="needs-validation" novalidate="">
                                         <div class="form-group">
                                            <label for="menu">Tipe Aktifitas</label>
                                            <select name="id_activity_type" id="id_activity_type" class="choices form-control">
                                                <option disabled selected>Pilih Tipe Aktifitas</option>
                                                <?php foreach ($activityType as $activityType) : ?>
                                                    <?php if ($dataEdit['id_activity_type'] == $activityType['id_activity_type']) : ?>
                                                        <option value="<?= $activityType['id_activity_type']; ?>" selected> <?= $activityType['activity_type'] ?></option>
                                                    <?php else : ?>
                                                        <option value="<?= $activityType['id_activity_type']; ?>"> <?= $activityType['activity_type'] ?></option>
                                                    <?php endif ?>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">
                                                Silahkan isi tipe obat terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="activity_question">Pertanyaan Aktivitas</label>
                                            <input type="text" class="form-control" id="basicInput" hidden readonly name="id_activity_question" value="<?= $dataEdit['id_activity_question'] ?>" require required placeholder="Masukkan Pertanyaan Aktivitas">
                                            <input type="text" class="form-control" id="basicInput" name="activity_question" value="<?= $dataEdit['activity_question'] ?>" require required placeholder="Masukkan Pertanyaan Aktivitas">
                                            <div class="invalid-feedback">
                                                Silahkan masukan pertanyaan aktivitas terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="<?= base_url() ?>ActivityQuestion" class="btn btn-warning">Kembali</a>
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