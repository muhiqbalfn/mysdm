<?php  
$akses        = $this->session->userdata('akses');
?>


<?php $this->load->view('gelar/sub/head') ?>
<?php $this->load->view('gelar/sub/header') ?>


  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>USULAN PENCANTUMAN GELAR : <?= $this->session->userdata('parentsatker'); ?></h5>
          </div>
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-12">
            <!-- tabel master -->
            <div class="card card-info card-outline">
              <div class="card-header">
                <h5 class="card-title">
                  DAFTAR PEGAWAI DIUSULKAN
                </h5>
                <div class="card-tools">
                  <a class="btn btn-outline-danger btn-sm" href="<?= base_url('assets/dokumen/panduan/Buku-Panduan-PG.pdf') ?>" target="_blank"><i class="fas fa-map"></i> &nbsp;Panduan Penggunaan </a>
                  <?php if($akses=='fakultas'){ ?>-
                  <a class="btn btn-info btn-sm" href="<?= base_url('Gelar/tambah_usulan') ?>"><i class="fas fa-plus"></i> &nbsp;Tambah Usulan </a>
                  <?php } ?>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata"> 
                <div class="row">


                  <div class="col-md-12">
                    <table id="datatable" class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr align="center">
                          <th style="vertical-align: middle; width: 0px;">NO.</th>
                          <th style="vertical-align: middle; width: 0px;">FOTO</th>
                          <th style="vertical-align: middle;">PEGAWAI</th>
                          <th style="vertical-align: middle;">PANGKAT - JABATAN</th>
                          <th style="vertical-align: middle;">GELAR USUL</th>
                          <th style="vertical-align: middle;">JENIS</th>
                          <th style="vertical-align: middle;">UNIT KERJA</th>
                          <th style="vertical-align: middle;">STATUS BERKAS</th>

                          <?php if($akses=='fakultas'){ ?>
                          <th style="vertical-align: middle;">AKSI</th>
                          <?php } ?>
                          
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
                          <td align="center">
                            <img class="img-rounded" src="https://i-sdm.unesa.ac.id/assets/images/kepegawaian/pegawai/<?= $in->nip ?>.jpg" style="width: 45px">
                          </td>
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

                          <?php if($akses=='fakultas'){ ?>
                          <td align="center">
                            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52" aria-expanded="false">
                              <i class="fas fa-bars"></i>
                            </button>
                            <div class="dropdown-menu" style="width: 5px;">
                              <a href="<?= base_url('Gelar/detail_berkas/'.$in->id_pg) ?>" class="dropdown-item" style="color:#1E90FF">
                                <i class="fas fa-eye"></i> Berkas
                              </a>
                              <?php if($status_pg==1){ ?>
                              <a href="javascript:;" class="dropdown-item btndel" style="color:red" data="<?= $in->id_pg ?>">
                                <i class="fas fa-trash"></i> Hapus
                              </a>
                              <?php } ?>
                            </div>
                          </td>
                          <?php } ?>

                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>


                </div>
              </div>
            </div>
          </div>
          <!-- col-lg-12 -->



        </div>
      </div>
    </div>

  </div>


<?php $this->load->view('gelar/sub/footer') ?>
<?php $this->load->view('gelar/sub/foot') ?>

<script type="text/javascript">
  $(document).ready(function(){

    //Delete ----------------------------------------------------------------
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
                url  : "<?= base_url('Gelar/del_usulan')?>",
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