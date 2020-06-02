<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>&nbsp;</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/template.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/dist/css/skins/_all-skins.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/adminlte/bower_components/select2/dist/css/select2.min.css">
  <!-- jQuery 3 -->
  <script src="<?php echo BASE_URL; ?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript">var BASE_URL = '<?php echo BASE_URL; ?>';</script>
  <script type="text/javascript">window.BASE_URL = '<?php echo BASE_URL;?>';</script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo BASE_URL; ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PAB</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Volmir Corretor</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications Menu -->
    
          <!-- Tasks Menu -->
          
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?php echo BASE_URL;?>account" >Conta</a>
          </li>
          <li>
            <a href="<?php echo BASE_URL; ?>login/logout" >
               Sair
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="info">
          <p style="white-space: initial;">
            Usuário: 
            <span style="font-weight: 100;"><?php echo $viewData['user']->getUserName();?></span>
          </p>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="<?php echo ($viewData['menuActive']=='dashboard')?'active':'';?>">
          <a href="<?php echo BASE_URL?>"><i class="fa fa-link"></i> <span>Dashboard</span></a>
        </li>

<!-- MENU MINHA EMPRESA -->
        
<li class="disable treeview">
          <a href="#">
            <i class="glyphicon glyphicon-usd"></i> <span>Minha Empresa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

          <?php if($viewData['user']->hasPermission('ver_empresa')){?>
        <li class="<?php echo ($viewData['menuActive']=='empresa')?'active':'';?>"><a href="<?php echo BASE_URL."empresa"?>"><i class="glyphicon glyphicon-briefcase"></i> <span>Gerenciar</span></a></li>
        <?php }?>

        <?php if($viewData['user']->hasPermission('ver_usuarios')){?>
        <li class="<?php echo ($viewData['menuActive']=='usuarios')?'active':'';?>"><a href="<?php echo BASE_URL."users";?>"><i class="glyphicon glyphicon-cog"></i> <span>Usuários</span></a></li>
        <?php }?>
<!--
        <?php if($viewData['user']->hasPermission('ver_permissoes')){?>
        <li class="<?php echo ($viewData['menuActive']=='permissions')?'active':'';?>"><a href="<?php echo BASE_URL."permissions";?>"><i class="glyphicon glyphicon-lock"></i> <span>Permissões</span></a></li>
        <?php }?>
        -->

          </ul>
        </li>

<!-- MENU CADASTROS -->

        <li class="disable treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i> <span>Cadastro</span>
            <span class="fa fa-angle-left pull-right">
              <i class=""></i>
            </span>
          </a>
          <ul class="treeview-menu">

        <?php if($viewData['user']->hasPermission('ver_clientes')){?>
        <li class="<?php echo ($viewData['menuActive']=='clientes')?'active':'';?>"><a href="<?php echo BASE_URL."clientes"?>"><i class="glyphicon glyphicon-user"></i> <span>Clientes</span></a></li>
        <?php }?>

        <?php if($viewData['user']->hasPermission('ver_produtos')){?>
        <li class="<?php echo ($viewData['menuActive']=='produtos')?'active':'';?>"><a href="<?php echo BASE_URL."imoveis/add"?>"><i class="glyphicon glyphicon-th-large"></i> <span>Imóveis</span></a></li>
        <?php }?>

<!--
        <?php if($viewData['user']->hasPermission('ver_fornecedores')){?>
        <li class="<?php echo ($viewData['menuActive']=='fornecedores')?'active':'';?>"><a href="<?php echo BASE_URL."fornecedores"?>"><i class="glyphicon glyphicon-user"></i> <span>Fornecedores</span></a></li>
        <?php }?>

        <?php if($viewData['user']->hasPermission('ver_funcionarios')){?>
        <li class="<?php echo ($viewData['menuActive']=='funcionarios')?'active':'';?>"><a href="<?php echo BASE_URL."funcionarios"?>"><i class="glyphicon glyphicon-user"></i> <span>Funcionários</span></a></li>
        <?php }?>
