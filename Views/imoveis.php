<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Imóveis
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
	

        <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Lista de Imóveis</h3>
        		<div class="box-tools">
        	<a href="<?php echo BASE_URL."imoveis/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
						<th>Abrir</th>
						<th>Cliente</th>
						<th>Status</th>
										
        				<th width="130">Ações</th>
        			</tr>
        			<?php foreach($list as $item): ?>
        				<tr>
						<td><a href="<?php echo BASE_URL.'imoveis/abrir/'.$item['id']?>" class="glyphicon glyphicon-search"></a></a></td>	
						<td><?php echo $item['cliente']['nome']; ?></td>	
						<td><?php 
						$dataatual = date("Y-m-d");
                                        if($dataatual <= $item['data_final']){
                                            echo '<span class="label label-success">'."ATIVO".'</span>';
										} else {
											echo '<span class="label label-danger">'."VENCIDO".'</span>'; 
                                        }
									?>
								
								<td>
        						<div class="btn-group">
        							<a href="<?php echo BASE_URL.'imoveis/edit/'.$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
									<a href="<?php echo BASE_URL.'imoveis/publicar/'.$item['id']?>" class="btn btn-xs btn-warning 
									<?php echo ($item['publicado'] === "1" || $item['publicado'] === "2")?'disabled':'';?> "  onclick="return confirm('Tem certeza que já publicou este imóvel?')">Publicar</a>									</div>
        					</td>
        				</tr>
                    <?php endforeach; ?>
        		</table>
        	</div>
        </div>	
    </section>
