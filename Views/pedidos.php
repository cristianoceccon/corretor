<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Vendas
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Lista das Vendas</h3>
        		<div class="box-tools">
        	<a href="<?php echo BASE_URL."pedidos/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
						<th>Abrir</th>
						<th>Data</th>
						<th>Cliente</th>
						<th>Status</th>
												
						<th width="130">Ações</th>

        			</tr>
        			<?php foreach($list as $item): ?>
        				<tr>
							<td><a href="<?php echo BASE_URL.'pedidos/abrir/'.$item['id']?>" class="glyphicon glyphicon-search"></a></a>
							</td>	
							<td><?php echo date("d/m/Y", strtotime($item['criado_em'])); ?></td>		
							<td><?php echo $item['cliente']['nome']; ?></td>						
							<td><?php 
                                        if($item['id_status_pedido'] === '0'){
                                            echo '<span class="label label-success">'."Aberto".'</span>';
                                        } elseif ($item['id_status_pedido'] === '1'){
											echo '<span class="label label-primary">'."Finalizado".'</span>';
										} else {
											echo '<span class="label label-danger">'."Cancelado".'</span>'; 
                                        }
									?>
								<td>
        						<div class="btn-group">
								<a href="<?php echo BASE_URL.'pedidos/cancelar/'.$item['id']?>" class="btn btn-xs btn-danger
								<?php echo ($item['id_status_pedido'] === "1" || $item['id_status_pedido'] === "2")?'disabled':'';?>" onclick="return confirm('Tem certeza que deseja cancelar a venda?')" >Cancelar</a></a>
								<a href="<?php echo BASE_URL.'pedidos/finalizar/'.$item['id']?>" class="btn btn-xs btn-warning 
								<?php echo ($item['id_status_pedido'] === "1" || $item['id_status_pedido'] === "2")?'disabled':'';?> "  onclick="return confirm('Tem certeza que deseja finalizar a venda?')">Finalizar</a>										
							</div>
        					</td>
        				</tr>
                    <?php endforeach; ?>
        		</table>
        	</div>
        </div>	
    </section>
