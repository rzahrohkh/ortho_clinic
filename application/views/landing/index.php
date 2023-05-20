<!-- ======= Beranda Section ======= -->
<section id="beranda" class="hero d-flex align-items-center">
<!-- Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023 -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up"><?= $title_landing['description_section'] ?></h1>
                <h2 data-aos="fade-up" data-aos-delay="400"><?= $sub_title_landing['description_section'] ?></h2>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="<?php base_url() ?>asset_landing/img/beranda.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section>
<!-- End Beranda -->

<main id="main">

    <!-- ======= Profil Section ======= -->
    <section id="profil" class="features">

        <div class="container" data-aos="fade-up">

            <header class="section-header">

                <p>Profil Kinik</p>
            </header>

            <div class="row" data-aos="fade-up">

                <div class="row">

                    <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                        <img src="<?php base_url() ?>asset_landing/img/klinik.png" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 d-flex flex-column justify-content-center">
                        <h5 data-aos="fade-up" data-aos-delay="400"><?= $profileClinic['description_profile'] ?></h5>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- End Profil Section  -->

    <!-- ======= Pelayanan Section ======= -->
    <section id="pelayanan" class="services">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Pelayanan Kami</p>
            </header>

            <div class="row gy-4">
                <?php foreach ($serviceClinic as $serviceClinic) : ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $serviceClinic['data_aos_delay'] ?>">
                        <div class="service-box <?= $serviceClinic['color'] ?>">
                            <i class="<?= $serviceClinic['icon_service_clinic'] ?>"></i>
                            <h3><?= $serviceClinic['name_service_clinic'] ?></h3>
                            <h4>Melayani:</h4>
                            <?= $serviceClinic['description_service_clinic'] ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </section>
    <!-- End Pelayanan Section -->>

    <!-- ======= Dokter Section ======= -->
    <section id="dokter" class="team">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Dokter Gigi Kami</p>
            </header>

            <div class="row gy-4">
                <?php foreach ($doctor as $doctor) : ?>
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="member-img">
                                <img src="<?php base_url() ?><?= $doctor['photo'] ?>" class="img-fluid" alt="">
                                <!-- <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""><i class="bi bi-linkedin"></i></a>
                                </div> -->
                            </div>
                            <div class="member-info">
                                <h4><?= $doctor['name'] ?></h4>
                                <span><?= $doctor['position'] ?></span>
                                <br>
                                <!-- <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum exercitationem iure minima enim corporis et voluptate.</p> -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </section>
    <!-- End Dokter Section -->

    <!-- ======= Hubungi Section ======= -->
    <section id="hubungi" class="contact">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Hubungi Kami</p>
            </header>

            <div class="row gy-4">

                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Alamat</h3>
                                <p><?= $alamat['value_contact'] ?> <br>Kota Surabaya,
                                    Jawa Timur 60232,</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Telepon</h3>
                                <p><?= $telepon['value_contact'] ?>
                                    <br>(Panggilan Darurat)
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email</h3>
                                <p><?= $email['value_contact'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-clock"></i>
                                <h3>Jam Operasional</h3>
                                <?= $profileClinic['operational_hour'] ?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" class="php-email-form">
                        <h4 class="d-flex justify-content-center">Customer Service</h4><br>
                        <?= $profileClinic['customer_service'] ?>
                    </form>

                </div>

            </div>

        </div>

    </section>
    <!-- End Hubungi Section -->

    <!-- ======= Jadwal Section ======= -->
    <section id="jadwal" class="features">

        <div class="container" data-aos="fade-up">

            <header class="section-header">

                <p>Jadwal Praktek Dokter</p>
            </header>

            <div class="row" data-aos="fade-up">

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>Rabu</th>
                                    <th>Kamis</th>
                                    <th>Jumat</th>
                                    <th>Sabtu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $hours = ['Pagi', 'Siang', 'Malam'];
                                ?>
                                <?php foreach ($hours as $hour) : ?>
                                    <?php
                                    $jadwal = $this->db->query("SELECT
                                                * 
                                            FROM
                                                clinical_practice_schedule
                                                NATURAL JOIN worker_position_clinic
                                                NATURAL join clinic_opening_hours
                                                WHERE description_opening_hours ='$hour'
                                                ORDER BY day")->row_array()
                                    ?>

                                    <tr>
                                        <td class="text-bold-500"><?= $jadwal['position'] ?>
                                            <br><?= $jadwal['opening_hours'] ?>
                                        </td>
                                        <td class="text-bold-500"><?= $jadwal['position'] ?>
                                            <br><?= $jadwal['opening_hours'] ?>
                                        </td>
                                        <td class="text-bold-500"><?= $jadwal['position'] ?>
                                            <br><?= $jadwal['opening_hours'] ?>
                                        </td>
                                        <td class="text-bold-500"><?= $jadwal['position'] ?>
                                            <br><?= $jadwal['opening_hours'] ?>
                                        </td>
                                        <td class="text-bold-500"><?= $jadwal['position'] ?>
                                            <br><?= $jadwal['opening_hours'] ?>
                                        </td>
                                        <td class="text-bold-500"><?= $jadwal['position'] ?>
                                            <br><?= $jadwal['opening_hours'] ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- End Profil Section  -->

</main><!-- End #main -->