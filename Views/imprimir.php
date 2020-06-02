<?php

use Mpdf\Mpdf;

ob_start();
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Vendas
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Lista das Vendas</h3>
        		<div class="box-tools">
        	<a href="<?php echo BASE_URL."pedidos/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table class="table">
        			<tr>
						<th>Número Pedido</th>
						<th>Cliente</th>
						<th>Valor Total</th>
						<th>Status</th>
												
        				<th width="130">Ações</th>
        			</tr>
        			<?php foreach($list as $item): ?>
        				<tr>
							<td><?php echo $item['id'];?></td>
							<td><?php echo $item['cliente']['nome']; ?></td>
							<td>R$ <?php echo number_format($item['valor_total'], '2', ',', '.'); ?></td>
							<td><?php echo $item['id_status_pedido'];?></td>
							<td>
        						<div class="btn-group">
								<a href="<?php echo BASE_URL.'pedidos/del/'.$item['id']?>" class="btn btn-xs btn-danger" onclick="return confirm('Tem certeza que deseja excluir ?')" >Excluir</a></a>
								<a href="<?php echo BASE_URL.'pedidos/edit/'.$item['id']?>" class="btn btn-xs btn-primary">Gerenciar</a>
								<a href="<?php echo BASE_URL.'pedidos/imp/'.$item['id']?>" class="btn btn-xs btn-warning">Imprimir</a>
								<a href="<?php echo BASE_URL.'arquivoteste2.pdf'?>" class="btn btn-xs btn-warning">Imprimir</a>
							</div>
        					</td>
        				</tr>
                    <?php endforeach; ?>
        		</table>
        	</div>
        </div>	
    </section>


<?php
$html = ob_get_contents();
ob_end_clean();

require 'vendor/autoload.php';

$mpdf = new Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('arquivoteste.pdf', 'F');
?>