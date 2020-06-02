<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
     Ordens de Serviço
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form method="POST" action="<?php echo BASE_URL; ?>ordens/baixar_action/<?php echo $info['id']; ?>">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Baixar Ordem</h3>
        		    <div class="box-tools">
                       <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">

                <div class="form-group <?php echo (in_array('id_cliente', $errorItems))?'has-error':'';?>">
                        <label for="form_id_cliente">Cliente</label>
                            <select name="id_cliente" class="form-control select2" id="id_cliente_name">
                                <?php foreach($cli_list as $item): ?>
                                    <option <?php echo ($item['id']==$info['id_cliente'])?'
                                        selected':''; ?> value="<?php echo $item['id']; ?>
                                        "><?php echo $item['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                <div class="form-group <?php echo (in_array('data_fechamento', $errorItems))?'has-error':'';?>">
                        <label for="data_fechamento_name">Data Fechamento</label>
                        <input type="date" name="data_fechamento" value="<?php echo $info['data_fechamento']; ?>" class="form-control" id="data_fechamento_name" required>
                    </div>

                    <div class="form-group <?php echo (in_array('hora_fechamento', $errorItems))?'has-error':'';?>">
                        <label for="hora_fechamento_name">Hora Fechamento</label>
                        <input type="time" name="hora_fechamento" value="<?php echo $info['hora_fechamento']; ?>" class="form-control" id="hora_fechamento_name" required>
                    </div>

                    <div class="form-group <?php echo (in_array('informacao', $errorItems))?'has-error':'';?>">
                        <label for="informacao_name">Informação</label>
                        <input type="text" name="informacao" value="<?php echo $info['informacao']; ?>" class="form-control" id="informacao_name" required>
                    </div>

                    <div class="form-group <?php echo (in_array('valor', $errorItems))?'has-error':'';?>">
                        <label for="valor_name">Valor</label>
                        <input type="text" name="valor" value="<?php echo $info['valor']; ?>" class="form-control" id="valor_name" required>
                    </div>
            </div>	
        </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

    </section>
