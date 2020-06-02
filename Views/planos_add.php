<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Planos  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."planos/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
                    <h3 class="box-title">Novo Plano</h3>                  
        		    <div class="box-tools">
                    <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Salvar">
                    </div>
                <br>
            </br>

          
        		    <div class="form-group <?php echo (in_array('nome', $errorItems))?'has-error':'';?>">
                        <label for="nome_name">Nome</label>
                        <input type="text" name="nome" class="form-control" id="nome_name" required>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('planos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('nome_categoria', $errorItems))?'has-error':'';?>">
                        <label for="form_id_categoria">Informe a Categoria</label>
                            <select required name="id_categoria" class="form-control select2" id="id_categoria_name">
                                <option value=""></option>
                                <?php foreach($planoscategoria_list as $item){?>
                                    <option value="<?php echo $item['id'];?>"><?php echo $item['nome']?></option>
                                <?php }?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('planos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
                    
                    <div class="form-group <?php echo (in_array('nome_grupo_principal', $errorItems))?'has-error':'';?>">
                        <label for="form_id_grupo_principal">Grupo Principal</label>
                            <select required name="id_grupo_principal" class="form-control select2" id="id_grupo_principal_name">
                                <option value=""></option>
                                <?php foreach($planosgrupoprincipal_list as $item){?>
                                    <option value="<?php echo $item['id'];?>"><?php echo $item['nome']?></option>
                                <?php }?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('planos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>
               
                 
                        <div class="form-group <?php echo (in_array('id_grupo_secundario', $errorItems))?'has-error':'';?>">
                        <label for="form_id_grupo_secundario">Grupo Secundário</label>
                            <select required name="id_grupo_secundario" class="form-control select2" id="id_grupo_secundario_name">
                                <option value=""></option>
                                <?php foreach($planosgruposecundario_list as $item){?>
                                    <option value="<?php echo $item['id'];?>"><?php echo $item['nome']?></option>
                                <?php }?>
                            </select>
                            <span class="help-block" id="indisponivel" <?php echo (in_array('planos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                        </div>

               </div>	
        </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_mascara_produtos_add.js"></script> 

    </section>
