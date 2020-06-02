<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cores
        
    </h1>
</section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cores</h3>
                <div class="box-tools">
                    <a href="<?php echo BASE_URL."colors/add"?>" class="btn btn-success">Adicionar</a>
                </div>
            </div>
            <div class="box-body">
                <table class="table">
                    <tr>
                        <th>Nome da cor</th>
                        <th>Cor</th>
                        <th>Qtd. produtos</th>
                        <th width="130">Ações</th>
                    </tr>
                    <?php foreach ($list as $item) {?>
                        <tr>
                            <td><?php echo $item['name'];?></td>
                            <td >
                            <span class="cor" style="background-color:<?php echo $item['cod_exa'];?>;"></span>
                                
                                
                            </td>
                            <td><?php echo $item['b'];?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?php echo BASE_URL."colors/edit/".$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
                                    <a href="<?php echo BASE_URL."colors/del/".$item['id']?>" class="btn btn-xs btn-danger <?php echo ($item['b'] > 0)?'disabled':'';?>"  onclick="return confirm('Tem certeza que deseja excluir ?')" >Excluir</a>
                                </div>
                            </td>
                        </tr>
                    <?php }?>
                </table>
            </div>
        </div>  
    </section>
