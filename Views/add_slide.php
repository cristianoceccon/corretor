<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Slides
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form  method="POST" action="<?php echo BASE_URL."sliders/add_action"?>" enctype="multipart/form-data">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Novo slide</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('locality', $errorItems))?'has-error':'';?>"
                    >
                        <label for="slide_locality">Local do slide</label>

                        <select name="locality" class="form-control" id="slide_locality">
                            <option value="1" <?php echo($dados['locality'] == 1)?'selected':'';?>>Página Inicial Topo</option>
                            <option value="3" <?php echo($dados['locality'] == 3)?'selected':'';?>>Página de Categoria</option>
                        </select>

                        <span class="help-block" id="indisponivel" <?php echo (in_array('locality', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    
                    </div>

                    <div class="form-group <?php echo (in_array('id_category', $errorItems))?'has-error':'';?>" id="display_id_category" <?php echo (!empty($dados['id_category']))?'style="display:block;"':'style="display:none;"';?>>
                        <label for="slide_id_category">Categoria</label>
                        <select  name="id_category" class="form-control" id="slide_id_category">
                            <option value="">Selecione uma categoria</option>
                            <?php 
                                $this->loadView('categorys_add_items', array(
                                'list' => $category_list,
                                'level' => 0,
                                'id_category' => $dados['id_category']
                                 ));
                            ?>
                        </select>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('id_category', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Selecione uma categoria!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('url', $errorItems))?'has-error':'';?>">

                        <label for="slide_url">Imagem <small>(920 x 380)</small></label>
                        
                        <input type="file" name="url[]" class="form-control" id="slide_url"/>
                        
                        <span class="help-block" id="indisponivel" <?php echo (in_array('url', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    
                    </div>
                    <div class="form-group <?php echo (in_array('link', $errorItems))?'has-error':'';?>">

                        <label for="slide_link">Link da imagem <small>(opcional)</small></label>
                        
                        <input type="text" name="link" value="<?php echo $dados['link'];?>" class="form-control" id="slide_link" placeholder="Ex: https://www.facebook.com.br/arte_borda"/>
                        
                        <span class="help-block" id="indisponivel" <?php echo (in_array('link', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    
                    </div>
        	    </div>
            </div>	
        </form>
    </section>

    <script type="text/javascript">

            $('#slide_locality').on('change', function(){
                var value = $(this).val();

                if(value === '3'){
                $('#display_id_category').css('display', 'block');
                } else {
                    $('#display_id_category').css('display', 'none');
                }
            });

            <?php if(!empty($img_invalid)){?>
                alert('<?php echo $img_invalid;?>');
            <?php }?>
                        
        
    </script>
