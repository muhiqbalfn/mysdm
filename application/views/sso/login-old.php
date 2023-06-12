<?php $this->load->view('sso/head'); ?>

<body>
    <div class="container-xxl bg-white p-0">
        
        <?php $this->load->view('sso/navbar'); ?>

        <br><br><br><br><br><br><br>

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Form Login</h1>
                <div class="row g-4">

                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <form>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="user" id="iduser" placeholder="Your Name">
                                            <label for="name">NIP</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="password" class="form-control" name="pass" id="idpass" placeholder="Your Email">
                                            <label for="email">Password</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3 btnlogin" name="login" type="button">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-3"></div>

                </div>
            </div>
        </div>
        <!-- Contact End -->
        
        <br><br><br><br><br><br><br>

        <?php $this->load->view('sso/footer'); ?>

    </div>

    <?php $this->load->view('sso/foot'); ?>

</body>

</html>

<script type="text/javascript">

    //alert('cek');

  $('.btnlogin').on('click',function(){
    //alert('Jossss');

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
        url: "<?= base_url('index.php/SSOController/proses_login'); ?>",
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
            setInterval('window.location.href = "<?= base_url('index.php/SSOController'); ?>" ', 1500);
            //document.location.href = '<?= base_url('index.php/SSOController'); ?>';
          }
          $('.loading').hide();
        }
      });
    
    }
  });

</script>