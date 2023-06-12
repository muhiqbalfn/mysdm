<?php $this->load->view('cuti/sub/head') ?>
<?php $this->load->view('cuti/sub/header') ?>

<?php  
#sess jenis cuti
$id_jeniscuti = $this->session->userdata('id_jeniscuti');
$kodejeniscuti = $this->session->userdata('kodejeniscuti');
$namajeniscuti = $this->session->userdata('namajeniscuti');

#sess data pegawai
$nip = $this->session->userdata('nip');
$namapeg = $this->session->userdata('namapeg');
$namajf = $this->session->userdata('namajf');
$statuspeg = $this->session->userdata('statuspeg');
$unitkerja = $this->session->userdata('unitkerja');
?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"><small>Data Riwayat Cuti</small></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('Cuti')?>">Home</a></li>
              <li class="breadcrumb-item active">Riwayat Cuti</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="col-md-4">
      <?= $this->session->flashdata('message');?>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-12">
            <!-- tabel master -->
            <div class="card card-info card-outline">
              <div class="card-header" align="center">
                <div>
                  <a href="" class="btn btn-outline-info btn-md button disabled" style="width: 250px;"><i class="fas fa-database"></i> &nbsp;Cek Identitas </a> 
                  &raquo;
                  <a href="" class="btn btn-outline-info btn-md button disabled" style="width: 250px;"><i class="fas fa-edit"></i> &nbsp;Pengisian Data </a> 
                  &raquo;
                  <a href="" class="btn btn-outline-info btn-md button disabled" style="width: 250px;"><i class="fas fa-check"></i> &nbsp;Verifikasi Data </a> 
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body"><br>

                <!-- LIST KONTEN ----------------------------------------------------- -->
                <div class="row" align="center">

                  <!-- IDENTITAS -->
                  <div class="col-md-1"></div>

                  <div class="col-md-2" align="center">
                    <table>
                      <tr><td align="center">&laquo; Foto Pegawai &raquo;</td></tr>
                      <tr>
                        <td>
                          <img class="img-rounded" src="https://i-sdm.unesa.ac.id/assets/images/kepegawaian/pegawai/<?= $nip ?>.jpg" style="width: 150px">
                        </td>
                      </tr>
                    </table>
                  </div>

                  <div class="col-md-7">
                    <div class="card card-info card-outline">
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <table class="table">
                          <tr>
                            <th width="30%">NIP</th>
                            <td>: <?= $nip; ?></td>
                          </tr>
                          <tr>
                            <th>Nama Pegawai</th>
                            <td>: <?= $namapeg; ?></td>
                          </tr>
                          <tr>
                            <th>Jabatan Fungsional</th>
                            <td>: <?= $namajf; ?></td>
                          </tr>
                          <tr>
                            <th>Status Pegawai</th>
                            <td>: <?= $statuspeg; ?></td>
                          </tr>
                          <tr>
                            <th>Unit Kerja</th>
                            <td>: <?= $unitkerja; ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-2"></div>

                  <!-- DATA RIWAYAT CUTI -->
                  <div class="col-md-12">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Data Riwayat Cuti</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <table class="table table-hover table-bordered table-striped">
                          <thead>
                            <tr align="center">
                              <th>No.</th>
                              <th>Jenis Cuti</th>
                              <th>Tanggal <code>(mulai s.d. selesai)</code></th>
                              <th>Surat Cuti</th>
                              <th>Surat Ket./Dokter</th>
                              <th>Anak Ke-</th>
                              <th>Status Usulan</th>
                              <th>Surat Izin</th>
                            </tr>
                          </thead>
                          <tbody id="showdata">
                            <?php 
                            $no=0;
                            foreach($riwayat as $in){
                            $no++; 
                            ?>

                            <tr align="center">
                              <td><?= $no; ?></td>
                              
                              <td>
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
                                ?>
                              </td>



                              <td>
                                <b><?= $in->tgl_mulai; ?></b> 
                                <i>s.d.</i> 
                                <b><?= $in->tgl_selesai; ?></b>
                                <br>
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



                              <td>
                                <a href="<?= base_url('assets/berkascuti/'.$in->file_usulancuti); ?>" target="_blank">
                                  <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 35px;">
                                </a>
                              </td>

                              <td>
                                <?php  
                                if($in->file_suratdokter){ ?>
                                  <a href="<?= base_url('assets/berkascuti/'.$in->file_suratdokter); ?>" target="_blank">
                                    <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 35px;">
                                  </a>
                                <?php }else{ echo "-"; }?>
                              </td>

                              <td>
                                <?php  
                                if($in->anak_ke){
                                  echo $in->anak_ke;
                                }else{
                                  echo "-";
                                }
                                ?>
                              </td>

                              <td>
                                <?php
                                if($in->statususulancuti==0){
                                  
                                  echo '<span class="badge badge-light">Tahapan usulan cuti belum selesai dilakukan</span><br><br>';
                                  echo '<a href="'.base_url('Cuti/cekidentitas').'" class="btn btn-sm btn-primary">Lanjutkan (?)</a>';
                                  echo ' - ';
                                  echo '<a href="javascript:;" class="btn btn-sm btn-danger btndel" data="'.$in->idusulancuti.'">Hapus (?)</a>';
                                
                                }else if($in->statususulancuti==1){
                                  
                                  echo '<span class="badge badge-warning">Diusulkan</span><br>';
                                
                                }else if($in->statususulancuti==2){
                                
                                  echo '<span class="badge badge-primary">Disetujui</span>';
                                
                                }else if($in->statususulancuti==3){
                                
                                  echo '<span class="badge badge-success">Selesai</span>';
                                
                                }else{
                                
                                  echo '<span class="badge badge-danger">Hubungi staf cuti</span>';
                                
                                }
                                ?>
                              </td>

                              <td>
                                <?php  
                                if($in->statususulancuti==0){
                                  echo '-';
                                }else if($in->statususulancuti==1){
                                  echo '<i>Diusulkan</i>';
                                }else if($in->statususulancuti==2){
                                  echo '<i>Proses</i>';
                                }else if($in->statususulancuti==3){
                                ?>

                                  <a href="<?= base_url('assets/berkascuti/suratizin/'.$in->file_izincuti); ?>" target="_blank">
                                    <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 35px;">
                                  </a>
                                
                                <?php
                                }else{
                                  echo '<span class="badge badge-danger"><i>Hubungi staf cuti</i></span>';
                                }
                                ?>
                                </td>

                            </tr>

                            <?php 
                            } 
                            
                            if($no==0){ echo '<tr><td colspan="8" align="center">Tidak ada data riwayat cuti.</td></tr>';}
                            ?>

                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
                <!-- LIST KONTEN ----------------------------------------------------- -->

              </div>
            </div>
          </div>
          <!-- col-lg-12 -->


        </div>
      </div>
    </div>

  </div>



<?php $this->load->view('cuti/sub/footer') ?>
<?php $this->load->view('cuti/sub/foot') ?>

<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

<script type="text/javascript">
$(document).ready(function(){

  //batalkan usulan cuti (tombol sudah dihapus hehehe)
  //Delete ----------------------------------------------------------------
  $('#showdata').on('click','.btndel',function(){
      var data1 = $(this).attr('data');

      swal({
          title: "Anda yakin ?",
          text: "Data ajuan cuti akan dibatalkan.",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Ya, hapus !",
          closeOnConfirm: false
      },
      function(){
          $.ajax({
              type : "POST",
              url  : "<?= base_url('Cuti/delriwayat_belumfinal')?>",
              dataType : "JSON",
              data : {data1:data1},
              success: function(data){
                  swal({
                      type: 'success', 
                      title: 'Deleted !',
                      text: 'Data berhasil dihapus.',
                      timer: 2000,
                      showConfirmButton: false
                  });
                  setInterval('window.location.reload()', 1000);
              },
              error:function(){
                  swal({
                      type: 'error', 
                      title: 'Oopss.. !',
                      text: 'Data gagal dihapus.',
                      timer: 2000,
                      showConfirmButton: false
                  });
              }
          });
      });
      return false;
  });


});
</script>