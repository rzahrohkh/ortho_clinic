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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>users">User</a></li>
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
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible show fade">
                    <?= validation_errors() ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">User Baru</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="<?= base_url(); ?>users/edit" class="needs-validation" novalidate="">
                                <input type="text" hidden disable name="id_user" class="form-control" value="<?= $dataEdit['id_user'] ?>">
                                <div class="form-group row mb-4">
                                    <label class=" col-form-label text-md-right col-12 col-md-3 col-lg-3">Role User</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="custom-select choices form-control" required autofocus name="role_id">
                                            <option selected disabled>Pilih role</option>
                                            <?php
                                            foreach ($role as $role) :
                                            ?>
                                                <?php if ($dataEdit['role_id'] == $role['role_id']) : ?>
                                                    <option value="<?= $role['role_id'] ?>" selected><?= $role['role'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $role['role_id'] ?>"><?= $role['role'] ?></option>
                                                <?php endif ?>

                                            <?php
                                            endforeach
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Jenis pegawai tidak boleh kosong
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="name" value="<?= $dataEdit['name'] ?>" class=" form-control" required autofocus tabindex="1" placeholder="Masukkan nama">
                                        <div class="invalid-feedback">
                                            Silahkan isi nama pegawai terlebih dahulu
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="username" value="<?= $dataEdit['username'] ?>" class=" form-control" required autofocus tabindex="1" placeholder="Masukkan username">
                                        <div class="invalid-feedback">
                                            Silahkan isi username pegawai terlebih dahulu
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4" hidden>
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="password" value="<?= $dataEdit['password'] ?>" class=" form-control" required autofocus tabindex="1" placeholder="Masukkan password">
                                        <div class="invalid-feedback">
                                            Password tidak boleh kosong!
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal
                                        lahir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input class="form-control" type="date" value="<?= $dataEdit['date_of_birth'] ?>" name="date_of_birth" value="2021-01" id="example-month-input" name="date_of_birth" required autofocus>

                                        <div class="invalid-feedback">
                                            Silahkan isi Tanggal lahir anda terlebih dahulu
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Umur</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" name="age" value="<?= $dataEdit['age'] ?>" class="form-control" required autofocus tabindex="1" placeholder="Masukan umur">
                                        <div class="invalid-feedback">
                                            Silahkan isi umur pasien
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                        Kelamin</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="custom-select choices form-control" required autofocus name="gender">
                                            <option selected disabled>Pilih jenis kelamin</option>
                                            <?php if ($dataEdit['gender'] == "Pria") : ?>
                                                <option value="Pria" selected>Pria</option>
                                            <?php else : ?>
                                                <option value="Pria">Pria</option>
                                            <?php endif ?>
                                            <?php if ($dataEdit['gender'] == "Wanita") : ?>
                                                <option value="Wanita" selected>Wanita</option>
                                            <?php else : ?>
                                                <option value="Wanita">Wanita</option>
                                            <?php endif ?>

                                        </select>
                                        <div class="invalid-feedback">
                                            Jenis kelamin tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="form-control" id="address" name="address" require required placeholder="Masukkan Alamat"><?= $dataEdit['address'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="menu">Status Aktif User</label>
                                    <br>
                                    <label class="custom-switch mt-2">
                                        <?php if ($dataEdit['is_active'] == '1') : ?>
                                            <input type="checkbox" name="is_active" class="custom-switch-input" checked>
                                        <?php else : ?>
                                            <input type="checkbox" name="is_active" class="custom-switch-input">
                                        <?php endif; ?>
                                        <span class="custom-switch-indicator"></span>
                                        <span class="custom-switch-description">Aktif</span>
                                    </label>
                                    <div class="invalid-feedback">
                                        Silahkan centang terlebih dahulu
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a href="<?= base_url() ?>users" class="btn btn-warning">Kembali</a>
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