<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?= base_url('assets/logo-hk.png') ?>">
  <title>SIM HK - Hukum dan Kepegawaian Universitas Negeri Surabaya</title>

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
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/adminlte.min.css">
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
</head>
<body class="hold-transition dark-mode sidebar-collapse layout-top-nav">
<div class="wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <marquee direction="up" height="800px" Scrolldelay="0">
          <div class="col-md-12">
            <br>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  DAFTAR USUL KENAIKAN JABATAN
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="showdata">
                <table id="example1 showdata" class="table table-bordered table-striped table-hover">
                  <!-- <thead> -->
                  <tr align="center">
                    <th>NO.</th>
                    <th>NIP</th>
                    <th>NAMA PENGUSUL</th>
                    <th>JABATAN</th>
                    <th>PANGKAT</th>
                    <th>UNIT KERJA</th>
                    <th>USULAN JABATAN</th>
                    <th width="150">STATUS USULAN</th>
                  </tr>
                  <!-- </thead>
                  <tbody> -->
                  <?php 
                  $no=0;
                  foreach ($data_kj as $in){
                  $no++;
                  ?>
                  <tr style="background-color: <?php if($no % 2 == 0){echo '';}else{echo '#425469';} ?>">
                    <td align="center"><?= $no; ?></td>
                    <td><?= $in->nip ?></td>
                    <td><?= $in->nama ?></td>
                    <td><?= $in->jabatan ?></td>
                    <td><?= $in->gol ?></td>
                    <td align="center"><?= $in->unit_kerja ?></td>
                    <td><b><?= $in->usulan_kj ?></b></td>
                    <td>
                      <button class="btn btn-block 
                      <?php 
                          if($in->status=='Proses penerbitan SK'){echo'btn-info';}
                          else if($in->status=='Diusulkan'){echo'btn-warning';}
                          else if($in->status=='Dokumen tidak lengkap'){echo'btn-danger';}
                          else {echo'btn-success';}
                      ?> 
                      btn-sm btn-flat"><b><?= $in->status ?></b></button>
                    </td>
                  </tr>
                  <?php } ?>
                  <!-- </tbody> -->
                </table>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  DAFTAR USUL KENAIKAN PANGKAT
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="showdata">
                <table id="example1 showdata" class="table table-bordered table-striped table-hover">
                  <!-- <thead> -->
                  <tr align="center">
                    <th>NO.</th>
                    <th>NIP</th>
                    <th>NAMA PENGUSUL</th>
                    <th>JABATAN</th>
                    <th>PANGKAT</th>
                    <th>UNIT KERJA</th>
                    <th>USULAN PANGKAT</th>
                    <th>STATUS USULAN</th>
                  </tr>
                  <!-- </thead>
                  <tbody> -->
                  <?php
                  $no=0;
                  foreach ($data_kp as $in){
                  $no++;
                  ?>
                  <tr style="background-color: <?php if($no % 2 == 0){echo '';}else{echo '#425469';} ?>">
                    <td align="center"><?= $no; ?></td>
                    <td><?= $in->nip ?></td>
                    <td><?= $in->nama ?></td>
                    <td><?= $in->jabatan ?></td>
                    <td><?= $in->gol ?></td>
                    <td align="center"><?= $in->unit_kerja ?></td>
                    <td><b><?= $in->usulan_kp ?></b></td>
                    <td>
                      <button class="btn btn-block 
                      <?php
                          if($in->status=='Proses penerbitan SK'){echo'btn-info';}
                          else if($in->status=='Diusulkan'){echo'btn-warning';}
                          else if($in->status=='Dokumen tidak lengkap'){echo'btn-danger';}
                          else {echo'btn-success';}
                      ?>
                      btn-sm btn-flat"><b><?= $in->status ?></b></button>
                    </td>
                  </tr>
                  <?php } ?>
                  <!-- </tbody> -->
                </table>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  DAFTAR USUL BELAJAR
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
                <!-- <marquee direction="up" Scrolldelay="50"> -->
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr align="center">
                    <th>NO.</th>
                    <th>NIP/NAMA</th>
                    <th>TUJUAN</th>
                    <th>BIDANG ILMU</th>
                    <th>MULAI / SELESAI</th>
                    <th>SUMBER BIAYA</th>
                    <th>UNIT KERJA</th>
                    <th width="130">STATUS SK</th>
                    <th width="90">STATUS SK PERPANJANGAN </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no=0;
                  foreach ($data_tubel as $in){
                  $no++;
                  ?>
                  <tr style="background-color: <?php if($no % 2 == 0){echo '';}else{echo '#425469';} ?>">
                    <td align="center"><?= $no; ?></td>
                    <td><?= $in->nip ?> <br> <?= $in->nama ?></td>
                    <td><?= $in->tujuan ?></td>
                    <td><?= $in->bidang_ilmu ?></td>
                    <td><?= $in->mulai ?> <i>s.d.</i> <br> <?= $in->selesai ?></td>
                    <td><?= $in->sumber_biaya ?></td>
                    <td><?= $in->unit_kerja ?></td>
                    <td>
                      <button class="btn btn-block 
                      <?php 
                          if($in->status_sk=='Diusulkan'){echo'btn-info';}
                          else if($in->status_sk=='Ditolak'){echo'btn-danger';}
                          else if($in->status_sk=='SK Terbit'){echo'btn-success';}
                          else if($in->status_sk=='Belum'){echo'btn-default';}
                          else {echo'btn-warning';}
                      ?> 
                      btn-sm btn-flat" data-toggle="modal" data-target="#modal-track">
                      <b><?= $in->status_sk ?></b></button><?php if($in->status_sk=='SK Terbit'){echo "<i>Berlaku s.d. </i><br/>".$in->selesai." ";} ?>
                    </td>
                    <td>
                      <button class="btn btn-block 
                      <?php 
                          if($in->status_sk_perpanjangan=='Diusulkan'){echo'btn-info';}
                          else if($in->status_sk_perpanjangan=='Ditolak'){echo'btn-danger';}
                          else if($in->status_sk_perpanjangan=='SK Terbit'){echo'btn-success';}
                          else if($in->status_sk_perpanjangan=='Belum'){echo'btn-default';}
                          else {echo'btn-warning';}
                      ?> 
                      btn-sm btn-flat"><b><?= $in->status_sk_perpanjangan ?></b></button><?php if($in->status_sk_perpanjangan=='SK Terbit'){echo "<i>Berlaku s.d. </i><br/>".$in->akhir_sk_perpanjangan." ";} ?>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <!-- </marquee> -->
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  DAFTAR USULAN PENSIUN
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
                <!-- <marquee direction="up" Scrolldelay="50"> -->
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center">
                      <th>NO.</th>
                      <th>NIP/NAMA</th>
                      <th>TEMPAT, TGL LAHIR</th>
                      <th>PANGKAT</th>
                      <th>TMT PENSIUN</th>
                      <th>JENIS PENSIUN</th>
                      <th>TGL KIRIM</th>
                      <th>STATUS SK</th>
                      <th>JABATAN</th>
                      <th>UNIT KERJA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=0;
                    foreach ($data_pensiun as $in){
                    $no++;
                    ?>
                    <tr style="background-color: <?php if($no % 2 == 0){echo '';}else{echo '#425469';} ?>">
                      <td align="center"><?= $no; ?></td>
                      <td><?= $in->nip ?> <br> <?= $in->nama ?></td>
                      <td><?= $in->tmp_lahir ?>, <?= $in->tgl_lahir ?></td>
                      <td><?= $in->gol ?></td>
                      <td><?= $in->tgl_pensiun ?></td>
                      <td align="center"><?= $in->jenis_pensiun ?></td>
                      <td><?= $in->tgl_kirim ?></td>
                      <td align="center">
                        <button class="btn btn-block 
                        <?php 
                          if($in->status_sk=='Diusulkan'){echo'btn-info';}
                          else if($in->status_sk=='Ditolak'){echo'btn-danger';}
                          else if($in->status_sk=='SK Terbit'){echo'btn-success';}
                          else if($in->status_sk=='Pemberitahuan'){echo'btn-default';}
                          else {echo'btn-warning';}
                        ?> 
                        btn-sm btn-flat"><b><?= $in->status_sk ?></b></button><?php if($in->status_sk=='SK Terbit'){echo "".$in->tgl_terima." ";} ?>
                      </td>
                      <td><?= $in->jabatan ?></td>
                      <td align="center"><?= $in->unit_kerja ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <!-- </marquee> -->
              </div>
            </div>

          </div>
          </marquee>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <footer class="main-footer">
    <strong>&copy; 2022 <a href="https://facebook.com/muhiqbalfn">Team IT Kepeg.</a> | </strong>
    <div class="float-right d-none d-sm-inline-block">
      <marquee direction="left"  width="1125px" Scrolldelay="0">
        <b style="color: white">Kepegawaian.unesa.ac.id : Senin, 21 Februari 2022 Jadwal penandatangan perjanjian kerja Tenaga Kontrak Non PNS dan Senin - Rabu, 21 - 23 Februari 2022 penandatangan perjanjian kerja Tenaga Kependidikan Tidak Tetap (TKTT) Non PNS di Lingkungan Universitas Negeri Surabaya</b>
      </marquee>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?=base_url('assets/')?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('assets/')?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets/')?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets/')?>dist/js/demo.js"></script>
</body>
</html>

<script type="text/javascript">
  /*function zoom() {
        document.body.style.zoom = "90%" 
    }*/
    document.body.style.zoom=1.4;this.blur();

    
</script>

<!-- <script type="text/javascript">
    window.onload = maxWindow;

    function maxWindow() {
        window.moveTo(0, 0);

        if (document.all) {
            top.window.resizeTo(screen.availWidth, screen.availHeight);
        }

        else if (document.layers || document.getElementById) {
            if (top.window.outerHeight < screen.availHeight || top.window.outerWidth < screen.availWidth) {
                top.window.outerHeight = screen.availHeight;
                top.window.outerWidth = screen.availWidth;
            }
        }
    }
</script>  -->
