<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Empresa
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">

       <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Minha Empresa</h3>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
						<th>Cnpj</th>
						<th>Razão Social</th>
						<th>Nome Fantasia</th>
        				<th width="130">Ações</th>
        			</tr>
        			<?php foreach($list as $item): ?>
        				<tr>
							<td><?php echo $item['cnpj']; ?></td>
							<td><?php echo $item['razaosocial']; ?></td>
							<td><?php echo $item['fantasia']; ?></td>
							<td>
        						<div class="btn-group">
        							<a href="<?php echo BASE_URL.'empresa/edit/'.$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
        						</div>
        					</td>
        				</tr>
                    <?php endforeach; ?>
        		</table>
        	</div>
        </div>	
    </section>
