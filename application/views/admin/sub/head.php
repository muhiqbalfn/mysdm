<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?= base_url('assets/') ?>hk1.jpg">
  <title>My-SDM - Sub Direktorat SDM</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/jqvmap/jqvmap.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/summernote/summernote-bs4.min.css">



  <!-- membuat sidebar bisa di scroll -->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Dropify -->
  <link href="<?php echo base_url('assets/dropify/dist/css/dropify.css'); ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/dropify/dist/css/dropify.min.css'); ?>" rel="stylesheet" type="text/css" />
  <!-- Sweet-alert -->
  <link rel="stylesheet" href="<?=base_url('assets/sweetalert/sweetalert.css'); ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">



  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/adminlte.min.css">
</head>



<!-- dark: dark-mode  layout-footer-fixed sidebar-collapse-->
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
  <div class="wrapper" id="load">




<!-- Loading -->
<style type="text/css">
    #loading{
        width: 100px;
        height: 100px;
        border: solid 15px #FFFFFF;
        border-top-color: #3498db;
        border-radius: 100%;

        position: fixed;
        left: 0;
        top: -70px;
        right: 0;
        bottom: 0;
        margin: auto;

        animation: putar 1s linear infinite;
    }
    @keyframes putar{
        from{transform: rotate(0deg);}
        to{transform: rotate(360deg);}
    }
</style>
