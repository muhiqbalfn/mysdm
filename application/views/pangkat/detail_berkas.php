<?php $this->load->view('pangkat/sub/head') ?>
<?php $this->load->view('pangkat/sub/header') ?>


  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"><small>USULAN PANGKAT PERIODE OKTOBER 2023</small></h4>
          </div>
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">

          <div class="col-lg-12">
            <!-- tabel master -->
            <div class="card card-info card-outline">
              <div class="card-header">
                <h5 class="card-title">
                  Batas Akhir Upload Berkas : <b><i class="badge badge-info">17 Agustus 2023, Pukul 23.59 WIB</i></b><br>
                </h5>
                <div class="card-tools">
                  202011018 - M. Iqbal Firdaus Nuzula, S.Tr.Kom.
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
                <div class="row">


                  <div class="col-md-12">

                    <div class="callout callout-success col-md-6">
                      <h5>Informasi!</h5>
                      <p>
                        Ukuran maksimal file adalah <b>2 MB</b> <br>
                        Semua file bertipe <b>.PDF</b>
                      </p>
                    </div>
                    
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr align="center">
                          <th style="vertical-align: middle;">NAMA FILE</th>
                          <th style="vertical-align: middle;">FILE</th>
                          <th style="vertical-align: middle;">STATUS</th>
                          <th style="vertical-align: middle;">CATATAN REVISI</th>
                          <th style="vertical-align: middle;">AKSI</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>File SKP Tahun 2021</td>
                          <td align="center">
                            <a href="<?= base_url('assets/pangkat/'); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 30px;">
                            </a>
                          </td>
                          <td align="center"><span class="badge badge-primary">Terkirim</span></td>
                          <td>Penata Tingkat I, III/c</td>
                          <td align="center">
                            <button class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                          </td>
                        </tr>
                        <tr>
                          <td>SK KP Terakhir</td>
                          <td align="center">
                            <a href="<?= base_url('assets/pangkat/'); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 30px;">
                            </a>
                          </td>
                          <td align="center"><span class="badge badge-primary">Terkirim</span></td>
                          <td>Penata Tingkat I, III/c</td>
                          <td align="center">
                            <button class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</button>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>

                    <a href="<?= base_url('Pangkat') ?>" class="btn btn-outline-info"><i class="fas fa-angle-left"></i> Kembali</a>

                  </div>


                </div>
              </div>
            </div>
          </div>
          <!-- col-lg-12 -->



        </div>
      </div>
    </div>

  </div>


<?php $this->load->view('pangkat/sub/footer') ?>
<?php $this->load->view('pangkat/sub/foot') ?>