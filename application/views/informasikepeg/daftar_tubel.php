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
            <h1 class="m-0">Daftar Usulan Belajar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Controller') ?>">Home</a></li>
              <li class="breadcrumb-item active">Usulan belajar</li>
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
                  DAFTAR USUL BELAJAR DOSEN
                </h3>
                <div class="card-tools">
                  <?php if($akses=='admin'){ ?>
                    <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-tubel"><i class="fas fa-plus"></i> &nbsp;Tambah Data </a>
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
                    <th>TUJUAN</th>
                    <th>BIDANG ILMU</th>
		    <th>JENIS STUDI</th>
                    <th>PERIODE <br><code>(mulai.s.d.selesai)</code></th>
                    <th>SUMBER BIAYA</th>
                    <th>TGL KIRIM USULAN</th>
                    <th>UNIT KERJA</th>
                    <th width="90">STATUS SK</th>
                    <th width="90">STATUS SK PERPANJANGAN </th>
                    <?php if($akses=='admin'){ ?>
                      <th>AKSI</th>
                    <?php } ?>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no=0;
                  foreach ($data_tubel_dosen as $in){
                  $no++;
                  ?>
                  <tr>
                    <td align="center"><?= $no; ?></td>
                    <td><?= $in->nip ?> <br> <?= $in->nama ?></td>
                    <td><?= $in->tujuan ?></td>
                    <td><?= $in->bidang_ilmu ?></td>
		    <td><?= $in->status ?></td>
                    <td><?= $in->mulai ?> <i>s.d.</i> <br> <?= $in->selesai ?></td>
                    <td><?= $in->sumber_biaya ?></td>
                    <td><?= $in->tgl_surat_usulan ?></td>
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
                    <?php if($akses=='admin'){ ?>
                    <td>
                      <a href="javascript:;" class="btnedit" data="<?= $in->id_tubel ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> / 
                      <a href="javascript:;" class="btndel" data="<?= $in->id_tubel ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a>
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
                  DAFTAR USUL BELAJAR TENDIK
                </h3>
                  <?php if($akses=='admin'){ ?>
                    <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-tubel"><i class="fas fa-plus"></i> &nbsp;Tambah Data </a>
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
                    <th>TUJUAN</th>
                    <th>BIDANG ILMU</th>
                    <th>PERIODE <br><code>(mulai.s.d.selesai)</code></th>
                    <th>SUMBER BIAYA</th>
                    <th>TGL KIRIM USULAN</th>
                    <th>UNIT KERJA</th>
                    <th width="130">STATUS SK</th>
                    <th width="90">STATUS SK PERPANJANGAN </th>
                    <?php if($akses=='admin'){ ?>
                      <th>AKSI</th>
                    <?php } ?>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no=0;
                  foreach ($data_tubel_tendik as $in){
                  $no++;
                  ?>
                  <tr>
                    <td align="center"><?= $no; ?></td>
                    <td><?= $in->nip ?> <br> <?= $in->nama ?></td>
                    <td><?= $in->tujuan ?></td>
                    <td><?= $in->bidang_ilmu ?></td>
                    <td><?= $in->mulai ?> <i>s.d.</i> <br> <?= $in->selesai ?></td>
                    <td><?= $in->sumber_biaya ?></td>
                    <td><?= $in->tgl_surat_usulan ?></td>
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
                    <?php if($akses=='admin'){ ?>
                    <td>
                      <a href="javascript:;" class="btnedit" data="<?= $in->id_tubel ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> / 
                      <a href="javascript:;" class="btndel" data="<?= $in->id_tubel ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a>
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

  <!-- Modal Form Tambah Dokumen Tubel -->
  <div class="modal fade" id="modal-tubel">
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
                      <label>Kampus Tujuan Belajar </label>
                      <input type="text" name="tujuan" class="form-control" placeholder="Nama Kampus">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama </label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama Pengusul">
                    </div>
                    <div class="form-group">
                      <label>Negara Tujuan</label>
                      <select class="form-control select2" name="negara" style="width: 100%;">
                        <option value="DN">Dalam Negeri (DN)</option>
                        <option value="LN">Luar Negeri (LN)</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bidang Ilmu</label>
                      <input type="text" name="bidang_ilmu" class="form-control" placeholder="Bidang Ilmu">
                    </div>
                    <div class="form-group">
                      <label>Mulai</label>
                        <div class="input-group">
                          <input type="date" name="mulai" class="form-control"/>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status Belajar</label>
                      <select class="form-control select2" name="status" style="width: 100%;">
                        <option value="TUBEL">Tugas Belajar</option>
                        <option value="IBEL">Ijin Belajar</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Selesai</label>
                        <div class="input-group">
                          <input type="date" name="selesai" class="form-control"/>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
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
                    <div class="form-group">
                      <label>Status SK</label>
                      <select class="form-control select2" name="status_sk" style="width: 100%;">
                        <option value="Belum">Belum</option>
                        <option value="Diusulkan">Diusulkan</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="SK Terbit">SK Terbit</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Homebase/Jurusan/Prodi </label>
                      <input type="text" name="jurusan" class="form-control" placeholder="Homebase/Jurusan/Prodi">
                    </div>
                    <div class="form-group">
                      <label>Tgl Surat Usulan</label>
                        <div class="input-group">
                          <input type="date" name="tgl_surat_usulan" class="form-control"/>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jenis Pegawai</label>
                      <select class="form-control select2" name="jenis_pegawai" style="width: 100%;">
                        <option value="dosen">Dosen</option>
                        <option value="tendik">Tenaga Kependidikan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status SK Perpanjangan</label>
                      <select class="form-control select2" name="status_sk_perpanjangan" style="width: 100%;">
                        <option value="Belum">Belum</option>
                        <option value="Diusulkan">Diusulkan</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="SK Terbit">SK Terbit</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sumber Biaya </label>
                      <input type="text" name="sumber_biaya" class="form-control" placeholder="Sumber Dana Belajar">
                    </div>
                    <div class="form-group">
                      <label>Akhir SK Perpanjangan</label>
                      <div class="input-group">
                        <input type="date" name="akhir_sk_perpanjangan" class="form-control"/>
                      </div>
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

  <!-- Modal Form Update Dokumen Tubel -->
  <div class="modal fade" id="modaledittubel">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Usulan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="user">
          <input type="hidden" name="id_tubel1">
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
                      <label>Kampus Tujuan Belajar </label>
                      <input type="text" name="tujuan1" class="form-control" placeholder="Nama Kampus">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nama </label>
                      <input type="text" name="nama1" class="form-control" placeholder="Nama Pengusul">
                    </div>
                    <div class="form-group">
                      <label>Negara Tujuan</label>
                      <select class="form-control select2" name="negara1" style="width: 100%;">
                        <option value="DN">Dalam Negeri (DN)</option>
                        <option value="LN">Luar Negeri (LN)</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Bidang Ilmu</label>
                      <input type="text" name="bidang_ilmu1" class="form-control" placeholder="Bidang Ilmu">
                    </div>
                    <div class="form-group">
                      <label>Mulai</label>
                        <div class="input-group">
                          <input type="date" name="mulai1" class="form-control"/>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status Belajar</label>
                      <select class="form-control select2" name="status1" style="width: 100%;">
                        <option value="TUBEL">Tugas Belajar</option>
                        <option value="IBEL">Ijin Belajar</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Selesai</label>
                        <div class="input-group">
                          <input type="date" name="selesai1" class="form-control"/>
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
                        <option value="UPT Perpustakaan">UPT PERPUSTAKAAN</option>
                        <option value="UPT Pusat Bahasa">UPT PUSAT BAHASA</option>
                        <option value="PPTI">PPTI</option>
                        <option value="SPI">SPI</option>
                        <option value="BPU">BPU</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Status SK</label>
                      <select class="form-control select2" name="status_sk1" style="width: 100%;">
                        <option value="Belum">Belum</option>
                        <option value="Diusulkan">Diusulkan</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="SK Terbit">SK Terbit</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Homebase/Jurusan/Prodi </label>
                      <input type="text" name="jurusan1" class="form-control" placeholder="Homebase/Jurusan/Prodi">
                    </div>
                    <div class="form-group">
                      <label>Tgl Surat Usulan</label>
                        <div class="input-group">
                          <input type="date" name="tgl_surat_usulan1" class="form-control"/>
                        </div>
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
                    <div class="form-group">
                      <label>Status SK Perpanjangan</label>
                      <select class="form-control select2" name="status_sk_perpanjangan1" style="width: 100%;">
                        <option value="Belum">Belum</option>
                        <option value="Diusulkan">Diusulkan</option>
                        <option value="Ditolak">Ditolak</option>
                        <option value="SK Terbit">SK Terbit</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sumber Biaya </label>
                      <input type="text" name="sumber_biaya1" class="form-control" placeholder="Sumber Dana Belajar">
                    </div>
                    <div class="form-group">
                      <label>Akhir SK Perpanjangan</label>
                      <div class="input-group">
                        <input type="date" name="akhir_sk_perpanjangan1" class="form-control"/>
                      </div>
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

    <!-- Modal Tracking -->
  <div class="modal fade" id="modal-track">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tracking Usulan Tugas Belajar</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr style="background-color:#ADD8E6;">
                  <th>Icon</th>
                  <th>Progress</th>
                  <th>Status</th>
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><span class="fas fa-file"></span></td>
                  <td>Cek kelengkapan berkas</td>
                  <td><button class="btn btn-sm btn-success">Lengkap</button></td>
                  
                </tr>
                <tr>
                  <td><span class="fas fa-paper-plane"></span></td>
                  <td>Diusulkan/Dikirim</td>
                  <td><button class="btn btn-sm btn-success">Terkirim</button></td>
                  
                </tr>
                <tr>
                  <td><span class="fas fa-check"></span></td>
                  <td>Disetujui/Ditolak</td>
                  <td><button class="btn btn-sm btn-success">Disetujui</button></td>
                  
                </tr>
                <tr>
                  <td><span class="fas fa-print"></span></td>
                  <td>SK Terbit</td>
                  <td><button class="btn btn-sm btn-success">Terbit</button></td>
                  
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  
  <?php $this->load->view('admin/sub/footer') ?>
<?php $this->load->view('admin/sub/foot') ?>

<script type="text/javascript">

/*TUBEL==========================================================================================================*/
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
        }else if ($('[name=tujuan]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'Nama kampus tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else{
            var data1 = $('[name=nip]').val();
            var data2 = $('[name=nama]').val();
            var data3 = $('[name=tujuan]').val();
            var data4 = $('[name=negara]').val();
            var data5 = $('[name=bidang_ilmu]').val();
            var data6 = $('[name=mulai]').val();
            var data7 = $('[name=selesai]').val();
            var data8 = $('[name=tgl_surat_usulan]').val();
            var data9 = $('[name=sumber_biaya]').val();
            var data10 = $('[name=status]').val();
            var data11 = $('[name=unit_kerja]').val();
            var data12 = $('[name=jurusan]').val();
            var data13 = $('[name=status_sk]').val();
            var data14 = $('[name=status_sk_perpanjangan]').val();
            var data15 = $('[name=akhir_sk_perpanjangan]').val();
            var data16 = $('[name=jenis_pegawai]').val();
            $.ajax({
                type : "POST",
                url  : "<?= base_url('TubelController/add_tubel')?>",
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
                        data15:data15,
                        data16:data16},
                success: function(data){
                    $('#modal-tubel').modal('hide');
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
            url  : "<?php echo base_url('TubelController/get_edit')?>",
            dataType : "JSON",
            data : {data1:data1},
            success: function(data){
                $.each(data,function(){
                    $('#modaledittubel').modal('show');
                    $('[name=id_tubel1]').val(data.id_tubel);
                    $('[name=nip1]').val(data.nip);
                    $('[name=nama1]').val(data.nama);
                    $('[name=tujuan1]').val(data.tujuan);
                    $('[name=negara1]').val(data.negara);
                    $('[name=bidang_ilmu1]').val(data.bidang_ilmu);
                    $('[name=mulai1]').val(data.mulai);
                    $('[name=selesai1]').val(data.selesai);
                    $('[name=tgl_surat_usulan1]').val(data.tgl_surat_usulan);
                    $('[name=sumber_biaya1]').val(data.sumber_biaya);
                    $('[name=status1]').val(data.status);
                    $('[name=unit_kerja1]').val(data.unit_kerja);
                    $('[name=jurusan1]').val(data.jurusan);
                    $('[name=status_sk1]').val(data.status_sk);
                    $('[name=status_sk_perpanjangan1]').val(data.status_sk_perpanjangan);
                    $('[name=akhir_sk_perpanjangan1]').val(data.akhir_sk_perpanjangan);
                    $('[name=jenis_pegawai1]').val(data.jenis_pegawai);
                });
            }
        });
        return false;
    });

    $('#btn_edit').click(function(e){ 
        e.preventDefault();
        var data1 = $('[name=id_tubel1]').val();
        var data2 = $('[name=nip1]').val();
        var data3 = $('[name=nama1]').val();
        var data4 = $('[name=tujuan1]').val();
        var data5 = $('[name=negara1]').val();
        var data6 = $('[name=bidang_ilmu1]').val();
        var data7 = $('[name=mulai1]').val();
        var data8 = $('[name=selesai1]').val();
        var data9 = $('[name=tgl_surat_usulan1]').val();
        var data10 = $('[name=sumber_biaya1]').val();
        var data11 = $('[name=status1]').val();
        var data12 = $('[name=unit_kerja1]').val();
        var data13 = $('[name=jurusan1]').val();
        var data14 = $('[name=status_sk1]').val();
        var data15 = $('[name=status_sk_perpanjangan1]').val();
        var data16 = $('[name=akhir_sk_perpanjangan1]').val();
        var data17 = $('[name=jenis_pegawai1]').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('TubelController/edit_tubel')?>",
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
                    data15:data15,
                    data16:data16,
                    data17:data17},
            success: function(data){
                $('#modaledittubel').modal('hide');
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
                url  : "<?= base_url('TubelController/del_tubel')?>",
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