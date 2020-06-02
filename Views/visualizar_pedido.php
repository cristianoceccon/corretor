<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Pedidos
        
    </h1>
</section>

<form method="POST" action="<?php echo BASE_URL."purchases/changeOrder/".$id;?>">
    <!-- Main content -->
    <section class="content container-fluid">

        <!--nav-tabs-custom START-->
        <div class="nav-tabs-custom">

            <!--nav nav-tabs START-->
            <ul class="nav nav-tabs">

                <li class="<?php echo (empty($msg))?'active':'';?>">
                    <a href="#detalhes_pedido" data-toggle="tab" aria-expanded="true">Detalhes</a>
                </li>

                <li class="">
                    <a href="#historico" data-toggle="tab" aria-expanded="false">Histórico</a>
                </li>

                <?php if($user->hasPermission('alterar_status_pedido')){?>

                    <li class="<?php echo (!empty($msg))?'active':'';?>">
                        <a href="#alteracoes" data-toggle="tab" aria-expanded="false">Alterações</a>
                    </li>
                    <li class="pull-right">
                        <button type="submit" onclick="return confirm('Deseja fazer as alterações?')" class="btn btn-success text-muted">Salvar alterações</button>
                    </li>

                <?php }?>

            </ul>
            <!--nav nav-tabs END-->

            <!-- tab-content START-->
            <div class="tab-content">

                <!--Detalhes do pedido START-->
                <div class="tab-pane <?php echo (empty($msg))?'active':'';?>" id="detalhes_pedido">
                    <section class="invoice" style="margin:0px;">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    Nº do pedido: <?php echo $id;?>
                                    <small class="pull-right">Data do pedido: <?php echo date("d/m/Y", strtotime($info['date_added']));?></small>
                                </h2>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                De
                                <address>
                                    <strong>Arte Borda</strong><br>
                                    <strong>Rua: </strong>Rua do Comércio, 1499<br>
                                    <strong>Bairro:</strong> Centro <br>
                                    <strong>Cidade:</strong> MODELO - SC<br>
                                    <strong>CEP:</strong> 89870000 <br>
                                    <strong>Telefone:</strong> (49) 3365-3534 <br>
                                    <strong>E-mail:</strong> vendas@arteborda.com.br
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                Para
                                <address>
                                    <strong><?php echo $info_user['name'];?></strong><br> 
                                    <strong>Rua:</strong> <?php echo $shipping_address['street'].", ".$shipping_address['number'];?><br>
                                    <strong>Bairro:</strong> <?php echo $shipping_address['district']?><br>
                                    <strong>Cidade:</strong> <?php echo $shipping_address['city']." - ".$shipping_address['state'];?><br>
                                    <strong>CEP:</strong> <?php echo $shipping_address['postalCode'];?><br>
                                    <strong>Telefone:</strong> <?php echo $shipping_address['phone'];?> <br>
                                    <strong>E-mail:</strong> <?php echo $shipping_address['email'];?>
                                </address>
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Pedido Nº  <?php echo $id;?> </b><br>
                                <br>
                                <b>Status do pedido:</b>
                                <?php foreach($order_status as $item){
                                    if($item['code'] == $info['payment_status']){
                                        echo $item['name'];
                                    }
                                }
                                ?>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Referencia</th>
                                            <th>Imagem</th>
                                            <th>Produto</th>
                                            <th>Cor</th>
                                            <th>Qtd</th>
                                            <th>Preço Unitário</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $subtotal = 0;
                                            foreach($list_products as $item){
                                                $total_p = 0;
                                                $total_p += $item['product_price'] * intval($item['quantity']);
                                                
                                                $subtotal += $total_p;
                                        ?>
                                        <tr>
                                            <td><?php echo $item['id'];?></td>
                                            <td><?php echo $item['reference'];?></td>
                                            <td><img src="<?php echo BASE_URL_SITE."media/products/".$item['imagem']['url'];?>" width="50"></td>
                                            <td><?php echo $item['name'];?></td>
                                            <td><?php echo $item['color_name']['name'];?></td>
                                            <td><?php echo $item['quantity'];?></td>
                                            <td>R$ <?php echo number_format($item['product_price'], '2', ',', '.');?></td>
                                            <td>R$ <?php echo number_format($total_p, '2', ',', '.');?></td>
                                        </tr>
                                        <?php }//fim do foreach?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-xs-6">
                            <p class="lead">Método de Pagamento:</p>
                            <?php if(!empty($payment_type['flag'])){?>
                                <img src="<?php echo BASE_URL."assets/adminlte/dist/img/credit/".$payment_type['flag'];?>">
                            <?php }?>
                            <?php 
                                if($payment_type['type'] == 'Boleto'){
                                    echo $payment_type['type'].' à vista';
                                } else {
                                    echo $payment_type['type'].' '.$qtd_cart.'x';
                                }
                                
                            ?>
                            <br>

                            <?php 
                                //verifica se existe boleto para imprimir
                                if(!empty($payment_link)){
                            ?>
                                <a href="<?php echo $payment_link?>" target="_blank">Imprimir boleto</a>
                            <?php }?>
                            
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-6">
                                <p class="lead">Valores do pedido</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td>R$ <?php echo number_format($subtotal, '2', ',', '.');?></td>
                                            </tr>
                                            <tr>
                                                <th>Frete:</th>
                                                <td>R$ <?php echo number_format($frete, '2', ',', '.');?></td>
                                            </tr>
                                            <tr>
                                                <th>Valor total do pedido:</th>
                                                <td>R$ 
                                                    <?php 
                                                    
                                                        $total = $subtotal + $frete;
                                                        echo number_format($total, '2', ',', '.');
                                                    
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php if($valor_com_desconto > 0 && $seller == false){?>
                                                <tr>
                                                    <th>Valor á receber liquído:</th>
                                                    <td>R$ 
                                                        <?php 
                                                        
                                                            echo number_format($valor_com_desconto, '2', ',', '.');
                                                        
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a onClick="window.print()" class="btn btn-default"><i class="fa fa-print"></i> Impressão</a>
                                
                            </div>
                        </div>
                    </section>
                </div>
                <!--Detalhes do pedido END-->


                <!--Histórico START-->
                <div class="tab-pane" id="historico">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Histórico do pedido</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th>Data</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php foreach($order_history as $item){?>
                                    <tr>
                                        <td><?php echo date("d/m/Y", strtotime($item['date_transaction']));?></td>
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
                                    </tr>
                                    <?php }//fim do foreach?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!--end box-->               
                </div>
                <!--Histórico END-->


                <?php 
                    //se usuário tiver permissão para alterar o status do pedido entra nesse if
                    if($user->hasPermission('alterar_status_pedido')){
                ?>
                    <!--Alterações START-->
                    <div class="tab-pane <?php echo (!empty($msg))?'active':'';?>" id="alteracoes">

                        <!--AÇÕES COM O PEDIDO START-->
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Ações com o pedido</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">

                                    <?php if($info['payment_type'] == 'boleto' && $info['payment_status'] == 1){?>
                                        <div class="col-sm-2">
                                            <a href="<?php echo BASE_URL;?>purchases/cancelTicket/<?php echo $id;?>" class="btn btn-block btn-danger" onclick="return confirm('Deseja cancelar o pagamento?')">
                                                Cancelar
                                            </a>
                                        </div>
                                        <div class="col-sm-2">
                                            <a href="<?php echo BASE_URL;?>purchases/markAsPaidTheBill/<?php echo $id;?>" onclick="return confirm('Deseja liquidar este boleto?')" class="btn btn-block btn-success">
                                                Marcar como pago
                                            </a>
                                        </div>
                                    <?php }?>
                                    
                                    <?php if($info['payment_status'] == 1 && $info['payment_type'] == 'psckttransparente'){?>
                                        <div class="col-sm-2">
                                            <a href="<?php echo BASE_URL;?>purchases/cancelPagSeguro/<?php echo $id;?>" class="btn btn-block btn-danger" onclick="return confirm('Deseja cancelar o pagamento?')">
                                                Cancelar
                                            </a>
                                        </div>
                                    <?php }?>
                                    
                                    <?php if($info['payment_type'] == 'psckttransparente' && $info['payment_status'] == 3 || $info['payment_status'] == 5 || $info['payment_status'] == 100){?>
                                        <div class="col-sm-2">
                                            <a href="<?php echo BASE_URL;?>purchases/reversePaymentPagSeguro/<?php echo $id;?>" class="btn btn-block btn-info" onclick="return confirm('Deseja estornar o pagamento?')">
                                                Estornar pagamento
                                            </a>
                                        </div>
                                    <?php }?>

                                </div>
                            </div>
                        </div>
                        <!--AÇÕES COM O PEDIDO END-->
                    
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Alterar status do pedido</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php 
                                    $disabled = 'disabled';

                                    if($info['payment_status'] == 3 || $info['payment_status'] == 100 || 
                                        $info['payment_status'] == 101 || $info['payment_status'] == 102 
                                        || $info['payment_status'] == 103)
                                    {
                                        $disabled = '';
                                    }

                                    if($info['payment_type'] == "cheque"){
                                        $disabled = '';
                                    }
                                ?>
                                    <div class="form-group">
                                        <label>Status do pedido</label>
                                        <select name="status" class="form-control" <?php echo $disabled;?>>
                                            <?php 
                                                if(!empty($disabled)){
                                                    foreach($order_status as $r){
                                                        if($info['payment_status'] == $r['code']){
                                                            echo '<option value="'.$r['code'].'" selected>'.$r['name'].'</option>';
                                                        }
                                                    }
                                                }
                                            ?>
                                            <?php 
                                                if(empty($disabled)){
                                                    foreach($order_status as $item){
                                                        if($info['payment_type'] == 'cheque' || $item['code'] == 3 || $item['code'] == 100 || $item['code'] == 101 || $item['code'] == 102 || 
                                                        $item['code'] == 103){
                                                            if($item['code'] == $info['payment_status']){
                                                                echo '<option value="'.$item['code'].'" selected>'.$item['name'].'</option>';
                                                            } else {
                                                                echo '<option value="'.$item['code'].'" >'.$item['name'].'</option>';
                                                            }
                                                        }
                                                    }
                                                }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    <!--end form-group-->
                            </div>
                            <!--end box-body-->
                        </div>
                        <!--end box-->
                        
                        <?php if($info['payment_type'] == 'boleto' && $info['payment_status'] == 1){?>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Alterar data de vencimento do boleto</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Vencimento atual</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                            </div>
                                                <input type="text" value="<?php echo date("d/m/Y", strtotime($expire_at));?>"  name="date_venc" class="form-control datepicker" disabled maxlength="10">
                                        </div>
                                    </div>
                    
                                    <div class="form-group">
                                        <label>Novo vencimento</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                            </div>
                                                <input type="text"  name="date_venc" class="form-control datepicker"  maxlength="10">
                                        </div>
                                        <?php if(!empty($error_msg)){?>
                                            <span class="help-block invalid"><?php echo $error_msg;?></span>
                                        <?php }?>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!--end box-->
                        <?php }?>
                            
                    </div>
                    <!--Alterações END-->

                <?php }//fim do if?>
            </div>
            <!-- tab-content END-->
        </div>
        <!--nav-tabs-custom END-->

    </section>
    <!-- Main content END-->
</form>

<script type="text/javascript">
    
    window.onload = function(){

        <?php if(!empty($msg)){?>
            alert('<?php echo $msg;?>');
        <?php }?>
        
    }
    
</script>