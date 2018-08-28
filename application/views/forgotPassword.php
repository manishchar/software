<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
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
  <script>
    
  </script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Reset</b>Paasword</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset Your Password</p>
<div class="error">
                     <p><span style="color:blue;"><?=$this->session->flashdata('message')?></span></p>
                                        
                     
                 </div>
    <form  id="main">
        <?php $result=CheckForgotUrl($_REQUEST['ForgotPasswordKey']); if($result){ ?>
      <div class="form-group has-feedback">
        <input type="hidden" id="ForgotPasswordKeys" name="ForgotPasswordKey" value="<?=$_REQUEST['ForgotPasswordKey']?>">
        <input type="password" class="form-control" placeholder="New Password" id="user_password" name="user_password" required="">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Confirm Password" id="cnf_password" name="cnf_password">
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
          <button type="button" class="btn btn-primary btn-block btn-flat" onclick="confirmPassword()">Reset</button>
        </div>
        <!-- /.col -->
      </div>
      <? }  else { ?>

          <h2><span style="text-align: center;color: red">Invalid Url</span></h2>
      <?php }?>


    </form>

    

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->
    
    

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
  // $(function () {
   
  //   }
    
    
    
  // });
  var confirmPassword=function(){
    //alert("ffff");
      if($('#user_password').val()=="")
      {
        $("#user_password").addAttr('required','true');
        return false;
      }
      if($('#cnf_password').val()=="")
      {
        $("#cnf_password").addAttr('required','true');
        return false;
      }
      if($('#cnf_password').val()!=$('#user_password').val())
      {
          // $("#p1,#p2").addClass('has-error');
          alert("New Password/Confirm Password Missmatched");
          return false;
      }
      else
      {
        $.ajax({
       type: 'POST',
       url: "<?php echo base_url('login/resetPasssword')?>",
       data: {ForgotPasswordKeys:$("#ForgotPasswordKeys").val(),user_password:$("#user_password").val()},
       dataType: 'text',
       success: function(jsonData)
       {
        //alert(jsonData);
        if(jsonData==1)
        {
          alert("Your Password Sucessfully Reset ! Please Login");
       window.location='<?=base_url()?>';
        }
       else
       {
        alert("You Enterd Old Password Or Invalid Email");
       }
      
       },
       error:function(jqXHR, textStatus, errorThrown){
         //loaderStop();
         // when some error occurred

       }
     }); // ajax end
       
      }

      

    }
//   var forgot = function()
//   {
//     $("#main").hide();
//     $("#forgot").removeClass('hide');
//     $("#changeName").hide();
//     $("#loginChange").show();
//   }
//   var loginWindow=function()
//   {
//     $("#main").show();
//     $("#forgot").addClass('hide');
//     $("#changeName").show();
//     $("#loginChange").hide();
//   }

// var sendMail=function()
// {
//   // <?=base_url('login/forgotPassword')?>
//   alert("Your password Reset Link sent on your Mail");
// }

</script>
</body>
</html>
