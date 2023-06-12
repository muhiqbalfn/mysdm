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
            <h1 class="m-0">Daftar Usul Kenaikan Pangkat dan Jabatan Tendik</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Controller') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar usul pangkat dan jabatan tendik</li>
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

          <div class="col-md-12">  

            <div class="card card-danger card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  DAFTAR USUL KENAIKAN JABATAN
                </h3>
                <div class="card-tools">
                  <?php if($akses=='admin'){ ?>
                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-kj"><i class="fas fa-plus"></i> &nbsp;Tambah Data </a>
                  <?php } ?>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="showdata">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center">
                      <th>NO.</th>
                      <th>NIP</th>
                      <th>NAMA PENGUSUL</th>
                      <th>JABATAN</th>
                      <th>PANGKAT</th>
                      <th>UNIT KERJA</th>
                      <th>USULAN JABATAN</th>
                      <th>STATUS USULAN</th>
                      <?php if($akses=='admin'){ ?>
                        <th>AKSI</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no=0;
                  foreach ($data_kj as $in){
                  $no++;
                  ?>
                  <tr>
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
                          if($in->status=='Penerbitan SK'){echo'btn-info';}
                          else if($in->status=='Diusulkan'){echo'btn-warning';}
                          else if($in->status=='Dokumen tidak lengkap'){echo'btn-danger';}
                          else {echo'btn-success';}
                      ?> 
                      btn-sm btn-flat"><b><?= $in->status ?></b></button>
                    </td>
                    <?php if($akses=='admin'){ ?>
                    <td>
                      <a href="javascript:;" class="btnedit" data="<?= $in->id_kj ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> / 
                      <a href="javascript:;" class="btndel" data="<?= $in->id_kj ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a>
                    </td>
                    <?php } ?>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <!-- </marquee> -->
              </div>
            </div>

            <div class="card card-danger card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  DAFTAR USUL KENAIKAN PANGKAT
                </h3>
                <div class="card-tools">
                  <?php if($akses=='admin'){ ?>
                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-kp"><i class="fas fa-plus"></i> &nbsp;Tambah Data </a>
                  <?php } ?>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="showdata_kp">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center">
                      <th>NO.</th>
                      <th>NIP</th>
                      <th>NAMA PENGUSUL</th>
                      <th>JABATAN</th>
                      <th>PANGKAT</th>
                      <th>UNIT KERJA</th>
                      <th>USULAN PANGKAT</th>
                      <th>STATUS USULAN</th>
                      <?php if($akses=='admin'){ ?>
                        <th>AKSI</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=0;
                    foreach ($data_kp as $in){
                    $no++;
                    ?>
                    <tr>
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
                            if($in->status=='Penerbitan SK'){echo'btn-info';}
                            else if($in->status=='Diusulkan'){echo'btn-warning';}
                            else if($in->status=='Dokumen tidak lengkap'){echo'btn-danger';}
                            else {echo'btn-success';}
                        ?> 
                        btn-sm btn-flat"><b><?= $in->status ?></b></button>
                      </td>
                      <?php if($akses=='admin'){ ?>
                      <td>
                        <a href="javascript:;" class="btnedit" data_kp="<?= $in->id_kp ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> / 
                        <a href="javascript:;" class="btndel" data_kp="<?= $in->id_kp ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a>
                      </td>
                      <?php } ?>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <!-- </marquee> -->
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

  <!-- Modal Form Tambah Dokumen KJ -->
  <div class="modal fade" id="modal-kj">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Usulan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="user">
          <div class="modal-body">
            <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="number" name="nip" class="form-control" placeholder="NIP Pengusul">
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <select class="form-control select2" name="jabatan" style="width: 100%;">
                        <option value="Dosen/Tenaga Pengajar">Dosen/Tenaga Pengajar</option>
                        <option value="Asisten Ahli">Asisten Ahli</option>
                        <option value="Lektor">Lektor</option>
                        <option value="Lektor Kepala">Lektor Kepala</option>
                        <option value="Guru Besar/Profesor">Guru Besar/Profesor</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama </label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama Pengusul">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Pangkat/Golongan</label>
                      <select class="form-control select2" name="gol" style="width: 100%;">
                        <option value="Juru Muda (I/a)">Juru Muda (I/a)</option>
                        <option value="Juru Muda Tk. I (I/b)">Juru Muda Tk. I (I/b)</option>
                        <option value="Juru (I/c)">Juru (I/c)</option>
                        <option value="Juru Tk. I (I/d)">Juru Tk. I (I/d)</option>
                        <option value="Pengatur Muda (II/a)">Pengatur Muda (II/a)</option>
                        <option value="Pengatur Muda Tk. I (II/b)">Pengatur Muda Tk. I (II/b)</option>
                        <option value="Pengatur (II/c)">Pengatur (II/c)</option>
                        <option value="Pengatur Tk. I (II/d)">Pengatur Tk. I (II/d)</option>
                        <option value="Penata Muda (III/a)">Penata Muda (III/a)</option>
                        <option value="Penata Muda Tk. I (III/b)">Penata Muda Tk. I (III/b)</option>
                        <option value="Penata (III/c)">Penata (III/c)</option>
                        <option value="Penata Tk. I (III/d)">Penata Tk. I (III/d)</option>
                        <option value="Pembina (IV/a)">Pembina (IV/a)</option>
                        <option value="Pembina Tk. I (IV/b)">Pembina Tk. I (IV/b)</option>
                        <option value="Pembina Utama Muda (IV/c)">Pembina Utama Muda (IV/c)</option>
                        <option value="Pembina Utama Madya (IV/d)">Pembina Utama Madya (IV/d)</option>
                        <option value="Pembina Utama (IV/e)">Pembina Utama (IV/e)</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Usulan Jabatan</label>
                      <input type="text" name="usulan_kj" class="form-control" placeholder="Usulan Jabatan">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Unit Kerja</label>
                      <select class="form-control select2" name="unit_kerja" style="width: 100%;">
                        <option value="FIP">FIP</option>
                        <option value="FISH">FISH</option>
                        <option value="FBS">FBS</option>
                        <option value="FIO">FIO</option>
                        <option value="FMIPA">FMIPA</option>
                        <option value="FT">FT</option>
                        <option value="FEB">FEB</option>
                        <option value="Vokasi">Vokasi</option>
                        <option value="Pascasarjana">Pascasarjana</option>
                        <option value="BAKPK">BAKPK</option>
                        <option value="BUK">BUK</option>
                        <option value="LP3">LP3</option>
                        <option value="LPPM">LPPM</option>
                        <option value="UPT Perpustakaan">UPT PERPUSTAKAAN</option>
                        <option value="UPT Pusat Bahasa">UPT PUSAT BAHASA</option>
                        <option value="PPTI">PPTI</option>
                        <option value="SPI">SPI</option>
                        <option value="BPU">BPU</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                    <!-- Date -->
                    <div class="form-group">
                      <label>Date</label>
                        <div class="input-group">
                            <input type="date" name="tgl_usulan" class="form-control"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Status Usulan</label>
                      <select class="form-control select2" name="status" style="width: 100%;">
                        <option value="Penerbitan SK">Penerbitan SK</option>
                        <option value="Diusulkan">Diusulkan</option>
                        <option value="Dokumen tidak lengkap">Dokumen tidak lengkap</option>
                        <option value="Selesai">Selesai</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" id="btn_simpan" style="color: #fff"><i class="fas fa-save"></i> &nbsp;Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal Form Update Dokumen KJ -->
  <div class="modal fade" id="modaleditkj">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Usulan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="user">
          <input type="hidden" name="id_kj1">
          <div class="modal-body">
            <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="number" name="nip1" class="form-control" placeholder="NIP Pengusul">
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <input type="text" name="jabatan1" class="form-control" placeholder="Jabatan">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama </label>
                      <input type="text" name="nama1" class="form-control" placeholder="Nama Pengusul">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Pangkat/Golongan</label>
                      <select class="form-control select2" name="gol1" style="width: 100%;">
                        <option value="Juru Muda (I/a)">Juru Muda (I/a)</option>
                        <option value="Juru Muda Tk. I (I/b)">Juru Muda Tk. I (I/b)</option>
                        <option value="Juru (I/c)">Juru (I/c)</option>
                        <option value="Juru Tk. I (I/d)">Juru Tk. I (I/d)</option>
                        <option value="Pengatur Muda (II/a)">Pengatur Muda (II/a)</option>
                        <option value="Pengatur Muda Tk. I (II/b)">Pengatur Muda Tk. I (II/b)</option>
                        <option value="Pengatur (II/c)">Pengatur (II/c)</option>
                        <option value="Pengatur Tk. I (II/d)">Pengatur Tk. I (II/d)</option>
                        <option value="Penata Muda (III/a)">Penata Muda (III/a)</option>
                        <option value="Penata Muda Tk. I (III/b)">Penata Muda Tk. I (III/b)</option>
                        <option value="Penata (III/c)">Penata (III/c)</option>
                        <option value="Penata Tk. I (III/d)">Penata Tk. I (III/d)</option>
                        <option value="Pembina (IV/a)">Pembina (IV/a)</option>
                        <option value="Pembina Tk. I (IV/b)">Pembina Tk. I (IV/b)</option>
                        <option value="Pembina Utama Muda (IV/c)">Pembina Utama Muda (IV/c)</option>
                        <option value="Pembina Utama Madya (IV/d)">Pembina Utama Madya (IV/d)</option>
                        <option value="Pembina Utama (IV/e)">Pembina Utama (IV/e)</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Usulan Jabatan</label>
                      <input type="text" name="usulan_kj1" class="form-control" placeholder="Usulan Jabatan">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Unit Kerja</label>
                      <select class="form-control select2" name="unit_kerja1" style="width: 100%;">
                        <option value="FIP">FIP</option>
                        <option value="FISH">FISH</option>
                        <option value="FBS">FBS</option>
                        <option value="FIO">FIO</option>
                        <option value="FMIPA">FMIPA</option>
                        <option value="FT">FT</option>
                        <option value="FEB">FEB</option>
                        <option value="Vokasi">Vokasi</option>
                        <option value="Pascasarjana">Pascasarjana</option>
                        <option value="BAKPK">BAKPK</option>
                        <option value="BUK">BUK</option>
                        <option value="LP3">LP3</option>
                        <option value="LPPM">LPPM</option>
                        <option value="UPT Perpustakaan">UPT PERPUSTAKAAN</option>
                        <option value="UPT Pusat Bahasa">UPT PUSAT BAHASA</option>
                        <option value="PPTI">PPTI</option>
                        <option value="SPI">SPI</option>
                        <option value="BPU">BPU</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                    <!-- Date -->
                    <div class="form-group">
                      <label>Date</label>
                        <div class="input-group">
                            <input type="date" name="tgl_usulan1" class="form-control"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Status Usulan</label>
                      <select class="form-control select2" name="status1" style="width: 100%;">
                        <option value="Diusulkan">Diusulkan</option>
                        <option value="Proses verifikasi berkas">Proses verifikasi berkas</option>
                        <option value="Dokumen tidak lengkap">Dokumen tidak lengkap</option>
                        <option value="Penerbitan SK">Penerbitan SK</option>
                        <option value="Selesai">Selesai</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" id="btn_edit" style="color: #fff"><i class="fas fa-save"></i> &nbsp;Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal Form Tambah Dokumen KP -->
  <div class="modal fade" id="modal-kp">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Usulan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="user">
          <div class="modal-body">
            <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="number" name="nip_kp" class="form-control" placeholder="NIP Pengusul">
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <input type="text" name="jabatan_kp" class="form-control" placeholder="Jabatan">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama </label>
                      <input type="text" name="nama_kp" class="form-control" placeholder="Nama Pengusul">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Pangkat/Golongan</label>
                      <select class="form-control select2" name="gol_kp" style="width: 100%;">
                        <option value="Juru Muda (I/a)">Juru Muda (I/a)</option>
                        <option value="Juru Muda Tk. I (I/b)">Juru Muda Tk. I (I/b)</option>
                        <option value="Juru (I/c)">Juru (I/c)</option>
                        <option value="Juru Tk. I (I/d)">Juru Tk. I (I/d)</option>
                        <option value="Pengatur Muda (II/a)">Pengatur Muda (II/a)</option>
                        <option value="Pengatur Muda Tk. I (II/b)">Pengatur Muda Tk. I (II/b)</option>
                        <option value="Pengatur (II/c)">Pengatur (II/c)</option>
                        <option value="Pengatur Tk. I (II/d)">Pengatur Tk. I (II/d)</option>
                        <option value="Penata Muda (III/a)">Penata Muda (III/a)</option>
                        <option value="Penata Muda Tk. I (III/b)">Penata Muda Tk. I (III/b)</option>
                        <option value="Penata (III/c)">Penata (III/c)</option>
                        <option value="Penata Tk. I (III/d)">Penata Tk. I (III/d)</option>
                        <option value="Pembina (IV/a)">Pembina (IV/a)</option>
                        <option value="Pembina Tk. I (IV/b)">Pembina Tk. I (IV/b)</option>
                        <option value="Pembina Utama Muda (IV/c)">Pembina Utama Muda (IV/c)</option>
                        <option value="Pembina Utama Madya (IV/d)">Pembina Utama Madya (IV/d)</option>
                        <option value="Pembina Utama (IV/e)">Pembina Utama (IV/e)</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Usulan Pangkat</label>
                      <select class="form-control select2" name="usulan_kp" style="width: 100%;">
                        <option value="Juru Muda (I/a)">Juru Muda (I/a)</option>
                        <option value="Juru Muda Tk. I (I/b)">Juru Muda Tk. I (I/b)</option>
                        <option value="Juru (I/c)">Juru (I/c)</option>
                        <option value="Juru Tk. I (I/d)">Juru Tk. I (I/d)</option>
                        <option value="Pengatur Muda (II/a)">Pengatur Muda (II/a)</option>
                        <option value="Pengatur Muda Tk. I (II/b)">Pengatur Muda Tk. I (II/b)</option>
                        <option value="Pengatur (II/c)">Pengatur (II/c)</option>
                        <option value="Pengatur Tk. I (II/d)">Pengatur Tk. I (II/d)</option>
                        <option value="Penata Muda (III/a)">Penata Muda (III/a)</option>
                        <option value="Penata Muda Tk. I (III/b)">Penata Muda Tk. I (III/b)</option>
                        <option value="Penata (III/c)">Penata (III/c)</option>
                        <option value="Penata Tk. I (III/d)">Penata Tk. I (III/d)</option>
                        <option value="Pembina (IV/a)">Pembina (IV/a)</option>
                        <option value="Pembina Tk. I (IV/b)">Pembina Tk. I (IV/b)</option>
                        <option value="Pembina Utama Muda (IV/c)">Pembina Utama Muda (IV/c)</option>
                        <option value="Pembina Utama Madya (IV/d)">Pembina Utama Madya (IV/d)</option>
                        <option value="Pembina Utama (IV/e)">Pembina Utama (IV/e)</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Unit Kerja</label>
                      <select class="form-control select2" name="unit_kerja_kp" style="width: 100%;">
                        <option value="FIP">FIP</option>
                        <option value="FISH">FISH</option>
                        <option value="FBS">FBS</option>
                        <option value="FIO">FIO</option>
                        <option value="FMIPA">FMIPA</option>
                        <option value="FT">FT</option>
                        <option value="FEB">FEB</option>
                        <option value="Vokasi">Vokasi</option>
                        <option value="Pascasarjana">Pascasarjana</option>
                        <option value="BAKPK">BAKPK</option>
                        <option value="BUK">BUK</option>
                        <option value="LP3">LP3</option>
                        <option value="LPPM">LPPM</option>
                        <option value="UPT Perpustakaan">UPT PERPUSTAKAAN</option>
                        <option value="UPT Pusat Bahasa">UPT PUSAT BAHASA</option>
                        <option value="PPTI">PPTI</option>
                        <option value="SPI">SPI</option>
                        <option value="BPU">BPU</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                    <!-- Date -->
                    <div class="form-group">
                      <label>Date</label>
                        <div class="input-group">
                            <input type="date" name="tgl_usulan_kp" class="form-control"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Status Usulan</label>
                      <select class="form-control select2" name="status_kp" style="width: 100%;">
                        <option value="Diusulkan">Diusulkan</option>
                        <option value="Proses verifikasi berkas">Proses verifikasi berkas</option>
                        <option value="Dokumen tidak lengkap">Dokumen tidak lengkap</option>
                        <option value="Penerbitan SK">Penerbitan SK</option>
                        <option value="Selesai">Selesai</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" id="btn_simpan_kp" style="color: #fff"><i class="fas fa-save"></i> &nbsp;Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal Form Update Dokumen KP -->
  <div class="modal fade" id="modaleditkp">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Usulan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="user">
          <input type="hidden" name="id_kp1">
          <div class="modal-body">
            <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="number" name="nip_kp1" class="form-control" placeholder="NIP Pengusul">
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <input type="text" name="jabatan_kp1" class="form-control" placeholder="Jabatan">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama </label>
                      <input type="text" name="nama_kp1" class="form-control" placeholder="Nama Pengusul">
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Pangkat/Golongan</label>
                      <select class="form-control select2" name="gol_kp1" style="width: 100%;">
                        <option value="Juru Muda (I/a)">Juru Muda (I/a)</option>
                        <option value="Juru Muda Tk. I (I/b)">Juru Muda Tk. I (I/b)</option>
                        <option value="Juru (I/c)">Juru (I/c)</option>
                        <option value="Juru Tk. I (I/d)">Juru Tk. I (I/d)</option>
                        <option value="Pengatur Muda (II/a)">Pengatur Muda (II/a)</option>
                        <option value="Pengatur Muda Tk. I (II/b)">Pengatur Muda Tk. I (II/b)</option>
                        <option value="Pengatur (II/c)">Pengatur (II/c)</option>
                        <option value="Pengatur Tk. I (II/d)">Pengatur Tk. I (II/d)</option>
                        <option value="Penata Muda (III/a)">Penata Muda (III/a)</option>
                        <option value="Penata Muda Tk. I (III/b)">Penata Muda Tk. I (III/b)</option>
                        <option value="Penata (III/c)">Penata (III/c)</option>
                        <option value="Penata Tk. I (III/d)">Penata Tk. I (III/d)</option>
                        <option value="Pembina (IV/a)">Pembina (IV/a)</option>
                        <option value="Pembina Tk. I (IV/b)">Pembina Tk. I (IV/b)</option>
                        <option value="Pembina Utama Muda (IV/c)">Pembina Utama Muda (IV/c)</option>
                        <option value="Pembina Utama Madya (IV/d)">Pembina Utama Madya (IV/d)</option>
                        <option value="Pembina Utama (IV/e)">Pembina Utama (IV/e)</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Usulan Pangkat</label>
                      <select class="form-control select2" name="usulan_kp1" style="width: 100%;">
                        <option value="Juru Muda (I/a)">Juru Muda (I/a)</option>
                        <option value="Juru Muda Tk. I (I/b)">Juru Muda Tk. I (I/b)</option>
                        <option value="Juru (I/c)">Juru (I/c)</option>
                        <option value="Juru Tk. I (I/d)">Juru Tk. I (I/d)</option>
                        <option value="Pengatur Muda (II/a)">Pengatur Muda (II/a)</option>
                        <option value="Pengatur Muda Tk. I (II/b)">Pengatur Muda Tk. I (II/b)</option>
                        <option value="Pengatur (II/c)">Pengatur (II/c)</option>
                        <option value="Pengatur Tk. I (II/d)">Pengatur Tk. I (II/d)</option>
                        <option value="Penata Muda (III/a)">Penata Muda (III/a)</option>
                        <option value="Penata Muda Tk. I (III/b)">Penata Muda Tk. I (III/b)</option>
                        <option value="Penata (III/c)">Penata (III/c)</option>
                        <option value="Penata Tk. I (III/d)">Penata Tk. I (III/d)</option>
                        <option value="Pembina (IV/a)">Pembina (IV/a)</option>
                        <option value="Pembina Tk. I (IV/b)">Pembina Tk. I (IV/b)</option>
                        <option value="Pembina Utama Muda (IV/c)">Pembina Utama Muda (IV/c)</option>
                        <option value="Pembina Utama Madya (IV/d)">Pembina Utama Madya (IV/d)</option>
                        <option value="Pembina Utama (IV/e)">Pembina Utama (IV/e)</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Unit Kerja</label>
                      <select class="form-control select2" name="unit_kerja_kp1" style="width: 100%;">
                        <option value="FIP">FIP</option>
                        <option value="FISH">FISH</option>
                        <option value="FBS">FBS</option>
                        <option value="FIO">FIO</option>
                        <option value="FMIPA">FMIPA</option>
                        <option value="FT">FT</option>
                        <option value="FEB">FEB</option>
                        <option value="Vokasi">Vokasi</option>
                        <option value="Pascasarjana">Pascasarjana</option>
                        <option value="BAKPK">BAKPK</option>
                        <option value="BUK">BUK</option>
                        <option value="LP3">LP3</option>
                        <option value="LPPM">LPPM</option>
                        <option value="UPT Perpustakaan">UPT PERPUSTAKAAN</option>
                        <option value="UPT Pusat Bahasa">UPT PUSAT BAHASA</option>
                        <option value="PPTI">PPTI</option>
                        <option value="SPI">SPI</option>
                        <option value="BPU">BPU</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <div class="col-md-6">
                    <!-- Date -->
                    <div class="form-group">
                      <label>Date</label>
                        <div class="input-group">
                            <input type="date" name="tgl_usulan_kp1" class="form-control"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Status Usulan</label>
                      <select class="form-control select2" name="status_kp1" style="width: 100%;">
                        <option value="Diusulkan">Diusulkan</option>
                        <option value="Proses verifikasi berkas">Proses verifikasi berkas</option>
                        <option value="Dokumen tidak lengkap">Dokumen tidak lengkap</option>
                        <option value="Penerbitan SK">Penerbitan SK</option>
                        <option value="Selesai">Selesai</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" id="btn_edit_kp" style="color: #fff"><i class="fas fa-save"></i> &nbsp;Simpan</button>
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

<script type="text/javascript">
  /*$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
  });*/

/*KJ==========================================================================================================*/
  $(document).ready(function(){

    //Add -----------------------------------------------------------------
    $('#btn_simpan').click(function(e){
        e.preventDefault(); 
        if ($('[name=nip]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'NIP tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else if ($('[name=nama]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'Nama tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else{
            var data1 = $('[name=nip]').val();
            var data2 = $('[name=nama]').val();
            var data3 = $('[name=jabatan]').val();
            var data4 = $('[name=gol]').val();
            var data5 = $('[name=unit_kerja]').val();
            var data6 = $('[name=usulan_kj]').val();
            var data7 = $('[name=tgl_usulan]').val();
            var data8 = $('[name=status]').val();
            $.ajax({
                type : "POST",
                url  : "<?= base_url('KJController/add_kj_tendik')?>",
                dataType : "JSON",
                data : {data1:data1,
                        data2:data2,
                        data3:data3,
                        data4:data4,
                        data5:data5,
                        data6:data6,
                        data7:data7,
                        data8:data8},
                success: function(data){
                    $('#modal-kj').modal('hide');
                    swal({
                        type: 'success',
                        title: 'Saved !',
                        text: 'Data berhasil disimpan.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    //trigger
                    setInterval('refreshPage()', 1000);
                },
                error:function(){
                    swal({
                        type: 'error', 
                        title: 'Oopss.. !',
                        text: 'Data gagal disimpan.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        }
    });
    //----------------------------------------------------------------------

    //Get Edit -------------------------------------------------------------
    $('#showdata').on('click','.btnedit',function(){
        var data1 = $(this).attr('data');
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('KJController/get_edit')?>",
            dataType : "JSON",
            data : {data1:data1},
            success: function(data){
                $.each(data,function(){
                    $('#modaleditkj').modal('show');
                    $('[name=id_kj1]').val(data.id_kj);
                    $('[name=nip1]').val(data.nip);
                    $('[name=nama1]').val(data.nama);
                    $('[name=jabatan1]').val(data.jabatan);
                    $('[name=gol1]').val(data.gol);
                    $('[name=unit_kerja1]').val(data.unit_kerja);
                    $('[name=usulan_kj1]').val(data.usulan_kj);
                    $('[name=tgl_usulan1]').val(data.tgl_usulan);
                    $('[name=status1]').val(data.status);
                });
            }
        });
        return false;
    });

    $('#btn_edit').click(function(e){ 
        e.preventDefault();
        var data1 = $('[name=id_kj1]').val();
        var data2 = $('[name=nip1]').val();
        var data3 = $('[name=nama1]').val();
        var data4 = $('[name=jabatan1]').val();
        var data5 = $('[name=gol1]').val();
        var data6 = $('[name=unit_kerja1]').val();
        var data7 = $('[name=usulan_kj1]').val();
        var data8 = $('[name=tgl_usulan1]').val();
        var data9 = $('[name=status1]').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('KJController/edit_kj')?>",
            dataType : "JSON",
            data : {data1:data1,
                    data2:data2,
                    data3:data3,
                    data4:data4,
                    data5:data5,
                    data6:data6,
                    data7:data7,
                    data8:data8,
                    data9:data9},
            success: function(data){
                $('#modaleditkj').modal('hide');
                swal({
                    type: 'success', 
                    title: 'Changed !',
                    text: 'Data berhasil dirubah.',
                    timer: 2000,
                    showConfirmButton: false
                });
                //trigger
                setInterval('refreshPage()', 1000)
            },
            error:function(){
                swal({
                    type: 'error', 
                    title: 'Oopss.. !',
                    text: 'Data gagal dirubah.',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
        return false;
    });
    //----------------------------------------------------------------------

    //Delete ----------------------------------------------------------------
    $('#showdata').on('click','.btndel',function(){
        var data1 = $(this).attr('data');
        swal({
            title: "Anda yakin ?",
            text: "Data akan dihapus dari database.",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Ya, hapus !",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                type : "POST",
                url  : "<?= base_url('KJController/del_kj')?>",
                dataType : "JSON",
                data : {data1:data1},
                success: function(data){
                    swal({
                        type: 'success', 
                        title: 'Deleted !',
                        text: 'Data berhasil dihapus.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    //triger
                  setInterval('refreshPage()', 1000);
                },
                error:function(){
                    swal({
                        type: 'error', 
                        title: 'Oopss.. !',
                        text: 'Data gagal dihapus.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        });
        return false;
    });
    //----------------------------------------------------------------------

  });

/*KP===========================================================================================================*/
  
  $(document).ready(function(){

    //Add -----------------------------------------------------------------
    $('#btn_simpan_kp').click(function(e){
        e.preventDefault();
        if ($('[name=nip_kp]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'NIP tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else if ($('[name=nama_kp]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'Nama tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else{
            var data1 = $('[name=nip_kp]').val();
            var data2 = $('[name=nama_kp]').val();
            var data3 = $('[name=jabatan_kp]').val();
            var data4 = $('[name=gol_kp]').val();
            var data5 = $('[name=unit_kerja_kp]').val();
            var data6 = $('[name=usulan_kp]').val();
            var data7 = $('[name=tgl_usulan_kp]').val();
            var data8 = $('[name=status_kp]').val();
            $.ajax({
                type : "POST",
                url  : "<?= base_url('KPController/add_kp_tendik')?>",
                dataType : "JSON",
                data : {data1:data1,
                        data2:data2,
                        data3:data3,
                        data4:data4,
                        data5:data5,
                        data6:data6,
                        data7:data7,
                        data8:data8},
                success: function(data){
                    $('#modal-kp').modal('hide');
                    swal({
                        type: 'success',
                        title: 'Saved !',
                        text: 'Data berhasil disimpan.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    //trigger
                    setInterval('refreshPage()', 1000);
                },
                error:function(){
                    swal({
                        type: 'error', 
                        title: 'Oopss.. !',
                        text: 'Data gagal disimpan.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        }
    });
    //----------------------------------------------------------------------

    //Get Edit -------------------------------------------------------------
    $('#showdata_kp').on('click','.btnedit',function(){
        var data1 = $(this).attr('data_kp');
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('KPController/get_edit')?>",
            dataType : "JSON",
            data : {data1:data1},
            success: function(data){
                $.each(data,function(){
                    $('#modaleditkp').modal('show');
                    $('[name=id_kp1]').val(data.id_kp);
                    $('[name=nip_kp1]').val(data.nip);
                    $('[name=nama_kp1]').val(data.nama);
                    $('[name=jabatan_kp1]').val(data.jabatan);
                    $('[name=gol_kp1]').val(data.gol);
                    $('[name=unit_kerja_kp1]').val(data.unit_kerja);
                    $('[name=usulan_kp1]').val(data.usulan_kp);
                    $('[name=tgl_usulan_kp1]').val(data.tgl_usulan);
                    $('[name=status_kp1]').val(data.status);
                });
            }
        });
        return false;
    });

    $('#btn_edit_kp').click(function(e){ 
        e.preventDefault();
        var data1 = $('[name=id_kp1]').val();
        var data2 = $('[name=nip_kp1]').val();
        var data3 = $('[name=nama_kp1]').val();
        var data4 = $('[name=jabatan_kp1]').val();
        var data5 = $('[name=gol_kp1]').val();
        var data6 = $('[name=unit_kerja_kp1]').val();
        var data7 = $('[name=usulan_kp1]').val();
        var data8 = $('[name=tgl_usulan_kp1]').val();
        var data9 = $('[name=status_kp1]').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('KPController/edit_kp')?>",
            dataType : "JSON",
            data : {data1:data1,
                    data2:data2,
                    data3:data3,
                    data4:data4,
                    data5:data5,
                    data6:data6,
                    data7:data7,
                    data8:data8,
                    data9:data9},
            success: function(data){
                $('#modaleditkp').modal('hide');
                swal({
                    type: 'success', 
                    title: 'Changed !',
                    text: 'Data berhasil dirubah.',
                    timer: 2000,
                    showConfirmButton: false
                });
                //trigger
                setInterval('refreshPage()', 1000)
            },
            error:function(){
                swal({
                    type: 'error', 
                    title: 'Oopss.. !',
                    text: 'Data gagal dirubah.',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        });
        return false;
    });
    //----------------------------------------------------------------------

    //Delete ----------------------------------------------------------------
    $('#showdata_kp').on('click','.btndel',function(){
        var data1 = $(this).attr('data_kp');
        swal({
            title: "Anda yakin ?",
            text: "Data akan dihapus dari database.",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Ya, hapus !",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                type : "POST",
                url  : "<?= base_url('KPController/del_kp')?>",
                dataType : "JSON",
                data : {data1:data1},
                success: function(data){
                    swal({
                        type: 'success', 
                        title: 'Deleted !',
                        text: 'Data berhasil dihapus.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    //triger
                  setInterval('refreshPage()', 1000);
                },
                error:function(){
                    swal({
                        type: 'error', 
                        title: 'Oopss.. !',
                        text: 'Data gagal dihapus.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        });
        return false;
    });
    //----------------------------------------------------------------------

  });

</script>