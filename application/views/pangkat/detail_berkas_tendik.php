<?php $this->load->view('pangkat/sub/head') ?>
<?php $this->load->view('pangkat/sub/header') ?>


  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>USULAN KP : <b><?= $this->session->userdata('parentsatker'); ?></b></h5>
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

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
                <div class="row">


                  <div class="col-md-12" align="center">
                    <div class="col-md-10">
                      <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                          <table class="table">
                            <tr>
                              <td rowspan="5">
                                <img class="img-rounded" src="https://i-sdm.unesa.ac.id/assets/images/kepegawaian/pegawai/<?= $in->nip ?>.jpg" style="width: 80px">
                              </td>
                            </tr>
                            <tr>
                              <td></td>
                              <th>NIP/Nama</th>
                              <td>: <?= $in->nip; ?> / <?= $in->namalengkap; ?></td>
                            </tr>
                            <tr>
                              <td></td>
                              <th>Jabatan Fungsional</th>
                              <td>: <?= $in->namajfungsional; ?></td>
                            </tr>
                            <tr>
                              <td></td>
                              <th>Pangkat</th>
                              <td>: <?= $in->namapangkat; ?> (<?= $in->pangkat; ?>)</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="callout callout-danger col-md-10" align="left">
                      <p><i class="fas fa-bullhorn"></i> <b>Informasi</b> : Ukuran maksimal file adalah <b>2 MB</b>, dan wajib berformat <b>.PDF</b></p>
                    </div>
                  </div>

                    <!-- 
                      1 = Diajukan
                      2 = Revisi
                      3 = Salah
                      4 = Benar
                    -->

                    <?php  
                    $stt_skkp         = $in->stt_skkp;
                    $stt_skp2thn      = $in->stt_skp2thn;
                    $stt_skp1thn      = $in->stt_skp1thn;
                    $stt_skcp         = $in->stt_skcp;
                    $stt_skpn         = $in->stt_skpn;
                    $stt_stlud        = $in->stt_stlud;
                    $stt_stlpi        = $in->stt_stlpi;
                    $stt_ijzakhir     = $in->stt_ijzakhir;
                    $stt_transkrip    = $in->stt_transkrip;
                    $stt_skiznbel     = $in->stt_skiznbel;
                    $stt_skgelar      = $in->stt_skgelar;
                    $stt_pmk          = $in->stt_pmk;
                    $stt_pak          = $in->stt_pak;
                    $stt_skjf         = $in->stt_skjf;
                    $stt_skjf1        = $in->stt_skjf1;
                    ?>

                  <div class="col-md-12">
                    <table class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr align="center" style="background-color: #008B8B; color: white;">
                          <th style="vertical-align: middle;">NO.</th>
                          <th style="vertical-align: middle;">FILE</th>
                          <th style="vertical-align: middle;">STATUS</th>
                          <th style="vertical-align: middle;">CATATAN</th>
                          <th style="vertical-align: middle;">UPLOAD FILE</th>
                        </tr>
                      </thead>
                      <tbody>



                        <!-- SKKP -->
                        <tr>
                          <td align="center">1.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skkp); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SK Kenaikan Pangkat Terakhir
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
                              <input type="file" name="berkas" accept="application/pdf" id="skkp" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="skkp">
                              <input type="hidden" name="kolom_status" value="stt_skkp">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("skkp");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file SKKP 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>



                        <!-- SKP2THN -->
                        <tr>
                          <td align="center">2.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skp2thn); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SKP2THN (SKP 2021 Smt 1 dan 2)
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
                              <input type="file" name="berkas" accept="application/pdf" id="skp2thn" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="skp2thn">
                              <input type="hidden" name="kolom_status" value="stt_skp2thn">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file2 = document.getElementById("skp2thn");
                                  file2.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file SKP2THN 2 MB');this.value = '';}
                                    }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>




                        <!-- SKP1THN -->
                        <tr>
                          <td align="center">3.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skp1thn); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SKP1THN (SKP 2022)
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_skp1thn==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_skp1thn==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_skp1thn==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_skp1thn==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_skp1thn ?></td>
                          <td align="center">
                            <?php if($stt_skp1thn==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="skp1thn" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="skp1thn">
                              <input type="hidden" name="kolom_status" value="stt_skp1thn">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("skp1thn");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file SKP1THN 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>



                        <!-- SKCP -->
                        <tr>
                          <td align="center">4.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skcp); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SK CPNS
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_skcp==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_skcp==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_skcp==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_skcp==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_skcp ?></td>
                          <td align="center">
                            <?php if($stt_skcp==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="skcp" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="skcp">
                              <input type="hidden" name="kolom_status" value="stt_skcp">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("skcp");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file SK CPNS 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>



                        <!-- SKPN -->
                        <tr>
                          <td align="center">5.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skpn); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SK PNS
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_skpn==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_skpn==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_skpn==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_skpn==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_skpn ?></td>
                          <td align="center">
                            <?php if($stt_skpn==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="skpn" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="skpn">
                              <input type="hidden" name="kolom_status" value="stt_skpn">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("skpn");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file SK PNS 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>




                        <!-- STLUD -->
                        <tr>
                          <td align="center">6.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->stlud); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              Surat Tanda Lulus Ujian Dinas
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_stlud==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_stlud==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_stlud==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_stlud==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_stlud ?></td>
                          <td align="center">
                            <?php if($stt_stlud==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="stlud" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="stlud">
                              <input type="hidden" name="kolom_status" value="stt_stlud">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("stlud");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file STLUD 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>



                        <!-- STLPI -->
                        <tr>
                          <td align="center">7.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->stlpi); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              Surat Tanda Lulus Penyesuaian Ijazah
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_stlpi==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_stlpi==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_stlpi==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_stlpi==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_stlpi ?></td>
                          <td align="center">
                            <?php if($stt_stlpi==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="stlpi" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="stlpi">
                              <input type="hidden" name="kolom_status" value="stt_stlpi">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("stlpi");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file STLPI 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>




                        <!-- IJZAKHIR -->
                        <tr>
                          <td align="center">8.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->ijzakhir); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              Ijazah Terakhir
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_ijzakhir==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_ijzakhir==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_ijzakhir==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_ijzakhir==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_ijzakhir ?></td>
                          <td align="center">
                            <?php if($stt_ijzakhir==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="ijzakhir" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="ijzakhir">
                              <input type="hidden" name="kolom_status" value="stt_ijzakhir">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("ijzakhir");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file Ijazah 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>



                        <!-- TRANSKRIP -->
                        <tr>
                          <td align="center">9.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->transkrip); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              Transkrip Nilai
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
                              <input type="file" name="berkas" accept="application/pdf" id="transkrip" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="transkrip">
                              <input type="hidden" name="kolom_status" value="stt_transkrip">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("transkrip");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file Transkrip 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>



                        <!-- SKIZNBEL -->
                        <tr>
                          <td align="center">10.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skiznbel); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SK Tubel/Ibel
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_skiznbel==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_skiznbel==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_skiznbel==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_skiznbel==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_skiznbel ?></td>
                          <td align="center">
                            <?php if($stt_skiznbel==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="skiznbel" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="skiznbel">
                              <input type="hidden" name="kolom_status" value="stt_skiznbel">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("skiznbel");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file SK Tubel/Ibel 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>





                        <!-- SKGELAR -->
                        <tr>
                          <td align="center">11.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skgelar); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SK Pencantuman Gelar
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_skgelar==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_skgelar==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_skgelar==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_skgelar==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_skgelar ?></td>
                          <td align="center">
                            <?php if($stt_skgelar==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="skgelar" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="skgelar">
                              <input type="hidden" name="kolom_status" value="stt_skgelar">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("skgelar");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file SK Pencantuman Gelar 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>




                        <!-- PMK -->
                        <tr>
                          <td align="center">12.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->pmk); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SK Peninjauan Masa Kerja
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_pmk==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_pmk==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_pmk==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_pmk==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_pmk ?></td>
                          <td align="center">
                            <?php if($stt_pmk==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="pmk" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="pmk">
                              <input type="hidden" name="kolom_status" value="stt_pmk">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("pmk");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file SK Peninjauan Masa Kerja 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>




                        <!-- PAK -->
                        <tr>
                          <td align="center">13.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->pak); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              PAK Terakhir
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_pak==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_pak==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_pak==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_pak==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_pak ?></td>
                          <td align="center">
                            <?php if($stt_pak==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="pak" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="pak">
                              <input type="hidden" name="kolom_status" value="stt_pak">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("pak");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file PAK 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>




                        <!-- SKJF -->
                        <tr>
                          <td align="center">14.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skjf); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SK Jabatan Fungsional Terakhir
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
                              <input type="file" name="berkas" accept="application/pdf" id="skjf" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="skjf">
                              <input type="hidden" name="kolom_status" value="stt_skjf">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("skjf");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file SK Jabfung Terakhir 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>



                        <!-- SKJF1 -->
                        <tr>
                          <td align="center">15.</td>
                          <td>
                            <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skjf1); ?>" target="_blank">
                              <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                              SK Pengangkatan Pertama Jabatan Fungsional
                            </a>
                          </td>
                          <td align="center">
                            <?php 
                              if($stt_skjf1==1){
                                echo '<span class="badge badge-pill badge-secondary">DIAJUKAN</span>';
                              }else if($stt_skjf1==2){
                                echo '<span class="badge badge-pill badge-warning">REVISI</span>';
                              }else if($stt_skjf1==3){
                                echo '<span class="badge badge-pill badge-danger">SALAH</span>';
                              }else if($stt_skjf1==4){
                                echo '<span class="badge badge-pill badge-success">BENAR</span>';
                              }
                            ?>
                          </td>
                          <td><?= $in->ket_skjf1 ?></td>
                          <td align="center">
                            <?php if($stt_skjf1==4){echo'-';}else{ ?>
                            <form class="form-revisi">
                              <input type="file" name="berkas" accept="application/pdf" id="skjf1" required>
                              <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                              <input type="hidden" name="kolom_file"   value="skjf1">
                              <input type="hidden" name="kolom_status" value="stt_skjf1">
                              <button class="btn btn-sm btn-info">Simpan</button>
                            </form>
                            <script type="text/javascript">
                              var file1 = document.getElementById("skjf1");
                                  file1.onchange = function(){ 
                                    if(this.files[0].size > 2000000){
                                      alert('Maksimal ukuran file SK Pengangkatan Pertama Jabfung 2 MB');this.value = '';}
                                  }
                            </script>
                            <?php } ?>
                          </td>
                        </tr>




                      </tbody>
                    </table>

                    <a href="<?= base_url('Pangkat') ?>" class="btn btn-outline-info"><span class="fas fa-angle-left"></span> KEMBALI</a>

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




<?php $this->load->view('pangkat/sub/footer') ?>
<?php $this->load->view('pangkat/sub/foot') ?>


<script type="text/javascript">

  $(document).ready(function(){

    //SIMPAN --------------------------------------------------------
    $('.form-revisi').submit(function(e){
      e.preventDefault();
        $.ajax({
             url:'<?= base_url() ?>Pangkat/revisi_berkas_tendik',
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