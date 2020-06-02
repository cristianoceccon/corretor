<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Editar Produtos  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form method="POST" action="<?php echo BASE_URL; ?>produtos/edit_action/<?php echo $info['id']; ?>">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Editar Produtos</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar" onclick="return confirm('Tem certeza que deseja salvar?')">
        		    </div>
        	    </div>
        	    <div class="box-body">

        		    <div class="form-group <?php echo (in_array('nome', $errorItems))?'has-error':'';?>">
                        <label for="nome_name">Pessoa</label>
                        <input type="text" name="nome" value="<?php echo $info['nome']; ?>"  class="form-control" id="nome_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('produtos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

        		    <div class="form-group <?php echo (in_array('descricao', $errorItems))?'has-error':'';?>">
                        <label for="descricao_name">Descrição</label>
                        <input type="text" name="descricao" value="<?php echo $info['descricao']; ?>"  class="form-control" id="descricao_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('produtos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
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
                            <span class="help-block" id="indisponivel" <?php echo (in_array('produtos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
               
                   

        		    <div class="form-group <?php echo (in_array('custo', $errorItems))?'has-error':'';?>">
                        <label for="custo_name">Preço de Custo</label>
                        <input type="text" name="custo" value="<?php echo $info['custo']; ?>" class="form-control" id="custo_name">
                    </div>

        		    <div class="form-group <?php echo (in_array('venda', $errorItems))?'has-error':'';?>">
                        <label for="venda_name">Preço de Venda</label>
                        <input type="text" name="venda" value="<?php echo $info['venda']; ?>"  class="form-control" id="venda_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('produtos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('estoque', $errorItems))?'has-error':'';?>">
                        <label for="estoque_name">Estoque</label>
                        <input type="text" name="estoque" readonly value="<?php echo $info['estoque']; ?>" class="form-control" id="estoque_name">
                    </div>
            </div>	
        </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

    </section>
