<?php 
class Customeraddress extends model {
    public function getList($id_user){
        $array = array();
        $sql = "SELECT * FROM customer_address WHERE id_user = :id_user AND status = 'ATIVO'";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_user', $id_user);
        $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
            }

        return $array;
    }

    public function add($id_user, $name_address, $cell_phone, $recipient, $address, $neighborhood, $number, $complement, 
    $postal_code, $city, $uf, $location_reference, $priority){
        if(!empty($address) && !empty($neighborhood) && !empty($number) 
		&& !empty($complement) && !empty($postal_code) && !empty($city) 
		&& !empty($uf) && !empty($recipient) && !empty($cell_phone)){

            if($priority == 'SIM'){
                $sql = "UPDATE customer_address SET priority = 'NAO' WHERE id_user = :id_user";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':id_user', $id_user);
                $sql->execute();
            }

            $sql = "INSERT INTO customer_address SET id_user = :id_user, status = :status, priority = :priority, recipient = :recipient, 
            name_address = :name_address, cell_phone = :cell_phone, address = :address, number = :number, 
            complement = :complement, neighborhood = :neighborhood, postal_code = :postal_code, 
            city = :city, uf = :uf, location_reference = :location_reference";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id_user', $id_user);
            $sql->bindValue(':status', 'ATIVO');
            $sql->bindValue(':priority', $priority);
            $sql->bindValue(':recipient', $recipient);
            $sql->bindValue(':name_address', $name_address);
            $sql->bindValue(':cell_phone', $cell_phone);
            $sql->bindValue(':address', $address);
            $sql->bindValue(':number', $number);
            $sql->bindValue(':complement', $complement);
            $sql->bindValue(':neighborhood', $neighborhood);
            $sql->bindValue(':postal_code', $postal_code);
            $sql->bindValue(':city', $city);
            $sql->bindValue(':uf', $uf);
            $sql->bindValue(':location_reference', $location_reference);
            $sql->execute();
            
            
            $_SESSION['cep_destination'] = $postal_code;
        }
        
    }

    public function edit($id_user, $name_address, $cell_phone, $recipient, $address, $neighborhood, $number, $complement, 
    $postal_code, $city, $uf, $location_reference, $priority, $id){
        if(!empty($id) && !empty($address) && !empty($neighborhood) && !empty($number) 
		&& !empty($complement) && !empty($postal_code) && !empty($city) 
		&& !empty($uf) && !empty($recipient) && !empty($cell_phone)){

            if($priority == 'SIM'){
                $sql = "UPDATE customer_address SET priority = 'NAO' WHERE id_user = :id_user";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(':id_user', $id_user);
                $sql->execute();
            }

            $sql = "UPDATE customer_address SET priority = :priority, recipient = :recipient, 
            name_address = :name_address, cell_phone = :cell_phone, address = :address, number = :number, 
            complement = :complement, neighborhood = :neighborhood, postal_code = :postal_code, 
            city = :city, uf = :uf, location_reference = :location_reference WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':priority', $priority);
            $sql->bindValue(':recipient', $recipient);
            $sql->bindValue(':name_address', $name_address);
            $sql->bindValue(':cell_phone', $cell_phone);
            $sql->bindValue(':address', $address);
            $sql->bindValue(':number', $number);
            $sql->bindValue(':complement', $complement);
            $sql->bindValue(':neighborhood', $neighborhood);
            $sql->bindValue(':postal_code', $postal_code);
            $sql->bindValue(':city', $city);
            $sql->bindValue(':uf', $uf);
            $sql->bindValue(':location_reference', $location_reference);
            $sql->bindValue(':id', $id);
            $sql->execute();
        }
    }

    public function get($id){
        $array = array();
        $sql = "SELECT * FROM customer_address WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();

            if($sql->rowCount() > 0){
                $array = $sql->fetch(\PDO::FETCH_ASSOC);
            }

        return $array;

    }

    public function getAddressById($id){
        $array = array();
        $sql = "SELECT * FROM customer_address WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        
            if($sql->rowCount() > 0){
                $array = $sql->fetch(\PDO::FETCH_ASSOC);
            }

        return $array;
    }

    public function getAddressPriority($id){
        $array = array();
        $sql = "SELECT * FROM customer_address WHERE id_user = :id AND priority = 'SIM'";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
        
            if($sql->rowCount() > 0){
                $array = $sql->fetch(\PDO::FETCH_ASSOC);
            }

        return $array;
    }

    public function del($id){
        if(!empty($id)){
            $sql = "UPDATE customer_address SET status = 'INATIVO' WHERE id = :id";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':id', $id);
            $sql->execute();
        }
    }
}