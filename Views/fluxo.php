<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    
    Fluxo de Caixa
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Fluxo de Caixa</h3>
        		<div class="box-tools">
                    <a href="<?php echo BASE_URL."fluxo/add"?>" class="btn btn-success">Lançar Entrada</a>
                    <a href="<?php echo BASE_URL."fluxo/del"?>" class="btn btn-success">Lançar Saída</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
        				<th>Data de Lançamento</th>
                        <th>Descrição</th>
                        <th>Valor Entrada</th>
                        <th>Valor Saída</th>
                        <th>Saldo</></th>
        			</tr>
                    <?php foreach ($list as $item) {?>
                        <tr>
                            <td><?php echo $item ['datalancamento'];?></td>
                            <td><?php echo $item['descricao'];?></td>
                            <td><?php echo $item['valorentrada'];?></td>
                            <td><?php echo $item['valorsaida'];?></td>
                            <td><?php echo $item['saldo'];?></td>
                            <td>
                            </td>
                        </tr>
                    <?php }?>
        		</table>
        	</div>
        </div>	
    </section>
