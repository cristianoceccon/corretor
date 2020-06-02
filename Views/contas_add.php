<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Contas
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."contas/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Nova conta</h3>
        		    <div class="box-tools">
                    <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
                       <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('banco', $errorItems))?'has-error':'';?>">
                        <label for="banco_name">Banco</label>
                        <input type="text" name="banco" class="form-control" id="banco_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('banco', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('agencia', $errorItems))?'has-error':'';?>">
                        <label for="agencia_name">Agência</label>
                        <input type="text" name="agencia" class="form-control" id="agencia_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('agencia', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('operacao', $errorItems))?'has-error':'';?>">
                        <label for="operacao_name">Operação</label>
                        <input type="text" name="operacao" class="form-control" id="operacao_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('operacao', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('numero', $errorItems))?'has-error':'';?>">
                        <label for="numero_name">Número</label>
                        <input type="text" name="numero"  class="form-control" id="numero_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('numero', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('status_conta', $errorItems))?'has-error':'';?>">
                        <label for="status_conta_name">Status</label>
                        <input type="text" name="status_conta" class="form-control" id="status_conta_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('status_conta', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>
        	    </div>
            </div>	
        </form>
    </section>
