<?php 
$id_user   = $this->session->userdata('id_user'); 
$nama_user = $this->session->userdata('nama_user');
$akses     = $this->session->userdata('akses');

?>

<?php $this->load->view('admin/sub/head') ?>
<?php $this->load->view('admin/sub/header') ?>
<?php $this->load->view('admin/sub/sidebar') ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('Controller') ?>">Home</a></li>
              <li class="breadcrumb-item active">Daftar pegawai</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
                  DAFTAR PEGAWAI
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body showdata">
                <table id="example1" class="table table-bordered table-striped table-hover">
                  <thead>
                    <tr align="center">
                      <th>NO.</th>
                      <th>NIP - NAMA</th>
                      <th>STATUS PEGAWAI</th>
                      <th>TEMPAT, TGL LAHIR</th>
                      <th>JENIS PEGAWAI</th>
                      <th>TGL PENSIUN</th>
                      <th>NIDN</th>
                      <th>STATUS AKTIF</th>
                      <th>NPWP</th>
                      <th>AGAMA</th>
                      <th>L/P</th>
                      <th>TMT CPNS</th>
                      <th>TMT PNS</th>
                      <th>KARPEG</th>
                      <th>PANGKAT</th>
                      <th>NAMA PANGKAT</th>
                      <th>TMT GOLONGAN</th>
                      <th>NAMA JF</th>
                      <th>TMT JF</th>
                      <th>NAMA JS</th>
                      <th>TMT JS</th>
                      <th>ALAMAT</th>
                      <th>KTP</th>
                      <th>KODEPOS</th>
                      <th>NO. HP</th>
                      <th>EMAIL UNESA</th>
                      <th>JUMLAH ANAK</th>
                      <th>JUMLAH ISTRI/SUAMI</th>
                      <th>NAMA SATKER</th>
                      <th>NAMA PARENT SATKER</th>
                      <th>NAMA BIDANG</th>
                      <th>PENDIDIKAN TERAKHIR</th>
                      <th>RIWAYAT S1</th>
                      <th>RIWAYAT S2</th>
                      <th>RIWAYAT S3</th>
                      <th>MASA KERJA GOLONGAN</th>
                      <th>KODE PEGAWAI</th>
                      <th>MASA KERJA</th>
                      <th>PASSWORD</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=0;
                    foreach ($pegawai as $in){
                    $no++;
                    ?>
                    <tr>
                      <td align="center"><?= $no; ?></td>
                      <td><?= $in->nip ?> <br> <?= $in->namalengkap ?></td>
                      <td><?= $in->namastatuspegawai ?></td>
                      <td><?= $in->tmplahir ?>, <?= $in->tgllahir ?></td>
                      <td><?= $in->isdosen ?></td>
                      <td><?= $in->tglpensiun ?></td>
                      <td><?= $in->nidn ?></td>
                      <td><?= $in->namastatusaktif ?></td>
                      <td><?= $in->npwp ?></td>
                      <td><?= $in->agama ?></td>
                      <td><?= $in->jeniskelamin ?></td>
                      <td><?= $in->tmtcpns ?></td>
                      <td><?= $in->tmtpns ?></td>
                      <td><?= $in->karpeg ?></td>
                      <td><?= $in->pangkat ?></td>
                      <td><?= $in->namapangkat ?></td>
                      <td><?= $in->tmtgolongan ?></td>
                      <td><?= $in->namajfungsional ?></td>
                      <td><?= $in->tmtfungsional ?></td>
                      <td><?= $in->namajstruktural ?></td>
                      <td><?= $in->tmtstruktural ?></td>
                      <td><?= $in->alamat ?></td>
                      <td><?= $in->noktp ?></td>
                      <td><?= $in->kodepos ?></td>
                      <td><?= $in->nohp ?></td>
                      <td><?= $in->email_unesa ?></td>
                      <td><?= $in->jmlanak ?></td>
                      <td><?= $in->jmlissu ?></td>
                      <td><?= $in->namasatker ?></td>
                      <td><?= $in->namaparentsatker ?></td>
                      <td><?= $in->namabidang ?></td>
                      <td><?= $in->pendidikanterakhir ?></td>
                      <td><?= $in->th_s1 ?> - <?= $in->pt_s1 ?> - <?= $in->jur_s1 ?></td>
                      <td><?= $in->th_s2 ?> - <?= $in->pt_s2 ?> - <?= $in->jur_s2 ?></td>
                      <td><?= $in->th_s3 ?> - <?= $in->pt_s3 ?> - <?= $in->jur_s3 ?></td>
                      <td><?= $in->mkgol ?></td>
                      <td><?= $in->kodepegawai ?></td>
                      <td><?= $in->mkthngol ?> tahun - <?= $in->mkblngol ?> bulan</td>
                      <td><?= $in->pass ?></td>
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

<script type="text/javascript">


</script>