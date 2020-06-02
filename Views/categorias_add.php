<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Categorias
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."categorias/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Nova categoria</h3>
        		    <div class="box-tools">
                    <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('categoria', $errorItems))?'has-error':'';?>">
                        <label for="categoria_name">Nome da categoria</label>
                        <input type="text" name="categoria" class="form-control" id="categoria_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('categoria', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>
        	    </div>
            </div>	
        </form>
    </section>
