<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
     Cheques  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form method="POST" action="<?php echo BASE_URL; ?>cheques/edit_action/<?php echo $info['id']; ?>">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Editar Cheques</h3>
        		    <div class="box-tools">
                       <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">

                <div class="form-group <?php echo (in_array('data_emissao', $errorItems))?'has-error':'';?>">
                        <label for="data_emissao_name">Emissão</label>
                        <input type="date" name="data_emissao" value="<?php echo $info['data_emissao']; ?>" class="form-control" id="data_emissao_name">
                    </div>

                <div class="form-group <?php echo (in_array('id_conta_banco', $errorItems))?'has-error':'';?>">
                        <label for="form_id_conta_banco">Banco</label>
                            <select name="id_conta_banco" class="form-control select2" id="id_conta_banco_name">
                                <?php foreach($con_list as $item): ?>
                                    <option <?php echo ($item['id']==$info['id_conta_banco'])?'
                                        selected="selected"':''; ?> value="<?php echo $item['id']; ?>
                                        "><?php echo $item['banco']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('produtos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>

                        <div class="form-group <?php echo (in_array('id_conta_numero', $errorItems))?'has-error':'';?>">
                        <label for="form_id_conta_numero">Conta</label>
                            <select name="id_conta_numero" class="form-control select2" id="id_conta_numero_name">
                                <?php foreach($con_list as $item): ?>
                                        <option <?php echo ($item['id']==$info['id_conta_numero'])?'
                                        selected="selected"':''; ?> value="<?php echo $item['id']; ?>
                                        "><?php echo $item['numero']; ?></option>        
                                <?php endforeach; ?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('produtos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
               

        		    <div class="form-group <?php echo (in_array('numero', $errorItems))?'has-error':'';?>">
                        <label for="numero_name">Número</label>
                        <input type="text" name="numero" value="<?php echo $info['numero']; ?>" class="form-control" id="numero_name">
                    </div>

        		    <div class="form-group <?php echo (in_array('valor', $errorItems))?'has-error':'';?>">
                        <label for="valor_name">Valor</label>
                        <input type="text" name="valor" value="<?php echo $info['valor']; ?>"  class="form-control" id="valor_name">
                    </div>

                    <div class="form-group <?php echo (in_array('id_fornecedor', $errorItems))?'has-error':'';?>">
                        <label for="form_id_fornecedor">Emissor</label>
                            <select name="id_fornecedor" class="form-control select2" id="id_fornecedor_name">
                                <?php foreach($for_list as $item): ?>
                                    <option <?php echo ($item['id']==$info['id_fornecedor'])?'
                                        selected="selected"':''; ?> value="<?php echo $item['id']; ?>
                                        "><?php echo $item['razaosocial']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('produtos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>

                    <div class="form-group <?php echo (in_array('data_vencimento', $errorItems))?'has-error':'';?>">
                        <label for="data_vencimento_name">Data de Vencimento</label>
                        <input type="date" name="data_vencimento" value="<?php echo $info['data_vencimento']; ?>" class="form-control" id="data_vencimento_name">
                    </div>

                    <div class="form-group <?php echo (in_array('historico', $errorItems))?'has-error':'';?>">
                        <label for="historico_name">Histórico</label>
                        <input type="text" name="historico" value="<?php echo $info['historico']; ?>" class="form-control" id="historico_name">
                    </div>
            </div>	
        </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

    </section>
