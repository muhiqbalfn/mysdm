<?php 
$nip      = $this->session->userdata('nip'); 
$namapeg  = $this->session->userdata('namapeg');
$akses    = $this->session->userdata('akses');
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
          <h5>USULAN PENCANTUMAN GELAR</h5>
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
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">
                DAFTAR PEGAWAI DIUSULKAN
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body showdata">

              <div class="row">

                  <div class="col-md-12">
                    <table id="example1" class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr align="center">
                          <th style="vertical-align: middle; width: 0px;">NO.</th>
                          <th style="vertical-align: middle;">PEGAWAI</th>
                          <th style="vertical-align: middle;">PANGKAT - JABATAN</th>
                          <th style="vertical-align: middle;">GELAR USUL</th>
                          <th style="vertical-align: middle;">JENIS</th>
                          <th style="vertical-align: middle;">UNIT KERJA</th>
                          <th style="vertical-align: middle;">STATUS BERKAS</th>
                          <th style="vertical-align: middle;">AKSI</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=0;
                        foreach ($data as $in){
                        $no++;

                        $isdosen = $in->isdosen;
                        $status_pg = $in->status_pg;
                        ?>
                        <tr>
                          <td align="center"><?= $no ?>.</td>
                          <td>
                            <?= $in->nip ?> <br><b><?= $in->namalengkap ?></b>
                          </td>
                          <td><?= $in->namapangkat ?>/ <?= $in->pangkat ?> <br> <?= $in->namajfungsional ?></td>
                          <td align="center"><?= $in->jenjang ?></td>
                          <td align="center">
                            <?php 
                              if($isdosen==1){
                                echo '<span class="badge badge-primary">DOSEN</span>';
                              }else{
                                echo '<span class="badge badge-danger">TENDIK</span>';
                              }
                            ?>
                          </td>
                          <td><b><?= $in->namaparentsatker ?></b> <br> <?= $in->namasatker ?></td>
                          <td align="center">

                            <!-- 
                              1 = Diajukan
                              2 = Revisi
                              3 = Ditolak
                              4 = Selesai
                            -->
                            <?php 
                              if($status_pg==1){
                                echo '<span class="badge badge-secondary">DIAJUKAN</span>';
                              }else if($status_pg==2){
                                echo '<span class="badge badge-warning">REVISI</span>';
                              }else if($status_pg==3){
                                echo '<span class="badge badge-danger">DITOLAK</span>';
                              }else if($status_pg==4){
                                echo '<span class="badge badge-success">SELESAI</span>';
                              }
                            ?>
                          </td>
                          <td align="center">
                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52" aria-expanded="false">
                              <i class="fas fa-bars"></i>
                            </button>
                            <div class="dropdown-menu" style="width: 5px;">
                              <a href="<?= base_url('GelarAdmin/detail_berkas/'.$in->id_pg) ?>" class="dropdown-item" style="color:#1E90FF">
                                <i class="fas fa-eye"></i> Berkas
                              </a>
                              <a href="javascript:;" class="dropdown-item btnstatus" id_pg="<?= $in->id_pg ?>" style="color:#1E90FF"><i class="fas fa-toggle-on"></i> Status</a>
                              <?php if($akses=='super'){ ?>
                              <a href="javascript:;" class="dropdown-item btndel" style="color:red" data="<?= $in->id_pg ?>">
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
        </div>
      
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->


</div>
<!-- /.content-wrapper -->


<!-- Modal Upload Berkas -->
<div class="modal fade" id="modal-upload">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Status</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-status">
        <input type="hidden" name="id_berkas_kp">
        <input type="hidden" name="kolom">
        <div class="modal-body">
         <div class="card card-default">
            <!-- /.card-header -->
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="hidden" name="id_pg">
                    <select class="custom-select" name="status_pg">
                      <option value="1">Diajukan</option>
                      <option value="2">Revisi</option>
                      <option value="3">Ditolak</option>
                      <option value="4">Selesai</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button class="btn btn-danger" data-dismiss="modal">Close</button>
          <button class="btn btn-outline-primary"><i class="fas fa-save"></i> &nbsp; Simpan</button>
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


    //mengirim data ke form status
    $('.showdata').on('click','.btnstatus',function(){
        var id_pg = $(this).attr('id_pg');
        
        $('#modal-upload').modal('show');
        $('[name=id_pg]').val(id_pg);
    });

    //UBAH STATUS PG ---------------------------------------------
    $('#form-status').submit(function(e){
      e.preventDefault();
        $.ajax({
             url:'<?= base_url() ?>GelarAdmin/status_pg',
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
             success: function(data){
              swal({
                type: 'success', 
                title: 'Saved !',
                text: 'Berhasil diusulkan.',
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
                text: 'Dokumen gagal diusulkan.',
                timer: 2000,
                showConfirmButton: false
            });
          }
        });
    });




    //Delete --------------------------------------------------
    $('.showdata').on('click','.btndel',function(){
        var data1 = $(this).attr('data');
        swal({
            title: "Anda yakin ?",
            text: "Data usulan akan dihapus dari database.",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Ya, hapus !",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                type : "POST",
                url  : "<?= base_url('GelarAdmin/del_usulan')?>",
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
                    setInterval('window.location.reload()', 1000);
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


  });
</script>