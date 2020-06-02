<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pedidos
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista de pedidos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <!--filters start-->
                
                <div class="col-sm-12 box_filter">
                    <form method="GET">       
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Filtros</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-sm-4 box_filter">
                                    <div class="form-group">
                                        <label>Data inicial</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                            </div>
                                                <input type="text" value="<?php echo $initial_date;?>" name="initial_date" class="form-control datepicker"  maxlength="10">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Data final</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                            </div>
                                                <input type="text" value="<?php echo $final_date;?>" name="final_date" class="form-control datepicker"  maxlength="10">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 box_filter" style="padding-left:10px;">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="">Todos</option>
                                            <?php foreach($order_status as $item){?>
                                                <option value="<?php echo $item['code'];?>" <?php echo ($item['code'] == $payment_status)?'selected':'';?>><?php echo $item['name'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Busca</label>
                                        
                                        <input type="text" name="search" value="<?php echo $search;?>" class="form-control" placeholder="Buscar">

                                        
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Filtrar</button>
                                </div> 
                            </div>
                        </div>
                    </form>   
                
               
                <!--filters end-->
                
                <?php if(!empty($list)){?>
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Nº Pedido</th>
                                <th>Data do pedido</th>
                                <th>Comprador</th>
                                <th>Valor</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                            <?php foreach($list as $item){?>
                                <tr>
                                    <td><?php echo "#".$item['id']?></td>
                                    <td><?php echo date("d/m/Y", strtotime($item['date_added']));?></td>
                                    <td><?php echo $item['user']?></td>
                                    <td>R$ <?php echo number_format($item['total_amount'], '2', ',', '.');?></td>
                                    <td>
                                        
                                        <?php 
                                            $color = '';
                                            foreach($order_status as $order_s){
                                                if($order_s['code'] === $item['payment_status']){
                                                    if($item['payment_status'] == 1){
                                                        
                                                        $color = '<span class="label label-warning">'.$order_s['tag_panel'].'';
                                                    }
                                                    if($item['payment_status'] == 3){
                                                        $color = '<span class="label label-success">'.$order_s['tag_panel'].'';
                                                    }
                                                    if($item['payment_status'] == 6 || $item['payment_status'] == 5 || 
                                                        $item['payment_status'] == 7 || $item['payment_status'] == 8 || $item['payment_status'] == 9){

                                                        $color = '<span class="label label-danger">'.$order_s['tag_panel'].'';

                                                    }
                                                    if($item['payment_status'] == 100 || $item['payment_status'] == 101 || 
                                                        $item['payment_status'] == 102 || $item['payment_status'] == 103){
                                                        
                                                            $color = '<span class="label label-primary">'.$order_s['tag_panel'].''; 
                                                             
                                                    }
                                                    echo $color.$order_s['name'];
                                                }
                                            }
                                            
                                            
                                        ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if($user->hasPermission('gerenciar_pedidos')){?>
                                            <div class="btn-group">
                                                <a href="<?php echo BASE_URL;?>purchases/manage/<?php echo $item['id'];?>" class="btn btn-xs btn-edit">Gerenciar  <i class="fa fa-fw fa-pencil-square-o"></i></a>
                                            </div>
                                        <?php }?>
                                    </td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                <?php } else {?>
                    <div class="callout callout-info">
                        <h4><i class="icon fa fa-warning"></i>Nenhum pedido encontrado!</h4>
                    </div>
                <?php }?>
            
            
                <?php if(!empty($list)){$exibir = 3;?>
                    <div class="box-footer clearfix">

                        <ul class="pagination pagination-sm no-margin pull-right">

                            <li class="<?php echo($currentPage==1)?'disabled':'';?>">

                                <a <?php $ant = $currentPage - 1; echo($currentPage==1)?:"href=".BASE_URL."purchases?pagina=".$ant."&initial_date=".$initial_date."&final_date=".$final_date."&search=".$search."&status=".$payment_status;?>>Anterior
                                </a>

                            </li>

                            <?php for($q=$currentPage-$exibir;$q<=$currentPage-1;$q++){?>

                                <?php if($q > 0){?>

                                    <li ><a href="<?php echo BASE_URL."purchases?pagina=".$q."&initial_date=".$initial_date."&final_date=".$final_date."&search=".$search."&status=".$payment_status;?>"><?php echo $q;?></a></li>

                                <?php }?>

                            <?php }?>

                                <!--Página atual-->
                                <li class="active"><a ><?php echo $currentPage;?></a></li>

                            <?php for($q = $currentPage+1; $q < $currentPage+$exibir; $q++){?>

                                <?php if($q <= $numberOfPages){?>

                                    <li ><a href="<?php echo BASE_URL."purchases?pagina=".$q."&initial_date=".$initial_date."&final_date=".$final_date."&search=".$search."&status=".$payment_status;?>"><?php echo $q;?></a></li>

                                <?php }?>
                                
                            <?php }?>

            
                            <li class="<?php if($currentPage>=$numberOfPages){echo "disabled";}?>">

                                <a 
                                    <?php $pro = $currentPage + 1;
                                    echo($currentPage>=$numberOfPages)?:"href=".BASE_URL."purchases?pagina=".$pro."&initial_date=".$initial_date."&final_date=".$final_date."&search=".$search."&status=".$payment_status."";?> class="<?php if($currentPage>=$numberOfPages){echo "disabled";}?>">Próximo
                                </a>
                            
                            </li>

                        </ul>
                    </div>
                <?php }?>
            </div>
            <!-- /.box-body -->
        </div>
    </section>

    <script type="text/javascript">
        <?php if(!empty($success)){?>
            alert('<?php echo $success;?>');
        <?php }?>
    </script>