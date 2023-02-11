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
                            <?php
                            if($dataUser['role']=="Admin"):
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
                            <?php
                            elseif($dataUser['role']=="Perawat"):
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>nurse">Dashboard</a></li>
                            <?php
                            endif;
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>ViewPatientHistory">Lihat Riwayat Pasien</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Pasien</li>
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
                    <?php
                    $this->load->view('dp/view_history_patient/menu_detail_patient');
                    ?>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        Detail Pasien
                    </div>
                    
                     <div class="card-body">
                        <div class="form-group row align-items-center">
                            <label for="site-title" class="form-control-label col-sm-3 text-md-right">Nama</label>
                            <div class="col-sm-6 col-md-9">
                                <input type="text" disabled name="name" class="form-control" id="site-title"
                                    placeholder="<?=$data['name_patient']?>">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="umur" class="form-control-label col-sm-3 text-md-right">Tanggal Lahir</label>
                            <div class="col-sm-6 col-md-9">
                                <input type="text" disabled name="name" class="form-control"
                                    placeholder="<?=$data['date_of_birth_patient']?>">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="umur" class="form-control-label col-sm-3 text-md-right">Jenis Kelamin</label>
                            <div class="col-sm-6 col-md-9">
                                <input type="text" disabled name="name" class="form-control"
                                    placeholder="<?=$data['gender_patient']?>">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="umur" class="form-control-label col-sm-3 text-md-right">Umur</label>
                            <div class="col-sm-6 col-md-9">
                                <input type="text" disabled name="name" class="form-control"
                                    placeholder="<?=$data['age_patient']?>">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="umur" class="form-control-label col-sm-3 text-md-right">Nomor Telepon</label>
                            <div class="col-sm-6 col-md-9">
                                <input type="text" disabled name="name" class="form-control"
                                    placeholder="<?=$data['phone_patient']?>">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="umur" class="form-control-label col-sm-3 text-md-right">Status Perkawinan</label>
                            <div class="col-sm-6 col-md-9">
                                <input type="text" disabled name="name" class="form-control"
                                    placeholder="<?=$data['status_perkawinan']?>">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="umur" class="form-control-label col-sm-3 text-md-right">Pekerjaan</label>
                            <div class="col-sm-6 col-md-9">
                                <input type="text" disabled name="name" class="form-control"
                                    placeholder="<?=$data['pekerjaan']?>">
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <label for="site-description"
                                class="form-control-label col-sm-3 text-md-right">Alamat</label>
                            <div class="col-sm-6 col-md-9">
                                <textarea class="form-control" disabled name="site_description"
                                    id="site-description"><?=$data['address_patient']?></textarea>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>