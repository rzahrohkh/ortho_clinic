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
                    <div class="card-header">
                        Data Profil Klinik
                    </div>
                    <!-- <div class="d-flex flex-row-reverse" style="margin-right: 3% ; margin-button: 1%;">
                        <a href="<?= base_url(); ?>drugs/add" class="btn btn-success"> + Tambah obat baru</a>
                    </div> -->
                    <div class="card-body">
                        <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash') ?>">
                        </div>
                        <div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data') ?>">
                        </div>
                        <table class="table table-striped table-responsive" id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Deskripsi Profil</th>
                                    <th>Jam Operasional</th>
                                    <th>Pelayanan Klinik</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($landingprofile as $landingprofile) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $landingprofile['description_profile'] ?></td>
                                        <td><?= $landingprofile['operational_hour'] ?></td>
                                        <td><?= $landingprofile['customer_service'] ?></td>
                                        <td style="width:15% ;">
                                            <a href="<?= base_url(); ?>landingProfile/edit/<?= $landingprofile['id_profile']; ?>" class="badge bg-success">Ubah</a>
                                            <!-- <a href="<?= base_url(); ?>LandingProfile/delete/<?= $drugs['id_profile']; ?>" class="badge bg-danger hapus-news">Hapus</a> -->
                                        </td>

                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </section>
    </div>