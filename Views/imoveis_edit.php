<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Editar Imóveis  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form method="POST" action="<?php echo BASE_URL; ?>imoveis/edit_action/<?php echo $info['id']; ?>">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Editar Imóveis</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar" onclick="return confirm('Tem certeza que deseja salvar?')">
        		    </div>
        	    </div>
        	    <div class="box-body">


                <div class="form-group <?php echo (in_array('id_cliente', $errorItems))?'has-error':'';?>">
                        <label for="form_id_cliente">Informe o Cliente</label>
                            <select required name="id_cliente" class="form-control select2" id="id_cliente_name">
                                <?php foreach($cliente_list as $item): ?>
                                    <option <?php echo ($item['id']==$info['id_cliente'])?'
                                        selected':''; ?> value="<?php echo $item['id']; ?>
                                        "><?php echo $item['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('imoveis', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>

        		    <div class="form-group <?php echo (in_array('matricula', $errorItems))?'has-error':'';?>">
                        <label for="matricula_name">Matricula</label>
                        <input type="text" name="matricula" value="<?php echo $info['matricula']; ?>" class="form-control" id="matricula_name">
                    </div>

                    <div class="form-group <?php echo (in_array('id_categoria', $errorItems))?'has-error':'';?>">
                        <label for="form_id_categoria">Informe a Categoria</label>
                            <select required name="id_categoria" class="form-control select2" id="id_categoria_name">
                                <?php foreach($categoria_list as $item): ?>
                                    <option <?php echo ($item['id']==$info['id_categoria'])?'
                                        selected':''; ?> value="<?php echo $item['id']; ?>
                                        "><?php echo $item['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('imoveis', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>

        		    <div class="form-group <?php echo (in_array('descricao', $errorItems))?'has-error':'';?>">
                        <label for="descricao_name">Descrição</label>
                        <input type="text" name="descricao" value="<?php echo $info['descricao']; ?>" class="form-control" id="descricao_name">
                    </div>

                    <div class="form-group <?php echo (in_array('exclusividade', $errorItems))?'has-error':'';?>">
                        <label for="exclusividade_name">Exclusividade(Com ou Sem)</label>
                        <input type="text" name="exclusividade" value="<?php echo $info['exclusividade']; ?>" class="form-control" id="exclusividade_name">
                    </div>

                    <div class="form-group <?php echo (in_array('valor', $errorItems))?'has-error':'';?>">
                        <label for="valor_name">Valor</label>
                        <input type="text" name="valor" value="<?php echo $info['valor']; ?>" class="form-control" id="valor_name">
                    </div>

                    <div class="form-group <?php echo (in_array('porcentagem', $errorItems))?'has-error':'';?>">
                        <label for="porcentagem_name">Porcentagem</label>
                        <input type="text" name="porcentagem" value="<?php echo $info['porcentagem']; ?>" class="form-control" id="porcentagem_name">
                    </div>

                    <div class="form-group <?php echo (in_array('data_inicial', $errorItems))?'has-error':'';?>">
                        <label for="data_inicial_name">Data Inicial</label>
                        <input type="date" name="data_inicial" value="<?php echo $info['data_inicial']; ?>" class="form-control" id="data_inicial_name">
                    </div>

                    <div class="form-group <?php echo (in_array('data_final', $errorItems))?'has-error':'';?>">
                        <label for="data_final_name">Data Final</label>
                        <input type="date" name="data_final" value="<?php echo $info['data_final']; ?>" class="form-control" id="data_final_name">
                    </div>

            </div>	
        </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

    </section>

    <script type="text/javascript" src="<?=BASE_URL?>assets/js/pedidos.js"></script>
<script type="text/javascript">
    $(function(){
        $('.select2').select2()
    });
</script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

