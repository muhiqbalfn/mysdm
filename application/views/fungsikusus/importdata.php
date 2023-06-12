<?php $this->load->view('admin/sub/head') ?>
<?php $this->load->view('admin/sub/header') ?>
<?php $this->load->view('admin/sub/sidebar') ?>

<?php 
$id_user       = $this->session->userdata('id_user'); 
$nama_user     = $this->session->userdata('nama_user');
$akses         = $this->session->userdata('akses');
?>

  <div class="content-wrapper">

    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Import Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('HK') ?>">Home</a></li>
              <li class="breadcrumb-item">Import Data</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="col-md-4">
        <?= $this->session->flashdata('message');?>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  List Fungsi
                </h3>
              </div>
                
              <!-- /.card-header -->
              <div class="card-body showdata">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center">
                      <th style="vertical-align: middle; width: 0px;">NO.</th>
                      <th style="vertical-align: middle;">FUNGSI</th>
                      <th style="vertical-align: middle;">TEMPLATE</th>
                      <th style="vertical-align: middle;">AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td align="center">1</td> 
                      <td>Import Data Pegawai Unesa (API i-sdm -> My-HK)</td>
                      <td align="center">
                        -
                      </td>
                      <td align="center">
                        <a href="<?= base_url('Api/update_pegawai'); ?>" onclick="return confirm('Anda yakin import data pegawai dari i-sdm ke my-hk ? ini akan menimpa data yang sudah ada.');" class="btn btn-success btn-sm btn"><i class="fas fa-upload"></i> Import Data Full Pegawai</a> <hr>

                        <a href="<?= base_url('Api/update_pegawai_page/1'); ?>" onclick="return confirm('Anda yakin import data pegawai dari i-sdm ke my-hk ? ini akan menimpa data yang sudah ada.');" class="btn btn-danger btn-sm btn"><i class="fas fa-upload"></i> Import 1 - 500</a> <hr>

                        <a href="<?= base_url('Api/update_pegawai_page/2'); ?>" onclick="return confirm('Anda yakin import data pegawai dari i-sdm ke my-hk ? ini akan menimpa data yang sudah ada.');" class="btn btn-danger btn-sm btn"><i class="fas fa-upload"></i> Import 501 - 1000</a> <hr>

                        <a href="<?= base_url('Api/update_pegawai_page/3'); ?>" onclick="return confirm('Anda yakin import data pegawai dari i-sdm ke my-hk ? ini akan menimpa data yang sudah ada.');" class="btn btn-danger btn-sm btn"><i class="fas fa-upload"></i> Import 1001 - 1500</a> <hr>

                        <a href="<?= base_url('Api/update_pegawai_page/4'); ?>" onclick="return confirm('Anda yakin import data pegawai dari i-sdm ke my-hk ? ini akan menimpa data yang sudah ada.');" class="btn btn-danger btn-sm btn"><i class="fas fa-upload"></i> Import 1501 - 1835</a> <hr>
                      </td>
                    </tr>
                    <tr>
                      <td align="center">1</td> 
                      <td>Import Data Masa Kerja Pegawai Non PNS (excel)</td>
                      <td align="center">
                        <a href="<?= base_url('assets/berkascuti/template/Template-MK-Non-PNS.xlsx'); ?>" class="btn btn-info btn-sm btn" onclick="return confirm('Download template ?')"><i class="fas fa-download"></i> Template</a>
                      </td>
                      <td align="center">
                        <a href="<?= base_url('assets/berkascuti/template/Template-Rekap-Sisa-Cuti-Pegawai.xlsx'); ?>" class="btn btn-success btn-sm btn" data-toggle="modal" data-target="#modal-importexcel1"><i class="fas fa-upload"></i> Mulai Import</a>
                      </td>
                    </tr>
                    <tr>
                      <td align="center">1</td>
                      <td>Import Data Sisa Cuti Pegawai (excel)</td>
                      <td align="center">
                        <a href="" class="btn btn-info btn-sm btn" onclick="return confirm('Download template ?')"><i class="fas fa-download"></i> Template</a>
                      </td>
                      <td align="center">
                        <a href="" class="btn btn-success btn-sm btn" data-toggle="modal" data-target="#modal-importexcel2"><i class="fas fa-upload"></i> Mulai Import</a>
                      </td>
                    </tr>
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


  <!-- Modal Form Import Excel -->
  <div class="modal fade" id="modal-importexcel1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Import Excel</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?= site_url('ImportData/importexcel_mknonpns') ?>" enctype="multipart/form-data">
          <div class="modal-body">
           <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>File Excel</label>
                      <input type="file" name="file" accept=".xls, .xlsx" class="form-control dropify" required>
                      <?= form_error('file','<div class="text-danger">','</div>') ?>
                      <small>Tipe file yang harus diupload : .xls, xlsx</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button type="submit" name="import" class="btn btn-outline-success"><i class="fas fa-upload"></i> &nbsp; Proses</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal Form Import Excel -->
  <div class="modal fade" id="modal-importexcel2">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Form Import Excel</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?= site_url('ImportData/importexcel_sisacuti') ?>" enctype="multipart/form-data">
          <div class="modal-body">
           <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>File Excel</label>
                      <input type="file" name="file" accept=".xls, .xlsx" class="form-control dropify" required>
                      <?= form_error('file','<div class="text-danger">','</div>') ?>
                      <small>Tipe file yang harus diupload : .xls, xlsx</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button type="submit" name="import" class="btn btn-outline-success"><i class="fas fa-upload"></i> &nbsp; Proses</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


<?php $this->load->view('admin/sub/footer') ?>
<?php $this->load->view('admin/sub/foot') ?>