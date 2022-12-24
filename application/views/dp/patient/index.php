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
                        <a href="<?= base_url('ControlPatientSchedule') ?>">
                            <div class="card" style="height: 80%;">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="px-1 col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                                            <div class="stats-icon blue mb-2">
                                                <i class="fa-solid fa-stethoscope"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
                                            <h6 class="text-muted font-semibold">Jadwal Kontrol</h6>
                                            <h6 class="font-extrabold mb-0">Jadwal Kontrol Ke Klinik</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="<?= base_url('PatientActivity') ?>">
                            <div class="card" style="height: 80%;">
                                <div class=" card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="px-1 col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                                            <div class="stats-icon green mb-2">
                                                <i class="fa-solid fa-person-walking"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
                                            <h6 class="text-muted font-semibold">Aktivitas</h6>
                                            <h6 class="font-extrabold mb-0">Kegiatan Harian Anda</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-4 col-md-6">
                        <a href="<?= base_url('PatientDrug') ?>">
                            <div class="card" style="height: 80%;">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="px-1 col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <i class="fa-solid fa-capsules"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
                                            <h6 class="text-muted font-semibold">Obat Anda</h6>
                                            <h6 class="font-extrabold mb-0">Obat Yang Di Konsumsi</h6>
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