<?php 
$nip       = $this->session->userdata('nip'); 
$namapeg   = $this->session->userdata('namapeg');
$akses     = $this->session->userdata('akses');

#session untuk simpan id sub yg aktif
$sess_id    = $this->session->userdata('id_jenis_file');
?>

<?php $this->load->view('admin/sub/head') ?>

  <?php $this->load->view('admin/sub/header') ?>
  <?php $this->load->view('admin/sub/sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <?php foreach ($nama_sub as $in){ ?>
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Arsip <?= $in->jenis_file ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('HK') ?>">Home</a></li>
              <li class="breadcrumb-item">
                <?php  
                if($in->nama_sub=='htl'){echo "HTL";}
                if($in->nama_sub=='pendidik'){echo "Kependidikan";}
                if($in->nama_sub=='tendik'){echo "Tendik";}
                ?>
              </li>
              <li class="breadcrumb-item"><?= $in->jenis_file ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <?php } ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-5">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-outline-info btn-sm dropdown-toggle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SUB JENIS ARSIP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <!-- Level two dropdown-->
              <?php foreach ($sub_parent as $in){ ?>
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?= $in->sub_jenis_file ?></a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  
                  <?php 
                  $level2 = $this->db->from('tb_sub_jenis_file2')->where('id_sub_jenis_file',$in->id_sub_jenis_file)->where('id_sub_jenis_file2 !=','0')->get()->result();
                  foreach ($level2 as $in){
                  ?>
                  <li><a tabindex="-1" href="<?=base_url('ArsipController/sub_arsip2/'.$in->id_sub_jenis_file2) ?>" class="dropdown-item"><?= $in->sub_jenis_file2 ?></a></li>
                  <?php } ?>
                </ul>
              </li>
              <?php } ?>
              <!-- End Level two -->
              <?php foreach ($sub as $in){ ?>
              <li><a href="<?=base_url('ArsipController/sub_arsip/'.$in->id_sub_jenis_file) ?>" class="dropdown-item"><?= $in->sub_jenis_file ?> </a></li>
              <?php } ?>
            </ul>
          </div>





          <!-- Filter by tahun -->
          <div class="col-7 float-sm-right">
            <ul class="pagination pagination-month justify-content-center">
              <li><a class="page-link" href="#">&laquo;</a></li>
              <li class="page-item <?=$this->uri->segment(3)=='2012' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2012') ?>">
                      <p class="page-year"><b>2012</b></p>
                  </a>
              </li>
              <li class="page-item <?=$this->uri->segment(3)=='2013' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2013') ?>">
                      <p class="page-year"><b>2013</b></p>
                  </a>
              </li>
              <li class="page-item <?=$this->uri->segment(3)=='2014' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2014') ?>">
                      <p class="page-year"><b>2014</b></p>
                  </a>
              </li>
              <li class="page-item <?=$this->uri->segment(3)=='2015' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2015') ?>">
                      <p class="page-year"><b>2015</b></p>
                  </a>
              </li>
              <li class="page-item <?=$this->uri->segment(3)=='2016' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2016') ?>">
                      <p class="page-year"><b>2016</b></p>
                  </a>
              </li>
              <li class="page-item <?=$this->uri->segment(3)=='2017' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2017') ?>">
                      <p class="page-year"><b>2017</b></p>
                  </a>
              </li>
              <li class="page-item <?=$this->uri->segment(3)=='2018' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2018') ?>">
                      <p class="page-year"><b>2018</b></p>
                  </a>
              </li>
              <li class="page-item <?=$this->uri->segment(3)=='2019' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2019') ?>">
                      <p class="page-year"><b>2019</b></p>
                  </a>
              </li>
              <li class="page-item <?=$this->uri->segment(3)=='2020' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2020') ?>">
                      <p class="page-year"><b>2020</b></p>
                  </a>
              </li>
              <li class="page-item <?=$this->uri->segment(3)=='2021' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2021') ?>">
                      <p class="page-year"><b>2021</b></p>
                  </a>
              </li>
              <li class="page-item <?=$this->uri->segment(3)=='2022' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2022') ?>">
                      <p class="page-year"><b>2022</b></p>
                  </a>
              </li>
              <li class="page-item <?=$this->uri->segment(3)=='2023' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2023') ?>">
                      <p class="page-year"><b>2023</b></p>
                  </a>
              </li>
	      <li class="page-item <?=$this->uri->segment(3)=='2024' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2024') ?>">
                      <p class="page-year"><b>2024</b></p>
                  </a>
              </li>
              <li class="page-item <?=$this->uri->segment(3)=='2025' || $this->uri->segment(3)=='' ? 'active' : '' ?>">
                  <a class="page-link" href="<?=base_url('ArsipController/arsip_year/2025') ?>">
                      <p class="page-year"><b>2025</b></p>
                  </a>
              </li>
              <li><a class="page-link" href="#">&raquo;</a></li>
            </ul>
          </div>





          <div class="col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  <?php foreach ($nama_sub as $in){ ?> <?= $in->jenis_file ?> <?php } ?>
                </h3>

                <div class="card-tools">
                  <?php if($akses=='super' or $akses=='admin'){ ?>
                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-arsip"><i class="fas fa-plus"></i> &nbsp;Tambah Data </a>
                  <?php } ?>
                </div>
              </div>
                
              <!-- /.card-header -->
              <div class="card-body showdata"> 
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center">
                      <th>NO.</th>
                      <th>NOMOR SURAT - PERIHAL</th>
                      <th>TANGGAL</th>
                      <th width="110">DOKUMEN</th>

                      <?php if($sess_id=='1' or $sess_id=='2'){ ?>
                      <th width="110" style="color:red;">DISPOSISI</th>
                      <th>STATUS</th>
                      <th>AKSES</th>
                      <?php } ?>

                      <?php if($akses=='super' or $akses=='admin'){ ?>
                      <th>AKSI</th>
                      <?php } ?>
                    </tr>
                  </thead>
                  <tbody>

                    <!-- Arsip tabel ke 2 ---------------------------------------------------------- -->
                    <?php
                    $no=0;
                    foreach ($data2 as $in){
                    $no++;
                    ?>
                    <tr>
                      <td align="center"><?= $no; ?></td> 
                      <td>
                        NOMOR : <b><?= $in->no_file ?></b><hr>
                        <?= $in->nama_file ?><br>
                        <h5><span class="badge badge-info"><?= $in->sub_jenis_file; ?> &raquo; <?= $in->sub_jenis_file2; ?></span></h5>
                      </td>
                      <td align="center"><?= $in->tgl_file ?></td>
                      <td align="center">
                        <a href="<?= base_url('assets/arsip/'.$in->file ) ?>" target="_blank">
                          <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 35px;">
                        </a>
                      </td>

                      <?php if($sess_id=='1' or $sess_id=='2'){ ?>
                      <td align="center">
                        <?php if($in->file2==''){ ?>
                          <i style="color: red;">No file</i>
                        <?php }else{ ?>
                          <a href="<?= base_url('assets/arsip/'.$in->file2 ) ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 35px;">
                          </a>
                        <?php } ?>
                      </td>
                      <td align="center"><i style="color: blue;"><?= $in->status ?></i></td>
                      <td align="center">
                        <?php if($in->mode_show==0){ ?>
                          <i style="color: blue;">Umum</i>
                        <?php }else if($in->mode_show==1){ ?>
                          <i style="color: red;">Khusus</i>
                        <?php } ?>
                      </td>
                      <?php } ?>

                      <?php if($akses=='super' or $akses=='admin'){ ?>
                      <td>
                        <a href="javascript:;" class="btnedit2" data="<?= $in->id_file2 ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> |
                        <a href="javascript:;" class="btndel2" data="<?= $in->id_file2 ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a>
                      </td>
                      <?php } ?>
                    </tr>
                    <?php } ?>

                    <!-- -------------------------------------------------------------------------- -->
                    
                    <?php
                    foreach ($data as $in){
                    $no++;
                    ?>
                    <tr>
                      <td align="center"><?= $no; ?></td>
                      <td>
                        NOMOR : <b><?= $in->no_file ?></b><hr>
                        <?= $in->nama_file ?><br>
                        <!-- <h5><span class="badge badge-info"><?= $in->sub_jenis_file ?></span></h5> -->
                      </td>
                      <td align="center"><?= $in->tgl_file ?></td>
                      <td align="center">
                        <a href="<?= base_url('assets/arsip/'.$in->file ) ?>" target="_blank">
                          <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 35px;">
                        </a>
                      </td>

                      <?php if($sess_id=='1' or $sess_id=='2'){ ?>
                        <td align="center">
                          <?php if($in->file2==''){ ?>
                            <i style="color: red;">No file</i>
                          <?php }else{ ?>
                            <a href="<?= base_url('assets/arsip/'.$in->file2 ) ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 35px;">
                            </a>
                          <?php } ?>
                        </td>
                        <td align="center"><i style="color: blue;"><?= $in->status ?></i></td>
                        <td align="center">
                          <?php if($in->mode_show==0){ ?>
                            <i style="color: blue;">Umum</i>
                          <?php }else if($in->mode_show==1){ ?>
                            <i style="color: red;">Khusus</i>
                          <?php } ?>
                        </td>
                      <?php } ?>

                      <?php if($akses=='super' or $akses=='admin'){ ?>
                        <td>
                          <a href="javascript:;" class="btnedit" data="<?= $in->id_file ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> |
                          <a href="javascript:;" class="btndel" data="<?= $in->id_file ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a>
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

  <!-- Modal Form Tambah Dokumen -->
  <div class="modal fade" id="modal-arsip">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Dokumen</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="frmArsip">
          <input type="hidden" class="form-control" readonly="readonly" name="id_jenis_file" value="<?= $sess_id ?>">
          <div class="modal-body">
           <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nomor Dokumen</label>
                      <input type="text" name="no_file" class="form-control" placeholder="Nomor Dokumen">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Dokumen</label>
                      <input type="date" name="tgl_file" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama Dokumen</label>
                      <textarea class="form-control" name="nama_file" rows="2" placeholder="Nama Dokumen"></textarea>
                    </div>
                    <p>Drag & drop dokumen disini&hellip;</p>
                    <p><input type="file" name="file" class="dropify" accept="application/pdf"></p>
                  </div>

                  <?php if($sess_id=='1' or $sess_id=='2'){ ?>
                  <div class="col-md-12">
                    <p>Drag & drop disposisi</p>
                    <p><input type="file" name="file2" class="dropify2" accept="application/pdf"></p>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status</label>
                      <input type="text" name="status" class="form-control" placeholder="Status">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mode_show" value="1" checked>
                        <label class="form-check-label">Khusus</label>
                      </div>
                    </div>
                  </div>
                  <?php } ?>

                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Modal Form Edit Dokumen -->
  <div class="modal fade" id="modal-arsip-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Dokumen</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="frmArsipEdit">
          <input type="hidden" class="form-control" readonly="readonly" name="id_file1">
          <div class="modal-body">
           <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nomor Dokumen</label>
                      <input type="text" name="no_file1" class="form-control" placeholder="Nomor Dokumen">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Dokumen</label>
                      <input type="date" name="tgl_file1" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama Dokumen</label>
                      <textarea class="form-control" name="nama_file1" rows="2" placeholder="Nama Dokumen"></textarea>
                    </div>
                    <p style="color: red">[ Tidak perlu upload dokumen jika tidak ingin mengganti ]</p>
                    <p><input type="file" name="file1" class="dropify" accept="application/pdf"></p>
                  </div>

                  <?php if($sess_id=='1' or $sess_id=='2'){ ?>
                  <div class="col-md-12">
                    <p style="color: red">[ Tidak perlu upload dokumen jika tidak ingin mengganti ]</p>
                    <p><input type="file" name="file21" class="dropify2" accept="application/pdf"></p>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status</label>
                      <input type="text" name="status1" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mode_show1" value="1" checked>
                        <label class="form-check-label">Khusus</label>
                      </div>
                    </div>
                  </div>
                  <?php } ?>

                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- ============================================
    TB_FILE2
  ============================================= -->

    <!-- Modal Form Edit Dokumen -->
  <div class="modal fade" id="modal-arsip-edit2">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Dokumen</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="frmArsipEdit2">
          <input type="hidden" class="form-control" readonly="readonly" name="id_file1">
          <div class="modal-body">
           <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Nomor Dokumen</label>
                      <input type="text" name="no_file1" class="form-control" placeholder="Nomor Dokumen">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Dokumen</label>
                      <input type="date" name="tgl_file1" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama Dokumen</label>
                      <textarea class="form-control" name="nama_file1" rows="2" placeholder="Nama Dokumen"></textarea>
                    </div>
                    <p style="color: red">[ Tidak perlu upload dokumen jika tidak ingin mengganti ]</p>
                    <p><input type="file" name="file1" class="dropify" accept="application/pdf"></p>
                  </div>

                  <?php if($sess_id=='1' or $sess_id=='2'){ ?>
                  <div class="col-md-12">
                    <p style="color: red">[ Tidak perlu upload dokumen jika tidak ingin mengganti ]</p>
                    <p><input type="file" name="file21" class="dropify2"accept="application/pdf"></p>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Status</label>
                      <input type="text" name="status1" class="form-control" placeholder="Status">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="mode_show1" value="1" checked>
                        <label class="form-check-label">Khusus</label>
                      </div>
                    </div>
                  <?php } ?>

                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

    <!-- ============================================
    TB_FILE2
    ============================================= -->

  
  <?php $this->load->view('admin/sub/footer') ?>
<?php $this->load->view('admin/sub/foot') ?>

<script type="text/javascript">

  $(document).ready(function(){

    //Add -----------------------------------------------------------------
    $('#frmArsip').submit(function(e){
      e.preventDefault();
        if ($('[name=no_file]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'Nomor Dokumen tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else if ($('[name=tgl_file]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'Tanggal Dokumen tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else if ($('[name=nama_file]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'Nama Dokumen tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else if ($('[name=file]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'Dokumen tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else{
          $.ajax({
               url:'<?php echo base_url();?>ArsipController/add_arsip',
               type:"post",
               data:new FormData(this),
               processData:false,
               contentType:false,
               cache:false,
               async:false,
               success: function(data){
                $('#modal-arsip').modal('hide');
                $('[name=no_file]').val('');
                $('[name=nama_file]').val('');
                $('[name=tgl_file]').val('');
                $('[name=file]').val('');
                $('[name=file2]').val('');
                $('[name=status]').val('');
                swal({
                  type: 'success', 
                  title: 'Saved !',
                  text: 'Dokumen berhasil disimpan.',
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
                    text: 'Dokumen gagal disimpan.',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
          });
        }
    });

    //Get Edit -------------------------------------------------------------
    $('.showdata').on('click','.btnedit',function(){
        var data1 = $(this).attr('data');
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('ArsipController/get_edit')?>",
            dataType : "JSON",
            data : {data1:data1},
            success: function(data){
                $.each(data,function(){
                    $('#modal-arsip-edit').modal('show');
                    $('[name=id_file1]').val(data.id_file);
                    $('[name=no_file1]').val(data.no_file);
                    $('[name=nama_file1]').val(data.nama_file);
                    $('[name=tgl_file1]').val(data.tgl_file);
                    $('[name=file1]').val(data.file);
                    $('[name=file21]').val(data.file2);
                    $('[name=status1]').val(data.status);
                    $('[name=mode_show1]').val(data.mode_show);
                });
            }
        });
        return false;
    });

    $('#frmArsipEdit').submit(function(e){
      e.preventDefault();
           $.ajax({
               url:'<?php echo base_url();?>ArsipController/edit_arsip',
               type:"post",
               data:new FormData(this),
               processData:false,
               contentType:false,
               cache:false,
               async:false,
               success: function(data){
                $('#modal-arsip-edit').modal('hide');
                  swal({
                    type: 'success', 
                    title: 'Changed !',
                    text: 'Dokumen berhasil dirubah.',
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
                    text: 'Dokumen gagal disimpan.',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
      });
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
                url  : "<?= base_url('ArsipController/del_arsip')?>",
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

<!-- ============================================
TB_FILE2
============================================= -->

<script type="text/javascript">

  $(document).ready(function(){

    //Get Edit -------------------------------------------------------------
    $('.showdata').on('click','.btnedit2',function(){
        var data1 = $(this).attr('data');
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('ArsipController/get_edit2')?>",
            dataType : "JSON",
            data : {data1:data1},
            success: function(data){
                $.each(data,function(){
                    $('#modal-arsip-edit2').modal('show');
                    $('[name=id_file1]').val(data.id_file2);
                    $('[name=no_file1]').val(data.no_file);
                    $('[name=nama_file1]').val(data.nama_file);
                    $('[name=tgl_file1]').val(data.tgl_file);
                    $('[name=file1]').val(data.file);
                    $('[name=status1]').val(data.status);
                    $('[name=mode_show1]').val(data.mode_show);
                });
            }
        });
        return false;
    });

    $('#frmArsipEdit2').submit(function(e){
      e.preventDefault();
           $.ajax({
               url:'<?php echo base_url();?>ArsipController/edit_arsip2',
               type:"post",
               data:new FormData(this),
               processData:false,
               contentType:false,
               cache:false,
               async:false,
               success: function(data){
                $('#modal-arsip-edit').modal('hide');
                  swal({
                    type: 'success', 
                    title: 'Changed !',
                    text: 'Dokumen berhasil dirubah.',
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
                    text: 'Dokumen gagal disimpan.',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
      });
    });
    //----------------------------------------------------------------------

    //Delete ----------------------------------------------------------------
    $('.showdata').on('click','.btndel2',function(){
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
                url  : "<?= base_url('ArsipController/del_arsip2')?>",
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