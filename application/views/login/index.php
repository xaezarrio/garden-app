
<?php 

    if($this->session->userdata('session_garden')!=false) {
            redirect('admin/');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dynonobel | Log In  </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bootstrap.min.css">  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url('assets') ?>/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>Garden</b> App
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg"><?= @$message ?> <?= validation_errors(); ?></p>

      <form action="<?= base_url('login/act_login')?>" method="post" id="upload">
       <div class="show_error"></div>
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="username windows" name="username" >
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <!-- <a href="<?= base_url('login/forgot') ?>">Forgot Password ?</a> -->

          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" id="send-btn">Sign In</button>

          </div>
          <!-- /.col -->

        </div>
      </form>
      <br>
      <hr>
      <center>V.1.0.0 - 117. By : <a href="http://smartsoftstudio.com">www.smartsoftstudio.com</a></center>
    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  <script src="<?= base_url('assets/js/jquery-1.11.3.min.js') ?>"></script>
<script type="text/javascript">
        $("#upload").submit(function(){

            var mydata = new FormData(this);
            var form = $(this);
            $.ajax({
                type: "POST",
                url: form.attr("action"),
                data: mydata,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend : function(){
                    $("#send-btn").addClass("disabled").html("<i class='fa fa-spinner fa-spin'></i>  Send...");
                    form.find(".show_error").slideUp().html("");

                },
                    success: function(response, textStatus, xhr) {
                    var str = response;

                    if (str=="oke"){
                        document.getElementById('upload').reset();
                        $("#send-btn").removeClass("disabled").html("Sign in");
                      
                          location.href = '<?= base_url("/") ?>';
                        
                    }else{
                         $("#send-btn").removeClass("disabled").html("Sign in");
                        form.find(".show_error").hide().html(response).slideDown("fast");
                       
                        
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
            
                }
            });
            return false;
            });
    </script>

</body>
</html>
