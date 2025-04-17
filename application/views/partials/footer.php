
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="<?= base_url('assets/DataTables/dataTables.js') ?>"> </script>
<script src="<?= base_url('assets/DataTables/dataTables/js/dataTables.bootstrap5.js') ?>"></script>
<script src="<?= base_url('assets/DataTables/dataTables/js/dataTables.dataTables.js') ?>"></script>
<script src="<?= base_url('assets/DataTables/dataTables/js/jquery.dataTables.js') ?>"></script>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?= base_url('assets/vendor/libs/popper/popper.js') ?>"></script>
<script src="<?= base_url('assets/vendor/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/node-waves/node-waves.js') ?>"></script>
<script src="<?= base_url('assets/js/ui-toasts.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/toastr/toastr.js') ?>"></script>


<script src="<?= base_url('assets/vendor/libs/hammer/hammer.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/i18n/i18n.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/typeahead-js/typeahead.js') ?>"></script>

<script src="<?= base_url('assets/vendor/js/menu.js') ?>"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= base_url('assets/vendor/libs/sweetalert2/sweetalert2.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/apex-charts/apexcharts.js') ?>"></script>  
<script src="<?= base_url('assets/vendor/libs/swiper/swiper.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/toastr/toastr.js') ?>"></script>
<script src="<?= base_url('assets/vendor/libs/dropzone/dropzone.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?= base_url('assets/vendor/libs/bootstrap-select/bootstrap-select.js') ?>"></script> 


<!-- Main JS -->
<script src="<?= base_url('assets/js/main.js') ?>"></script>

<!-- Page JS -->
<script src="<?= base_url('assets/js/dashboards-analytics.js') ?>"></script> 
<script src="<?= base_url('assets/js/ui-carousel.js') ?>"></script>  
<script src="<?= base_url('assets/js/forms-file-upload.js') ?>"></script> 
<script src="<?= base_url('assets/js/pages-auth.js')?>"></script>
<?php if (isset($component_footer_url)): ?>
	<script src="<?= $component_footer_url;?>"></script>
<?php else:?>
<?php endif;  ?>

<!-- <script src="<?= base_url('assets/js/cards-statistics.js');  ?>"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

</body>
</html>


