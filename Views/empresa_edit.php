<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Editar Empresa
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <form method="POST" action="<?php echo BASE_URL; ?>empresa/edit_action/<?php echo $info['id']; ?>">
            <div class="box">
        	    <div class="box-header">
        		    <h3 class="box-title">Editar Empresa</h3>
        		    <div class="box-tools">
        			   <input type="submit" class="btn btn-success" value="Salvar">
        		    </div>
        	    </div>
        	    <div class="box-body">
        		    <div class="form-group <?php echo (in_array('cnpj', $errorItems))?'has-error':'';?>">
                        <label for="cnpj_name">Cnpj</label>
                        <input type="text" name="cnpj" value="<?php echo $info['cnpj']; ?>" class="form-control" id="cnpj_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('empresa', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

        		    <div class="form-group <?php echo (in_array('razaosocial', $errorItems))?'has-error':'';?>">
                        <label for="razaosocial_name">Razão Social</label>
                        <input type="text" name="razaosocial" value="<?php echo $info['razaosocial']; ?>"  class="form-control" id="razaosocial_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('empresa', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

        		    <div class="form-group <?php echo (in_array('fantasia', $errorItems))?'has-error':'';?>">
                        <label for="fantasia_name">Nome Fantasia</label>
                        <input type="text" name="fantasia" value="<?php echo $info['fantasia']; ?>"  class="form-control" id="fantasia_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('empresa', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('inscricao', $errorItems))?'has-error':'';?>">
                        <label for="inscricao_name">Inscrição Estadual</label>
                        <input type="text" name="inscricao" value="<?php echo $info['inscricao']; ?>"  class="form-control" id="inscricao_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('empresa', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

        		    <div class="form-group <?php echo (in_array('email', $errorItems))?'has-error':'';?>">
                        <label for="email_name">E-mail</label>
                        <input type="text" name="email" value="<?php echo $info['email']; ?>" class="form-control" id="email_name">
                    </div>

        		    <div class="form-group <?php echo (in_array('telefone', $errorItems))?'has-error':'';?>">
                        <label for="telefone_name">Telefone</label>
                        <input type="text" name="telefone" value="<?php echo $info['telefone']; ?>"  class="form-control" id="telefone_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('empresa', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('celular', $errorItems))?'has-error':'';?>">
                        <label for="celular_name">Celular</label>
                        <input type="text" name="celular" value="<?php echo $info['celular']; ?>" class="form-control" id="celular_name">
                    </div>

                    <div class="form-group <?php echo (in_array('cep', $errorItems))?'has-error':'';?>">
                        <label for="cep_name">Cep</label>
                        <input type="text" name="cep" value="<?php echo $info['cep']; ?>" class="form-control" id="cep_name">
                    </div>

                    <div class="form-group <?php echo (in_array('endereco', $errorItems))?'has-error':'';?>">
                        <label for="endereco_name">Endereço</label>
                        <input type="text" name="endereco" value="<?php echo $info['endereco']; ?>" class="form-control" id="endereco_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('empresa', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('numero', $errorItems))?'has-error':'';?>">
                        <label for="numero_name">Número</label>
                        <input type="text" name="numero" value="<?php echo $info['numero']; ?>" class="form-control" id="numero_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('empresa', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('complemento', $errorItems))?'has-error':'';?>">
                        <label for="complemento_name">Complemento</label>
                        <input type="text" name="complemento" value="<?php echo $info['complemento']; ?>" class="form-control" id="complemento_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('empresa', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('bairro', $errorItems))?'has-error':'';?>">
                        <label for="bairro_name">Bairro</label>
                        <input type="text" name="bairro" value="<?php echo $info['bairro']; ?>" class="form-control" id="bairro_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('empresa', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('cidade', $errorItems))?'has-error':'';?>">
                        <label for="cidade_name">Cidade</label>
                        <input type="text" name="cidade" value="<?php echo $info['cidade']; ?>" class="form-control" id="cidade_name">
                        <span class="help-block" id="indisponivel" <?php echo (in_array('empresa', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>

                    <div class="form-group <?php echo (in_array('uf', $errorItems))?'has-error':'';?>">
                        <label for="uf_name">UF</label>
                        <input type="text" name="uf" value="<?php echo $info['uf']; ?>" class="form-control" id="uf_name">
                    </div>

            </div>	
        </form>
    </section>
