<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Conta
        
    </h1>
</section>
<!-- Main content -->
<section class="content container-fluid">
    
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#data" data-toggle="tab">Dados pessoais</a></li>
                <li><a href="#address" data-toggle="tab">Endereços</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="data">
                    <form method="POST" action="<?php echo BASE_URL;?>account/editAccount">
                        <div class="form-group <?php echo (!empty($error['name']))?'has-error':'';?>">
                            <label for="a_name" class="control-label">Nome Completo</label>

                            <input type="text" name="name" value="<?php echo $info['name'];?>" class="form-control" id="a_name">
                            <span class="a_error"><?php echo (!empty($error['name']))?$error['name']:'';?></span>
        
                        </div>
                        <div class="form-group">
                            <label for="a_email" class="control-label">Email</label>

                            <input type="email" value="<?php echo $info['email'];?>" class="form-control" id="a_email" disabled>
                            
                        </div>
                        <div class="form-group <?php echo (!empty($error['n_pass']))?'has-error':'';?>">
                            <label for="a_new_pass" class="control-label">Nova Senha <small>(mínimo 6 caracteres)</small></label>

                            <input type="password" name="new_pass" class="form-control" id="a_new_pass">
                            <span class="a_error"><?php echo (!empty($error['n_pass']))?$error['n_pass']:'';?></span>
                           
                        </div>

                        <div class="form-group <?php echo (!empty($error['c_pass']))?'has-error':'';?>">
                            <label for="a_repeat_pass" class="control-label">Confirmar Nova Senha <small>(mínimo 6 caracteres)</small></label>

                            <input type="password" name="c_pass" class="form-control" id="a_repeat_pass">
                            <span class="a_error"><?php echo (!empty($error['c_pass']))?$error['c_pass']:'';?></span>
                            
                        </div>
                        
                        
                        
                        <div class="form-group">
                            
                            <button type="submit" class="btn btn-success">Salvar</button>
                            
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="address">
                    
                </div>
                <!-- /.tab-pane -->

                
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
    
</section>

<script type="text/javascript">
    window.onload = function(){

        <?php if(!empty($msg)){?>
            alert('<?php echo $msg;?>');
        <?php }?>

    }
</script>