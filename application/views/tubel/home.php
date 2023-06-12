<?php $this->load->view('tubel/sub/head') ?>
<?php $this->load->view('tubel/sub/header') ?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"><small></small></h4>
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
                <h3 class="card-title">
                  MONITORING PROGRESS TUGAS BELAJAR
                </h3>
                <div class="card-tools">
                  <a class="btn btn-outline-danger btn-sm" href="#"><i class="fas fa-map"></i> &nbsp;Panduan Penggunaan </a>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 

                <!-- LIST JENIS TUBEL ----------------------------------------------------- -->
                <div class="row">

                  <table id="example1" class="table table-bordered table-striped table-hover">
                    <thead>
                    <tr align="center">
                      <th style="vertical-align: middle;">NO.</th>
                      <th style="vertical-align: middle;">NIP/NAMA</th>
                      <th style="vertical-align: middle;">TUJUAN</th>
                      <th style="vertical-align: middle;">BIDANG ILMU</th>
                      <th style="vertical-align: middle;">PERIODE <br><code>[mulai.s.d.selesai]</code></th>
                      <th style="vertical-align: middle;">SUMBER BIAYA</th>
                      <th style="vertical-align: middle;">TGL KIRIM USULAN</th>
                      <th style="vertical-align: middle;">UNIT KERJA</th>
                      <th style="vertical-align: middle;">STATUS SK</th>
                      <th style="vertical-align: middle;">STATUS SK <br><code>[PERPANJANGAN]</code></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $no=0;
                    foreach ($data_tubel_dosen as $in){
                    $no++;
                    ?>
                    <tr>
                      <td align="center"><?= $no; ?></td>
                      <td><?= $in->nip ?> <br> <?= $in->nama ?></td>
                      <td><?= $in->tujuan ?></td>
                      <td><?= $in->bidang_ilmu ?></td>
                      <td><?= $in->mulai ?> <i>s.d.</i> <br> <?= $in->selesai ?></td>
                      <td><?= $in->sumber_biaya ?></td>
                      <td><?= $in->tgl_surat_usulan ?></td>
                      <td><?= $in->unit_kerja ?></td>
                      <td>
                        <button class="btn btn-block 
                        <?php 
                            if($in->status_sk=='Diusulkan'){echo'btn-info';}
                            else if($in->status_sk=='Ditolak'){echo'btn-danger';}
                            else if($in->status_sk=='SK Terbit'){echo'btn-success';}
                            else if($in->status_sk=='Belum'){echo'btn-default';}
                            else {echo'btn-warning';}
                        ?> 
                        btn-sm btn-flat" data-toggle="modal" data-target="#modal-track">
                        <b><?= $in->status_sk ?></b></button><?php if($in->status_sk=='SK Terbit'){echo "<i>Berlaku s.d. </i><br/>".$in->selesai." ";} ?>
                      </td>
                      <td>
                        <button class="btn btn-block 
                        <?php 
                            if($in->status_sk_perpanjangan=='Diusulkan'){echo'btn-info';}
                            else if($in->status_sk_perpanjangan=='Ditolak'){echo'btn-danger';}
                            else if($in->status_sk_perpanjangan=='SK Terbit'){echo'btn-success';}
                            else if($in->status_sk_perpanjangan=='Belum'){echo'btn-default';}
                            else {echo'btn-warning';}
                        ?> 
                        btn-sm btn-flat"><b><?= $in->status_sk_perpanjangan ?></b></button><?php if($in->status_sk_perpanjangan=='SK Terbit'){echo "<i>Berlaku s.d. </i><br/>".$in->akhir_sk_perpanjangan." ";} ?>
                      </td>
                      
                    </tr>
                    <?php } ?>
                    </tbody>
                  </table>


                </div>
                <!-- LIST JENIS TUBEL ----------------------------------------------------- -->

              </div>
            </div>
          </div>
          <!-- col-lg-12 -->


        </div>
      </div>
    </div>

  </div>



<?php $this->load->view('tubel/sub/footer') ?>
<?php $this->load->view('tubel/sub/foot') ?>