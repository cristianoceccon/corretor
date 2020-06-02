<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Fornecedores
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Lista de fornecedores</h3>
        		<div class="box-tools">
        	<a href="<?php echo BASE_URL."fornecedores/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
						<th>Cnpj</th>
						<th>Razão Social</th>
						<th>Nome Fantasia</th>
						<th>Cidade</th>
        				<th width="130">Ações</th>
        			</tr>
        			<?php foreach($list as $item): ?>
        				<tr>
							<td><?php echo $item['cnpj']; ?></td>
							<td><?php echo $item['razaosocial']; ?></td>
							<td><?php echo $item['fantasia']; ?></td>
							<td><?php echo $item['cidade']; ?></td>
							<td>
        						<div class="btn-group">
        							<a href="<?php echo BASE_URL.'fornecedores/edit/'.$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
        						</div>
        					</td>
        				</tr>
                    <?php endforeach; ?>
        		</table>
        	</div>
        </div>	
    </section>