-->

          <?php if($viewData['user']->hasPermission('ver_categorias')){?>
        <li class="<?php echo ($viewData['menuActive']=='categorias')?'active':'';?>"><a href="<?php echo BASE_URL."categorias"?>"><i class="glyphicon glyphicon-th-list"></i> <span>Categorias</span></a></li>
        <?php }?>

          </ul>
        </li>


<!-- MENU FATURAMENTO -->
 <!--       
        <li class="disable treeview">
          <a href="#">
            <i class="glyphicon glyphicon-usd"></i> <span>Faturamento</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          -->
          <!--
          <?php if($viewData['user']->hasPermission('ver_compras')){?>
        <li class="<?php echo ($viewData['menuActive']=='compras')?'active':'';?>"><a href="<?php echo BASE_URL."compras"?>"><i class="glyphicon glyphicon-collapse-down"></i> <span>Compras</span></a></li>
        <?php }?>
          -->
          
        <?php if($viewData['user']->hasPermission('ver_pedidos')){?>
        <li class="<?php echo ($viewData['menuActive']=='imoveis')?'active':'';?>"><a href="<?php echo BASE_URL."imoveis"?>"><i class="glyphicon glyphicon-collapse-up"></i> <span>Imóveis</span></a></li>
        <?php }?>
-->
          </ul>
        </li>
        
        <!-- MENU ORDENS -->
   <!--    
        <li class="<?php echo ($viewData['menuActive']=='ordens')?'active':'';?>"><a href="<?php echo BASE_URL."ordens"?>"><i class="glyphicon glyphicon-file"></i> <span>Ordens</span></a></li>
        </li>     
        -->
        <!-- MENU FINANCEIRO -->
  <!--      
          <li class="<?php echo ($viewData['menuActive']=='ver_financeiro')?'active':'';?> treeview">
          <a href="#">
            <i class="glyphicon glyphicon-usd"></i> <span>Financeiro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

        <?php if($viewData['user']->hasPermission('ver_planodecontas')){?>
        <li class="<?php echo ($viewData['menuActive']=='planos')?'active':'';?>"><a href="<?php echo BASE_URL."planos"?>"><i class="glyphicon glyphicon-pencil"></i> <span>Plano de Contas</span></a></li>
        <?php }?>

        <?php if($viewData['user']->hasPermission('ver_planodecontas')){?>
        <li class="<?php echo ($viewData['menuActive']=='planoscategoria')?'active':'';?>"><a href="<?php echo BASE_URL."planoscategoria"?>"><i class="glyphicon glyphicon-pencil"></i> <span>Planos Categoria</span></a></li>
        <?php }?>

        <?php if($viewData['user']->hasPermission('ver_planodecontas')){?>
        <li class="<?php echo ($viewData['menuActive']=='planosgrupoprincipal')?'active':'';?>"><a href="<?php echo BASE_URL."planosgrupoprincipal"?>"><i class="glyphicon glyphicon-pencil"></i> <span>Planos Grupo Principal</span></a></li>
        <?php }?>

        <?php if($viewData['user']->hasPermission('ver_planodecontas')){?>
        <li class="<?php echo ($viewData['menuActive']=='planosgruposecundario')?'active':'';?>"><a href="<?php echo BASE_URL."planosgruposecundario"?>"><i class="glyphicon glyphicon-pencil"></i> <span>Planos Grupo Secundário</span></a></li>
        <?php }?>

          <?php if($viewData['user']->hasPermission('ver_financeiro')){?>
        <li class="<?php echo ($viewData['menuActive']=='cheques')?'active':'';?>"><a href="<?php echo BASE_URL."cheques"?>"><i class="glyphicon glyphicon-collapse-down"></i> <span>Cheques</span></a></li>
        <?php }?>

        <?php if($viewData['user']->hasPermission('ver_financeiro')){?>
        <li class="<?php echo ($viewData['menuActive']=='contas')?'active':'';?>"><a href="<?php echo BASE_URL."contas"?>"><i class="glyphicon glyphicon-collapse-down"></i> <span>Contas</span></a></li>
        <?php }?>

          </ul>
        </li>
