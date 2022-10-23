<div id="auth">

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="form-control-icon mb-3">
                    <a href="<?php base_url() ?>landing" class="bi bi-arrow-left" style="font-size: 1.2em;"> Kembali</a>
                </div>
                <div class="auth-logo mb-5">
                    <a href="<?php base_url() ?>">
                        <img style="width:50%;height:50%;" src="<?php base_url() ?>assets/images/logo/logo.svg" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Masuk</h1>
                <p class="auth-subtitle mb-5">Silahkan masuk terlebih dahulu.</p>
                <?= $this->session->flashdata('message'); ?>
                <form action="<?php base_url('auth') ?>" method="POST">
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" name="medicalRecordNumber" placeholder="Nomor Rekam Medis">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" name="password" placeholder="Password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Masuk</button>
                </form>

            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>
</body>

</html>