<?php 
#sess data pegawai
$nip       	  = $this->session->userdata('nip');
$namapeg   	  = $this->session->userdata('namapeg');
$parentsatker = $this->session->userdata('unitkerja');
$satker   	  = $this->session->userdata('satker');
?>


<!--begin::Toolbar-->
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-xxl col-lg-10 col-md-10 d-flex flex-stack flex-wrap">
		
		<?php if($nip){ ?>
		<div class="page-title d-flex flex-column">    
            <h2 class="text-white">Hai, <?= $namapeg ?></h2>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                <li class="breadcrumb-item text-white opacity-75"><?= $satker ?></li>
              	<li class="breadcrumb-item"><span class="bullet bg-white opacity-75 w-5px h-2px"></span></li>
                <li class="breadcrumb-item text-white opacity-75"><?= $parentsatker ?></li>
            </ul>
		</div>
		<?php }else{ ?>
		<div class="page-title d-flex flex-column">    
            <h2 class="text-white">Universitas Negeri Surabaya</h2>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                <li class="breadcrumb-item text-white opacity-75">Sub Direktorat SDM</li>
              	<li class="breadcrumb-item"><span class="bullet bg-white opacity-75 w-5px h-2px"></span></li>
                <li class="breadcrumb-item text-white opacity-75">Direktorat Keuangan dan Sumber Daya</li>
            </ul>
		</div>
		<?php } ?>

		<!--begin::Actions-->
		<div class="d-flex align-items-center flex-wrap py-2">
			<!--begin::Search-->
			<div id="kt_header_search" class="d-flex align-items-center w-200px w-lg-250px my-2 me-4 me-lg-6" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-end">
				<!--begin::Form-->
				<form data-kt-search-element="form" class="search w-100 position-relative" autocomplete="off">
					<!--begin::Input-->
					<input type="text" class="form-control ps-15" name="search" value="" placeholder="Search..." data-kt-search-element="input" />
					<!--end::Input-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Search-->

			<!--begin::Button-->
			<a href="#" class="btn btn-success my-2" tooltip="New App" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">
				<span class="menu-icon">
					<!--begin::Svg Icon | path: icons/duotune/layouts/lay009.svg-->
					<span class="svg-icon svg-icon-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path opacity="0.3" d="M20 14H11C10.4 14 10 13.6 10 13V10C10 9.4 10.4 9 11 9H20C20.6 9 21 9.4 21 10V13C21 13.6 20.6 14 20 14ZM21 20V17C21 16.4 20.6 16 20 16H11C10.4 16 10 16.4 10 17V20C10 20.6 10.4 21 11 21H20C20.6 21 21 20.6 21 20Z" fill="black" />
							<path d="M20 7H3C2.4 7 2 6.6 2 6V3C2 2.4 2.4 2 3 2H20C20.6 2 21 2.4 21 3V6C21 6.6 20.6 7 20 7ZM7 9H3C2.4 9 2 9.4 2 10V20C2 20.6 2.4 21 3 21H7C7.6 21 8 20.6 8 20V10C8 9.4 7.6 9 7 9Z" fill="black" />
						</svg>
					</span>
					<!--end::Svg Icon-->
				</span>
			 	Beri Masukan
			 </a>
			<!--end::Button-->

		</div>
		<!--end::Actions-->
	</div>
	<!--end::Container-->
</div>
<!--end::Toolbar-->