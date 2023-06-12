<?php $this->load->view('cuti/sub/head') ?>
<?php $this->load->view('cuti/sub/header') ?>


  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0">List Usulan Cuti &raquo; <b><?= $this->session->userdata('parentsatker'); ?></b></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Cuti') ?>">Home</a></li>
              <li class="breadcrumb-item">Usulan Cuti</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12">
            <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>&nbsp;&nbsp;
                  Usulan Cuti
                </h3>
              </div>
                
              <!-- /.card-header -->
              <div class="card-body showdata">
                <table id="example1" class="table table-bordered table-striped table-hover">

                  <thead>
                    <tr align="center">
                      <th style="vertical-align: middle;">NO.</th>
                      <th style="vertical-align: middle;">JENIS CUTI</th>
                      <th style="vertical-align: middle;">PENGUSUL</th>
                      <th style="vertical-align: middle;">UNIT KERJA</th>
                      <th style="vertical-align: middle;">PERIODE USULAN</th>
                      <th style="vertical-align: middle;" colspan="2">BERKAS USULAN</th>
                      <th style="vertical-align: middle;">SURAT IZIN <br><code>[TEMBUSAN]</code></th>
                      <th style="vertical-align: middle;">STATUS</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $no=0;
                    foreach ($getusulan as $in){
                    $no++;
                    ?>
                    <tr>
                      <td align="center"><?= $no; ?></td> 


                      <td align="center">
                        <?php  
                          if($in->kodejeniscuti=='cutitahun'){
                            echo '<span class="badge badge-pill badge-info">'.$in->namajeniscuti.'</span>';
                          }else if($in->kodejeniscuti=='cutisakit'){
                            echo '<span class="badge badge-pill badge-danger">'.$in->namajeniscuti.'</span>';
                          }else if($in->kodejeniscuti=='cutilahir'){
                            echo '<span class="badge badge-pill badge-success">'.$in->namajeniscuti.'</span>';
                          }else if($in->kodejeniscuti=='cutipenting'){
                            echo '<span class="badge badge-pill badge-warning">'.$in->namajeniscuti.'</span>';
                          }else if($in->kodejeniscuti=='cutibesar'){
                            echo '<span class="badge badge-pill badge-primary">'.$in->namajeniscuti.'</span>';
                          }else{
                            echo 'Cuti ?';
                          }
                          
                          #jika cutilahir
                          if($in->kodejeniscuti=='cutilahir'){
                            echo '<br><i class="badge">Anak ke- '.$in->anak_ke.'</i>';
                          }
                          #jika cutipenting
                          if($in->kodejeniscuti=='cutipenting'){
                            echo '<br><i class="badge">'.$in->nama_cutipenting.'</i>';
                          }
                        ?>
                      </td>

                      <td>
                        <?= $in->nip; ?> <br> <?= $in->namalengkap; ?>
                      </td>

                      <td align="center"><?= $in->namaparentsatker; ?></td>

                      <td align="center">
                        <?= $in->tgl_mulai; ?> <code>s.d.</code> <?= $in->tgl_selesai; ?><br>
                        <?php  
                        //menghitung durasi hari
                        date_default_timezone_set("Asia/Jakarta");

                        $tgl_mulai = $in->tgl_mulai;
                        $tgl_akhir = $in->tgl_selesai;
                        
                        if($in->kodejeniscuti=='cutitahun'){
                          $totalcuti = 1;
                        }else{
                          $totalcuti = 1;
                        }

                        $period = new DatePeriod(
                          new DateTime(date('Y-m-d', strtotime("+1 day", strtotime($tgl_mulai)))),
                          new DateInterval('P1D'),
                          new DateTime(date('Y-m-d', strtotime("+1 day", strtotime($tgl_akhir))))
                        );

                        foreach ($period as $period) {
                          $date  = $period->format('Ymd');

                          #jika cutitahun----------------------------------
                          if($in->kodejeniscuti=='cutitahun'){

                            #skip jika sabtu/minggu
                            if(date("D", strtotime($date)) === "Sat"){
                              #jika hari sabtu
                            }else if(date("D", strtotime($date)) === "Sun"){
                              #jika hari minggu
                            }else{
                              $totalcuti++;
                            }
                          #------------------------------------------------

                          #jika bukan cutitahun----------------------------
                          }else{
                            $totalcuti++;
                          }
                          #------------------------------------------------

                        }
                        echo "(".$totalcuti." hari)";
                        ?>
                      </td>

                      <td align="center">
                        <a href="<?= base_url('assets/berkascuti/'.$in->file_usulancuti); ?>" target="_blank">
                          <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 35px;">
                        </a>
                        <br>
                        <i class="badge">Form cuti</i>
                      </td>

                      <td align="center">  
                        <?php if($in->file_suratdokter){ ?>
                          <a href="<?= base_url('assets/berkascuti/'.$in->file_suratdokter); ?>" target="_blank">
                          <img src="<?= base_url('assets/img/icon/pdf-biru.png') ?>" style="width: 35px;">
                        </a>
                        <br>
                        <i class="badge">Surat keterangan</i>
                        <?php }else{echo '<code>-</code>';} ?>

                      </td>

                      <td align="center">
                        <?php if($in->file_izincuti){ ?>
                          <a href="<?= base_url('assets/berkascuti/suratizin/'.$in->file_izincuti); ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 35px;">
                          </a>
                          <br>
                          <i><?= $in->tgl_suratizin ?></i>
                        <?php
                        }else{
                          echo '<i>Belum</i>';
                        }
                        ?>
                      </td>

                      <td align="center">
                        <?php  
                        if($in->statususulancuti==1){
                          echo '
                            <span class="badge badge-warning">Diusulkan</span>
                            ';
                        }else if($in->statususulancuti==2){
                          echo '<span class="badge badge-primary">Disetujui</span>';
                        }else if($in->statususulancuti==3){
                          echo '<span class="badge badge-success">Selesai</span>';
                        }else{
                          echo '<span class="badge badge-danger">Hubungi programmer</span>';
                        }
                        ?>
                      </td>

                    </tr>
                    <?php } ?>
                  </tbody>
                </table>

              </div>
            </div>

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  
<?php $this->load->view('cuti/sub/footer') ?>
<?php $this->load->view('cuti/sub/foot') ?>

<script type="text/javascript">
  $(document).ready(function(){

  
  });
</script>