-->
<!-- MENU RELATÓRIOS -->
<!--
        <?php if($viewData['user']->hasPermission('ver_relatorios')){?>

        <li class="<?php echo ($viewData['menuActive']=='ver_relatorios')?'active':'';?> treeview">
          <a href="#">
            <i class="fa fa-fw fa-file-pdf-o"></i> <span>Relatórios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">  

            <?php if($viewData['user']->hasPermission('relatorio_pedidos')){?>
              <li class="<?php echo (isset($viewData['subMenuActive']) && $viewData['subMenuActive'] =='reportsPurchases')?'active':'';?>">
                <a href="<?php echo BASE_URL;?>reports/purchases">
                  <i class="fa fa-fw fa-file-pdf-o"></i>Relatório de pedidos
                </a>
              </li>
            <?php }?>

          </ul>


          <ul class="treeview-menu">  

            <?php if($viewData['user']->hasPermission('ver_clientes')){?>
              <li class="<?php echo (isset($viewData['subMenuActive']) && $viewData['subMenuActive'] =='reportsClientes')?'active':'';?>">
                <a href="<?php echo BASE_URL;?>reports/clientes">
                  <i class="fa fa-fw fa-file-pdf-o"></i>Relatório de Clientes
                </a>
              </li>
            <?php }?>
          </ul>
        </li>
-->
<!--    
<?php if($viewData['user']->hasPermission('ver_paginas')){?>
        <li class="<?php echo ($viewData['menuActive']=='fluxo')?'active':'';?>"><a href="<?php echo BASE_URL."fluxo"?>"><i class="glyphicon glyphicon-usd"></i> <span>Fluxo de Caixa</span></a></li>
        <?php }?> 

        <?php if($viewData['user']->hasPermission('ver_produtos')){?>
        <li class="<?php echo ($viewData['menuActive']=='produtos')?'active':'';?>"><a href="<?php echo BASE_URL."products"?>"><i class="fa fa-link"></i> <span>Produtos Antigo</span></a></li>
        <?php }?>
       

            
        <?php if($viewData['user']->hasPermission('ver_kit')){?>
        <li class="<?php echo ($viewData['menuActive']=='kit')?'active':'';?>"><a href="<?php echo BASE_URL."kit"?>"><i class="fa fa-link"></i> <span>Kit</span></a></li>
        <?php }?>
-->  

<!-- 
        <?php if($viewData['user']->hasPermission('ver_slide')){?>
        <li class="<?php echo ($viewData['menuActive']=='slide')?'active':'';?>"><a href="<?php echo BASE_URL."sliders";?>"><i class="fa fa-link"></i> <span>Slides</span></a></li>
        <?php }?>

        <?php if($viewData['user']->hasPermission('ver_paginas')){?>
        <li class="<?php echo ($viewData['menuActive']=='pages')?'active':'';?>"><a href="<?php echo BASE_URL."pages";?>"><i class="fa fa-link"></i> <span>Páginas</span></a></li>
        <?php }?>
        <?php if($viewData['user']->hasPermission('ver_pedidos')){?>
        <li class="<?php echo ($viewData['menuActive']=='purchases')?'active':'';?>"><a href="<?php echo BASE_URL."purchases";?>"><i class="fa fa-link"></i> <span>Pedidos</span></a></li>
        <?php }?>
-->          


        <?php }?>
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
      
      <?php $this->loadViewInTemplate($viewName, $viewData);?>

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
    </div>
    <!-- Default to the left -->
   <!-- <strong>Copyright &copy; <?php echo date("Y");?> <a href="#">Ofertaço Brasil</a>.</strong> Todos os direitos reservados. Software Version: 1.0.0
  </footer>

  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo BASE_URL; ?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo BASE_URL; ?>assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo BASE_URL; ?>assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo BASE_URL;?>assets/js/jquery.mask.min.js"></script>
<script src="<?php echo BASE_URL;?>assets/js/jquery.maskMoney.js"></script>
<script  src="<?php echo BASE_URL;?>assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script  src="<?php echo BASE_URL;?>assets/adminlte/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt.min.js"></script>
<!-- Select2 -->
<script src="<?php echo BASE_URL;?>assets/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>