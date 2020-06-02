<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Planos Categoria
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
        		<h3 class="box-title">Lista de planos categoria</h3>
        		<div class="box-tools">
        	<a href="<?php echo BASE_URL."planoscategoria/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
						<th>Nome</th>
						
        				<th width="130">Ações</th>
        			</tr>
        			<?php foreach($list as $item): ?>
        				<tr>
							<td><?php echo $item['nome']; ?></td>
							<td>
        						<div class="btn-group">
        							<a href="<?php echo BASE_URL.'planoscategoria/edit/'.$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
        						</div>
        					</td>
        				</tr>
                    <?php endforeach; ?>
        		</table>
        	</div>
        </div>	
    </section>
