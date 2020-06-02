<?php 
class ShippingAddresses extends Model {
    public function get(int $id) {
        $array = array();

        $sql = "SELECT * FROM shipping_addresses WHERE id_purchase = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetch(\PDO::FETCH_ASSOC);
            }

        return $array;
    }
}