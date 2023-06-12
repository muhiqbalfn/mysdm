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





<!-- ================================================================================================ -->
<!-- MEMBATASI DATEPICKER SESUAI SISACUTI YG DIMILIKI -->

<?php
$thn_now = date('Y');
$sisacuti = 0;

//select tahun dan sisacuti 3 tahun terakhir
$qry = $this->db->from('tb_cuti_sisacutitahunan')->where('nip',$nip)->where('thn_sisacuti >=',$thn_now-2)->order_by('thn_sisacuti','asc')->get()->result();

  #mengakumulasi jml sisa cuti 3 thn terakhir
  foreach ($qry as $row) {
    $sisacuti += $row->jml_sisacuti;
  }
  //echo $sisacuti;
?>


<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function(){
  $('#tgl_mulai1').datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,             
      minDate: moment().add('d', 1).toDate(),
      /*maxDate: '6D'*/
  });

  $('#tgl_selesai1').datepicker({
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,             
      minDate: moment().add('d', 1).toDate(),
      maxDate: 
      <?php if($kodejeniscuti=='cutitahun'){
              echo $sisacuti;
            }else if($kodejeniscuti=='cutilahir'){
              echo '93';
            } 
      ?>
  });

});
</script>
<!-- ================================================================================================ -->






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
              <li class="breadcrumb-item active">Pengisian Data</li>
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
                  <a href="" class="btn btn-info btn-md button disabled" style="width: 250px;"><i class="fas fa-edit"></i> &nbsp;Pengisian Data </a> 
                  &raquo;
                  <a href="" class="btn btn-outline-danger btn-md button disabled" style="width: 250px;"><i class="fas fa-check"></i> &nbsp;Verifikasi Data </a>
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

                  <div class="col-md-2"></div>

                  <div class="col-md-8">
                    <div class="card card-info card-outline">
                      <div class="card-body p-0">
                        <form id="formData">
                          <table class="table">
                            <tbody>

                              <tr>
                                <th width="30%">Jenis Pilihan Cuti</th>
                                <td colspan="2" style="font-weight: bold;">
                                  <h6>
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
                                  <input type="hidden" class="form-control" name="kodejeniscuti" value="<?= $kdcuti; ?>" readonly>
                                </td>
                              </tr>

                              <tr>
                                <th>Periode Cuti <br><code>(tgl/bln/thn)</code></th>
                                <td width="35%">
                                  Mulai
                                  <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?= $in->tgl_mulai ?>" required>
                                </td>
                                <td width="35%">
                                  Selesai
                                  <input type="date" class="form-control" id="tgl_selesai" name="tgl_selesai" value="<?= $in->tgl_selesai ?>" required>
                                </td>
                              </tr>




                              <?php if($kdcuti=='cutilahir'){ ?>

                              <tr>
                                <th>Melahirkan anak ke-</th>
                                <td>
                                  <input type="number" class="form-control" name="anak_ke" min="1" max="3" required placeholder="max anak ke-3" value="<?= $in->anak_ke ?>">
                                </td>
                                <td></td>
                              </tr>




                              <?php } if($kdcuti=='cutipenting'){ ?>

                              <tr>
                                <th>Alasan Penting</th>
                                <td colspan="2">
                                  <div class="form-group clearfix">
                                    <?php
                                    $no=0;
                                    foreach($cutipenting as $row){
                                    $no++; 
                                    ?>
                                    <div class="icheck-primary d-inline">
                                      <input type="radio" id="radioPrimary<?= $no; ?>" name="id_cutipenting" 
                                        value="<?= $row->id_cutipenting; ?>" 
                                        <?php if($in->id_cutipenting==$row->id_cutipenting){echo'checked';} ?> required>
                                        <label for="radioPrimary<?= $no; ?>">
                                          <?= $row->nama_cutipenting; ?>
                                        </label>
                                    </div><hr>
                                    <?php } ?>
                                  </div>
                                </td>
                              </tr>

                              <?php } ?>




                              <tr>
                                <th>Berkas Pendukung</th>
                                <td colspan="2">
                                  <div class="form-group">
                                    <h6>Surat usulan cuti - <span class="badge badge-pill badge-info">ttd + stempel basah</span> - <span class="badge badge-pill badge-danger">.pdf</span></h6>
                                    <div class="custom-file">
                                      <input type="file" class="dropify1" name="file_usulancuti" accept="application/pdf" required>

                                      <?php if($in->file_usulancuti){ ?>
                                        <a href="<?= base_url('assets/berkascuti/'.$in->file_usulancuti); ?>" target="_blank" class="badge badge-info">File surat usulan cuti &nbsp;<i class="fas fa-download"></i></a>
                                      <?php } ?>
                                    
                                    </div>
                                  </div>

                                  <?php if($kdcuti != 'cutitahun'){ ?>
                                  <div class="form-group">
                                    <h6>Surat pendukung/keterangan dokter - <span class="badge badge-pill badge-danger">.pdf</span></h6>
                                    <div class="custom-file">
                                      <input type="file" class="dropify2" name="file_suratdokter" accept="application/pdf">

                                      <?php if($in->file_suratdokter){ ?>
                                        <a href="<?= base_url('assets/berkascuti/'.$in->file_suratdokter); ?>" target="_blank" class="badge badge-info">File surat keterangan dokter &nbsp;<i class="fas fa-download"></i></a>
                                      <?php } ?>
                                    
                                    </div>
                                  </div>
                                  <?php } ?>

                                </td>
                              </tr>

                              <tr>
                                <td colspan="2">
                                  <button type="submit" class="btn btn-md btn-info" id="btnsimpan"><i class="fas fa-sign-in-alt"></i> &nbsp;Kirim Data</button>
                                </td>
                                <td>
                                  <a href="<?= base_url('Cuti/verifikasi') ?>" class="btn btn-md float-right <?php if(!$in->file_usulancuti){echo'button disabled btn-outline-success';}else{echo'btn-success';} ?>"> Lanjut &raquo;</a>
                                </td>
                              </tr>

                            </tbody>
                          </table>
                        </form>
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

    //Edit ----------------------------------------------------------
    $('#formData').submit(function(e){
      e.preventDefault();
           $.ajax({
               url:'<?= base_url();?>Cuti/edit_pengisiandata',
               type:"post",
               data:new FormData(this),
               processData:false,
               contentType:false,
               cache:false,
               async:false,
               success: function(data){
                  swal({
                    type: 'success', 
                    title: 'Saved !',
                    text: 'Data berhasil diajukan.',
                    timer: 2000,
                    showConfirmButton: false
                });
                //setInterval('window.location.reload()', 1000);
                setInterval('window.location.href = "<?= base_url('Cuti/verifikasi'); ?>" ', 1500);
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

  //dropify style
  $('.dropify1').dropify({
      messages: {
          default: 'Dokumen',
          replace: 'Ganti',
          remove:  'Hapus',
          error:   'error',
      }
  });
  $('.dropify2').dropify({
      messages: {
          default: 'Dokumen',
          replace: 'Ganti',
          remove:  'Hapus',
          error:   'error',
      }
  });
</script>