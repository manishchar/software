<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=base_url('resources/bootstrap/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('resources/dist/css/AdminLTE.min.css')?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url('resources/plugins/iCheck/square/blue.css')?>">

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
    <a href="#"><b>Data</b>Entry</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
<div class="error">
                     <p><span style="color:blue;"><?=$this->session->flashdata('message')?></span></p>
                                        
                     
                 </div>
    <form action="<?=base_url('login/login')?>" method="post" id="main">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="adminEmail" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="adminPassword">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <form  id="forgot" class="hide">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="user_email" id="user_email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="row">
        
        <div class="col-xs-4">
          <button type="button" class="btn btn-primary btn-block btn-flat" onclick="sendMail()">Send Mail</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->
    <a href="#" onclick="loginWindow()" id="loginChange" style="display: none;">Login</a>
    <a href="#" onclick="forgot()" id="changeName">Forgot Password</a><br>
    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?=base_url('resources/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=base_url('resources/bootstrap/js/bootstrap.min.js')?>"></script>
<!-- iCheck -->
<script src="<?=base_url('resources/plugins/iCheck/icheck.min.js')?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  var forgot = function()
  {
    $("#main").hide();
    $("#forgot").removeClass('hide');
    $("#changeName").hide();
    $("#loginChange").show();
  }
  var loginWindow=function()
  {
    $("#main").show();
    $("#forgot").addClass('hide');
    $("#changeName").show();
    $("#loginChange").hide();
  }

var sendMail=function()
{
  
  //alert("Your password Reset Link sent on your Mail");
  $.ajax({
       type: 'POST',
       url: "<?php echo base_url('login/forgotPassword')?>",
       data: {user_email:$("#user_email").val()},
       success: function(jsonData)
       {
         var obj= jQuery.parseJSON(jsonData);
        if(obj.result=="1")
        {
            alert(obj.message);
        }
        else
        {
          alert(obj.message);
        }
      
       },
       error:function(jqXHR, textStatus, errorThrown){
         //loaderStop();
         // when some error occurred

       }
     }); // ajax end
}

</script>
</body>
</html>
