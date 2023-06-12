<?php  
$akses        = $this->session->userdata('akses');
?>


<?php $this->load->view('pangkat/sub/head') ?>
<?php $this->load->view('pangkat/sub/header') ?>


  
  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid" style="width: 80%">
        <div class="row">
          <div class="col-sm-6">
            <h5>USULAN KP : <b><?= $this->session->userdata('parentsatker'); ?></b></h5>
          </div>
        </div>
      </div>
    </div>

    <!-- 
      1 = Diajukan
      2 = Revisi
      3 = Ditolak
      4 = Selesai
    -->


    <?php foreach ($periode as $periode){ ?>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid" style="width: 80%">
        <div class="row">

          <div class="col-lg-12">
            <!-- tabel master -->
            <div class="card card-info card-outline">
              <div class="card-header">
                <h5 class="card-title">
                  <b><?= $periode->nama_periode ?></b><br><br>
                  Waktu Input Berkas : 
                  <b><i class="badge badge-info"><?= $periode->waktu_mulai ?></i></b>
                  s.d. 
                  <b><i class="badge badge-info"><?= $periode->waktu_selesai ?></i></b>
                </h5>
                <div class="card-tools">
                  <a class="btn btn-outline-danger btn-sm" href="<?= base_url('assets/dokumen/panduan/Buku-Panduan-PG.pdf') ?>" target="_blank"><i class="fas fa-map"></i> &nbsp;Panduan Penggunaan </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata"> 
                <div class="row">
                  <div class="col-md-12">

                    <!-- DOSEN -->
                    <table id="datatable1" class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr align="center" style="background-color: #008B8B; color: white;">
                          <th style="vertical-align: middle; width: 0px;">NO.</th>
                          <th style="vertical-align: middle; width: 0px;">FOTO</th>
                          <th style="vertical-align: middle;">PEGAWAI</th>
                          <th style="vertical-align: middle;">PANGKAT - JABATAN</th>
                          <th style="vertical-align: middle;">JENIS</th>
                          <th style="vertical-align: middle;">UNIT KERJA</th>
                          <!-- <th style="vertical-align: middle;">STATUS BERKAS</th> -->

                          <?php if($akses=='fakultas'){ ?>
                          <th style="vertical-align: middle;">AKSI</th>
                          <?php } ?>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=0;
                        foreach ($dosen as $dsn){
                        $no++;

                        $isdosen = $dsn->isdosen;
                        $status  = $dsn->status;
                        ?>
                        <tr>
                          <td align="center"><?= $no ?>.</td>
                          <td align="center">
                            <img class="img-rounded" src="https://i-sdm.unesa.ac.id/assets/images/kepegawaian/pegawai/<?= $dsn->nip ?>.jpg" style="width: 45px">
                          </td>
                          <td>
                            <?= $dsn->nip ?> <br><b><?= $dsn->namalengkap ?></b>
                          </td>
                          <td><?= $dsn->namajfungsional ?> <br> <?= $dsn->namapangkat ?> (<?= $dsn->pangkat ?>)</td>
                          <td align="center">
                            <?php 
                              if($isdosen==1){
                                echo '<span class="badge badge-primary">DOSEN</span>';
                              }else{
                                echo '<span class="badge badge-danger">TENDIK</span>';
                              }
                            ?>
                          </td>
                          <td><b><?= $dsn->namaparentsatker ?></b> <br> <?= $dsn->namasatker ?></td>

                          <?php if($akses=='fakultas'){ ?>
                          <td align="center">
                            <a href="<?= base_url('Pangkat/detail_berkas_dosen/'.$dsn->id_kp_dosen) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> &nbsp;Berkas</a>
                          </td>
                          <?php } ?>

                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>

                    <hr>
                  
                    <!-- TENDIK -->
                    <table id="datatable2" class="table table-bordered table-striped table-hover">
                      <thead>
                        <tr align="center" style="background-color: #008B8B; color: white;">
                          <th style="vertical-align: middle; width: 0px;">NO.</th>
                          <th style="vertical-align: middle; width: 0px;">FOTO</th>
                          <th style="vertical-align: middle;">PEGAWAI</th>
                          <th style="vertical-align: middle;">PANGKAT - JABATAN</th>
                          <th style="vertical-align: middle;">JENIS</th>
                          <th style="vertical-align: middle;">UNIT KERJA</th>
                          <!-- <th style="vertical-align: middle;">STATUS BERKAS</th> -->

                          <?php if($akses=='fakultas'){ ?>
                          <th style="vertical-align: middle;">AKSI</th>
                          <?php } ?>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=0;
                        foreach ($tendik as $tnd){
                        $no++;

                        $isdosen = $tnd->isdosen;
                        $status  = $tnd->status;
                        ?>
                        <tr>
                          <td align="center"><?= $no ?>.</td>
                          <td align="center">
                            <img class="img-rounded" src="https://i-sdm.unesa.ac.id/assets/images/kepegawaian/pegawai/<?= $tnd->nip ?>.jpg" style="width: 45px">
                          </td>
                          <td>
                            <?= $tnd->nip ?> <br><b><?= $tnd->namalengkap ?></b>
                          </td>
                          <td><?= $tnd->namajfungsional ?> <br> <?= $tnd->namapangkat ?> (<?= $tnd->pangkat ?>)</td>
                          <td align="center">
                            <?php 
                              if($isdosen==1){
                                echo '<span class="badge badge-primary">DOSEN</span>';
                              }else{
                                echo '<span class="badge badge-danger">TENDIK</span>';
                              }
                            ?>
                          </td>
                          <td><b><?= $tnd->namaparentsatker ?></b> <br> <?= $tnd->namasatker ?></td>

                          <?php if($akses=='fakultas'){ ?>
                          <td align="center">
                            <a href="<?= base_url('Pangkat/detail_berkas_tendik/'.$tnd->id_kp_tendik) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> &nbsp;Berkas</a>
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
    <?php } ?>


  </div>


<?php $this->load->view('pangkat/sub/footer') ?>
<?php $this->load->view('pangkat/sub/foot') ?>