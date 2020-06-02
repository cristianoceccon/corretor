<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Adicionar novo usuário
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."users/add_action"?>" method="POST">
            <div class="box box-info">
        	    <div class="box-header">
                    <h3 class="box-title">Dados pessoais</h3>
        		    <div class="box-tools">
                    <input type="button" align="right" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" id="submit_form" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">

        		    <div class="form-group <?php echo (in_array('name', $errorItems))?'has-error':'';?>">
                        <label for="user_name">Nome do usuário</label>
                        <input type="text" name="name" value="<?php echo $dados['name'];?>" class="form-control" id="user_name" required>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('name', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Preencha este campo!</span>
                    </div>

                    <div class="form-group <?php echo (in_array('register', $errorItems))?'has-error':'';?>">
                        <label for="user_register">CPF</label>
                        <input type="text" name="register" value="<?php echo $dados['register'];?>" class="form-control" id="user_register" required>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('register', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Preencha este campo!</span>
                        <div class="invalid" <?php echo (in_array('register_existe', $errorItems))?'style="display:block;"':'style="display:none;"';?>>CPF já existe</div>
                    </div>

                    <div class="form-group <?php echo (in_array('data_nasc', $errorItems))?'has-error':'';?>">
                        <label for="user_data_nasc">Data de nascimento</label>
                        <input type="text" name="data_nasc" value="<?php echo $dados['data_nasc'];?>" class="form-control datepicker" id="user_data_nasc" required>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('data_nasc', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Preencha este campo!</span>
                    </div>

                    

                    <div class="form-group <?php echo (in_array('email', $errorItems))?'has-error':'';?>">
                        <label for="user_email">Email do usuário</label>
                        <input type="email" name="email" value="<?php echo $dados['email'];?>" class="form-control" id="user_email" required>
                        <div class="invalid" <?php echo (in_array('email_invalid', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Email inválido</div>
                        <div class="invalid" <?php echo (in_array('email_existe', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Email já existe</div>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('email', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Preencha este campo!</span>
                    </div>

        	    </div>
            </div>

            <div class="box box-danger">
        	    <div class="box-header">
        		    <h3 class="box-title">Permissões</h3>
        	    </div>
        	    <div class="box-body">
                    <div class="form-group <?php echo (in_array('permission', $errorItems))?'has-error':'';?>">
                        <label for="user_permission">Permissão do usuário</label>
                        <select name="permission" class="form-control" id="user_permission" required>
                            <?php foreach($permissions as $p){?>
                                <option value="<?php echo $p['id'];?>" <?php echo ($p['id'] === $dados['permission'])?'selected':'';?>><?php echo $p['name'];?></option>
                            <?php }?>
                        </select>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('permission', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Preencha este campo!</span>
                    </div>

                    <div class="form-group <?php echo (in_array('salesman', $errorItems))?'has-error':'';?>">
                        <label for="user_salesman">Vendedor</label>
                        <select name="salesman" class="form-control" id="user_salesman" required>
                            <option value="SIM" <?php echo ($dados['salesman'] === 'SIM')?'selected':'';?>>SIM</option>
                            <option value="NAO" <?php echo ($dados['salesman'] === 'NAO')?'selected':'';?>>NÃO</option>
                        </select>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('salesman', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Preencha este campo!</span>
                    </div>

                    <div class="form-group <?php echo (in_array('catalog', $errorItems))?'has-error':'';?>">
                        <label for="user_catalog">Permissão de catálogo</label>
                        <select name="catalog" class="form-control" id="user_catalog" required>
                            <option value="1000">Todos</option>
                            <?php foreach($catalog as $c){?>
                                <option value="<?php echo $c['id'];?>" <?php echo ($c['id'] === $dados['catalog'])?'selected':'';?>><?php echo $c['name_catalog'];?></option>
                            <?php }?>
                        </select>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('catalog', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Preencha este campo!</span>
                    </div>
                </div>
            </div>	

            <div class="box box-primary">
        	    <div class="box-header">
        		    <h3 class="box-title">Pagamento</h3>
        	    </div>
        	    <div class="box-body">
                    <?php foreach($payments as $pay){?>
                        <div class="form-group">
                            <label for="user_payment<?php echo $pay['id'];?>"><?php echo $pay['payment_type'];?></label>
                            <input type="checkbox" name="payment_type[<?php echo $pay['id'];?>]" value="" id="user_payment<?php echo $pay['id'];?>" onclick="selectInstallments('<?php echo $pay['id'];?>')"/>
                                <?php if($pay['payment_type'] != "Boleto" && $pay['payment_type'] != "Cartão de crédito"){?>
                                    <label for="user_installments<?php echo $pay['id'];?>" class="user_installments<?php echo $pay['id'];?>" style="display:none;">Parcelas</label>
                                    <select class="form-control payment_select_<?php echo $pay['id'];?>" onclick="qtdInstallments('<?php echo $pay['id'];?>')" id="user_installments<?php echo $pay['id'];?>" style="display:none;">
                                        <?php for($i=1;$i <= 12;$i++){?>
                                            <option value="<?php echo $i;?>"><?php echo $i.'x';?></option>
                                        <?php }?>
                                    </select>
                                <?php }?>
                        </div>
                    <?php }?>
                </div>
            </div>

            <div class="box box-primary">
        	    <div class="box-header">
        		    <h3 class="box-title">Dados de acesso</h3>
        	    </div>
        	    <div class="box-body">
                    <div class="form-group <?php echo (in_array('password', $errorItems))?'has-error':'';?>">
                        <label for="user_password">Senha do usuário <small>(mínimo 6 caracteres)</small></label>
                        <input type="password" name="password" class="form-control" id="user_password" required>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('password', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Preencha este campo!</span>
                        <div id="senha" class="aviso_senha" <?php echo (in_array('strlen_pass', $errorItems))?'style="display:block;"':'style="display:none;"';?>>A senha deve ter 6 caracteres.</div>
                        <div id="img_aviso" style="display:none"><img class="img_ok" src="<?php echo BASE_URL;?>assets/image/ok.png"></div>
                    </div>

                    <div class="form-group <?php echo (in_array('c_password', $errorItems))?'has-error':'';?>">
                        <label for="user_c_password">Confirmação da senha <small>(mínimo 6 caracteres)</small></label>
                        <input type="password" name="c_password" class="form-control" id="user_c_password" required>
                        <span class="help-block" id="indisponivel" <?php echo (in_array('c_password', $errorItems))?'style="display:block;"':'style="display:none;"';?>>Preencha este campo!</span>
                        <div id="img_aviso_confirm" style="display:none"><img class="img_ok" src="<?php echo BASE_URL;?>assets/image/ok.png"></div>
                        <div id="aviso" <?php echo (in_array('v_password', $errorItems))?'style="display:block;"':'style="display:none;"';?> >As senhas devem ser iguais.</div>
                    </div>
                </div>
            </div>
        </form>
    </section>
