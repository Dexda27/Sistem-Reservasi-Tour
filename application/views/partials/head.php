<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url() ?>" data-template="vertical-menu-template">
<head>
  <meta charset="utf-8" />
  <meta
  name="viewport"
  content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title><?= $title; ?></title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/logo_senangtour.png'); ?>" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
  rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/fontawesome.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/tabler-icons.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/flag-icons.css'); ?>" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/core.css'); ?>" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/css/rtl/theme-default.css'); ?>" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?= base_url('assets/css/demo.css'); ?>" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/sweetalert2/sweetalert2.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/node-waves/node-waves.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/typeahead-js/typeahead.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/apex-charts/apex-charts.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/swiper/swiper.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/toastr/toastr.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/animate-css/animate.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/dropzone/dropzone.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/bootstrap-select/bootstrap-select.css') ?>" />

  <link rel="stylesheet" href="<?=base_url('assets/DataTables/DataTables/css/dataTables.bootstrap5.css');?>">
  <link rel="stylesheet" href="<?=base_url('assets/DataTables/dataTables.css');?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


  <!-- Page CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/css/pages/cards-advance.css'); ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/vendor/css/pages/ui-carousel.css'); ?>" />
  <link rel="stylesheet" href="<?=base_url('assets/vendor/css/pages/page-auth.css');?>" />
  <!-- Helpers -->
  <script src="<?= base_url('assets/vendor/js/helpers.js'); ?>"></script>

  <script src="<?= base_url('assets/js/config.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js') ?>"></script>

  <link rel="stylesheet" href="<?=base_url('assets/DataTables')?>/datatables.css" />

  <script src="<?=base_url('assets/DataTables')?>/datatables.js"></script>

</head>

<body>

  <?= $this->session->flashdata('loginNotif'); ?>
