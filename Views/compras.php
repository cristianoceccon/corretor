<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Compras
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">

<div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Filtro</h3>
        	</div>
        	<div class="box-body">
...
			</div>
		</div>


        <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Lista das Compras</h3>
        		<div class="box-tools">
        	<a href="<?php echo BASE_URL."compras/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
						<th>Cliente</th>
						<th>Produto</th>
						<th>Quantidade</th>
						<th>Valor Unitário</th>
						<th>Valor Total</th>
						
        				<th width="130">Ações</th>
        			</tr>
        			<?php foreach($list as $item): ?>
        				<tr>
							<td><?php echo $item['cliente']; ?></td>
							<td><?php echo $item['produto']; ?></td>
							<td><?php echo $item['quantidade']; ?></td>
							<td><?php echo $item['valorunit']; ?></td>
							<td><?php echo $item['valortotal']; ?></td>
							<td>
        						<div class="btn-group">
        							<a href="<?php echo BASE_URL.'compras/edit/'.$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
        						</div>
        					</td>
        				</tr>
                    <?php endforeach; ?>
        		</table>
        	</div>
        </div>	
    </section>
