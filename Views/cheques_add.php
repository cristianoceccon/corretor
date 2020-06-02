<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cheques  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."cheques/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
                    <h3 class="box-title">Novo Cheque</h3>                  
        		    <div class="box-tools">
                    <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Salvar">
                    </div>
                <br>
            </br>   

            <div class="form-group <?php echo (in_array('data_emissao', $errorItems))?'has-error':'';?>">
                        <label for="data_emissao_name">Emissão</label>
                        <input type="date" name="data_emissao" class="form-control" id="data_emissao_name" required>
                    </div>

        		    <div class="form-group <?php echo (in_array('banco_conta', $errorItems))?'has-error':'';?>">
                        <label for="c_conta">Banco</label>
                        <select name="id_conta_banco" id="c_conta" class="form-control">
                        <option selected disabled> Selecione o Banco </option>
                            <?php foreach($con_list as $item){ ?>
                                <option value="<?php echo $item['id']; ?>"><?php echo $item['banco']; ?></option>  
                                <?php }?>    
                        </select>
                    </div>

                    <div class="form-group <?php echo (in_array('numero_conta', $errorItems))?'has-error':'';?>">
                        <label for="n_numero">Conta</label>
                        <select name="id_conta_numero" id="n_numero" class="form-control" required>
                        <option selected disabled> Selecione a Conta </option>
                            <?php foreach($con_list as $item){ ?>
                                <option value="<?php echo $item['id']; ?>"><?php echo $item['numero']; ?></option>  
                                <?php }?>    
                        </select>
                    </div>

                    <div class="form-group <?php echo (in_array('numero', $errorItems))?'has-error':'';?>">
                        <label for="numero_name">Número do Cheque</label>
                        <input type="text" name="numero" class="form-control" id="numero_name" required>
                    </div>
                              
        		    <div class="form-group <?php echo (in_array('valor', $errorItems))?'has-error':'';?>">
                        <label for="valor_name">Valor</label>
                        <input type="text" name="valor" class="form-control" id="valor_name" required>
                    </div>

        		    <div class="form-group <?php echo (in_array('nome_fornecedor', $errorItems))?'has-error':'';?>">
                        <label for="f_fornecedor">Emissor</label>
                        <select name="id_fornecedor" id="f_fornecedor" class="form-control">
                        <option selected disabled> Selecione o Emitente</option>
                            <?php foreach($for_list as $item){ ?>
                                <option value="<?php echo $item['id']; ?>"><?php echo $item['razaosocial']; ?></option>  
                                <?php }?>    
                        </select>
                    </div>

                    <div class="form-group <?php echo (in_array('data_vencimento', $errorItems))?'has-error':'';?>">
                        <label for="data_vencimento_name">Data de Vencimento</label>
                        <input type="date" name="data_vencimento" class="form-control" id="data_vencimento_name" required>
                    </div>

                    <div class="form-group <?php echo (in_array('historico', $errorItems))?'has-error':'';?>">
                        <label for="historico_name">Informação Complementar</label>
                        <input type="text" name="historico" class="form-control" id="historico_name">
                    </div>


               </div>	
        </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

    </section>
