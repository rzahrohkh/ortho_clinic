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
                    <p class="text-subtitle text-muted">Ini Adalah Halaman<?php echo $title ?></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <?php
                            if($dataUser['role']=="Admin"):
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
                            <?php
                            elseif($dataUser['role']=="Perawat"):
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>nurse">Dashboard</a></li>
                              <?php
                            elseif($dataUser['role']=="Doctor"):
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>doctor">Dashboard</a></li>
                            <?php
                            endif;
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>patientExamination">Pemeriksaan Pasien</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Buat Resep Pasien</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12">
               
                
                <div class="card">
                    <div class="card-header">
                        Detail Resep
                    </div>
                    
                     <div class="card-body">
                        <div class="row-8 mb-4">
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#preMedicalRecord">
                                Lihat Pemeriksaan Awal
                            </button>
                           <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#medicalRecord">
                                Lihat Detail Rekam Medis
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
                                                    <p><?=$medical_record["id_pre_medical_record"]?></p>
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
                                                    <p><?=ucwords($medical_record["tension"])?></p>
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
                                                    <p><?=$medical_record["blood_sugar"]?></p>
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
                                                     <p><?=$medical_record["weight"]?></p>
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
                                                    <p><?=$medical_record["gout"]?></p>
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
                                                    <p> <?=$medical_record["cholesterol"]?$medical_record["cholesterol"]:'-'?></p>
                                                </div>
                                            </div>
                                            
                                            
                                            <hr class="mt-2 mb-3"/>
                                            <div class="row">
                                                 <h4 for=""><span style="font-size:medium">Alergi Obat</span></h4>
                                            </div>
                                            <p>
                                               <?=$medical_record["medicine_allergy"]?$medical_record["medicine_allergy"]:'-'?>
                                            </p>
                                            <hr class="mt-2 mb-3"/>
                                            <div class="row">
                                                 <h4 for=""><span style="font-size:medium">Keluhan Pasien</span></h4>
                                            </div>
                                            <p>
                                               <?=$medical_record["patient_complaints"]?$medical_record["patient_complaints"]:'-'?>
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
                            <div class="modal fade  modal-xl" id="medicalRecord" tabindex="-1" role="dialog"
                                aria-labelledby="medicalRecordTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="medicalRecordTitle">Detail Rekam Medis</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                           <div class="row">
                                                <div class="col-md-2">
                                                    <h4 for=""><span style="font-size:medium">Nomor Rekam Medis </span></h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <p>:</p>
                                                </div>
                                                 <div class="col-md-9">
                                                    <p><?=$medical_record["id_medical_record"]?></p>
                                                </div>
                                            </div>
                                             <hr class="mt-2 mb-3"/>
                                             <div class="row">
                                                <div class="col-md-2">
                                                    <h4 for=""><span style="font-size:medium">Status Penanganan </span></h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <p>:</p>
                                                </div>
                                                 <div class="col-md-9">
                                                    <p><?=ucwords($medical_record["status_medical_record"])?></p>
                                                </div>
                                            </div>
                                             <hr class="mt-2 mb-3"/>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <h4 for=""><span style="font-size:medium">Tanggal Pemeriksaan </span></h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <p>:</p>
                                                </div>
                                                 <div class="col-md-9">
                                                    <p><?=$medical_record["inspection_date"]?></p>
                                                </div>
                                            </div>
                                             <hr class="mt-2 mb-3"/>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <h4 for=""><span style="font-size:medium">Tipe Penanganan</span></h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <p>:</p>
                                                </div>
                                                 <div class="col-md-9">
                                                     <p><?=$medical_record["type_handling"]?></p>
                                                </div>
                                            </div>
                                             <hr class="mt-2 mb-3"/>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <h4 for=""><span style="font-size:medium">Ditangani Oleh</span></h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <p>:</p>
                                                </div>
                                                <div class="col-md-9">
                                                    <p>Dr. <?=$doctor["name"]?$doctor["name"]:"-"?></p>
                                                </div>
                                            </div>
                                            <hr class="mt-2 mb-3"/>
                                            <div class="row">
                                                 <h4 for=""><span style="font-size:medium">Diagnosis</span></h4>
                                            </div>
                                            <p>
                                               <?=$medical_record["diagnosis"]?$medical_record["diagnosis"]:'-'?>
                                            </p>
                                            <hr class="mt-2 mb-3"/>
                                            <div class="row">
                                                 <h4 for=""><span style="font-size:medium">Penanganan</span></h4>
                                            </div>
                                            <p>
                                               <?=$medical_record["handling"]?$medical_record["handling"]:'-'?>
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
                        </div> 
                        <div class="row mb-4">
                           <div class="row">
                                <div class="col-md-2">
                                    <h4 for=""><span style="font-size:medium">Nomor Resep </span></h4>
                                </div>
                                <div class="col-md-1">
                                    <p>:</p>
                                </div>
                                <div class="col-md-9">
                                    <p><?=$prescription["id_prescription_patient"]?></p>
                                </div>
                            </div>
                            <hr class="mt-2 mb-3"/>
                             <div class="row">
                                <div class="col-md-2">
                                    <h4 for=""><span style="font-size:medium">Tanggal Pembuatan Resep </span></h4>
                                </div>
                                <div class="col-md-1">
                                    <p>:</p>
                                </div>
                                <div class="col-md-9">
                                    <p><?=$prescription["date_prescription_patient"]?></p>
                                </div>
                            </div>
                            <hr class="mt-2 mb-3"/>
                            <div class="row">
                                <div class="col-md-2">
                                    <h4 for=""><span style="font-size:medium">Dibuat Oleh</span></h4>
                                </div>
                                <div class="col-md-1">
                                    <p>:</p>
                                </div>
                                <div class="col-md-9">
                                    <p>Dr. <?=$doctor["name"]?></p>
                                </div>
                            </div>
                            <hr class="mt-2 mb-3"/>
                            <div class="row">
                                <div class="col-md-2">
                                    <h4 for=""><span style="font-size:medium">Detail Resep</span></h4>
                                </div>
                                <div class="col-md-1">
                                    <p>:</p>
                                </div>
                            </div>
                            <hr class="mt-2 mb-3"/>
                            <div class="table-responsive">
                            <div class="row mb-2">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#addPreception"class="btn btn-success p-1">Tambah Obat</button>
                            </div>  
                            
                            <div class="modal fade text-left" id="addPreception" tabindex="-1" role="dialog" data-bs-backdrop="false"
                                    aria-labelledby="addPreception" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Tambah Obat </h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                             <form method="POST" action="<?= base_url() ?>PrececptionNewFromMR/saveNewDrug/<?=$uri?>" class="needs-validation" novalidate="">
                        
                                                <div class="modal-body">
                                                     <div class="form-group">
                                                        <input type="text" hidden readonly name="id_prescription_patient" value="<?=$id_prescription?>"
                                                                class="form-control">
                                                    </div>
                                                    <label>Nama Obat: </label>
                                                    <div class="form-group">
                                                      <select name="id_drug" id="id_drug" class="choices form-control" onChange="update()">
                                                        <option selected disabled>Pilih Obat</option>
                                                        <?php foreach ($drug as $drug) : ?>
                                                           
                                                                <option value="<?= $drug['id_drug']; ?>"> <?= $drug['drug_name'] ?> - <?= $drug['drug_type'] ?></option>
                                                          
                                                        <?php endforeach; ?>
                                                    </select>
                                                    </div>
                                                    <label>Dosis: </label>
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Dosis Obat" name="dose" id="dose"
                                                            class="form-control">
                                                    </div>
                                                     <label>Jumlah Obat :</label>
                                                    <div class="form-group">
                                                        <input type="number" placeholder="Jumlah Obat" name="amount_of_prescription" id="amount_of_prescription"
                                                            class="form-control">
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-floating">
                                                            <textarea class="form-control" placeholder="Leave a comment here" name="usage_amount" id="usage_amount" id="floatingTextarea"></textarea>
                                                            <label for="floatingTextarea">Masukan Cara Penggunaan Obat</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="form-floating">
                                                            <textarea class="form-control" placeholder="Leave a comment here" name="note" id="floatingTextarea"></textarea>
                                                            <label for="floatingTextarea">Masukan Catatan</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Tutup</span>
                                                    </button>
                                                    <button type="submit" id="submitBtn" class="btn btn-success ml-1"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Simpan</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                         <div class="flash-data-news" data-flashdata="<?= $this->session->flashdata('flash') ?>">
                        </div>
                        <div class="flash-data-data" data-flashdata="<?= $this->session->flashdata('data') ?>">
                        </div>
                           <table class="table table-bordered mb-0 table-responsive">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Obat</th>
                                        <th>Tipe Obat</th>
                                        <th>Jumlah Dosis</th>
                                        <th>Penggunaan</th>
                                        <th>Catatan</th>
                                        <th>Jumlah Obat</th>
                                        <th>Harga Obat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;?>
                                     <?php foreach($prescription_detail as $prescription_detail):?>
                                    <tr>
                                     
                                        <td><?=$no?></td>
                                        <td><?=$prescription_detail['drug_name']?></td>
                                        <td><?=$prescription_detail['drug_type']?></td>
                                        <td><?=$prescription_detail['dose']?></td>
                                        <td><?=$prescription_detail['usage_amount']?></td>
                                        <td><?=$prescription_detail['note']?></td>
                                        <td><?=$prescription_detail['amount_of_prescription']?></td>
                                        <td><?=rupiah($prescription_detail['drug_prices'])?></td>
                                        <td>
                                            <a href="<?= base_url(); ?>PrececptionNewFromMR/delete/<?= $prescription_detail['id_prescription_patient_detail']; ?>_<?=$uri?>" class="badge bg-danger hapus-news">Hapus</a>
                                        </td>
                                    </tr>
                                    
                                    <?php
                                    $no++;
                                 endforeach;?>
                                 <?php if ($countData==0) :?>
                                    <tr>
                                        <td colspan="9" style=" text-align: center;"><span style="font-weight:semi-bold">Belum Menginputkan Obat Untuk Resep</span></td>
                                      
                                        
                                     </tr>
                                <?php endif;?>
                                 <?php if ($countData>0) :?>
                                 <tr>
                                    <td colspan="7"><span style="font-weight:semi-bold">Biaya Obat</span></td>
                                      <td><span style="font-weight:bold"><?=rupiah($prescription["total_drug_cost"])?></span></td>
                                      <td></td>
                                </tr>
                                <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                         
                        </div> 
                        <?php if ($countData>0) :?>
                        <div class="row mb-2">
                            <a href="<?= base_url() ?>PrececptionNewFromMR/save/<?=$prescription["id_prescription_patient"]?>" class="btn btn-danger p-1">Simpan Resep</a>
                        </div>
                         <?php endif;?>
                        <div class="row">
                            <a href="<?= base_url() ?>patientExamination/" class="btn btn-warning p-1">Kembali</a>
                        </div>          
                    </div>
                </div>
            </div>

        </section>
    </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
$("#submitBtn").attr("disabled", "disabled");
$(function() {
    $("#id_drug").val("Pilih Obat");
});
var tension;
var blood_sugar;
var weight;
var gout;
var id_drug;

$("#id_drug").keyup(function(event) {
  var id_drug = event.target.value;
  console.log($("#id_drug").val());
      checkValid();
});

$("#dose").keyup(function(event) {
    console.log($("#dose").val());
  var dose = event.target.value;
     checkValid();
});
$("#amount_of_prescription").keyup(function(event) {
  var amount_of_prescription = event.target.value;
     checkValid();
});
$("#usage_amount").keyup(function(event) {
  var usage_amount = event.target.value;
    checkValid();
});
function update() {
    checkValid();
}

function checkValid() {
    var select = document.getElementById('id_drug');
    var option = select.options[select.selectedIndex];
    if (option.value != "Pilih Obat" && $("#dose").val() != '' && $("#amount_of_prescription").val() != '' && $("#usage_amount").val() != '' ) {
        $("#submitBtn").removeAttr("disabled", "disabled");
    }
    else{
        $("#submitBtn").attr("disabled", "disabled");
        return false
    }
}

</script>