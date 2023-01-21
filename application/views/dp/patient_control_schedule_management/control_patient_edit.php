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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>PatientControlScheduleManagement">Manajemen Jadwal Kontrol Pasien</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>PatientControlScheduleManagement/viewHistory/<?=$id?>">Riwayat</a></li>
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
                            <h4 class="card-title">Jadwal Kontrol Baru</h4>
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
                                    <form method="POST" action="<?= base_url() ?>PatientControlScheduleManagement/edit" class="needs-validation" novalidate="">

                                       <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Rekam
                                                Medis</label>
                                            <div class="col-sm-12 col-md-7">
                                                   <input type="text" class="form-control" id="basicInput" hidden readonly name="id_control_patient" value="<?= $dataEdit['id_control_patient'] ?>" require required placeholder="Masukkan Nama Obat">
                                                <input type="text" name="id_patient" value="<?= $dataPatient["id_patient"] ?>" class="form-control" readonly autofocus placeholder="Masukan nomor rekam medis" tabindex="1">
                                                <div class="invalid-feedback">
                                                    Nomor rekam medis tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                            </label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="name_patient" class="form-control" value="<?= $dataPatient["name_patient"] ?>" readonly required autofocus placeholder="Masukan nama pasien" tabindex="1">
                                                <div class="invalid-feedback">
                                                    Silahkan isi nama pasien terlebih dahulu
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="nik_patient" class="form-control" value="<?= $dataPatient["nik_patient"] ?>" readonly required autofocus placeholder="Masukan NIK pasien" tabindex="1">
                                                <div class="invalid-feedback">
                                                    NIK tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Jadwal Kontrol</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input class="form-control" type="date" id="example-month-input" value="<?= $dataEdit["date_control_patient"] ?>"  name="date_control_patient" required autofocus>

                                                <div class="invalid-feedback">
                                                    Silahkan isi Tanggal terlebih dahulu
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="<?= base_url() ?>PatientControlScheduleManagement/viewHistory/<?=$id?>" class="btn btn-warning">Kembali</a>
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