<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Contas
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Contas</h3>
        		<div class="box-tools">
        			<a href="<?php echo BASE_URL."contas/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
                        <th>Banco</th>
                        <th>Agência</th>
                        <th>Operação</th>
                        <th>Número</th>
                        <th>Status</th>
                       
        				<th width="130">Ações</th>
        			</tr>
                    <?php foreach ($list as $item) {?>
                        <tr>
                            <td><?php echo $item['banco'];?></td>
                            <td><?php echo $item['agencia'];?></td>
                            <td><?php echo $item['operacao'];?></td>
                            <td><?php echo $item['numero'];?></td>
                            <td><?php echo $item['status_conta'];?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?php echo BASE_URL."contas/edit/".$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
                                    <a href="<?php echo BASE_URL."contas/del/".$item['id']?>" class="btn btn-xs btn-danger <?php echo ($item['b'] > 0)?'disabled':'';?>"  onclick="return confirm('Tem certeza que deseja excluir ?')" >Excluir</a>
                                </div>
                            </td>
                        </tr>
                    <?php }?>
        		</table>
        	</div>
        </div>	
    </section>
