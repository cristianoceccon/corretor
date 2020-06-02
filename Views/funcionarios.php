<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Funcionários
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Lista de Funcionários</h3>
        		<div class="box-tools">
        	<a href="<?php echo BASE_URL."funcionarios/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
						<th>Nome do Funcionários</th>
						<th>Cidade</th>
						<th>Celular</th>
        				<th width="130">Ações</th>
        			</tr>
        			<?php foreach($list as $item): ?>
        				<tr>
							<td><?php echo $item['nome']; ?></td>
							<td><?php echo $item['cidade']; ?></td>
							<td><?php echo $item['telefone_celular_1']; ?></td>
							<td>
        						<div class="btn-group">
        							<a href="<?php echo BASE_URL.'funcionarios/edit/'.$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
        						</div>
        					</td>
        				</tr>
                    <?php endforeach; ?>
        		</table>
        	</div>
        </div>	
    </section>
