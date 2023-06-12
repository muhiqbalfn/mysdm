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



#mengambil data sisa cuti 3 tahun terakhir (tahun sekarang dan 2 tahun yg lalu)
#===================================================
$thn_now = date('Y');


//select sisacuti 2 tahun yg lalu (thn_now - 2)
$qry_2 = $this->db->from('tb_cuti_sisacutitahunan')->where('nip',$nip)->where('thn_sisacuti',$thn_now-2)->get();
  #cek apakah ada nilai
  if($qry_2->num_rows() > 0){
    foreach ($qry_2->result() as $row_2) {
      $sisacutithn_2 = $row_2->jml_sisacuti; #2 thn yg lalu
    }
  }else{
    $sisacutithn_2 = 0;
  }



//select sisacuti 1 tahun yg lalu (thn_now - 1)
$qry_1 = $this->db->from('tb_cuti_sisacutitahunan')->where('nip',$nip)->where('thn_sisacuti',$thn_now-1)->get();
  #cek apakah ada nilai
  if($qry_1->num_rows() > 0){
    foreach ($qry_1->result() as $row_1) {
      $sisacutithn_1 = $row_1->jml_sisacuti; #1 thn yg lalu
    }
  }else{
    $sisacutithn_1 = 0;
  }



//select sisacuti tahun sekarang (thn_now)
$qry_now = $this->db->from('tb_cuti_sisacutitahunan')->where('nip',$nip)->where('thn_sisacuti',$thn_now)->get();
  #cek apakah ada nilai
  if($qry_now->num_rows() > 0){
    foreach ($qry_now->result() as $row_now) {
      $sisacutithn_now = $row_now->jml_sisacuti; #thn now
    }
  }else{
    $sisacutithn_now = 0;
  }

  //echo $sisacutithn_2;   #2 thn yg lalu
  //echo $sisacutithn_1;   #1 thn yg lalu
  //echo $sisacutithn_now; #thn now
