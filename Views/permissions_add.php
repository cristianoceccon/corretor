<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permissões
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."permissions/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Novo Grupo de Permissão</h3>
        		    <div class="box-tools">
                    <input type="button" align="right" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':'';?>">
                        <label for="group_name">Nome do grupo</label>
                        <input type="text" name="name" class="form-control" id="group_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('name', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>
                    <hr/>
                    
                    <?php foreach($items_group as $item){?>
                        <div class="box box-default">
                            <div class="box-header with-border">
                                <h3 class="box-title"><?php echo $item['name'];?></h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php foreach($permissions_item as $p){?>
                                    <?php if($p['id_items_group'] === $item['id']){?>
                                        <div class="form-group" style="float:left;margin-left:10px;">
                                            <input type="checkbox" name="items[]" value="<?php echo $p['id'];?>" id="item-<?php echo $p['id'];?>">
                                            <label for="item-<?php echo $p['id'];?>"><?php echo $p['name'];?></label>
                                        </div>
                                    <?php }?>
                                <?php }?>
                            </div>
                            <!-- /.box-body -->
                            
                        </div>
                    <?php }?>

        	    </div>
            </div>	
        </form>
    </section>
