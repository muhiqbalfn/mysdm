<?php 
#sess data pegawai
$nip       	  = $this->session->userdata('nip');
$akses     	  = $this->session->userdata('akses');
$pass     	  = $this->session->userdata('pass');
?>


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






	<?php if($nip){ ?>
	<!--begin::Container-->
	<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl col-lg-10 col-md-10 col-sm-10">
		<!--begin::Post-->
		<div class="content flex-row-fluid" id="kt_content">
			<!--begin::Index-->
			<div class="card card-page">
				<!--begin::Card body-->
				<div class="card-body">

					<!--begin::Row-->
					<div class="row gy-5 g-xl-8">
						<div class="col-xxl-12">
							<h3 class="card-title fw-bolder text-gray-800 fs-2">PRODUK LAYANAN SDM</h3><br>
							<div class="row g-5 g-xl-8">

								<div class="col-xxl-3 col-md-3 col-lg-3 col-sm-6" align="center">
									<a href="https://kepegawaian.unesa.ac.id/" target="_blank"> 
										<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #50cd89;">
						                    <!--begin::Title-->
						                    <h5 class="mb-4 text-white">My-Profil SDM</h5> 
						                    <!--end::Title-->
						                    <div class="mb-0">
						                        <img src="<?= base_url('assets/sso/home1.png') ?>" width="115"> 
						                    </div>
						                </div>
					            	</a> 
					            </div>

					            <?php if($akses=='super' or $akses=='admin'){ ?>
					            <div class="col-xxl-3 col-md-3 col-lg-3 col-sm-6" align="center">
					            	<a href="<?= base_url('HK') ?>" target="_blank">
										<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #50cd89;">
						                    <!--begin::Title-->
						                    <h5 class="mb-2 text-white">Manajemen SDM</h5>
						                    <!--end::Title-->
						                    <div class="mb-0">
						                        <img src="<?= base_url('assets/sso/manajemen.png') ?>" width="98">
						                    </div>
						                </div>
						            </a>
					            </div>
					        	<?php } ?>

					            <div class="col-xxl-3 col-md-3 col-lg-3 col-sm-6" align="center">
					            	<a href="<?= base_url('Tubel'); ?>" target="_blank">
										<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #50cd89;">
						                    <!--begin::Title-->
						                    <h5 class="mb-2 text-white">Monitoring & Usul <br> Studi Lanjut</h5>
						                    <!--end::Title-->
						                    <div class="mb-0">
						                        <img src="<?= base_url('assets/sso/tubel.png') ?>" width="110">
						                    </div>
						                </div>
						            </a>
					            </div>

					            <div class="col-xxl-3 col-md-3 col-lg-3 col-sm-6" align="center">
					            	<a href="<?= base_url('Cuti'); ?>" target="_blank">
										<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #50cd89;">
						                    <!--begin::Title-->
						                    <h5 class="mb-2 text-white">Pengajuan Cuti</h5>
						                    <!--end::Title-->
						                    <div class="mb-0">
						                        <img src="<?= base_url('assets/sso/cuti.png') ?>" width="125">
						                    </div>
						                </div>
						            </a>
					            </div>

					            <?php if($akses=='super' or $akses=='admin'){ ?>
					            <div class="col-xxl-3 col-md-3 col-lg-3 col-sm-6" align="center">
					            	<a href="#" onclick="alert('Anda tidak punya akses !');">
										<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #50cd89;">
						                    <!--begin::Title-->
						                    <h5 class="mb-5 text-white">Buku Informasi</h5>
						                    <!--end::Title-->
						                    <div class="mb-2">
						                        <img src="<?= base_url('assets/sso/buku-info.png') ?>" width="75">
						                    </div>
						                </div>
						            </a>
					            </div>
					        	<?php } ?>

					        	<?php if($akses=='super' or $akses=='admin' or $akses=='fakultas'){ ?>
					           	<div class="col-xxl-3 col-md-3 col-lg-3 col-sm-6" align="center">
					           		<a href="<?= base_url('Pangkat'); ?>" target="_blank">
										<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #50cd89;">
						                    <h5 class="mb-0 text-white">Pengajuan Pangkat <br> KP April & Oktober</h5>
						                    <div class="mb-0">
						                        <img src="<?= base_url('assets/sso/pns.png') ?>" width="78">
						                    </div>
						                </div>
						            </a>
					            </div>
					        	<?php } ?>

					            <?php if($akses=='super' or $akses=='admin' or $akses=='fakultas'){ ?>
					            <div class="col-xxl-3 col-md-3 col-lg-3 col-sm-6" align="center">
					            	<a href="<?= base_url('Gelar'); ?>" target="_blank">
										<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #50cd89;">
						                    <!--begin::Title-->
						                    <h5 class="mb-1 text-white">Pencantuman Gelar</h5>
						                    <!--end::Title-->
						                    <div class="mb-0">
						                        <img src="<?= base_url('assets/sso/phd.png') ?>" width="95">
						                    </div>
						                </div>
						            </a>
					            </div>
					        	<?php } ?>
					          

					        </div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
	<?php } ?>









	<!--begin::Container-->
	<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl mt-6 col-lg-10 col-md-10 col-sm-10">
		<!--begin::Post-->
		<div class="content flex-row-fluid" id="kt_content">
			<!--begin::Index-->
			<div class="card card-page">
				<!--begin::Card body-->
				<div class="card-body">



					<!--begin::Row-->
					<div class="row gy-5 g-xl-8">

						<!--begin::Col-->
						<div class="col-xxl-6 col-md-6 col-lg-6 col-sm-6">
							<!--begin::List Widget 5-->
							<div class="card card-xl-stretch mb-5 mb-xl-8">
								<!--begin::Header-->
								<div class="card-header border-0 pt-5">
									<h3 class="card-title align-items-start flex-column">
										<span class="card-label fw-bolder text-dark">SURAT EDARAN</span>
										<span class="text-muted mt-1 fw-bold fs-7">Surat Edaran Terbaru</span>
									</h3>
									<div class="card-toolbar">
										<!--begin::Menu-->
										<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
														<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
														<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
														<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
													</g>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</button>
									</div>
								</div>
								<!--end::Header-->

								<!--begin::Body-->
								<div class="card-body pt-5">

									<?php foreach ($dokumen as $dokumen){ ?>
									<div class="d-flex align-items-sm-center mb-7">
										<!--begin::Symbol-->
										<div class="symbol symbol-circle symbol-50px me-5">
											<a href="<?= base_url('assets/dokumen/dokumen/'.$dokumen->file); ?>" target="_blank">
												<img src="<?= base_url() ?>assets/sso/pdf.png" class="w-25px align-self-center"/>
											</a>
										</div>
										<!--end::Symbol-->
										<!--begin::Section-->
										<div class="d-flex align-items-center flex-row-fluid flex-wrap">
											<div class="flex-grow-1 me-2">
												<a href="<?= base_url('assets/dokumen/dokumen/'.$dokumen->file); ?>" target="_blank" class="text-gray-800 text-hover-primary fs-6 fw-bolder"><?= $dokumen->ket ?></a>
												<span class="text-muted fw-bold d-block fs-7"><?= $dokumen->tgl ?></span>
											</div>
											<span class="badge badge-light fw-bolder my-2">NEW</span>
										</div>
										<!--end::Section-->
									</div>
									<?php } ?>
									

									<div class="d-flex align-items-sm-center">
										<a href="<?= base_url('Controller/materi') ?>" class="link-primary fw-bolder fs-6 me-1">Selengkapnya..</a>
									</div>

								</div>
								<!--end::Body-->
							</div>
							<!--end::List Widget 5-->
						</div>
						<!--end::Col-->






						<!--begin::Col-->
						<div class="col-xxl-6 col-md-6 col-lg-6 col-sm-6">
							<div class="card card-xxl-stretch">
								<!--begin::Header-->
								<div class="card-header border-0 pt-5 pb-3">
									<h3 class="card-title fw-bolder text-gray-800 fs-2">INFORMASI UMUM SDM</h3><br>
								</div>
								<div class="card-body py-0">
									<!--begin::Row-->
									<div class="row g-5 g-xl-8">

										<div class="col-xxl-6 col-md-6 col-lg-6 col-sm-12" align="center">
											<a href="https://kepegawaian.unesa.ac.id/" target="_blank">
												<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #50cd89;">
								                    <!--begin::Title-->
								                    <h5 class="mb-4 text-white">My-Profil SDM</h5>
								                    <!--end::Title-->
								                    <div class="mb-0">
								                        <img src="<?= base_url('assets/sso/home1.png') ?>" width="115">
								                    </div>
								                </div>
								            </a>
							            </div>

							           
							            
									</div>
									<!--end::Row-->
								</div>
							</div>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->








					<!--begin::Row-->
					<div class="row g-5 g-xl-8">
						<!--begin::Col-->
						<div class="col-xxl-6 col-md-6 col-lg-6 col-sm-6">
							<!--begin::List Widget 4-->
							<div class="card card-xl-stretch mb-5 mb-xl-8">
								<!--begin::Header-->
								<div class="card-header align-items-center border-0 mt-5">
									<h3 class="card-title align-items-start flex-column">
										<span class="fw-bolder text-dark fs-2">PERATURAN</span>
										<span class="text-gray-400 mt-2 fw-bold fs-6">Peraturan Terbaru</span>
									</h3>
									<div class="card-toolbar">
										<!--begin::Menu-->
										<button type="button" class="btn btn-sm btn-icon btn-icon-primary btn-active-light-primary me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
														<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
														<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
														<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
													</g>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</button>
									</div>
								</div>
								<!--end::Header-->

								<!--begin::Body-->
								<div class="card-body pt-1">

									<?php foreach ($peraturan as $peraturan){ ?>
									<div class="d-flex flex-stack item-border-hover px-3 py-2 ms-n4 mb-3">
										<!--begin::Section-->
										<div class="d-flex align-items-center">
											<!--begin::Symbol-->
											<div class="symbol symbol-50px me-2">
												<span class="symbol-label">
													<a href="<?= base_url('assets/dokumen/peraturan/'.$peraturan->file); ?>" target="_blank">
									            		<img class="w-25px" src="<?= base_url() ?>assets/sso/pdf.png"/>
									            	</a>
												</span>
											</div>
											<!--end::Symbol-->
											<!--begin::Title-->
											<div class="ps-1 mb-1">
												<a href="<?= base_url('assets/dokumen/peraturan/'.$peraturan->file); ?>" target="_blank" class="fs-5 text-gray-800 text-hover-primary fw-boldest"><?= $peraturan->ket ?></a>
												<div class="text-gray-400 fw-bold"><?= $peraturan->tgl ?></div>
											</div>
											<!--end::Title-->
										</div>
										<!--end::Section-->
										<!--begin::Label-->
										<span class="badge badge-light rounded-pill fs-7 fw-boldest">NEW</span>
										<!--end::Label-->
									</div>
									<?php } ?>

									
									<a href="<?= base_url('Controller/peraturan') ?>" class="link-primary fw-bolder fs-6 me-1">Selengkapnya..</a>


									<!--begin::Alert-->
									<div class="rounded border border-primary bg-light-primary border-dashed px-6 py-5">
										<a href="#" class="link-primary fw-bolder fs-6 me-1">Sub Direktorat SDM</a>
										<span class="text-gray-800 fw-bold fs-6">- Direktorat Keuangan dan Sumber Daya, Lt.5 Gedung Rektorat, Universitas Negeri Surabaya, Kampus Lidah Wetan</span>
									</div>
									<!--end::Alert-->
								</div>
								<!--end::Body-->
								
							</div>
							<!--end::List Widget 4-->
						</div>
						<!--end::Col-->








						<!--begin::Col-->
						<div class="col-xxl-6 col-md-6 col-lg-6 col-sm-6">
							<!--begin::List Widget 5-->
							<div class="card card-xl-stretch mb-5 mb-xl-8">
								<!--begin::Header-->
								<div class="card-header border-0 pt-5">
									<h3 class="card-title align-items-start flex-column">
										<span class="card-label fw-bolder text-dark">MATERI</span>
										<span class="text-muted mt-1 fw-bold fs-7">Materi Terbaru</span>
									</h3>
									<div class="card-toolbar">
										<!--begin::Menu-->
										<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
											<!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="5" y="5" width="5" height="5" rx="1" fill="#000000" />
														<rect x="14" y="5" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
														<rect x="5" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
														<rect x="14" y="14" width="5" height="5" rx="1" fill="#000000" opacity="0.3" />
													</g>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</button>
									</div>
								</div>
								<!--end::Header-->

								<!--begin::Body-->
								<div class="card-body pt-5">

									<?php foreach ($materi as $materi){ ?>
									<div class="d-flex align-items-sm-center mb-7">
										<!--begin::Symbol-->
										<div class="symbol symbol-circle symbol-50px me-5">
											<a href="<?= base_url('assets/dokumen/materi/'.$materi->file); ?>" target="_blank">
												<img src="<?= base_url() ?>assets/sso/media/svg/files/ai.svg" class="w-25px align-self-center"/>
											</a>
										</div>
										<!--end::Symbol-->
										<!--begin::Section-->
										<div class="d-flex align-items-center flex-row-fluid flex-wrap">
											<div class="flex-grow-1 me-2">
												<a href="<?= base_url('assets/dokumen/materi/'.$materi->file); ?>" target="_blank" class="text-gray-800 text-hover-primary fs-6 fw-bolder">Materi</a>
												<span class="text-muted fw-bold d-block fs-7"><?= $materi->ket ?></span>
											</div>
											<span class="badge badge-light fw-bolder my-2"><?= $materi->tgl ?></span>
										</div>
										<!--end::Section-->
									</div>
									<?php } ?>
									

									<div class="d-flex align-items-sm-center">
										<a href="<?= base_url('Controller/materi') ?>" class="link-primary fw-bolder fs-6 me-1">Selengkapnya..</a>
									</div>

								</div>
								<!--end::Body-->
							</div>
							<!--end::List Widget 5-->
						</div>
						<!--end::Col-->

						
					</div>
					<!--end::Row-->






					
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Index-->
		</div>
		<!--end::Post-->
	</div>
	<!--end::Container-->




<?php $this->load->view('sso/sub/footer') ?>
<?php $this->load->view('sso/sub/modal') ?>
<?php $this->load->view('sso/sub/foot') ?>

</html>


<?php 
$cekpass = $this->db->from('tb_pegawai')->where('nip',$nip)->where('pass','Sdm.12345')->get()->row();
if($cekpass){ 
?>
<script type="text/javascript">
	Swal.fire({
	  /*icon: 'warning',*/
	  title: 'Anda masih menggunakan password default.',
	  imageUrl: 'https://cdn-icons-png.flaticon.com/512/6195/6195700.png',
	  imageWidth: '150',
	  imageHeight: '150',
	  text: 'Segera ganti password anda pada menu profil !',
	  showConfirmButton: false,
	  footer: '<a href="<?= base_url('Controller/profil') ?>" class="btn btn-primary btn-md">Ganti password disini.</a>'
	});
</script>
<?php } ?>