#===================================================
?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"><small>Usulan Cuti Pegawai</small></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('Cuti')?>">Home</a></li>
              <li class="breadcrumb-item active">Verifikasi Data</li>
            </ol>
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
              <div class="card-header" align="center">
                <div>
                  <a href="<?= base_url('Cuti/cekidentitas') ?>" class="btn btn-outline-info btn-md button" style="width: 250px;"><i class="fas fa-database"></i> &nbsp;Cek Identitas </a> 
                  &raquo;
                  <a href="<?= base_url('Cuti/pengisiandata') ?>" class="btn btn-outline-info btn-md button" style="width: 250px;"><i class="fas fa-edit"></i> &nbsp;Pengisian Data </a> 
                  &raquo;
                  <a href="" class="btn btn-info btn-md button disabled" style="width: 250px;"><i class="fas fa-check"></i> &nbsp;Verifikasi Data </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body"><br>

                <!-- LIST KONTEN ----------------------------------------------------- -->
                <?php 
                foreach($datausulan as $in){ 
                $kdcuti = $in->kodejeniscuti;
                ?>

                <div class="row" align="center">

                  <div class="col-md-1"></div>

                  <div class="col-md-2">
                    <table>
                      <tr><td align="center">&laquo; Foto Pegawai &raquo;</td></tr>
                      <tr>
                        <td>
                          <img class="img-rounded" src="https://i-sdm.unesa.ac.id/assets/images/kepegawaian/pegawai/<?= $nip ?>.jpg" style="width: 160px">
                        </td>
                      </tr>
                    </table>
                  </div>

                  <div class="col-md-7">
                    <div class="card card-info card-outline">
                      <div class="card-body p-0">
                        <table class="table table-hover">
                          <tbody>
                            <tr>
                              <th width="30%">NIP</th>
                              <td colspan="2">: <?= $nip; ?></td>
                            </tr>
                            <tr>
                              <th>Nama Lengkap</th>
                              <td colspan="2">: <?= $namapeg; ?></td>
                            </tr>
                            <tr>
                              <th>Jabatan Fungsional</th>
                              <td colspan="2">: <?= $namajf; ?></td>
                            </tr>
                            <tr>
                              <th>Status Pegawai</th>
                              <td colspan="2">: <?= $statuspeg; ?></td>
                            </tr>
                            <tr>
                              <th>Unit Kerja</th>
                              <td colspan="2">: <?= $unitkerja; ?></td>
                            </tr>


                            <tr>
                              <th>Jenis Pilihan Cuti</th>
                              <td colspan="2" style="font-weight: bold;">
                                <h6>:
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
                                      echo '-';
                                    }
                                  ?>
                                </h6>
                              </td>
                            </tr>


                            <tr>
                              <th>Periode Cuti <code>(thn/bln/tgl)</code></th>
                              <td colspan="2">
                                <h6>: 
                                  <span class="badge badge-pill badge-info"><?= $in->tgl_mulai; ?></span> 
                                  s.d. 
                                  <span class="badge badge-pill badge-info"><?= $in->tgl_selesai; ?></span>
                                  &nbsp;&raquo;&nbsp;

                                  <?php  
                                  //menghitung durasi hari
                                  date_default_timezone_set("Asia/Jakarta");

                                  $tgl_mulai = $in->tgl_mulai;
                                  $tgl_akhir = $in->tgl_selesai;

                                  if($kdcuti=='cutitahun'){
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
                                    if($kdcuti=='cutitahun'){

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
                                  
                                </h6>
                              </td>
                            </tr>




                            <?php if($kdcuti=='cutilahir'){ ?>

                            <tr>
                              <th>Melahirkan anak ke</th>
                              <td colspan="2">: <?= $in->anak_ke; ?>
                                <?php 
                                if($in->anak_ke==1){ echo'(Pertama)';}else if($in->anak_ke==2){ echo'(Kedua)';}else{ echo'(Ketiga)';}
                                ?>  
                              </td>
                            </tr>

                            <?php }if($kdcuti=='cutipenting'){ ?>

                            <tr>
                              <th>Alasan Penting</th>
                              <?php 
                              $cutipenting = $this->db->from('tb_cuti_cutipenting')->where('id_cutipenting',$in->id_cutipenting)->get()->result();
                              foreach($cutipenting as $penting){
                              ?>
                              <td colspan="2">: <?= $penting->nama_cutipenting; ?></td>
                              <?php } ?>
                            </tr>

                            <?php } ?>




                            <tr>
                              <th>Berkas Pendukung</th>
                              <td colspan="2">
                                <div class="form-group">
                                  <h6>Surat usulan cuti</h6>
                                  <a href="<?= base_url('assets/berkascuti/'.$in->file_usulancuti); ?>" target="_blank" class="badge badge-info">File surat usulan cuti &nbsp;<i class="fas fa-download"></i></a>
                                </div>

                                <?php if($kdcuti != 'cutitahun'){ ?>
                                <div class="form-group">
                                  <h6>Surat keterangan dokter</h6>
                                  <a href="<?= base_url('assets/berkascuti/'.$in->file_suratdokter); ?>" target="_blank" class="badge badge-info">File surat keterangan dokter &nbsp;<i class="fas fa-download"></i></a>
                                </div>
                                <?php } ?>
                              </td>
                            </tr>

                            <tr id="showdata">
                              <td></td>
                              <td></td>
                              <td>
                                <button type="button" class="btn btn-md btn-info float-right btnverif"> Kirim usulan &raquo;</button>
                              </td>
                            </tr>

                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>

                  <div class="col-md-2"></div>

                </div>
                <?php } ?>
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
  //alert('cek');
  
  //----------------------------------------------------------------
  $('#showdata').on('click','.btnverif',function(){
      var sisacutithn_2   = <?= $sisacutithn_2; ?>;   //sisa cuti 2 thn yg lalu
      var sisacutithn_1   = <?= $sisacutithn_1; ?>;   //sisa cuti 1 thn yg lalu
      var sisacutithn_now = <?= $sisacutithn_now; ?>; //sisa cuti thn now
      var totalcuti       = <?= $totalcuti; ?>;        //total durasi cuti yg akan diambil
      //alert(sisacutithn_2);
      //alert(sisacutithn_1);
      //alert(sisacutithn_now);
      //alert(totalcuti);

      swal({
          title: "Anda yakin ?",
          text: "Data akan dikirim dan tidak bisa dirubah.",
          type: "info",
          showCancelButton: true,
          confirmButtonClass: "btn-info",
          confirmButtonText: "Ya, kirim !",
          closeOnConfirm: false
      },
      function(){
          $.ajax({
              type : "POST",
              url  : "<?= base_url('Cuti/edit_verifikasi')?>",
              dataType : "JSON",
              data : {sisacutithn_2:sisacutithn_2,
                      sisacutithn_1:sisacutithn_1,
                      sisacutithn_now:sisacutithn_now,
                      totalcuti:totalcuti
                     },
              success: function(data){
                  swal({
                      type: 'success', 
                      title: 'Terkirim !',
                      text: 'Data usulan cuti berhasil dikirim.',
                      timer: 2000,
                      showConfirmButton: false
                  });
                  setInterval('window.location.href="<?= base_url('Cuti/riwayatcuti'); ?>";', 1000);
              },
              error:function(){
                  swal({
                      type: 'error', 
                      title: 'Oopss.. !',
                      text: 'Usulan cuti gagal dikirim.',
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