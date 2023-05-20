<!-- Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023 -->
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
            <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash') ?>">

            </div>
            <div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data') ?>">
            </div>
            <div class="flash-data-fail" data-flashdata="<?= $this->session->flashdata('flash') ?>">
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
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item"><a href="<?= base_url() ?>profile" class="nav-link active">Profil</a></li>
                                    <li class="nav-item"><a href="<?= base_url() ?>profile/changePassword" class="nav-link">Ganti
                                            kata sandi</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form id="setting-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?= $this->session->flashdata('Message'); ?>
                                </div>
                            </div>
                            <div class="card" id="settings-card">
                                <div class="card-header">
                                    <h4>Profil</h4>
                                </div>
                                <div class="card-body">
                                    <p class="text-muted">Data pribadi</p>
                                    <div class="form-group row align-items-center">
                                        <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" disabled name="name" class="form-control" id="site-title" placeholder="<?= $name ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label for="umur" class="form-control-label col-sm-3 text-md-right">Umur</label>
                                        <div class="col-sm-6 col-md-9">
                                            <input type="text" disabled name="name" class="form-control" id="umur" placeholder="<?= $age ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label for="site-description" class="form-control-label col-sm-3 text-md-right">Alamat</label>
                                        <div class="col-sm-6 col-md-9">
                                            <textarea class="form-control" disabled name="site_description" id="site-description"><?= $address ?></textarea>
                                        </div>
                                    </div>

                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>
    </div>