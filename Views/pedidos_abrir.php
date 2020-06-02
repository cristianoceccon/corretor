 <!-- tab-content START-->
            <div class="tab-content">

                <!--Detalhes do pedido START-->
                <div class="tab-pane active" id="detalhes_pedido">
                    <section class="invoice" style="margin:0px;">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h1 class="page-header">
                                    Daashi Sushi
                                <small class="pull-right">Rua José Bonifácio, 375, Centro. MH</small>
                            </h2>
                            </div>
                            <!-- /.col -->
                        
                            <div class="col-xs-12">
                                    <strong>Cliente: </strong><?php echo $info['user']['nome']?><br>
                                    <?php echo $info['user']['endereco'].', '.$info['user']['numero_end'].', '.$info['user']['complemento']?><br>
                                    <?php echo $info['user']['bairro'].', '.$info['user']['cidade'].', '.$info['user']['cep']?><br>
                                    <strong>Telefone: </strong><?php echo $info['user']['telefone_celular_1']?><br><br>
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-12">
                                <b>Venda Nº</b> <?php echo $info['id']?> </b>
                                <br>
                                <b>Data: </b><?php echo date("d/m/Y", strtotime($info['criado_em'])); ?>
                                <br>
                                <td><b>Forma de Pagamento: </b>
                                <?php 
                                        if($info['forma_pagamento_id'] === '1'){
                                            echo "Á prazo";
                                        }
                                            if($info['forma_pagamento_id'] === '2'){
                                                echo "Á vista";
                                          } 
                                    ?>
                                    
                                    <br>
                          <td><b>Tipo de Pagamento: </b>
                                <?php 
                                        if($info['tipo_pagamento_id'] === '1'){
                                            echo "Dinheiro";
                                        }
                                            if($info['tipo_pagamento_id'] === '3'){
                                                echo "Cartão";
                                        }
									?>
                    
                                <br>
                                <b>Status: </b></b>
                                <?php if($info['id_status_pedido'] === '0'){
                                            echo "Aberto";
                                }elseif($info['id_status_pedido'] === '1'){
                                    echo "Finalizado";
                                }else {
                                        echo "Cancelado";
                                    

                                        }?>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Produto</th>
                                            <th>Qtd</th>
                                            <th>Unit.</th>
                                            <th>ST</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $total = 0;
                                        foreach($info['produtos'] as $item){
                                        $subtotal = $item['valor'] * $item['qtd'];
                                        $total += $subtotal;
                                    ?>
                                        <tr>
                                            <td><?=$item['nome_produto']?></td>
                                            <td><?=$item['qtd']?></td>
                                            <td><?=number_format($item['valor'], '2', ',', '.')?></td>
                                            <td><?=number_format($subtotal, '2', ',', '.')?></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                            <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>&nbsp;&nbsp; Valor Total: R$ <?=number_format($total, '2', ',', '.')?></th>
                                            </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a onClick="window.print()" class="btn btn-default"><i class="fa fa-print"></i> Impressão</a>    
                            </div>
                        </div>
                    </section>
                </div>
                <!--Detalhes do pedido END-->


                <!--Histórico START-->
                <div class="tab-pane" id="historico">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Histórico da Venda</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>Data</th>
                                        <th>Status</th>
                                    </tr>
                                                                        <tr>
                                        <td>07/04/2020</td>
                                        <td>
                                        
                                            <span class="label label-primary"><i class="fa fa-fw fa-thumbs-o-up"></i>Pedido entregue                                            </span>
                                        </td>
                                    </tr>
                                                                        <tr>
                                        <td>07/04/2020</td>
                                        <td>
                                        
                                            <span class="label label-success"><i class="fa fa-fw fa-thumbs-o-up"></i>Pagamento aprovado                                            </span>
                                        </td>
                                    </tr>
                                                                        <tr>
                                        <td>07/04/2020</td>
                                        <td>
                                        
                                            <span class="label label-warning"><i class="fa fa-fw fa-usd"></i>Aguardando pagamento                                            </span>
                                        </td>
                                    </tr>
                                                                    </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!--end box-->               
                </div>
                <!--Histórico END-->


                                    <!--Alterações START-->
                    <div class="tab-pane " id="alteracoes">

                        <!--AÇÕES COM O PEDIDO START-->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Ações com a Venda</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">                                                  
                                    
                                </div>
                            </div>
                        </div>
                        <!--AÇÕES COM O PEDIDO END-->
                    
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Alterar status da venda</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                                                    <div class="form-group">
                                        <label>Status da Venda</label>
                                        <select name="status" class="form-control" >
                                         <option value="3" >Pagamento aprovado</option><option value="100" >Em produção</option><option value="101" >Pronto para entrega</option><option value="102" >Pedido enviado</option><option value="103" selected>Pedido entregue</option>                                            
                                        </select>
                                    </div>
                                    <!--end form-group-->
                            </div>
                            <!--end box-body-->
                        </div>
                        <!--end box-->
                        
                                                    
                    </div>
                    <!--Alterações END-->

                            </div>
            <!-- tab-content END-->
        </div>
        <!--nav-tabs-custom END-->

    </section>
    <!-- Main content END-->
</form>

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