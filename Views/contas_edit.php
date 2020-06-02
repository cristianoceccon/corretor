<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Editar Contas  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form method="POST" action="<?php echo BASE_URL; ?>contas/edit_action/<?php echo $info['id']; ?>">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Editar Contas</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">

        		    <div class="form-group <?php echo (in_array('banco', $errorItems))?'has-error':'';?>">
                        <label for="banco_name">Banco</label>
                        <input type="text" name="banco" value="<?php echo $info['banco']; ?>"  class="form-control" id="banco_name">
                    </div>

        		    <div class="form-group <?php echo (in_array('agencia', $errorItems))?'has-error':'';?>">
                        <label for="agencia_name">Agência</label>
                        <input type="text" name="agencia" value="<?php echo $info['agencia']; ?>" class="form-control" id="agencia_name">
                    </div>

        		    <div class="form-group <?php echo (in_array('operacao', $errorItems))?'has-error':'';?>">
                        <label for="operacao_name">Operação</label>
                        <input type="text" name="operacao" value="<?php echo $info['operacao']; ?>"  class="form-control" id="operacao_name">
                    </div>

                    <div class="form-group <?php echo (in_array('numero', $errorItems))?'has-error':'';?>">
                        <label for="numero_name">Número</label>
                        <input type="text" name="numero" value="<?php echo $info['numero']; ?>" class="form-control" id="numero_name">
                    </div>

                    <div class="form-group <?php echo (in_array('status_conta', $errorItems))?'has-error':'';?>">
                        <label for="status_conta_name">Status</label>
                        <input type="text" name="status_conta" value="<?php echo $info['status_conta']; ?>" class="form-control" id="status_conta_name">
                    </div>

            </div>	
        </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

    </section>
