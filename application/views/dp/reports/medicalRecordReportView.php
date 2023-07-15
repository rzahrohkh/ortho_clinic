<!-- Aplikasi Skripsi 170441100011 Roudlotuz Zahro Khoiriyah 20 Mei 2023 -->

<html >
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <style>
            .border {
                border: 1px solid;
            }
            .table-bordered  {
                width: 100%;
                border-collapse: collapse;
            }
            td, th {
                font-size: 12px;
            }
        </style>
    </head>
<body>
<table width="100%">
    <tr>
    <td class="border"width="25" align="center"><img width="50%" src="<?= base_url() ?>assets/images/logo/<?=$logo['logo']?>"style='object-fit: contain'></td>
    <td class="border" width="50" align="center"><h1>Klinik Umum dan Gigi Dr.Indra Diawan</h1><br><p>Jl. Jambangan No. 55, Karah, Kec. Jambangan,
Kota Surabaya, Jawa Timur 60232,</p></td>
    <td class="border" width="25" align="center"></td>
    </tr>
</table>
<hr>

<table>
    <tr>
        <td>Id Pasien<td>
        <td>:<td>
        <td><?=$data['id_patient']?><td>
    </tr>
    <tr>
        <td>Nama Pasien<td>
        <td>:<td>
        <td><?=$data['name_patient']?><td>
    </tr>
    <tr>
        <td>Umur Pasien<td>
        <td>:<td>
        <td><?=$data['age_patient']?><td>
    </tr>
    <tr>
        <td>Jenis Kelamin<td>
        <td>:<td>
        <td><?=$data['gender_patient']?><td>
    </tr>
</table>
<hr>

<div>
<table class="table table-bordered border" id="table1">
    <thead>
        <tr>
            <th class="border">No Rekam Medis</th>
            <th class="border">Tanggal Pemeriksaan</th>
            <th class="border">Tipe Penanganan</th>
            <th class="border">Diagnosa</th>
            <th class="border">Penanganan</th>
            <th class="border">Ditangani oleh</th>
            <th class="border">Status Penanganan</th>
            <th class="border">Biaya Pemeriksaan</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($medicalRecord as $medicalRecord) : ?>
            <tr  class="border">
            
            <td class="border"><?= $medicalRecord['id_medical_record'] ?></td>
            <td class="border"><?= $medicalRecord['inspection_date'] ?></td>
            <td class="border"><?= $medicalRecord['diagnosis'] ?></td>
            <td class="border"><?= $medicalRecord['handling'] ?></td>
            <td class="border"><?= $medicalRecord['type_handling'] ?></td>
            <td class="border">Dr. <?= $medicalRecord['name']?$medicalRecord['name']:'-' ?></td>
            <td class="border"><?= ucwords($medicalRecord['status_medical_record']) ?></td>
           <td class="border"><?= rupiah($medicalRecord['inspection_fees']) ?></td>
            
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>    
</html>
