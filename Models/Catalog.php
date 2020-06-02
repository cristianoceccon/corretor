<?php 
class Catalog extends Model{

    public function getList(){
        $array = array();

            $sql = "SELECT * FROM catalog";
            $sql = $this->db->query($sql);

                if($sql->rowCount() > 0){
                    $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
                }

        return $array;
    }
    
}