<?php 
class Orderhistory extends Model {
    
    public function createOrderHistory($id_purchase, $status){
        $date = date('Y-m-d');
        $sql = "INSERT INTO order_history SET id_purchase = :id_purchase, payment_status = :status, 
        date_transaction = :date";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_purchase', $id_purchase);
        $sql->bindValue(':status', $status);
        $sql->bindValue(':date', $date);
        $sql->execute();
    }

    public function get($id_purchase){
        $array = array();
        $sql = "SELECT * FROM order_history WHERE id_purchase = :id_purchase ORDER BY id DESC";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_purchase', $id_purchase);
        $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
            }

        return $array;
    }
    
}