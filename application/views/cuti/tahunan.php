<?php $this->load->view('cuti/sub/head') ?>
<?php $this->load->view('cuti/sub/header') ?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><small>Cuti Tahunan</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Cuti'); ?>">Home</a></li>
              <li class="breadcrumb-item">Cuti Tahunan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container col-md-10"><br>

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Identitas Pengusul</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <label>NIP</label>
                <div class="form-group">
                  <div class="row">
                    <div class="col-10">
                      <input type="number" class="form-control" placeholder="NIP.....">
                    </div>
                    <div class="col-2">
                      <button class="btn btn-md btn-primary">Request</button>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>Jabatan</label>
                  <input type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>Unit Kerja</label>
                  <input type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                  <label>Masa Kerja</label>
                  <p>2 Tahun 10 Bulan</p>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-10">
                      <p style="color: red;">Masa kerja belum cukup untuk mengajukan cuti, minimal masa kerja adalah 1 tahun.</p>
                    </div>
                    <div class="col-2">
                      <button class="btn btn-md btn-success">Lanjut &raquo;</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>

      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('cuti/sub/footer') ?>
<?php $this->load->view('cuti/sub/foot') ?>