<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ordens
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
        	<div class="box-header">
				<a href="<?php echo BASE_URL."ordens/baixados"?>" disabled class="btn btn-danger">Ordens Baixadas</a>
				<a href="<?php echo BASE_URL."ordens/"?>"  class="btn btn-warning">Ordens Abertas</a>
        		<div class="box-tools">
        		<a href="<?php echo BASE_URL."ordens/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
					<th>Data de Execução</th>
						<th>Cliente</th>
						<th>Valor</th>
						<th>Informação</th>
        			</tr>
        			<?php foreach($list as $item): ?>
        				<tr>
							<td><?php echo date("d/m/Y", strtotime($item['data_fechamento'])); ?></td>
							<td><?php echo $item['nome_cliente']; ?></td>
							<td><?php echo $item['valor']; ?></td>
							<td><?php echo $item['informacao']; ?></td>
        				</tr>
                    <?php endforeach; ?>
        		</table>
        	</div>
		</div>	
		
		<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
		<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_data_ordem_correta.js"></script> 		

    </section>
