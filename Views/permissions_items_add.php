<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permissões
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."permissions/add_item_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Adicionar Item de Permissão</h3>
        		    <div class="box-tools">
                       <input type="button" align="right" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':'';?>">
                        <label for="item_name">Nome do Item</label>
                        <input type="text" name="item_name" class="form-control" id="item_name" required>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('name', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>      
                    <div class="form-group">    
                        <label>Grupo de Items</label>
                        <select name="id_items_group" class="form-control" required>
                            <option value="">Selecione um grupo</option>
                            <?php foreach($items_group as $item){?>
                                <option value="<?php echo $item['id'];?>"><?php echo $item['name'];?></option>
                            <?php }?>
                        </select>
                    </div>
        	    </div>
            </div>	
        </form>
    </section>
