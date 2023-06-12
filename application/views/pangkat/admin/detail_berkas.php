<?php 
$nip      = $this->session->userdata('nip'); 
$namapeg  = $this->session->userdata('namapeg');
$akses    = $this->session->userdata('akses');
?>


<?php $this->load->view('admin/sub/head') ?>
<?php $this->load->view('admin/sub/header') ?>
<?php $this->load->view('admin/sub/sidebar') ?>



<?php foreach ($data as $in){ ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5>USULAN PENCANTUMAN GELAR</h5>
        </div>
        <div class="col-sm-6">
          
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->



  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">

        <div class="col-lg-12">
          <!-- tabel master -->
          <div class="card card-info card-outline">
            <div class="card-header">
              <h5 class="card-title">
                BERKAS USULAN<br>
              </h5>
              <div class="card-tools">
                <?= $in->nip ?> - <?= $in->namalengkap ?>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body"> 
              <div class="row">


                <div class="col-md-12">

                  <div class="callout callout-success col-md-6">
                    <h5>Informasi!</h5>
                    <p>
                      Ukuran maksimal file adalah <b>2 MB</b> dan wajib bertipe <b>.PDF</b>
                    </p>
                  </div>

                  <!-- 
                    1 = Diajukan
                    2 = Revisi
                    3 = Salah
                    4 = Benar
                  -->

                  <?php  
                    $stt_kpe            = '$in->stt_kpe';
                    $stt_skkonvnip      = '$in->stt_skkonvnip';

                    $ket_kpe            = '$in->ket_kpe';
                    $ket_skkonvnip      = '$in->ket_skkonvnip';
                  ?>


                  <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr align="center" style="background-color: #008B8B; color: white;">
                        <th style="vertical-align: middle;">NO.</th>
                        <th style="vertical-align: middle;">FILE</th>
                        <th style="vertical-align: middle;">STATUS</th>
                        <th>STATUS</th>
                        <th style="vertical-align: middle;">CATATAN REVISI</th>
                        <th style="vertical-align: middle;">AKSI</th>
                      </tr>
                    </thead>
                    <tbody>

                      <!-- KPE -->
                      <tr>
                        <td>1.</td>
                        <td>
                          <a href="<?= base_url('assets/dokumen/pangkat/'); ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                            KPE
                          </a>
                        </td>

                        <form class="form-revisi">
                          <td align="center">
                            <span class="badge badge-pill badge-secondary">DIAJUKAN</span>
                            <?php 
                              /*if($stt_ijazah==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_ijazah==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_ijazah==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_ijazah==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }*/
                            ?>
                          </td>
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php //if($stt_ijazah==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php //if($stt_ijazah==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php //if($stt_ijazah==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php //if($stt_ijazah==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_pg"        value="">
                            <input type="hidden" name="kolom_status" value="status_ijazah">
                            <input type="hidden" name="kolom_ket"    value="ket_ijazah">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
                      </tr>



                    </tbody>
                  </table>

                  <a href="<?= base_url('GelarAdmin') ?>" class="btn btn-outline-info"><span class="fas fa-angle-left"></span> KEMBALI</a>

                </div>
              </div>
            </div>
          </div>
        </div>
        


      </div>
    </div>
  </div>

</div>
<?php } ?>




<?php $this->load->view('admin/sub/footer') ?>
<?php $this->load->view('admin/sub/foot') ?>

<script type="text/javascript">
  
  $(document).ready(function(){

    //SIMPAN --------------------------------------------------------
    $('.form-revisi').submit(function(e){
      e.preventDefault();
        $.ajax({
             url:'<?= base_url() ?>GelarAdmin/revisi_berkas',
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


  });

</script>