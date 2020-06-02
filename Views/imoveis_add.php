<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Imóveis  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."imoveis/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
                    <h3 class="box-title">Novo Imóvel</h3>                  
        		    <div class="box-tools">
                        <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			    <input type="submit" class="btn btn-success" value="Salvar">
                    </div>
                <br>
            </br>
        
                        <div class="form-group <?php echo (in_array('id_cliente', $errorItems))?'has-error':'';?>">
                            <label for="form_clientes">Informe o Cliente</label>
                            <select name="id_cliente" class="form-control select2" id="id_cliente">
                                <option value=""></option>
                                <?php foreach($cliente_list as $item){?>
                                <option value="<?=$item['id']?>"><?php echo $item['nome']?></option>
                                <?php }?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('pedidos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>

                        <div class="form-group <?php echo (in_array('matricula', $errorItems))?'has-error':'';?>">
                            <label for="matricula_name">Nº Matrícula</label>
                            <input type="text" name="matricula" class="form-control" id="matricula_name">
                            <span class="help-block" id="indisponivel" <?php echo (in_array('imoveis', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
                        
               
                        <div class="form-group <?php echo (in_array('id_categoria', $errorItems))?'has-error':'';?>">
                            <label for="form_id_categoria">Informe a Categoria</label>
                                <select required name="id_categoria" class="form-control select2" id="id_categoria_name">
                                    <option value=""></option>
                                    <?php foreach($categoria_list as $item){?>
                                        <option value="<?php echo $item['id'];?>"><?php echo $item['nome']?></option>
                                    <?php }?>
                                </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('imoveis', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>

                        <div class="form-group <?php echo (in_array('descricao', $errorItems))?'has-error':'';?>">
                            <label for="descricao_name">Descrição</label>
                            <textarea class="form-control" name="descricao" id="descricao_name" rows="3"></textarea>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('imoveis', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>

                        <div class="form-group <?php echo (in_array('exclusividade', $errorItems))?'has-error':'';?>">
                            <label for="exclusividade_name">Exclusividade(Com ou Sem)</label>
                            <input type="text" name="exclusividade" class="form-control" id="exclusividade_name">
                            <span class="help-block" id="indisponivel" <?php echo (in_array('imoveis', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
               
                 
                        <div class="form-group <?php echo (in_array('valor', $errorItems))?'has-error':'';?>">
                            <label for="valor_name">Preço de Venda</label>
                            <input type="text" name="valor" class="form-control" id="valor_name" required>
                        </div>

                        <div class="form-group <?php echo (in_array('porcentagem', $errorItems))?'has-error':'';?>">
                            <label for="porcentagem_name">Porcentagem Comissão %</label>
                            <input type="number" name="porcentagem" class="form-control" id="porcentagem_name" required>
                        </div>

                    
                        <div class="form-group <?php echo (in_array('data_inicial', $errorItems))?'has-error':'';?>">
                            <label for="data_inicial_name">Início do Contrato</label>
                            <input type="date" name="data_inicial" class="form-control" id="data_inicial_name" required>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('imoveis', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>

                        <div class="form-group <?php echo (in_array('data_final', $errorItems))?'has-error':'';?>">
                            <label for="data_final_name">Fim do Contrato</label>
                            <input type="date" name="data_final" class="form-control" id="data_final_name" required>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('imoveis', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
                    </div>
                    </div>
                            
                        </div>
        </form>

    </section>
    <script type="text/javascript" src="<?=BASE_URL?>assets/js/pedidos.js"></script>
<script type="text/javascript">
    $(function(){
        $('.select2').select2()
    });
</script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

