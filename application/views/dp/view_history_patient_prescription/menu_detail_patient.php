<div class="card">
    <div class="card-body">
        <?php
        if($dataUser['role']=="Admin" or $dataUser['role']=="Dokter"):
        ?>
        <ul class="nav nav-pills">

            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>ViewPatientHistory/detailPatient/<?=$id?>">Data
                    Pribadi Pasien</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>ViewPatientHistory/historyMedicalRecord/<?=$id?>">Riwayat Rekam Medis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?=base_url()?>ViewPatientHistory/historyActivity/<?=$id?>">Riwayat
                    Aktifitas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active"
                    href="<?=base_url()?>ViewPatientHistory/historyPrescription/<?=$id?>">Riwayat Resep
                    Dokter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>ViewPatientHistory/historyMedicine/<?=$id?>">Obat Yang Sedang
                    Dikonsumsi</a>
            </li>
            <li class="nav-item">
                <a class="nav-lin btn btn-outline-danger"
                    href="<?=base_url()?>ViewPatientHistory/addPrescription/<?=$id?>"><i
                        class="fas fa-file-medical bg-outline-danger"></i> Beri Resep</a>
            </li>
        </ul>

        <?php
        elseif($dataUser['role']=="Nutritionist"):
        ?>
        <ul class="nav nav-pills">
            <li class="nav-item ">
                <a class="nav-link active" href="<?=base_url()?>ViewPatientHistory/detailPatient/<?=$id?>">Data
                    Pribadi Pasien</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>ViewPatientHistory/historyMedicalRecord/<?=$id?>">Riwayat Rekam Medis</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="<?=base_url()?>ViewPatientHistory/historyActivity/<?=$id?>">Riwayat
                    Aktifitas</a>
            </li>
            <li class="nav-item">
                <a class="nav-lin btn btn-outline-danger"
                    href="<?=base_url()?>ViewPatientHistory/adddietmenu/<?=$id?>"><i
                        class="fas fa-file-medical bg-outline-danger"></i> Beri Menu Diet</a>
            </li>
        </ul>

        <?php
        elseif($dataUser['role']=="Perawat"):
        ?>
        <ul class="nav nav-pills">

            <li class="nav-item">
                <a class="nav-link" href="<?=base_url()?>ViewPatientHistory/detailPatient/<?=$id?>">Data
                    Pribadi Pasien</a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link " href="<?=base_url()?>ViewPatientHistory/historyActivity/<?=$id?>">Riwayat
                    Aktifitas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active"
                    href="<?=base_url()?>ViewPatientHistory/historyPrescription/<?=$id?>">Riwayat Resep
                    Dokter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="<?=base_url()?>ViewPatientHistory/historyMedicine/<?=$id?>">Obat yang sedang
                    dikonsumsi</a>
            </li>
      
        </ul>
        <?php
        endif;
        ?>
    </div>
</div>