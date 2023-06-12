<?php 
$akses    = $this->session->userdata('akses');
?>

<?php $this->load->view('admin/sub/head') ?>
<?php $this->load->view('admin/sub/header') ?>
<?php $this->load->view('admin/sub/sidebar') ?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-7">
            <h5><?php foreach ($periode as $periode){ echo"".$periode->nama_periode."";} ?></h5>
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('HK')?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('PangkatAdmin')?>">Periode Pengiriman</a></li>
              <li class="breadcrumb-item active">Daftar Pegawai Diusulkan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">

          <div class="col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  DAFTAR PEGAWAI DIUSULKAN
                </h3>

                <div class="card-tools">
                  <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-add"><i class="fas fa-plus"></i> &nbsp;Tambah Pegawai </a>
                </div>

              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
                <table id="example2" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr align="center">
                    <th width="0">NO.</th>
                    <th>STATUS</th>
                    <th width="0">FOTO</th>
                    <th>NAMA PEGAWAI</th>
                    <th>JABATAN FUNGSIONAL</th>
                    <th>GOL.</th>
                    <th>UNIT KERJA</th>
                    <th width="75">AKSI</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php 
                  $no=0;
                  foreach ($data as $in){
                  $no++;
                  $isdosen = $in->isdosen;
                  ?>
                  <tr>
                    <td align="center"><?= $no; ?></td>
                    <td align="center">
                      <?php 
                        if($isdosen==1){
                          echo'<span class="badge badge-primary">DOSEN</span>';
                        }else{
                          echo'<span class="badge badge-danger">TENDIK</span>';
                        }
                      ?>
                    </td>
                    <td>
                      <img class="img-rounded" style="width:50px;" src="<?=base_url('assets/img/pegawai/'.$in->nip.'.jpg'); ?>">
                    </td>
                    <td><?= $in->nip ?> <br> <b><?= $in->namalengkap ?></b></td>
                    <td><?= $in->namajfungsional ?></td>
                    <td align="center"><?= $in->pangkat ?></td>
                    <td><?= $in->namaparentsatker ?></td>
                    <td align="center">
                      <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                      </button>
                      <div class="dropdown-menu" style="width: 5px;">
                        <a href="<?= base_url('PangkatAdmin/detail_berkas_dosen/'.$in->id_kp_dosen) ?>" class="dropdown-item" style="color:#1E90FF">
                          <i class="fas fa-file"></i> Berkas
                        </a>
                        <?php if($akses=='super'){ ?>
                        <a href="javascript:;" class="dropdown-item btndel" style="color:red" data="<?= $in->id_kp_dosen ?>">
                          <i class="fas fa-trash"></i> Hapus
                        </a>
                        <?php } ?>
                      </div>
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
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Modal Form Tambah -->
  <div class="modal fade" id="modal-add">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Pegawai</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <input type="hidden" name="id_periode" value="<?= $this->uri->segment(3) ?>">
          <div class="modal-body">
           <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>PEGAWAI</label>
                      <select class="form-control select-new" style="width: 100%;" name="nip">
                        <option>-- Pilih --</option>
                        <?php foreach ($pegawai as $peg){ ?>
                        <option value="<?= $peg->nip ?>"><?= $peg->namalengkap ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button type="button" id="btn_simpan" class="btn btn-outline-primary"><i class="fas fa-save"></i> &nbsp; Simpan</button>
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

    //Add -----------------------------------------------------------------
    $('#btn_simpan').click(function(e){
      e.preventDefault();
        var data1 = $('[name=id_periode]').val();
        var data2 = $('[name=nip]').val();
        $.ajax({
            type : "POST",
            url  : "<?= base_url('PangkatAdmin/add_dosen')?>",
            dataType : "JSON",
            data : {data1:data1,data2:data2},
            success: function(data){
              $('#modal-add').modal('hide');
                swal({
                  type: 'success', 
                  title: 'Changed !',
                  text: 'Data berhasil disimpan.',
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
                  text: 'Data gagal disimpan.',
                  timer: 2000,
                  showConfirmButton: false
              });
          }
        });
    });


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
                url  : "<?= base_url('PangkatAdmin/del_dosen')?>",
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