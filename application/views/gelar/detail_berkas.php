<?php $this->load->view('gelar/sub/head') ?>
<?php $this->load->view('gelar/sub/header') ?>


  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
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
                      <p>Ukuran maksimal file adalah <b>400 KB</b>, SKP <b>700 KB</b>, dan bertipe <b>.PDF</b></p>
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


                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr align="center" style="background-color: #008B8B; color: white;">
                          <th style="vertical-align: middle;">NO.</th>
                          <th style="vertical-align: middle;">FILE</th>
                          <th style="vertical-align: middle;">STATUS</th>
                          <th style="vertical-align: middle;">CATATAN REVISI</th>
                          <th style="vertical-align: middle;">UPLOAD REVISI FILE</th>
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
                            <?php if($stt_ijazah==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="file_ijazah" required>
                              <input type="hidden" name="id_pg" value="<?= $in->id_pg ?>">
                              <input type="hidden" name="kolom_file"   value="file_ijazah">
                              <input type="hidden" name="kolom_status" value="status_ijazah">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("file_ijazah");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 400000){
                                      alert('Maksimal ukuran file Ijazah 400 KB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
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
                            <?php if($stt_transkrip==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="file_transkrip" required>
                              <input type="hidden" name="id_pg" value="<?= $in->id_pg ?>">
                              <input type="hidden" name="kolom_file"   value="file_transkrip">
                              <input type="hidden" name="kolom_status" value="status_transkrip">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file2 = document.getElementById("file_transkrip");
                                  file2.onchange = function(){ 
                                    if(this.files[0].size > 400000){
                                      alert('Maksimal ukuran file Transkrip 400 KB');this.value = '';}
                                    }
                            </script>
                            <?php } ?>
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
                            <?php if($stt_sktubel==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="file_sktubel" required>
                              <input type="hidden" name="id_pg" value="<?= $in->id_pg ?>">
                              <input type="hidden" name="kolom_file"   value="file_sktubel">
                              <input type="hidden" name="kolom_status" value="status_sktubel">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file3 = document.getElementById("file_sktubel");
                                  file3.onchange = function(){ 
                                    if(this.files[0].size > 400000){
                                      alert('Maksimal ukuran file SK Tubel 400 KB');this.value = '';}
                                    }
                            </script>
                            <?php } ?>
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
                            <?php if($stt_akred==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="file_akreditasiprodi" required>
                              <input type="hidden" name="id_pg" value="<?= $in->id_pg ?>">
                              <input type="hidden" name="kolom_file" value="file_akreditasiprodi">
                              <input type="hidden" name="kolom_status" value="status_akreditasiprodi">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file4 = document.getElementById("file_akreditasiprodi");
                                  file4.onchange = function(){ 
                                    if(this.files[0].size > 400000){
                                      alert('Maksimal ukuran file Akreditasi 400 KB');this.value = '';}
                                    }
                            </script>
                            <?php } ?>
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
                            <?php if($stt_skkp==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="file_skkp" required>
                              <input type="hidden" name="id_pg" value="<?= $in->id_pg ?>">
                              <input type="hidden" name="kolom_file" value="file_skkp">
                              <input type="hidden" name="kolom_status" value="status_skkp">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file5 = document.getElementById("file_skkp");
                                  file5.onchange = function(){ 
                                    if(this.files[0].size > 400000){
                                      alert('Maksimal ukuran file SK KP 400 KB');this.value = '';}
                                    }
                            </script>
                            <?php } ?>
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
                            <?php if($stt_skcpns==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="file_skcpns" required>
                              <input type="hidden" name="id_pg" value="<?= $in->id_pg ?>">
                              <input type="hidden" name="kolom_file" value="file_skcpns">
                              <input type="hidden" name="kolom_status" value="status_skcpns">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file6 = document.getElementById("file_skcpns");
                                  file6.onchange = function(){ 
                                    if(this.files[0].size > 400000){
                                      alert('Maksimal ukuran file SK CPNS 400 KB');this.value = '';}
                                    }
                            </script>
                            <?php } ?>
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
                            <?php if($stt_skpns==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="file_skpns" required>
                              <input type="hidden" name="id_pg" value="<?= $in->id_pg ?>">
                              <input type="hidden" name="kolom_file" value="file_skpns">
                              <input type="hidden" name="kolom_status" value="status_skpns">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file7 = document.getElementById("file_skpns");
                                  file7.onchange = function(){ 
                                    if(this.files[0].size > 400000){
                                      alert('Maksimal ukuran file SK PNS 400 KB');this.value = '';}
                                    }
                            </script>
                            <?php } ?>
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
                            <?php if($stt_skp2thn==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="file_skp2thn" required>
                              <input type="hidden" name="id_pg" value="<?= $in->id_pg ?>">
                              <input type="hidden" name="kolom_file" value="file_skp2thn">
                              <input type="hidden" name="kolom_status" value="status_skp2thn">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file8 = document.getElementById("file_skp2thn");
                                  file8.onchange = function(){ 
                                    if(this.files[0].size > 700000){
                                      alert('Maksimal ukuran file SKP 2 Tahun 700 KB');this.value = '';}
                                    }
                            </script>
                            <?php } ?>
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
                            <?php if($stt_skjf==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="file_skjf" required>
                              <input type="hidden" name="id_pg" value="<?= $in->id_pg ?>">
                              <input type="hidden" name="kolom_file" value="file_skp2thn">
                              <input type="hidden" name="kolom_status" value="status_skp2thn">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file9 = document.getElementById("file_skjf");
                                  file9.onchange = function(){ 
                                    if(this.files[0].size > 400000){
                                      alert('Maksimal ukuran file SK Jabatan Fungsional 400 KB');this.value = '';}
                                    }
                            </script>
                            <?php } ?>
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
                            <?php if($stt_suratpengantar==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="file_suratpengantar" required>
                              <input type="hidden" name="id_pg" value="<?= $in->id_pg ?>">
                              <input type="hidden" name="kolom_file" value="file_suratpengantar">
                              <input type="hidden" name="kolom_status" value="status_suratpengantar">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file10 = document.getElementById("file_suratpengantar");
                                  file10.onchange = function(){ 
                                    if(this.files[0].size > 400000){
                                      alert('Maksimal ukuran file Surat Pengantar 400 KB');this.value = '';}
                                    }
  
                            </script>
                            <?php } ?>
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
                            <?php if($stt_suket==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="file_suketizindikti" required>
                              <input type="hidden" name="id_pg" value="<?= $in->id_pg ?>">
                              <input type="hidden" name="kolom_file" value="file_suketizindikti">
                              <input type="hidden" name="kolom_status" value="status_suketizindikti">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file11 = document.getElementById("file_suketizindikti");
                                  file11.onchange = function(){ 
                                    if(this.files[0].size > 400000){
                                      alert('Maksimal ukuran file Surat Izin Dikti 400 KB');this.value = '';}
                                    }
                            </script>
                            <?php } ?>
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




<?php $this->load->view('gelar/sub/footer') ?>
<?php $this->load->view('gelar/sub/foot') ?>


<script type="text/javascript">

  $(document).ready(function(){

    //SIMPAN --------------------------------------------------------
    $('.form-revisi').submit(function(e){
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
              swal({
                type: 'success', 
                title: 'Saved !',
                text: 'Berhasil diusulkan.',
                timer: 2000,
                showConfirmButton: false
              });
              //triger
              setInterval('window.location.reload()', 1000);
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