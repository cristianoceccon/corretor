<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Produtos
    </h1>

</section>
    <!-- Main content --> 
    <section class="content container-fluid">
        <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Entradas</h3>
        		<div class="box-tools">
                 <!-- <a href="<?php echo BASE_URL."colors"?>" class="btn btn-primary">Cores</a>
                    <a href="<?php echo BASE_URL."options"?>" class="btn btn-primary">Opções do produto</a>
                 -->
                    <a href="<?php echo BASE_URL."products/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
        		<table id="example1" class="table table-bordered table-striped dataTable">
                    <thead > 
        			<tr>
                        <th>Descrição</th>
                        <th>Valor</th>
        			<!--	<th>Estoque</th>
                        <th>Preço</th>
                        <th>Imagem</th>
        				<th>Ações</th> -->
        			</tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $item) {?>
                        <tr>
                            <td><?php echo $item['name_descricao'];?></td>
                            <td><?php echo $item['valor'];?><br/><small></small></td>
                          <!--   <td><?php echo $item['stock'];?></td>
                            <td>
                                <small><strike>R$ <?php echo ($item['price_promotion'] >= '00.01')?number_format($item['price_sale'], 2, ',', '.'):'';?></strike></small>
                                <br/>
                                R$ <?php echo ($item['price_promotion'] >= '00.01')?number_format($item['price_promotion'], 2, ',', '.'):number_format($item['price_sale'], 2, ',', '.');?>
                            </td>
                            <td><?php echo (!empty($item['url']))?'<img src="'.BASE_URL_SITE.'media/products/'.$item['url'].'" class="img_list_products">':'';?></td>
                            <td> 
                                <div class="btn-group">
                                    <a href="<?php echo BASE_URL."products/edit/".$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
                                    <a href="<?php echo BASE_URL."products/del/".$item['id']?>" class="btn btn-xs btn-danger"  onclick="return confirm('Tem certeza que deseja excluir ?')" >Excluir</a>
                                </div>
                            </td> 
                    -->
                        </tr>
                    <?php }?>
                </tbody>
        		</table>
        	</div>
        </div>	
    </section>
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.js"></script>
    <script src="<?php echo BASE_URL;?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
  jQuery(document).ready(function(){
      

    jQuery('#example1').DataTable({
        "order": [],
      "scrollX": true,
      "columnDefs": [ { orderable: false, targets: [5]}],
      "language": {
        "sProcessing":   "Processando...",
        "sLengthMenu":   "Mostrar _MENU_ registros",
        "sZeroRecords":  "Não foram encontrados resultados",
        "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
        "sInfoFiltered": "",
        "sInfoPostFix":  "",
        "sSearch":       "Buscar:",
        "sUrl": "",
          "paginate": {
            "previous": "Anterior",
            "next": "Próximo"
          }
      }
      
    });
  });
</script>

-->