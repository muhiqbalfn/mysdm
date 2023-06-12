<!DOCTYPE html>
<html lang="en">
		
<!--begin::Navbar-->
<?php $this->load->view('sso/sub/head') ?>
<!--end::Navbar-->

<!--begin::Header-->
<?php $this->load->view('sso/sub/header') ?>
<!--end::Header-->

<!--begin::Toolbar-->
<?php $this->load->view('sso/sub/toolbar') ?>
<!--end::Toolbar-->



	<?php foreach ($profil as $in){ ?>
	<!--begin::Container-->
	<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl col-lg-10 col-md-10 col-sm-10">
		<!--begin::Post-->
		<div class="content flex-row-fluid" id="kt_content">
			<!--begin::Layout - Overview-->
			<div class="d-flex flex-column flex-xl-row">


				<!--begin::Sidebar-->
				<div class="flex-column flex-lg-row-auto w-100 w-xl-325px mb-10">
					<!--begin::Card-->
					<div class="card card-flush" data-kt-sticky="true" data-kt-sticky-name="account-navbar" data-kt-sticky-offset="{default: false, xl: '80px'}" data-kt-sticky-width="{lg: '250px', xl: '325px'}" data-kt-sticky-left="auto" data-kt-sticky-top="90px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">

						<!--begin::Card body-->
						<div class="card-body pt-0 p-10">
							<!--begin::Summary-->
							<div class="d-flex flex-center flex-column mb-10" align="center">
								<!--begin::Avatar-->
								<div class="mb-3 mt-10">
									<img class="img-rounded" src="https://i-sdm.unesa.ac.id/assets/images/kepegawaian/pegawai/<?= $in->nip ?>.jpg" style="width: 150px">
								</div>
								<!--end::Avatar-->
								<!--begin::Name-->
								<a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bolder mb-1"><?= $in->namalengkap ?></a>
								<!--end::Name-->
								<!--begin::Position-->
								<div class="fs-6 fw-bold text-gray-400 mb-2"><?= $in->namajfungsional ?></div>
								<!--end::Position-->
							</div>
							<!--end::Summary-->
							<!--begin::Account info-->
							<div class="border border-dashed border-gray-300 bg-lighten card-rounded p-6">
								<!--begin::Title-->
								<h5 class="mb-4">By : Tim IT SDM</h5>
								<!--end::Title-->
								<a href="https://www.unesa.ac.id" class="text-link fs-7 fw-bolder" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Universitas Negeri Surabaya</a>
							</div>
							<!--end::Account info-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::Card-->
				</div>
				<!--end::Sidebar-->




				<!--begin::Content-->
				<div class="flex-lg-row-fluid ms-lg-10">

					<!--begin::details View-->
					<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
						<!--begin::Card header-->
						<div class="card-header cursor-pointer">
							<!--begin::Card title-->
							<div class="card-title m-0">
								<h3 class="fw-bolder m-0">Profil Detail</h3>
							</div>
							<!--end::Card title-->
							<!--begin::Action-->
							<a href="#" class="btn btn-primary align-self-center" data-bs-toggle="modal" data-bs-target="#modal_editpass"><span class="fas fa-edit"></span> Edit Password</a>
							<!--end::Action-->
						</div>
						<!--begin::Card header-->
						<!--begin::Card body-->
						<div class="card-body p-9">
							<!--begin::Row-->
							<div class="row mb-7">
								<!--begin::Label-->
								<label class="col-lg-4 fw-bold text-muted">NIP</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8">
									<span class="fw-bolder fs-6 text-dark"><?= $in->nip ?></span>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
							<!--begin::Row-->
							<div class="row mb-7">
								<!--begin::Label-->
								<label class="col-lg-4 fw-bold text-muted">Nama Lengkap</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8">
									<span class="fw-bolder fs-6 text-dark"><?= $in->namalengkap ?></span>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
							<!--begin::Input group-->
							<div class="row mb-7">
								<!--begin::Label-->
								<label class="col-lg-4 fw-bold text-muted">Email Unesa</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8">
									<span class="fw-bolder fs-6 text-dark"><?= $in->email_unesa ?></span>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-10">
								<!--begin::Label-->
								<label class="col-lg-4 fw-bold text-muted">Jabatan Fungsional</label>
								<!--begin::Label-->
								<!--begin::Label-->
								<div class="col-lg-8">
									<span class="fw-bold fs-6"><?= $in->namajfungsional ?></span>
								</div>
								<!--begin::Label-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-7">
								<!--begin::Label-->
								<label class="col-lg-4 fw-bold text-muted">Status Pegawai</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<span class="fw-bold fs-6"><?= $in->namastatuspegawai ?></span>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-7">
								<!--begin::Label-->
								<label class="col-lg-4 fw-bold text-muted">Kontak
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 d-flex align-items-center">
									<span class="fw-bolder fs-6 me-2"><?= $in->nohp ?></span>
									<span class="badge badge-success">Verified</span>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-7">
								<!--begin::Label-->
								<label class="col-lg-4 fw-bold text-muted">Unit Kerja</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8">
									<a href="#" class="fw-bold fs-6 text-dark text-hover-primary"><?= $in->namasatker ?></a>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-7">
								<!--begin::Label-->
								<label class="col-lg-4 fw-bold text-muted">Nama Unit Kerja (parent)</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8">
									<span class="fw-bolder fs-6 text-dark"><?= $in->namaparentsatker ?></span>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
						</div>
						<!--end::Card body-->
					</div>
					<!--end::details View-->


				</div>
				<!--end::Content-->


			</div>
			<!--end::Layout - Overview-->
		</div>
		<!--end::Post-->
	</div>
	<!--end::Container-->










	<!--begin::Modal - Edit Password-->
	<div class="modal fade" tabindex="-1" id="modal_editpass">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Password</h5>
					<!--begin::Close-->
					<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
						<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
						<span class="svg-icon svg-icon-2x">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
								<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
					</div>
					<!--end::Close-->
				</div>
				<form>
					<div class="modal-body">
						<div class="flex-row-fluid py-lg-5 px-lg-15 rounded border p-10">
							<!--begin::Form-->
								<div class="current" data-kt-stepper-element="content">
									<div class="w-100">
										<!--begin::Input-->
										<div class="fv-row mb-10">
											<label class="d-flex align-items-center fs-5 fw-bold mb-2">
												<span class="required">NIP</span>
											</label>
											<input type="text" class="form-control" name="nip" value="<?= $in->nip ?>" readonly style="background-color: #E0FFFF"/>
										</div>
										<div class="fv-row mb-10">
											<label class="d-flex align-items-center fs-5 fw-bold mb-2">
												<span class="required">Password [baru]</span>
											</label>
											<input type="password" class="form-control" name="pass" placeholder="Password"/>
										</div>
										<!--end::Input-->
									</div>
								</div>
							</form>
							<!--end::Form-->
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="btnedit">Simpan Password Baru</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--end::Modal - Edit Password-->



	<?php } ?>





<?php $this->load->view('sso/sub/footer') ?>
<?php $this->load->view('sso/sub/modal') ?>
<?php $this->load->view('sso/sub/foot') ?>

</html>

<script type="text/javascript">
	$("#datatable").DataTable({
	    "scrollY": false,
	    "scrollX": false
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
                url  : "<?= base_url('Controller/edit_password')?>",
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
                    setInterval('window.location.href="<?= base_url('Controller/profil'); ?>";', 1000);
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