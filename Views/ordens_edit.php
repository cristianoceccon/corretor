<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
     Ordens de Serviço  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form method="POST" action="<?php echo BASE_URL; ?>ordens/edit_action/<?php echo $info['id']; ?>">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Editar Ordens</h3>
        		    <div class="box-tools">
                       <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">

                
                <div class="form-group <?php echo (in_array('id_cliente', $errorItems))?'has-error':'';?>">
                        <label for="form_id_cliente">Cliente</label>
                            <select required name="id_cliente" class="form-control select2" id="id_cliente_name">
                                <?php foreach($cli_list as $item): ?>
                                    <option <?php echo ($item['id']==$info['id_cliente'])?'
                                        selected':''; ?> value="<?php echo $item['id']; ?>
                                        "><?php echo $item['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

        		    <div class="form-group <?php echo (in_array('data_execucao', $errorItems))?'has-error':'';?>">
                        <label for="data_execucao_name">Data de Execução</label>
                        <input type="date" name="data_execucao" value="<?php echo $info['data_execucao']; ?>" class="form-control" id="data_execucao_name">
                    </div>

                    <div class="form-group <?php echo (in_array('hora_execucao', $errorItems))?'has-error':'';?>">
                        <label for="hora_execucao_name">Hora de Execução</label>
                        <input type="time" name="hora_execucao" value="<?php echo $info['hora_execucao']; ?>" class="form-control" id="hora_execucao_name">
                    </div>

                    <div class="form-group <?php echo (in_array('descricao', $errorItems))?'has-error':'';?>">
                        <label for="descricao_name">Descrição</label>
                        <input type="text" name="descricao" value="<?php echo $info['descricao']; ?>" class="form-control" id="descricao_name">
                    </div>
            </div>	
        </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

    </section>
