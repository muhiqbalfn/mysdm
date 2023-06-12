<?php $this->load->view('cuti/sub/head') ?>
<?php $this->load->view('cuti/sub/header') ?>


<?php  
#sess jenis cuti-------------------------------------------
$id_jeniscuti   = $this->session->userdata('id_jeniscuti');
$kodejeniscuti  = $this->session->userdata('kodejeniscuti');
$namajeniscuti  = $this->session->userdata('namajeniscuti');

#sess data pegawai-----------------------------
$nip        = $this->session->userdata('nip');
$namapeg    = $this->session->userdata('namapeg');
$namajf     = $this->session->userdata('namajf');
$statuspeg  = $this->session->userdata('statuspeg');
$unitkerja  = $this->session->userdata('unitkerja');
$mkthngol   = $this->session->userdata('mkthngol');
$mkblngol   = $this->session->userdata('mkblngol');
$isdosen    = $this->session->userdata('isdosen');

$sekarang   = date('Y-m-d');



#-------------------------------------------------------------------------------
#untuk insert ke database bagi yang data sisacuti belum ada
#jml cuti bersama (untuk mengurangi cutitahunan dosen) bagi yg belum pernah cuti
#cb = cuti bersama

$cb_2thnlalu    = 1; //2021
$cb_1thnlalu    = 4; //2022
$cb_thnsekarang = 9; //2023

if($cb_2thnlalu > 6){
  $sisa_2thnlalu = 12-$cb_2thnlalu;
}else{
  $sisa_2thnlalu = 6;
}

if($cb_1thnlalu > 6){
  $sisa_1thnlalu = 12-$cb_1thnlalu;
}else{
  $sisa_1thnlalu = 6;
}

if($cb_thnsekarang > 6){
  $sisa_thnsekarang = 12-$cb_thnsekarang;
}else{
  $sisa_thnsekarang = 6;
}



