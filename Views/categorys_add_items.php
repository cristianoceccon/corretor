<?php 
if(isset($id_category) == false){
  $id_category = "";
}
?>
<?php foreach($list as $item){?>   
    <option <?php echo ($id_category == $item['id'])?'selected="selected"':'';?> value="<?php echo $item['id'];?>">
      <?php 
        for($q=0;$q < $level;$q++) echo "--";
        echo $item['name'];
      ?>

    </option>                   			
        
       
     <?php
       if(count($item['subs']) > 0){
        $this->loadView('categorys_add_items', array(
                      'list' => $item['subs'],
                      'level' => $level + 1,
                      'id_category' => $id_category
        ));
       }
     ?>
<?php }?>