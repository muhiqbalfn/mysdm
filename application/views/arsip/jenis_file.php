<?php 
$nip        = $this->session->userdata('nip'); 
$namapeg    = $this->session->userdata('namapeg');
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
            <h1 class="m-0">Manajemen Sub Menu</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Controller') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar jenis arsip</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" id="idcobaya">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">



          <!-- HTL ===================================================================-->
          <div class="col-md-5">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  JENIS ARSIP HTL
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
                <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modaljenis"><i class="fas fa-plus"></i> &nbsp;Tambah Data </a>
                <center><h4></h4></center>
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <!-- <thead> -->
                    <tr align="center">
                      <th colspan="3">KATEGORI ARSIP</th>
                      <th width="120">AKSI</th>
                    </tr>
                  <!-- </thead>
                  <tbody> -->
                    <?php 
                    $no=0;
                    foreach ($htl as $in){
                    $no++;
                    ?>
                    <tr>
                      <td colspan="3"><?= $no; ?>. <?= $in->jenis_file ?></td>
                      <td>
                        <a href="javascript:;" class="btnedit" data="<?= $in->id_jenis_file ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> 
                        | <a href="javascript:;" class="btndel" data="<?= $in->id_jenis_file ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a> 
                        | <a href="javascript:;" class="btnaddsub btn btn-outline-info btn-sm" data="<?= $in->id_jenis_file ?>"><i class="fas fa-plus"></i> &nbsp;Sub </a>
                      </td>
                    </tr>
                      <!-- menampilkan sub jenis file -->
                      <?php
                      $sub_jenis = $this->db->from('tb_sub_jenis_file')->where('id_jenis_file',$in->id_jenis_file)->where('id_sub_jenis_file !=','0')->get()->result();
                      $nosub=0;
                      foreach ($sub_jenis as $sub){
                      $nosub++;
                      ?>
                      <tr>
                        <td></td>
                        <td colspan="2"><?= $nosub; ?>. <?= $sub->sub_jenis_file ?></td>
                        <td>
                          <a href="javascript:;" class="btneditsub" data="<?= $sub->id_sub_jenis_file ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> 
                          | <a href="javascript:;" class="btndelsub" data="<?= $sub->id_sub_jenis_file ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a> 
                          | <a href="javascript:;" class="btnaddsub2 btn btn-outline-secondary btn-sm" data="<?= $sub->id_sub_jenis_file ?>"><i class="fas fa-plus"></i> &nbsp;Sub </a>
                        </td>
                      </tr>
                        <!-- menampilkan sub jenis file 2-->
                        <?php
                        $sub_jenis2 = $this->db->from('tb_sub_jenis_file2')->where('id_sub_jenis_file',$sub->id_sub_jenis_file)->get()->result();
                        $nosub2=0;
                        foreach ($sub_jenis2 as $sub2){
                        $nosub2++;
                        ?>
                        <tr>
                          <td></td>
                          <td></td>
                          <td><?= $nosub2; ?>. <?= $sub2->sub_jenis_file2 ?></td>
                          <td>
                            <a href="javascript:;" class="btneditsub2" data="<?= $sub2->id_sub_jenis_file2 ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> 
                            | <a href="javascript:;" class="btndelsub2" data="<?= $sub2->id_sub_jenis_file2 ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php } ?>
                        <!-- /menampilkan sub jenis file 2-->
                      <?php } ?>
                      <!-- /menampilkan sub jenis file -->
                  <!-- </tbody> -->
                </table>
              </div>
            </div>
          </div>




          <!-- PENDIDIK ===================================================================-->
          <div class="col-md-5">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  JENIS ARSIP PENDIDIK
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
                <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modaljenis"><i class="fas fa-plus"></i> &nbsp;Tambah Data </a>
                <center><h4></h4></center>
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <!-- <thead> -->
                    <tr align="center">
                      <th colspan="3">KATEGORI ARSIP</th>
                      <th width="140">AKSI</th>
                    </tr>
                  <!-- </thead>
                  <tbody> -->
                    <?php 
                    $no=0;
                    foreach ($pendidik as $in){
                    $no++;
                    ?>
                    <tr>
                      <td colspan="3"><?= $no; ?>. <?= $in->jenis_file ?></td>
                      <td>
                        <a href="javascript:;" class="btnedit" data="<?= $in->id_jenis_file ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> 
                        | <a href="javascript:;" class="btndel" data="<?= $in->id_jenis_file ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a> 
                        | <a href="javascript:;" class="btnaddsub btn btn-outline-info btn-sm" data="<?= $in->id_jenis_file ?>"><i class="fas fa-plus"></i> &nbsp;Sub </a>
                      </td>
                    </tr>
                      <!-- menampilkan sub jenis file -->
                      <?php
                      $sub_jenis = $this->db->from('tb_sub_jenis_file')->where('id_jenis_file',$in->id_jenis_file)->where('id_sub_jenis_file !=','0')->get()->result();
                      $nosub=0;
                      foreach ($sub_jenis as $sub){
                      $nosub++;
                      ?>
                      <tr>
                        <td></td>
                        <td colspan="2"><?= $nosub; ?>. <?= $sub->sub_jenis_file ?></td>
                        <td>
                          <a href="javascript:;" class="btneditsub" data="<?= $sub->id_sub_jenis_file ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> 
                          | <a href="javascript:;" class="btndelsub" data="<?= $sub->id_sub_jenis_file ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a> 
                          | <a href="javascript:;" class="btnaddsub2 btn btn-outline-secondary btn-sm" data="<?= $sub->id_sub_jenis_file ?>"><i class="fas fa-plus"></i> &nbsp;Sub </a>
                        </td>
                      </tr>
                        <!-- menampilkan sub jenis file 2-->
                        <?php
                        $sub_jenis2 = $this->db->from('tb_sub_jenis_file2')->where('id_sub_jenis_file',$sub->id_sub_jenis_file)->get()->result();
                        $nosub2=0;
                        foreach ($sub_jenis2 as $sub2){
                        $nosub2++;
                        ?>
                        <tr>
                          <td></td>
                          <td></td>
                          <td><?= $nosub2; ?>. <?= $sub2->sub_jenis_file2 ?></td>
                          <td>
                            <a href="javascript:;" class="btneditsub2" data="<?= $sub2->id_sub_jenis_file2 ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> 
                            | <a href="javascript:;" class="btndelsub2" data="<?= $sub2->id_sub_jenis_file2 ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php } ?>
                        <!-- /menampilkan sub jenis file 2-->
                      <?php } ?>
                      <!-- /menampilkan sub jenis file -->
                    <?php } ?>
                  <!-- </tbody> -->
                </table>
              </div>
            </div>
          </div>
          




          <!-- TENDIK ===================================================================-->
          <div class="col-md-5">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  JENIS ARSIP TENDIK
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
                <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modaljenis"><i class="fas fa-plus"></i> &nbsp;Tambah Data </a>
                <center><h4></h4></center>
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <!-- <thead> -->
                    <tr align="center">
                      <th colspan="3">KATEGORI ARSIP</th>
                      <th width="140">AKSI</th>
                    </tr>
                  <!-- </thead>
                  <tbody> -->
                    <?php 
                    $no=0;
                    foreach ($tendik as $in){
                    $no++;
                    ?>
                    <tr>
                      <td colspan="3"><?= $no; ?>. <?= $in->jenis_file ?></td>
                      <td>
                        <a href="javascript:;" class="btnedit" data="<?= $in->id_jenis_file ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> 
                        | <a href="javascript:;" class="btndel" data="<?= $in->id_jenis_file ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a> 
                        | <a href="javascript:;" class="btnaddsub btn btn-outline-info btn-sm" data="<?= $in->id_jenis_file ?>"><i class="fas fa-plus"></i> &nbsp;Sub </a>
                      </td>
                    </tr>
                      <!-- menampilkan sub jenis file -->
                      <?php
                      $sub_jenis = $this->db->from('tb_sub_jenis_file')->where('id_jenis_file',$in->id_jenis_file)->where('id_sub_jenis_file !=','0')->get()->result();
                      $nosub=0;
                      foreach ($sub_jenis as $sub){
                      $nosub++;
                      ?>
                      <tr>
                        <td></td>
                        <td colspan="2"><?= $nosub; ?>. <?= $sub->sub_jenis_file ?></td>
                        <td>
                          <a href="javascript:;" class="btneditsub" data="<?= $sub->id_sub_jenis_file ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> 
                          | <a href="javascript:;" class="btndelsub" data="<?= $sub->id_sub_jenis_file ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a> 
                          | <a href="javascript:;" class="btnaddsub2 btn btn-outline-secondary btn-sm" data="<?= $sub->id_sub_jenis_file ?>"><i class="fas fa-plus"></i> &nbsp;Sub </a>
                        </td>
                      </tr>
                        <!-- menampilkan sub jenis file 2-->
                        <?php
                        $sub_jenis2 = $this->db->from('tb_sub_jenis_file2')->where('id_sub_jenis_file',$sub->id_sub_jenis_file)->get()->result();
                        $nosub2=0;
                        foreach ($sub_jenis2 as $sub2){
                        $nosub2++;
                        ?>
                        <tr>
                          <td></td>
                          <td></td>
                          <td><?= $nosub2; ?>. <?= $sub2->sub_jenis_file2 ?></td>
                          <td>
                            <a href="javascript:;" class="btneditsub2" data="<?= $sub2->id_sub_jenis_file2 ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> 
                            | <a href="javascript:;" class="btndelsub2" data="<?= $sub2->id_sub_jenis_file2 ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php } ?>
                        <!-- /menampilkan sub jenis file 2-->
                      <?php } ?>
                      <!-- /menampilkan sub jenis file -->
                    <?php } ?>
                  <!-- </tbody> -->
                </table>
              </div>
            </div>
          </div>






          <!-- PERMINTAAN DATA ===================================================================-->
          <div class="col-md-5">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  ARSIP PERMINTAAN DATA
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
                <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modaljenis"><i class="fas fa-plus"></i> &nbsp;Tambah Data </a>
                <center><h4></h4></center>
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <!-- <thead> -->
                    <tr align="center">
                      <th colspan="3">KATEGORI ARSIP</th>
                      <th width="140">AKSI</th>
                    </tr>
                  <!-- </thead>
                  <tbody> -->
                    <?php 
                    $no=0;
                    foreach ($permintaan_data as $in){
                    $no++;
                    ?>
                    <tr>
                      <td colspan="3"><?= $no; ?>. <?= $in->jenis_file ?></td>
                      <td>
                        <a href="javascript:;" class="btnedit" data="<?= $in->id_jenis_file ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> 
                        | <a href="javascript:;" class="btndel" data="<?= $in->id_jenis_file ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a> 
                        | <a href="javascript:;" class="btnaddsub btn btn-outline-info btn-sm" data="<?= $in->id_jenis_file ?>"><i class="fas fa-plus"></i> &nbsp;Sub </a>
                      </td>
                    </tr>
                      <!-- menampilkan sub jenis file -->
                      <?php
                      $sub_jenis = $this->db->from('tb_sub_jenis_file')->where('id_jenis_file',$in->id_jenis_file)->where('id_sub_jenis_file !=','0')->get()->result();
                      $nosub=0;
                      foreach ($sub_jenis as $sub){
                      $nosub++;
                      ?>
                      <tr>
                        <td></td>
                        <td colspan="2"><?= $nosub; ?>. <?= $sub->sub_jenis_file ?></td>
                        <td>
                          <a href="javascript:;" class="btneditsub" data="<?= $sub->id_sub_jenis_file ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> 
                          | <a href="javascript:;" class="btndelsub" data="<?= $sub->id_sub_jenis_file ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a> 
                          | <a href="javascript:;" class="btnaddsub2 btn btn-outline-secondary btn-sm" data="<?= $sub->id_sub_jenis_file ?>"><i class="fas fa-plus"></i> &nbsp;Sub </a>
                        </td>
                      </tr>
                        <!-- menampilkan sub jenis file 2-->
                        <?php
                        $sub_jenis2 = $this->db->from('tb_sub_jenis_file2')->where('id_sub_jenis_file',$sub->id_sub_jenis_file)->get()->result();
                        $nosub2=0;
                        foreach ($sub_jenis2 as $sub2){
                        $nosub2++;
                        ?>
                        <tr>
                          <td></td>
                          <td></td>
                          <td><?= $nosub2; ?>. <?= $sub2->sub_jenis_file2 ?></td>
                          <td>
                            <a href="javascript:;" class="btneditsub2" data="<?= $sub2->id_sub_jenis_file2 ?>" style="color:#1E90FF"><i class="fas fa-edit"></i></a> 
                            | <a href="javascript:;" class="btndelsub2" data="<?= $sub2->id_sub_jenis_file2 ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php } ?>
                        <!-- /menampilkan sub jenis file 2-->
                      <?php } ?>
                      <!-- /menampilkan sub jenis file -->
                    <?php } ?>
                  <!-- </tbody> -->
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




  <!-- Modal Form Tambah Jenis -->
  <div class="modal fade" id="modaljenis">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Jenis Arsip</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="user">
          <div class="modal-body">
            <div class="card card-default">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Sub Koordinator</label>
                      <select class="form-control select2" name="id_sub_file" style="width: 100%;">
                        <option value="1">HTL</option>
                        <option value="2">Pendidik</option>
                        <option value="3">Tendik</option>
                        <option value="4">Permintaan Data</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Jenis Arsip</label>
                      <input type="text" name="jenis_file" class="form-control" placeholder="Jenis file arsip">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button class="btn btn-info" id="btn_simpan" style="color: #fff"><i class="fas fa-save"></i> &nbsp;Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal -->



  <!-- Modal Form Edit Jenis -->
  <div class="modal fade" id="modaljenisedit">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Jenis Arsip</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="user">
          <input type="hidden" name="id_jenis_file1">
          <div class="modal-body">
            <div class="card card-default">
            
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Jenis Arsip</label>
                      <input type="text" name="jenis_file1" class="form-control" placeholder="Jenis file arsip">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button class="btn btn-info" id="btn_edit" style="color: #fff"><i class="fas fa-save"></i> &nbsp;Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal -->



  <!-- Modal Form Tambah Sub Jenis -->
  <div class="modal fade" id="modalsubjenis">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Sub Jenis Arsip</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="user">
          <input type="hidden" name="id_jenis_file">
          <div class="modal-body">
            <div class="card card-default">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Jenis Sub Arsip</label>
                      <input type="text" name="sub_jenis_file" class="form-control" placeholder="Jenis file arsip">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button class="btn btn-info" id="btn_simpansub" style="color: #fff"><i class="fas fa-save"></i> &nbsp;Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal -->



  <!-- Modal Form Edit Sub Jenis -->
  <div class="modal fade" id="modalsubjenisedit">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Sub Jenis Arsip</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="user">
          <input type="hidden" name="id_sub_jenis_file1">
          <div class="modal-body">
            <div class="card card-default">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Jenis Sub Arsip</label>
                      <input type="text" name="sub_jenis_file1" class="form-control" placeholder="Jenis file arsip">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button class="btn btn-info" id="btn_editsub" style="color: #fff"><i class="fas fa-save"></i> &nbsp;Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal -->



  <!-- Modal Form Tambah Sub Jenis 2 -->
  <div class="modal fade" id="modalsubjenis2">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Sub Jenis Arsip 2</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="user">
          <input type="hidden" name="id_sub_jenis_file">
          <div class="modal-body">
            <div class="card card-default">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Jenis Sub Arsip</label>
                      <input type="text" name="sub_jenis_file2" class="form-control" placeholder="Jenis file arsip">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button class="btn btn-info" id="btn_simpansub2" style="color: #fff"><i class="fas fa-save"></i> &nbsp;Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal -->




  <!-- Modal Form Edit Sub Jenis 2 -->
  <div class="modal fade" id="modalsubjenisedit2">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Sub Jenis Arsip 2</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="user">
          <input type="hidden" name="id_sub_jenis_file21">
          <div class="modal-body">
            <div class="card card-default">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Jenis Sub Arsip</label>
                      <input type="text" name="sub_jenis_file21" class="form-control" placeholder="Jenis file arsip">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button class="btn btn-info" id="btn_editsub2" style="color: #fff"><i class="fas fa-save"></i> &nbsp;Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal -->

  
  <?php $this->load->view('admin/sub/footer') ?>
<?php $this->load->view('admin/sub/foot') ?>

<script type="text/javascript">

/*JENIS ARSIP==========================================================================================================*/
  $(document).ready(function(){

    //Add -----------------------------------------------------------------
    $('#btn_simpan').click(function(e){
        e.preventDefault(); 
        if ($('[name=jenis_file]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'Jenis arsip tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else{
            var data1 = $('[name=id_sub_file]').val();
            var data2 = $('[name=jenis_file]').val();
            $.ajax({
                type : "POST",
                url  : "<?= base_url('ArsipController/add_jenis')?>",
                dataType : "JSON",
                data : {data1:data1,
                        data2:data2},
                success: function(data){
                    $('#modal-jenis').modal('hide');
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
            url  : "<?php echo base_url('ArsipController/get_edit_jenis')?>",
            dataType : "JSON",
            data : {data1:data1},
            success: function(data){
                $.each(data,function(){
                    $('#modaljenisedit').modal('show');
                    $('[name=id_jenis_file1]').val(data.id_jenis_file);
                    $('[name=jenis_file1]').val(data.jenis_file);
                });
            }
        });
        return false;
    });

    $('#btn_edit').click(function(e){ 
        e.preventDefault();
        var data1 = $('[name=id_jenis_file1]').val();
        var data2 = $('[name=jenis_file1]').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('ArsipController/edit_jenis')?>",
            dataType : "JSON",
            data : {data1:data1,
                    data2:data2},
            success: function(data){
                $('#modaljenisedit').modal('hide');
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
                url  : "<?= base_url('ArsipController/del_jenis')?>",
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

  /*JENIS ARSIP 1==========================================================================================================*/

    //Get Add Sub Jenis -------------------------------------------------------------
    $('.showdata').on('click','.btnaddsub',function(){
        var data1 = $(this).attr('data');
        $('#modalsubjenis').modal('show');
        $('[name=id_jenis_file]').val(data1);
    });

    //Add -----------------------------------------------------------------
    $('#btn_simpansub').click(function(e){
        e.preventDefault(); 
        if ($('[name=sub_jenis_file]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'Nama Sub Jenis arsip tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else{
            var data1 = $('[name=id_jenis_file]').val();
            var data2 = $('[name=sub_jenis_file]').val();
            $.ajax({
                type : "POST",
                url  : "<?= base_url('ArsipController/add_sub')?>",
                dataType : "JSON",
                data : {data1:data1,
                        data2:data2},
                success: function(data){
                    $('#modalsubjenis').modal('hide');
                    $('[name=sub_jenis_file]').val('');
                    swal({
                        type: 'success',
                        title: 'Saved !',
                        text: 'Data berhasil disimpan.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    //trigger
                    setInterval('refreshPage()', 1000);
                    //$('#idcobaya').load(document.URL +  ' #idcobaya');
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
    $('.showdata').on('click','.btneditsub',function(){
        var data1 = $(this).attr('data');
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('ArsipController/get_edit_sub')?>",
            dataType : "JSON",
            data : {data1:data1},
            success: function(data){
                $.each(data,function(){
                    $('#modalsubjenisedit').modal('show');
                    $('[name=id_sub_jenis_file1]').val(data.id_sub_jenis_file);
                    $('[name=sub_jenis_file1]').val(data.sub_jenis_file);
                });
            }
        });
        return false;
    });

    $('#btn_editsub').click(function(e){ 
        e.preventDefault();

        if ($('[name=sub_jenis_file1]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'Nama Sub Jenis arsip tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else{
          var data1 = $('[name=id_sub_jenis_file1]').val();
          var data2 = $('[name=sub_jenis_file1]').val();
          $.ajax({
              type : "POST",
              url  : "<?php echo base_url('ArsipController/edit_sub')?>",
              dataType : "JSON",
              data : {data1:data1,
                      data2:data2},
              success: function(data){
                  $('#modalsubjenisedit').modal('hide');
                  swal({
                      type: 'success', 
                      title: 'Changed !',
                      text: 'Data berhasil dirubah.',
                      timer: 2000,
                      showConfirmButton: false
                  });
                  //trigger
                  setInterval('refreshPage()', 1000)
                  //$('#idcobaya').load(document.URL +  ' #idcobaya');
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
        }
    });
    //----------------------------------------------------------------------

    //Delete ----------------------------------------------------------------
    $('.showdata').on('click','.btndelsub',function(){
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
                url  : "<?= base_url('ArsipController/del_sub')?>",
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
                  setInterval('refreshPage()', 1000);
                  //$('#idcobaya').load(document.URL +  ' #idcobaya');
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

    /*JENIS ARSIP 2==========================================================================================================*/

    //Get Add Sub Jenis -------------------------------------------------------------
    $('.showdata').on('click','.btnaddsub2',function(){
        var data1 = $(this).attr('data');
        $('#modalsubjenis2').modal('show');
        $('[name=id_sub_jenis_file]').val(data1);
    });

    //Add -----------------------------------------------------------------
    $('#btn_simpansub2').click(function(e){
        e.preventDefault(); 
        if ($('[name=sub_jenis_file2]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'Nama Sub Jenis arsip tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else{
            var data1 = $('[name=id_sub_jenis_file]').val();
            var data2 = $('[name=sub_jenis_file2]').val();
            $.ajax({
                type : "POST",
                url  : "<?= base_url('ArsipController/add_sub2')?>",
                dataType : "JSON",
                data : {data1:data1,
                        data2:data2},
                success: function(data){
                    $('#modalsubjenis2').modal('hide');
                    $('[name=sub_jenis_file2]').val('');
                    swal({
                        type: 'success',
                        title: 'Saved !',
                        text: 'Data berhasil disimpan.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    //trigger
                    setInterval('refreshPage()', 1000);
                    //$('#idcobaya').load(document.URL +  ' #idcobaya');
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
    $('.showdata').on('click','.btneditsub2',function(){
        var data1 = $(this).attr('data');
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('ArsipController/get_edit_sub2')?>",
            dataType : "JSON",
            data : {data1:data1},
            success: function(data){
                $.each(data,function(){
                    $('#modalsubjenisedit2').modal('show');
                    $('[name=id_sub_jenis_file21]').val(data.id_sub_jenis_file2);
                    $('[name=sub_jenis_file21]').val(data.sub_jenis_file2);
                });
            }
        });
        return false;
    });

    $('#btn_editsub2').click(function(e){ 
        e.preventDefault();

        if ($('[name=sub_jenis_file21]').val() == ''){
            swal({
                type: 'warning',
                title: '',
                text: 'Nama Sub Jenis arsip tidak boleh kosong !',
                timer: 2000,
                showConfirmButton: false
            });
        }else{
          var data1 = $('[name=id_sub_jenis_file21]').val();
          var data2 = $('[name=sub_jenis_file21]').val();
          $.ajax({
              type : "POST",
              url  : "<?php echo base_url('ArsipController/edit_sub2')?>",
              dataType : "JSON",
              data : {data1:data1,
                      data2:data2},
              success: function(data){
                  $('#modalsubjenisedit2').modal('hide');
                  swal({
                      type: 'success', 
                      title: 'Changed !',
                      text: 'Data berhasil dirubah.',
                      timer: 2000,
                      showConfirmButton: false
                  });
                  //trigger
                  setInterval('refreshPage()', 1000)
                  //$('#idcobaya').load(document.URL +  ' #idcobaya');
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
        }
    });
    //----------------------------------------------------------------------

    //Delete ----------------------------------------------------------------
    $('.showdata').on('click','.btndelsub2',function(){
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
                url  : "<?= base_url('ArsipController/del_sub2')?>",
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
                  setInterval('refreshPage()', 1000);
                  //$('#idcobaya').load(document.URL +  ' #idcobaya');
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