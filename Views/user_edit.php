<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Editar usuário
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."users/edit_action/".$info['id'];?>" method="POST">
            <div class="box box-danger">
        	    <div class="box-header">
        		    <h3 class="box-title">Permissões</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" id="submit_form" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
                    <div class="form-group <?php echo (in_array('permission', $errorItems))?'has-error':'';?>">
                        <label for="user_name">Nome do usuário</label>
                        <input type="text" value="<?php echo $info['name'];?>" class="form-control" id="user_name" disabled/>
                    </div>

                    <div class="form-group <?php echo (in_array('status', $errorItems))?'has-error':'';?>">
                        <label for="user_status">Status</label>
                        <select name="status" class="form-control" id="user_status" required>
                            <option value="ATIVO" <?php echo ($dados['status'] === 'ATIVO' || $info['status'] === 'ATIVO')?'selected':'';?>>ATIVO</option>
                            <option value="INATIVO" <?php echo ($dados['status'] === 'INATIVO' || $info['status'] === 'INATIVO')?'selected':'';?>>INATIVO</option>
                        </select>
                    </div>

                    <div class="form-group <?php echo (in_array('permission', $errorItems))?'has-error':'';?>">
                        <label for="user_permission">Permissão do usuário</label>
                        <select name="permission" class="form-control" id="user_permission" required>
                            <?php foreach($permissions as $p){?>
                                <option value="<?php echo $p['id'];?>" <?php echo ($p['id'] === $dados['permission'] || $p['id'] == $info['id_permission'])?'selected':'';?>><?php echo $p['name'];?></option>
                            <?php }?>
                        </select>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('permission', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Preencha este campo!</span>
                    </div>

                    <div class="form-group <?php echo (in_array('salesman', $errorItems))?'has-error':'';?>">
                        <label for="user_salesman">Vendedor</label>
                        <select name="salesman" class="form-control" id="user_salesman" required>
                            <option value="SIM" <?php echo ($dados['salesman'] === 'SIM' || $info['salesman'] === 'SIM')?'selected':'';?>>SIM</option>
                            <option value="NAO" <?php echo ($dados['salesman'] === 'NAO' || $info['salesman'] === 'NAO')?'selected':'';?>>NÃO</option>
                        </select>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('salesman', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Preencha este campo!</span>
                    </div>

                    <div class="form-group <?php echo (in_array('catalog', $errorItems))?'has-error':'';?>">
                        <label for="user_catalog">Permissão de catálogo</label>
                        <select name="catalog" class="form-control" id="user_catalog" required>
                            <option value="1000">Todos</option>
                            <?php foreach($catalog as $c){?>
                                <option value="<?php echo $c['id'];?>" <?php echo ($c['id'] === $dados['catalog'] || $c['id'] === $info['catalog'])?'selected':'';?>><?php echo $c['name_catalog'];?></option>
                            <?php }?>
                        </select>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('catalog', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Preencha este campo!</span>
                    </div>

        	    </div>
            </div>	
            
            <div class="box box-danger">
        	    <div class="box-header">
        		    <h3 class="box-title">Pagamento</h3>
        	    </div>
        	    <div class="box-body">

                    <?php foreach($payments as $pay){?>
                        <div class="form-group">
                            <label for="user_payment<?php echo $pay['id'];?>"><?php echo $pay['payment_type'];?></label>
                            
                            <input type="checkbox" name="payment_type[<?php echo $pay['id'];?>]" value="<?php echo (isset($payments_user['payments'][$pay['id']]))?$payments_user['payments'][$pay['id']]:'';?>" id="user_payment<?php echo $pay['id'];?>" onclick="selectInstallments('<?php echo $pay['id'];?>')" <?php echo (isset($payments_user['payments'][$pay['id']]))?'checked':'';?>/>
                                <?php if($pay['payment_type'] != "Boleto" && $pay['payment_type'] != "Cartão de crédito"){?>
                                    <label for="user_installments<?php echo $pay['id'];?>" class="user_installments<?php echo $pay['id'];?>" style="display:none;">Parcelas</label>
                                    <select class="form-control payment_select_<?php echo $pay['id'];?>" onclick="qtdInstallments('<?php echo $pay['id'];?>')" id="user_installments<?php echo $pay['id'];?>"  <?php echo (isset($payments_user['payments'][$pay['id']]))?'style="display:block;"':'style="display:none;"';?>>
                                        <?php for($i=1;$i <= 12;$i++){?>
                                            <option value="<?php echo $i;?>" <?php echo((isset($payments_user['payments'][$pay['id']])) && $payments_user['payments'][$pay['id']] == $i)?'selected':'';?>><?php echo $i.'x';?></option>
                                        <?php }?>
                                    </select>
                                <?php }?>
                            
                        </div>
                    <?php }?>
                </div>
            </div>	
        </form>
    </section>
