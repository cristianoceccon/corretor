<?php
class ItemsGroup extends Model{

    public function getList(){
        $data = array();
        $sql = $this->db->query("SELECT * FROM items_group");

            if($sql->rowCount() > 0){
                $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
            }

        return $data;
    }

}