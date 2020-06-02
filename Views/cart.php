<h1>Carrinho de compras</h1>


<div class="form-group <?php echo (in_array('cliente', $errorItems))?'has-error':'';?>">
                    <label for="cliente_nome">Escolha um Cliente</label>
                        <select name="cliente" class="form_control" id="cliente_name">
                        <option></option>
                            <?php foreach($cliente_list as $item): ?>
                                <option value="<?php echo $item['id']; ?>"><?php echo $item['nome']; ?></option>
                            <?php endforeach; ?>
                        </select>                      
                        <span class="help-block" id="indisponivel" <?php echo (in_array('pedidos', $errorItems))?'style="display:block;"':'style="display:none;';?>><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Preencha este campo!</font></font></span>
                    </div>