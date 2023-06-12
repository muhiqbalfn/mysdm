<?php  
  $akses    = $this->session->userdata('akses');
?>


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
                      <th style="vertical-align: middle;">NO.</th>
                      <th style="vertical-align: middle;">JENIS CUTI</th>
                      <th style="vertical-align: middle;">PENGUSUL</th>
                      <th style="vertical-align: middle;">UNIT KERJA</th>
                      <th style="vertical-align: middle;">PERIODE USULAN</th>
                      <th style="vertical-align: middle;" colspan="2">BERKAS USULAN</th>
                      <th style="vertical-align: middle;">NO. SURAT <br> <code>(E-OFFICE)</code></th>
                      <th style="vertical-align: middle;">SURAT IZIN</th>
                      <th style="vertical-align: middle;">STATUS</th>
                      <th style="vertical-align: middle;">AKSI</th>
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


                      <td align="center">
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
                          
                          #jika cutilahir
                          if($in->kodejeniscuti=='cutilahir'){
                            echo '<br><i class="badge">Anak ke- '.$in->anak_ke.'</i>';
                          }
                          #jika cutipenting
                          if($in->kodejeniscuti=='cutipenting'){
                            echo '<br><i class="badge">'.$in->nama_cutipenting.'</i>';
                          }
                        ?>
                      </td>

                      <td>
                        <?= $in->nip; ?> <br> <?= $in->namalengkap; ?>
                      </td>

                      <td align="center"><?= $in->namaparentsatker; ?></td>

                      <td align="center">
                        <?= $in->tgl_mulai; ?> <code>s.d.</code> <?= $in->tgl_selesai; ?><br>
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

                      <td align="center">
                        <a href="<?= base_url('assets/berkascuti/'.$in->file_usulancuti); ?>" target="_blank">
                          <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 35px;">
                        </a>
                        <br>
                        <i class="badge">Form cuti</i>
                      </td>

                      <td align="center">  
                        <?php if($in->file_suratdokter){ ?>
                          <a href="<?= base_url('assets/berkascuti/'.$in->file_suratdokter); ?>" target="_blank">
                          <img src="<?= base_url('assets/img/icon/pdf-biru.png') ?>" style="width: 35px;">
                        </a>
                        <br>
                        <i class="badge">Surat keterangan</i>
                        <?php }else{echo '<code>-</code>';} ?>

                      </td>

                      <td align="center">
                        <?php 
                        if($in->no_suratizin){
                          echo $in->no_suratizin;
                        }else{
                          echo '-';
                        }
                        ?>
                      </td>

                      <td align="center">
                        <?php if($in->file_izincuti){ ?>
                          <a href="<?= base_url('assets/berkascuti/suratizin/'.$in->file_izincuti); ?>" target="_blank">
                            <img src="<?= base_url('assets/img/icon/pdf2.png') ?>" style="width: 35px;">
                          </a>
                          <br>
                          <i><?= $in->tgl_suratizin ?></i>
                        <?php
                        }else{
                          echo '<i>Belum</i>';
                        }
                        ?>
                      </td>

                      <td align="center">
                        <?php  
                        if($in->statususulancuti==1){
                          echo '
                            <span class="badge badge-warning">Diusulkan</span>
                            ';
                        }else if($in->statususulancuti==2){
                          echo '<span class="badge badge-primary">Disetujui</span>';
                        }else if($in->statususulancuti==3){
                          echo '<span class="badge badge-success">Selesai</span>';
                        }else{
                          echo '<span class="badge badge-danger">Hubungi programmer</span>';
                        }
                        ?>
                      </td>

                      <td>
                          <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                          </button>
                          <div class="dropdown-menu" style="width: 5px;">
                            <?php if($in->statususulancuti==1){ ?>
                            <a href="javascript:;" class="dropdown-item btnsetuju" data="<?= $in->idusulancuti ?>" style="color:#1E90FF"><i class="fas fa-check"></i> Setujui</a>
                            <?php }else if($in->statususulancuti==2){ ?>
                            <a href="javascript:;" class="dropdown-item btnbatal" data="<?= $in->idusulancuti ?>" style="color:red"><i class="fas fa-times"></i> Batalkan setuju</a>
                            <?php }else{ ?>
                            <?php } ?>

                            <?php if($in->no_suratizin){ ?>
                            <a href="<?= base_url('CutiAdmin/suratizin/'.$in->idusulancuti); ?>" target="_blank" class="dropdown-item" style="color:#1E90FF"><i class="fas fa-file-pdf"></i> Surat Izin</a>
                            <?php } ?>
                            
                            <a href="javascript:;" class="dropdown-item btnedit" data="<?= $in->idusulancuti ?>" style="color:#1E90FF"><i class="fas fa-paper-plane"></i> Proses Usulan</a>

                            <a href="javascript:;" class="dropdown-item btneditsurat" data="<?= $in->idusulancuti ?>" style="color:green"><i class="fas fa-edit"></i> Edit Usulan</a>
                            
                            <?php if($in->kodejeniscuti == 'cutitahun'){ ?>
                              <?php if($akses == 'super'){ ?>
                                <a href="javascript:;" class="dropdown-item btndel" data="<?= $in->idusulancuti ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i> Hapus</a>
                              <?php } ?>
                            <?php }else{ ?>
                              <a href="javascript:;" class="dropdown-item btndel" data="<?= $in->idusulancuti ?>" style="color:#CD5C5C"><i class="fas fa-trash"></i> Hapus</a>
                            <?php } ?>
                          </div>
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


  <!-- Modal Proses Usulan -->
  <div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Proses Usulan Cuti</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="frmEdit">
          <input type="hidden" class="form-control" readonly="readonly" name="idusulancuti1">
          <div class="modal-body">
           <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="text" name="nip1" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nomor Surat Izin <code><i>(e-office)</i></code></label>
                      <input type="number" name="no_suratizin1" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Tanggal Surat Izin</label>
                      <input type="date" name="tgl_suratizin1" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>File Surat Izin Cuti <code><i>(ttd + stempel)</i></code> </label>
                      <input type="file" name="file_izincuti1" class="form-control" accept="application/pdf">
                      <i style="color: red;">* tidak perlu isi jika tidak ingin merubah</i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->



  <!-- Modal Edit Usulan-->
  <div class="modal fade" id="modal-edit-surat">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Usulan Cuti</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="frmEditSurat">
          <input type="hidden" class="form-control" readonly="readonly" name="idusulancuti1">
          <div class="modal-body">
           <div class="card card-default">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="text" name="nip1" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Mulai</label>
                      <input type="date" name="tgl_mulai1" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Tanggal Selesai</label>
                      <input type="date" name="tgl_selesai1" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Anak Ke <code><i>(cuti melahirkan)</i></code> </label>
                      <input type="number" name="anak_ke1" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Jenis Cuti</label>
                      <select class="form-control" name="id_jeniscuti1">
                        <option value="1">Cuti Tahunan</option>
                        <option value="2">Cuti Sakit</option>
                        <option value="3">Cuti Melahirkan</option>
                        <option value="4">Cuti Alasan Penting</option>
                        <option value="5">Cuti Besar</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Cuti Alasan Penting</label>
                      <select class="form-control" name="id_cutipenting1">
                        <option value="0">-</option>
                        <option value="1">Istri Melahirkan</option>
                        <option value="2">Anggota Keluarga Sakit</option>
                        <option value="3">Anggota Keluarga Meninggal Dunia</option>
                        <option value="4">Menikah</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Form Cuti<i style="color: red;">*</i></label>
                      <input type="file" name="file_usulancuti1" class="form-control" accept="application/pdf">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Simpan</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->


  
