<?php 
#sess data pegawai
$nip       	  = $this->session->userdata('nip');
$akses        = $this->session->userdata('akses');
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

								<div class="col-xxl-3" align="center">
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
					            <div class="col-xxl-3" align="center">
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

					            <div class="col-xxl-3" align="center">
					            	<a href="<?= base_url('Tubel'); ?>" target="_blank">
										<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #50cd89;">
						                    <!--begin::Title-->
						                    <h5 class="mb-2 text-white">Monitoring & Pengajuan <br> Studi Lanjut</h5>
						                    <!--end::Title-->
						                    <div class="mb-0">
						                        <img src="<?= base_url('assets/sso/tubel.png') ?>" width="110">
						                    </div>
						                </div>
						            </a>
					            </div>

					            <div class="col-xxl-3" align="center">
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

					            <div class="col-xxl-3" align="center">
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

					            <!-- <div class="col-xxl-3" align="center">
									<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #808080;">
					                    <h5 class="mb-0 text-white">Pengajuan Pangkat <br> KP April & Oktober</h5>
					                    <div class="mb-0">
					                        <img src="<?= base_url('assets/sso/pns.png') ?>" width="85">
					                    </div>
					                </div>
					            </div> -->


					            <div class="col-xxl-3" align="center">
									<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #808080;">
					                    <!--begin::Title-->
					                    <h5 class="mb-1 text-white">Pencantuman Gelar</h5>
					                    <!--end::Title-->
					                    <div class="mb-0">
					                        <img src="<?= base_url('assets/sso/phd.png') ?>" width="95">
					                    </div>
					                </div>
					            </div>

					            <div class="col-xxl-3" align="center">
									<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #808080;">
					                    <!--begin::Title-->
					                    <h5 class="mb-3 text-white">Pengajuan Penghargaan</h5>
					                    <!--end::Title-->
					                    <div class="mb-2">
					                        <img src="<?= base_url('assets/sso/penghargaan.png') ?>" width="60">
					                    </div>
					                </div>
					            </div>

					            <div class="col-xxl-3" align="center">
									<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #808080;">
					                    <!--begin::Title-->
					                    <h5 class="mb-4 text-white">e-SKP</h5>
					                    <!--end::Title-->
					                    <div class="mb-2">
					                        <img src="<?= base_url('assets/sso/skp.png') ?>" width="70">
					                    </div>
					                </div>
					            </div>

					            <div class="col-xxl-3" align="center">
									<div class="border card-rounded p-6" style="box-shadow: -3px -3px 2px rgba(0,0,0,0.4); padding: 10px; background-color: #808080;">
					                    <!--begin::Title-->
					                    <h5 class="mb-2 text-white">Pengajuan Pensiun</h5>
					                    <!--end::Title-->
					                    <div class="mb-0">
					                        <img src="<?= base_url('assets/sso/pensiun.png') ?>" width="57">
					                    </div>
					                </div>
					            </div>


					        </div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
	<?php } ?>





<?php $this->load->view('sso/sub/footer') ?>
<?php $this->load->view('sso/sub/modal') ?>
<?php $this->load->view('sso/sub/foot') ?>

</html>