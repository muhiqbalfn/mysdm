<?php $this->load->view('gelar/sub/head') ?>
<?php $this->load->view('gelar/sub/header') ?>


  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"><small><?= $this->session->userdata('parentsatker'); ?></small></h4>
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

          <?php foreach ($data as $in){ ?>
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
                        Ukuran maksimal file adalah <b>400 KB</b> dan bertipe <b>.PDF</b>
                      </p>
                    </div>

                    <!-- 
                      1 = Diajukan
                      2 = Revisi
                      3 = Salah
                      4 = Benar
                    -->

                    <?php  
                      $stt_ijazah         = $in->status_ijazah;
                      $stt_transkrip      = $in->status_transkrip;
                      $stt_sktubel        = $in->status_sktubel;
                      $stt_akred          = $in->status_akreditasiprodi;
                      $stt_skkp           = $in->status_skkp;
                      $stt_skcpns         = $in->status_skcpns;
                      $stt_skpns          = $in->status_skpns;
                      $stt_skp2thn        = $in->status_skp2thn;
                      $stt_skjf           = $in->status_skjf;
                      $stt_suratpengantar = $in->status_suratpengantar;
                      $stt_suket          = $in->status_suketizindikti;
                    ?>


                    <table class="table table-bordered table-striped table-hover" id="showdata">
                      <thead>
                        <tr align="center" style="background-color: #008B8B; color: white;">
                          <th style="vertical-align: middle;">NO.</th>
                          <th style="vertical-align: middle;">FILE</th>
                          <th style="vertical-align: middle;">STATUS</th>
                          <th style="vertical-align: middle;">CATATAN REVISI</th>
                          <th style="vertical-align: middle;">AKSI</th>
                        </tr>
                      </thead>
                      <tbody>

                        <!-- IJAZAH -->
                        <tr>
                          <td>1.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/gelar/'.$in->file_ijazah); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              IJAZAH
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_ijazah==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_ijazah==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_ijazah==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_ijazah==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_ijazah ?></td>
                          <td align="center">
                            <button class="btn btn-sm btn-info btn-form" kolom_file="file_ijazah" kolom_status="status_ijazah">
                              <i class="fas fa-upload"></i> Upload
                            </button>
                          </td>
                        </tr>

                        <!-- TRANSKRIP -->
                        <tr>
                          <td>2.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/gelar/'.$in->file_transkrip); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              TRANSKRIP
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_transkrip==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_transkrip==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_transkrip==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_transkrip==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_transkrip ?></td>
                          <td align="center">
                            <button class="btn btn-sm btn-info btn-form" kolom_file="file_transkrip" kolom_status="status_transkrip">
                              <i class="fas fa-upload"></i> Upload
                            </button>
                          </td>
                        </tr>

                        <!-- SKTUBEL -->
                        <tr>
                          <td>3.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/gelar/'.$in->file_sktubel); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SK TUGAS/IZIN BELAJAR
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_sktubel==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_sktubel==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_sktubel==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_sktubel==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_sktubel ?></td>
                          <td align="center">
                            <button class="btn btn-sm btn-info btn-form" kolom_file="file_sktubel" kolom_status="status_sktubel">
                              <i class="fas fa-upload"></i> Upload
                            </button>
                          </td>
                        </tr>

                        <!-- AKREDITASIPRODI -->
                        <tr>
                          <td>4.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/gelar/'.$in->file_akreditasiprodi); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SERTIF. AKREDITASI PRODI
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_akred==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_akred==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_akred==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_akred==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_akreditasiprodi ?></td>
                          <td align="center">
                            <button class="btn btn-sm btn-info btn-form" kolom_file="file_akreditasiprodi" kolom_status="status_akreditasiprodi">
                              <i class="fas fa-upload"></i> Upload
                            </button>
                          </td>
                        </tr>

                        <!-- SKKP -->
                        <tr>  
                          <td>5.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/gelar/'.$in->file_skkp); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SK KENAIKAN PANGKAT
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_skkp==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_skkp==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_skkp==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_skkp==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_skkp ?></td>
                          <td align="center">
                            <button class="btn btn-sm btn-info btn-form" kolom_file="file_skkp" kolom_status="status_skkp">
                              <i class="fas fa-upload"></i> Upload
                            </button>
                          </td>
                        </tr>

                        <!-- SKCPNS -->
                        <tr>
                          <td>6.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/gelar/'.$in->file_skcpns); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SK CPNS
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_skcpns==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_skcpns==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_skcpns==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_skcpns==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_skcpns ?></td>
                          <td align="center">
                            <button class="btn btn-sm btn-info btn-form" kolom_file="file_skcpns" kolom_status="status_skcpns">
                              <i class="fas fa-upload"></i> Upload
                            </button>
                          </td>
                        </tr>

                        <!-- SKPNS -->
                        <tr>
                          <td>7.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/gelar/'.$in->file_skpns); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SK PNS
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_skpns==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_skpns==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_skpns==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_skpns==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_skpns ?></td>
                          <td align="center">
                            <button class="btn btn-sm btn-info btn-form" kolom_file="file_skpns" kolom_status="status_skpns">
                              <i class="fas fa-upload"></i> Upload
                            </button>
                          </td>
                        </tr>

                        <!-- SKP2THN -->
                        <tr>
                          <td>8.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/gelar/'.$in->file_skp2thn); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SKP 2 TAHUN
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_skp2thn==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_skp2thn==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_skp2thn==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_skp2thn==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_skp2thn ?></td>
                          <td align="center">
                            <button class="btn btn-sm btn-info btn-form" kolom_file="file_skp2thn" kolom_status="status_skp2thn">
                              <i class="fas fa-upload"></i> Upload
                            </button>
                          </td>
                        </tr>

                        <!-- SKJF -->
                        <tr>
                          <td>9.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/gelar/'.$in->file_skjf); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SK JABATAN FUNGSIONAL
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_skjf==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_skjf==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_skjf==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_skjf==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_skjf ?></td>
                          <td align="center">
                            <button class="btn btn-sm btn-info btn-form" kolom_file="file_skjf" kolom_status="status_skjf">
                              <i class="fas fa-upload"></i> Upload
                            </button>
                          </td>
                        </tr>

                        <!-- SURATPENGANTAR -->
                        <tr>
                          <td>10.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/gelar/'.$in->file_suratpengantar); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SURAT PENGANTAR FAKULTAS
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_suratpengantar==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_suratpengantar==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_suratpengantar==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_suratpengantar==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_suratpengantar ?></td>
                          <td align="center">
                            <button class="btn btn-sm btn-info btn-form" kolom_file="file_suratpengantar" kolom_status="status_suratpengantar">
                              <i class="fas fa-upload"></i> Upload
                            </button>
                          </td>
                        </tr>

                        <!-- SUKET -->
                        <tr>
                          <td>11.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/gelar/'.$in->file_suketizindikti); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SURAT KETERANGAN IZIN DIKTI (JIKA ADA)
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_suket==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_suket==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_suket==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_suket==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_suketizindikti ?></td>
                          <td align="center">
                            <button class="btn btn-sm btn-info btn-form" kolom_file="file_suketizindikti" kolom_status="status_suketizindikti">
                              <i class="fas fa-upload"></i> Upload
                            </button>
                          </td>
                        </tr>

                      </tbody>
                    </table>

                    <a href="<?= base_url('Gelar') ?>" class="btn btn-outline-info"><span class="fas fa-angle-left"></span> KEMBALI</a>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?>


        </div>
      </div>
    </div>

  </div>



  <!-- Modal Upload Berkas -->
  <div class="modal fade" id="modal-upload">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Upload berkas</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form-upload">
          <input type="hidden" name="id_pg" value="<?= $in->id_pg ?>">
          <input type="hidden" name="kolom_file">
          <input type="hidden" name="kolom_status">
          <div class="modal-body">
           <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <p>Drag & drop dokumen disini&hellip;</p>
                      <p><input type="file" name="berkas" class="dropify" accept="application/pdf"></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary"><i class="fas fa-upload"></i> &nbsp; Upload</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->



<?php $this->load->view('gelar/sub/footer') ?>
<?php $this->load->view('gelar/sub/foot') ?>

<script type="text/javascript">
  $(document).ready(function(){

    //mengirim data ke form upload
    $('#showdata').on('click','.btn-form',function(){
        var kolom_file    = $(this).attr('kolom_file');
        var kolom_status  = $(this).attr('kolom_status');
        //alert(kolom);
        //alert(id_pg);
        $('#modal-upload').modal('show');
        $('[name=kolom_file]').val(kolom_file);
        $('[name=kolom_status]').val(kolom_status);
    });

    //upload dokumen
    $('#form-upload').submit(function(e){
        e.preventDefault(); 
             $.ajax({
                 url:'<?= base_url() ?>Gelar/revisi_berkas',
                 type:"post",
                 data:new FormData(this),
                 processData:false,
                 contentType:false,
                 cache:false,
                 async:false,
                 success: function(data){
                  $('#modal-upload').modal('hide');
                    swal({
                      type: 'success', 
                      title: 'Changed !',
                      text: 'Dokumen berhasil diupload.',
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
                      text: 'Dokumen gagal diupload.',
                      timer: 2000,
                      showConfirmButton: false
                  });
              }
             });
    });
  

  });
</script>

<script type="text/javascript">
  //dropify style
  $('.dropify').dropify({
      messages: {
          default: 'Dokumen',
          replace: 'Ganti',
          remove:  'Hapus',
          error:   'error',
      }
  });
</script>