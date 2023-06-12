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
          <h5>USULAN KENAIKAN PANGKAT</h5>
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
                              <img class="img-rounded" src="https://i-sdm.unesa.ac.id/assets/images/kepegawaian/pegawai/<?= $in->nip ?>.jpg" style="width: 100px">
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
                          <tr>
                            <td></td>
                            <th>Unit Kerja</th>
                            <td>: <?= $in->namaparentsatker; ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
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
                    

                    $ket_skkp         = $in->ket_skkp;
                    $ket_skp2thn      = $in->ket_skp2thn;
                    $ket_skp1thn      = $in->ket_skp1thn;
                    $ket_skcp         = $in->ket_skcp;
                    $ket_skpn         = $in->ket_skpn;
                    $ket_stlud        = $in->ket_stlud;
                    $ket_stlpi        = $in->ket_stlpi;
                    $ket_ijzakhir     = $in->ket_ijzakhir;
                    $ket_transkrip    = $in->ket_transkrip;
                    $ket_skiznbel     = $in->ket_skiznbel;
                    $ket_skgelar      = $in->ket_skgelar;
                    $ket_pmk          = $in->ket_pmk;
                    $ket_pak          = $in->ket_pak;
                    $ket_skjf         = $in->ket_skjf;
                    $ket_skjf1        = $in->ket_skjf1;
                  ?>

                <div class="col-md-12">
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


                      <!-- SKKP -->
                      <tr>
                        <td align="center">1.</td>
                        <td>
                          <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skkp); ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                            SK kenaikan Pangkat Terakhir
                          </a>
                        </td>
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_skkp==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_skkp==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_skkp==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_skkp==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skkp; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_skkp">
                            <input type="hidden" name="kolom_ket"    value="ket_skkp">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_skp2thn==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_skp2thn==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_skp2thn==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_skp2thn==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skp2thn; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_skp2thn">
                            <input type="hidden" name="kolom_ket"    value="ket_skp2thn">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_skp1thn==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_skp1thn==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_skp1thn==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_skp1thn==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skp1thn; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_skp1thn">
                            <input type="hidden" name="kolom_ket"    value="ket_skp1thn">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
                      </tr>




                      <!-- SKCPNS -->
                      <tr>
                        <td align="center">4.</td>
                        <td>
                          <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skcp); ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                            SK CPNS <br>
                          </a>
                        </td>
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_skcp==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_skcp==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_skcp==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_skcp==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skcp; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_skcp">
                            <input type="hidden" name="kolom_ket"    value="ket_skcp">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
                      </tr>




                      <!-- SKPNS -->
                      <tr>
                        <td align="center">5.</td>
                        <td>
                          <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skpn); ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                            SK PNS
                          </a>
                        </td>
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_skpn==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_skpn==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_skpn==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_skpn==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skpn; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_skpn">
                            <input type="hidden" name="kolom_ket"    value="ket_skpn">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
                      </tr>



                      <!-- STLUD -->
                      <tr>
                        <td align="center">6.</td>
                        <td>
                          <a href="<?= base_url('assets/dokumen/pangkat/'.$in->stlud); ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                            STLUD (Surat Tanda Lulus Ujian Dinas)
                          </a>
                        </td>
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_stlud==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_stlud==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_stlud==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_stlud==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_stlud; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_stlud">
                            <input type="hidden" name="kolom_ket"    value="ket_stlud">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
                      </tr>




                      <!-- STLPI -->
                      <tr>
                        <td align="center">7.</td>
                        <td>
                          <a href="<?= base_url('assets/dokumen/pangkat/'.$in->stlpi); ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                            STLPI (Surat Tanda Lulus Penyesuaian Ijazah)
                          </a>
                        </td>
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_stlpi==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_stlpi==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_stlpi==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_stlpi==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_stlpi; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_stlpi">
                            <input type="hidden" name="kolom_ket"    value="ket_stlpi">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_ijzakhir==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_ijzakhir==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_ijzakhir==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_ijzakhir==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_ijzakhir; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_ijzakhir">
                            <input type="hidden" name="kolom_ket"    value="ket_ijzakhir">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_transkrip==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_transkrip==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_transkrip==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_transkrip==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_transkrip; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_transkrip">
                            <input type="hidden" name="kolom_ket"    value="ket_transkrip">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
                      </tr>




                      <!-- SKIZNBEL -->
                      <tr>
                        <td align="center">10.</td>
                        <td>
                          <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skiznbel); ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                            SK TB/IB/Perpanjangan TB
                          </a>
                        </td>
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_skiznbel==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_skiznbel==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_skiznbel==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_skiznbel==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skiznbel; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_skiznbel">
                            <input type="hidden" name="kolom_ket"    value="ket_skiznbel">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_skgelar==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_skgelar==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_skgelar==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_skgelar==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skgelar; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_skgelar">
                            <input type="hidden" name="kolom_ket"    value="ket_skgelar">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
                      </tr>





                      <!-- PMK -->
                      <tr>
                        <td align="center">12.</td>
                        <td>
                          <a href="<?= base_url('assets/dokumen/pangkat/'.$in->pmk); ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                            SK PMK
                          </a>
                        </td>
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_pmk==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_pmk==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_pmk==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_pmk==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_pmk; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_pmk">
                            <input type="hidden" name="kolom_ket"    value="ket_pmk">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
                      </tr>




                      <!-- PAK -->
                      <tr>
                        <td align="center">13.</td>
                        <td>
                          <a href="<?= base_url('assets/dokumen/pangkat/'.$in->pak); ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                            SK PAK Terakhir/Terbaru
                          </a>
                        </td>
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_pak==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_pak==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_pak==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_pak==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_pak; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_pak">
                            <input type="hidden" name="kolom_ket"    value="ket_pak">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_skjf==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_skjf==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_skjf==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_skjf==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skjf; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_skjf">
                            <input type="hidden" name="kolom_ket"    value="ket_skjf">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
                      </tr>




                      <!-- SKJF1 -->
                      <tr>
                        <td align="center">15.</td>
                        <td>
                          <a href="<?= base_url('assets/dokumen/pangkat/'.$in->skjf1); ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                            SK Pengangkatan Pertama dlm Jabatan Fungsional
                          </a>
                        </td>
                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_skjf1==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_skjf1==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_skjf1==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_skjf1==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skjf1; ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_kp_tendik"  value="<?= $in->id_kp_tendik ?>">
                            <input type="hidden" name="kolom_stt"    value="stt_skjf1">
                            <input type="hidden" name="kolom_ket"    value="ket_skjf1">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
                      </tr>




                    </tbody>
                  </table>

                  <a href="<?= base_url('PangkatAdmin') ?>" class="btn btn-outline-info"><span class="fas fa-angle-left"></span> KEMBALI</a>

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

    //REVISI --------------------------------------------------------
    $('.form-revisi').submit(function(e){
      e.preventDefault();
        $.ajax({
             url:'<?= base_url() ?>PangkatAdmin/revisi_berkas_tendik',
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