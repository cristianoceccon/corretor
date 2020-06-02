<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Slides
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Slides</h3>
        		<div class="box-tools">
        			<a href="<?php echo BASE_URL."sliders/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
                <?php if(!empty($list)){?>
                    <table class="table">
                        <tr>
                            <th>Local</th>
                            <th>Categoria</th>
                            <th>Status</th>
                            <th>Slide</th>
                            <th width="110">Ações</th>
                        </tr>
                        <?php foreach ($list as $item) {?>
                            <tr>
                                <td>
                                    <?php
                                        $local = ""; 
                                        
                                            switch ($item['locality']) {
                                                case 1:
                                                    $local = "Página inicial Topo";
                                                    break;
                                                case 2:
                                                    $local = "Página inicial Rodapé";
                                                    break;
                                                case 3:
                                                    $local = "Página de Categoria";
                                                    break;
                                                
                                            }
                                        
                                        echo $local;
                                    ?>
                                </td>
                                <td><?php echo $item['category'];?></td>
                                <td><?php echo $item['status'];?></td>
                                <td><img src="<?php echo BASE_URL_SITE."../media/sliders/".$item['url'];?>" width="100" height="50"></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo BASE_URL."sliders/edit/".$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
                                        <a href="<?php echo BASE_URL."sliders/del/".$item['id']."/".$item['url'];?>" class="btn btn-xs btn-danger"  onclick="return confirm('Tem certeza que deseja excluir ?')" >Excluir</a>
                                    </div>
                                </td>
                            </tr>
                        <?php }?>
                    </table>
                <?php } else {?>
                    <div class="callout callout-warning">
                        <h4>Nenhum slide cadastrado até o momento!</h4>

                    </div>

                <?php }?>
        	</div>
        </div>	
    </section>
