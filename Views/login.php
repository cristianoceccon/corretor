<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Painel Administrativo - Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo BASE_URL.'login';?>">Painel de Controle</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Faça login no painel administrativo</p>

    <?php if(isset($error['msg']) && !empty($error['msg'])){?>

      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> 
        <p><?php echo $error['msg'];?></p>
      </div>

    <?php }?>

    <form action="<?php echo BASE_URL.'login/index_action';?>" method="POST">
      <div class="form-group has-feedback">
        <input type="text" name="user" class="form-control" placeholder="Email ou CPF">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="pass" class="form-control" placeholder="Senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <a data-toggle="modal" data-target="#esqueci_senha" style="cursor:pointer;">Esqueci minha senha</a>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!--MODAL ESQUECI MINHA SENHA-->
<div class="modal fade in" id="esqueci_senha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="modal_title_address">Esqueci a senha</h4>
            </div>
            <div class="modal-body" style="text-align:center;">
                <form method="POST" class="form-inline"  action="<?php echo BASE_URL;?>login/esqueciSenha">
                    <p>
                      <h5>
                        Digite seu e-mail de cadastro abaixo e clique em enviar.<br>
                        Nós lhe enviaremos um e-mail com link para recadastrar sua senha.
                      </h5>
                    </p>
                    <div class="row margin_senha">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="s_email" class="control-label">E-mail:</label>
                                <input type="email" name="s_email" class="form-control" id="s_email" style="width:350px;" required> 
                            </div>
                        </div>  
                    </div>
                    
                    <div class="modal-footer" style="text-align:center;">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--MODAL ESQUECI MINHA SENHA-->

<!-- jQuery 3 -->
<script src="<?php echo BASE_URL; ?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo BASE_URL; ?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo BASE_URL; ?>assets/adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  <?php if(isset($email['msg']) && !empty($email['msg'])){?>

    window.onload = function (){
      alert('<?php echo $email['msg'];?>');
    }

  <?php }?>

</script>
</body>
</html>
