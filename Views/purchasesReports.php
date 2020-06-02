<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Relatórios
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Relatório de pedidos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <!--filters start-->
                <div class="row">
                    <form method="GET" action="<?php echo BASE_URL;?>reports/purchasesPdf" target="_blank" >       
                        
                        <div class="col-sm-6 ">
                            <div class="form-group">
                                <label>Status do pedido</label>
                                <select name="status" class="form-control">
                                    <option value="">Todos</option>
                                    <?php foreach($order_status as $item){?>
                                        <option value="<?php echo $item['code'];?>" ><?php echo $item['name'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                            
                        </div>

                        <div class="col-sm-6" >
                            <div class="form-group">
                                <label>Tipo de cliente</label>
                                <select name="client_type" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="SITE">Site</option>
                                    <option value="VENDEDOR">Vendedor</option>
                                </select>
                            </div>
                            
                        </div>

                        <div class="col-sm-3 ">
                            <div class="form-group">
                                <label>Data inicial</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                    </div>
                                        <input type="text"  name="initial_date" class="form-control datepicker"  maxlength="10">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3 ">
                            <div class="form-group">
                                <label>Data final</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                    </div>
                                        <input type="text"  name="final_date" class="form-control datepicker"  maxlength="10">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Gerar Relatório</button>
                            </div>
                        </div>

                    </form>   
                <!--filters end-->
                </div>
            <!-- /.box-body -->
            </div>
        </div>
    </section>

    <script type="text/javascript">
        <?php if(!empty($success)){?>
            alert('<?php echo $success;?>');
        <?php }?>
    </script>