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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>role">Obat</a></li>
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
                            <h4 class="card-title">Edit Pemeriksaan Awal Baru</h4>
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
                                    <form method="POST" action="<?= base_url() ?>PrePatientExamination/edit" class="needs-validation" novalidate="">

                                        <div class="form-group">
                                            <label for="drug_name">Id Pasien</label>
                                            <input type="text" class="form-control" id="id_pre_medical_record" name="id_pre_medical_record" require value="<?=$dataEdit['id_pre_medical_record']?>" hidden readonly placeholder="Masukkan Id Pasien">
                                            <input type="text" class="form-control" id="id_patient" name="id_patient" require value="<?=$dataEdit['id_patient']?>" readonly placeholder="Masukkan Id Pasien">
                                            <div class="invalid-feedback">
                                                Silahkan masukan id pasien terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="drug_name">Tensi Pasien</label>
                                            <input type="text" class="form-control" id="tension" name="tension" require required value="<?=$dataEdit['tension']?>"  placeholder="Masukkan Tensi">
                                            <div class="invalid-feedback">
                                                Silahkan masukan tensi terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="drug_name">Gula Darah Pasien</label>
                                            <input type="text" class="form-control" id="blood_sugar" name="blood_sugar" require required value="<?=$dataEdit['blood_sugar']?>" placeholder="Masukkan Gula Darah">
                                            <div class="invalid-feedback">
                                                Silahkan masukan gula darah terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="drug_name">Berat Badan Pasien</label>
                                            <input type="text" class="form-control" id="weight" name="weight" require required value="<?=$dataEdit['weight']?>" placeholder="Masukkan Berat Badan">
                                            <div class="invalid-feedback">
                                                Silahkan masukan berat badan terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="drug_name">Asam Urat Pasien</label>
                                            <input type="text" class="form-control" id="gout" name="gout" require required value="<?=$dataEdit['gout']?>" placeholder="Masukkan Asam Urat">
                                            <div class="invalid-feedback">
                                                Silahkan masukan asam urat terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="drug_name">Kolestrol Pasien</label>
                                            <input type="text" class="form-control" id="cholesterol" name="cholesterol" require required value="<?=$dataEdit['cholesterol']?>" placeholder="Masukkan Kolestrol">
                                            <div class="invalid-feedback">
                                                Silahkan masukan kolestrol tensi terlebih dahulu
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="customer_service">Alergi Obat</label>
                                            <textarea type="text area" class="form-control summernote" id="medicine_allergy" name="medicine_allergy" require required placeholder="Masukkan Alergi Obat pasien"><?=$dataEdit['medicine_allergy']?></textarea>
                                            <div class="invalid-feedback">
                                                Silahkan masukan pelayanan klinik terlebih dahulu
                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label for="customer_service">Keluhan Pasien</label>
                                            <textarea type="text area" class="form-control summernote" id="patient_complaints" name="patient_complaints" require required placeholder="Masukkan Keluhan pasien"><?=$dataEdit['patient_complaints']?></textarea>
                                            <div class="invalid-feedback">
                                                Silahkan masukan pelayanan klinik terlebih dahulu
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <a href="<?= base_url() ?>PrePatientExamination/listPrePatientExamination/<?=$id?>" class="btn btn-warning">Kembali</a>
                                            <button id="submitBtn" disabled="disabled" type="submit" class="btn icon icon-left btn-success"><i data-feather="check-circle"></i>
                                                Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script >
// $("#submitBtn").attr("disabled", "disabled");
var tension;
var blood_sugar;
var weight;
var gout;
var cholesterol;

$("#tension").keyup(function(event) {
  var tension = event.target.value;
  console.log($("#tension").val());
      checkValid();
});
$("#blood_sugar").keyup(function(event) {
  var blood_sugar = event.target.value;
     checkValid();
});
$("#weight").keyup(function(event) {
  var weight = event.target.value;
     checkValid();
});
$("#gout").keyup(function(event) {
  var gout = event.target.value;
    checkValid();
});
$("#cholesterol").keyup(function(event) {
  var cholesterol = event.target.value;
     checkValid();
});
function checkValid() {
    if ($("#tension").val() != '' && $("#blood_sugar").val() != '' && $("#weight").val() != '' && $("#gout").val() != '' && $("#cholesterol").val() != '') {
        $("#submitBtn").removeAttr("disabled", "disabled");
    }
    else{
        $("#submitBtn").attr("disabled", "disabled");
        return false
    }
}

</script>
    </section>