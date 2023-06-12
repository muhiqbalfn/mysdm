<?php 
$nip      = $this->session->userdata('nip'); 
$namapeg  = $this->session->userdata('namapeg');
$akses    = $this->session->userdata('akses');
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #008B8B;">
  <!-- Brand Logo -->
  <a href="<?= base_url('HK') ?>" class="brand-link" style="background-color: #008B8B;">
    <img src="<?=base_url('assets/')?>hk1.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light" style=""><b>My-SDM</b> UNESA</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=base_url('assets/')?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $namapeg ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" style="background-color: #008B8B;">
        <div class="input-group-append">
          <button class="btn btn-sidebar" style="background-color: #008B8B;">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
	      <li class="nav-item">
          <a href="<?=base_url('') ?>" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              DASHBOARD
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=base_url('HK') ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              HOME
            </p>
          </a>
        </li>




        <?php if($akses == 'admin' or $akses == 'super'){ ?>

        <!-- LAYANAN ======================================================-->
        <li class="nav-header"><i>LAYANAN</i></li>


        <!-- DATA CUTI ====================================================-->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-car"></i>
            <p>
              USULAN CUTI
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url('CutiAdmin') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Usulan Cuti</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url('CutiAdmin/rekapancuti') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Rekapan Cuti</p>
              </a>
            </li>
          </ul>
        </li>


        <!-- DATA PANGKAT ====================================================-->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              USULAN PANGKAT
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url('PangkatAdmin') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Periode KP</p>
              </a>
            </li>
          </ul>
        </li>


        <!-- DATA GELAR ====================================================-->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-graduation-cap"></i>
            <p>
              PENCANTUMAN GELAR
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url('GelarAdmin') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>DATA USULAN</p>
              </a>
            </li>
          </ul>
        </li>


        <!-- PERMINTAAN DATA ==============================================-->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-server"></i>
            <p>
              PERMINTAAN DATA
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php foreach ($permintaan_data as $in){ ?>
            <li class="nav-item">
              <a href="<?=base_url('ArsipController/arsip/'.$in->id_jenis_file) ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p><?= $in->jenis_file ?></p>
              </a>
            </li>
            <?php } ?>
          </ul>
        </li>

        <?php } ?>






        <!-- MENU ARSIP ==========================================================-->
        <li class="nav-header"><i>ARSIP</i></li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              HTL
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php foreach ($htl as $in){ ?>
            <li class="nav-item">
              <a href="<?=base_url('ArsipController/arsip/'.$in->id_jenis_file) ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p><?= $in->jenis_file ?></p>
              </a>
            </li>
            <?php } ?>
          </ul>
        </li>

        
        <?php if($akses == 'admin' or $akses == 'super'){ ?>
        
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              PENDIDIK
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php foreach ($pendidik as $in){ ?>
            <li class="nav-item">
              <a href="<?=base_url('ArsipController/arsip/'.$in->id_jenis_file) ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p><?= $in->jenis_file ?></p>
              </a>
            </li>
            <?php } ?>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-desktop"></i>
            <p>
              KEPENDIDIKAN
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php foreach ($tendik as $in){ ?>
            <li class="nav-item">
              <a href="<?=base_url('ArsipController/arsip/'.$in->id_jenis_file) ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p><?= $in->jenis_file ?></p>
              </a>
            </li>
            <?php } ?>
          </ul>
        </li>

        <?php } ?>




        <!-- KHUSUS =========================================================-->
        <?php if($akses == 'super'){ ?>


        <li class="nav-header"><i>KHUSUS</i></li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-lock"></i>
            <p>
              FUNGSI KHUSUS
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url('ImportData') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>IMPORT DATA</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              PEGAWAI
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url('User/pegawai') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>PEGAWAI</p>
              </a>
            </li>
          </ul>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url('User/user') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>USER</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              REFERENSI
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?=base_url('Referensi/unit') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>UNIT</p>
              </a>
            </li>
          </ul>
        </li>

      <?php } ?>


      <?php if($akses=='super'){ ?>
        <li class="nav-item" style="margin-top: 15px">
          <a href="<?=base_url('ArsipController/TambahJenisArsip')?>" class="btn btn-block btn-outline-success btn-sm">MANAJEMEN SUB MENU</a>
        </li>
      <?php } ?>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>