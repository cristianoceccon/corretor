<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Clientes  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form method="POST" action="<?php echo BASE_URL; ?>clientes/edit_action/<?php echo $info['id']; ?>">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Editar Cliente</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar" onclick="return confirm('Tem certeza que deseja salvar?')">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('nome', $errorItems))?'has-error':'';?>">
                        <label for="nome_name">Nome</label>
                        <input type="text" name="nome" value="<?php echo $info['nome']; ?>" class="form-control" id="nome_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('clientes', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

        		    <div class="form-group <?php echo (in_array('cpf', $errorItems))?'has-error':'';?>">
                        <label for="cpf_name">Cpf</label>
                        <input type="text" name="cpf" data-mask="000.000.000-00" data-mask-selectonfocus="true" value="<?php echo $info['cpf']; ?>"  class="form-control" id="cpf_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('clientes', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

        		    <div class="form-group <?php echo (in_array('rg', $errorItems))?'has-error':'';?>">
                        <label for="rg_name">RG</label>
                        <input type="text" name="rg" value="<?php echo $info['rg']; ?>" class="form-control" id="rg_name">
                    </div>

        		    <div class="form-group <?php echo (in_array('data_nasc', $errorItems))?'has-error':'';?>">
                        <label for="data_nasc_name">Data de Nascimento</label>
                        <input type="date" name="data_nasc" value="<?php echo $info['data_nasc']; ?>"  class="form-control" id="data_nasc_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('clientes', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('nome_pai', $errorItems))?'has-error':'';?>">
                        <label for="nome_pai_name">Nome do Pai</label>
                        <input type="text" name="nome_pai" value="<?php echo $info['nome_pai']; ?>" class="form-control" id="nome_pai_name">
                    </div>

                    <div class="form-group <?php echo (in_array('nome_mae', $errorItems))?'has-error':'';?>">
                        <label for="nome_mae_name">Nome da Mãe</label>
                        <input type="text" name="nome_mae" value="<?php echo $info['nome_mae']; ?>" class="form-control" id="nome_mae_name">
                    </div>

                    <div class="form-group <?php echo (in_array('cep', $errorItems))?'has-error':'';?>">
                        <label for="cep_name">Cep</label>
                        <input type="text" name="cep" data-mask="00000-000" data-mask-selectonfocus="true" value="<?php echo $info['cep']; ?>" class="form-control" id="cep_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('clientes', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('estado', $errorItems))?'has-error':'';?>">
                        <label for="estado_name">Estado</label>
                        <input type="text" name="estado" value="<?php echo $info['estado']; ?>" class="form-control" id="estado_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('clientes', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('cidade', $errorItems))?'has-error':'';?>">
                        <label for="cidade_name">Cidade</label>
                        <input type="text" name="cidade" value="<?php echo $info['cidade']; ?>" class="form-control" id="cidade_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('clientes', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('endereco', $errorItems))?'has-error':'';?>">
                        <label for="endereco_name">Endereço</label>
                        <input type="text" name="endereco" value="<?php echo $info['endereco']; ?>" class="form-control" id="endereco_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('clientes', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('numero_end', $errorItems))?'has-error':'';?>">
                        <label for="numero_end_name">Número</label>
                        <input type="text" name="numero_end" value="<?php echo $info['numero_end']; ?>" class="form-control" id="numero_end_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('clientes', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('complemento', $errorItems))?'has-error':'';?>">
                        <label for="complemento_name">Complemento</label>
                        <input type="text" name="complemento" value="<?php echo $info['complemento']; ?>" class="form-control" id="complemento_name">
                    </div>

                    <div class="form-group <?php echo (in_array('bairro', $errorItems))?'has-error':'';?>">
                        <label for="bairro_name">Bairro</label>
                        <input type="text" name="bairro" value="<?php echo $info['bairro']; ?>" class="form-control" id="bairro_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('clientes', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('telefone_fixo', $errorItems))?'has-error':'';?>">
                        <label for="telefone_fixo_name">Telefone fixo</label>
                        <input type="text" name="telefone_fixo" data-mask="(00) 0000-0000" data-mask-selectonfocus="true" value="<?php echo $info['telefone_fixo']; ?>" class="form-control" id="telefone_fixo_name">
                    </div>

                    <div class="form-group <?php echo (in_array('telefone_celular_1', $errorItems))?'has-error':'';?>">
                        <label for="telefone_celular_1_name">Celular 1</label>
                        <input type="text" name="telefone_celular_1" data-mask="(00) 00000-0000" value="<?php echo $info['telefone_celular_1']; ?>" class="form-control" id="telefone_celular_1_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('clientes', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('telefone_celular_2', $errorItems))?'has-error':'';?>">
                        <label for="telefone_celular_2_name">Celular 2</label>
                        <input type="text" name="telefone_celular_2" data-mask="(00) 00000-0000" value="<?php echo $info['telefone_celular_2']; ?>" class="form-control" id="telefone_celular_2_name">
                    </div>

                    <div class="form-group <?php echo (in_array('email', $errorItems))?'has-error':'';?>">
                        <label for="email_name">Email</label>
                        <input type="email" name="email" value="<?php echo $info['email']; ?>" class="form-control" id="email_name">
                    </div>

                    SE FOR EMPRESA, É NECESSÁRIO PREENCHER OS CAMPOS ABAIXO! <br><br>
                    <div class="form-group <?php echo (in_array('razao', $errorItems))?'has-error':'';?>">
                        <label for="razao_name">Razão Social</label>
                        <input type="text" name="razao" value="<?php echo $info['razao']; ?>" class="form-control" id="razao_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('clientes', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

        		    <div class="form-group <?php echo (in_array('cnpj', $errorItems))?'has-error':'';?>">
                        <label for="cnpj_name">Cpf</label>
                        <input type="text" name="cnpj" data-mask="00.000.000/0000-00" data-mask-selectonfocus="true" value="<?php echo $info['cnpj']; ?>"  class="form-control" id="cnpj_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('clientes', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

            </div>	
        </form>
    </section>
