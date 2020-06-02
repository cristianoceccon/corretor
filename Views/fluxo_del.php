<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Lançar Saída
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."fluxo/del_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Nova entrada</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('descricao', $errorItems))?'has-error':'';?>">
                        <label for="descricao_name">Descrição</label>
                        <input type="text" name="descricao" class="form-control" id="descricao_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('descricao', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>

        		    <div class="form-group <?php echo (in_array('fluxo', $errorItems))?'has-error':'';?>">
                        <label for="valorsaida">Valor</label>
                        <input type="text" name="valorsaida" class="form-control" id="valor">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('fluxo', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('saldo', $errorItems))?'has-error':'';?>">
                        <label for="saldo">Saldo Atual</label>
                        <input type="text" name="saldo" class="form-control" id="saldo" value="<?php 
                        echo 100?>">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('fluxo', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

        	    </div>
            </div>	
        </form>
    </section>
