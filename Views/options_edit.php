<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Opções do produto
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."options/edit_action/".$info['id']?>" method="POST">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Editar opção do produto</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('brand', $errorItems))?'has-error':'';?>">
                        <label for="option_name">Nome da marca</label>
                        <input type="text" name="name" class="form-control" id="option_name" value="<?php echo $info['name'];?>">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('brand', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>
        	    </div>
            </div>	
        </form>
    </section>
