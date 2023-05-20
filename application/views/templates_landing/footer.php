    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
<!-- Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023 -->
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="<?php base_url() ?>" class="logo d-flex align-items-center">
                            <img src="<?php base_url() ?>assets/images/logo/<?=$logo['logo']?>" alt="">
                            <!-- <span>Ortho Clinic</span> -->
                        </a>
                        <p>Dengan menggunakan aplikasi ini, dapat
                            mempermudah aktivitas anda di rumah .</p>
                        <div class="social-links mt-3">
                            <?php foreach ($contacts as $contact) : ?>
                                <a href="<?= $contact['value_contact'] ?>" class="<?= $contact['class'] ?>"><i class="<?= $contact['icon_contact'] ?>"></i></a>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Link Klinik Kami</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#beranda">Beranda</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#profil">Profil Kami</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#pelayanan">Pelayanan</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#dokter">Dokter</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#hubungi">Hubungi Kami</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#jadwal">Jadwal Praktek Dokter</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Alamat</h4>
                        <p>
                            <?= $alamat['value_contact'] ?>
                            Kota Surabaya,
                            Jawa Timur 60232
                            <br>
                            <br>
                            <strong>Telepon:</strong> <?= $telepon['value_contact'] ?><br>
                            <strong>Email:</strong> <?= $email['value_contact'] ?><br>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>OrthoClinic</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Disusun Oleh <a href="https://www.linkedin.com/in/roudlotuz-zahro-khoiriyah/">Roudlotuz Zahroh Khoiriyah</a>
                <br>
                <a>Untuk Memenuhi Tugas Akhir Skripsi</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?php base_url() ?>asset_landing/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?php base_url() ?>asset_landing/vendor/aos/aos.js"></script>
    <script src="<?php base_url() ?>asset_landing/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php base_url() ?>asset_landing/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php base_url() ?>asset_landing/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php base_url() ?>asset_landing/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?php base_url() ?>asset_landing/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?php base_url() ?>asset_landing/js/main.js"></script>

    </body>

    </html>