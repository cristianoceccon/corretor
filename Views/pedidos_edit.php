<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
     Venda  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form method="POST" action="<?php echo BASE_URL; ?>pedidos/finalizar/<?php echo $info['id']; ?>">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Finalizar</h3>
        		    <div class="box-tools">
                       <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Finalizar" onclick="return confirm('Tem certeza que deseja finalizar a venda?')">
        		    </div>
        	    </div>
        	    <div class="box-body">

                    <div class="form-group <?php echo (in_array('id_status_pedido', $errorItems))?'has-error':'';?>">
                        <label for="id_status_pedido_name">Descrição</label>
                        <input type="text" name="id_status_pedido" value="<?php echo $info['id_status_pedido']; ?>" class="form-control" id="descricao_name">
                    </div>

                     </div>	
                 </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

    </section>
