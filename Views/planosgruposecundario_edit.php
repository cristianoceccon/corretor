<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Editar Planos Grupo Secundário
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form method="POST" action="<?php echo BASE_URL; ?>planosgruposecundario/edit_action/<?php echo $info['id']; ?>">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Editar Planos Categoria</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">

        		    <div class="form-group <?php echo (in_array('nome', $errorItems))?'has-error':'';?>">
                        <label for="nome_name">Descrição</label>
                        <input type="text" name="nome" value="<?php echo $info['nome']; ?>"  class="form-control" id="nome_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('planosgruposecundario', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>
            </div>	
        </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

    </section>
