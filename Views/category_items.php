<?php foreach($list as $item){?>   
    <tr>                    			
        <td><?php 
        for($q=0;$q < $level;$q++) echo $item['sub'];
        echo $item['name'];?></td>
        <td>
          <?php echo $item['p'];?>
        </td>
        <td>
           <div class="btn-group">
              <a href="<?php echo BASE_URL."categories/edit/".$item['id']?>" class="btn btn-xs btn-primary">Editar</a>
              <a href="<?php echo BASE_URL."categories/del/".$item['id']?>" class="btn btn-xs btn-danger 
                <?php echo ($item['p'] > 0 || $item['tem_p'] == "TEM")?'disabled':'';?> "  onclick="return confirm('Tem certeza que deseja excluir ?')" >Excluir</a>
           </div>
        </td>
     </tr>
     <?php
       if(count($item['subs']) > 0){
        $this->loadView('category_items', array(
                      'list' => $item['subs'],
                      'level' => $level + 1
        ));
       }
     ?>
<?php }?>