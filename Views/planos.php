<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Planos
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">

<div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Filtro</h3>
			</div>
			
        	<div class="box-body">
			<div class="col-sm-4">
			<div class="input-group input-group-sm">
                <input type="text" id="busca" data-type="pesquisar_clientes" class="form-control">
                    <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat">Pesquisar</button>
                    </span>
              </div>
		</div>
		</div>

        <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Lista de planos</h3>
        		<div class="box-tools">
        	<a href="<?php echo BASE_URL."planos/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
						<th>Nome</th>
						<th>Categoria</th>
						<th>Grupo Principal</th>
						<th>Grupo Secundário</th>
					
        				<th width="130">Ações</th>
        			</tr>
        			<?php foreach($list as $item): ?>
        				<tr>
							<td><?php echo $item['nome']; ?></td>
							<td><?php echo $item['nome_categoria']; ?></td>
							<td><?php echo ($item['nome_grupo_principal']); ?></td>
							<td><?php echo ($item['nome_grupo_secundario']); ?></td>
						<td>
        						<div class="btn-group">
        							<a href="<?php echo BASE_URL.'planos/edit/'.$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
							</div>
        					</td>
        				</tr>
                    <?php endforeach; ?>
        		</table>
        	</div>
        </div>	
    </section>
