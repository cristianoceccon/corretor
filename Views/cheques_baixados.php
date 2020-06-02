<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cheques
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
        	<div class="box-header">
				<a href="<?php echo BASE_URL."cheques/baixados"?>" disabled class="btn btn-danger">Ver Cheques Baixados</a>
				<a href="<?php echo BASE_URL."cheques/"?>"  class="btn btn-warning">Cheques Não Baixados</a>
        		<div class="box-tools">
        		<a href="<?php echo BASE_URL."cheques/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
						<th>Emissão</th>
						<th>Emissor</th>
						<th>Banco</th>
						<th>Número</th>
						<th>Valor</th>
						<th>Data de Vencimento</th>
						<th>Histórico</th>
						<th>Data Baixa</th>

        			</tr>
        			<?php foreach($list as $item): ?>
        				<tr>
							<td><?php echo $item['data_emissao']; ?></td>
							<td><?php echo $item['razaosocial_fornecedor']; ?></td>
							<td><?php echo $item['banco_conta']; ?></td>
							<td><?php echo $item['numero_conta']; ?></td>
							<td>R$ <?php echo ($item['valor']); ?></td>
							<td><?php echo ($item['data_vencimento']); ?></td>
							<td><?php echo ($item['historico']); ?></td>
							<td><?php echo ($item['data_baixa']); ?></td>
        				</tr>
                    <?php endforeach; ?>
        		</table>
        	</div>
		</div>	
		
		<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jquery.mask.js"></script> 
		<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script_data_ordem_correta.js"></script> 		

    </section>
