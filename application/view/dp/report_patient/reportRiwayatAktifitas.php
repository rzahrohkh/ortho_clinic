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
                            <?php
                            if($dataUser['role']=="Admin"):
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>admin">Dashboard</a></li>
                            <?php
                            elseif($dataUser['role']=="Perawat"):
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>nurse">Dashboard</a></li>
                            <?php
                            elseif($dataUser['role']=="Dokter"):
                            ?>
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>doctor">Dashboard</a></li>
                            <?php
                            endif;
                            ?>
                           <li class="breadcrumb-item active" aria-current="page"><?php echo $title ?></li>
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
                     <div class="card-body">
                     <form method="POST" action="<?= base_url() ?>reports/ReportRiwayatAktivitasExport" class="needs-validation" novalidate="">
                      <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="startDate">Tanggal Mulai</label>
                                    <input type="date" id="startDate" name="startDate" class="form-control round" placeholder="Rounded Input">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="endDate">Tanggal Berakhir</label>
                                    <input type="date" id="endDate" name="endDate" class="form-control square" placeholder="Square Input">
                                </div>
                            </div>
                            
                        </div>
                    <div class="row">
                        <div class="col-sm-6">
                             <div class="form-group">
                                <button style="width: 100%;" disabled="disabled" id="csvButton" name="csvButton"  value='csv' type="submit" class="btn icon icon-left btn-warning"><i data-feather="check-circle"></i>Download CSV</button>
                            </div>
                        </div>
                        <div class="col-sm-6">
                             <div class="form-group">
                                <button style="width: 100%;" disabled="disabled"  id="pdfButton" name="pdfButton"  value='pdf'  type="submit" class="btn icon icon-left btn-success"><i data-feather="check-circle"></i>Download PDF</button>
                            </div>
                        </div>
                    </div>
                    <form>   
                    </div>
                </div>
            </div>

        </section>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script >
// $("#submitBtn").attr("disabled", "disabled");
var startDate;
var endDate;


$("#startDate").on("keyup change", function(event) {
  var startDate = event.target.value;
  console.log($("#startDate").val());
      checkValid();
});
$("#endDate").on("keyup change",function(event) {
  var endDate = event.target.value;
     checkValid();
});

function checkValid() {
    if ($("#startDate").val() != '' && $("#endDate").val() != '') {
        $("#csvButton").removeAttr("disabled", "disabled");
        $("#pdfButton").removeAttr("disabled", "disabled");
    }
    else{
        $("#csvButton").attr("disabled", "disabled");
        $("#pdfButton").attr("disabled", "disabled");
        return false
    }
}

</script>