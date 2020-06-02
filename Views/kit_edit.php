<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Kits
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."kit/edit_action/".$info['id'];?>" method="POST" enctype="multipart/form-data">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Editar kit</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('kit', $errorItems))?'has-error':'';?>">
                        <label for="kit_name">Nome do kit</label>
                        <input type="text" name="kit_name" value="<?php echo $info['name'];?>" class="form-control" id="kit_name"  required>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('kit', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>
                    <div class="form-group">
                        <label for="reference_cod">Referência</label>
                        <input type="text" name="kit_reference" value="<?php echo $info['reference'];?>" class="form-control"  id="reference_cod">
                    </div>
                    <div class="form-group">
                        <label for="kit_cata">Catálogo</label>
                        <select name="kit_catalog" class="form-control" id="kit_cata" required>
                            <option value="">Selecione um catálogo</option>
                            <?php foreach($catalog as $c){?>
                                <option value="<?php echo $c['id'];?>" <?php echo ($c['id'] == $info['catalog'])?'selected':'';?>><?php echo $c['name_catalog'];?></option>
                            <?php }?>
                        </select>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('catalog', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Selecione uma categoria!</font></font></span>
                    </div>
                    <div class="form-group">
                        <label for="kit_description">Descrição do Kit</label>
                        <textarea id="kit_description" name="kit_description"><?php echo $info['description'];?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="kit_featured">Em destaque</label><br/>
                        <input type="checkbox" name="kit_featured" id="kit_featured" <?php echo ($info['featured'] == 1)?'checked':'';?>>
                    </div>

                    <div class="form-group">
                        <label for="kit_sale">Em promoção</label><br/>
                        <input type="checkbox" name="kit_sale" id="kit_sale" <?php echo ($info['sale'] == 1)?'checked':'';?>>
                    </div>

                    <div class="form-group">
                        <label for="kit_bestseller">Mais vendidos</label><br/>
                        <input type="checkbox" name="kit_bestseller" id="kit_bestseller" <?php echo ($info['bestseller'] == 1)?'checked':'';?>>
                    </div>

                    <div class="form-group">
                        <label for="kit_new">Novo Kit</label><br/>
                        <input type="checkbox" name="kit_new" id="kit_new" <?php echo ($info['new_kit'] == 1)?'checked':'';?>>
                    </div>

                    <div class="form-group">
                        <label for="kit_foto">Foto do Kit</label>
                        <input type="file" name="kit_url" class="form-control" id="kit_foto"/>
                    </div>
                    <div class="form-group">
                        <label for="kit_products">Escolha os produtos</label>
                        <select  class="form-control select2" id="kit_products" onchange="selectProduct(this.value)">
                            <option value="">Escolha um produto</option>
                            <?php foreach($list_products as $item){?>
                                <option value="<?php echo $item['id'];?>"><?php echo $item['name']?></option>
                            <?php }?>
                        </select>
                    </div>

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Produtos do Kit</h3>
                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody id="add_products">
                                <tr>
                                    <th>ID</th>
                                    <th>Imagem</th>
                                    <th>Nome do produto</th>
                                    <th>Qtd</th>
                                    <th>Valor Unitário</th>
                                    <th>Valor Total</th>
                                    <th>Ações</th>
                                </tr>
                                <?php 
                                    $total = 0;
                                    foreach($items as $item){
                                    //valor total do produto
                                    $total_p = $item['price'] * $item['qtd'];

                                    $total += $total_p;
                                ?>
                                    <tr id="tr<?php echo $item['id_product'];?>">
                                        <input type="hidden" class="ids" value="<?php echo $item['id_product'];?>">
                                        <input type="hidden" name="products[<?php echo $item['id_product'];?>]" value="<?php echo $item['qtd'];?>;<?php echo $item['price'];?>" data-price="<?php echo $item['price'];?>" id="input_product<?php echo $item['id_product'];?>">
                                        <td><?php echo $item['id_product'];?></td>
                                        <td><img src="<?php echo $item['image'];?>" width="50"></td>
                                        <td><?php echo $item['p']['name'];?></td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <select  class="form-control" id="qtd<?php echo $item['id_product'];?>" onchange="updateQtd(<?php echo $item['id_product'];?>, this.value);">
                                                    <?php for($i=1;$i <= 12;$i++){?>
                                                        <option value="<?php echo $i;?>" <?php echo ($i == $item['qtd'])?'selected':'';?>><?php echo $i;?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </td>
                                        <td >
                                            <div class="input-group input-group-sm">
                                                <input type="text" value="<?php echo number_format($item['price'], '2', ',','.');?>" id="input_price<?php echo $item['id_product'];?>" class="form-control money">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-info btn-flat" onclick="buttonProduct(<?php echo $item['id_product']?>);">
                                                        Alterar
                                                    </button>
                                                </span>
                                                </div>
                                        </td>
                                        <td id="td_price<?php echo $item['id_product'];?>">R$ <?php echo number_format($total_p, '2', ',','.');?></td>
                                        <td><a class="btn btn-xs btn-danger" onclick="removeItem('<?php echo $item['id_product'];?>');">Excluir</a></td>
                                        <input type="hidden"  class="all" id="id_all<?php echo $item['id_product'];?>" value="<?php echo number_format($total_p, '2', '.',',')?>"/>
                                    </tr>
                                <?php }?>
                                
                            </tbody>
                            <input type="hidden" name="price_kit" value="<?php echo $total;?>" id="price_kit"/>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
        	    <span id="title_value_kit">Valor do Kit: </span> <span id="view_price_kit"> R$ <?php echo number_format($total, '2', ',','.');?></span>
            </div>	
        </form>
    </section>

    <!--Não remover-->
    <script  src="<?php echo BASE_URL;?>assets/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
        $(function(){
            $('.select2').select2()
        });
    </script>
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/kit.js"></script>
    
    <script type="text/javascript">
        window.onload = function(){
            
            <?php if($errorItems['error'] == true){?>
                alert('<?php echo $errorItems['msg'];?>');
            <?php }?>

        }  
    </script>

    <script src="https://cdn.tiny.cloud/1/0og1f3baxayusqdv69zraoarpy2j38edqeutp5s2rtk3udwt/tinymce/5/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector:'#kit_description',
            height:200,
            menubar:false,
            plugins:[
              'textcolor image media lists'
            ],
            toolbar:'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat'
            
        });
    </script>

