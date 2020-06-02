<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Produtos  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."produtos/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
                    <h3 class="box-title">Novo Produto</h3>                  
        		    <div class="box-tools">
                    <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Salvar" onclick="return confirm('Tem certeza que deseja salvar?')" >
                    </div>
                <br>
            </br>

          
        		    <div class="form-group <?php echo (in_array('nome', $errorItems))?'has-error':'';?>">
                        <label for="nome_name">Nome</label>
                        <input type="text" name="nome" class="form-control" id="nome_name" required>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('produtos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('descricao', $errorItems))?'has-error':'';?>">
                        <label for="descricao_name">Descrição</label>
                        <input type="text" name="descricao" class="form-control" id="descricao_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('produtos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>
               
                    <div class="form-group <?php echo (in_array('id_categoria', $errorItems))?'has-error':'';?>">
                        <label for="form_id_categoria">Informe a Categoria</label>
                            <select required name="id_categoria" class="form-control select2" id="id_categoria_name">
                                <option value=""></option>
                                <?php foreach($categoria_list as $item){?>
                                    <option value="<?php echo $item['id'];?>"><?php echo $item['nome']?></option>
                                <?php }?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('produtos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
               
                 
        		    <div class="form-group <?php echo (in_array('custo', $errorItems))?'has-error':'';?>">
                        <label for="custo_name">Preço de Custo</label>
                        <input type="text" name="custo" class="form-control" id="custo_name" required>
                    </div>

                  
        		    <div class="form-group <?php echo (in_array('venda', $errorItems))?'has-error':'';?>">
                        <label for="venda_name">Venda</label>
                        <input type="text" name="venda" class="form-control" id="venda_name" required>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('produtos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

               </div>	
        </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

    </section>
