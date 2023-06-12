<?php $this->load->view('admin/sub/head') ?>
<?php $this->load->view('admin/sub/sidebar') ?>

  <div class="content-wrapper" style="background-color: white">
    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-12" align="center">
              
            <?php foreach($suratizin as $in){ ?>




            <!-- KOP SURAT-------------------- -->
            <table style="width: 840px; font-family: 'Bookman Old Style'; font-size:17.5px; text-align: justify; margin-top: -40px;">
              <tr align="center">
                <td>
                  <img src="<?= base_url('assets/unesa.png') ?>" width="160" style="margin-right: -40px; margin-left: 30px;">
                </td>
                <td colspan="2" style="line-height: 28px;">
                  <span style="font-size: 27px;">
                    KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, <br>
                    RISET, DAN TEKNOLOGI
                  </span>
                  <br>
                  <span style="font-size: 24px;">
                    UNIVERSITAS NEGERI SURABAYA
                  </span>
                  <br>
                  <span style="font-size: 21px;">
                    <b>DIREKTORAT KEUANGAN DAN SUMBER DAYA</b>
                  </span>
                  <br>
                  <span>Kampus Lidah Wetan, Jalan Lidah Wetan, Surabaya 60213</span>
                  <br>
                  <span>Telepon: +6231-9942048, Faksimil: +6231-9942048</span>
                  <br>
                  <span>Laman: https://unesa.ac.id</span>
                </td>
              </tr>



              <!-- GARIS KOP-------------------- -->
              <tr>
                <td colspan="3">
                  <img src="<?= base_url('assets/berkascuti/template/line-surat.png') ?>" width="900" height="5">
                </td>
              </tr>
            </table>





            <!-- JUDUL, NOMOR, DAN TANGGAL-------------------- -->
            <table style="width: 820px; font-family: 'Bookman Old Style'; font-size:17.5px; text-align: justify;">
              <!-- JUDUL SURAT-------------------- -->
              <tr align="center">
                <td colspan="3" style="font-weight:bold">
                  <?php 
                  if($in->kodejeniscuti=='cutitahun'){
                    echo 'SURAT IZIN CUTI TAHUNAN';
                  }else if($in->kodejeniscuti=='cutisakit'){
                    echo 'SURAT IZIN CUTI SAKIT';
                  }else if($in->kodejeniscuti=='cutilahir'){
                    echo 'SURAT IZIN CUTI MELAHIRKAN';
                  }else if($in->kodejeniscuti=='cutipenting'){
                    echo 'SURAT IZIN CUTI ALASAN PENTING';
                  }else if($in->kodejeniscuti=='cutibesar'){
                    echo 'SURAT IZIN CUTI BESAR';
                  }
                  ?>
                </td>
              </tr>
              <tr align="center">
                <td colspan="3">
                  Nomor : B/<?= $in->no_suratizin ?>/UN38.II.1/KP.09.02/<?= date('Y'); ?>
                </td>
              </tr>
              <tr align="center">
                <td colspan="3">
                  <?php
                    #membuat fungsi tgl_indo
                    function tgl_indo($tgl){
                      $bulan = array (
                        1 =>   'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                      );

                      $pecahkan = explode('-', $tgl);
                      
                      // variabel pecahkan 0 = tanggal
                      // variabel pecahkan 1 = bulan
                      // variabel pecahkan 2 = tahun
                     
                      return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
                    }
                    echo 'Tanggal : '.tgl_indo($in->tgl_suratizin);
                  ?> 
                  <br><br><br>
                </td>
              </tr>






              <!-- IDENTITAS---------------------- -->
              <tr>
                <td style="vertical-align: top;">1.&nbsp;&nbsp; </td>
                <td colspan="2">
                  Diberikan izin 
                  <?php 
                  if($in->kodejeniscuti=='cutitahun'){
                    echo 'cuti tahunan';
                  }else if($in->kodejeniscuti=='cutisakit'){
                    echo 'cuti sakit';
                  }else if($in->kodejeniscuti=='cutilahir'){
                    echo 'cuti melahirkan';
                  }else if($in->kodejeniscuti=='cutipenting'){
                    echo 'cuti alasan penting';
                  }else if($in->kodejeniscuti=='cutibesar'){
                    echo 'cuti besar';
                  }
                  ?>

                  kepada
                  <?php  
                  if($in->namastatuspegawai=='PNS'){
                    echo "Pegawai Negeri Sipil:";
                  }else{
                    echo "Pegawai:";
                  }
                  ?>
                  <br></td>
              </tr>
              <tr>
                <td></td>
                <td width="210">Nama</td>
                <td>: <?= $in->namalengkap; ?></td>
              </tr>
              <tr>
                <td></td>
                <td>NIP</td>
                <td>: <?= $in->nip; ?></td>
              </tr>
              <tr>
                <td></td>
                <td>Pangkat/Gol. Ruang</td>
                <td>: 
                  <?php  
                  if($in->pangkat){
                    echo $in->namapangkat.' ('.$in->pangkat.')';
                  }else{echo '-';}
                  ?>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>Jabatan</td>
                <td>: <?= $in->namajfungsional ?></td>
              </tr>
              <tr>
                <td></td>
                <td style="vertical-align: top;">Unit Kerja <br><br></td>
                <td>
                  <table>
                    <tr>
                      <td style="vertical-align: top;">:</td>
                      <td>
                        <?php
                        $parent = $in->namaparentsatker;

                        if($parent == 'FIP' or $parent == 'FBS' or $parent == 'FIKK' or $parent == 'FT' or $parent == 'FMIPA' or $parent == 'FISH' or $parent == 'FEB' or $parent == 'FK' or $parent == 'Fakultas Vokasi'){
                          echo $parent.' Universitas Negeri Surabaya';
                        }else{ 
                          echo $in->namaparentsatker.'<br>Universitas Negeri Surabaya';
                        }
                        ?>
                      </td>
                    </tr>
                  </table>
                  <br>
                </td>
              </tr>






              <!-- NASKAH SURAT-------------------- -->
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
              ?>



              <!-- KETERANGAN 1----------------------- -->
              <tr>
                <td></td>
                <td colspan="2">

                Selama <?= $totalcuti; ?>
                <?php  
                if($totalcuti=='1'){echo ' (satu) ';}
                if($totalcuti=='2'){echo ' (dua) ';}
                if($totalcuti=='3'){echo ' (tiga) ';}
                if($totalcuti=='4'){echo ' (empat) ';}
                if($totalcuti=='5'){echo ' (lima) ';}
                if($totalcuti=='6'){echo ' (enam) ';}
                if($totalcuti=='7'){echo ' (tujuh) ';}
                if($totalcuti=='8'){echo ' (delapan) ';}
                if($totalcuti=='9'){echo ' (sembilan) ';}
                if($totalcuti=='10'){echo ' (sepuluh) ';}
                if($totalcuti=='11'){echo ' (sebelas) ';}
                if($totalcuti=='12'){echo ' (dua belas) ';}
                if($totalcuti=='13'){echo ' (tiga belas) ';}
                if($totalcuti=='14'){echo ' (empat belas) ';}
                if($totalcuti=='15'){echo ' (lima belas) ';}
                if($totalcuti=='16'){echo ' (enam belas) ';}
                if($totalcuti=='17'){echo ' (tujuh belas) ';}
                if($totalcuti=='18'){echo ' (delapan belas) ';}
                if($totalcuti=='19'){echo ' (sembilan belas) ';}
                if($totalcuti=='20'){echo ' (dua puluh) ';}
                if($totalcuti=='21'){echo ' (dua puluh satu) ';}
                if($totalcuti=='22'){echo ' (dua puluh dua) ';}
                if($totalcuti=='23'){echo ' (dua puluh tiga) ';}
                if($totalcuti=='24'){echo ' (dua puluh empat) ';}
                if($totalcuti=='25'){echo ' (dua puluh lima) ';}
                if($totalcuti=='26'){echo ' (dua puluh enam) ';}
                if($totalcuti=='27'){echo ' (dua puluh tujuh) ';}
                if($totalcuti=='28'){echo ' (dua puluh delapan) ';}
                if($totalcuti=='29'){echo ' (dua puluh sembilan) ';}
                if($totalcuti=='30'){echo ' (tiga puluh) ';}
                if($totalcuti=='31'){echo ' (tiga puluh satu) ';}
                if($totalcuti=='32'){echo ' (tiga puluh dua) ';}
                if($totalcuti=='33'){echo ' (tiga puluh tiga) ';}
                if($totalcuti=='34'){echo ' (tiga puluh empat) ';}
                if($totalcuti=='35'){echo ' (tiga puluh lima) ';}
                if($totalcuti=='36'){echo ' (tiga puluh enam) ';}
                if($totalcuti=='37'){echo ' (tiga puluh tujuh) ';}
                if($totalcuti=='38'){echo ' (tiga puluh delapan) ';}
                if($totalcuti=='39'){echo ' (tiga puluh sembilan) ';}
                if($totalcuti=='40'){echo ' (empat puluh) ';}
                if($totalcuti=='41'){echo ' (empat puluh satu) ';}
                if($totalcuti=='42'){echo ' (empat puluh dua) ';}
                if($totalcuti=='43'){echo ' (empat puluh tiga) ';}
                if($totalcuti=='44'){echo ' (empat puluh empat) ';}
                if($totalcuti=='45'){echo ' (empat puluh lima) ';}
                if($totalcuti=='46'){echo ' (empat puluh enam) ';}
                if($totalcuti=='47'){echo ' (empat puluh tujuh) ';}
                if($totalcuti=='48'){echo ' (empat puluh delapan) ';}
                if($totalcuti=='49'){echo ' (empat puluh sembilan) ';}
                if($totalcuti=='50'){echo ' (lima puluh) ';}
                ?>
                hari 

                <?php  
                if($in->kodejeniscuti=='cutitahun'){ echo 'kerja,';}
                ?>

                terhitung mulai tanggal 
                
                <?= tgl_indo(date($in->tgl_mulai)) ?> s.d. <?= tgl_indo(date($in->tgl_selesai)) ?>

                <?php 
                if($in->kodejeniscuti=='cutipenting'){ echo 'dikarenakan '.$in->nama_cutipenting;}
                ?>

                dengan ketentuan sebagai berikut:
                </td>
              </tr>


              <!-- KETERANGAN 2----------------------- -->
              <tr>
                <td></td>
                <td colspan="2">
                  <table>
                    <tr>
                      <td style="vertical-align: top;">a. &nbsp;</td>
                      <td>
                        Sebelum menjalankan 
                        <?php 
                        if($in->kodejeniscuti=='cutitahun'){
                          echo 'cuti tahunan';
                        }else if($in->kodejeniscuti=='cutisakit'){
                          echo 'cuti sakit';
                        }else if($in->kodejeniscuti=='cutilahir'){
                          echo 'cuti melahirkan';
                        }else if($in->kodejeniscuti=='cutipenting'){
                          echo 'cuti alasan penting';
                        }else if($in->kodejeniscuti=='cutibesar'){
                          echo 'cuti besar';
                        }
                        ?> 
                        wajib menyerahkan pekerjaannya kepada atasan langsungnya.
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td></td>
                <td colspan="2">
                  <table>
                    <tr>
                      <td style="vertical-align: top;">b. &nbsp;</td>
                      <td>
                        Setelah selesai menjalankan 
                        <?php 
                        if($in->kodejeniscuti=='cutitahun'){
                          echo 'cuti tahunan';
                        }else if($in->kodejeniscuti=='cutisakit'){
                          echo 'cuti sakit';
                        }else if($in->kodejeniscuti=='cutilahir'){
                          echo 'cuti melahirkan';
                        }else if($in->kodejeniscuti=='cutipenting'){
                          echo 'cuti alasan penting';
                        }else if($in->kodejeniscuti=='cutibesar'){
                          echo 'cuti besar';
                        }
                        ?> 
                        wajib melaporkan kepada atasan langsungnya dan bekerja kembali seperti biasa.
                      </td>
                    </tr>
                  </table>
                  <br>
                </td>
              </tr>







              <!-- PENUTUP---------------------------- -->
              <tr>
                <td style="vertical-align: top;">2. </td>
                <td colspan="2">
                  Demikian surat izin 
                  <?php 
                  if($in->kodejeniscuti=='cutitahun'){
                    echo 'cuti tahunan';
                  }else if($in->kodejeniscuti=='cutisakit'){
                    echo 'cuti sakit';
                  }else if($in->kodejeniscuti=='cutilahir'){
                    echo 'cuti melahirkan';
                  }else if($in->kodejeniscuti=='cutipenting'){
                    echo 'cuti alasan penting';
                  }else if($in->kodejeniscuti=='cutibesar'){
                    echo 'cuti besar';
                  }
                  ?> 
                  ini dibuat untuk dapat dipergunakan sebagaimana mestinya. 
                  <br><br><br>
                </td>
              </tr>
            </table>







            <!-- TTD PEJABAT-------------------- -->
            <table style="width: 820px; font-family: 'Bookman Old Style'; font-size:17.5px; text-align: justify;">

              <tr>
                <td width="480"></td>
                <td>
                a.n. Rektor<br>
                Direktur Keuangan dan Sumber Daya,
                </td>
              </tr>
              <tr height="95">
                <td colspan="2"></td>
              </tr>
              <tr>
                <td></td>
                <td>
                  Prof. Dr. Hariyati, Ak., M.Si., CA.<br>
                  NIP 196510011997022001
                </td>
              </tr>






              <!-- TEMBUSAN--------------------------- -->
              <tr>
                <td colspan="2">
                  Tembusan: <br>
                  1. Rektor <br>


                  <!-- TEMBUSAN 2 -->
                  <?php
                  $parent     = $in->namaparentsatker;
                  $idsatker   = $in->idsatker;
                  $satker     = $in->namasatker;

                  if($parent == 'FIP' or $parent == 'FBS' or $parent == 'FIKK' or $parent == 'FT' or $parent == 'FMIPA' or $parent == 'FISH' or $parent == 'FEB' or $parent == 'FK' or $parent == 'Fakultas Vokasi'){
                    echo '2. Dekan '.$parent;

                  }else if($idsatker == '12'){ 
                    echo '2. Kepala BPI';
                  }else if($idsatker == 'II.6' or $idsatker == '00080'){
                    echo '2. Kepala BPU';
                  }else if($idsatker == 'WR 1' or $idsatker == 'II.1' or $idsatker == 'III.1' or $idsatker == 'IV.1' or $idsatker == 'II.2.1' or $idsatker == 'II.2.2' or $idsatker == 'II.2.3' or $idsatker == 'II.2.4'){ 
                    echo '2. Direktur Keuangan dan Sumber Daya';
                  }else if($idsatker == 'I.2' or $idsatker == 'I.2.2'){ 
                    echo '2. Direktur Akademik';
                  }else if($idsatker == 'II.7'){ 
                    echo '2. Direktur Asrama Unesa';
                  }else if($idsatker == 'II.3' or $idsatker == 'II.3.1' or $idsatker == 'II.3.2'){ 
                    echo '2. Direktur Hukum dan Ketatalaksanaan';
                  }else if($idsatker == 'IV.5'){ 
                    echo '2. Direktur Humas dan Informasi Publik';
                  }else if($idsatker == 'III.3'){ 
                    echo '2. Direktur Inovasi dan Publikasi Ilmiah';
                  }else if($idsatker == 'I.3' or $idsatker == 'I.3.2'){ 
                    echo '2. Direktur Kemahasiswaan dan Alumni';
                  }else if($idsatker == 'IV.6'){ 
                    echo '2. Direktur Medical Center';
                  }else if($idsatker == 'II.5.2'){ 
                    echo '2. Direktur Pencegahan dan Penanggulangan ISK';
                  }else if($idsatker == 'IV.7'){ 
                    echo '2. Direktur Pengembangan Media';
                  }else if($idsatker == 'IV.2' or $idsatker == 'IV.2.6' or $idsatker == 'IV.2.5'){ 
                    echo '2. Direktur Perencanaan dan Pengembangan';
                  }else if($idsatker == 'iv.3'){ 
                    echo '2. Direktur TIK dan Kerjasama';
                  }else if($idsatker == '11'){ 
                    echo '2. Kepala LPSP';
                  }else if($idsatker == 'III.2'){ 
                    echo '2. Kepala LPPM';
                  }else if($idsatker == '10'){ 
                    echo '2. Kepala LPM';
                  }else if($idsatker == '80000' or $idsatker == '83101' or $idsatker == '83001'){ 
                    echo '2. Direktur Sekolah Pascasarjana';
                  }else if($idsatker == '90027'){ 
                    echo '2. Kepala SPI';
                  }else if($idsatker == '150000'){ 
                    echo '2. Kepala UPPBJ';
                  }else if($idsatker == 'I.6'){ 
                    echo '2. Kepala UPT Confusius Institute';
                  }else if($idsatker == 'I.4'){ 
                    echo '2. Kepala UPT Perpustakaan';
                  }else if($idsatker == 'I.5'){ 
                    echo '2. Kepala UPT Pusat Bahasa';
                  }else{
                    echo $satker;
                  }
                  ?>


                  <br>

                  
                  <!-- TEMBUSAN 3 -->
                  <?php
                  if($idsatker == 'II.2.4'){
                    echo '';
                  }else{
                    echo '3. Kasubdit Sumber Daya Manusia';
                  }
                  ?>
                </td>
              </tr>
            </table>

            <?php } ?>

          </div>

        </div>
      </div>
    </section>
  </div>


  
<?php $this->load->view('admin/sub/foot') ?>