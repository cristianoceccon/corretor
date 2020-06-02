<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Kits
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
        	<div class="box-header">
        		<h3 class="box-title">Kits</h3>
        		<div class="box-tools">
        			<a href="<?php echo BASE_URL."kit/add"?>" class="btn btn-success">Adicionar</a>
        		</div>
        	</div>
        	<div class="box-body">
                <?php if(!empty($list)){?>
                    <table id="example1" class="table table-bordered table-striped dataTable">
                        <thead > 
                            <tr>
                                <th>Nome do kit</th>
                                <th>Referência</th>
                                <th>Qtd. produtos</th>
                                <th>Valor</th>
                                <th>Imagem</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php foreach ($list as $item) {?>
                                <tr>
                                    <td><?php echo $item['name'];?></td>
                                    <td><?php echo $item['reference'];?></td>
                                    <td><?php echo $item['b'];?></td>
                                    <td>R$ <?php echo number_format($item['amount'], '2', ',','.');?></td>
                                    <td><img src="<?php echo BASE_URL_SITE."media/products/".$item['url'];?>" width="50"/></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo BASE_URL."kit/edit/".$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
                                            <a href="<?php echo BASE_URL."kit/del/".$item['id']?>" class="btn btn-xs btn-danger"  onclick="return confirm('Tem certeza que deseja excluir ?')" >Excluir</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                <?php } else {?>
                    <div class="callout callout-info">
                        <h4>Lista de kits esta vazia!</h4>
                    </div>
                <?php }?>
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

<script type="text/javascript">
    window.onload = function(){

        <?php if(!empty($success['msg'])){?>
            alert('<?php echo $success['msg'];?>');
        <?php }?>
        
    }  
</script>
