<?php 
$id_user   = $this->session->userdata('id_user'); 
$nama_user = $this->session->userdata('nama_user');
$akses     = $this->session->userdata('akses');

?>

<?php $this->load->view('admin/sub/head') ?>
<?php $this->load->view('admin/sub/header') ?>
<?php $this->load->view('admin/sub/sidebar') ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Unit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Controller') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar unit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-6">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  DAFTAR UNIT
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
                <table id="#example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center">
                      <th>NO.</th>
                      <th>KODE</th>
                      <th>PARENT SATKER</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=0;
                    foreach ($unit as $in){
                    $no++;
                    ?>
                    <tr>
                      <td align="center"><?= $no; ?></td>
                      <td><?= $in->idparentsatker ?></td>
                      <td><?= $in->namaparentsatker ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  DAFTAR UNIT
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
                <table id="#example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center">
                      <th>NO.</th>
                      <th>KODE</th>
                      <th colspan="2">PARENT SATKER</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=0;
                    foreach ($unit as $in){
                    $no++;
                    ?>
                    <tr>
                      <td align="center"><?= $no; ?></td>
                      <td><?= $in->idparentsatker ?></td>
                      <td colspan="2"><?= $in->namaparentsatker ?></td>
                    </tr>
                      <?php
                      #SATKER --------------------------------------------
                      $satker =  $this->db->distinct()->select('idsatker, namasatker')
                                        ->from('tb_pegawai')
                                        ->where('idparentsatker',$in->idparentsatker)
                                        ->order_by('namasatker','asc')
                                        ->get()->result();
                      $no_satker=0;
                      foreach ($satker as $satker){
                      $no_satker++;
                      ?>
                      <tr>
                        <td></td>
                        <td></td>
                        <td align="center"><?= $no_satker; ?></td>
                        <td><?= $satker->namasatker ?> (<b><?= $satker->idsatker ?></b>)</td>
                      </tr>
                      <?php } ?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  <?php $this->load->view('sub/footer') ?>
<?php $this->load->view('sub/foot') ?>