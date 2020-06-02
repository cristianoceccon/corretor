<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Fornecedores  
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form action="<?php echo BASE_URL."fornecedores/add_action"?>" method="POST">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Novo Fornecedor</h3>
        		    <div class="box-tools">
                    <input type="button" class="btn btn-warning" onClick = "history.go(-1)" value="Voltar">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('cnpj', $errorItems))?'has-error':'';?>">
                        <label for="cnpj_name">Cnpj</label>
                        <input type="text" name="cnpj" data-mask="00.000.000/0000-00" data-mask-selectonfocus="true" class="form-control" id="cnpj_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('fornecedores', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

        		    <div class="form-group <?php echo (in_array('razaosocial', $errorItems))?'has-error':'';?>">
                        <label for="razaosocial_name">Razão Social</label>
                        <input type="text" name="razaosocial" class="form-control" id="razaosocial_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('fornecedores', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

        		    <div class="form-group <?php echo (in_array('email', $errorItems))?'has-error':'';?>">
                        <label for="email_name">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email_name">
                    </div>

        		    <div class="form-group <?php echo (in_array('telefone', $errorItems))?'has-error':'';?>">
                        <label for="telefone_name">Telefone</label>
                        <input type="text" name="telefone" data-mask="(00) 0000-0000" data-mask-selectonfocus="true" class="form-control" id="telefone_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('fornecedores', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('celular', $errorItems))?'has-error':'';?>">
                        <label for="celular_name">Celular</label>
                        <input type="text" name="celular" data-mask="(00) 00000-0000" data-mask-selectonfocus="true" class="form-control" id="celular_name">
                    </div>

                    <div class="form-group <?php echo (in_array('cep', $errorItems))?'has-error':'';?>">
                        <label for="cep_name">Cep</label>
                        <input type="text" name="cep" data-mask="00000-000" data-mask-selectonfocus="true" class="form-control" id="cep_name">
                    </div>

                    <div class="form-group <?php echo (in_array('endereco', $errorItems))?'has-error':'';?>">
                        <label for="endereco_name">Endereço</label>
                        <input type="text" name="endereco" class="form-control" id="endereco_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('fornecedores', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('numero', $errorItems))?'has-error':'';?>">
                        <label for="numero_name">Número</label>
                        <input type="text" name="numero" class="form-control" id="numero_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('fornecedores', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('complemento', $errorItems))?'has-error':'';?>">
                        <label for="complemento_name">Complemento</label>
                        <input type="text" name="complemento" class="form-control" id="complemento_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('fornecedores', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('bairro', $errorItems))?'has-error':'';?>">
                        <label for="bairro_name">Bairro</label>
                        <input type="text" name="bairro" class="form-control" id="bairro_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('fornecedores', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('cidade', $errorItems))?'has-error':'';?>">
                        <label for="cidade_name">Cidade</label>
                        <input type="text" name="cidade" class="form-control" id="cidade_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('fornecedores', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('uf', $errorItems))?'has-error':'';?>">
                        <label for="uf_name">UF</label>
                        <input type="text" name="uf" class="form-control" id="uf_name">
                    </div>
            </div>	
        </form>
    </section>
