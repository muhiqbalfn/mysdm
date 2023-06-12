<?php $this->load->view('admin/sub/head') ?>
<?php $this->load->view('admin/sub/header') ?>
<?php $this->load->view('admin/sub/sidebar') ?>


  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Usulan Cuti</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('HK') ?>">Home</a></li>
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
                      <th style="vertical-align: middle;" rowspan="2">NO.</th>
                      <th style="vertical-align: middle;" rowspan="2">NIP - NAMA</th>
                      <th style="vertical-align: middle;" rowspan="2">AD/ED</th>
                      <th style="vertical-align: middle;" rowspan="2">JENIS CUTI</th>
                      <th style="vertical-align: middle;" colspan="2">SURAT KEPUTUSAN</th>
                      <th style="vertical-align: middle;" colspan="2">DURASI CUTI</th>
                      <th style="vertical-align: middle;" rowspan="2">HARI KERJA</th>
                      <th style="vertical-align: middle;" rowspan="2">UNIT KERJA</th>
                      <th style="vertical-align: middle;" rowspan="2">KETERANGAN</th>
                    </tr>
                    <tr align="center">
                      <th>NOMOR</th>
                      <th>TANGGAL</th>
                      <th>MULAI</th>
                      <th>AKHIR</th>
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
                      <td><?= $in->nip; ?> <br> <?= $in->namalengkap; ?></td>
                      <td align="center">
                        <?php 
                          if($in->isdosen=='1'){
                            echo 'ED';
                          }else if($in->isdosen=='0'){
                            echo 'AD';
                          }
                        ?>
                      </td>

                      <td>
                        <?= $in->namajeniscuti; ?> <br>
                        <?php  
                          if($in->kodejeniscuti=='cutilahir'){
                            echo 'Anak ke-'.$in->anak_ke;
                          }
                        ?> 
                      </td>

                      <td><?= $in->no_suratizin; ?></td>
                      <td><?= $in->tgl_suratizin; ?></td>
                      <td><?= $in->tgl_mulai; ?></td>
                      <td><?= $in->tgl_selesai; ?></td>
                      <td align="center">
                        
                        <?php  
                        //menghitung durasi hari
                        date_default_timezone_set("Asia/Jakarta");

                        $tgl_mulai = $in->tgl_mulai;
                        $tgl_akhir = $in->tgl_selesai;
                        $totalcuti = 1;

                        $period = new DatePeriod(
                          new DateTime(date('Y-m-d', strtotime("+1 day", strtotime($tgl_mulai)))),
                          new DateInterval('P1D'),
                          new DateTime(date('Y-m-d', strtotime("+1 day", strtotime($tgl_akhir))))
                        );

                        foreach ($period as $period) {
                          $date  = $period->format('Ymd');
                          
                          if(date("D", strtotime($date)) === "Sat"){
                            //jika hari sabtu
                          }else if(date("D", strtotime($date)) === "Sun"){
                            //jika hari minggu
                          }else{
                            $totalcuti++;
                          }
                        }

                        echo $totalcuti." Hari";
                        ?>

                      </td>
                      <td><?= $in->namaparentsatker; ?></td>
                      <td>
                        <?php  
                          if($in->kodejeniscuti=='cutitahun'){
                            
                            $jmlsisacuti = 0;

                            #select sisa cuti
                            $sisacuti = $this->db->from('tb_cuti_sisacutitahunan')->where('nip',$in->nip)->order_by('thn_sisacuti','asc')->get()->result();

                            foreach($sisacuti as $row){
                              $jmlsisacuti += $row->jml_sisacuti;
                              echo '<i>'.$row->thn_sisacuti.' = '.$row->jml_sisacuti.'</i><br>';
                            }
                            echo 'Jml Sisa Cuti = '.$jmlsisacuti;
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

  
<?php $this->load->view('admin/sub/footer') ?>
<?php $this->load->view('admin/sub/foot') ?>