<?php
$dateNow = date("Y-m-d");
$isNotifScheduleControlPatient = false;
if ($scheduleControlPatient) {
    if ($dateNow <= $scheduleControlPatient['date_control_patient']) {
        $isNotifScheduleControlPatient = true;
    } else {
        $isNotifScheduleControlPatient = false;
    }
}
?>
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

                <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash') ?>">
                        </div>
                        <div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data') ?>">
                        </div>

                    <div class="col-6 col-lg-4 col-md-6">
                        <?php if ($isNotifScheduleControlPatient) : ?>
                            <a data-bs-toggle="modal" data-bs-target="#ControlToClinic">
                            <?php else : ?>
                                <a>
                                <?php endif; ?>
                                <div class="card" style="height: 80%;">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div class="px-1 col-md-2 col-lg-12 col-xl-12 col-xxl-2 d-flex justify-content-start ">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="fa-solid fa-stethoscope"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-10 col-lg-12 col-xl-12 col-xxl-10">
                                                <?php if ($isNotifScheduleControlPatient) : ?>
                                                    <h6 class="text-muted font-semibold">Jadwal Kontrol <svg id="bell" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 46 47">
                                                            <path id="bell-dome" class="st0" d="M35.8 16.8c0-5.7-3.7-10.5-8.9-12.2.1-.2.1-.4.1-.6 0-2.2-1.8-4-4-4s-4 1.8-4 4c0 .2 0 .4.1.6-5.2 1.7-8.9 6.5-8.9 12.2C10.2 30 3 30 3 36c0 1 0 3 20 3s20-2 20-3c0-6-7.2-6-7.2-19.2z" fill="rgb(214, 48, 49)" />
                                                            <defs>
                                                                <clipPath id="clapper-mask">
                                                                    <path id="clapper-mask" d="M3 39v8h40v-8s-4 2.2-20 2.2S3 39 3 39z" />
                                                                </clipPath>
                                                            </defs>
                                                            <g clip-path="url(#clapper-mask)">
                                                                <g id="clapper-group" class="st1">
                                                                    <circle id="clapper" class="st2" cx="23" cy="41" r="6" fill="rgb(214, 48, 49)" />
                                                                    <circle id="clapper-pivot" class="st3" cx="23" cy="4.5" r="35.5" fill="transparent" />
                                                                </g>
                                                            </g>
                                                        </svg> <span class="badge bg-success"><?= $jumlahNotifScheduleControl['jumlah_control'] ?></span></h6>
                                                <?php else : ?>
                                                    <h6 class="text-muted font-semibold">Jadwal Kontrol</h6>
                                                <?php endif; ?>
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
    <div class="modal fade text-left" id="ControlToClinic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title white" id="myModalLabel160">Jadwal Kontrol Ke Klinik
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="fw-bold fs-5 text-capitalize">Hai <?= $user['name_patient'] ?></span> <br>
                    Jadwal kontrol terbaru anda pada :<br>
                    <span class="fw-bolder">
                        Hari : <?= $dayControlPatient ?><br>
                        Tanggal : <?= $dateControlPatient ?><br>
                    </span>
                    mohon untuk segera menuju Klinik pada hari tanggal tersebut.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn icon icon-left btn-danger" data-bs-dismiss="modal">
                        <i class="bi bi-x"></i>
                        <span class="">Tutup</span>
                    </button>
                </div>
            </div>
        </div>
    </div>