<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Categoria
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."categories/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Nova Categoria</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':'';?>">
                        <label for="group_name">Nome da Categoria</label>
                        <input type="text" name="name" class="form-control" id="group_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('name', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>
                    <div class="form-group">
                    <label for="group_name">Categoria pai</label>
                    <select name="sub_cat" class="form-control">
                        <option value="">Nenhuma</option>
                        <?php 
                            $this->loadView('categorys_add_items', array(
                                'list' => $list,
                                'level' => 0
                            ));
                        ?>
                    </select>
                    </div>
        	    </div>
            </div>	
        </form>
    </section>
