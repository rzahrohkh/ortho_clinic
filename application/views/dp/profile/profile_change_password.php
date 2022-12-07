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
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <figure class="avatar mr-2 avatar-lg">
                                            <img src="<?= base_url() ?>assets_user/img/avatar/avatar-1.png" alt="...">
                                        </figure>
                                    </div>
                                    <div class="col-auto">
                                        <h5 style="font-weight: bold;color:black;">
                                            <?= $name ?>
                                        </h5>
                                        Jenis Akun: <?= $role ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <?= $this->session->flashdata('Message'); ?>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item"><a href="<?= base_url() ?>profile" class="nav-link ">Profil</a></li>
                                    <li class="nav-item"><a href="<?= base_url() ?>profile/password" class="nav-link active">Ganti kata sandi</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">

                        <?= $this->session->flashdata('message'); ?>
                        <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash') ?>">

                        </div>
                        <div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data') ?>">
                        </div>
                        <div class="flash-data-fail" data-flashdata="<?= $this->session->flashdata('flash') ?>">
                            <form method="post" id="setting-form" action="">
                                <div class="card" id="settings-card">
                                    <div class="card-header">
                                        <h4>Ganti kata sandi</h4>
                                    </div>
                                    <div class="card-body">

                                        <!-- <div class="row">
                                        <div class="col-lg-6">
                                            <?= $this->session->flashdata('message'); ?>
                                        </div>
                                    </div> -->

                                        <div class="form-group row align-items-center">
                                            <label for="password_lama" class="form-control-label col-sm-3 text-md-right">Password
                                                lama</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Password lama" tabindex="1" required autofocus>
                                                <div class="invalid-feedback">
                                                    Silahkan isi password lama anda
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row align-items-center">
                                            <label for="password_baru1" class="form-control-label col-sm-3 text-md-right">Password baru</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="password" name="password_baru1" class="form-control" id="password_baru1" placeholder="Password baru" tabindex="1" required autofocus>
                                                <div class="invalid-feedback">
                                                    Silahkan isi password baru anda
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">
                                            <label for="password_baru2" class="form-control-label col-sm-3 text-md-right">Ulangi
                                                password baru</label>
                                            <div class="col-sm-6 col-md-9">
                                                <input type="password" name="password_baru2" class="form-control" id="password_baru2" placeholder="Ulangi password baru" tabindex="1" required autofocus>
                                                <div class="invalid-feedback">
                                                    Silahkan isi ulangi password baru anda
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-whitesmoke text-md-right">
                                            <button type="submit" class="btn btn-success" id="save-btn">Simpan Perubahan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



        </section>
    </div>