<?php $this->load->view('admin/sub/footer') ?>
<?php $this->load->view('admin/sub/foot') ?>

<script type="text/javascript">
  $(document).ready(function(){

  //Setujui usulan ---------------------------------------------------------
  $('.showdata').on('click','.btnsetuju',function(){
      var data1 = $(this).attr('data');
      swal({
          title: "Anda yakin ?",
          text: "Usulan cuti akan disetujui dan harus diproses",
          type: "info",
          showCancelButton: true,
          confirmButtonClass: "btn-info",
          confirmButtonText: "Ya, setujui !",
          closeOnConfirm: false
      },
      function(){
          $.ajax({
              type : "POST",
              url  : "<?= base_url('CutiAdmin/setujui_usulan')?>",
              dataType : "JSON",
              data : {data1:data1},
              success: function(data){
                  swal({
                      type: 'success', 
                      title: 'Disetujui !',
                      text: 'Usulan cuti berhasil disetujui',
                      timer: 2000,
                      showConfirmButton: false
                  });
                  setInterval('window.location.reload()', 1000);
              },
              error:function(){
                  swal({
                      type: 'error', 
                      title: 'Oopss.. !',
                      text: 'Usulan cuti gagal disetujui',
                      timer: 2000,
                      showConfirmButton: false
                  });
              }
          });
      });
      return false;
  });

  //Batalkan setuju ---------------------------------------------------------
  $('.showdata').on('click','.btnbatal',function(){
      var data1 = $(this).attr('data');
      swal({
          title: "Anda yakin ?",
          text: "Usulan disetujui akan dibatalkan",
          type: "info",
          showCancelButton: true,
          confirmButtonClass: "btn-info",
          confirmButtonText: "Ya, setujui !",
          closeOnConfirm: false
      },
      function(){
          $.ajax({
              type : "POST",
              url  : "<?= base_url('CutiAdmin/batal_setujui_usulan')?>",
              dataType : "JSON",
              data : {data1:data1},
              success: function(data){
                  swal({
                      type: 'success', 
                      title: 'Dibatalkan !',
                      text: 'Usulan disetujui berhasil dibatalkan',
                      timer: 2000,
                      showConfirmButton: false
                  });
                  setInterval('window.location.reload()', 1000);
              },
              error:function(){
                  swal({
                      type: 'error', 
                      title: 'Oopss.. !',
                      text: 'Usulan disetujui gagal dibatalkan',
                      timer: 2000,
                      showConfirmButton: false
                  });
              }
          });
      });
      return false;
  });



  //Get Edit Proses ----------------------------------------------------------
  $('.showdata').on('click','.btnedit',function(){
      var data1 = $(this).attr('data');
      $.ajax({
          type : "GET",
          url  : "<?= base_url('CutiAdmin/get_edit_proses')?>",
          dataType : "JSON",
          data : {data1:data1},
          success: function(data){
              $.each(data,function(){
                  $('#modal-edit').modal('show');
                  $('[name=idusulancuti1]').val(data.idusulancuti);
                  $('[name=nip1]').val(data.nip);
                  $('[name=file_izincuti1]').val(data.file_izincuti);
                  $('[name=no_suratizin1]').val(data.no_suratizin);
                  $('[name=tgl_suratizin1]').val(data.tgl_suratizin);
              });
          }
      });
      return false;
  });

  $('#frmEdit').submit(function(e){
    e.preventDefault();
         $.ajax({
             url:'<?= base_url();?>CutiAdmin/edit_proses',
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
             success: function(data){
              $('#modal-edit').modal('hide');
                swal({
                  type: 'success', 
                  title: 'Changed !',
                  text: 'Usulan berhasil dirubah.',
                  timer: 2000,
                  showConfirmButton: false
              });
              //triger
              setInterval('refreshPage()', 1000);
          },
          error:function(){
              swal({
                  type: 'error', 
                  title: 'Oopss.. !',
                  text: 'Usulan gagal dirubah.',
                  timer: 2000,
                  showConfirmButton: false
              });
          }
    });
  });


  //Get Edit Usulan----------------------------------------------------------
  $('.showdata').on('click','.btneditsurat',function(){
      var data1 = $(this).attr('data');
      $.ajax({
          type : "GET",
          url  : "<?= base_url('CutiAdmin/get_edit_usulan')?>",
          dataType : "JSON",
          data : {data1:data1},
          success: function(data){
              $.each(data,function(){
                  $('#modal-edit-surat').modal('show');
                  $('[name=idusulancuti1]').val(data.idusulancuti);
                  $('[name=nip1]').val(data.nip);
                  $('[name=tgl_mulai1]').val(data.tgl_mulai);
                  $('[name=tgl_selesai1]').val(data.tgl_selesai);
                  $('[name=anak_ke1]').val(data.anak_ke);
                  $('[name=id_jeniscuti1]').val(data.id_jeniscuti);
                  $('[name=id_cutipenting1]').val(data.id_cutipenting);
                  $('[name=file_usulancuti1]').val(data.file_usulancuti);
              });
          }
      });
      return false;
  });

  $('#frmEditSurat').submit(function(e){
    e.preventDefault();
         $.ajax({
             url:'<?= base_url();?>CutiAdmin/edit_usulan',
             type:"post",
             data:new FormData(this),
             processData:false,
             contentType:false,
             cache:false,
             async:false,
             success: function(data){
              $('#modal-edit-surat').modal('hide');
                swal({
                  type: 'success', 
                  title: 'Changed !',
                  text: 'Usulan berhasil dirubah.',
                  timer: 2000,
                  showConfirmButton: false
              });
              //triger
              setInterval('refreshPage()', 1000);
          },
          error:function(){
              swal({
                  type: 'error', 
                  title: 'Oopss.. !',
                  text: 'Usulan gagal dirubah.',
                  timer: 2000,
                  showConfirmButton: false
              });
          }
    });
  });


  //Delete ----------------------------------------------------------------
  $('.showdata').on('click','.btndel',function(){
      var data1 = $(this).attr('data');
      swal({
          title: "Anda yakin ?",
          text: "Data usulan cuti akan dihapus dari database.",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Ya, hapus !",
          closeOnConfirm: false
      },
      function(){
          $.ajax({
              type : "POST",
              url  : "<?= base_url('CutiAdmin/del_usulan')?>",
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