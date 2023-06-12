<?php  
  $nip     = $this->session->userdata('nip');
  $namapeg = $this->session->userdata('namapeg');
?> 


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-info navbar-dark">
    <div class="container">
      <a href="<?= base_url('Pangkat'); ?>" class="navbar-brand">
        <img src="<?=base_url('assets/')?>hk1.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">My-USULAN <b>PANGKAT</b></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('Pangkat'); ?>" class="nav-link">Home</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
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

        <?php if($nip){ ?>
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">
          <img src="<?= base_url('assets/img/male.png')  ?>" style="width: 30px;">
          &nbsp; <?= $namapeg ?> </a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
            <li><a href="<?=base_url('HK/logout'); ?>" class="dropdown-item">Logout</a></li>
          </ul>
        </li>

        <?php }else{ ?>
        <li class="nav-item" style="margin-top: 5px">
          <a href="#" class="btn btn-block btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-login" style="color: white;">Login Pegawai&nbsp; <i class="fas fa-sign-in-alt"></i></a>
        </li>
        <?php } ?>

      </ul>
    </div>
  </nav>
  <!-- /.navbar -->