#---------------------------------------------------------------------
#jika ada tgl_selesai >= tgl sekarang or statususulancuti==0 (proses pengisian) --> maka (tombol verifikasi identitas disabled)
$cekbtn = $this->db->from('tb_cuti_usulancuti')
                   ->where("(nip = '$nip') AND (tgl_selesai >= '$sekarang')")
                   ->or_where("(nip = '$nip') AND (statususulancuti = '0')")
                   ->get()->row();
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
              <li class="breadcrumb-item active">Cek Identitas</li>
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
                  <a href="" class="btn btn-info btn-md button disabled" style="width: 250px;"><i class="fas fa-database"></i> &nbsp;Cek Identitas </a> 
                  &raquo;
                  <a href="" class="btn btn-outline-danger btn-md button disabled" style="width: 250px;"><i class="fas fa-edit"></i> &nbsp;Pengisian Data </a> 
                  &raquo;
                  <a href="" class="btn btn-outline-danger btn-md button disabled" style="width: 250px;"><i class="fas fa-check"></i> &nbsp;Verifikasi Data </a> 
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body"><br>

                <!-- LIST KONTEN ----------------------------------------------------- -->
                <div class="row">

                  <div class="col-md-1"></div>

                  <div class="col-md-2" align="center">
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
                        <form>
                          <table class="table">


                              <tr>
                                <th width="30%">Jenis Pilihan Cuti</th>
                                <td>
                                  <h6>
                                    <?php  
                                      if($kodejeniscuti=='cutitahun'){
                                        echo '<span class="badge badge-pill badge-info">'.$namajeniscuti.'</span>';
                                      }else if($kodejeniscuti=='cutisakit'){
                                        echo '<span class="badge badge-pill badge-danger">'.$namajeniscuti.'</span>';
                                      }else if($kodejeniscuti=='cutilahir'){
                                        echo '<span class="badge badge-pill badge-success">'.$namajeniscuti.'</span>';
                                      }else if($kodejeniscuti=='cutipenting'){
                                        echo '<span class="badge badge-pill badge-warning">'.$namajeniscuti.'</span>';
                                      }else if($kodejeniscuti=='cutibesar'){
                                        echo '<span class="badge badge-pill badge-primary">'.$namajeniscuti.'</span>';
                                      }else{
                                        echo '-';
                                      }
                                    ?>
                                  </h6>
                                  <input type="hidden" name="id_jeniscuti" value="<?= $id_jeniscuti; ?>">
                                </td>
                              </tr>



                              <tr class="formcek">
                                <th>NIP</th>
                                <td>
                                  <input type="text" class="form-control" name="nip" value="<?= $nip; ?>" readonly>
                                </td>
                              </tr>

                              <tr>
                                <th>Nama Pegawai</th>
                                <td>
                                  <input type="text" class="form-control" name="namalengkap" value="<?= $namapeg; ?>" readonly>
                                </td>
                              </tr>

                              <tr>
                                <th>Jabatan Fungsional</th>
                                <td>
                                  <input type="text" class="form-control" name="namajfungsional" value="<?= $namajf; ?>" readonly>
                                </td>
                              </tr>

                              <tr>
                                <th>Status Pegawai</th>
                                <td>
                                  <input type="text" class="form-control" name="namastatuspegawai" value="<?= $statuspeg; ?>" readonly>
                                </td>
                              </tr>

                              <tr>
                                <th>Unit Kerja</th>
                                <td>
                                  <input type="text" class="form-control" name="namaparentsatker" value="<?= $unitkerja; ?>" readonly>
                                </td>
                              </tr>




                              <!-- LOGIKA CUTI BESAR=============================================== -->
                              <?php if($kodejeniscuti=='cutibesar'){ ?>

                              <?php
                                #cek apakah sudah pernah usul cuti besar
                                $cekcutibesar = $this->db->from('tb_cuti_usulancuti')->where('nip',$nip)->where('id_jeniscuti','5')->get()->num_rows();
                              ?>

                                <?php if($cekcutibesar >= 1){ ?>
                                  <tr>
                                    <th>Masa Kerja</th>
                                    <td>
                                      <?= $mkthngol ?> Tahun <?= $mkblngol ?> Bulan

                                      <br>
                                      
                                      <?php
                                      #jika mk > 5 thn (bukan cuti besar ke 1)
                                      if($mkthngol >= 5){ 
                                        echo '<i style="color:blue;">Masa kerja memenuhi</i>';
                                      }else{ 
                                        echo '<i style="color:red;">Masa kerja tidak memenuhi, minimal masa kerja 5 tahun untuk usul cuti besar ke 2 dst</i>';
                                      }
                                      ?>
                                    </td>
                                  </tr>
                                <?php } ?>

                              <?php } ?>






                              <!-- LOGIKA CUTI TAHUNAN============================================ -->
                              <?php if($kodejeniscuti=='cutitahun'){ ?>
                              <tr>
                                <th>Masa Kerja</th>
                                <td>
                                  <?= $mkthngol ?> Tahun <?= $mkblngol ?> Bulan

                                  <br>
                                  
                                  <?php
                                  if($mkthngol >= 1){ 
                                    echo '<i style="color:blue;">Masa kerja memenuhi</i>';
                                  }else{ 
                                    echo '<i style="color:red;">Masa kerja tidak memenuhi</i>';
                                  }
                                  ?>
                                </td>
                              </tr>

                              <tr>
                                <th>Sisa Cuti Tahunan <br> <code>(3 tahun terakhir)</code></th>
                                <td>
                                  
                                  <?php  

                                  $thn_now = date('Y');
                                  $sisacuti = 0;

                                  #select sisacuti 2 tahun yg lalu (thn_now - 2)
                                  #===================================================

                                  if($mkthngol >= 2){
                                    #CEK SISA CUTI 2 THN LALU APAKAH ADA
                                    $cek_thnnow = $this->db->from('tb_cuti_sisacutitahunan')->where('nip',$nip)->where('thn_sisacuti',$thn_now-2)->get();


                                    #JIKA BELUM ADA, MAKA DITAMBAHKAN
                                    if($cek_thnnow->num_rows() == 0){
                                      if($isdosen == 1){
                                        $dat = array(
                                        'nip'           => $nip,
                                        'thn_sisacuti'  => $thn_now-2,
                                        'jml_sisacuti'  => $sisa_2thnlalu
                                        );
                                      }else{
                                        $dat = array(
                                          'nip'           => $nip,
                                          'thn_sisacuti'  => $thn_now-2,
                                          'jml_sisacuti'  => 6
                                        );
                                      }
                                      $this->db->insert('tb_cuti_sisacutitahunan',$dat);
                                    }
                                  }

                                  #select sisacuti 1 tahun yg lalu (thn_now - 1)
                                  #===================================================

                                  if($mkthngol >= 2){
                                    #CEK SISA CUTI 1 THN LALU APAKAH ADA
                                    $cek_thnnow = $this->db->from('tb_cuti_sisacutitahunan')->where('nip',$nip)->where('thn_sisacuti',$thn_now-1)->get();

                                    #JIKA BELUM ADA, MAKA DITAMBAHKAN
                                    if($cek_thnnow->num_rows() == 0){
                                      if($isdosen == 1){
                                        $dat = array(
                                        'nip'           => $nip,
                                        'thn_sisacuti'  => $thn_now-1,
                                        'jml_sisacuti'  => $sisa_1thnlalu
                                        );
                                      }else{
                                        $dat = array(
                                          'nip'           => $nip,
                                          'thn_sisacuti'  => $thn_now-1,
                                          'jml_sisacuti'  => 6
                                        );
                                      }
                                      $this->db->insert('tb_cuti_sisacutitahunan',$dat);
                                    }
                                  }

                                  #select sisacuti tahun sekarang (thn_now)
                                  #===================================================

                                  if($mkthngol >= 1){
                                    #CEK SISA CUTI TAHUN INI APAKAH ADA
                                    $cek_thnnow = $this->db->from('tb_cuti_sisacutitahunan')->where('nip',$nip)->where('thn_sisacuti',$thn_now)->get();

                                    #JIKA BELUM ADA, MAKA DITAMBAHKAN
                                    if($cek_thnnow->num_rows() == 0){
                                      if($isdosen == 1){
                                        $dat = array(
                                        'nip'           => $nip,
                                        'thn_sisacuti'  => $thn_now,
                                        'jml_sisacuti'  => $sisa_thnsekarang
                                        );
                                      }else{
                                        $dat = array(
                                          'nip'           => $nip,
                                          'thn_sisacuti'  => $thn_now,
                                          'jml_sisacuti'  => 12
                                        );
                                      }
                                      $this->db->insert('tb_cuti_sisacutitahunan',$dat);
                                    }
                                  }

                                  #===================================================

                                  //select tahun dan sisacuti 3 tahun terakhir
                                  $qry = $this->db->from('tb_cuti_sisacutitahunan')->where('nip',$nip)->where('thn_sisacuti >=',$thn_now-2)->order_by('thn_sisacuti','asc')->get()->result();

                                    foreach ($qry as $row) {
                                      $sisacuti += $row->jml_sisacuti;
                                      echo '&raquo; '.$row->thn_sisacuti.' : '.$row->jml_sisacuti.' hari <br>';
                                    }
                                  #===================================================
                                  ?>
				  <code>Kusus Dosen, cuti tahunan 2023 dipotong 9 hari (cuti bersama)</code><br>
                                  Jumlah sisa cuti : <?php echo $sisacuti; ?> hari
                                </td>
                              </tr>
                              <?php } ?>






                              
                              <tr>

                                <!-- TOMBOL VERIFIKASI======================================== -->
                                <td>
                                  <?php
                                  #jika cutitahunan
                                  if($kodejeniscuti=='cutitahun'){

                                    #jika masakerja lebih dari 1thn
                                    if($mkthngol >= 1){ 

                                      #jika sisa cuti tahunan masih ada
                                      if($sisacuti != 0){
                                  ?>
                                        <button type="button" class="btn btn-md btn-info" <?php if($cekbtn){echo'disabled';} ?> id="btnverif"><i class="fas fa-check"></i> &nbsp;Verifikasi identitas</button>
                                  <?php
                                      }
                                    }







                                  #jika cuti besar
                                  }else if($kodejeniscuti=='cutibesar'){

                                    #jika sudah pernah cutibesar
                                    if($cekcutibesar >= 1){

                                      #jika mk > 5 thn (bukan cuti besar ke 1)
                                      if($mkthngol >= 5){
                                  ?>

                                        <button type="button" class="btn btn-md btn-info" <?php if($cekbtn){echo'disabled';} ?> id="btnverif"><i class="fas fa-check"></i> &nbsp;Verifikasi identitas</button>

                                  <?php
                                      }

                                    }else{
                                  ?>

                                      <button type="button" class="btn btn-md btn-info" <?php if($cekbtn){echo'disabled';} ?> id="btnverif"><i class="fas fa-check"></i> &nbsp;Verifikasi identitas</button>

                                  <?php
                                    }




                                  }else{ 
                                  ?>
                                    
                                      <button type="button" class="btn btn-md btn-info" <?php if($cekbtn){echo'disabled';} ?> id="btnverif"><i class="fas fa-check"></i> &nbsp;Verifikasi identitas</button>
                                  
                                  <?php } ?>
                                </td>


                                <!-- TOMBOL LANJUT============================================ -->
                                <td>
                                  <a href="<?= base_url('Cuti/pengisiandata') ?>" type="submit" class="btn btn-md float-right <?php if(!$cekbtn){echo'button disabled btn-outline-success';}else{echo'btn-success';} ?>"> Lanjut &raquo;</a>
                                </td>

                              </tr>




                          </table>
                        </form>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>

                  <div class="col-md-2"></div>

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

