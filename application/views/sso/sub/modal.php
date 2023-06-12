<!--begin::Modal - Login-->
<div class="modal fade" id="modal_login" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered mw-850px">
		<div class="modal-content">
			<div class="modal-header">
				<h2>Login My-SDM</h2>
				<!--begin::Close-->
				<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
					<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
					<span class="svg-icon svg-icon-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
							<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</div>
				<!--end::Close-->
			</div>
			<!--begin::Modal body-->
			<div class="modal-body py-lg-10 px-lg-10">
				<div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">
					<!--begin::Aside-->
					<div class="d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px">
						<!--begin::Nav-->
						<div class="stepper-nav ps-lg-1">
							<div class="stepper-item current">
								<img src="<?= base_url('assets/sso/sub-sdm.png') ?>" style="width: 300px;">
							</div>
						</div>
						<!--end::Nav-->
					</div>
					<!--begin::Aside-->
					<!--begin::Content-->
					<div class="flex-row-fluid py-lg-5 px-lg-15 rounded border p-10">
						<!--begin::Form-->
						<form>
							<div class="current" data-kt-stepper-element="content">
								<div class="w-100">
									<!--begin::Input-->
									<div class="fv-row mb-10">
										<label class="d-flex align-items-center fs-5 fw-bold mb-2">
											<span class="required">Username</span>
										</label>
										<input type="text" class="form-control" name="user" id="iduser" placeholder="NIP"/>
									</div>
									<div class="fv-row mb-10">
										<label class="d-flex align-items-center fs-5 fw-bold mb-2">
											<span class="required">Password</span>
										</label>
										<input type="password" class="form-control" name="pass" id="idpass" placeholder="Password"/>
									</div>
									<!--end::Input-->
								</div>
							</div>
							<button type="button" class="btn btn-md btn-primary btnloginku" name="login"><i class="fas fa-sign-in-alt"></i> Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Modal - Login-->

