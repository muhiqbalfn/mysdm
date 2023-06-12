<?php
$akses     	  = $this->session->userdata('akses');
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
							<h3 class="card-title fw-bolder text-gray-800 fs-2">PERATURAN</h3><br>
							<div class="row g-5 g-xl-8">
								<table id="datatable" class="table table-striped table-hover table-bordered table-row-bordered gy-5 gs-7">
								    <thead>
								        <tr class="fw-bold fs-6 text-gray-800">
								            <th>No.</th>
								            <th class="min-w-200px" colspan="2">Judul</th>
								            <th>Kategori</th>
								            <th>Tanggal</th>
								            <?php if($akses=='super' or $akses=='admin'){ ?>
								            <th class="min-w-40px">Aksi</th>
								        	<?php } ?>
								        </tr>
								    </thead>
								    <tbody>
								    	<?php
								    	$no=0;
								    	foreach ($dok as $in){
								    	$no++;
								    	?>
								        <tr>
								            <td><?= $no ?>.</td>
								            <td>
								            	<a href="<?= base_url('assets/dokumen/peraturan/'.$in->file); ?>" target="_blank" style="margin-right: -30px;">
								            		<img class="w-25px" src="<?= base_url() ?>assets/sso/pdf.png"/>
								            	</a>
								            </td>
								            <td>
								            	<a href="<?= base_url('assets/dokumen/peraturan/'.$in->file); ?>" target="_blank"><?= $in->ket ?></a><br>
								            	file(s)
								            </td>
								            <td>Dokumen</td>
								            <td><?= $in->tgl ?></td>
								            
								            <?php if($akses=='super' or $akses=='admin'){ ?>
								            <td>
								            	<a href="#"><i class="fas fa-edit fs-4 me-2"></i></a>
								            	<a href="#"><i class="fas fa-trash fs-4 me-2" style="color: red"></i></a>
								            </td>
								        	<?php } ?>
								        </tr>
								    	<?php } ?>
								    </tbody>
								</table>
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

<script type="text/javascript">
	$("#datatable").DataTable({
	    "scrollY": false,
	    "scrollX": false
	});
</script>