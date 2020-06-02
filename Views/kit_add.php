<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Kits
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."kit/add_action"?>" method="POST" enctype="multipart/form-data">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Novo kit</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">

        		    <div class="form-group <?php echo (in_array('kit', $errorItems))?'has-error':'';?>">
                        <label for="kit_name">Nome do kit</label>
                        <input type="text" name="kit_name" class="form-control" id="kit_name"  required>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('kit', $errorItems))?'style="display:block;"':'style="display:none;';?>>Preencha este campo!</span>
                    </div>

                    <div class="form-group">
                        <label for="reference_cod">Referência</label>
                        <input type="text" name="kit_reference" class="form-control"  id="reference_cod">
                    </div>

                    <div class="form-group">
                        <label for="kit_cata">Catálogo</label>
                        <select name="kit_catalog" class="form-control" id="kit_cata" required>
                            <option value="">Selecione um catálogo</option>
                            <?php foreach($catalog as $c){?>
                                <option value="<?php echo $c['id'];?>"><?php echo $c['name_catalog'];?></option>
                            <?php }?>
                        </select>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('catalog', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Selecione uma categoria!</font></font></span>
                    </div>

                    <div class="form-group">
                        <label for="kit_description">Descrição do Kit</label>
                        <textarea id="kit_description" name="kit_description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="kit_featured">Em destaque</label><br/>
                        <input type="checkbox" name="kit_featured" id="kit_featured">
                    </div>

                    <div class="form-group">
                        <label for="kit_sale">Em promoção</label><br/>
                        <input type="checkbox" name="kit_sale" id="kit_sale">
                    </div>

                    <div class="form-group">
                        <label for="kit_bestseller">Mais vendidos</label><br/>
                        <input type="checkbox" name="kit_bestseller" id="kit_bestseller">
                    </div>

                    <div class="form-group">
                        <label for="kit_new">Novo Kit</label><br/>
                        <input type="checkbox" name="kit_new" id="kit_new">
                    </div>

                    <div class="form-group">
                        <label for="kit_foto">Foto do Kit</label>
                        <input type="file" name="kit_url" class="form-control" id="kit_foto" required/>
                    </div>
<!--ESCOLHE OS PRODUTOS-->
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

                                <!--Aqui adicionamos os produtos do kit vindo da requisição-->
                         
                            </tbody>
                            <input type="hidden" name="price_kit" value="00,00" id="price_kit"/>
                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>

        	    <span id="title_value_kit">Valor do Kit: </span> <span id="view_price_kit"> R$ 00,00</span>
            
            </div>
            <!-- /.box -->	
        </form>
    </section>

<!--Não remover scripts-->
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
<!---->