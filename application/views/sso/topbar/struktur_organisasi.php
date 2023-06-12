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





	<!--begin::Container-->
	<div class="d-flex flex-column-fluid align-items-start container-xxl col-lg-10 col-md-10 col-sm-10">
		<!--begin::Post-->
		<div class="content flex-row-fluid" id="kt_content">
			<!--begin::Index-->
			<div class="card card-page">
				<!--begin::Card body-->
				<div class="card-body">

					<!--begin::Row-->
					<div class="row gy-5 g-xl-8">
						<div class="col-xxl-12">
							<h3 class="card-title fw-bolder text-gray-800 fs-2">STRUKTUR ORGANISASI SUB DIREKTORAT SDM</h3><br>
							<div class="row g-5 g-xl-8">
								<img src="<?= base_url('assets/sso/struktur-organisasi.png') ?>">
					        </div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>





<?php $this->load->view('sso/sub/footer') ?>
<?php $this->load->view('sso/sub/modal') ?>
<?php $this->load->view('sso/sub/foot') ?>

</html>