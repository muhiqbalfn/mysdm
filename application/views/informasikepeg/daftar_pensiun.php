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
            <h1 class="m-0">Daftar Usulan Pensiun</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Controller') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar usulan pensiun</li>
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

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  DAFTAR USULAN PENSIUN DOSEN
                </h3>
                <div class="card-tools">
                  <?php if($akses=='admin'){ ?>
                    <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-pensiun"><i class="fas fa-plus"></i> &nbsp;Tambah Data </a>
                  <?php } ?>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
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
                      <?php if($akses=='admin'){ ?>
                        <th>AKSI</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=0;
                    foreach ($data_pensiun_dosen as $in){
                    $no++;
                    ?>
                    <tr>
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
                      <?php if($akses=='admin'){ ?>
                      <td>
                        <a href="javascript:;" class="btnedit" data="<?= $in->id_pensiun ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> / 
                        <a href="javascript:;" class="btndel" data="<?= $in->id_pensiun ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a>
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
                  DAFTAR USULAN PENSIUN TENDIK
                </h3>
                <div class="card-tools">
                  <?php if($akses=='admin'){ ?>
                    <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-pensiun"><i class="fas fa-plus"></i> &nbsp;Tambah Data </a>
                  <?php } ?>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
                <table id="example2" class="table table-bordered table-striped table-hover">
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
                      <?php if($akses=='admin'){ ?>
                        <th>AKSI</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=0;
                    foreach ($data_pensiun_tendik as $in){
                    $no++;
                    ?>
                    <tr>
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
                      <?php if($akses=='admin'){ ?>
                      <td>
                        <a href="javascript:;" class="btnedit" data="<?= $in->id_pensiun ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> / 
                        <a href="javascript:;" class="btndel" data="<?= $in->id_pensiun ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a>
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

  <!-- Modal Form Tambah Pensiun -->
  <div class="modal fade" id="modal-pensiun">
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
                  <!-- kiri -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="number" name="nip" class="form-control" placeholder="NIP Pengusul">
                    </div>
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="tmp_lahir" class="form-control" placeholder="Tempat lahir">
                    </div>
                    <div class="form-group">
                      <label>Pangkat</label>
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
                    <div class="form-group">
                      <label>Tanggal Kirim Usulan</label>
                        <div class="input-group">
                          <input type="date" name="tgl_kirim" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Status SK</label>
                      <select class="form-control select2" name="status_sk" style="width: 100%;">
                        <option value="Pemberitahuan">Pemberitahuan</option>
                        <option value="Diusulkan">Diusulkan</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="SK Terbit">SK Terbit</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <div class="input-group">
                        <input type="text" name="jabatan" class="form-control"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jenis Pegawai</label>
                      <select class="form-control select2" name="jenis_pegawai" style="width: 100%;">
                        <option value="dosen">Dosen</option>
                        <option value="tendik">Tenaga Kependidikan</option>
                      </select>
                    </div>
                  </div>
                  <!-- kanan -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama </label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                        <div class="input-group">
                          <input type="date" name="tgl_lahir" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>TMT Pensiun</label>
                        <div class="input-group">
                          <input type="date" name="tgl_pensiun" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Terima SK</label>
                        <div class="input-group">
                          <input type="date" name="tgl_terima" class="form-control"/>
                        </div>
                    </div>
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
                        <option value="UPT Perpustakaan">UPT Perpustakaan</option>
                        <option value="UPT Pusat Bahasa">UPT Pusat Bahasa</option>
			<option value="UPT Humas">UPT Humas</option>
                        <option value="PPTI">PPTI</option>
                        <option value="SPI">SPI</option>
                        <option value="BPU">BPU</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jenis Pensiun</label>
                      <select class="form-control select2" name="jenis_pensiun" style="width: 100%;">
                        <option value="Janda/Duda">Janda/Duda</option>
                        <option value="BUP">BUP</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" name="ket" rows="3" placeholder="Enter ..."></textarea>
                    </div>
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

  <!-- Modal Form Tambah Pensiun -->
  <div class="modal fade" id="modal-pensiun2">
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
                  <!-- kiri -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="number" name="nip" class="form-control" placeholder="NIP Pengusul">
                    </div>
                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text" name="tmp_lahir" class="form-control" placeholder="Tempat lahir">
                    </div>
                    <div class="form-group">
                      <label>Pangkat</label>
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
                    <div class="form-group">
                      <label>Tanggal Kirim Usulan</label>
                        <div class="input-group">
                          <input type="date" name="tgl_kirim" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Status SK</label>
                      <select class="form-control select2" name="status_sk" style="width: 100%;">
                        <option value="Pemberitahuan">Pemberitahuan</option>
                        <option value="Diusulkan">Diusulkan</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="SK Terbit">SK Terbit</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <div class="input-group">
                        <input type="text" name="jabatan" class="form-control"/>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Jenis Pegawai</label>
                      <select class="form-control select2" name="jenis_pegawai" style="width: 100%;">
                        <option value="dosen">Dosen</option>
                        <option value="tendik">Tenaga Kependidikan</option>
                      </select>
                    </div>
                  </div>
                  <!-- kanan -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama </label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                        <div class="input-group">
                          <input type="date" name="tgl_lahir" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>TMT Pensiun</label>
                        <div class="input-group">
                          <input type="date" name="tgl_pensiun" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Terima SK</label>
                        <div class="input-group">
                          <input type="date" name="tgl_terima" class="form-control"/>
                        </div>
                    </div>
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
                        <option value="UPT Perpustakaan">UPT Perpustakaan</option>
                        <option value="UPT Pusat Bahasa">UPT Pusat Bahasa</option>
			<option value="UPT Humas">UPT Humas</option>
                        <option value="PPTI">PPTI</option>
                        <option value="SPI">SPI</option>
                        <option value="BPU">BPU</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jenis Pensiun</label>
                      <select class="form-control select2" name="jenis_pensiun" style="width: 100%;">
                        <option value="Janda/Duda">Janda/Duda</option>
                        <option value="BUP">BUP</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" name="ket" rows="3" placeholder="Enter ..."></textarea>
                    </div>
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

  <!-- Modal Form Update Dokumen Pensiun -->
  <div class="modal fade" id="modaleditpensiun">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Usulan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="user">
          <input type="hidden" name="id_pensiun1">
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
                      <label>Tempat Lahir</label>
                      <input type="text" name="tmp_lahir1" class="form-control" placeholder="Tempat lahir">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama </label>
                      <input type="text" name="nama1" class="form-control" placeholder="Nama Pegawai">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                        <div class="input-group">
                          <input type="date" name="tgl_lahir1" class="form-control"/>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Pangkat</label>
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
                    <div class="form-group">
                      <label>Tanggal Kirim Usulan</label>
                        <div class="input-group">
                          <input type="date" name="tgl_kirim1" class="form-control"/>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>TMT Pensiun</label>
                        <div class="input-group">
                          <input type="date" name="tgl_pensiun1" class="form-control"/>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status SK</label>
                      <select class="form-control select2" name="status_sk1" style="width: 100%;">
                        <option value="Pemberitahuan">Pemberitahuan</option>
                        <option value="Diusulkan">Diusulkan</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="SK Terbit">SK Terbit</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Terima SK</label>
                        <div class="input-group">
                          <input type="date" name="tgl_terima1" class="form-control"/>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jabatan</label>
                      <div class="input-group">
                        <input type="text" name="jabatan1" class="form-control"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
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
                        <option value="UPT Perpustakaan">UPT Perpustakaan</option>
                        <option value="UPT Pusat Bahasa">UPT Pusat Bahasa</option>
			<option value="UPT Humas">UPT Humas</option>
                        <option value="PPTI">PPTI</option>
                        <option value="SPI">SPI</option>
                        <option value="BPU">BPU</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jenis Pegawai</label>
                      <select class="form-control select2" name="jenis_pegawai1" style="width: 100%;">
                        <option value="dosen">Dosen</option>
                        <option value="tendik">Tenaga Kependidikan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jenis Pensiun</label>
                      <select class="form-control select2" name="jenis_pensiun1" style="width: 100%;">
                        <option value="Janda/Duda">Janda/Duda</option>
                        <option value="BUP">BUP</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" name="ket1" rows="3" placeholder="Enter ..."></textarea>
                    </div>
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

  
  <?php $this->load->view('admin/sub/footer') ?>
<?php $this->load->view('admin/sub/foot') ?>

<script type="text/javascript">

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
            var data3 = $('[name=tmp_lahir]').val();
            var data4 = $('[name=tgl_lahir]').val();
            var data5 = $('[name=gol]').val();
            var data6 = $('[name=tgl_pensiun]').val();
            var data7 = $('[name=tgl_kirim]').val();
            var data8 = $('[name=status_sk]').val();
            var data9 = $('[name=tgl_terima]').val();
            var data10 = $('[name=ket]').val();
            var data11 = $('[name=jabatan]').val();
            var data12 = $('[name=unit_kerja]').val();
            var data13 = $('[name=jenis_pegawai]').val();
            var data14 = $('[name=jenis_pensiun]').val();
            $.ajax({
                type : "POST",
                url  : "<?= base_url('PensiunController/add_pensiun')?>",
                dataType : "JSON",
                data : {data1:data1,
                        data2:data2,
                        data3:data3,
                        data4:data4,
                        data5:data5,
                        data6:data6,
                        data7:data7,
                        data8:data8,
                        data9:data9,
                        data10:data10,
                        data11:data11,
                        data12:data12,
                        data13:data13,
                        data14:data14},
                success: function(data){
                    $('#modal-pensiun').modal('hide');
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
    $('.showdata').on('click','.btnedit',function(){
        var data1 = $(this).attr('data');
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('PensiunController/get_edit')?>",
            dataType : "JSON",
            data : {data1:data1},
            success: function(data){
                $.each(data,function(){
                    $('#modaleditpensiun').modal('show');
                    $('[name=id_pensiun1]').val(data.id_pensiun);
                    $('[name=nip1]').val(data.nip);
                    $('[name=nama1]').val(data.nama);
                    $('[name=tmp_lahir1]').val(data.tmp_lahir);
                    $('[name=tgl_lahir1]').val(data.tgl_lahir);
                    $('[name=gol1]').val(data.gol);
                    $('[name=tgl_pensiun1]').val(data.tgl_pensiun);
                    $('[name=tgl_kirim1]').val(data.tgl_kirim);
                    $('[name=status_sk1]').val(data.status_sk);
                    $('[name=tgl_terima1]').val(data.tgl_terima);
                    $('[name=ket1]').val(data.ket);
                    $('[name=jabatan1]').val(data.jabatan);
                    $('[name=unit_kerja1]').val(data.unit_kerja);
                    $('[name=jenis_pegawai1]').val(data.jenis_pegawai);
                    $('[name=jenis_pensiun1]').val(data.jenis_pensiun);
                });
            }
        });
        return false;
    });

    $('#btn_edit').click(function(e){ 
        e.preventDefault();
        var data1 = $('[name=id_pensiun1]').val();
        var data2 = $('[name=nip1]').val();
        var data3 = $('[name=nama1]').val();
        var data4 = $('[name=tmp_lahir1]').val();
        var data5 = $('[name=tgl_lahir1]').val();
        var data6 = $('[name=gol1]').val();
        var data7 = $('[name=tgl_pensiun1]').val();
        var data8 = $('[name=tgl_kirim1]').val();
        var data9 = $('[name=status_sk1]').val();
        var data10 = $('[name=tgl_terima1]').val();
        var data11 = $('[name=ket1]').val();
        var data12 = $('[name=jabatan1]').val();
        var data13 = $('[name=unit_kerja1]').val();
        var data14 = $('[name=jenis_pegawai1]').val();
        var data15 = $('[name=jenis_pensiun1]').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('PensiunController/edit_pensiun')?>",
            dataType : "JSON",
            data : {data1:data1,
                    data2:data2,
                    data3:data3,
                    data4:data4,
                    data5:data5,
                    data6:data6,
                    data7:data7,
                    data8:data8,
                    data9:data9,
                    data10:data10,
                    data11:data11,
                    data12:data12,
                    data13:data13,
                    data14:data14,
                    data15:data15},
            success: function(data){
                $('#modaleditpensiun').modal('hide');
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
    $('.showdata').on('click','.btndel',function(){
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
                url  : "<?= base_url('PensiunController/del_pensiun')?>",
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