<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ordens de Serviço
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
        	<div class="box-header">
				<a href="<?php echo BASE_URL."ordens/baixados"?>" class="btn btn-danger">Ordens Baixadas</a>
				<a href="<?php echo BASE_URL."ordens/"?>" disabled class="btn btn-warning">Ordens Abertas</a>
        		<div class="box-tools">
        		<a href="<?php echo BASE_URL."ordens/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
						<th>Data</th>
						<th>Hora</th>
						<th>Cliente</th>
						<th>Descrição</th>
						
        				<th width="130">Ações</th>
        			</tr>
        			<?php foreach($list as $item): ?>
        				<tr>
							<td><?php echo date("d/m/Y", strtotime($item['data_execucao'])); ?></td>
							<td><?php echo $item['hora_execucao']; ?></td>
							<td><?php echo $item['nome_cliente']; ?></td>
							<td><?php echo $item['descricao']; ?></td>
							<td>
        						<div class="btn-group">
									<a href="<?php echo BASE_URL.'ordens/edit/'.$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
									<a href="<?php echo BASE_URL.'ordens/baixar/'.$item['id']?>" class="btn btn-xs btn-danger">Baixar</a>
        						</div>
        					</td>
        				</tr>
                    <?php endforeach; ?>
        		</table>
        	</div>
		</div>	
		
		<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
		<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_data_ordem_correta.js"></script> 		

    </section>
