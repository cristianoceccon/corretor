<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Permissões
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Itens de Permissões</h3>
        		<div class="box-tools">
				<input type="button" align="right" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			<a href="<?php echo BASE_URL."permissions/items_add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
        				<th>Nome do item Permissão</th>
        				<th width="400">Slug</th>
        				<th width="130">Ações</th>
        			</tr>
        			<?php foreach($list as $item){
                        if($item['slug'] != 'permissoes'){?>
        				<tr>
        					<td><?php echo $item['name'];?></td>
        					<td><?php echo $item['slug'];?></td>
        					<td>
        						<div class="btn-group">
        							<a href="<?php echo BASE_URL."permissions/items_edit/".$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
        							<a href="<?php echo BASE_URL."permissions/items_del/".$item['id']?>" class="btn btn-xs btn-danger"  onclick="return confirm('Tem certeza que deseja excluir ?')" >Excluir</a>
        						</div>
        					</td>
        				</tr>
        		    <?php }}?>
        		</table>
        	</div>
        </div>	
    </section>
