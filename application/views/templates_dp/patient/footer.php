<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2022 &copy; ORTHO CARE</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://www.linkedin.com/in/roudlotuz-zahro-khoiriyah/">rzahrohk</a></p>
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
<script src="<?= base_url() ?>assets/js/app.js"></script>

<!-- Need: Apexcharts -->
<script src="<?= base_url() ?>assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/dashboard.js"></script>
<script src="<?= base_url() ?>assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="<?= base_url() ?>assets/js/pages/simple-datatables.js"></script>
<script src="<?= base_url(); ?>assets_user/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url() ?>assets_user/js/stisla.js"></script>

<!-- Sweet alert init js-->
<script src="<?= base_url(); ?>assets_user/js/page/sweet-alerts.init.js"></script>
<script src="<?= base_url(); ?>assets_user/js/myscript.js"></script>
<script src="<?= base_url() ?>assets_user/js/page/index.js"></script>
<script src="<?= base_url() ?>assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
<script src="<?= base_url() ?>assets/js/pages/form-element-select.js"></script>

<script src="<?= base_url() ?>assets_user/libs/summernote/summernote-bs4.min.js"></script>
<!-- <script src="<?= base_url() ?>assets_user/js/pages/summernote.init.js"></script> -->
<script>
    $(document).ready(function() {
        $(".summernote").summernote({
            height: 120,
            minHeight: null,
            maxHeight: null,
            focus: !1
        }), $(".summernote-inline").summernote({
            airMode: !0
        })
    });
</script>
</body>

</html>