<script type="text/javascript">
  $(document).ready(function(){

    //Add --------------------------------------------------
    $('#btnverif').click(function(e){
      e.preventDefault();
      var data1 = $('[name=id_jeniscuti]').val();
      var data2 = $('[name=nip]').val();

      swal({
          title: "Apakah data anda sudah benar ?",
          text: "Pastikan data identitas anda sudah benar",
          type: "info",
          showCancelButton: true,
          confirmButtonClass: "btn-info",
          confirmButtonText: "Ya, kirim !",
          closeOnConfirm: false
      },
      function(){
        $.ajax({
            type : "POST",
            url  : "<?= base_url('Cuti/simpan_cekidentitas')?>",
            dataType : "JSON",
            data : {data1:data1,
                    data2:data2},
            success: function(data){
                swal({
                  type: 'success', 
                  title: 'Saved !',
                  text: 'Data berhasil diajukan.',
                  timer: 2000,
                  showConfirmButton: false
              });
              //setInterval('window.location.reload()', 1000);
              setInterval('window.location.href = "<?= base_url('Cuti/pengisiandata'); ?>" ', 1500);
          },
          error:function(){
              swal({
                  type: 'error', 
                  title: 'Oopss.. !',
                  text: 'Data gagal diajukan.',
                  timer: 2000,
                  showConfirmButton: false
              });
          }
        });
      });
        
    });


  });
</script>