<?php 
$nip     = $this->session->userdata('nip'); 
$namapeg = $this->session->userdata('namapeg');

#session id_jenis_file (id jenis file yang aktif)
$sess_id     = $this->session->userdata('id_jenis_file');
$sess_idsub  = $this->session->userdata('id_sub_jenis_file');
$sess_idsub2 = $this->session->userdata('id_sub_jenis_file2');
?>


<!-- Navbar navbar-dark -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= base_url('HK') ?>" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" onClick="alert('Anda tidak punya akses !')" class="nav-link">Daftar Pegawai</a>
    </li>
     <li class="nav-item dropdown">
      <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle" style="color:green;">Informasi Kepegawaian</a>
      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
        <!-- <li><a href="<?= base_url('HK/daftar_kp') ?>" class="dropdown-item">Usulan Pangkat dan Jabatan (Dosen)</a></li>
        <li><a href="<?= base_url('HK/daftar_kp_tendik') ?>" class="dropdown-item">Usulan Pangkat dan Jabatan (Tendik)</a></li> -->

        <li><a href="javascript:;" onClick="alert('Anda tidak punya akses !')" class="dropdown-item">Usulan Pangkat dan Jabatan (Dosen)</a></li>
        <li><a href="javascript:;" onClick="alert('Anda tidak punya akses !')" class="dropdown-item">Usulan Pangkat dan Jabatan (Tendik)</a></li>
        
        <li><a href="<?= base_url('HK/daftar_tubel') ?>" class="dropdown-item">Tugas Belajar dan Ijin Belajar</a></li>
        <li><a href="<?= base_url('HK/daftar_pensiun') ?>" class="dropdown-item">Usulan Pensiun</a></li>
        <li class="dropdown-divider"></li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">
        sess_id : <?= $sess_id ?>.<?= $sess_idsub ?>.<?= $sess_idsub2 ?>
      </a>
    </li>
    
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Show -->
    <li class="nav-item" style="margin-top: 5px">       
	<a href="javascript:;" onClick="alert('Anda tidak punya akses !')" class="btn btn-block btn-outline-success btn-sm">Running Data &nbsp; <i class="fas fa-desktop"></i></a>
        <!-- <a href="<?=base_url('HK/show')?>" class="btn btn-block btn-outline-success btn-sm">Running Data &nbsp; <i class="fas fa-desktop"></i></a> -->
    </li>
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
      <img src="<?= base_url('assets/img/male.png')  ?>" style="width: 30px;">
      &nbsp; <?= $namapeg ?> </a>
      <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
        <li><a href="#" class="dropdown-item">Profile</a></li>
        <li><a href="<?=base_url('Controller/logout') ?>" class="dropdown-item">Logout</a></li>
      </ul>
    </li>
    
  </ul>
</nav>
<!-- /.navbar --> 