<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cores
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."colors/edit_action/".$color['id']?>" method="POST">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Editar cor</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('color', $errorItems))?'has-error':'';?>">
                        <label for="brand_name">Nome da cor</label>
                        <input type="text" name="name_color" class="form-control" id="brand_name" value="<?php echo $color['name'];?>">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('color', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>
                    <div class="form-group <?php echo (in_array('cod', $errorItems))?'has-error':'';?>">
                        <label for="option_color">Código da cor</label>
                        <div class="input-group my-colorpicker2 colorpicker-element">
                            <input type="text" name="cod_exa" value="<?php echo $color['cod_exa'];?>" class="form-control" id="option_color">

                            <div class="input-group-addon">
                                <i style="background-color:<?php echo $color['cod_exa'];?>;"></i>
                            </div>
                        </div>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('cod', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>
        	    </div>
            </div>	
        </form>
    </section>

    <script src="<?php echo BASE_URL;?>assets/adminlte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script>
        //color picker with addon
    $('.my-colorpicker2').colorpicker()
    </script>