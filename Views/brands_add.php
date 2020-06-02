<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Marcas
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."brands/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Nova marca</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('brand', $errorItems))?'has-error':'';?>">
                        <label for="brand_name">Nome da marca</label>
                        <input type="text" name="brand" class="form-control" id="brand_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('brand', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>
        	    </div>
            </div>	
        </form>
    </section>
