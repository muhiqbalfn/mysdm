<script>var hostUrl = "assets/";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="<?= base_url() ?>assets/sso/plugins/global/plugins.bundle.js"></script>
<script src="<?= base_url() ?>assets/sso/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="<?= base_url() ?>assets/sso/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="<?= base_url() ?>assets/sso/js/custom/widgets.js"></script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->

<!-- Datatable -->
<script src="<?=base_url() ?>assets/sso/plugins/custom/datatables/datatables.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Sweet-alert -->
<script src="<?= base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>
<script src="<?= base_url('assets/sweetalert/sweetalert.js'); ?>"></script>



<script type="text/javascript">

	//==========================================
	//LOGIN
	//==========================================

  	$('.btnloginku').on('click',function(){
	    var user = $('#iduser').val();
	    var pass = $('#idpass').val();

	    if(user==''){
	      swal({
	        title: "Eits.. !",
	        text: "Username harus di isi.",
	        icon: 'warning',
	        buttons: false,
	        timer: 3000,
	        closeOnClickOutside: false
	      });
	    }else if(pass == ''){
	      swal({
	        title: "Eits.. !",
	        text: "Password harus di isi.",
	        icon: 'warning',
	        buttons: false,
	        timer: 3000,
	        closeOnClickOutside: false
	      });
	    }else{
	      $.ajax({
	        type: "POST",
	        url: "<?= base_url('Controller/proses_login'); ?>",
	        data: {
	          user : user,
	          pass : pass
	        },
	        success: function(data){
	          var oObj = JSON.parse(data)
	          swal({
	            title: oObj.title,
	            text: oObj.msg,
	            icon: oObj.icon,
	            buttons: false,
	            timer: 3000,
	            closeOnClickOutside: false
	          });
	          if(oObj.is_true == 1){
	            setInterval('window.location.href = "<?= base_url('Controller'); ?>" ', 1000);
	          }
	          $('.loading').hide();
	        }
	      });
	    
	    }
	 });

</script>