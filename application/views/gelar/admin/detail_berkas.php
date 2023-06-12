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

                    $ket_ijazah         = $in->ket_ijazah;
                    $ket_transkrip      = $in->ket_transkrip;
                    $ket_sktubel        = $in->ket_sktubel;
                    $ket_akred          = $in->ket_akreditasiprodi;
                    $ket_skkp           = $in->ket_skkp;
                    $ket_skcpns         = $in->ket_skcpns;
                    $ket_skpns          = $in->ket_skpns;
                    $ket_skp2thn        = $in->ket_skp2thn;
                    $ket_skjf           = $in->ket_skjf;
                    $ket_suratpengantar = $in->ket_suratpengantar;
                    $ket_suket          = $in->ket_suketizindikti;
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

                      <!-- IJAZAH -->
                      <tr>
                        <td>1.</td>
                        <td>
                          <a href="<?= base_url('assets/dokumen/gelar/'.$in->file_ijazah); ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 25px;">&nbsp;
                            IJAZAH
                          </a>
                        </td>

                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_ijazah==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_ijazah==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_ijazah==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_ijazah==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_ijazah ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_pg"        value="<?= $in->id_pg ?>">
                            <input type="hidden" name="kolom_status" value="status_ijazah">
                            <input type="hidden" name="kolom_ket"    value="ket_ijazah">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_transkrip ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_pg"        value="<?= $in->id_pg ?>">
                            <input type="hidden" name="kolom_status" value="status_transkrip">
                            <input type="hidden" name="kolom_ket"    value="ket_transkrip">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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

                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_sktubel==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_sktubel==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_sktubel==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_sktubel==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_sktubel ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_pg"        value="<?= $in->id_pg ?>">
                            <input type="hidden" name="kolom_status" value="status_sktubel">
                            <input type="hidden" name="kolom_ket"    value="ket_sktubel">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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

                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_akred==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_akred==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_akred==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_akred==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_akred ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_pg"        value="<?= $in->id_pg ?>">
                            <input type="hidden" name="kolom_status" value="status_akreditasiprodi">
                            <input type="hidden" name="kolom_ket"    value="ket_akreditasiprodi">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skkp ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_pg"        value="<?= $in->id_pg ?>">
                            <input type="hidden" name="kolom_status" value="status_skkp">
                            <input type="hidden" name="kolom_ket"    value="ket_skkp">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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

                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_skcpns==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_skcpns==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_skcpns==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_skcpns==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skcpns ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_pg"        value="<?= $in->id_pg ?>">
                            <input type="hidden" name="kolom_status" value="status_skcpns">
                            <input type="hidden" name="kolom_ket"    value="ket_skcpns">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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

                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_skpns==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_skpns==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_skpns==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_skpns==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skpns ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_pg"        value="<?= $in->id_pg ?>">
                            <input type="hidden" name="kolom_status" value="status_skpns">
                            <input type="hidden" name="kolom_ket"    value="ket_skpns">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skp2thn ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_pg"        value="<?= $in->id_pg ?>">
                            <input type="hidden" name="kolom_status" value="status_skp2thn">
                            <input type="hidden" name="kolom_ket"    value="ket_skp2thn ">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_skjf ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_pg"        value="<?= $in->id_pg ?>">
                            <input type="hidden" name="kolom_status" value="status_skjf">
                            <input type="hidden" name="kolom_ket"    value="ket_skjf">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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

                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_suratpengantar==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_suratpengantar==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_suratpengantar==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_suratpengantar==4){echo'selected';} ?>>Benar</option>
                            </select>
                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_suratpengantar ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_pg"        value="<?= $in->id_pg ?>">
                            <input type="hidden" name="kolom_status" value="status_suratpengantar">
                            <input type="hidden" name="kolom_ket"    value="ket_suratpengantar">
                            <button class="btn btn-sm btn-info">Simpan</button>
                          </td>
                        </form>
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

                        <form class="form-revisi">
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
                          <td>
                            <select class="custom-select" name="status">
                              <option value="1" <?php if($stt_suket==1){echo'selected';} ?>>Diajukan</option>
                              <option value="2" <?php if($stt_suket==2){echo'selected';} ?>>Revisi</option>
                              <option value="3" <?php if($stt_suket==3){echo'selected';} ?>>Salah</option>
                              <option value="4" <?php if($stt_suket==4){echo'selected';} ?>>Benar</option>
                            </select>

                          </td>
                          <td>
                            <textarea class="form-control" name="ket" rows="2"><?= $ket_suket ?></textarea>
                          </td>
                          <td align="center">
                            <input type="hidden" name="id_pg"        value="<?= $in->id_pg ?>">
                            <input type="hidden" name="kolom_status" value="status_suketizindikti">
                            <input type="hidden" name="kolom_ket"    value="ket_suketizindikti">
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