<?php
class SellerPayment extends Model {

    public function getList(){
        $array = array();
        $sql = "SELECT *  FROM seller_payment_types";
        $sql = $this->db->query($sql);

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
                
            }

        return $array;
    }

    public function getInstallmentsByIdUser($id){
        $array = array();
            $sql = "SELECT id_payment, installments FROM seller_payment WHERE id_user = :id ORDER BY id_payment ASC";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
            
                if($sql->rowCount() > 0){
                    $data = $sql->fetchAll(\PDO::FETCH_ASSOC);
                    $array['payments'] = array();
                    foreach($data as $item){
                        $array['payments'][$item['id_payment']] = $item['installments'];
                    }
                }

        return $array;
    }


    public function addUserPayments($id_payment, $id_user, $installments){
        $sql = "INSERT INTO seller_payment SET id_payment = :id_payment, id_user = :id_user, 
        installments = :installments";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_payment', $id_payment);
        $sql->bindValue(':id_user', $id_user);
        $sql->bindValue(':installments', $installments);
        $sql->execute();
    }

    public function delPaymentsUser($id){
        $sql = "DELETE FROM seller_payment WHERE id_user = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

}