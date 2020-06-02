 <!-- tab-content START-->
 <div class="tab-content">
<!--Detalhes do pedido START-->
<div class="tab-pane active" id="detalhes_pedido">
    <section class="invoice" style="margin:0px;">
        <div class=text-right>
        <a href="<?php echo BASE_URL.'imoveis/autorizacao/'.$info['id']?>" class="btn btn btn-success">AUTORIZAÇÃO CPF</a>
        <a href="<?php echo BASE_URL.'imoveis/autorizacaocnpj/'.$info['id']?>" class="btn btn btn-primary">AUTORIZAÇÃO CNPJ</a>
        <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
         </div>
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h1 class="page-header">
                <div class=text-center>
                 <b>Volmir Corretor</b>
                 <h5>Creci 027671</h5>
                 <h6>Rua Carolina, 420, Centro - Bom Jesus do Oeste - SC</h6>                  
                 </div> 
            </h4>
            <div class=text-center>
                 <b>Autorização Nº</b> <?php echo $info['id']?> </b>
            </div>         <!-- /.col -->
        
            <div class="col-xs-12">
                    <strong>Cliente: </strong><?php echo $info['user']['nome']?><br>
                    <?php echo $info['user']['endereco'].', '.$info['user']['numero_end'].', '.$info['user']['complemento']?><br>
                    <?php echo $info['user']['bairro'].', '.$info['user']['cidade'].', '.$info['user']['cep']?><br>
                    <strong>Telefone: </strong><?php echo $info['user']['telefone_celular_1']?><br><br>
            </div>
            <!-- /.col -->
            <div class="col-xs-12">
                <b>Data inicial: </b><?php echo date("d/m/Y", strtotime($info['data_inicial'])); ?>
                <br>
                <b>Data final: </b><?php echo date("d/m/Y", strtotime($info['data_final'])); ?>
                <br>
                <b>Matricula Nº</b> <?php echo $info['matricula']?> </b>
                <br>
                <br>
                <b>Descrição</b> <br> <?php echo $info['descricao']?> </b>
                <br>
                <br>
                <b>Valor</b> <br> <?php echo $info['valor']?> </b>
                <br>
                <b>Porcentagem</b> <br> <?php echo $info['porcentagem']?> % </b>
                <br>
            <br>
            </div>
            <!-- /.col -->

         

            </div>

            </div>


<script type="text/javascript">

window.onload = function(){


}

</script>

<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->


<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- Bootstrap 3.3.7 -->
<script src="https://www.arteborda.com.br/painel/assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="https://www.arteborda.com.br/painel/assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- SlimScroll -->
<script src="https://www.arteborda.com.br/painel/assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="https://www.arteborda.com.br/painel/assets/js/jquery.mask.min.js"></script>
<script src="https://www.arteborda.com.br/painel/assets/js/jquery.maskMoney.js"></script>
<script  src="https://www.arteborda.com.br/painel/assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script  src="https://www.arteborda.com.br/painel/assets/adminlte/bower_components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.pt.min.js"></script>
<script src="https://www.arteborda.com.br/painel/assets/js/script.js"></script>
<!-- iCheck 1.0.1 -->
<script src="https://www.arteborda.com.br/painel/assets/adminlte/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript">
//iCheck for checkbox and radio inputs
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
checkboxClass: 'icheckbox_minimal-blue',
radioClass   : 'iradio_minimal-blue'
})
</script>
<script src="https://www.arteborda.com.br/painel/assets/js/user_add.js"></script>
</body>
</html>