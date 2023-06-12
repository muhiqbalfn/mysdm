<?php $this->load->view('gelar/sub/head') ?>
<?php $this->load->view('gelar/sub/header') ?>


  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5>USULAN PENCANTUMAN GELAR : <?= $this->session->userdata('parentsatker'); ?></h5>
          </div>
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">

          <div class="col-lg-12">
            <!-- tabel master -->
            <div class="card card-info card-outline">
              <div class="card-header">
                <h5 class="card-title">
                  TAMBAH USULAN<br>
                </h5>
                <div class="card-tools">
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body"> 
                <div class="row">


                  <div class="col-md-12">

                    <div class="callout callout-success col-md-6">
                      <h5>Informasi!</h5>
                      <p>
                        Ukuran maksimal file adalah <b>400 KB</b>, file SKP <b>700 KB</b> dan bertipe <b>.PDF</b>
                      </p>
                    </div>



                    <!-- FORM USULAN -->
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">FORM USULAN</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">

                        <form id="form-tambah">

                        <div class="row">

                            <div class="col-md-6">
                              <div class="form-group">
                                <label>NAMA PEGAWAI</label>
                                <select class="form-control select2" style="width: 100%;" id="nip" name="nip">
                                  <option>-- Pilih --</option>
                                  <?php foreach ($pegawai as $peg){ ?>
                                  <option value="<?= $peg->nip ?>"><?= $peg->namalengkap ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>JENJANG PENDIDIKAN</label>
                                <select class="form-control select2" style="width: 100%;" id="jenjang" name="jenjang">
                                  <option>-- Pilih --</option>
                                  <option value="S1">S1/D4</option>
                                  <option value="S2">S2</option>
                                  <option value="S3">S3</option>
                                </select>
                              </div>
                            </div>




                            <div class="col-md-6">
                              <div class="form-group">
                                <label>IJAZAH<code>*</code></label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="application/pdf" id="file_ijazah" name="file_ijazah" required>
                                    <label class="custom-file-label">Pilih File PDF</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>TRANSKRIP<code>*</code></label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="application/pdf" id="file_transkrip" name="file_transkrip" required>
                                    <label class="custom-file-label">Pilih File PDF</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label >SK TUGAS/IZIN BELAJAR<code>*</code></label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="application/pdf" id="file_sktubel" name="file_sktubel" required>
                                    <label class="custom-file-label" >Pilih File PDF</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label >SERTIF. AKREDITASI PRODI<code>*</code></label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="application/pdf" id="file_akreditasiprodi" name="file_akreditasiprodi" required>
                                    <label class="custom-file-label" >Pilih File PDF</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label >SK KENAIKAN PANGKAT<code>*</code></label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="application/pdf" id="file_skkp" name="file_skkp" required>
                                    <label class="custom-file-label" >Pilih File PDF</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label >SK CPNS/SK PENGANGKATAN PEGAWAI(BAGI NON PNS)<code>*</code></label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="application/pdf" id="file_skcpns" name="file_skcpns" required>
                                    <label class="custom-file-label" >Pilih File PDF</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label >SK PNS/SK PENGANGKATAN PEGAWAI(BAGI NON PNS)<code>*</code></label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="application/pdf" id="file_skpns" name="file_skpns" required>
                                    <label class="custom-file-label" >Pilih File PDF</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label >SKP 2 TAHUN</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="application/pdf" id="file_skp2thn" name="file_skp2thn">
                                    <label class="custom-file-label" >Pilih File PDF</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label >SK JABATAN FUNGSIONAL<code>*</code></label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="application/pdf" id="file_skjf" name="file_skjf" required>
                                    <label class="custom-file-label" >Pilih File PDF</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label >SURAT PENGANTAR FAKULTAS<code>*</code></label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="application/pdf" id="file_suratpengantar" name="file_suratpengantar" required>
                                    <label class="custom-file-label" >Pilih File PDF</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label >SURAT KETERANGAN IZIN DIKTI <code>(jika ada)</code> </label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" accept="application/pdf" id="file_suketizindikti" name="file_suketizindikti">
                                    <label class="custom-file-label" >Pilih File PDF</label>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label style="color: white">--</label>
                                <div class="input-group">
                                  <button class="btn btn-info"><span class="fas fa-save"></span> KIRIM USULAN</button>
                                </div>
                              </div>
                            </div>

                        </div>
                        <!-- /.row -->


                        
                        <script type="text/javascript">
                          
                        </script>

                        </form>
                        
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->




                    <a href="<?= base_url('Gelar') ?>" class="btn btn-outline-info"><span class="fas fa-angle-left"></span> KEMBALI</a>

                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

  </div>


<?php $this->load->view('gelar/sub/footer') ?>
<?php $this->load->view('gelar/sub/foot') ?>


<script type="text/javascript">

  //VALIDASI UKURAN FILE ---------------------------------
  var file1 = document.getElementById("file_ijazah");
      file1.onchange = function(){ if(this.files[0].size > 400000){alert('Maksimal ukuran file Ijazah 400 KB');this.value = '';}}
  var file2 = document.getElementById("file_transkrip");
      file2.onchange = function(){ if(this.files[0].size > 400000){alert('Maksimal ukuran file Transkrip 400 KB');this.value = '';}}
  var file3 = document.getElementById("file_sktubel");
      file3.onchange = function(){ if(this.files[0].size > 400000){alert('Maksimal ukuran file SK Tubel 400 KB');this.value = '';}}
  var file4 = document.getElementById("file_akreditasiprodi");
      file4.onchange = function(){ if(this.files[0].size > 400000){alert('Maksimal ukuran file Akreditasi 400 KB');this.value = '';}}
  var file5 = document.getElementById("file_skkp");
      file5.onchange = function(){ if(this.files[0].size > 400000){alert('Maksimal ukuran file SK KP 400 KB');this.value = '';}}
  var file6 = document.getElementById("file_skcpns");
      file6.onchange = function(){ if(this.files[0].size > 400000){alert('Maksimal ukuran file SK CPNS 400 KB');this.value = '';}}
  var file7 = document.getElementById("file_skpns");
      file7.onchange = function(){ if(this.files[0].size > 400000){alert('Maksimal ukuran file SK PNS 400 KB');this.value = '';}}
  /*var file8 = document.getElementById("file_skp2thn");
      file8.onchange = function(){ if(this.files[0].size > 400000){alert('Maksimal ukuran file SKP 2 Tahun 400 KB');this.value = '';}}*/
  var file9 = document.getElementById("file_skjf");
      file9.onchange = function(){ if(this.files[0].size > 400000){alert('Maksimal ukuran file SK Jabatan Fungsional 400 KB');this.value = '';}}
  var file10 = document.getElementById("file_suratpengantar");
      file10.onchange = function(){ if(this.files[0].size > 400000){alert('Maksimal ukuran file Surat Pengantar 400 KB');this.value = '';}}
  

  $(document).ready(function(){

    //SIMPAN --------------------------------------------------------
    $('#form-tambah').submit(function(e){
      e.preventDefault();

          $.ajax({
               url:'<?= base_url() ?>Gelar/add_usulan',
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
                  text: 'Berhasil diusulkan.',
                  timer: 2000,
                  showConfirmButton: false
                });
                //triger
                setInterval('window.location.href = "<?= base_url('Gelar') ?>"', 1000);
                //window.location.href = "<?= base_url('Gelar') ?>";
            },
            error:function(){
                swal({
                    type: 'error', 
                    title: 'Oopss.. !',
                    text: 'Dokumen gagal disimpan.',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
          });
        
    });


  });
  
</script>