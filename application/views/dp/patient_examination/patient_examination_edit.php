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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>doctor">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>patientExamination">Daftar Pemeriksaan</a></li>
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
                            <h4 class="card-title">Pemeriksaan Baru</h4>
                        </div>

                        <div class="card-body">
                            <div class="row-8">
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#preMedicalRecord">
                                    Lihat Pemeriksaan Awal
                                </button>
                                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#profilePatient">
                                    Lihat Profil Pasien
                                </button>
                                <div class="modal fade  modal-xl" id="preMedicalRecord" tabindex="-1" role="dialog"
                                aria-labelledby="medicalRecordTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="medicalRecordTitle">Detail Pemeriksaan Awal</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="row">
                                                    <div class="col-md-2">
                                                        <h4 for=""><span style="font-size:medium">Nomor Pemeriksaan </span></h4>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?=$preMedicalRecord["id_pre_medical_record"]?></p>
                                                    </div>
                                                </div>
                                                <hr class="mt-2 mb-3"/>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <h4 for=""><span style="font-size:medium">Diperiksa Oleh</span></h4>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p> <?=$nurse["name"]?$nurse["name"]:"-"?></p>
                                                    </div>
                                                </div>
                                                <hr class="mt-2 mb-3"/>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <h4 for=""><span style="font-size:medium">Tensi </span></h4>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?=ucwords($preMedicalRecord["tension"])?></p>
                                                    </div>
                                                </div>
                                                <hr class="mt-2 mb-3"/>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <h4 for=""><span style="font-size:medium">Gula Darah </span></h4>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?=$preMedicalRecord["blood_sugar"]?></p>
                                                    </div>
                                                </div>
                                                <hr class="mt-2 mb-3"/>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <h4 for=""><span style="font-size:medium">Berat Badan</span></h4>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?=$preMedicalRecord["weight"]?></p>
                                                    </div>
                                                </div>
                                                <hr class="mt-2 mb-3"/>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <h4 for=""><span style="font-size:medium">Asam Urat</span></h4>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?=$preMedicalRecord["gout"]?></p>
                                                    </div>
                                                </div>
                                                <hr class="mt-2 mb-3"/>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <h4 for=""><span style="font-size:medium">Kolestrol</span></h4>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p> <?=$preMedicalRecord["cholesterol"]?$preMedicalRecord["cholesterol"]:'-'?></p>
                                                    </div>
                                                </div>
                                                
                                                
                                                <hr class="mt-2 mb-3"/>
                                                <div class="row">
                                                    <h4 for=""><span style="font-size:medium">Alergi Obat</span></h4>
                                                </div>
                                                <p>
                                                <?=$preMedicalRecord["medicine_allergy"]?$preMedicalRecord["medicine_allergy"]:'-'?>
                                                </p>
                                                <hr class="mt-2 mb-3"/>
                                                <div class="row">
                                                    <h4 for=""><span style="font-size:medium">Keluhan Pasien</span></h4>
                                                </div>
                                                <p>
                                                <?=$preMedicalRecord["patient_complaints"]?$preMedicalRecord["patient_complaints"]:'-'?>
                                                </p>
                                                
                                            
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Tutup</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade  modal-xl" id="profilePatient" tabindex="-1" role="dialog"
                                aria-labelledby="medicalRecordTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="medicalRecordTitle">Detail Profil Pasien</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <h4 for=""><span style="font-size:medium">Nomor Pasien </span></h4>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?=$patient["id_patient"]?></p>
                                                    </div>
                                                </div>
                                                <hr class="mt-2 mb-3"/>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <h4 for=""><span style="font-size:medium">Nama Pasien </span></h4>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?=$patient["name_patient"]?></p>
                                                    </div>
                                                </div>
                                                <hr class="mt-2 mb-3"/>
                                               <div class="row">
                                                    <div class="col-md-2">
                                                        <h4 for=""><span style="font-size:medium">Tanggal Lahir Pasien </span></h4>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?=$patient["date_of_birth_patient"]?></p>
                                                    </div>
                                                </div>
                                                <hr class="mt-2 mb-3"/>
                                               <div class="row">
                                                    <div class="col-md-2">
                                                        <h4 for=""><span style="font-size:medium">Jenis Kelamin Pasien </span></h4>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?=$patient["gender_patient"]?></p>
                                                    </div>
                                                </div>
                                                <hr class="mt-2 mb-3"/>
                                                
                                               <div class="row">
                                                    <div class="col-md-2">
                                                        <h4 for=""><span style="font-size:medium">Alamat</span></h4>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <p>:</p>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p><?=$patient["address_patient"]?></p>
                                                    </div>
                                                </div>
                                                <hr class="mt-2 mb-3"/>
                                                
                                                
                                             
                                                
                                            
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Tutup</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <?php if (validation_errors()) : ?>
                                        <div class="alert alert-danger alert-dismissible show fade">
                                            <?= validation_errors() ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <form method="POST" action="<?= base_url() ?>patientExamination/edit" class="needs-validation" novalidate="">
                                        <div class="form-group">
                                            <label for="drug_name">Nomor Rekam Medis</label>
                                            <input type="text" class="form-control" id="id_medical_record" name="id_medical_record" require value="<?=$id?>" readonly placeholder="Masukkan Id Pasien">
                                            <div class="invalid-feedback">
                                                Silahkan masukan id pasien terlebih dahulu
                                            </div>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label for="customer_service">Diagnosa Pasien</label>
                                            <textarea type="text area" class="form-control summernote" id="diagnosis" name="diagnosis" require required placeholder="Masukkan diagnosa pasien"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="customer_service">Penanganan Pasien</label>
                                            <textarea type="text area" class="form-control summernote" id="handling" name="handling" require required placeholder="Masukkan penanganan pasien"></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label for="drug_name">Biaya Pemeriksaan Pasien</label>
                                            <input type="number" class="form-control" id="inspection_fees" name="inspection_fees" require required placeholder="Masukkan biaya pemeriksaan">
                                            <div class="invalid-feedback">
                                                Silahkan masukan kolestrol tensi terlebih dahulu
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <a href="<?= base_url() ?>patientExamination/" class="btn btn-warning">Kembali</a>
                                            <button id="submitBtn" disabled="disabled" type="submit" class="btn icon icon-left btn-success"><i data-feather="check-circle"></i>
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script >
// $("#submitBtn").attr("disabled", "disabled");
var tension;
var blood_sugar;
var weight;
var gout;
var cholesterol;

$("#diagnosis").keyup(function(event) {
  var tension = event.target.value;
    checkValid();
});
$("#handling").keyup(function(event) {
  var blood_sugar = event.target.value;
    checkValid();
});
$("#inspection_fees").keyup(function(event) {
  var weight = event.target.value;
    checkValid();
});
function checkValid() {
    if ($("#diagnosis").val() != '' && $("#handling").val() != '' && $("#inspection_fees").val() != '') {
        $("#submitBtn").removeAttr("disabled", "disabled");
    }
    else{
        $("#submitBtn").attr("disabled", "disabled");
        return false
    }
}

</script>
    </section>