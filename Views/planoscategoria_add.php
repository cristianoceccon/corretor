<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Planos Categoria  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."planoscategoria/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
                    <h3 class="box-title">Novo Plano Categoria</h3>                  
        		    <div class="box-tools">
                    <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Salvar">
                    </div>
                <br>
            </br>

          
        		    <div class="form-group <?php echo (in_array('nome', $errorItems))?'has-error':'';?>">
                        <label for="nome_name">Nome</label>
                        <input type="text" name="nome" class="form-control" id="nome_name" required>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('planoscategoria', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

               </div>	
        </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

    </section>
