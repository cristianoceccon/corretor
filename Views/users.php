<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Usuários
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
        	<div class="box-header">
                <h3 class="box-title">Usuários</h3>
                <?php if($user->hasPermission('add_usuarios')){?>
                    <div class="box-tools">
                        <a href="<?php echo BASE_URL."users/add"?>" class="btn btn-success">Adicionar</a>
                    </div>

                <?php }?>
        	</div>
        	<div class="box-body">
        		<table id="example1" class="table table-bordered table-striped dataTable">
                    <thead > 
        			<tr>
                        <th width="8%">ID</th>
                        <th width="30%" align="center">Nome</th>
                        <th width="30%">Vendedor</th>
                        <th>Status</th>
        				<th width="15%" align="right">Ações</th>
        			</tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $item) {?>
                        <?php if($_SESSION['id_user'] !== $item['id']){?>
                            <tr>
                                <td><?php echo $item['id'];?></td>
                                <td><?php echo $item['name'];?></td>
                                <td><?php echo str_replace('A', 'Ã', $item['salesman']);?></td>
                                <td><?php 
                                        if($item['status'] === 'ATIVO'){
                                            echo '<span class="label label-success">'.$item['status'].'</span>';
                                        } else {
                                            echo '<span class="label label-danger">'.$item['status'].'</span>';
                                        }
                                    ?>
                                </td>
                                <td >
                                    <?php if($user->hasPermission('editar_usuarios')){?>
                                        <div class="btn-group">
                                            <a href="<?php echo BASE_URL."users/edit/".$item['id']?>" class="btn btn-xs btn-primary">Editar <i class="fa fa-fw fa-pencil-square-o"></i></a>
                                        
                                        </div>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php }?>
                    <?php }?>
                </tbody>
        		</table>
        	</div>
        </div>	
    </section>
    <script type="text/javascript" src="<?php echo BASE_URL;?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.js"></script>
    <script src="<?php echo BASE_URL;?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
    <?php if(!empty($success)){?>
        alert('<?php echo $success;?>');
    <?php }?>

    jQuery(document).ready(function(){
        

        jQuery('#example1').DataTable({
            "order": [],
        "scrollX": true,
        "columnDefs": [ { orderable: false, targets: [4]}],
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
