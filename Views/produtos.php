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
        	<a href="<?php echo BASE_URL."produtos/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
						<th>Cliente</th>
						<th>Valor</th>
										
        				<th width="130">Ações</th>
        			</tr>
        			<?php foreach($list as $item): ?>
        				<tr>
							<td><?php echo $item['nome']; ?></td>
							<td>R$ <?php echo number_format($item['venda'], '2', ',', '.'); ?></td>
							<td>
        						<div class="btn-group">
        							<a href="<?php echo BASE_URL.'produtos/edit/'.$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
									<a href="<?php echo BASE_URL.'produtos/del/'.$item['id']?>" class="btn btn-xs btn-danger" onclick="return confirm('Tem certeza que deseja excluir ?')" >Excluir</a></a>
								</div>
        					</td>
        				</tr>
                    <?php endforeach; ?>
        		</table>
        	</div>
        </div>	
    </section>
