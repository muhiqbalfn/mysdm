<?php $this->load->view('cuti/sub/head') ?>
<?php $this->load->view('cuti/sub/header') ?>

<?php  
#sess jenis cuti
$id_jeniscuti = $this->session->userdata('id_jeniscuti');
$kodejeniscuti = $this->session->userdata('kodejeniscuti');
$namajeniscuti = $this->session->userdata('namajeniscuti');

#sess data pegawai
$nip = $this->session->userdata('nip');
?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"><small>Reset Password</small></h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('Cuti')?>">Home</a></li>
              <li class="breadcrumb-item active">Reset Password</li>
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
      <div class="container">
        <div class="row">

          <div class="col-lg-12">
            <!-- tabel master -->
            <div class="card card-info card-outline">
              
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
                  <div class="col-md-8">
                    <div class="card card-info card-outline">
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <?php foreach($data as $in){ ?>
                          <table class="table">
                            <tr>
                              <th width="30%">NIP</th>
                              <td>: <?= $in->nip ?> <code>(Username)</code></td>
                            </tr>
                            <tr>
                              <th>Nama Pegawai</th>
                              <td>: <?= $in->namalengkap ?></td>
                            </tr>
                            <tr>
                              <th>Jabatan Fungsional</th>
                              <td>: <?= $in->namajfungsional ?></td>
                            </tr>
                            <tr>
                              <th>Status Pegawai</th>
                              <td>: <?= $in->namastatuspegawai ?></td>
                            </tr>
                            <tr>
                              <th>Unit Kerja</th>
                              <td>: <?= $in->namaparentsatker ?></td>
                            </tr>
                            <form>
                              <input type="hidden" name="nip" value="<?= $in->nip ?>">
                              <input type="hidden" name="" value="<?= $in->pass ?>">
                              <tr>
                                <th>Password Baru</th>
                                <td><input type="password" name="pass" class="form-control" style="width: 80%;" placeholder="Masukkan password baru"></td>
                              </tr>
                              <tr>
                                <th></th>
                                <td><button class="btn btn-info btn-sm" id="btnedit"><i class="fas fa-sync"></i> Simpan Password</button></td>
                              </tr>
                            </form>
                          </table>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1"></div>

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

    //----------------------------------------------------------------
    $('#btnedit').click(function(e){
      e.preventDefault();
      var data1 = $('[name=nip]').val();
      var data2 = $('[name=pass]').val();

      if ($('[name=pass]').val() == ''){
              swal({
                  type: 'warning',
                  title: '',
                  text: 'Password tidak boleh kosong !',
                  timer: 2000,
                  showConfirmButton: false
              });
      }else{

        swal({
            title: "Anda yakin merubah password ?",
            text: "Ingat dan catat password anda",
            type: "info",
            showCancelButton: true,
            confirmButtonClass: "btn-info",
            confirmButtonText: "Ya, kirim !",
            closeOnConfirm: false
        },
        function(){
            $.ajax({
                type : "POST",
                url  : "<?= base_url('Cuti/edit_pass')?>",
                dataType : "JSON",
                data : {data1:data1,
                        data2:data2},
                success: function(data){
                    swal({
                        type: 'success', 
                        title: 'Berhasil !',
                        text: 'Password berhasil dirubah.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    setInterval('window.location.href="<?= base_url(''); ?>";', 1000);
                },
                error:function(){
                    swal({
                        type: 'error', 
                        title: 'Oopss.. !',
                        text: 'Password gagal dirubah.',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }
            });
        });

      }
    return false;
  });


});
</script>