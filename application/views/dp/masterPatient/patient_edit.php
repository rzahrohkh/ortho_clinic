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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>patientMaster">Pasien</a></li>
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
            <div class="col-12">
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pasien Baru</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if (validation_errors()) : ?>
                                        <div class="alert alert-danger alert-dismissible show fade">
                                            <?= validation_errors() ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>
                                    <form method="POST" action="<?= base_url() ?>patientMaster/edit" class="needs-validation" novalidate="">

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No Rekam
                                                Medis</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="id_patient" value="<?= $dataEdit["id_patient"] ?>" class="form-control" readonly autofocus placeholder="Masukan nomor rekam medis" tabindex="1">
                                                <div class="invalid-feedback">
                                                    Nomor rekam medis tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                            </label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="name_patient" class="form-control" value="<?= $dataEdit["name_patient"] ?>" required autofocus placeholder="Masukan nama pasien" tabindex="1">
                                                <div class="invalid-feedback">
                                                    Silahkan isi nama pasien terlebih dahulu
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="nik_patient" class="form-control" value="<?= $dataEdit["nik_patient"] ?>" required autofocus placeholder="Masukan NIK pasien" tabindex="1">
                                                <div class="invalid-feedback">
                                                    NIK tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal lahir</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input class="form-control" type="date" id="example-month-input" value="<?= $dataEdit["date_of_birth_patient"] ?>" name="date_of_birth_patient" required autofocus>

                                                <div class="invalid-feedback">
                                                    Silahkan isi Tanggal terlebih dahulu
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Umur</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="number" name="age_patient" class="form-control" required autofocus value="<?= $dataEdit["age_patient"] ?>" placeholder="Masukan umur pasien" tabindex="1">
                                                <div class="invalid-feedback">
                                                    Silahkan isi umur pasien
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis
                                                Kelamin</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select class="custom-select choices form-control" required autofocus name="gender_patient">
                                                    <option selected disabled>Pilih jenis kelamin</option>
                                                    <?php if ($dataEdit['gender_patient'] == "Pria") : ?>
                                                        <option value="Pria" selected>Pria</option>
                                                    <?php else : ?>
                                                        <option value="Pria">Pria</option>
                                                    <?php endif ?>
                                                    <?php if ($dataEdit['gender_patient'] == "Wanita") : ?>
                                                        <option value="Wanita" selected>Wanita</option>
                                                    <?php else : ?>
                                                        <option value="Wanita">Wanita</option>
                                                    <?php endif ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Jenis kelamin tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                            <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Perkawinan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select class="custom-select choices form-control" required autofocus name="status_perkawinan">
                                                    <option selected disabled>Pilih Status Perkawinan</option>
                                                     <?php if ($dataEdit['status_perkawinan'] == "Belum Kawin") : ?>
                                                    <option value="Belum Kawin" selected>Belum Kawin</option>
                                                     <?php else : ?>
                                                    <option value="Belum Kawin">Belum Kawin</option>
                                                    <?php endif ?>
                                                    <?php if ($dataEdit['status_perkawinan'] == "Kawin") : ?>
                                                    <option value="Kawin" selected>Kawin</option>
                                                    <?php else : ?>
                                                    <option value="Kawin">Kawin</option>
                                                    <?php endif ?>
                                                    <?php if ($dataEdit['status_perkawinan'] == "Janda") : ?>
                                                    <option value="Janda" selected>Janda</option>
                                                     <?php else : ?>
                                                    <option value="Janda">Janda</option>
                                                     <?php endif ?>
                                                     <?php if ($dataEdit['status_perkawinan'] == "Janda") : ?>
                                                    <option value="Duda" selected>Duda</option>
                                                     <?php else : ?>
                                                    <option value="Duda">Duda</option>
                                                      <?php endif ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                   Status Perkawinan tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Telepon</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="phone_patient" class="form-control" value="<?= $dataEdit["phone_patient"] ?>" required autofocus placeholder="Masukan nomor telepon" tabindex="1">
                                                <div class="invalid-feedback">
                                                    Silahkan isi nomor telephone pasien
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" name="pekerjaan" class="form-control" value="<?= $dataEdit["pekerjaan"] ?>"  required autofocus placeholder="Masukan pekerjaan" tabindex="1">
                                                <div class="invalid-feedback">
                                                    Silahkan isi pekerjaan pasien
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Provinsi</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select class="custom-select choices form-control" required autofocus name="id_province" id="id_province">
                                                    <option selected disabled>Pilih Provinsi</option>
                                                    <?php foreach ($province as $province) : ?>
                                                        <?php if ($dataEdit['id_province'] == $province["id_province"]) : ?>
                                                            <option value="<?= $province["id_province"] ?>" selected><?= $province["province"] ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $province["id_province"] ?>"><?= $province["province"] ?></option>
                                                        <?php endif ?>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Provinsi tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4" id="kota">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kota/Kabupaten</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select class="custom-select form-control id_city" required autofocus name="id_city" id="id_city">
                                                    <option selected disabled>Pilih Kota/Kabupaten</option>
                                                    <?php foreach ($city as $city) : ?>
                                                        <?php if ($dataEdit['id_city'] == $city["id_city"]) : ?>
                                                            <option value="<?= $city["id_city"] ?>" selected><?= $city["city"] ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $city["id_city"] ?>"><?= $city["city"] ?></option>
                                                        <?php endif ?>
                                                    <?php endforeach; ?>

                                                </select>
                                                <div class="invalid-feedback">
                                                    Kota tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4" id="kecamatan">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kecamatan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select class="custom-select form-control" required autofocus name="id_district" id="id_district">
                                                    <option selected disabled>Pilih Kecamatan</option>
                                                    <?php foreach ($district as $district) : ?>
                                                        <?php if ($dataEdit['id_district'] == $district["id_district"]) : ?>
                                                            <option value="<?= $district["id_district"] ?>" selected><?= $district["district"] ?></option>
                                                        <?php else : ?>
                                                            <option value="<?= $district["id_district"] ?>"><?= $district["district"] ?></option>
                                                        <?php endif ?>
                                                    <?php endforeach; ?>

                                                </select>
                                                <div class="invalid-feedback">
                                                    Kecamatan tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4" id="kelurahan">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelurahan/Desa</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select class="custom-select form-control" required autofocus name="id_subdistrict" id="id_subdistrict">
                                                    <option selected disabled>Pilih Kelurahan/Desa</option>

                                                </select>
                                                <div class="invalid-feedback">
                                                    Kelurahan/Desa tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                $("#kelurahan").hide();
                                                loadCity();


                                            });

                                            function loadCity() {
                                                $("#id_province").change(function(e) {
                                                    $("#id_city").html('');
                                                    var id_province = $("#id_province").val();
                                                    e.preventDefault();
                                                    $.ajax({
                                                        type: 'POST',
                                                        dataType: 'JSON',
                                                        url: "<?= base_url() ?>DataMaster/getDataCity",
                                                        data: {
                                                            id_province: id_province
                                                        },
                                                        success: function(data) {
                                                            $("#kota").show();
                                                            var selectStart = '<select class="custom-select choices form-control id_city" required autofocus name="id_city" id="id_city"></select>';
                                                            var option = '';
                                                            $("#id_district").html('');
                                                            $("#id_city").append('<option selected disabled>Pilih Kota/Kabupaten</option>');
                                                            var index = 0;
                                                            for (let index = 0; index < data.length; index++) {
                                                                option += '<option value="' + data[index].id_city + '">' + data[index].city + '</option>'
                                                            }

                                                            $("#id_city").append(option);
                                                            $("#kota").show();
                                                            loadDistrict();
                                                        }
                                                    });

                                                });
                                            }

                                            function loadDistrict() {
                                                $("#id_city").change(function(e) {
                                                    var id_city = $("#id_city").val();
                                                    e.preventDefault();
                                                    $.ajax({
                                                        type: 'POST',
                                                        dataType: 'JSON',
                                                        url: "<?= base_url() ?>DataMaster/getDataDistrict",
                                                        data: {
                                                            id_city: id_city
                                                        },
                                                        success: function(data) {
                                                            $("#kecamatan").show();
                                                            var option = '';
                                                            $("#id_district").html('');
                                                            $("#id_district").append('<option selected disabled>Pilih Kecamatan</option>');
                                                            var index = 0;
                                                            for (let index = 0; index < data.length; index++) {
                                                                option += ' <option value="' + data[index].id_district + '">' + data[index].district + '</option>'
                                                            }

                                                            $("#id_district").append(option);
                                                            $("#kecamatan").show();
                                                            // loadSubDistrict();
                                                        }
                                                    });

                                                });
                                            }

                                            function loadSubDistrict() {
                                                $("#id_district").change(function(e) {
                                                    var id_district = $("#id_district").val();
                                                    e.preventDefault();
                                                    $.ajax({
                                                        type: 'POST',
                                                        dataType: 'JSON',
                                                        url: "<?= base_url() ?>DataMaster/getDataSubDistrict",
                                                        data: {
                                                            id_subdistrict: id_subdistrict
                                                        },
                                                        success: function(data) {
                                                            $("#kelurahan").show();

                                                            var option = '';
                                                            $("#id_subdistrict").append(option);
                                                            var index = 0;
                                                            for (let index = 0; index < data.length; index++) {
                                                                option += ' <option value="' + data[index].id_subdistrict + '">' + data[index].district + '</option>'
                                                            }
                                                            $("#id_subdistrict").append(option);
                                                            $("#kelurahan").show();

                                                        }
                                                    });
                                                    e.stopPropagation();
                                                });
                                            }
                                        </script>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="form-group">

                                                    <textarea class="form-control" required autofocus name="address_patient" style="height: 150px;" cols="10000"><?= $dataEdit["address_patient"] ?></textarea>
                                                </div>
                                                <div class="invalid-feedback">
                                                    Alamat tidak boleh kosong
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="menu">Status Aktif Pasien</label>
                                            <br>
                                            <label class="custom-switch mt-2">
                                                <input type="checkbox" name="is_active" class="custom-switch-input" checked>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Aktif</span>
                                            </label>
                                            <div class="invalid-feedback">
                                                Silahkan centang terlebih dahulu
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <a href="<?= base_url() ?>patientMaster" class="btn btn-warning">Kembali</a>
                                            <button type="submit" class="btn icon icon-left btn-success"><i data-feather="check-circle"></i>
                                                Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </section>