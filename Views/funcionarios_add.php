<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Funcionários  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."funcionarios/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Novo Funcionário</h3>
        		    <div class="box-tools">
                    <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('nome', $errorItems))?'has-error':'';?>">
                        <label for="nome_name">Nome</label>
                        <input type="text" name="nome" class="form-control" id="nome_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('funcionarios', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

        		    <div class="form-group <?php echo (in_array('cpf', $errorItems))?'has-error':'';?>">
                        <label for="cpf_name">Cpf</label>
                        <input type="text" name="cpf" data-mask="000.000.000-00" data-mask-selectonfocus="true" class="form-control" id="cpf_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('funcionarios', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

        		    <div class="form-group <?php echo (in_array('rg', $errorItems))?'has-error':'';?>">
                        <label for="rg_name">RG</label>
                        <input type="text" name="rg" class="form-control" id="rg_name">
                    </div>

        		    <div class="form-group <?php echo (in_array('data_nasc', $errorItems))?'has-error':'';?>">
                        <label for="data_nasc_name">Data de Nascimento</label>
                        <input type="date" name="data_nasc" class="form-control" id="data_nasc_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('funcionarios', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('nome_pai', $errorItems))?'has-error':'';?>">
                        <label for="nome_pai_name">Nome do Pai</label>
                        <input type="text" name="nome_pai" class="form-control" id="nome_pai_name">
                    </div>

                    <div class="form-group <?php echo (in_array('nome_mae', $errorItems))?'has-error':'';?>">
                        <label for="nome_mae_name">Nome da Mãe</label>
                        <input type="text" name="nome_mae" class="form-control" id="nome_mae_name">
                    </div>

                    <div class="form-group <?php echo (in_array('cep', $errorItems))?'has-error':'';?>">
                        <label for="cep_name">Cep</label>
                        <input type="text" name="cep" data-mask="00000-000" data-mask-selectonfocus="true" class="form-control" id="cep_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('funcionarios', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('estado', $errorItems))?'has-error':'';?>">
                        <label for="estado_name">Estado</label>
                        <input type="text" name="estado" class="form-control" id="estado_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('funcionarios', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('cidade', $errorItems))?'has-error':'';?>">
                        <label for="cidade_name">Cidade</label>
                        <input type="text" name="cidade" class="form-control" id="cidade_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('funcionarios', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('endereco', $errorItems))?'has-error':'';?>">
                        <label for="endereco_name">Endereço</label>
                        <input type="text" name="endereco" class="form-control" id="endereco_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('funcionarios', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('numero_end', $errorItems))?'has-error':'';?>">
                        <label for="numero_end_name">Número</label>
                        <input type="text" name="numero_end" class="form-control" id="numero_end_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('funcionarios', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('complemento', $errorItems))?'has-error':'';?>">
                        <label for="complemento_name">Complemento</label>
                        <input type="text" name="complemento" class="form-control" id="complemento_name">
                    </div>

                    <div class="form-group <?php echo (in_array('bairro', $errorItems))?'has-error':'';?>">
                        <label for="bairro_name">Bairro</label>
                        <input type="text" name="bairro" class="form-control" id="bairro_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('funcionarios', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('telefone_fixo', $errorItems))?'has-error':'';?>">
                        <label for="telefone_fixo_name">Telefone fixo</label>
                        <input type="text" name="telefone_fixo" data-mask="(00) 0000-0000" data-mask-selectonfocus="true" class="form-control" id="telefone_fixo_name">
                    </div>

                    <div class="form-group <?php echo (in_array('telefone_celular_1', $errorItems))?'has-error':'';?>">
                        <label for="telefone_celular_1_name">Celular 1</label>
                        <input type="text" name="telefone_celular_1" data-mask="(00) 00000-0000" class="form-control" id="telefone_celular_1_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('funcionarios', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('telefone_celular_2', $errorItems))?'has-error':'';?>">
                        <label for="telefone_celular_2_name">Celular 2</label>
                        <input type="text" name="telefone_celular_2" data-mask="(00) 00000-0000" class="form-control" id="telefone_celular_2_name">
                    </div>

                    <div class="form-group <?php echo (in_array('email', $errorItems))?'has-error':'';?>">
                        <label for="email_name">Email</label>
                        <input type="email" name="email" class="form-control" id="email_name">
                    </div>

            </div>	
        </form>
    </section>
