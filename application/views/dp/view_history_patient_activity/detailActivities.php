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
                            <li class="breadcrumb-item active" aria-current="page">Detail Aktifitas Pasien</li>
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
                        Detail Aktifitas Pasien
                    </div>
                    
                     <div class="card-body">
                        <div class="row">
                             <?php

                                $menu=$this->db->query("SELECT * FROM activity_type  ORDER BY id_activity_type ASC")->result_array();
                                ?>
                            <div class="form-group">
                                <?php foreach ($menu as $m) : ?>
                                </br>
                                <h6><?=$m['activity_type']?></h6>

                                <?php
                                        $menuId = $m['id_activity_type'];
                                      
                                        $querySubMenu = "SELECT * FROM activity_answer NATURAL JOIN activity_question WHERE id_activity_type= $menuId AND id_activity_patient='$id_activity_patient'";
                                        $subMenu = $this->db->query($querySubMenu)->result_array();
                                     
                                       
                                    ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                  
                                <div class="form-check">

                                    <?php if($sm['answer']):?>
                                    <input class="form-check-input" type="checkbox" checked disabled
                                        id="<?= $sm['id_activity_question']; ?>"
                                        value="<?= $sm['activity_question']; ?>"
                                        name="<?= $sm['id_activity_question']; ?>">
                                    <label class="form-check-label"
                                        for="<?= $sm['id_activity_question']; ?>"><?=$sm['activity_question']?></label>
                                    <?php
                                   elseif($sm['answer']):
                                     ?>
                                   
                                    <input class="form-check-input" type="checkbox" disabled
                                        id="<?= $sm['id_activity_question']; ?>"
                                        value="<?= $sm['activity_question']; ?>"
                                        name="<?= $sm['id_activity_question']; ?>">
                                    <label class="form-check-label"
                                        for="<?= $sm['id_activity_question']; ?>"><?=$sm['activity_question']?></label>
                                    <?php
                                         
                                            endif;
                                     ?>
                                </div>
                                <?php endforeach; ?>
                                <?php endforeach; ?>

                            </div>
                        </div>
                        <div class="row">
                            <a href="<?= base_url() ?>ViewPatientHistory/historyActivity/<?= $id?>" class="btn btn-warning p-1">Kembali</a>
                        </div>          
                    </div>
                </div>
            </div>

        </section>
    </div>