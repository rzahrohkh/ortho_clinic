<!-- ======= Beranda Section ======= -->
<section id="beranda" class="hero d-flex align-items-center">

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

</section><!-- End Beranda -->

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
            <! </div>

    </section><!-- End Profil Section  -->

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

    </section><!-- End Pelayanan Section -->>

    <!-- ======= Dokter Section ======= -->
    <section id="dokter" class="team">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Dokter Gigi Kami</p>
            </header>

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="<?php base_url() ?>asset_landing/img/team/team-1.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Walter White</h4>
                            <span>Chief Executive Officer</span>
                            <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut. Ipsum exercitationem iure minima enim corporis et voluptate.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <div class="member-img">
                            <img src="<?php base_url() ?>asset_landing/img/team/team-2.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Sarah Jhonson</h4>
                            <span>Product Manager</span>
                            <p>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit corporis. Voluptate sed quas reiciendis animi neque sapiente.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <div class="member-img">
                            <img src="<?php base_url() ?>asset_landing/img/team/team-3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                            <p>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates enim aut architecto porro aspernatur molestiae modi.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                    <div class="member">
                        <div class="member-img">
                            <img src="<?php base_url() ?>asset_landing/img/team/team-4.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                            <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut aliquid doloremque ut possimus ipsum officia.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- End Dokter Section -->

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

    </section><!-- End Hubungi Section -->

</main><!-- End #main -->