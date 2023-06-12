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
          <div class="col-sm-6">
            <h1>Periode Kenaikan Pangkat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('HK')?>">Home</a></li>
              <li class="breadcrumb-item active">Periode Kenaikan Pangkat</li>
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
                  DAFTAR PERIODE
                </h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-periode"><i class="fas fa-plus"></i> &nbsp;Tambah Periode </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
                <table id="example2x" class="table table-bordered table-striped table-hover">
                  <thead>
                  <tr align="center">
                    <th width="0">NO.</th>
                    <th>NAMA PERIODE PENGIRIMAN</th>
                    <th width="200">DAFTAR PEGAWAI</th>
                    <th width="200">BATAS WAKTU<br> <code>(mulai s.d. selesai)</code></th>
                    
                    <?php if($akses == 'super' or $akses == 'admin'){ ?>
                    <th width="100">AKSI</th>
                    <?php } ?>
                  
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no=0;
                  foreach ($data as $in){
                  $no++;
                  ?>
                  <tr>
                    <td align="center"><?= $no; ?></td>
                    <td><?= $in->nama_periode ?></td>

                    <td align="center">
                      <a href="<?=base_url('PangkatAdmin/pegawai_kp_dosen/'.$in->id_periode);?>" class="btn btn-outline-primary btn-sm"><i class="fas fa-user-tie"></i> &nbsp;Dosen </a>
                      <a href="<?=base_url('PangkatAdmin/pegawai_kp_tendik/'.$in->id_periode);?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-user-tie"></i> &nbsp;Tendik </a>
                    </td>

                    <td align="center">
                      <span class="badge badge-info"><?= $in->waktu_mulai ?></span> s.d 
                      <span class="badge badge-info"><?= $in->waktu_selesai ?></span>
                    </td>

                    <td align="center">
                      <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                      </button>
                      <div class="dropdown-menu" style="width: 5px;">
                        <a href="javascript:;" class="dropdown-item btnedit" data="<?= $in->id_periode ?>" style="color:#1E90FF"><i class="fas fa-edit"></i> Edit</a>
                        <?php if($akses=='super'){ ?>
                        <a href="javascript:;" class="dropdown-item btndel" data="<?= $in->id_periode ?>" style="color:red">
                          <i class="fas fa-trash"></i> Hapus
                        </a>
                        <?php } ?>
                      </div>
                    </td>
                    <?php } ?>

                  </tr>
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



  <!-- Modal Form Tambah Dokumen -->
  <div class="modal fade" id="modal-periode">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Periode</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="frmPeriode">
          <div class="modal-body">
           <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama Periode KP</label>
                      <textarea class="form-control" name="nama_periode" rows="2" placeholder="Nama periode usulan"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Mulai</label>
                      <input type="date" name="waktu_mulai" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Akhir</label>
                      <input type="date" name="waktu_selesai" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Catatan</label>
                      <textarea class="form-control" name="catatan_periode" rows="2" placeholder="Catatan"></textarea>
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



  <!-- Modal Form Edit Dokumen -->
  <div class="modal fade" id="modal-periode-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Periode</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="frmPeriodeEdit">
          <input type="hidden" name="id_periode1">
          <div class="modal-body">
           <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama Periode Usulan</label>
                      <textarea class="form-control" name="nama_periode1" rows="2" placeholder="Nama periode usulan"></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Mulai</label>
                      <input type="date" name="waktu_mulai1" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Akhir</label>
                      <input type="date" name="waktu_selesai1" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Catatan</label>
                      <textarea class="form-control" name="catatan_periode1" rows="2" placeholder="Catatan"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button type="button" id="btn_edit" class="btn btn-outline-primary"><i class="fas fa-save"></i> &nbsp; Simpan</button>
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

/*==========================================================================================================*/
  $(document).ready(function(){

    //Add -----------------------------------------------------------------
    $('#btn_simpan').click(function(e){
      e.preventDefault();
          var data1 = $('[name=nama_periode]').val();
          var data2 = $('[name=waktu_mulai]').val();
          var data3 = $('[name=waktu_selesai]').val();
          var data4 = $('[name=catatan_periode]').val();
          $.ajax({
              type : "POST",
              url  : "<?= base_url('PangkatAdmin/add_periode')?>",
              dataType : "JSON",
              data : {data1:data1,
                      data2:data2,
                      data3:data3,
                      data4:data4},
              success: function(data){
                $('#modal-periode').modal('hide');
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

    //Get Edit -------------------------------------------------------------
    $('.showdata').on('click','.btnedit',function(){
        var data1 = $(this).attr('data');
        //alert(data1);
        $.ajax({
            type : "GET",
            url  : "<?php echo base_url('PangkatAdmin/get_edit_periode')?>",
            dataType : "JSON",
            data : {data1:data1},
            success: function(data){
                $.each(data,function(){
                    $('#modal-periode-edit').modal('show');
                    $('[name=id_periode1]').val(data.id_periode);
                    $('[name=nama_periode1]').val(data.nama_periode);
                    $('[name=waktu_mulai1]').val(data.waktu_mulai);
                    $('[name=waktu_selesai1]').val(data.waktu_selesai);
                    $('[name=catatan_periode1]').val(data.catatan_periode);
                });
            }
        });
        return false;
    });

    $('#btn_edit').click(function(e){ 
      e.preventDefault();
        var data1 = $('[name=id_periode1]').val();
        var data2 = $('[name=nama_periode1]').val();
        var data3 = $('[name=waktu_mulai1]').val();
        var data4 = $('[name=waktu_selesai1]').val();
        var data5 = $('[name=catatan_periode1]').val();
        //alert(data4);
        $.ajax({
            type : "POST",
            url  : "<?= base_url('PangkatAdmin/edit_periode')?>",
            dataType : "JSON",
            data : {data1:data1,
                    data2:data2,
                    data3:data3,
                    data4:data4,
                    data5:data5},
           success: function(data){
            $('#modal-periode-edit').modal('hide');
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
                url  : "<?= base_url('PangkatAdmin/del_periode')?>",
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