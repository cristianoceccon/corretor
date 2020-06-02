<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Produtos
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."products/edit_action/".$info_product['id'];?>" method="POST" enctype="multipart/form-data">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Novo produto</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
                    <div class="form-group <?php echo (in_array('id_category', $errorItems))?'has-error':'';?>">
                        <label for="p_cat">Categoria</label>
                        <select required name="id_category" class="form-control" id="p_cat">
                            <option value="">Selecione uma categoria</option>
                            <?php 
                                $this->loadView('categorys_add_items', array(
                                'list' => $category_list,
                                'level' => 0,
                                'id_category' => $info_product['id_category']
                                 ));
                            ?>
                        </select>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('id_category', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Selecione uma categoria!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('id_brand', $errorItems))?'has-error':'';?>">
                        <label for="p_brand">Marca</label>
                        <select required name="id_brand" class="form-control" id="p_brand">
                            <option value="">Selecione uma marca</option>
                            <?php foreach($brand_list as $item){?>
                                <option <?php echo($info_product['id_brand'] == $item['id'])?'selected="selected"':''; ?> value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                            <?php }?>
                        </select>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('id_brand', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Selecione uma marca!</font></font></span>
                    </div>
                    <div class="form-group <?php echo (in_array('reference', $errorItems))?'has-error':'';?>">
                        <label for="p_reference">Referência</label>
                        <input required type="text" name="reference" class="form-control" id="p_reference" value="<?php echo $info_product['reference'];?>">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('reference', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>
                    <div class="form-group <?php echo (in_array('catalog', $errorItems))?'has-error':'';?>">
                        <label for="p_cata">Catálogo</label>
                        <select required name="catalog" class="form-control" id="p_cata">
                            <option value="">Selecione um catálogo</option>
                            <?php foreach($catalog as $c){?>
                                <option <?php echo ($c['id'] === $info_product['catalog'])?'selected="selected"':''; ?> value="<?php echo $c['id'];?>"><?php echo $c['name_catalog'];?></option>
                            <?php }?>
                        </select>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('catalog', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Selecione uma categoria!</font></font></span>
                    </div>
        		    <div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':'';?>">
                        <label for="p_name">Nome do Produto</label>
                        <input required type="text" name="name" value="<?php echo $info_product['name'];?>" class="form-control" id="p_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('name', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('description', $errorItems))?'has-error':'';?>">
                        <label for="p_description">Descrição do Produto</label>
                        <textarea id="p_description" name="description"><?php echo 
                        $info_product['description'];?></textarea>
                    </div>

                    <div class="form-group <?php echo (in_array('stock', $errorItems))?'has-error':'';?>">
                        <label for="p_stock">Estoque Disponível</label>
                        <input required type="number" value="<?php echo $info_product['stock'];?>" id="p_stock" name="stock" class="form-control">
                    </div>

                    <div class="form-group <?php echo (in_array('price_vend', $errorItems))?'has-error':'';?>">
                        <label for="p_price_cost">Preço de custo</label>
                        <input type="text"  id="p_price_cost" name="price_cost" class="form-control valor" value="<?php echo $info_product['price_cost'];?>" required>
                    </div>

                    <div class="form-group <?php echo (in_array('price_from', $errorItems))?'has-error':'';?>">
                        <label for="p_price_sale">Preço de venda</label>
                        <input type="text"  id="p_price_sale" name="price_sale" class="form-control valor" value="<?php echo $info_product['price_sale'];?>" required>
                    </div>

                    <div class="form-group <?php echo (in_array('price', $errorItems))?'has-error':'';?>">
                        <label for="p_price_promotion">Preço de promoção</label> <small>(opcional)</small>
                        <input type="text"  id="p_price_promotion" name="price_promotion" class="form-control valor" value="<?php echo $info_product['price_promotion'];?>">
                    </div>
                    
                    <hr/>
                    
                    <div class="form-group col-sm-12" style="padding-right:0px !important;  padding-left:0px !important;">
                      <label>Medidas do produto</label><br/>
                      <br/>
                      <div class="form-group <?php echo (in_array('weight', $errorItems))?'has-error':'';?>">
                         <label for="p_weight">Peso</label> <small>(kg)</small>
                         <input type="text" name="weight" value="<?php echo $info_product['weight'];?>" class="form-control" id="p_weight" required>
                      </div>

                      <div class="form-group <?php echo (in_array('width', $errorItems))?'has-error':'';?>">
                         <label for="p_width">Largura</label> <small>(cm)</small>
                         <input type="text" name="width" value="<?php echo $info_product['width'];?>" class="form-control" id="p_width" required>
                      </div>

                      <div class="form-group <?php echo (in_array('height', $errorItems))?'has-error':'';?>">
                         <label for="p_height">Altura</label> <small>(cm)</small>
                         <input type="text" name="height" value="<?php echo $info_product['height'];?>" class="form-control" id="p_height" required>
                      </div>

                      <div class="form-group <?php echo (in_array('length', $errorItems))?'has-error':'';?>">
                         <label for="p_length">Comprimento</label> <small>(cm)</small>
                         <input type="text" name="length" value="<?php echo $info_product['length'];?>" class="form-control" id="p_length" required>
                      </div>

                      <div class="form-group <?php echo (in_array('diameter', $errorItems))?'has-error':'';?>">
                         <label for="p_diameter">Diâmetro</label> <small>(cm)</small>
                         <input type="text" name="diameter" value="<?php echo $info_product['diameter'];?>" class="form-control" id="p_diameter" required>
                      </div>

                      <hr/>
                    </div>

                    <div class="form-group <?php echo (in_array('featured', $errorItems))?'has-error':'';?>">
                        <label for="p_featured">Em destaque</label><br/>
                        <input type="checkbox" <?php echo($info_product['featured'] == 1)?'checked':'';?> id="p_featured" name="featured">
                    </div>

                    <div class="form-group <?php echo (in_array('sale', $errorItems))?'has-error':'';?>">
                        <label for="p_sale">Em promoção</label><br/>
                        <input type="checkbox"  <?php echo($info_product['sale'] == 1)?'checked':'';?> id="p_sale" name="sale">
                    </div>

                    <div class="form-group <?php echo (in_array('bestseller', $errorItems))?'has-error':'';?>">
                        <label for="p_bestseller">Mais vendidos</label><br/>
                        <input type="checkbox" <?php echo($info_product['bestseller'] == 1)?'checked':'';?> id="p_bestseller" name="bestseller">
                    </div>

                    <div class="form-group <?php echo (in_array('new_product', $errorItems))?'has-error':'';?>">
                        <label for="p_new_product">Novo produto</label><br/>
                        <input type="checkbox" <?php echo($info_product['new_product'] == 1)?'checked':'';?>  id="p_new_product" name="new_product">
                    </div>

                    <hr/>

                      <div class="form-group col-sm-12" style="padding-right:0px !important;  padding-left:0px !important;">
                        <label for="p_cores">Cores disponíveis para o produto</label><br/>
                        <?php foreach($colors as $color){?>
                            <div class="form-group col-sm-1" style="padding-right:0px !important;  padding-left:0px !important;">

                          <label for="p_cores_<?php echo $color['id'];?>"><span class="cor" title="<?php echo $color['name'];?>" style="background-color:<?php echo $color['cod_exa'];?>;"></span></label><br/>
                          <input type="checkbox" <?php echo (isset($info_product['cores'][$color['id']]))?'checked':'';?> value="<?php echo $color['name'];?>"  id="p_cores_<?php echo $color['id'];?>"  name="color[<?php echo $color['id'];?>]">
                          </div>
                        <?php }?>
                    </div>
                    
                    <hr/>
                    
                    <div class="form-group <?php echo (in_array('new_product', $errorItems))?'has-error':'';?>">
                        <?php foreach($options_list as $optionItem){?>
                            <label for="p_option_<?php echo $optionItem['id'];?>"><?php echo $optionItem['name'];?></label><br/>
                            <input type="text" name="options[<?php echo $optionItem['id'];?>]" class="form-control" id="p_option_<?php echo $optionItem['id'];?>" value="<?php echo (isset($info_product['options'][$optionItem['id']]))?$info_product['options'][$optionItem['id']]:'';?>">
                        <?php }?>
                    </div>
                    <hr/>


                    <label>Imagens do Produto</label><br>
                    
                    <div class="images_area">
                        <?php
                            if(!empty($info_product['images'])){
                                foreach ($info_product['images'] as $id => $url) { ?>

                                <div class="p_image">
                                <img src="<?php echo $url;?>"><br>
                                <a href="javascript:;" class="btn btn-danger">Excluir</a>
                                <input type="hidden" name="c_images[]" value="<?php echo $id;?>">
                               </div>
                        <?php   }}?>
                    </div>

                    <hr/>


                    <button class="btn btn-primary p_new_image">+</button>

                    <div class="products_file_area">
                        <input type="file" class="images_file" name="images[]" />
                    </div>

        	    </div><!--final box-body-->
            </div>	
        </form>
    </section>
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/jquery.mask.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/0og1f3baxayusqdv69zraoarpy2j38edqeutp5s2rtk3udwt/tinymce/5/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector:'#p_description',
            height:200,
            menubar:false,
            plugins:[
              'textcolor image media lists'
            ],
            toolbar:'undo redo | formatselect | bold italic backcolor | media image | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat'
            
        });
    </script>