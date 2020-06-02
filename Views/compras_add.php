<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Compras  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Nova Compra</h3>    
            <div class=text-right>  
                <input type="button" align="right" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
                </div>
                <div class="col-sm-2">  
                   <button type="button" class="btn btn-block btn-info disabled">0001</button>         
                </div>

            <div class="box-body">
          
            <form action="<?php echo BASE_URL."compras/add_action"?>" method="POST">
            </div>
              <!-- Date 
              <div class="col-sm-4">
                <label>Data:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input id="date" type="date">                
                </div>
       
              </div>
              <br></br><br>
  
-->

            <!-- Informar Cliente -->
              <div class="col-sm-4">
                        <div class="form-group <?php echo (in_array('fornecedor', $errorItems))?'has-error':'';?>">
                        <label for="form_fornecedores">Informe o Fornecedor</label>
                            <select name="fornecedor" class="form-control select2" id="fornecedor_name">
                                <option value=""></option>
                                <?php foreach($fornecedor_list as $item){?>
                                    <option value="<?php echo $item['id'].';'.$item['nome'];?>"><?php echo $item['nome']?></option>
                                <?php }?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('fornecedores', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
                    </div>
                    <br></br>
                    <br></br>
                                     
            <!-- Informar Produto -->
                    <div class="col-sm-4">
                        <div class="form-group <?php echo (in_array('produto', $errorItems))?'has-error':'';?>">
                        <label for="form_produtos">Escolha um Produto</label>
                            <select name="produto" class="form-control select2" id="produto_name" onchange="selectProduct(this.value)">
                                <option value=""></option>
                                <?php foreach($produto_list as $item){?>
                                    <option value="<?php echo $item['id'].';'.$item['nome'];?>"><?php echo $item['nome']?></option>
                                <?php }?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('compras', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
                    </div>

            <!-- Informar Quantidade -->
                    <div class="col-sm-2">
                        <div class="form-group <?php echo (in_array('quantidade', $errorItems))?'has-error':'';?>">
                            <label for="quantidade_name">Quantidade</label>
                            <input type="number" name="quantidade" value="1" class="form-control" id="quantidade_name" onchange="updateQtd(this.value);">
                            <span class="help-block" id="indisponivel" <?php echo (in_array('compras', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
                    </div>

            <!-- Informar Valor Unitário -->        
                    <div class="col-sm-2">
                        <div class="form-group <?php echo (in_array('valorunit', $errorItems))?'has-error':'';?>">
                            <label for="valorunit_name">Valor Unitário</label>
                            <input type="text" name="valorunit" class="form-control" id="valorunit_name" onchange="updateValor(this.value);">
                        </div>
                    </div>

            <!-- Informar Valor Total -->
                    <div class="col-sm-2">
                        <div class="form-group <?php echo (in_array('subtotal', $errorItems))?'has-error':'';?>">
                            <label for="subtotal_name">Valor Total</label> 
                            <input type="text" name="subtotal" class="form-control" id="subtotal_name" disabled>
                        </div>
                    </div>

            <!-- Adicionar as Compras -->       
                   
                    <div class="col-sm-2"> 
                    <br>
                        <button type="button" class="btn btn-block btn-success" onclick="adicionaAoPedido();">Adicionar</button>
                    </div>
                </form>
            </div>	
        </div>
         
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de produtos adicionados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Valor Unitário</th>
                            <th>Sub Total</th>
                            <th>Ação</th>
                        </tr>
                    </thead>  
                    
                    <tbody id="produtos-pedido">              
                    </tbody>
                 <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <td>Total da Compra</td>
                            <td id="total-pedido"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        <!-- Plano de Contas -->
            <div class="col-sm-4">
                        <div class="form-group <?php echo (in_array('planodeconta', $errorItems))?'has-error':'';?>">
                        <label for="form_planodecontas">Plano de Contas</label>
                            <select name="planodeconta" class="form-control select2" id="planodeconta_name">
                                <option value=""></option>
                                <?php foreach($planodeconta_list as $item){?>
                                    <option value="<?php echo $item['id'].';'.$item['nome'];?>"><?php echo $item['nome']?></option>
                                <?php }?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('compras', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
                     </div>

        <!-- Informar Forma de Pagamento -->
        <div class="col-sm-3">
                        <div class="form-group <?php echo (in_array('cliente', $errorItems))?'has-error':'';?>">
                        <label for="form_clientes">Forma de Pagamento</label>
                            <select name="forma_pagamento" class="form-control" id="forma_pagamento" onchange="tiposPagamentos(this.value);">
                                <option value="">Selecione uma forma de pagamento</option>
                                <?php foreach($formas_pagamentos as $item){?>
                                    <option value="<?php echo $item['id'];?>"><?php echo $item['nome']?></option>
                                <?php }?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('pedidos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
                     </div>

        <!-- Informar Meio de Pagamento -->
        <div class="col-sm-3">
                        <div class="form-group <?php echo (in_array('cliente', $errorItems))?'has-error':'';?>">
                            <label for="form_clientes">Meio de Pagamento</label>
                            <div id="tipos_pagamentos">
                                <select name="tipo_pagamento" class="form-control" id="tipo_pagamento">
                                    <option value="" selected disabled>Selecione o tipo de pagamento</option>
                                </select>
                            </div>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('pedidos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
                     </div>
                    <br/>
                    <br/>
                <br/>

        <!-- Financeiro -->

                <div class="col-sm-3">
                <div class="form-group <?php echo (in_array('valorunit', $errorItems))?'has-error':'';?>">
                            <label for="valorunit_name">Valor Entrada</label>
                            <input type="text" name="valorunit" class="form-control" id="valorunit_name" onchange="updateValor(this.value);">
                        </div>
                     </div>

                     <div class="col-sm-2">
                     <div class="form-group <?php echo (in_array('quantidade', $errorItems))?'has-error':'';?>">
                            <label for="quantidade_name">Qtd Parcelas</label>
                            <input type="number" name="quantidade" value="1" class="form-control" id="quantidade_name" onchange="updateQtd(this.value);">
                            <span class="help-block" id="indisponivel" <?php echo (in_array('compras', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
                     </div>


                     <div class="col-sm-3">
                        <div class="form-group <?php echo (in_array('subtotal', $errorItems))?'has-error':'';?>">
                            <label for="subtotal_name">Valor Total</label> 
                            <input type="text" name="subtotal" class="form-control" id="subtotal_name" disabled>
                        </div>
                        </div>

                     <div class="col-sm-3">
                    <label>Data de Vencimento:</label>
                    <div class="input-group date">
                     <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input id="date" type="date">                
                </div>
              </div>
            <br/>
                <br/>
                     <br/>


            <div class="box-footer clearfix">
                <a href="javascript:;" onclick="finalizarPedido();" class="btn btn-primary pull-right">Finalizar</a>
            </div>
        </div>
        <!-- /.box -->
        
</section>
<script type="text/javascript" src="<?=BASE_URL?>assets/js/pedidos.js"></script>
<script type="text/javascript">
    $(function(){
        $('.select2').select2()
    });
</script>

