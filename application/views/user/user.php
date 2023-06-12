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
            <h1 class="m-0">Daftar User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Controller') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar user</li>
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

            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  DAFTAR USER
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center">
                      <th>NO.</th>
                      <th>NIP - NAMA - EMAIL</th>
                      <th>PARENT SATKER - SATKER</th>
                      <th>AKSES</th>
                      <th>PASSWORD</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=0;
                    foreach ($user as $in){
                    $no++;
                    ?>
                    <tr>
                      <td align="center"><?= $no; ?></td>
                      <td>
                        <?= $in->nip ?> <br> 
                        <b><?= $in->namalengkap ?></b> <br>
                        <i><?= $in->email_unesa ?></i>
                      </td>
                      <td>
                        <b><?= $in->namaparentsatker ?></b> <br>
                        <?= $in->namasatker ?>
                      </td>
                      <td><b style="color: blue;"><i><?= $in->akses ?></i></b></td>
                      <td><?= $in->pass ?></td>

                      <td>
                        <a href="javascript:;" class="btnedit" data="<?= $in->idpegawai ?>" style="color:#1E90FF"><i class="fas fa-edit"></i> EDIT</a>
                      </td>
                    </tr>
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


  <!-- Modal Form Update Dokumen Tubel -->
  <div class="modal fade" id="modaledit">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Hak Akses</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="user">
          <input type="hidden" name="idpegawai1">
          <div class="modal-body">
            <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Role Akses</label>
                      <select class="form-control select2" name="akses1">
                        <option value="super">Super</option>
                        <option value="admin">Admin</option>
                        <option value="fakultas">Fakultas</option>
                        <option value="pegawai">Pegawai</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" class="form-control" name="pass1">
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

  $(document).ready(function(){

    //Get Edit -------------------------------------------------------------
    $('.showdata').on('click','.btnedit',function(){
        var data1 = $(this).attr('data');
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('User/get_edit')?>",
            dataType : "JSON",
            data : {data1:data1},
            success: function(data){
                $.each(data,function(){
                    $('#modaledit').modal('show');
                    $('[name=idpegawai1]').val(data.idpegawai);
                    $('[name=akses1]').val(data.akses);
                    $('[name=pass1]').val(data.pass);
                });
            }
        });
        return false;
    });

    $('#btn_edit').click(function(e){ 
        e.preventDefault();
        var data1 = $('[name=idpegawai1]').val();
        var data2 = $('[name=akses1]').val();
        var data3 = $('[name=pass1]').val();
        $.ajax({
            type : "POST",
            url  : "<?php echo base_url('User/edit_user')?>",
            dataType : "JSON",
            data : {data1:data1,
                    data2:data2,
                    data3:data3},
            success: function(data){
                $('#modaledit').modal('hide');
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

  });

</script>