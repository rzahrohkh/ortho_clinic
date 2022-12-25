<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
                <div class="row">

                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="<?= base_url('ViewPatientNurse') ?>">
                            <div class="card" style="height: 80%;">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="px-1 col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <i class="fa-solid fa-bed-pulse"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
                                            <h6 class="text-muted font-semibold">Lihat Riwayat Pasien</h6>
                                            <h6 class="font-extrabold mb-0">Melihat data pasien secara lengkap</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="<?= base_url('PatientControlScheduleManagement') ?>">
                            <div class="card" style="height: 80%;">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="px-1 col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                                            <div class="stats-icon blue mb-2">
                                                <i class="fa-solid fa-hospital-user"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
                                            <h6 class="text-muted font-semibold">Manajemen Jadwal Kontrol Pasien</h6>
                                            <h6 class="font-extrabold mb-0">Mengatur jadwal kontrol pasien</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="<?= base_url('PatientManagement') ?>">
                            <div class="card" style="height: 80%;">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="px-1 col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                                            <div class="stats-icon green mb-2">
                                                <i class="fa-solid fa-person"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
                                            <h6 class="text-muted font-semibold">Manajemen Pasien</h6>
                                            <h6 class="font-extrabold mb-0">Melihat detail data diri pasien</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </section>
    </div>