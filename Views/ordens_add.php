<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ordens de Serviço
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."ordens/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
                    <h3 class="box-title">Nova Ordem</h3>                  
        		    <div class="box-tools">
                    <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Salvar">
                    </div>
                <br>
            </br>   

            <div class="form-group <?php echo (in_array('nome_cliente', $errorItems))?'has-error':'';?>">
                        <label for="c_cliente">Cliente</label>
                        <select name="id_cliente" id="c_cliente" class="form-control select2">
                            <option value=""></option>
                                <?php foreach($cli_list as $item){ ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; ?></option>  
                                <?php }?>    
                        </select>
                    </div>

            <div class="form-group <?php echo (in_array('data_execucao', $errorItems))?'has-error':'';?>">
                        <label for="data_execucao_name">Data de Execução</label>
                        <input type="date" name="data_execucao" class="form-control" id="data_execucao_name" required>
                    </div>

                    <div class="form-group <?php echo (in_array('hora_execucao', $errorItems))?'has-error':'';?>">
                        <label for="hora_execucao_name">Hora de Execução</label>
                        <input type="time" name="hora_execucao" class="form-control" id="hora_execucao_name" required>
                    </div>
                              
                    <div class="form-group <?php echo (in_array('descricao', $errorItems))?'has-error':'';?>">
                        <label for="descricao_name">Descrição</label>
                        <input type="text" name="descricao" class="form-control" id="descricao_name" required>
                    </div>
               </div>	
        </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 
        <script type="text/javascript">
    $(function(){
        $('.select2').select2()
    });
</script>
    </section>
