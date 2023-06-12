<?php $this->load->view('cuti/sub/head') ?>
<?php $this->load->view('cuti/sub/header') ?>

<?php  
#sess jenis cuti
$id_jeniscuti  = $this->session->userdata('id_jeniscuti');
$kodejeniscuti = $this->session->userdata('kodejeniscuti');
$namajeniscuti = $this->session->userdata('namajeniscuti');

#sess data pegawai
$nip       = $this->session->userdata('nip');
$namapeg   = $this->session->userdata('namapeg');
$namajf    = $this->session->userdata('namajf');
$statuspeg = $this->session->userdata('statuspeg');
$unitkerja = $this->session->userdata('unitkerja');


#jika nip=session dan tgl_selesai >= tgl_sekarang (tidak bisa usul cuti)
$cek = $this->db->from('tb_cuti_usulancuti')->where('nip',$nip)->where('tgl_selesai >=',date('Y-m-d'))->get()->row();

#jika nip=session dan statususulancuti != 3
$cek_status = $this->db->from('tb_cuti_usulancuti')->where('nip',$nip)->where('statususulancuti !=',3)->get()->row();

#cek jenis kelamin (untuk cutilahir)
$cek_jk = $this->db->from('tb_pegawai')->where('nip',$nip)->where('jeniskelamin','L')->get()->row();
?>


  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"><small>UNIVERSITAS NEGERI SURABAYA</small></h4>
          </div>
          <div class="col-sm-6">
            
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
              <div class="card-header">
                <h3 class="card-title">
                  JENIS-JENIS USULAN CUTI
                </h3>
                <div class="card-tools">
                  <a class="btn btn-outline-success btn-sm btnku" href="<?= base_url('assets/berkascuti/panduan/Blangko-Cuti-New.doc') ?>" target="_blank"><i class="fas fa-file"></i> &nbsp;Template Form Cuti </a> -
                  <a class="btn btn-outline-danger btn-sm" href="<?= base_url('assets/berkascuti/panduan/Peraturan-BKN-No.24-Th.2017.pdf') ?>" target="_blank"><i class="fas fa-gavel"></i> &nbsp;Aturan Usulan Cuti </a> -
                  <a class="btn btn-outline-danger btn-sm" href="<?= base_url('assets/berkascuti/panduan/buku-panduan-aplikasi-cuti.pdf') ?>" target="_blank"><i class="fas fa-map"></i> &nbsp;Panduan Penggunaan </a>
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 

                <!-- LIST JENIS CUTI ----------------------------------------------------- -->
                <div class="row">


                  <?php if($cek or $cek_status){ ?>
                  <div class="col-lg-12">
                    <div class="col-lg-7">
                      <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Anda masih memiliki usulan cuti yang masih berlaku atau belum selesai, lihat <a href="<?= base_url('Cuti/riwayatcuti'); ?>">riwayat cuti</a></h5>
                      </div>
                    </div><br>
                  </div>
                  <?php } ?>
                  


                  <!-- CUTI TAHUNAN ==================== -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <?php if($cek or $cek_status){ ?>
                      <div class="overlay">
                        <i class="fas fa-3x fa-lock"></i>
                      </div>
                      <?php } ?>
                      <div class="inner">
                        <h3>
                          Tahunan
                        </h3>
                        <p>Jenis Cuti</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-tie"></i>
                      </div>
                      <?php if($nip){ ?>
                        <?php if(!$cek){ ?>
                        <a href="<?= base_url('Cuti/identitas/cutitahun') ?>" class="small-box-footer">Pilih Cuti <i class="fas fa-arrow-circle-right"></i></a><br>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>



                  <!-- CUTI SAKIT ==================== -->
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                      <?php if($cek or $cek_status){ ?>
                      <div class="overlay">
                        <i class="fas fa-3x fa-lock"></i>
                      </div>
                      <?php } ?>
                      <div class="inner">
                        <h3>
                          Sakit
                        </h3>
                        <p>Jenis Cuti</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-tie"></i>
                      </div>
                      <?php if($nip){ ?>
                        <?php if(!$cek){ ?>
                        <a href="<?= base_url('Cuti/identitas/cutisakit') ?>" class="small-box-footer">Pilih Cuti <i class="fas fa-arrow-circle-right"></i></a><br>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                  <!-- ./col -->



                  <!-- CUTI MELAHIRKAN ==================== -->
                  <?php if(!$cek_jk){ ?>

                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <?php if($cek or $cek_status){ ?>
                      <div class="overlay">
                        <i class="fas fa-3x fa-lock"></i>
                      </div>
                      <?php } ?>
                      <div class="inner">
                        <h3>Melahirkan</h3>
                        <p>Jenis Cuti</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-tie"></i>
                      </div>
                      <?php if($nip){ ?>
                        <?php if(!$cek){ ?>
                        <a href="<?= base_url('Cuti/identitas/cutilahir') ?>" class="small-box-footer">Pilih Cuti <i class="fas fa-arrow-circle-right"></i></a><br>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                  <!-- ./col -->

                  <?php } ?>



                  <!-- CUTI ALASAN PENTING ==================== -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <?php if($cek or $cek_status){ ?>
                      <div class="overlay">
                        <i class="fas fa-3x fa-lock"></i>
                      </div>
                      <?php } ?>
                      <div class="inner">
                        <h3>Alasan Penting</h3>
                        <p>Jenis Cuti</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-tie"></i>
                      </div>
                      <?php if($nip){ ?>
                        <?php if(!$cek){ ?>
                        <a href="<?= base_url('Cuti/identitas/cutipenting') ?>" class="small-box-footer">Pilih Cuti <i class="fas fa-arrow-circle-right"></i></a><br>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                  <!-- ./col -->



                  <!-- CUTI BESAR ==================== -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                      <?php if($cek or $cek_status){ ?>
                      <div class="overlay">
                        <i class="fas fa-3x fa-lock"></i>
                      </div>
                      <?php } ?>
                      <div class="inner">
                        <h3>Cuti Besar</h3>
                        <p>Jenis Cuti &nbsp;&raquo;&nbsp; (Untuk Naik Haji)</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-tie"></i>
                      </div>
                      <?php if($nip){ ?>
                        <?php if(!$cek){ ?>
                        <a href="<?= base_url('Cuti/identitas/cutibesar') ?>" class="small-box-footer">Pilih Cuti <i class="fas fa-arrow-circle-right"></i></a><br>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                  <!-- ./col -->



                </div>
                <!-- LIST JENIS CUTI ----------------------------------------------------- -->

                <br><br><br><br><br><br><br><br><br><br><br><br>
		<h6 style="color:#008B8B"><i>CP : Agus Ridwan (0856-4847-2812)</i></h6>
              </div>
            </div>
          </div>
          <!-- col-lg-12 -->


        </div>
      </div>
    </div>

  </div>



<style>
      .btnku {
        background-color: red;
        /*-webkit-border-radius: 60px;*/
        
        border: none;
        color: #333;
        cursor: pointer;
        display: inline-block;
        
        /*font-size: 20px;*/
        /*padding: 5px 15px;*/
        text-align: center;
        /*text-decoration: none;*/
      }
      @keyframes glowing {
        0% {
          background-color: red;
          box-shadow: 0 0 5px red;
        }
        50% {
          background-color: red;
          box-shadow: 0 0 20px red;
        }
        100% {
          background-color: #fff;
          /*box-shadow: 0 0 5px #fff;*/
        }
      }
      .btnku {
        animation: glowing 1300ms infinite;
      }
</style>

<?php $this->load->view('cuti/sub/footer') ?>
<?php $this->load->view('cuti/sub/foot') ?>