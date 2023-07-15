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
            #table{
                width:100%;
                display:table;
            }

            #top {
                display: table-cell;
                position: relative;
                width:100%;
                vertical-align:middle;
            }

            #top h6{
                text-shadow: 2px 2px black;
                text-align: center;
                ;
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
<div>
    <div id="table">
    <div id="top">  
       <h6>Laporan Riwayat Aktifitas Pasien<h6>
    </div>
</div>

<table class="table table-bordered border" id="table1">
    <thead>
        <tr>

            <th class="border">tanggal_submit</th>
            <th class="border">id_patient</th>
            <th class="border">nama_pasien</th>
            <th class="border">obat_yang_dikonsumsi</th>
            <th class="border">waktu</th>
            
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($aktifitas as $aktifitas) : ?>
            <tr  class="border">
                <td class="border"><?= $aktifitas['date_drugs_patient'] ?></td>
                <td class="border"><?= $aktifitas['id_patient'] ?></td>
                <td class="border"><?= $aktifitas['name_patient'] ?></td>
                <td class="border"><?= $aktifitas['drug'] ?></td>
                <td class="border"><?= $aktifitas['type'] ?></td>
            </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>    
</html>
