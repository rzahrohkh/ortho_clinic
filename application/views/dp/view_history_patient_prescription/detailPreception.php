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
                            <?php
                            if($dataUser['role']=="Admin"):
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
                            <?php
                            elseif($dataUser['role']=="Perawat"):
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>nurse">Dashboard</a></li>
                            <?php
                            endif;
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>ViewPatientHistory">Lihat Riwayat Pasien</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Resep Pasien</li>
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
                           <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#medicalRecord">
                                Lihat Detail Rekam Medis
                            </button>
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
                                                    <h4 for=""><span style="font-size:medium">Penanganan</span></h4>
                                                </div>
                                                <div class="col-md-1">
                                                    <p>:</p>
                                                </div>
                                                 <div class="col-md-9">
                                                     <p><?=$medical_record["handling"]?></p>
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
                                                    <p>Dr. <?=$doctor["name"]?></p>
                                                </div>
                                            </div>
                                            <hr class="mt-2 mb-3"/>
                                            <div class="row">
                                                 <h4 for=""><span style="font-size:medium">Diagnosis</span></h4>
                                            </div>
                                            <p>
                                               <?=$medical_record["diagnosis"]?>
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
                           <table class="table table-bordered mb-0 table-responsive">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Obat</th>
                                        <th>Tipe Obat</th>
                                        <th>Jumlah Dosis</th>
                                        <th>Jumlah Obat</th>
                                        <th>Penggunaan</th>
                                        <th>Catatan</th>
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
                                        <td><?=$prescription_detail['amount_of_ prescription']?></td>
                                        <td><?=$prescription_detail['usage_amount']?></td>
                                        <td><?=$prescription_detail['note']?></td>
                                       
                                    </tr>
                                    
                                    <?php
                                    $no++;
                                 endforeach;?>
                                </tbody>
                            </table>
                        </div>
                         
                        </div> 
                        <div class="row">
                            <a href="<?= base_url() ?>ViewPatientHistory/historyPrescription/<?= $id?>" class="btn btn-warning p-1">Kembali</a>
                        </div>          
                    </div>
                </div>
            </div>

        </section>
    </div>